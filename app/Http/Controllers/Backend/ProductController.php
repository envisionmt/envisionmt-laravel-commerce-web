<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Products\ProductCreateRequest;
use App\Http\Requests\Backend\Products\ProductUpdateRequest;
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
    /**
     * Repository
     *
     * @var ProductRepository
     */
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

            return view('backend.products.index', compact('list'));
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable|void
     */
    public function create()
    {
        try {
            return view('backend.products.create');
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductCreateRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ProductCreateRequest $request)
    {
        try {
            $attributes = $request->only(array_keys($this->productRepository->makeModel()->rules()));
            $item = $this->productRepository->create($attributes);

            $request->session()->flash('success', 'The page has been successfully created.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.products.edit', $item->id);
            }

            return redirect()->route('backend.products.show', $item->id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while creating the page.');
        }

        return redirect()->route('backend.products.index');
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

            return view('backend.products.show', compact('item'));
        } catch (ModelNotFoundException $exception) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the page.');
        }

        return redirect()->route('backend.products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param string $id
     *
     * @return View|RedirectResponse
     */
    public function edit(Request $request, string $id)
    {
        try {
            $item = $this->productRepository->getById($id);

            return view('backend.products.edit', compact('item'));
        } catch (ModelNotFoundException $e) {
            $request->session()->flash('error', 'Sorry, the product you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the page.');
        }

        return redirect()->route('backend.products.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest $request
     * @param mixed $id
     *
     * @return RedirectResponse
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        try {
            $attributes = $request->only(array_keys($this->productRepository->makeModel()->rules()));
            $this->productRepository->update($attributes, $id);

            $request->session()->flash('success', 'The product has been successfully updated.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.products.edit', $id);
            }

            return redirect()->route('backend.products.show', $id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while updating the page.');
        }

        return redirect()->route('backend.products.index');
    }

    /**
     * Delete multiple items
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        try {
            $ids = $request->get('id');
            if (empty($ids)) {
                $request->session()->flash('error', 'Please choose any products to delete.');
            } else {
                $this->productRepository->deleteByIds($ids);
                $request->session()->flash('success', 'The products has been successfully deleted.');
            }
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while deleting the products.');
        }

        return redirect()->route('backend.products.index');
    }
}
