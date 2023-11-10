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
            $this->password = '';
            $this->dbname = 'db_objetosp';
            $this->charset = 'utf8mb4';
        }

        public function connect(){
            try {
                $connection = new mysqli($this->host, $this->user, $this->password, $this->dbname);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }

?>