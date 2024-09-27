<?php

class Todo_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTodo()
    {
        $this->db->query('SELECT * FROM todos WHERE archived=0 AND user_id=:user_id');
        $this->db->bind('user_id', $_SESSION['user']['user_id']);
        return $this->db->resultSet();
    }

    public function getArchivedTodo()
    {
        $this->db->query('SELECT * FROM todos WHERE archived=1 AND user_id=:user_id');
        $this->db->bind('user_id', $_SESSION['user']['user_id']);
        return $this->db->resultSet();
    }

    public function getTodoById($id)
    {
        $this->db->query('SELECT * FROM todos WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addTodo($data)
    {
        $query = "INSERT INTO todos (user_id, title, description, archived) VALUES (:user_id, :title, :description, 0)";
        $this->db->query($query);
        $this->db->bind('user_id', $_SESSION['user']['user_id']);
        $this->db->bind('title', $data['todo_title']);
        $this->db->bind('description', $data['todo_description']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteTodo($id)
    {
        $query = "DELETE FROM todos WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editTodo($data)
    {
        $query = "UPDATE todos SET todo=:todo WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('todo', $data['todo']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function archiveTodo()
    {
        $query = "UPDATE todos SET archived=1 WHERE todo_id=:todo_id";
        $this->db->query($query);
        $this->db->bind('todo_id', $_POST['todo_id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function unarchiveTodo()
    {
        $query = "UPDATE todos SET archived=0 WHERE todo_id=:todo_id";
        $this->db->query($query);
        $this->db->bind('todo_id', $_POST['todo_id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchTodo()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM todos WHERE todo LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
