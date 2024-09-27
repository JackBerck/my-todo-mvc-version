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
        $this->db->query('SELECT * FROM todos');
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
        $query = "INSERT INTO todos (todo) VALUES (:todo)";
        $this->db->query($query);
        $this->db->bind('todo', $data['todo']);

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

    public function searchTodo()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM todos WHERE todo LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
