<?php

namespace App\Http\Controllers\AdminPanel;

use App\Enum;
use App\Http\Controllers\Controller;
use App\Options;
use App\Users;
use App\Gallery;
use App\GalleryImage;
use App\GalleryAlbum;
use App\GalleryAutonet;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Illuminate\Pagination\Paginator;
use GrahamCampbell\HTMLMin\Facades\HTMLMin;
use Illuminate\Support\Facades\Request;

class GalleryController extends Controller {

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
    private $allowed_role = array(Enum::ADMINISTRATOR,
        Enum::SUPER_ADMINISTRATOR,
        Enum::EDITOR,
        Enum::EDITOR_ENGLISH,
        Enum::EDITOR_ESTONIAN,
        Enum::EDITOR_LATVIA,
        Enum::EDITOR_LITHUANIA,
        Enum::EDITOR_RUSSIAN);
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
        view()->share("users", $this->user);
    }

    /**
     * Get index of gallery module (Latest images uploaded,List Gallery,Album)
     * @return Response
     */
    public function getIndex() {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }
        $images = GalleryImage::take(16)
                ->with('attachment')
                ->orderBy('created_at', 'DESC')
                ->get();
        $galleries = Gallery::with('album')
                        ->orderBy('updated_at', 'DESC')->get();
        $galleryImage = $images->groupBy('album_id');
        $album = GalleryAlbum::all('id', 'name', 'gallery_id');
        return view('pages.admin.gallery.index', ['images' => $images,
            'galleries' => $galleries,
            'album' => $album,
            'galleryImage' => $galleryImage,
            'Enum' => Enum::class]);
    }

    /**
     * Get all images of album  
     * @param type $albumId
     * @return View
     */
    public function getAlbum($albumId) {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }

        $album = GalleryAlbum::all('id', 'name', 'gallery_id');
        $selectedAlbum = $album->find($albumId);
        //Get Gallery image
        $galleryImage = GalleryImage::where('album_id', '=', $albumId)
                ->with('attachment')
                ->with('album')
                ->orderBy('created_at', 'DESC')
                ->get();
        $gallery = Gallery::all('id', 'name');
//        return $images;
//        $galleryIamge = $images->groupBy('album_id');
//        echo "<pre>";
        //Get gallery autonet
        $dontSync = array();
        foreach ($galleryImage as $image) {
            $dontSync[] = $image->attachment->autonet_source;
        }
//        return $dontSync;
        $galleryAutonet = GalleryAutonet::where('pealkiri', 'LIKE', '%' . $selectedAlbum->name . '%')
                ->where('pealkiri', 'LIKE', '%' . $selectedAlbum->gallery->name . '%')
                ->whereNotIn('id', $dontSync)
                ->orderBy('id', 'DESC')
                ->get(['pealkiri', 'url', 'id']);
        $galleryAutonetArray = $galleryAutonet->toArray();
        $autonet = array();
        $i = 0;
        foreach ($galleryAutonetArray as $image) {
            $autonet[$i]['name'] = $image['pealkiri'];
            $autonet[$i]['id'] = $image['id'];
            $autonet[$i]['attachment']['url'] = $image['url'];
            $i++;
        }
        //Merge gallery of autonet and autopub
        $galleryImageSync = array_merge($galleryImage->toArray(), $autonet);
        //Make paginator

        $perPage = 24;
        $galleryImageSync = array_chunk($galleryImageSync, $perPage);
        $galleryPaginator = new Paginator($galleryImageSync, $perPage, Input::get('page'));
        $galleryPaginator->setPath('');
        $pageNum = count($galleryImageSync);
        $temp = $galleryPaginator->toArray();
        $gallerySynced = array();
        $page = (Input::get('page') > 0 ? Input::get('page') - 1 : 0);
        if (isset($galleryImageSync[$page])) {
            foreach ($galleryImageSync[$page] as $image) {
                $gallerySynced[] = $image;
            }
        }
        unset($temp);

        if (Request::ajax()) {
            return array('images' => $gallerySynced, 'pageNum' => $pageNum);
        }

        return view('pages.admin.gallery.album', [
            'gallery' => $gallery,
            'album' => $album,
            'selectedAlbum' => $selectedAlbum,
            'gallerySynced' => $gallerySynced,
            'galleryImage' => $galleryImage,
            'galleryPaginator' => $galleryPaginator,
            'autonet_url' => $this->autonet_url,
            'pageNum' => $pageNum,
            'Enum' => Enum::class]);
    }

    /**
     * Delete album 
     * @param type $albumId
     * @return Redirect
     */
    public function getAlbumDelete($albumId) {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }
        if (is_numeric($albumId) && $albumId > 0) {
            try {
                $galleryAlbum = GalleryAlbum::findOrFail($albumId);
                foreach ($galleryAlbum->galleryImage as $image) {
                    $image->delete();
                }
                $galleryAlbum->delete();
                return Redirect::action('AdminPanel\GalleryController@getIndex')
                                ->withInput()
                                ->with('status', Lang::get('errors.success_deleted', ["argument" => $galleryAlbum->name]))
                                ->with('status-notification', "success");
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return Redirect::action('AdminPanel\GalleryController@getIndex')
                                ->withInput()
                                ->with('status', Lang::get('errors.error_album_doesnt_exist', ['argument' => $albumId]))
                                ->with('status-notification', "error");
            }
        } else {//Error validation
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error");
        }
    }

    /**
     * Update data of album
     * @param type $albumId
     * @return Redirect
     */
    public function getAlbumUpdate($albumId) {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }
        //return "hello ".$id;

        $valid = Validator::make(Input::all(), [
                    'name' => 'required']);

        if ($valid->passes()) {
            $album = GalleryAlbum::find($albumId); // To build edit image
            $album->name = Input::get('name');
            $album->save();
            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.successful_updated', ['argument' => $album->name]))
                            ->with('status-notification', "success")
                            ->withErrors($valid);
        } else {//Error validation
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error")
                            ->withErrors($valid);
        }
    }

    /**
     * Create new album
     * @param type $galleryId
     * @return View
     */
    public function getAlbumCreate($galleryId) {
        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }
        $gallery = Gallery::find($galleryId);
        return view('pages.admin.gallery.createAlbum', [
            'gallery' => $gallery,
            'Enum' => Enum::class]);
    }

    /**
     * Create ( Add ) new gallery procesing
     * @param type $galleryId
     * @return Redirect
     */
    public function postAlbumCreate($galleryId) {

        $valid = Validator::make(Input::all(), [
                    'name' => 'required']);

        if ($valid->passes()) {
            try {
                $album = new GalleryAlbum();
                $album->name = Input::get('name');
                $album->gallery_id = $galleryId;
                $album->save();
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return Redirect::back()->withInput()
                                ->with('status', Lang::get('errors.error_album_doesnt_exist'))
                                ->with('status-notification', "success")
                                ->withErrors($valid);
            }
            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.success_add_album', ['argument' => $album->name]))
                            ->with('status-notification', "success")
                            ->withErrors($valid);
        } else {//Error validation
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error")
                            ->withErrors($valid);
        }
    }

    /**
     * Delete imaged based on id
     * @param type $imageId
     * @return View
     */
    public function getDelete($imageId) {

        if ($this->allowed_status == false) {
            return Redirect::action('AdminPanel\AuthController@getLogout');
        }

        if (is_numeric($imageId) && $imageId > 0) {//validation pass
            try {
                $galleryImage = GalleryImage::findOrFail($imageId);
                if (isset($image->postImage)) {
                    $image->postImage->delete();
                }
                $galleryImage->delete();
                return Redirect::back()
                                ->withInput()
                                ->with('status', Lang::get('errors.success_deleted', ["argument" => $galleryImage->name]))
                                ->with('status-notification', "success");
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return Redirect::action('AdminPanel\GalleryController@getIndex')
                                ->withInput()
                                ->with('status', Lang::get('errors.error_image_doesnt_exist', ['argument' => $imageId]))
                                ->with('status-notification', "error");
            }
        } else {
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error");
        }
        return Redirect::back();
    }

    /**
     * Edit the image based on id 
     * @param type $imageId
     * @return Redirect
     */
    public function postEditImage($imageId) {
        $valid = Validator::make(Input::all(), [
                    'gallery_id' => 'required',
                    'album_id' => 'required',
                    'name' => 'required',
                    'description' => 'required']);

        if ($valid->passes()) {
            try {
                $gallery = Gallery::findOrFail(Input::get('gallery_id'));
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                $gallery = new Gallery();
                $gallery->name = Input::get('gallery_id');
                $gallery->save();
            }
            try {
                $album = GalleryAlbum::findOrFail(Input::get('album_id'));
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                $album = new GalleryAlbum();
                $album->name = Input::get('album_id');
                $album->gallery_id = $gallery->id;
                $album->save();
            }
            $galleryImage = GalleryImage::find($imageId); // To build edit image
            $galleryImage->name = Input::get('name');
            $galleryImage->description = Input::get('description');
            $galleryImage->album_id = $album->id;
            $galleryImage->save();
            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.successful_updated', ['argument' => $galleryImage->name]))
                            ->with('status-notification', "success")
                            ->withErrors($valid);
        } else {//Error validation
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error")
                            ->withErrors($valid);
        }
    }

    /**
     * 
     * Return All Album by Gallery Id
     * Response ['id':null,'name': null] 
     * Format:JSON
     * @param type $id
     * @return type JSON
     */
    public function getAlbumByGalleryId($id) {
        $album = GalleryAlbum::where('gallery_id', $id)->get();
        return response()->json($album->toArray());
    }

    /**
     * Create ( Add ) new gallery procesing
     * @return Redirect
     */
    public function postCreateGallery() {

        $valid = Validator::make(Input::all(), [
                    'name' => 'required']);

        if ($valid->passes()) {
            try {
                $gallery = new Gallery();
                $gallery->name = Input::get('name');
                $gallery->save();
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return Redirect::back()->withInput()
                                ->with('status', Lang::get('errors.error_gallery_doesnt_exist'))
                                ->with('status-notification', "success")
                                ->withErrors($valid);
            }
            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.success_add_gallery', ['argument' => $gallery->name]))
                            ->with('status-notification', "success")
                            ->withErrors($valid);
        } else {//Error validation
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error")
                            ->withErrors($valid);
        }
    }

    /**
     * Delete gallery with album and images on it
     * @param type $galleryId
     * @return Redirect
     */
    public function postDeleteGallery($galleryId) {
        if (is_numeric($galleryId) && $galleryId > 0) {
            try {
                $gallery = Gallery::findOrFail($galleryId);
                foreach ($gallery->album as $galleryAlbum) {
                    $album = GalleryAlbum::find($galleryAlbum->id);
                    foreach ($album->galleryImage as $image) {
                        $image->delete();
                    }
                    $album->delete();
                }
                //return $albumsID;
                $gallery->delete();
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return Redirect::back()->withInput()
                                ->with('status', Lang::get('errors.error_gallery_doesnt_exist'))
                                ->with('status-notification', "success");
            }
            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.successful_updated', ['argument' => $gallery->name]))
                            ->with('status-notification', "success");
        } else {//Error validation
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error");
        }
    }

    /**
     * Update data of gallery based on Id
     * @param type $id
     * @return Redirect
     */
    public function postUpdateGallery($id) {

        $valid = Validator::make(Input::all(), [
                    'name' => 'required']);


        if ($valid->passes()) {
            try {
                $gallery = Gallery::findOrFail($id);
                $gallery->name = Input::get('name');
                $gallery->save();
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return Redirect::back()->withInput()
                                ->with('status', Lang::get('errors.error_gallery_doesnt_exist'))
                                ->with('status-notification', "success")
                                ->withErrors($valid);
            }
            return Redirect::back()->withInput()
                            ->with('status', Lang::get('errors.successful_updated', ['argument' => $gallery->name]))
                            ->with('status-notification', "success")
                            ->withErrors($valid);
        } else {//Error validation
            return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                            ->with('status-notification', "error")
                            ->withErrors($valid);
        }
    }

}
