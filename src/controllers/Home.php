<?php

class Home extends Controller
{
    public function index()
    {
        $data["title"] = "Daftar Todo";
        $data["todos"] = $this->model('Todo_model')->getAllTodo();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function detailTodo($id)
    {
        $data["title"] = "Detail Todo";
        $data["todo"] = $this->model('Todo_model')->getTodoById($id);
        $this->view('templates/header', $data);
        $this->view('home/detail', $data);
        $this->view('templates/footer');
    }

    public function addTodo()
    {
        if ($this->model('Todo_model')->addTodo($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/home');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'error');
            header('Location: ' . BASE_URL . '/home');
            exit;
        }
    }

    public function deleteTodo($id)
    {
        if ($this->model('Todo_model')->deleteTodo($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . '/home');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'error');
            header('Location: ' . BASE_URL . '/home');
            exit;
        }
    }

    public function getEditTodo()
    {
        echo json_encode($this->model('Todo_model')->getTodoById($_POST['id']));
    }

    public function editTodo()
    {
        if ($this->model('Todo_model')->editData($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diedit', 'success');
            header('Location: ' . BASE_URL . '/home');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diedit', 'error');
            header('Location: ' . BASE_URL . '/home');
            exit;
        }
    }

    public function searchTodo()
    {
        $data["title"] = "Daftar Todo";
        $data["todos"] = $this->model('Todo_model')->searchTodo();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
