<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Requests;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Hash;
    use App\Category;
    use App\Post;
    use App\Enum;
    use Illuminate\Support\Facades\Storage;
    use App\Options;
    use App\Advertising;

    class HomeController extends Controller {

        /**
         * This class is instances of public site and control public site 
         *
         * The constructor of the Make some of variable as global
         *
         * @category  Website
         * @package   Website
         * @license   http://www.opensource.org/licenses/BSD-3-Clause
         * @version   v0.4
         * @since     2015-December-31
         * @author    Alban Mulaki <alban.mulaki@gmail.com>
         */
        public function __construct() {

            view()->share("Enum", Enum::class);
            view()->share("options", $options = Options::first());
            $ads = Advertising::all();
            view()->share("ads", $ads->keyBy('id'));
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function getIndex($categorySlugOrId = 0, $postSlugOrId = 0) {
            $categoryStatus = false;
            $postStatus = false;
            // Control if the category or post is requested
            if ((is_numeric($categorySlugOrId) && $categorySlugOrId != 0) || strlen($categorySlugOrId) > 1) {
                $categoryStatus = true;
            }
            if ((is_numeric($postSlugOrId) && $postSlugOrId != 0) || strlen($postSlugOrId) > 1) {
                $postStatus = true;
            }

            //Response with view
            if ($categoryStatus && $postStatus == false) {// Route:- /category-slug or category-id/
                // return category posts
                if (is_numeric($categorySlugOrId)) {
                    $category = Category::find($categorySlugOrId);
                } else if (strlen($categorySlugOrId) > 1) {
                    $category = Category::where('slug_' . app()->getLocale(), '=', $categorySlugOrId)
                            ->first();
                }
//                $paginate = $category->posts()->paginate(2);
//                return $paginate->nextPageUrl();
                return view('pages.category', ['category' => $category]);
            } else if ($postStatus) {// Route:- /category/post-slug or post-id
                // Get Category if set
//            if (is_numeric($categorySlugOrId)) {
//                $category = Category::find($categorySlugOrId);
//            } else if (strlen($categorySlugOrId) > 1) {
//                $category = Category::where('slug_' . app()->getLocale(), 'LIKE', "%" . $categorySlugOrId . "%")->get();
//            }
                if (is_numeric($postSlugOrId)) {
                    $post = Post::find($postSlugOrId);
                    $relatedPost = Post::where('category_id', '=', $categorySlugOrId)
                            ->take(3)
                            ->get();
                } else if (strlen($postSlugOrId) > 1) {
                    $relatedPost = Category::where('slug_' . app()->getLocale(), '=', $categorySlugOrId)
                            ->take(1)
                            ->get();
                    $post = Post::where('slug_' . app()->getLocale(), '=', $postSlugOrId)->get();
                }
                $posts = Post::all();
                $topNews = $posts->sortByDesc('id')->take(3);
                return view('pages.single-post', ['post' => $post[0],
                    'relatedPost' => $relatedPost[0]->posts,
                    "topNews" => $topNews]);
                // return post
            }
            $category = Category::where('name_' . app()->getLocale(), '!=', "NULL")
                    ->where('name_' . app()->getLocale(), '!=', "")
                    ->get();

            $posts = Post::where('title_' . app()->getLocale(), '!=', "NULL")
                    ->where('title_' . app()->getLocale(), '!=', "")
                    ->get();
//        return $posts[0]->featureImage;
            $latestNews = $posts->sortByDesc('id')->take(5);
//        $lst = $latestNews->values()->all();
//        return $latestNews;
            $ads = Advertising::all();
            return view('pages.index', ['category' => $category,
                'posts' => $posts,
                'latestNews' => $latestNews,
                'Enum' => Enum::class,
                'ads' => $ads->keyBy('id')]);
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function getPost($categorySlugOrId, $postSlugOrId) {

            return view('pages.single-post');
        }

        public function getGallery() {
            return view('pages.gallery.gallery');
        }

        public function getGalleryAlbum() {
            return view('pages.gallery.gallery-album');
        }

        public function getGallerySingle() {
            return view('pages.gallery.gallery-single');
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function getCategory() {
            
        }

    }
    