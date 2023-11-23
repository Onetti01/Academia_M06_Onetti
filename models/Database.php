<?php

class Database
{
    public $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', 'info_bdn');
        if (!$this->db) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function connect()
    {
        return $this->db;
    }
}
