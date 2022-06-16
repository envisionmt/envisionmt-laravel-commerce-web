<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Deliveries\DeliveryCreateRequest;
use App\Http\Requests\Backend\Deliveries\DeliveryUpdateRequest;
use App\Repositories\DeliveryRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class DeliveryController extends Controller
{
    /**
     * Repository
     *
     * @var DeliveryRepository
     */
    private $deliveryRepository;

    /**
     * Constructor.
     *
     * @param DeliveryRepository $deliveryRepository
     */
    public function __construct(DeliveryRepository $deliveryRepository)
    {
        $this->deliveryRepository = $deliveryRepository;
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
            $list = $this->deliveryRepository->searchFromRequest($request);

            return view('backend.deliveries.index', compact('list'));
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
            return view('backend.deliveries.create');
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param DeliveryCreateRequest $request
     * @return RedirectResponse
     */
    public function store(DeliveryCreateRequest $request)
    {
        try {
            $attributes = $request->only(array_keys($this->deliveryRepository->makeModel()->rules()));
            $item = $this->deliveryRepository->create($attributes);

            $request->session()->flash('success', 'The delivery has been successfully created.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.deliveries.edit', $item->id);
            }

            return redirect()->route('backend.deliveries.show', $item->id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while creating the delivery.');
        }

        return redirect()->route('backend.deliveries.index');
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
            $item = $this->deliveryRepository->getById($id);

            return view('backend.deliveries.show', compact('item'));
        } catch (ModelNotFoundException $exception) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the delivery.');
        }

        return redirect()->route('backend.deliveries.index');
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
            $item = $this->deliveryRepository->getById($id);

            return view('backend.deliveries.edit', compact('item'));
        } catch (ModelNotFoundException $e) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the delivery.');
        }

        return redirect()->route('backend.deliveries.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DeliveryUpdateRequest $request
     * @param mixed $id
     *
     * @return RedirectResponse
     */
    public function update(DeliveryUpdateRequest $request, $id)
    {
        try {
            $attributes = $request->only(array_keys($this->deliveryRepository->makeModel()->rules()));
            $this->deliveryRepository->update($attributes, $id);

            $request->session()->flash('success', 'The delivery has been successfully updated.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.deliveries.edit', $id);
            }

            return redirect()->route('backend.deliveries.show', $id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while updating the delivery.');
        }

        return redirect()->route('backend.deliveries.index');
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
                $request->session()->flash('error', 'Please choose any deliveries to delete.');
            } else {
                $this->deliveryRepository->deleteByIds($ids);
                $request->session()->flash('success', 'The deliveries has been successfully deleted.');
            }
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while deleting the deliveries.');
        }

        return redirect()->route('backend.deliveries.index');
    }
}
