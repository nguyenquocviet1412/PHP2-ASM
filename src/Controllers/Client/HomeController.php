<?php

namespace Admin\Asm\Controllers\Client;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Models\Category;
use Admin\Asm\Models\Posts;

class HomeController extends Controller
{
    private Category $category;
    private Posts $post;

    public function __construct()
    {
        $this->category = new Category();
        $this->post = new Posts();
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            $name = $_SESSION['user']['name'];
        }else{
            $name='bạn';
        }

        $categories = $this->category->all();
        $posts = $this->post->all();
        [$posts  , $totalPage] = $this->post->paginate($_GET['page'] ?? 1);
        $this->renderViewClient('home', [
            'name' => $name,
            'categories' => $categories,
            'posts' => $posts,
            'totalPage' => $totalPage
        ]);

    }

    // public function index1()
    // {

    //     [$posts  , $totalPage] = $this->post->paginate($_GET['page'] ?? 1);

    //     $this->renderViewClient('home', [
    //         'posts' => $posts, 
    //         'totalPage' => $totalPage
    //     ]);
    // }
}
