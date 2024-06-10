<?php 

namespace Admin\Asm\Controllers\Client;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Models\Category;
use Admin\Asm\Models\Posts;

class CategoriesController extends Controller
{
    private Category $category;
    private Posts $post;

    public function __construct()
    {
        $this->category = new Category();
        $this->post = new Posts();
    }
    
    public function index() {
        echo __CLASS__ . '@' . __FUNCTION__;
        // if (isset($_SESSION['user'])) {
        //     $name = $_SESSION['user']['name'];
        // }else{
        //     $name='bạn';
        // }

        // $categories = $this->category->all();
        // $post = $this->post->all();

        // $this->renderViewClient('category-detail', [
        //     'name' => $name,
        //     'categories' => $categories,
        //     'post' => $post
        // ]);
    }

    public function detail($id) {
        if (isset($_SESSION['user'])) {
            $name = $_SESSION['user']['name'];
        }else{
            $name='bạn';
        }

        $categories = $this->category->all();
        $posts = $this->post->findByID($id);


        $this->renderViewClient('category-detail', [
            'name' => $name,
            'categories' => $categories,
            'posts' => $posts
        ]);
    }
}