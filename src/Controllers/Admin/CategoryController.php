<?php

namespace Admin\Asm\Controllers\Admin;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Models\Category;
use Admin\Asm\Models\User;
use Rakit\Validation\Validator;

class CategoryController extends Controller
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        [$categories, $totalPage] = $this->category->paginate($_GET['page'] ?? 1);

        $this->renderViewAdmin('categories.index', [
            'categories' => $categories,
            'totalPage' => $totalPage
        ]);
    }

    public function create()
    {
        $this->renderViewAdmin('categories.create');
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50'
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/categories/create'));
            exit;
        } else {
            $data = [
                'name'     => $_POST['name']
            ];

            // if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {

            //     $from = $_FILES['avatar']['tmp_name'];
            //     $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];

            //     if (move_uploaded_file($from, PATH_ROOT . $to)) {
            //         $data['avatar'] = $to;
            //     } else {
            //         $_SESSION['errors']['avatar'] = 'Upload Không thành công';

            //         header('Location: ' . url('admin/users/create'));
            //         exit;
            //     }
            // }

            $this->category->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('admin/categories'));
            exit;
        }
    }

    public function show($id)
    {
        $category = $this->category->findByID($id);

        $this->renderViewAdmin('categories.show', [
            'category' => $category
        ]);
    }

    public function edit($id)
    {
        $category = $this->category->findByID($id);

        $this->renderViewAdmin('categories.edit', [
            'category' => $category
        ]);
    }

    public function update($id)
    {
        $category = $this->category->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50'
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/categories/{$category['id']}/edit"));
            exit;
        } else {
            $data = [
                'name'     => $_POST['name']
            ];

            // $flagUpload = false;
            // if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {

            //     $flagUpload = true;

            //     $from = $_FILES['avatar']['tmp_name'];
            //     $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];

            //     if (move_uploaded_file($from, PATH_ROOT . $to)) {
            //         $data['avatar'] = $to;
            //     } else {
            //         $_SESSION['errors']['avatar'] = 'Upload Không thành công';

            //         header('Location: ' . url("admin/categories/{$category['id']}/edit"));
            //         exit;
            //     }
            // }

            $this->category->update($id, $data);

            // if (
            //     $flagUpload
            //     && $user['avatar']
            //     && file_exists(PATH_ROOT . $user['avatar'])
            // ) {
            //     unlink(PATH_ROOT . $user['avatar']);
            // }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url("admin/categories/{$category['id']}/edit"));
            exit;
        }
    }

    public function delete($id)
    {
        $category = $this->category->findByID($id);

        $this->category->delete($id);

        // if (
        //     $category['avatar']
        //     && file_exists(PATH_ROOT . $category['avatar'])
        // ) {
        //     unlink(PATH_ROOT . $category['avatar']);
        // }

        header('Location: ' . url('admin/categories'));
        exit();
    }
}
