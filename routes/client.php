<?php

// Website có các trang là:
//      Trang chủ
//      Giới thiệu
//      Sản phẩm
//      Chi tiết sản phẩm
//      Liên hệ

// Để định nghĩa được, điều đầu tiên làm là phải tạo Controller trước
// Tiếp theo, khai function tương ứng để xử lý
// Bước cuối, định nghĩa đường dẫn

// HTTP Method: get, post, put (path), delete, option, head

use Admin\Asm\Controllers\Client\AboutController;
use Admin\Asm\Controllers\Client\CartController;
use Admin\Asm\Controllers\Client\CategoriesController;
use Admin\Asm\Controllers\Client\ContactController;
use Admin\Asm\Controllers\Client\HomeController;
use Admin\Asm\Controllers\Client\LoginController;
use Admin\Asm\Controllers\Client\OrderController;
use Admin\Asm\Controllers\Client\PostsController;
use Admin\Asm\Controllers\Client\ProductController;


$router->get( '/',                  HomeController::class       . '@index');
$router->get( '/about',             AboutController::class      . '@index');

$router->get( '/contact',           ContactController::class    . '@index');
$router->post( '/contact/store',    ContactController::class    . '@store');

$router->get( '/posts',             PostsController::class      . '@index');
$router->get( '/posts/{id}',        PostsController::class      . '@detail');

$router->get( '/categories',        CategoriesController::class . '@index');
$router->get( '/categories/{id}',   CategoriesController::class . '@detail');

// $router->get( '/products',          ProductController::class    . '@index');
// $router->get( '/products/{id}',     ProductController::class    . '@detail');

$router->get( '/login',             LoginController::class      . '@index');
$router->get( '/login',             LoginController::class      . '@showFormLogin');
$router->post( '/handle-login',     LoginController::class      . '@login');
$router->get( '/logout',            LoginController::class      . '@logout');

// $router->get('cart/add',           CartController::class . '@add');
// $router->get('cart/quantityInc',   CartController::class . '@quantityInc');
// $router->get('cart/quantityDec',   CartController::class . '@quantityDec');
// $router->get('cart/remove',        CartController::class . '@remove');
// $router->get('cart/detail',        CartController::class . '@detail');

// $router->post('order/checkout',     OrderController::class . '@checkout');