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

    /**
     * Handle profile photo upload.
     */
    public function upload()
    {
        $file = $this->request->getFile('profile_photo');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validate: must be an image, max 2MB
            $validationRule = [
                'profile_photo' => [
                    'rules'  => 'uploaded[profile_photo]|is_image[profile_photo]|max_size[profile_photo,2048]',
                    'errors' => [
                        'is_image' => 'Please upload a valid image file.',
                        'max_size' => 'Image must be less than 2MB.',
                    ],
                ],
            ];

            if (!$this->validate($validationRule)) {
                return redirect()->to('/profile')->with('error', implode(' ', $this->validator->getErrors()));
            }

            // Move uploaded file to public/uploads/
            $file->move(FCPATH . 'uploads', 'profile_photo.jpg', true);

            return redirect()->to('/profile')->with('success', 'Profile photo updated successfully!');
        }

        return redirect()->to('/profile')->with('error', 'No file selected or upload failed.');
    }
}
