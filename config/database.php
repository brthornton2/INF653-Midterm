<?php
    class database {
        private $host = 'localhost';
        private $db_name = 'quotesdb';
        private $username = 'root';
        private $password = '123456';
        private $conn;

        public function connect(){
            $this->conn = null;

            try{
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                echo 'Connect error: ' . $e->getMessage();
            }
            return $this->conn;
        }
    }