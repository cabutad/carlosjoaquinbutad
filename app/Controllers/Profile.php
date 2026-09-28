<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $user      = $userModel->getDemoUser();

        return view('profile/index', [
            'user' => $user,
        ]);
    }
}
