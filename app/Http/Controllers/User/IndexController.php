<?php

namespace App\Http\Controllers\User;

use App\Services\UploadToGoogleDrive;

class IndexController extends BasicController
{
    private $uploadToGoogleDrive;
    public function __construct(UploadToGoogleDrive $uploadToGoogleDrive)
    {
        $this->uploadToGoogleDrive = $uploadToGoogleDrive;
    }

    public function index()
    {
        return view('user.index');
    }

    public function uploadPdf(Request $request)
    {
        $file = $request->file('pdf_file');

        $this->uploadToGoogleDrive->upload($file);
    }
}
