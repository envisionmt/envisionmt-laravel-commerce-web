<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Products\AddCartRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;

    /**
     * Constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
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


    public function addCart(AddCartRequest $request) {
        $attributes = $request->only(['product_id', 'qty']);
        $product = $this->productRepository->getById($attributes['product_id']);
        \Cart::add($product->id, $product->name, $attributes['qty'], $product->price, 0, $product->toArray());
        return redirect()->back();
    }

    public function cart(Request $request)
    {
//        dd(\Cart::content());
        $list = \Cart::content();
        return view('frontend.products.cart', compact('list'));
    }

    public function checkout(Request $request)
    {
        return view('frontend.products.checkout');
    }
}
