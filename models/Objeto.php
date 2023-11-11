<?php 

    require_once 'config/db_conn.php';
    class Objeto extends DB {

        private $id;
        private $descripcion;
        private $lugar;
        private $fecha_reporte;
        private $fecha_update;
        //CLAVES FORANEAS
        private $alumno_num_control;
        private $estados_estado;

        public function setId($id) {
            $this->id = $id;
        }
        public function getId() {
            return $this->id;
        }

        public function altaObjeto($descripcion, $lugar, $alumno_num_control, $estados_estado){
            $query = $this->connect()->prepare('INSERT INTO objetos (descripcion, lugar, fecha_reporte, fecha_update, alumno_num_control, estados_estado) VALUES (, :descripcion, :lugar :alumno_num_control, :estados_estado)');
            $query->execute(['descripcion' => $descripcion, 'lugar' => $lugar, 'alumno_num_control' => $alumno_num_control, 'estados_estado' => $estados_estado]);
        }
    }

?>