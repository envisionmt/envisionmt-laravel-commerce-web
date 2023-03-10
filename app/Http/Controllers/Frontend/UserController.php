<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Users\ProfileUpdateRequest;
use App\Repositories\OrderPaymentRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    private $userRepository;
    private $orderPaymentRepository;
    /**
     * Constructor.
     * @param UserRepository $userRepository
     * @param OrderPaymentRepository $orderPaymentRepository
     */
    public function __construct(UserRepository $userRepository,
                                OrderPaymentRepository $orderPaymentRepository)
    {
        $this->userRepository = $userRepository;
        $this->orderPaymentRepository = $orderPaymentRepository;
    }

    public function profile()
    {
        $user = Auth::user();
        return view('frontend.user.profile', compact('user'));
    }

    /**
     * Update profile.
     *
     * @param ProfileUpdateRequest $request
     *
     * @return RedirectResponse
     */
    public function putProfile(ProfileUpdateRequest $request)
    {
        try {
            $attributes = $request->only(['name', 'email', 'password']);

            if($attributes['password']) {
                $attributes['password'] = app('hash')->make($attributes['password']);
            } else {
                unset($attributes['password']);
            }
            $this->userRepository->update($attributes, authUserId());
            $request->session()->flash('success', 'The profile has been successfully updated.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while updating the user.');
        }

        return redirect()->route('frontend.user.profile');
    }

    public function invoice(Request $request)
    {
        $list = $this->orderPaymentRepository->where('user_id', authUserId())->orderBy('created_at', 'desc')->paginate();
        return view('frontend.user.invoice', compact('list'));
    }

    public function invoiceDetail(Request $request, $id)
    {
        $orderPayment = $this->orderPaymentRepository
            ->where('user_id', authUserId())
            ->where('id', $id)
            ->first();
        return view('frontend.user.invoice-detail', compact('orderPayment'));
    }

}
