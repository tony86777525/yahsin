<?php

namespace App\Services;

use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;

class UploadToGoogleDrive
{
    public static function upload($file)
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));
        $service = new Google_Service_Drive($client);

        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => $file->getClientOriginalName(),
        ]);
        $fileContent = file_get_contents($file->getRealPath());

        $createdFile = $service->files->create($fileMetadata, [
            'data' => $fileContent,
            'mimeType' => 'application/pdf',
            'uploadType' => 'multipart',
            'fields' => 'id',
        ]);

        $client = new Google_Client();
        $client->setAuthConfig('path/to/credentials.json');
        $client->addScope(Google_Service_Drive::DRIVE);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        $accessToken = $client->fetchAccessTokenWithAssertion()["access_token"];
    }
}
