<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    /**
     * Profile page – displays the single demo user record.
     */
    public function index(): string
    {
        $userModel = new UserModel();

        $data = [
            'pageTitle'  => 'User Profile',
            'activePage' => 'profile',
            'user'       => $userModel->getDemoUser(),
        ];

        return view('layout/header', $data)
             . view('pages/profile', $data)
             . view('layout/footer');
    }
}
