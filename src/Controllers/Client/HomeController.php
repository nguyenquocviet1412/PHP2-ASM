<?php 

namespace Admin\Asm\Controllers\Client;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Commons\Helper;
use Admin\Asm\Models\Product;

class HomeController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    
    public function index() {
        $name = 'DucTV44';

        $products = $this->product->all();

        $this->renderViewClient('home', [
            'name' => $name,
            'products' => $products
        ]);
    }
}