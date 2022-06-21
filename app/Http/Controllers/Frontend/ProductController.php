<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Products\AddCartRequest;
use App\Http\Requests\Frontend\Products\CheckoutRequest;
use App\Models\OrderPayment;
use App\Repositories\CategoryRepository;
use App\Repositories\OrderPaymentRepository;
use App\Repositories\ProductRepository;
use App\Services\RSAService;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Jenssegers\Agent\Agent;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    private $orderPaymentRepository;
    private $rsaService;
    private $agent;

    /**
     * Constructor.
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     * @param OrderPaymentRepository $orderPaymentRepository
     * @param RSAService $rsaService
     */
    public function __construct(ProductRepository $productRepository,
                                CategoryRepository $categoryRepository,
                                OrderPaymentRepository $orderPaymentRepository,
                                Agent $agent,
                                RSAService $rsaService)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->orderPaymentRepository = $orderPaymentRepository;
        $this->rsaService = $rsaService;
        $this->agent = $agent;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return Renderable|void
     */
    public function index(Request $request)
    {
        try {
            $list = $this->productRepository->searchFromRequest($request);
            $categories = $this->categoryRepository->all();
            return view('frontend.products.index', compact('list', 'categories'));
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param mixed $id
     *
     * @return View|RedirectResponse
     */
    public function show(Request $request, $id)
    {
        try {
            $item = $this->productRepository->getById($id);

            return view('frontend.products.show', compact('item'));
        } catch (ModelNotFoundException $exception) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the page.');
        }

        return redirect()->route('frontend.products.index');
    }


    public function addCart(AddCartRequest $request)
    {
        $attributes = $request->only(['product_id', 'qty']);
        $product = $this->productRepository->getById($attributes['product_id']);
        \Cart::add($product->id, $product->name, $attributes['qty'], $product->price, 0, $product->toArray());
        return redirect()->back();
    }

    public function cart(Request $request)
    {
        $list = \Cart::content();
        return view('frontend.products.cart', compact('list'));
    }

    public function checkout(Request $request)
    {
        $list = \Cart::content();
        return view('frontend.products.checkout', compact('list'));
    }

    public function postCheckout(CheckoutRequest $request)
    {
        $attributes = $request->only(['email', 'description', 'first_name', 'last_name', 'company_name', 'phone', 'post_code', 'city', 'address1', 'address2']);
//        dd($attributes);
        $this->orderPaymentRepository->create([
            'order_no' => time(),
            'channel' => OrderPayment::ALIPAY_CHANNEL,
            'email' => $attributes['email'],
            'description' => $attributes['description'],
            'transaction_amount' => \Cart::total(),
            'transaction_amount_origin' => \Cart::total(),
            'subtotal' => \Cart::subtotal(),
            'transaction_currency' => OrderPayment::MALAYSIA_CURRENCY,
            'shipping_charge' => 0,
            'fpx_bank' => 1,
            'user_id' => authUserId(),
            'device' => $this->agent->isDesktop() ? OrderPayment::DESKTOP_DEVICE : OrderPayment::PHONE_DEVICE,
            'ip' => $request->ip(),
            'first_name' => $attributes['first_name'],
            'last_name' => $attributes['last_name'],
            'company_name' => $attributes['company_name'],
            'post_code' => $attributes['post_code'],
            'city' => $attributes['city'],
            'address1' => $attributes['address1'],
            'address2' => $attributes['address2'],
            'phone' => $attributes['phone'],
            'shipping_destination_id' => '',
            'delivery_method_id' => '',
            'payment_method_id' => '',
            'status' => OrderPayment::PENDING_STATUS,
            'shipping_status' => OrderPayment::PROCESSING_SHIPPING_STATUS
        ]);
        $request->session()->flash('success', 'You ordered successful!');
        return redirect()->route('frontend.sites.index');
    }
}
