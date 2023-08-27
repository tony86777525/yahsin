<?php

namespace App\Services;

use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;

class UploadToGoogleDrive
{
    private $fileId;
    private $accessToken;
//    const GOOGLE_DRIVE_FILE_ID = '1m3WNr1Yr8vUTzBBAMxgbjOFmYvCsryNj';
//    const ACCESS_TOKEN = [
//        "access_token" => "ya29.a0AWY7CklXwZrtD0UjcNmKLE2K9HJxIrh41U8hN_Pbc4DoOsF-OMPEXOnwTiYTK3sWz0C33q7x4B2BtMZ_oA0wyMuRMsgXgZrNWzOusmCEGhKp4u1fHV7dfmzrz8qEqJnpATgYxSRBOfhXedkPgf5w0iQESh81aCgYKAbYSARESFQG1tDrpZFPP1VnkyT1zJoqj4fxhTQ0163",
//        "expires_in" => 3599,
//        "refresh_token" => "1//0emAbqXoaIRcHCgYIARAAGA4SNwF-L9IrKsofXkOzF-XzJ9W7ha15UsAUKQLpe6Yu6skM5E9T4eKpXaLvu_Vgh7dNi4Jc-yTRHcM",
//        "scope" => "https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/drive.file",
//        "token_type" => "Bearer",
//        "created" => 1686887911,
//    ];

    public function __construct()
    {
        $this->fileId = env('GOOGLE_DRIVE_FILE_ID');
        $this->accessToken = [
            "access_token" => env('GOOGLE_DRIVE_ACCESS_TOKEN'),
            "expires_in" => env('GOOGLE_DRIVE_EXPIRES_IN'),
            "refresh_token" => env('GOOGLE_DRIVE_REFRESH_TOKEN'),
            "token_type" => env('GOOGLE_DRIVE_TOKEN_TYPE'),
            "created" => env('GOOGLE_DRIVE_CREATED'),
            "scope" => env('GOOGLE_DRIVE_SCOPE'),
        ];
    }

    public function upload($uploadFiles, $folderName, $filesName)
    {
        $client = new Google_Client();
        $client->setAuthConfig(public_path('google/' . env('GOOGLE_CLIENT_SECRET')));
        $client->setAccessToken($this->accessToken);
        $client->setScopes(array(
            'https://www.googleapis.com/auth/drive.file',
            'https://www.googleapis.com/auth/drive'
        ));
        $client->setAccessType("offline");
        $client->setApprovalPrompt("force");


        $service = new \Google_Service_Drive($client);

        $fileMetadata = new \Google_Service_Drive_DriveFile([
            'name' => $folderName,
            'mimeType' => 'application/vnd.google-apps.folder',
            'driveId' => $this->fileId,
            'parents' => array($this->fileId)
        ]);

        $optParams = array(
            'fields' => 'id',
//            'supportsAllDrives' => true,
        );

        $folder = $service->files->create($fileMetadata, $optParams);

        $result = [];

        foreach ($uploadFiles as $key => $uploadFile) {
            $fileName = $filesName . '-' . ($key + 1);
            $file = new \Google_Service_Drive_DriveFile([
                'name' => $fileName,
                'parents' => [$folder->id]
            ]);

            $fileContent = file_get_contents($uploadFile->getRealPath());

            $result[] = $service->files->create($file, [
                'data' => $fileContent,
                'uploadType' => 'multipart'
            ]);
        }

        return $folder->id;
    }
}
