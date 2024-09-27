<?php

class Login extends Controller
{
    public function index()
    {
        $data['title'] = 'Masuk ke Aplikasi';
        $this->view('templates/header', $data);
        $this->view('login/index');
        $this->view('templates/footer');
    }

    public function login()
    {
        $user = $this->model('User_model')->getUserByEmail($_POST['email']);

        if ($user) {
            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = $user;
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $user['id'];
                header('Location: ' . BASE_URL . 'home');
                exit;
            } else {
                Flasher::setFlash('gagal', 'login', 'error');
                header('Location: ' . BASE_URL . 'login');
                exit;
            }
        } else {
            Flasher::setFlash('gagal', 'login', 'error');
            header('Location: ' . BASE_URL . 'login');
            exit;
        }
    }
}
