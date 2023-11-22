<?php 

    include_once '../config/db_conn.php';
    class Alumno extends DB {
        

        private $num_control;
        private $nombre;
        private $grado;
        private $grupo;
        private $foto;

        public function __construct(){
            parent::__construct();
        }

        public function alumnoExiste($num_control){
            
            try {
                $query = $this->connect()->prepare('SELECT * FROM alumno WHERE num_control = :num_control');
                $query->execute(['num_control' => $num_control]);
                if($query->rowCount()){
                    $_SESSION['message'] = 'No fue posible hacer el registro, el alumno ya existe.';
                    $_SESSION['message_type'] = 'danger';
                    header('Location: ../view/agregarObjeto.php');
                    return true;
                }
            } catch (PDOException $e) {
                echo "Hubo un problema al verificar si el alumno existe: " . $e->getMessage() . "\n";
            }
            return false;
        }

        public function altaAlumno($num_control, $nombre, $grado, $grupo, $foto){
            try {
                $query = $this->connect()->prepare('INSERT INTO alumno (num_control, nombre, grado, grupo, foto) VALUES (:num_control, :nombre, :grado, :grupo, :foto)');
                $query->bindParam(':num_control', $num_control);
                $query->bindParam(':nombre', $nombre);
                $query->bindParam(':grado', $grado);
                $query->bindParam(':grupo', $grupo);
                if ($foto !== null) {
                    // Abre el archivo en modo de lectura binaria
                    $foto = fopen($foto['tmp_name'], 'rb');
                    $query->bindParam(':foto', $foto, PDO::PARAM_LOB);
                } else {
                    $query->bindValue(':foto', null, PDO::PARAM_NULL);
                }
                
                $query->execute();
                $_SESSION['message'] = 'Alumno registrado exitosamente.';
                $_SESSION['message_type'] = 'success';
                header('Location: ../view/agregarObjeto.php');
            } catch (PDOException $e) {
                echo "Hubo un problema al dar de alta el alumno: " . $e->getMessage() . "\n";
            }
        }

        public function getAlumno($num_control){
            try {
                $query = $this->connect()->prepare('SELECT * FROM alumno WHERE num_control = :num_control');
                $query->execute(['num_control' => $num_control]);
                return $query->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Hubo un problema al obtener el alumno: " . $e->getMessage() . "\n";
            }    
        }

        public function getAlumnos(){
            
            try {
                $query = $this->connect()->prepare('SELECT * FROM alumno');
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Hubo un problema al obtener los alumnos: " . $e->getMessage() . "\n";
            }

        }
        

    }

?>