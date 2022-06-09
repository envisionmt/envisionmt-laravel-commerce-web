<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Introductions\IntroductionCreateRequest;
use App\Http\Requests\Backend\Introductions\IntroductionUpdateRequest;
use App\Repositories\IntroductionRepository;
use App\Repositories\IntroductionTypeRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class IntroductionController extends Controller
{
    /**
     * Repository
     *
     * @var IntroductionRepository
     */
    private $introductionRepository;
    private $introductionTypeRepository;

    /**
     * Constructor.
     *
     * @param IntroductionRepository $introductionRepository
     * @param IntroductionTypeRepository $introductionTypeRepository
     */
    public function __construct(IntroductionRepository $introductionRepository, IntroductionTypeRepository $introductionTypeRepository)
    {
        $this->introductionRepository = $introductionRepository;
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
            $list = $this->introductionRepository->searchFromRequest($request);

            return view('backend.introductions.index', compact('list'));
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
            $introductionTypes = $this->introductionTypeRepository->all();
            return view('backend.introductions.create', compact('introductionTypes'));
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IntroductionCreateRequest $request
     *
     * @return RedirectResponse
     */
    public function store(IntroductionCreateRequest $request)
    {
        try {
            $attributes = $request->only(array_keys($this->introductionRepository->makeModel()->rules()));
            $item = $this->introductionRepository->create($attributes);

            $request->session()->flash('success', 'The introduction has been successfully created.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.introductions.edit', $item->id);
            }

            return redirect()->route('backend.introductions.show', $item->id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while creating the brand.');
        }

        return redirect()->route('backend.introductions.index');
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
            $item = $this->introductionRepository->getById($id);

            return view('backend.introductions.show', compact('item'));
        } catch (ModelNotFoundException $exception) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the brand.');
        }

        return redirect()->route('backend.introductions.index');
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
            $introductionTypes = $this->introductionTypeRepository->all();
            $item = $this->introductionRepository->getById($id);

            return view('backend.introductions.edit', compact('item', 'introductionTypes'));
        } catch (ModelNotFoundException $e) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the introduction.');
        }

        return redirect()->route('backend.introductions.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IntroductionUpdateRequest $request
     * @param mixed $id
     *
     * @return RedirectResponse
     */
    public function update(IntroductionUpdateRequest $request, $id)
    {
        try {
            $attributes = $request->only(array_keys($this->introductionRepository->makeModel()->rules()));
            $this->introductionRepository->update($attributes, $id);

            $request->session()->flash('success', 'The introduction has been successfully updated.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.introductions.edit', $id);
            }

            return redirect()->route('backend.introductions.show', $id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while updating the introduction.');
        }

        return redirect()->route('backend.introductions.index');
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
                $request->session()->flash('error', 'Please choose any introductions to delete.');
            } else {
                $this->introductionRepository->deleteByIds($ids);
                $request->session()->flash('success', 'The introductions has been successfully deleted.');
            }
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while deleting the introductions.');
        }

        return redirect()->route('backend.introductions.index');
    }
}
