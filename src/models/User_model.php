<?php

class User_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query('SELECT * FROM users');
        return $this->db->resultSet();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addUser($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email=:email');
        $this->db->bind('email', $email);
        return $this->db->single();
    }
}
