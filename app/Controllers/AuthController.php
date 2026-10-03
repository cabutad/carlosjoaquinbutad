<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    /**
     * Display the login form.
     */
    public function login()
    {
        if (session('isLoggedIn')) {
            return redirect()->to('/');
        }

        return view('auth/login');
    }

    /**
     * Process the login attempt.
     */
    public function authenticate()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return view('auth/login', [
                'validation' => $this->validator,
            ]);
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->findByUsername($username);

        if ($user === null) {
            return view('auth/login', [
                'error' => 'Incorrect username or password.',
            ]);
        }

        if (! password_verify($password, $user['password'])) {
            return view('auth/login', [
                'error' => 'Incorrect username or password.',
            ]);
        }

        // Store user data in session
        session()->set([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'full_name' => $user['full_name'],
            'isLoggedIn' => true,
        ]);

        return redirect()->to('/');
    }

    /**
     * Log the user out and redirect to home.
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
