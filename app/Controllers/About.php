<?php

namespace App\Controllers;

class About extends BaseController
{
    /**
     * About page – static page identifying the developer.
     */
    public function index(): string
    {
        $data = [
            'pageTitle'  => 'About the Developer',
            'activePage' => 'about',
        ];

        return view('layout/header', $data)
             . view('pages/about', $data)
             . view('layout/footer');
    }
}
