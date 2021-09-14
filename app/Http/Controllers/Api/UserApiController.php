<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends ApiController
{
    public function index()
    {
        $user = User::all();

        return $this->successResponse(
            $user,
            'Showing user data'
        );
    }
}
