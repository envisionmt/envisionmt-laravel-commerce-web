<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\IntroductionTypes\IntroductionTypeCreateRequest;
use App\Http\Requests\Backend\IntroductionTypes\IntroductionTypeUpdateRequest;
use App\Repositories\IntroductionTypeRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class IntroductionTypeController extends Controller
{
    /**
     * Repository
     *
     * @var IntroductionTypeRepository
     */
    private $introductionTypeRepository;

    /**
     * Constructor.
     *
     * @param IntroductionTypeRepository $introductionTypeRepository
     */
    public function __construct(IntroductionTypeRepository $introductionTypeRepository)
    {
        $this->introductionTypeRepository = $introductionTypeRepository;
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
            $list = $this->introductionTypeRepository->searchFromRequest($request);

            return view('backend.introduction-types.index', compact('list'));
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
            return view('backend.introduction-types.create');
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IntroductionTypeCreateRequest $request
     *
     * @return RedirectResponse
     */
    public function store(IntroductionTypeCreateRequest $request)
    {
        try {
            $attributes = $request->only(array_keys($this->introductionTypeRepository->makeModel()->rules()));
            $item = $this->introductionTypeRepository->create($attributes);

            $request->session()->flash('success', 'The introduction type has been successfully created.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.introduction-types.edit', $item->id);
            }

            return redirect()->route('backend.introduction-types.show', $item->id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while creating the introduction type.');
        }

        return redirect()->route('backend.introduction-types.index');
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
            $item = $this->introductionTypeRepository->getById($id);

            return view('backend.introduction-types.show', compact('item'));
        } catch (ModelNotFoundException $exception) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the introduction type.');
        }

        return redirect()->route('backend.introduction-types.index');
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
            $item = $this->introductionTypeRepository->getById($id);

            return view('backend.introduction-types.edit', compact('item'));
        } catch (ModelNotFoundException $e) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the introduction type.');
        }

        return redirect()->route('backend.introduction-types.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IntroductionTypeUpdateRequest $request
     * @param mixed $id
     *
     * @return RedirectResponse
     */
    public function update(IntroductionTypeUpdateRequest $request, $id)
    {
        try {
            $attributes = $request->only(array_keys($this->introductionTypeRepository->makeModel()->rules()));
            $this->introductionTypeRepository->update($attributes, $id);

            $request->session()->flash('success', 'The introduction type has been successfully updated.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.introduction-types.edit', $id);
            }

            return redirect()->route('backend.introduction-types.show', $id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while updating the introduction type.');
        }

        return redirect()->route('backend.introduction-types.index');
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
                $request->session()->flash('error', 'Please choose any introduction types to delete.');
            } else {
                $this->introductionTypeRepository->deleteByIds($ids);
                $request->session()->flash('success', 'The introduction types has been successfully deleted.');
            }
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while deleting the introduction types.');
        }

        return redirect()->route('backend.introduction-types.index');
    }
}
