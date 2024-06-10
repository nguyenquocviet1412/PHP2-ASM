<?php

namespace Admin\Asm\Controllers\Client;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Commons\Helper;
use Admin\Asm\Models\Category;
use Admin\Asm\Models\Posts;
use Admin\Asm\Models\Product;

class HomeController extends Controller
{
    private Product $product;
    private Category $category;
    private Posts $post;

    public function __construct()
    {
        $this->product = new Product();
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

        $this->renderViewClient('home', [
            'name' => $name,
            'categories' => $categories,
            'posts' => $posts
        ]);

        // [$post  , $totalPage] = $this->post->paginate($_GET['page'] ?? 1);

        // $this->renderViewClient('posts.index', [
        //     'post' => $post, 
        //     'totalPage' => $totalPage
        // ]);
    }
}
