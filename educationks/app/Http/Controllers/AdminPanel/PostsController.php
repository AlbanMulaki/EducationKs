<?php

    namespace App\Http\Controllers\AdminPanel;

    use App\Enum;
    use App\Http\Controllers\Controller;
    use Illuminate\Database\Eloquent\Collection;
    use App\Options;
    use App\Users;
    use Illuminate\Support\Facades\Crypt;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Input;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Lang;
    use Illuminate\Support\Facades\Hash;
    use App\UsersRole;
    use App\Category;
    use Illuminate\Support\Facades\Storage;
    use App\Classes\LogSystem;
    use Illuminate\Support\Facades\Event;
    use App\Post;
    use App\PostImage;
    use Illuminate\Support\Facades\Request;
    use App\Gallery;
    use App\GalleryAlbum;
    use App\GalleryAutonet;
    use App\GalleryImage;

    class PostsController extends Controller {

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

        public function __construct() {
            LogSystem::start();
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
            view()->share("Enum", Enum::class);
        }

        /**
         * Get list of user and front of user module
         * Access: Administrator, Super Administrator
         * @return View
         */
        public function getIndex() {
            if ($this->allowed_status == false) {
                return Redirect::action('AdminPanel\AuthController@getLogout');
            }
            $category = Category::all();



            if (Enum::isEditor($this->user['role_group'])) {
                $post = Post::where('title_' . Enum::getEditorLanguage($this->user['role_group']), '!=', '')->orderBy('id', 'DESC')->paginate()->setPath("");
            } else {

                //Sorting start here
                if (request()->get('title')) { // Sort by title
                    if (request()->get('title') == Enum::DESC) {
                        $post = Post::orderBy('title_' . app()->getLocale(), 'DESC')
                                ->paginate()
                                ->setPath("")
                                ->appends(['title' => request()->get('title')]);
                        $postTrashed = Post::orderBy('title_' . app()->getLocale(), 'DESC')
                                ->onlyTrashed()
                                ->paginate()
                                ->setPath("")
                                ->appends(['title' => request()->get('title')]);
                    } else {
                        $post = Post::orderBy('title_' . app()->getLocale(), 'ASC')
                                ->paginate()
                                ->setPath("")
                                ->appends(['title' => request()->get('title')]);
                        $postTrashed = Post::orderBy('title_' . app()->getLocale(), 'ASC')
                                ->onlyTrashed()
                                ->paginate()
                                ->setPath("")
                                ->appends(['title' => request()->get('title')]);
                    }
                } elseif (request()->get('author')) { // Sort by author
                    if (request()->get('author') == Enum::DESC) {
                        $post = Post::orderBy('user_id', 'DESC')
                                ->paginate()
                                ->setPath("")
                                ->appends(['author' => request()->get('author')]);
                        $postTrashed = Post::orderBy('user_id', 'DESC')
                                ->onlyTrashed()
                                ->paginate()
                                ->setPath("")
                                ->appends(['author' => request()->get('author')]);
                    } else {
                        $post = Post::orderBy('user_id', 'ASC')
                                ->paginate()
                                ->setPath("")
                                ->appends(['author' => request()->get('author')]);
                        $postTrashed = Post::orderBy('user_id', 'ASC')
                                ->onlyTrashed()
                                ->paginate()
                                ->setPath("")
                                ->appends(['author' => request()->get('author')]);
                    }
                } elseif (request()->get('category')) { // Sort by author
                    if (request()->get('category') == Enum::DESC) {
                        $post = Post::orderBy('category_id', 'DESC')
                                ->paginate()
                                ->setPath("")
                                ->appends(['category' => request()->get('category')]);
                        $postTrashed = Post::orderBy('category_id', 'DESC')
                                ->onlyTrashed()
                                ->paginate()
                                ->setPath("")
                                ->appends(['category' => request()->get('category')]);
                    } else {
                        $post = Post::orderBy('category_id', 'ASC')
                                ->paginate()
                                ->setPath("")
                                ->appends(['category' => request()->get('category')]);
                        $postTrashed = Post::orderBy('category_id', 'ASC')
                                ->onlyTrashed()
                                ->paginate()
                                ->setPath("")
                                ->appends(['category' => request()->get('category')]);
                    }
                } elseif (request()->get('date')) { // Sort by author
                    if (request()->get('date') == Enum::DESC) {
                        $post = Post::orderBy('created_at', 'DESC')
                                ->paginate()
                                ->setPath("")
                                ->appends(['date' => request()->get('date')]);
                        $postTrashed = Post::orderBy('created_at', 'DESC')
                                ->onlyTrashed()
                                ->paginate()
                                ->setPath("")
                                ->appends(['date' => request()->get('date')]);
                    } else {
                        $post = Post::orderBy('created_at', 'ASC')
                                ->paginate()
                                ->setPath("")
                                ->appends(['date' => request()->get('date')]);
                        $postTrashed = Post::orderBy('created_at', 'ASC')
                                ->onlyTrashed()
                                ->paginate()
                                ->setPath("")
                                ->appends(['date' => request()->get('date')]);
                    }
                } else {
                    $post = Post::orderBy('id', 'DESC')->paginate()->setPath("");
                    $postTrashed = Post::orderBy('id', 'DESC')
                            ->onlyTrashed()
                            ->paginate()
                            ->setPath("");
                }
            }
            return view('pages.admin.posts.index', [
                'posts' => $post,
                'Enum' => Enum::class,
                'postTrashed' => $postTrashed,
                'category' => $category]);
        }

        public function getCreate() {

            if ($this->allowed_status == false) {
                return Redirect::action('AdminPanel\AuthController@getLogout');
            }
            $category = Category::all();
            $galleries = Gallery::all(['id', 'name']);
            return view('pages.admin.posts.addPost', ['category' => $category,
                'galleries' => $galleries,
                'Enum' => Enum::class]);
        }

        /**
         * Create new post
         * Access: Administrator, Super Administrator
         * @return Processing
         */
        public function postCreate() {
            if ($this->allowed_status == false) {
                return Redirect::action('AdminPanel\AuthController@getLogout');
            }



            $valid = Validator::make(Input::all(), [
                        'category_id' => "required"
            ]);

            if ($valid->passes()) {


                $post = new Post();
                $post->title_ee = Input::get('title_ee');
                $post->title_en = Input::get('title_en');
                $post->title_lv = Input::get('title_lv');
                $post->title_lt = Input::get('title_lt');
                $post->title_ru = Input::get('title_ru');
                $post->description_en = Input::get('description_en');
                $post->description_ee = Input::get('description_ee');
                $post->description_lv = Input::get('description_lv');
                $post->description_lt = Input::get('description_lt');
                $post->category_id = Input::get('category_id');
                $post->slug_ee = Enum::create_slug(Input::get('title_ee'));
                $post->slug_en = Enum::create_slug(Input::get('title_en'));
                $post->slug_lv = Enum::create_slug(Input::get('title_lv'));
                $post->slug_lt = Enum::create_slug(Input::get('title_lt'));
                $post->slug_ru = Enum::create_slug(Input::get('title_ru'));
                $post->user_id = $this->user['id'];

                // Feature image
                $validFeature = Validator::make(Input::all(), ['galleryattachmentImageAutonetIdFeature' => 'required']);
                $validAutoPubFeature = Validator::make(Input::all(), ['galleryAttachmentImageAutopubFeature' => 'required']);
                if ($validFeature->passes()) {// import feature image from autonet
                    $title = Input::get('galleryattachmentImageAutonetTitleFeature');
                    $idAutonet = Input::get('galleryattachmentImageAutonetIdFeature');
                    $postImage = new PostImage();
                    $filenameDirAutonet = str_replace('/pics/n', '/pics/m', Input::get('galleryAttachmentImageAutonetFeature'));
                    $autonetImageContent = self::http_get_contents($filenameDirAutonet);   // Get file content of autonet image
                    $autonetAttachment = AttachmentController::uploadAutonetImages($filenameDirAutonet, Input::get('albumIdFeature'), $autonetImageContent, $title, $idAutonet);
                    $post->feature_image = $autonetAttachment;
                } else if ($validAutoPubFeature->passes()) {
                    $post->feature_image = Input::get("galleryAttachmentImageAutopubFeature");
                }

                $post->save();



                //Upload gallery image
                $validAutopub = Validator::make(Input::all(), ['galleryAttachmentImageAutopub' => 'required']);
                if ($validAutopub->passes()) {
                    $postImageLastSort = 0;
                    foreach (Input::get('galleryAttachmentImageAutopub') as $autopubImage) {
                        $postImage = new PostImage();
                        $postImage->post_id = $post->id;
                        $postImage->gallery_image_id = $autopubImage;
                        $postImage->sort_index = $postImageLastSort + 1;
                        $postImage->save();
                        $postImageLastSort++;
                    }
                } else {
                    $validAutoNet = Validator::make(Input::all(), ['galleryAttachmentImageAutonet' => 'required']);
                    if ($validAutoNet->passes()) {
                        $i = 0;
                        foreach (Input::get('galleryAttachmentImageAutonet') as $autonetImage) {
                            $postImageLastSort = PostImage::where('post_id', '=', $postId)->max('sort_index');
                            $title = Input::get('galleryattachmentImageAutonetTitle.' . $i);
                            $idAutonet = Input::get('galleryattachmentImageAutonetId.' . $i);
                            $postImage = new PostImage();
                            $filenameDirAutonet = str_replace('/pics/n', '/pics/m', $autonetImage);
                            $autonetImageContent = self::http_get_contents($filenameDirAutonet);   // Get file content of autonet image
                            $autonetAttachment = AttachmentController::uploadAutonetImages($filenameDirAutonet, Input::get('albumId'), $autonetImageContent, $title, $idAutonet);
                            $postImage->post_id = $postId;
                            $postImage->gallery_image_id = $autonetAttachment;
                            $postImage->sort_index = $postImageLastSort + 1;
                            $postImage->save();
                            $i++;
                        }
                    }
                }

                return Redirect::action('AdminPanel\PostsController@getEdit', array("id" => $post->id))->withInput()
                                ->with('status', Lang::get('errors.post.add_post_successful', ["argument" => Input::get('title_en')]))
                                ->with('status-notification', "success");
            } else {
                return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                                ->with('status-notification', "error");
            }
        }

        /**
         * 
         * Edit Post
         * Access: All Role
         * @param $postId
         * @return View
         */
        public function getEdit($postId) {
            if ($this->allowed_status == false) {
                return Redirect::action('AdminPanel\AuthController@getLogout');
            }

            try {
                $categoryEdit = Category::find($postId);
                $category = Category::all();
                $postEdit = Post::find($postId);
                $galleries = Gallery::all(['id', 'name']);

                return view('pages.admin.posts.edit', [
                    'categoryEdit' => $categoryEdit,
                    'postEdit' => $postEdit,
                    'category' => $category,
                    'galleries' => $galleries,
                    'Enum' => Enum::class
                ]);
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return Redirect::back()
                                ->withInput()
                                ->with('status', Lang::get('errors.error_category_doesnt_exist', ['argument' => $id]))
                                ->with('status-notification', "error");
            }
        }

        public function http_get_contents($url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_TIMEOUT, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            if (FALSE === ($retval = curl_exec($ch))) {
                error_log(curl_error($ch));
            } else {
                return $retval;
            }
        }

        /**
         * Delete post
         * @param type $postId
         * @return Processing
         */
        public function postUpdate($postId) {

            if ($this->allowed_status == false) {
                return Redirect::action('AdminPanel\AuthController@getLogout');
            }
            $valid = Validator::make(Input::all(), [
                        'category_id' => "required"
            ]);

            if ($valid->passes()) {

                //Update image
                $validAutopub = Validator::make(Input::all(), ['galleryAttachmentImageAutopub' => 'required']);
                if ($validAutopub->passes()) {
                    foreach (Input::get('galleryAttachmentImageAutopub') as $autopubImage) {
                        $postImageLastSort = PostImage::where('post_id', '=', $postId)->max('sort_index');
                        $postImage = new PostImage();
                        $postImage->post_id = $postId;
                        $postImage->gallery_image_id = $autopubImage;
                        $postImage->sort_index = $postImageLastSort + 1;
                        $postImage->save();
                    }
                }

                $validAutoNet = Validator::make(Input::all(), ['galleryAttachmentImageAutonet' => 'required']);
                if ($validAutoNet->passes()) {
                    $i = 0;
                    foreach (Input::get('galleryAttachmentImageAutonet') as $autonetImage) {
                        $postImageLastSort = PostImage::where('post_id', '=', $postId)->max('sort_index');
                        $title = Input::get('galleryattachmentImageAutonetTitle.' . $i);
                        $idAutonet = Input::get('galleryattachmentImageAutonetId.' . $i);
                        $postImage = new PostImage();
                        $filenameDirAutonet = str_replace('/pics/n', '/pics/m', $autonetImage);
                        $autonetImageContent = self::http_get_contents($filenameDirAutonet);   // Get file content of autonet image
                        $autonetAttachment = AttachmentController::uploadAutonetImages($filenameDirAutonet, Input::get('albumId'), $autonetImageContent, $title, $idAutonet);
                        $postImage->post_id = $postId;
                        $postImage->gallery_image_id = $autonetAttachment;
                        $postImage->sort_index = $postImageLastSort + 1;
                        $postImage->save();
                        $i++;
                    }
                }

                // Update post data
                $post = Post::find($postId);
                $post->title_ee = Input::get('title_ee');
                $post->title_en = Input::get('title_en');
                $post->title_lv = Input::get('title_lv');
                $post->title_lt = Input::get('title_lt');
                $post->title_ru = Input::get('title_ru');
                $post->description_en = Input::get('description_en');
                $post->description_ee = Input::get('description_ee');
                $post->description_lv = Input::get('description_lv');
                $post->description_lt = Input::get('description_lt');
                $post->category_id = Input::get('category_id');

                // Update feature image
                $validFeature = Validator::make(Input::all(), ['galleryattachmentImageAutonetIdFeature' => 'required']);
                $validAutoPubFeature = Validator::make(Input::all(), ['galleryAttachmentImageAutopubFeature' => 'required']);
                if ($validFeature->passes()) {// import feature image from autonet
                    $title = Input::get('galleryattachmentImageAutonetTitleFeature');
                    $idAutonet = Input::get('galleryattachmentImageAutonetIdFeature');
                    $postImage = new PostImage();
                    $filenameDirAutonet = str_replace('/pics/n', '/pics/m', Input::get('galleryAttachmentImageAutonetFeature'));
                    $autonetImageContent = self::http_get_contents($filenameDirAutonet);   // Get file content of autonet image
                    $autonetAttachment = AttachmentController::uploadAutonetImages($filenameDirAutonet, Input::get('albumIdFeature'), $autonetImageContent, $title, $idAutonet);
                    $post->feature_image = $autonetAttachment;
                } else if ($validAutoPubFeature->passes()) {
                    $post->feature_image = Input::get("galleryAttachmentImageAutopubFeature");
                }

                $post->save();
                return Redirect::back()->withInput()
                                ->with('status', Lang::get('errors.successful_updated', ["argument" => Input::get('title_en')]))
                                ->with('status-notification', "success");
            } else {
                return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                                ->with('status-notification', "error");
            }
        }

        /**
         * Sort post image album 
         * @param type $postIdDragged, $postIdTarget
         * @return Redirect
         */
        public function getSortPostImage($postImageIdDragged, $postImageIdTarget) {
            if ($this->allowed_status == false) {
                return Redirect::action('AdminPanel\AuthController@getLogout');
            }

            if (is_numeric($postImageIdDragged) && $postImageIdDragged > 0) {
                $imageDragged = PostImage::find($postImageIdDragged);
                $imageTarget = PostImage::find($postImageIdTarget);

                $swapSortIndex = $imageDragged->sort_index;  // Save on temporary var
                $imageDragged->sort_index = $imageTarget->sort_index;
                $imageTarget->sort_index = $swapSortIndex;
                $imageDragged->save();
                $imageTarget->save();
                return "OK";
            }
            return "FAIL";
        }

        /**
         * Delete post 
         * Access: Super Administrator
         * @param type $id
         * @return View
         */
        public function getDelete($id) {

            if ($this->allowed_status == false) {
                return Redirect::action('AdminPanel\AuthController@getLogout');
            }

            if (is_numeric($id) && $id > 0) {//validation pass
                try {
                    $post = Post::findOrFail($id);
                    $post->delete();
                    $post->postImage()->delete();
                    return Redirect::action('AdminPanel\PostsController@getIndex')->withInput()
                                    ->with('status', Lang::get('errors.success_deleted', ["argument" => $post->name_en]))
                                    ->with('status-notification', "success");
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return Redirect::action('AdminPanel\PostsController@getIndex')
                                    ->withInput()
                                    ->with('status', Lang::get('errors.error_posts_doesnt_exist', ['argument' => $id]))
                                    ->with('status-notification', "error");
                }
            } else {
                return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                                ->with('status-notification', "error");
            }
        }

        /**
         * Delete post permanently
         * Access: Super Administrator
         * @param type $id
         * @return View
         */
        public function getDeletePermanently($id) {

            if ($this->allowed_status == false) {
                return Redirect::action('AdminPanel\AuthController@getLogout');
            }
//            return Post::where('id','=',$id)->withTrashed()->get();

            if (is_numeric($id) && $id > 0) {//validation pass
                try {
                    $post = Post::withTrashed()->findOrFail($id);
//                    return $post;
                    $post->forceDelete();
                    $post->postImage()->forceDelete();
                    return Redirect::action('AdminPanel\PostsController@getIndex')->withInput()
                                    ->with('status', Lang::get('errors.success_deleted_permanently', ["argument" => $post->name_en]))
                                    ->with('status-notification', "success");
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return Redirect::action('AdminPanel\PostsController@getIndex')
                                    ->withInput()
                                    ->with('status', Lang::get('errors.error_posts_doesnt_exist', ['argument' => $id]))
                                    ->with('status-notification', "error");
                }
            } else {
                return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                                ->with('status-notification', "error");
            }
        }
        /**
         * Restore post from trash
         * Access: Super Administrator
         * @param type $id
         * @return View
         */
        public function getRestorePost($id) {

            if ($this->allowed_status == false) {
                return Redirect::action('AdminPanel\AuthController@getLogout');
            }
            
            if (is_numeric($id) && $id > 0) {//validation pass
                try {
                    $post = Post::withTrashed()->findOrFail($id);
                    $post->restore();
                    $post->postImage()->restore();
                    return Redirect::action('AdminPanel\PostsController@getIndex')->withInput()
                                    ->with('status', Lang::get('errors.success_restore', ["argument" => $post->name_en]))
                                    ->with('status-notification', "success");
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return Redirect::action('AdminPanel\PostsController@getIndex')
                                    ->withInput()
                                    ->with('status', Lang::get('errors.error_posts_doesnt_exist', ['argument' => $id]))
                                    ->with('status-notification', "error");
                }
            } else {
                return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                                ->with('status-notification', "error");
            }
        }

        /**
         * Delete user 
         * Access: Super Administrator
         * @param type $id
         * @return Processing
         */
        public function getDeleteAttachment($id) {

            if ($this->allowed_status == false) {
                return Redirect::action('AdminPanel\AuthController@getLogout');
            }
            if (Request::ajax()) {
                if (is_numeric($id) && $id > 0) {//validation pass
                    try {

                        $postImage = PostImage::findOrFail($id);
                        $postImage->delete();

                        return array('message' => Lang::get('errors.success_deleted', ['argument' => $id]));
                    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                        return array('message' => Lang::get('errors.error_image_doesnt_exist', ['argument' => $id]));
                    }
                } else {
                    return array('message' => Lang::get('errors.validation_failed'));
                }
            } else {
                return Redirect::back()->withInput()->with('status', Lang::get('errors.validation_failed'))
                                ->with('status-notification', "error");
            }
        }

    }
    