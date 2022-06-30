<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\AuthLoginRequest;
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
        return view('backend.auth.login');
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
                'role' => User::ADMIN_ROLE
            ];

            $remember = !empty($request->get('remember'));
            if (Auth::attempt($credentials, $remember)) {
                $oldUrl = session('oldUrl');
                if (!empty($oldUrl)) {
                    session()->forget('oldUrl');
                    return redirect($oldUrl);
                }
                return redirect()->route('backend.sites.index');
            }

            Session::flash('error', 'The email address or password is incorrect.');

            return redirect()->route('backend.auth.login');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while login user.');
            return redirect()->route('backend.auth.login');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('backend.auth.login');
    }
}
