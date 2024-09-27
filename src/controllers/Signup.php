<?php

class Signup extends Controller
{
    public function index()
    {
        $data['title'] = 'Daftar Akun';
        $this->view('templates/header', $data);
        $this->view('signup/index');
        $this->view('templates/footer');
    }

    public function addUser()
    {
        if ($this->model('User_model')->addUser($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . 'login');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'error');
            header('Location: ' . BASE_URL . 'signup');
            exit;
        }
    }
}
