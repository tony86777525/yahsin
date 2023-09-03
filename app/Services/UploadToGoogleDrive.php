<?php

namespace App\Services;

use App\Models\GoogleAccessToken;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;

class UploadToGoogleDrive
{
    private $fileId;
    private $accessToken;
    private $googleClientSecret;

    public function __construct()
    {
        $googleAccessToken = GoogleAccessToken::all()->pluck('value', 'key');

        $this->fileId = $googleAccessToken['GOOGLE_DRIVE_FILE_ID'];
        $this->accessToken = [
            "access_token" => $googleAccessToken['GOOGLE_DRIVE_ACCESS_TOKEN'],
            "expires_in" => $googleAccessToken['GOOGLE_DRIVE_EXPIRES_IN'],
            "refresh_token" => $googleAccessToken['GOOGLE_DRIVE_REFRESH_TOKEN'],
            "token_type" => $googleAccessToken['GOOGLE_DRIVE_TOKEN_TYPE'],
            "created" => $googleAccessToken['GOOGLE_DRIVE_CREATED'],
            "scope" => $googleAccessToken['GOOGLE_DRIVE_SCOPE'],
        ];

        $this->googleClientSecret = env('GOOGLE_CLIENT_SECRET');
    }

    public function upload($uploadFiles, $folderName, $filesName)
    {
        $client = new Google_Client();
        $client->setAuthConfig(public_path('google/' . $this->googleClientSecret));
        $client->setScopes(array(
            'https://www.googleapis.com/auth/drive.file',
            'https://www.googleapis.com/auth/drive'
        ));
        $client->setAccessType("offline");
        $client->setApprovalPrompt("force");
        $client->setAccessToken($this->accessToken);

//        $newAccessToken = '';
//dd($client->isAccessTokenExpired());
//        if ($client->isAccessTokenExpired() === true) {
//            $newAccessToken = $client->refreshToken($this->accessToken['refresh_token']);
//        }
//        dd($newAccessToken);

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
