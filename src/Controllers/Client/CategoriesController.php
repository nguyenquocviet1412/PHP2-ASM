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

    public function index()
    {
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

    public function detail($id)
    {
        if (isset($_SESSION['user'])) {
            $name = $_SESSION['user']['name'];
        } else {
            $name = 'bạn';
        }

        // Sanitize and validate $id
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false) {
            // Handle invalid ID
            throw new \InvalidArgumentException("Invalid post ID");
        }

        $categories = $this->category->all();
        $posts = $this->post->findByID($id);

        if (!$posts) {
            // Handle post not found
            throw new \Exception("Post not found");
        }

        // $posts_category_id = $this->post->findByID_category($id);


        $this->renderViewClient('category-detail', [
            'name' => $name,
            'categories' => $categories,
            'posts' => $posts,
            // 'posts_category_id' => $posts_category_id
        ]);
    }
}
