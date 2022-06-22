<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Products\AddCartRequest;
use App\Http\Requests\Frontend\Products\CheckoutRequest;
use App\Models\OrderPayment;
use App\Repositories\CategoryRepository;
use App\Repositories\OrderPaymentRepository;
use App\Repositories\ProductRepository;
use App\Services\CommonService;
use App\Services\RSAService;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Jenssegers\Agent\Agent;

class ProductController extends Controller
{
    use ApiResponser;
    private $productRepository;
    private $categoryRepository;
    private $orderPaymentRepository;
    private $commonService;
    private $rsaService;
    private $agent;

    /**
     * Constructor.
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     * @param OrderPaymentRepository $orderPaymentRepository
     * @param Agent $agent
     * @param CommonService $commonService
     * @param RSAService $rsaService
     */
    public function __construct(ProductRepository $productRepository,
                                CategoryRepository $categoryRepository,
                                OrderPaymentRepository $orderPaymentRepository,
                                Agent $agent,
                                CommonService $commonService,
                                RSAService $rsaService)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->orderPaymentRepository = $orderPaymentRepository;
        $this->commonService = $commonService;
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

        $orderPayment = $this->orderPaymentRepository->create([
            'order_no' => env('ORDER_NO_CHARACTER', 'DB') . time(),
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
        $list = \Cart::content();
        foreach ($list as $item) {
            $orderPayment->products()->attach($item->id, [
                'quantity' => $item->qty,
                'total' => $item->qty * $item->options->price,
                'price' => $item->options->price
            ]);
        }

        try {
            $signedDataM1pay = [
                'productDescription' => env('APP_NAME') . ' ' . $orderPayment->order_no,
                'transactionAmount' => number_format((float)$orderPayment->transaction_amount, 2, '.', ''),
                'exchangeOrderNo' => $orderPayment->order_no,
                'merchantOrderNo' => $orderPayment->order_no,
                'transactionCurrency' => OrderPayment::MALAYSIA_CURRENCY,
                'emailAddress' => $attributes['email'],
                'merchantId' => env('MERCHANT_ID_M1PAY')
            ];
            $fileName = Storage::path(env('PRIVATE_KEY_M1PAY'));
            $privateKeyM1pay = file_get_contents($fileName);
            $signedDataEncryptM1pay = $this->rsaService->generateSignature($signedDataM1pay, $privateKeyM1pay);
            $transactionBodyM1pay = [
                'channel' => 'ALIPAY',
                'emailAddress' => $attributes['email'],
                'exchangeOrderNo' => $orderPayment->order_no,
                'fpxBank' => 1,
                'merchantId' => env('MERCHANT_ID_M1PAY'),
                'merchantOrderNo' => $orderPayment->order_no,
                'productDescription' => env('APP_NAME') . ' ' . $orderPayment->order_no,
                'signedData' => $signedDataEncryptM1pay,
                'transactionAmount' => number_format((float)$orderPayment->transaction_amount, 2, '.', ''),
                'transactionCurrency' => OrderPayment::MALAYSIA_CURRENCY,
                'skipConfirmation' => true
            ];
            $data = $this->commonService->postJsonAuth($transactionBodyM1pay, env('CREATE_TRANSACTION_M1PAY'), Cache::get('OAUTH_KEY'));
            return redirect($data);

        } catch (\Exception $exception) {
            Log::error('error_callback', [$exception->getMessage()]);
            $request->session()->flash('error', 'Payment on your order has failed. Please process payment again!');
            return redirect()->route('frontend.products.checkout');
        }

    }

    public function callbackData(Request $request)
    {
        $attributes = $request->only(['transactionAmount', 'fpxTxnId', 'sellerOrderNo', 'status', 'merchantOrderNo', 'signedData']);
        Log::info('thanh', $attributes);
        $signAttributes = [
            $attributes['transactionAmount'],
            $attributes['fpxTxnId'],
            $attributes['sellerOrderNo'],
            $attributes['status'],
            $attributes['merchantOrderNo']
        ];
        $fileName = Storage::path(env('PUBLIC_KEY_M1PAY'));
        $publicKey = file_get_contents($fileName);
        $signedData = $attributes['signedData'];
        if (!$this->rsaService->verifySignature($signAttributes, $signedData, $publicKey)) {
            return $this->errorMessage('Your signature is wrong', Response::HTTP_BAD_REQUEST);
        }
        $orderPayment = $this->orderPaymentRepository->getByColumn($attributes['merchantOrderNo'], 'order_no');
        $oldStatus = $orderPayment->status;
        $orderPayment->out_order_no = $attributes['sellerOrderNo'];
        $status = array_search($attributes['status'], OrderPayment::$statusNames);
        if (!$status) {
            return $this->errorMessage('Your status is wrong', Response::HTTP_BAD_REQUEST);
        }
        $orderPayment->save();
        if ($oldStatus != $status) {

            $orderPayment->status = $status;
            $orderPayment->save();

            if ($status === OrderPayment::TRADE_FINISHED_STATUS) {
                return $this->successResponse('Your order has been updated!');
            } else if ($status === OrderPayment::TRADE_CLOSE_STATUS) {
                return $this->successResponse('This payment was closed!');
            }
        } else {
            return $this->errorMessage('Your status is same old status', Response::HTTP_BAD_REQUEST);
        }
    }

    public function returnData(Request $request)
    {
        $attributes = $request->only(['transactionId', 'merchantOrderNo', 'transactionStatus', 'transactionAmount']);
        $orderPayment = $this->orderPaymentRepository->getByColumn($attributes['merchantOrderNo'], 'order_no');
        $orderPayment->out_order_no = $attributes['transactionId'];
        $oldStatus = $orderPayment->status;
        $status = array_search($attributes['transactionStatus'], OrderPayment::$statusNames);
        if (!$status) {
            $request->session()->flash('error', 'Payment on your order has failed. Please process payment again!');
            return redirect()->route('frontend.products.checkout');
        } else if ($oldStatus == OrderPayment::PENDING_STATUS && $status == OrderPayment::SUCCESSFUL_STATUS) {
            $orderPayment->status = $status;
            $orderPayment->save();
            \Cart::destroy();
            $request->session()->flash('success', 'You ordered successful!');
            return redirect()->route('frontend.sites.index');
        } else if ($oldStatus == OrderPayment::APPROVED_STATUS) {
            \Cart::destroy();
        } else if ($status == OrderPayment::CANCELLED_STATUS) {
            $request->session()->flash('error', 'Your payment was canceled. Please process payment again!');
            return redirect()->route('frontend.products.checkout');
        } else {
            $request->session()->flash('error', 'Payment on your order has failed. Please process payment again!');
            return redirect()->route('frontend.products.checkout');
        }
    }
}
