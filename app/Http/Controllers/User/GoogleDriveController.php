<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoogleDriveController extends Controller
{
    public $gClient;

    function __construct(){

        $this->gClient = new \Google_Client();

        $this->gClient->setAuthConfig(public_path('google/google_client_secret.json'));
        $this->gClient->setAccessToken($this->getAccessToken());

//        $this->gClient->setApplicationName('YahSin upload'); // ADD YOUR AUTH2 APPLICATION NAME (WHEN YOUR GENERATE SECRATE KEY)
//        $this->gClient->setClientId('923183289387-386nqutpl642ied36ke5vdhmg2hj62tg.apps.googleusercontent.com');
//        $this->gClient->setClientSecret('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');
//        $this->gClient->setRedirectUri(route('google.login'));
//        $this->gClient->setDeveloperKey('AIzaSyB8P5ZBfdTI2VOCXFMMYYwAKanVDFcXReM');
        $this->gClient->setScopes(array(
            'https://www.googleapis.com/auth/drive.file',
            'https://www.googleapis.com/auth/drive'
        ));

        $this->gClient->setAccessType("offline");

        $this->gClient->setApprovalPrompt("force");
    }

    public function googleLogin(Request $request)  {

        $google_oauthV2 = new \Google_Service_Oauth2($this->gClient);

        if ($request->get('code')){

            $this->gClient->authenticate($request->get('code'));

            $request->session()->put('token', $this->gClient->getAccessToken());
        }

        if ($request->session()->get('token')){

            $this->gClient->setAccessToken($request->session()->get('token'));
        }

        if ($this->gClient->getAccessToken()){

            //FOR LOGGED IN USER, GET DETAILS FROM GOOGLE USING ACCES
//            $user = User::find(1);
//
//            $user->access_token = json_encode($request->session()->get('token'));
//
//            $user->save();

            dd($request->session()->get('token'));

        } else{

            // FOR GUEST USER, GET GOOGLE LOGIN URL
            $authUrl = $this->gClient->createAuthUrl();

            return redirect()->to($authUrl);
        }
    }

    public function googleDriveFilePpload()
    {
        $service = new \Google_Service_Drive($this->gClient);

        $fileMetadata = new \Google_Service_Drive_DriveFile(array(
            'name' => '訂單1',             // ADD YOUR GOOGLE DRIVE FOLDER NAME
            'mimeType' => 'application/vnd.google-apps.folder'));

        $folder = $service->files->update('1m3WNr1Yr8vUTzBBAMxgbjOFmYvCsryNj', $fileMetadata, array('fields' => 'id'));

        printf("Folder ID: %s\n'1111'", $folder->id);

        $file = new \Google_Service_Drive_DriveFile(array('name' => 'pdf1.pdf','parents' => array($folder->id)));

        $result = $service->files->create($file, array(
            'data' => file_get_contents(public_path('google/testdc.pdf')), // ADD YOUR FILE PATH WHICH YOU WANT TO UPLOAD ON GOOGLE DRIVE
            'mimeType' => 'application/pdf',
            'uploadType' => 'media'
        ));

        // GET URL OF UPLOADED FILE

        $url='https://drive.google.com/open?id='.$result->id;

        dd($result);
    }

    private function getAccessToken()
    {
        // 先用 googleLogin 取得一次
        return [
            "access_token" => "ya29.a0AWY7CklXwZrtD0UjcNmKLE2K9HJxIrh41U8hN_Pbc4DoOsF-OMPEXOnwTiYTK3sWz0C33q7x4B2BtMZ_oA0wyMuRMsgXgZrNWzOusmCEGhKp4u1fHV7dfmzrz8qEqJnpATgYxSRBOfhXedkPgf5w0iQESh81aCgYKAbYSARESFQG1tDrpZFPP1VnkyT1zJoqj4fxhTQ0163",
            "expires_in" => 3599,
            "refresh_token" => "1//0emAbqXoaIRcHCgYIARAAGA4SNwF-L9IrKsofXkOzF-XzJ9W7ha15UsAUKQLpe6Yu6skM5E9T4eKpXaLvu_Vgh7dNi4Jc-yTRHcM",
            "scope" => "https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/drive.file",
            "token_type" => "Bearer",
            "created" => 1686887911,
        ];
    }
}
