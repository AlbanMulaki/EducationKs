<?php

namespace App\Http\Controllers\AdminPanel;

use App\Enum;
use App\Http\Controllers\Controller;
use App\Options;
use App\Users;
use App\Advertising;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use App\Attachment;
use Illuminate\Support\Facades\Storage;
use App\PostImage;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use App\GalleryImage;

class AttachmentController extends Controller {

    /**
     * User info detail
     * @var type 
     */
    private $user = null;

    /**
     *  Allowed Group role to access this object
     *  Enum::"role"
     * @var type 
     */
    private $allowed_role = array(Enum::ADMINISTRATOR, Enum::SUPER_ADMINISTRATOR);
    private $allowed_status = false;
    private $allowed_extension = array('jpg',
        'jpeg',
        'gif',
        'png',
        'zip',
        'xlsx',
        'cad',
        'pdf',
        'doc',
        'docx',
        'ppt',
        'pptx',
        'pps',
        'ppsx',
        'odt',
        'xls',
        'xlsx',
        '.mp3',
        'm4a',
        'ogg',
        'wav',
        'mp4',
        'm4v',
        'mov',
        'wmv');

    public function __construct() {
        //User info
        if (Session::get('id')) {
            $this->user = Users::getUserById(Crypt::decrypt(Session::get('id')));
        }
        // Check if the group role is allowed to access the object
        foreach ($this->allowed_role as $role) {
            if ($this->user['role_group'] == $role) {
                $this->allowed_status = true;
            }
        }
        view()->share("Enum", Enum::class);
        view()->share("users", $this->user);
    }

    public function getIndex() {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }
        //$storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        //$has_error = array_keys($errors);
        //$logo = 
        $ads = Advertising::getAll();
        return view('pages.admin.advertising.advertising', ['ON' => Enum::ON,
            'OFF' => Enum::OFF,
            'ads' => $ads,
            'firstElement' => true]);
    }

// echo (date("Y-d-m G:i:s", strtotime(Input::get('date')))); to UTC
//        echo (date("Y-d-m h:i:s A", strtotime($utc))); to AM PM
    public function postUpload($id = 0) {

        if (Input::hasFile('file_upload')) {//upload
            $file_upload = Input::file('file_upload');

            $mimeType = substr($file_upload->getMimeType(), 0, 5);
            if ($mimeType == "image") {
                $filename = date("d_m_Y_") . "_" . str_random(6) . $file_upload->getClientOriginalName();
                $fileDir = Enum::EDUCATIONKS_STORAGE . $filename;
                Storage::disk('publicdisk')->put(
                        $fileDir, file_get_contents($file_upload->getRealPath())
                );
                $fileDir = Storage::disk('publicdisk')->get(Enum::EDUCATIONKS_STORAGE . $filename);
                $this->resizeImageRatio($fileDir, $filename);
            } else {
                $filename = date("d_m_Y_") . "_" . str_random(6) . $file_upload->getClientOriginalName();
                $fileDir = Enum::EDUCATIONKS_STORAGE . $filename;
                $storage = Storage::disk('publicdisk')->put(
                        $fileDir, file_get_contents($file_upload->getRealPath())
                );
            }

            $attachment = new Attachment();
            $attachment->file_dir = Enum::EDUCATIONKS_STORAGE;

            $attachment->file_name = $filename;
            $attachment->file_size = $file_upload->getSize();
            $attachment->file_type = $file_upload->getMimeType();
            $attachment->save();
            return $attachment->toArray();
//            $ads->ads_content = Input::get('ads_content');
//            $ads->save();
//            return Redirect::back()->withInput()
//                            ->with('status', Lang::get('errors.successful_updated'))
//                            ->with('status-notification', "success")
//                            ->withErrors($valid);
        } else {//Error validation
            return array('message' => "Failed");
        }



        //echo (date("m-d-Y h:i:s O", strtotime($expiryDateUTC)));
    }

    public function postUploadGallery($id = 0) {
        if (Input::hasFile('file_upload')) {//update ads
            $file_upload = Input::file('file_upload');

            if (in_array($file_upload->getClientOriginalExtension(), $this->allowed_extension) == false) {
                return array('message' => "Failed extension");
            }
            $mimeType = substr($file_upload->getMimeType(), 0, 5);
            if ($mimeType == "image") {
                $filename = date("d_m_Y_") . "_" . str_random(6) . $file_upload->getClientOriginalName();
                $fileDir = Enum::EDUCATIONKS_STORAGE . $filename;
                Storage::disk('publicdisk')->put(
                        $fileDir, file_get_contents($file_upload->getRealPath())
                );
                $fileContent = Storage::disk('publicdisk')->get(Enum::EDUCATIONKS_STORAGE . $filename);
                $this->resizeImageRatio($fileContent, $filename);
                $galleryImage = new GalleryImage();
                $galleryImage->name = $file_upload->getClientOriginalName();
                $galleryImage->description = "";
                $galleryImage->album_id = Input::get('album_id');
                Storage::disk('publicdisk')->delete($fileDir);
            } else {
                $filename = date("d_m_Y_") . "_" . str_random(6) . $file_upload->getClientOriginalName();
                $fileDir = Enum::EDUCATIONKS_STORAGE . $filename;
                $storage = Storage::disk('publicdisk')->put(
                        $fileDir, file_get_contents($file_upload->getRealPath())
                );
            }
            $attachment = new Attachment();
            $attachment->file_dir = Enum::EDUCATIONKS_STORAGE;
            $attachment->file_name = $filename;
            $attachment->file_size = $file_upload->getSize();
            $attachment->file_type = $file_upload->getMimeType();
            $attachment->save();
            if (isset($galleryImage)) {
                $galleryImage->attachment_id = $attachment->id;
                $galleryImage->save();
            }
            return $attachment->toArray();
//            $ads->ads_content = Input::get('ads_content');
//            $ads->save();
//            return Redirect::back()->withInput()
//                            ->with('status', Lang::get('errors.successful_updated'))
//                            ->with('status-notification', "success")
//                            ->withErrors($valid);
        } else {//Error validation
            return array('message' => "Failed");
        }
    }

    public static function uploadAutonetImages($url, $albumId, $file, $title, $id) {
        $filename = date("d_m_Y_") . "_" . str_random(10) . ".jpg";
        $fileDir = Enum::EDUCATIONKS_STORAGE . $filename;

        Storage::disk('publicdisk')->put($fileDir, $file);  //Save file to storage
        $fileContent = Storage::disk('publicdisk')->get($fileDir);

        self::resizeImageRatioStatic($fileContent, $filename);   //Resize image


        $attachment = new Attachment();
        $attachment->file_dir = Enum::EDUCATIONKS_STORAGE;
        $attachment->file_name = $filename;
        $attachment->autonet_source = $id;
        $attachment->title = $title;
        $attachment->file_type = "image/jpeg";
        $attachment->save();

        $galleryImage = new GalleryImage();
        $galleryImage->name = $filename;
        $galleryImage->description = "";
        $galleryImage->name = $title;
        $galleryImage->attachment_id = $attachment->id;
        $galleryImage->album_id = $albumId;
        $galleryImage->save();

        Storage::disk('publicdisk')->delete($fileDir);
        return $galleryImage->id;
    }

    /**
     * Resize the image based on ratio and width size
     * @param type $fileDir
     * @param type $fileName
     */
    private function resizeImageRatio($fileDir, $fileName) {
        extract(Enum::getSizeImage(Enum::IMAGE_THUMBNAIL));
        $img = Image::make($fileDir)->resize($width, NULL, function ($constraint) {
                    $constraint->aspectRatio();
                })->save("assets/" . Enum::EDUCATIONKS_STORAGE . Enum::IMAGE_THUMBNAIL . "/" . $fileName);

        extract(Enum::getSizeImage(Enum::IMAGE_MEDIUM));
        $img = Image::make($fileDir)->resize($width, NULL, function ($constraint) {
                    $constraint->aspectRatio();
                })->save("assets/" . Enum::EDUCATIONKS_STORAGE . Enum::IMAGE_MEDIUM . "/" . $fileName);

        extract(Enum::getSizeImage(Enum::IMAGE_LARGE));
        $img = Image::make($fileDir)->resize($width, NULL, function ($constraint) {
                    $constraint->aspectRatio();
                })->save("assets/" . Enum::EDUCATIONKS_STORAGE . Enum::IMAGE_LARGE . "/" . $fileName);
    }

    private static function resizeImageRatioStatic($fileDir, $fileName) {
        extract(Enum::getSizeImage(Enum::IMAGE_THUMBNAIL));
        $img = Image::make($fileDir)->resize($width, NULL, function ($constraint) {
                    $constraint->aspectRatio();
                })->save("assets/" . Enum::EDUCATIONKS_STORAGE . Enum::IMAGE_THUMBNAIL . "/" . $fileName);

        extract(Enum::getSizeImage(Enum::IMAGE_MEDIUM));
        $img = Image::make($fileDir)->resize($width, NULL, function ($constraint) {
                    $constraint->aspectRatio();
                })->save("assets/" . Enum::EDUCATIONKS_STORAGE . Enum::IMAGE_MEDIUM . "/" . $fileName);

        extract(Enum::getSizeImage(Enum::IMAGE_LARGE));
        $img = Image::make($fileDir)->resize($width, NULL, function ($constraint) {
                    $constraint->aspectRatio();
                })->save("assets/" . Enum::EDUCATIONKS_STORAGE . Enum::IMAGE_LARGE . "/" . $fileName);
    }

}
