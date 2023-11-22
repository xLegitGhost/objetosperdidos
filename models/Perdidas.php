<?php 

include_once '../config/db_conn.php';
    class Perdidas extends DB {

        private $id;
        private $fecha_update;

        // Claves foraneas

        // Numero de control del alumno que perdió el objeto.
        private $alumno_num_control;
        // ID del objeto que se perdió para obtener info.
        private $objeto_id;
        // Estado del objeto que se perdió.
        private $estado;
        // Numero de control del alumno que encontró el objeto.
        private $alumno_nc_encontro;
        
        

        public function __construct(){
            parent::__construct();
        }


        public function altaPerdida($alumno_num_control, $objeto_id, $estado, $fecha_update){
            try {
                $query = $this->connect()->prepare('INSERT INTO perdidas (alumno_num_control, objeto_id, estado, fecha_update) VALUES (:alumno_num_control, :objeto_id, :estado, :fecha_update)');
                $query->bindParam(':alumno_num_control', $alumno_num_control);
                $query->bindParam(':objeto_id', $objeto_id);
                $query->bindParam(':estado', $estado);
                $query->bindParam(':fecha_update', $fecha_update);
                
                $query->execute();
                $_SESSION['message'] = 'Objeto con el estado de ' . $estado . ' registrado exitosamente.';
                $_SESSION['message_type'] = 'success';
                header('Location: ../view/agregarObjeto.php');

            } catch (PDOException $e) {
                echo "Hubo un problema al dar de alta la perdida: " . $e->getMessage() . "\n";
            }
        }

        public function updatePerdida($id, $estado, $alumno_nc_encontro){
            try {
                $query = $this->connect()->prepare('UPDATE perdidas SET estado = :estado, alumno_nc_encontro = :alumno_nc_encontro WHERE id = :id');
                $query->bindParam(':id', $id);
                $query->bindParam(':estado', $estado);
                $query->bindParam(':alumno_nc_encontro', $alumno_nc_encontro);
                $query->execute();
                $_SESSION['message'] = 'El objeto ha sido actualizado al estado de ' . $estado . ' exitosamente.';
                $_SESSION['message_type'] = 'warning';
                header('Location: ../view/objetos.php');
            } catch (PDOException $e) {
                echo "Hubo un problema al actualizar el estado/perdida: " . $e->getMessage() . "\n";
            }
        }

        public function getPerdida($id){
                $query = $this->connect()->prepare('SELECT * FROM perdidas WHERE id = :id');
                $query->execute(['id' => $id]);
                return $query->fetch(PDO::FETCH_ASSOC);
        }

        public function getPerdidas(){
            $query = $this->connect()->prepare('SELECT * FROM perdidas');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getPerdidasAlumnoObjeto(){
            $query = $this->connect()->prepare('SELECT perdidas.id, objeto.nombre AS objeto_nombre, objeto.descripcion, objeto.lugar, objeto.fecha_reporte, alumno.nombre AS alumno_nombre, perdidas.estado FROM perdidas INNER JOIN objeto ON perdidas.objeto_id = objeto.id INNER JOIN alumno ON perdidas.alumno_num_control = alumno.num_control');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        

        
    }

?>