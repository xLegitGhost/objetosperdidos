<?php
    class DB {
        private $host;
        private $user;
        private $password;
        private $dbname;
        private $charset;

        public function __construct() {
            $this->host = 'localhost';
            $this->user = 'root';
            $this->password = '27115518';
            $this->dbname = 'objetosp';
            $this->charset = 'utf8mb4';
        }

        public function connect(){
            try {
                $connection = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                $pdo = new PDO($connection, $this->user, $this->password, $options);
                return $pdo;
            } catch (PDOException $e) {
                print_r('Error en la conexion: ' . $e->getMessage());
            }
        }

    }

?>