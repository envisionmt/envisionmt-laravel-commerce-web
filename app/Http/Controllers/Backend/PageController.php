<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Pages\PageCreateRequest;
use App\Http\Requests\Backend\Pages\PageUpdateRequest;
use App\Repositories\PageRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    /**
     * Repository
     *
     * @var PageRepository
     */
    private $pageRepository;

    /**
     * Constructor.
     * @param PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
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
            $list = $this->pageRepository->searchFromRequest($request);

            return view('backend.pages.index', compact('list'));
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
            return view('backend.pages.create');
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param pageCreateRequest $request
     *
     * @return RedirectResponse
     */
    public function store(PageCreateRequest $request)
    {
        try {
            $attributes = $request->only(array_keys($this->pageRepository->makeModel()->rules()));
            $item = $this->pageRepository->create($attributes);

            $request->session()->flash('success', 'The page has been successfully created.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.pages.edit', $item->id);
            }

            return redirect()->route('backend.pages.show', $item->id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while creating the page.');
        }

        return redirect()->route('backend.pages.index');
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
            $item = $this->pageRepository->getById($id);

            return view('backend.pages.show', compact('item'));
        } catch (ModelNotFoundException $exception) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the page.');
        }

        return redirect()->route('backend.pages.index');
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
            $item = $this->pageRepository->getById($id);

            return view('backend.pages.edit', compact('item'));
        } catch (ModelNotFoundException $e) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the page.');
        }

        return redirect()->route('backend.pages.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PageUpdateRequest $request
     * @param mixed $id
     *
     * @return RedirectResponse
     */
    public function update(PageUpdateRequest $request, $id)
    {
        try {
            $attributes = $request->only(array_keys($this->pageRepository->makeModel()->rules()));
            $this->pageRepository->update($attributes, $id);

            $request->session()->flash('success', 'The page has been successfully updated.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.pages.edit', $id);
            }

            return redirect()->route('backend.pages.show', $id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while updating the page.');
        }

        return redirect()->route('backend.pages.index');
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
                $request->session()->flash('error', 'Please choose any pages to delete.');
            } else {
                $this->pageRepository->deleteByIds($ids);
                $request->session()->flash('success', 'The pages has been successfully deleted.');
            }
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while deleting the pages.');
        }

        return redirect()->route('backend.pages.index');
    }
}
