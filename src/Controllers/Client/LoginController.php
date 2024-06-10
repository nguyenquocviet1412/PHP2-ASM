<?php 

namespace Admin\Asm\Controllers\Client;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Commons\Helper;
use Admin\Asm\Models\Category;
use Admin\Asm\Models\User;

class LoginController extends Controller
{
    private User $user;
    private Category $category;


    public function __construct()
    {
        $this->user = new User();
        $this->category = new Category();
    }

    public function showFormLogin() {
        auth_check();

        $this->renderViewClient('login');
    }

    public function index()
    {
        auth_check();
        if (isset($_SESSION['user'])) {
            $name = $_SESSION['user']['name'];
        }else{
            $name='bạn';
        }

        $categories = $this->category->all();

        $this->renderViewClient('login', [
            'categories' => $categories
        ]);
    }
    public function login() {
        auth_check();

        try {
            $user = $this->user->findByEmail($_POST['email']);

            if (empty($user)) {
                throw new \Exception('Không tồn tại email: ' . $_POST['email']);
            }

            $flag = $_POST['password']==$user['password']?true:false; 
            if ($flag) {

                $_SESSION['user'] = $user;

                unset($_SESSION['cart']);

                if ($user['type'] == 'admin') {
                    header('Location: ' . url('admin/') );
                    exit;
                }

                header('Location: ' . url() );
                exit;
            }

            throw new \Exception('Password không đúng');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();

            header('Location: ' . url('login') );
            exit;
        }
    }

    public function logout() {
        unset($_SESSION['cart-' . $_SESSION['user']['id'] ]);
        unset($_SESSION['user']);

        header('Location: ' . url() );
        exit;
    }
}