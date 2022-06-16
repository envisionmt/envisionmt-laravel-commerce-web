<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Repositories\OrderPaymentRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class OrderPaymentController extends Controller
{
    /**
     * Repository
     *
     * @var OrderPaymentRepository
     */
    private $orderPaymentRepository;

    /**
     * Constructor.
     *
     * @param OrderPaymentRepository $orderPaymentRepository
     */
    public function __construct(OrderPaymentRepository $orderPaymentRepository)
    {
        $this->orderPaymentRepository = $orderPaymentRepository;
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
            $list = $this->orderPaymentRepository->searchFromRequest($request);

            return view('backend.order-payments.index', compact('list'));
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
            $item = $this->orderPaymentRepository->getById($id);

            return view('backend.order-payments.show', compact('item'));
        } catch (ModelNotFoundException $exception) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the order payment.');
        }

        return redirect()->route('backend.order-payments.index');
    }

}
