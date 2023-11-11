<?php 
    require_once 'config/db_conn.php';
    class Alumno extends DB {

        private $num_control;
        private $nombre;
        private $grado;
        private $grupo;
        private $foto;

        public function setNumControl($num_control) {
            $this->num_control = $num_control;
        }
        public function getNumControl() {
            return $this->num_control;
        }

        public function alumnoExiste($num_control){
            $query = $this->connect()->prepare('SELECT * FROM alumnos WHERE num_control = :num_control');
            $query->execute(['num_control' => $num_control]);
            if($query->rowCount()){
                return true;
            }
            return false;
        }

        public function altaAlumno(){
            $query = $this->connect()->prepare('INSERT INTO alumnos (num_control, nombre, grado, grupo, foto) VALUES (:num_control, :nombre, :grado, :grupo, :foto)');
            $query->execute(['num_control' => $this->num_control, 'nombre' => $this->nombre, 'grado' => $this->grado, 'grupo' => $this->grupo, 'foto' => $this->foto]);
        }
        

    }

?>