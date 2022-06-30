<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class LogoutController extends BaseController
{
    /**
     * Confirm logout.
     *
     * @return Renderable
     */
    public function confirm()
    {
        return view('auth.confirm-logout');
    }
}
