<?php

namespace Admin\Asm\Controllers\Admin;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Models\Category;
use Admin\Asm\Models\Posts;
use Admin\Asm\Models\User;

class DashboardController extends Controller
{
    private Category $category;
    private Posts $post;
    private Posts $user;
    public function __construct()
    {
        $this->post = new Posts();
        $this->category = new Category();
        // $this->user = new User();
    }

    public function dashboard() {  
        if (isset($_SESSION['user'])) {
            $name = $_SESSION['user']['name'];
        }else{
            $name='bạn';
        }  
        $total_post = $this->post->count();
        $total_category = $this->category->count();
        // $total_user = $this->user->count();

        // $analysisProduct = array_map(function ($item) {
        //     return [
        //         $item['name']
        //     ];
        // }, $products);

        // array_unshift($analysisProduct, ['Tên sản phẩm', 'Lượt views']);

        $this->renderViewAdmin(__FUNCTION__, [
            // 'analysisProduct' => $analysisProduct,
            'name' => $name,
            'total_post'=>$total_post,
            'total_category'=>$total_category,
            // 'total_user'=>$total_user,
        ]);
    }

}