<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    private $productRepository;

    /**
     * Constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
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
            return view('frontend.products.index', compact('list'));
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

}
