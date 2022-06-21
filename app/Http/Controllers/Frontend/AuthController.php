<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\AuthLoginRequest;
use App\Http\Requests\Frontend\Auth\AuthRegisterRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    /**
     * Repository
     *
     * @var UserRepository
     */
    private $repository;

    /**
     * Constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {

        $this->repository = $repository;
    }

    /**
     * Show form login
     *
     * @return RedirectResponse|View
     */
    public function login()
    {
        return view('frontend.auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param AuthLoginRequest $request Request
     *
     * @return RedirectResponse
     */
    public function authenticate(AuthLoginRequest $request)
    {
        try {
            $credentials = [
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'role' => User::USER_ROLE
            ];

            $remember = !empty($request->get('remember'));
            if (Auth::attempt($credentials, $remember)) {
                $oldUrl = session('oldUrl');
                if (!empty($oldUrl)) {
                    session()->forget('oldUrl');
                    return redirect($oldUrl);
                }
                return redirect()->route('frontend.sites.index');
            }

            Session::flash('error', 'The email address or password is incorrect.');

            return redirect()->route('frontend.auth.login');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while login user.');
            return redirect()->route('frontend.auth.login');
        }
    }

    /**
     * Show form register
     *
     * @return RedirectResponse|View
     */
    public function register()
    {
        return view('frontend.auth.login');
    }

    /**
     * Handle register user.
     *
     * @param AuthRegisterRequest $request Request
     *
     * @return RedirectResponse
     */
    public function handleRegister(AuthRegisterRequest $request)
    {
        try {

            $data = $request->only([
                'name',
                'email',
                'password'
            ]);
            $data['password'] = bcrypt($data['password']);
            $data['role'] = User::USER_ROLE;
            $this->repository->create($data);
            Session::flash('success', 'You are successfully registered. Please login.');
            return redirect()->route('frontend.auth.register');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while register user.');
            return redirect()->route('frontend.auth.register');
        }
    }

    /**
     * Log out
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontend.auth.login');
    }
}
