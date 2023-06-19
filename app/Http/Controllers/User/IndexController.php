<?php

namespace App\Http\Controllers\User;

use App\Services\UploadToGoogleDrive;
use Illuminate\Http\Request;

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

    public function uploadPDF(Request $request)
    {
        $uploadFile = $request->file('pdf_file');

        $this->uploadToGoogleDrive->upload($uploadFile, 'order-000001', 'pdf-2');

        return view('user.result');
    }
}
