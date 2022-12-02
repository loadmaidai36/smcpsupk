<?php
    session_start();

    class Cabinet {
        public function __construct() {
            $DB_SERVER = "127.0.0.1";
            $DB_USER = "root";
            $DB_PASS = "";
            $DB_BASE = "cabinet"; //DataBase
            try {
                $this->connect = new PDO("mysql:host=$DB_SERVER;dbname=$DB_BASE", $DB_USER, $DB_PASS);
                $this->connect->exec("set names utf8");
                // echo "conn";
                // Exception
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Something went with wrong' . $e->getMessage();
            }
        }

        public function Login ($params) {
            $sql = "SELECT * FROM citizen WHERE username = :username AND `password` = :password";
            $query = $this->connect->prepare($sql);
            $query->execute($params);

            return $query;
        }

        public function getCabinet () {
            $sql = "SELECT * FROM cabinet_cate";
            $query = $this->connect->prepare($sql);
            $query->execute();

            return $query;
        }

        public function select_Cabinet ($data) {
            $sql = "SELECT * FROM cabinet_cate WHERE id = :select_Cabinet";
            $query = $this->connect->prepare($sql);
            $query->execute($data);

            return $query;
        }
    }
?>