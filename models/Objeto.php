<?php 

include_once '../config/db_conn.php';
    class Objeto extends DB {

        private $id;

        private $nombre;
        private $descripcion;
        private $lugar;
        private $fecha_reporte;
        //CLAVES FORANEAS
        private $alumno_num_control;
        private $estados_estado;

        public function __construct(){
            parent::__construct();
        }

        public function existeAlumno($alumno_num_control){
            try {
                $query = $this->connect()->prepare('SELECT * FROM alumno WHERE num_control = :alumno_num_control');
                $query->execute(['alumno_num_control' => $alumno_num_control]);
                if(!$query->rowCount()){
                    $_SESSION['message'] = 'No fue posible hacer el registro, el alumno no existe.';
                    $_SESSION['message_type'] = 'danger';
                    header('Location: ../view/agregarObjeto.php');
                    return false;
                }
            } catch (PDOException $e) {
                echo "Hubo un problema al verificar si el alumno existe: " . $e->getMessage() . "\n";
            }
            return true;
        }

        public function altaObjeto($nombre, $descripcion, $lugar, $alumno_num_control, $estados_estado){
            try{
                $query = $this->connect()->prepare('INSERT INTO objeto (nombre, descripcion, lugar, alumno_num_control, estados_estado) VALUES (:nombre, :descripcion, :lugar, :alumno_num_control, :estados_estado)');
                $query->bindParam(':nombre', $nombre);
                $query->bindParam(':descripcion', $descripcion);
                $query->bindParam(':lugar', $lugar);
                $query->bindParam(':alumno_num_control', $alumno_num_control);
                $query->bindParam(':estados_estado', $estados_estado);
        
                $query->execute();
                header('Location: ../view/objetos.php');
                return $this->connect()->lastInsertId();
                
            } catch (PDOException $e) {
                echo "Hubo un problema al dar de alta el objeto: " . $e->getMessage() . "\n";
            }
        }
        
        

        public function getInfoObjeto($id){
            $query = $this->connect()->prepare('SELECT * FROM objeto WHERE id = :id');
            $query->execute(['id' => $id]);
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        public function getInfoObjetos(){
            $query = $this->connect()->prepare('SELECT * FROM objeto');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>