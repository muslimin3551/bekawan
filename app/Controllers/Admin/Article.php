<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Article extends BaseController
{
    public function __construct()
    {
        helper('AdminUserHelper');
    }
    public function index()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $data['title'] = 'ARTICLE';
            $article = new ArticleModel();
            $data['article'] = $article->where('is_deleted', 0)->findAll();
            return view('admin/article/index', $data);
        }
    }

    //--------------------------------------------------------------------------

    public function create()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            // tampilkan form create
            $data['title'] = "ADD ARTICLE";
            return view('admin/article/create', $data);
        }
    }
    public function add()
    {
        // Include helper form
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            helper(['form']);

            // Set rules validation form
            $rules = [
                'konselor_id'   => 'required',
                'title'         => 'required',
                'description'   => 'required',
                'tag'           => 'required',
                'is_published'  => 'required',
                'sort_description'  => 'required',
                'image'         => 'uploaded[image]|max_size[image,2024]|is_image[image]'
            ];

            if ($this->validate($rules)) {
                // Handle image upload
                $image = $this->request->getFile('image');
                $newName = $image->getRandomName();
                $image->move('uploads/article', $newName);
                // Save data to the database
                $model = new ArticleModel();
                $data = [
                    'konselor_id'         => $this->request->getVar('konselor_id'),
                    'title'               => $this->request->getVar('title'),
                    'sort_description'    => $this->request->getVar('sort_description'),
                    'description'         => $this->request->getVar('description'),
                    'tag'                 => $this->request->getVar('tag'),
                    'is_published'        => $this->request->getVar('is_published'),
                    'created_at'          => date('Y-m-d H:i:s'),
                    'is_deleted'          => 0,
                    'photo'               => $newName // Store the image file name in the database
                ];
                $model->save($data);

                // Set flash message and redirect
                $session = session();
                $session->setFlashdata('msg_succes', 'Add article data success!');
                return redirect()->to('admin/article');
            } else {
                // Validation failed, show the form again
                $session = session();
                $data['name'] = $session->get('name');
                $data['validation'] = $this->validator;
                $data['title'] = "ADD ARTICLE";
                echo view('admin/article/create', $data);
            }
        }
    }


    //--------------------------------------------------------------------------

    public function edit($id)
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            $user = new ArticleModel();
            $data['article'] = $user->where('id', $id)->first();

            // lakukan validasi data mahasiswa
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'id' => 'required',
                'title' => 'required'
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if ($isDataValid) {
                $image = $this->request->getFile('image');
                if ($image && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move('uploads', $newName);
                    $user->update($id, [
                        'konselor_id'         => $this->request->getVar('konselor_id'),
                        'title'               => $this->request->getVar('title'),
                        'sort_description'    => $this->request->getVar('sort_description'),
                        'description'         => $this->request->getVar('description'),
                        'tag'                 => $this->request->getVar('tag'),
                        'is_published'        => $this->request->getVar('is_published'),
                        'created_at'          => date('Y-m-d H:i:s'),
                        'is_deleted'          => 0,
                        'photo'               => $newName  // Store the image file name in the database
                    ]);
                } else {
                    $user->update($id, [
                        'konselor_id'         => $this->request->getVar('konselor_id'),
                        'title'               => $this->request->getVar('title'),
                        'sort_description'    => $this->request->getVar('sort_description'),
                        'description'         => $this->request->getVar('description'),
                        'tag'                 => $this->request->getVar('tag'),
                        'is_published'        => $this->request->getVar('is_published'),
                        'created_at'          => date('Y-m-d H:i:s'),
                        'is_deleted'          => 0
                    ]);
                }
                $session = session();
                $session->setFlashdata('msg_succes', 'data article updated!');
                return redirect('admin/article');
            }

            // tampilkan form edit
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['title'] = "EDIT ARTICLE";
            echo view('/admin/article/edit', $data);
        }
    }
    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $user = new ArticleModel();
        $session = session();
        $user->update($id, [
            'is_deleted'   => 1
        ]);
        $session->setFlashdata('msg_succes', 'data was deleted!');
        return redirect('admin/article');
    }
}
