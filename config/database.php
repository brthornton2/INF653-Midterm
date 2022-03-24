<?php
    class database {
        private $host = 'uzb4o9e2oe257glt.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
        private $db_name = 'l3slwtpfycyq0hnk';
        private $username = 'xsf7f9vyxm12i5tq';
        private $password = 'lyqphu6rdqgp3mg2';
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
