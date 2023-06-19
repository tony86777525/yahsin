<?php

namespace App\Services;

use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;

class UploadToGoogleDrive
{
    const GOOGLE_DRIVE_FILE_ID = '1m3WNr1Yr8vUTzBBAMxgbjOFmYvCsryNj';
    const ACCESS_TOKEN = [
        "access_token" => "ya29.a0AWY7CklXwZrtD0UjcNmKLE2K9HJxIrh41U8hN_Pbc4DoOsF-OMPEXOnwTiYTK3sWz0C33q7x4B2BtMZ_oA0wyMuRMsgXgZrNWzOusmCEGhKp4u1fHV7dfmzrz8qEqJnpATgYxSRBOfhXedkPgf5w0iQESh81aCgYKAbYSARESFQG1tDrpZFPP1VnkyT1zJoqj4fxhTQ0163",
        "expires_in" => 3599,
        "refresh_token" => "1//0emAbqXoaIRcHCgYIARAAGA4SNwF-L9IrKsofXkOzF-XzJ9W7ha15UsAUKQLpe6Yu6skM5E9T4eKpXaLvu_Vgh7dNi4Jc-yTRHcM",
        "scope" => "https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/drive.file",
        "token_type" => "Bearer",
        "created" => 1686887911,
    ];

    public static function upload($file)
    {
        $client = new Google_Client();
        $client->setAuthConfig(public_path('google/google_client_secret.json'));
        $client->setAccessToken(self::ACCESS_TOKEN);
        $client->setScopes(array(
            'https://www.googleapis.com/auth/drive.file',
            'https://www.googleapis.com/auth/drive'
        ));
        $client->setAccessType("offline");
        $client->setApprovalPrompt("force");


        $service = new \Google_Service_Drive($client);

        $fileMetadata = new \Google_Service_Drive_DriveFile([
            'name' => '訂單1',             // ADD YOUR GOOGLE DRIVE FOLDER NAME
            'mimeType' => 'application/vnd.google-apps.folder'
        ]);

        $folder = $service->files->update(self::GOOGLE_DRIVE_FILE_ID, $fileMetadata, ['fields' => 'id']);

        $file = new \Google_Service_Drive_DriveFile([
            'name' => 'pdf1.pdf',
            'parents' => [$folder->id]
        ]);

        $result = $service->files->create($file, [
            'data' => file_get_contents($file),
            'mimeType' => 'application/pdf',
            'uploadType' => 'media'
        ]);

        return $result;
    }
}
