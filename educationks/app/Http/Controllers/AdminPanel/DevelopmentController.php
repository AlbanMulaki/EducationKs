<?php

namespace App\Http\Controllers\AdminPanel;

use App\Enum;
use App\Http\Controllers\Controller;
use App\Options;
use App\Users;
use App\Gallery;
use App\GalleryImage;
use App\GalleryAlbum;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\DB;
use App\GalleryAutonet;
use Illuminate\Pagination\Paginator;

class DevelopmentController extends Controller {

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
    private $autonet_url = "http://pics.autonet.ee/";

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

    public function galleryAutonet() {
        
    }

    public function getIndex() {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }



        return "<a href='https://www.facebook.com/dialog/feed?
  app_id=145634995501895
  &amp;display=popup&amp;caption=lorem-ipsum-asdf
  &amp;link=http://dev.autopub/carssport/lorem-ipsum-asdf
  &amp;redirect_uri=https%3A%2F%2Fdevelopers.facebook.com%2Ftools%2Fexplorer' >asdasd</a>";

        //Get gallery autonet
        $galleryAutonet = GalleryAutonet::where('pealkiri', 'LIKE', '%BMW%')->orderBy('id', 'DESC')->get(['pealkiri', 'url', 'id']);
        $galleryAutonetArray = $galleryAutonet->toArray();
        $autonet = array();
        $i = 0;
        foreach ($galleryAutonetArray as $image) {
            $autonet[$i]['name'] = $image['pealkiri'];
            $autonet[$i]['id'] = $image['id'];
            $autonet[$i]['attachment']['url'] = $image['url'];
            $i++;
        }

        //Get Gallery image
        $galleryImage = GalleryImage::where('album_id', '=', 72)
                ->with('attachment')
                ->orderBy('created_at', 'DESC')
                ->get();
        //Merge gallery of autonet and autopub

        $galleryImageMerge = array_merge($autonet, $galleryImage->toArray());

        //Make paginator
        $paginate = new Paginator($galleryImageMerge, 10, Input::get('page'));
        $paginate->setPath('');
        $temp = $paginate->toArray();
        $images = array();
        for ($i = $temp['from']; $i <= $temp['to']; $i++) {
            $images[] = $galleryImageMerge[$i];
        }
        unset($temp);

        return view('pages.admin.dev', [
            'autonet_url' => $this->autonet_url,
            'paginate' => $paginate,
            'images' => $images,
            'Enum' => Enum::class
        ]);
    }

}

?>