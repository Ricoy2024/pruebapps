<?php

    class ProfeModel {
        public function __construct()
        {
            $this->db = new Database;
        }

        //Método que va a buscar a la base de datos el listado de profesores
        public function listarprofesores()
        {
            // Preparar la consulta SQL
            $this->db->query("SELECT * FROM tb_profesor");
            
            // Ejecutar la consulta y obtener todos los resultados
            $result = $this->db->registers();
            
            return $result;
        }
        // se coemnto el querry borrar profe
        // public function deleteProfe($id) {

        //      $this->db->query("DELETE FROM tb_profesor WHERE id = $id");
        //     // $this->db->bind('id', $id);

        //     // $this->db->query("DELETE id FROM tb_profesor WHERE id = :id");

        //      //Ejecutar la consulta y obtener todos los resultados
        //      if ($this->db->execute()) {
        //         return true; // Éxito
        //     } else {
        //         return false; // Error
        //     }
        // }

        public function EditarProfeModel($data) {

            $this->db->query("UPDATE tb_profesor 
                                SET nombre = :nombre, apellido = :apellido, dni = :dni, email = :email, celular = :celular
                                WHERE id = :id");
            $this->db->bind('id', $data['id']);
            $this->db->bind('nombre', $data['nombre']);
            $this->db->bind('apellido', $data['apellido']);
            $this->db->bind('dni', $data['dni']);
            $this->db->bind('email', $data['email']);
            // $this->db->bind('avatar', $data['avatar']);
            $this->db->bind('celular', $data['celular']);

            if ($this->db->execute()) {
                $this->db->query("SELECT * FROM tb_profesor WHERE id = :id");
                $this->db->bind('id', $data['id']);

                //Ejecutar la consulta y obtener todos los resultados
                $result = $this->db->registers();

                return $result;
                
            } else {
                $result = null;
                return $result;
            }
        }

        public function EditarProfeAvatarModel($data){
            $this->db->query("UPDATE tb_profesor 
                                SET nombre = :nombre, apellido = :apellido, dni = :dni, email = :email, celular = :celular, foto_perfil = :avatar
                                WHERE id = :id");
            $this->db->bind('id', $data['id']);
            $this->db->bind('nombre', $data['nombre']);
            $this->db->bind('apellido', $data['apellido']);
            $this->db->bind('dni', $data['dni']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('avatar', $data['avatar']);
            $this->db->bind('celular', $data['celular']);

            if ($this->db->execute()) {
                $this->db->query("SELECT * FROM tb_profesor WHERE id = :id");
                $this->db->bind('id', $data['id']);

                //Ejecutar la consulta y obtener todos los resultados
                $result = $this->db->registers();

                return $result;
                
            } else {
                $result = null;
                return $result;
            }
        }

        public function DataProfesorModel($data) {

            $this->db->query("SELECT * FROM tb_profesor WHERE id = :id");
            $this->db->bind('id', $data['id']);

            //Ejecutar la consulta y obtener todos los resultados
            $result = $this->db->registers();

            return $result;
                
        }

        public function profeById($id_profe) {
            $this->db->query("SELECT id, nombre, apellido, dni, email, foto_perfil, celular FROM tb_profesor WHERE id = $id_profe");

            //Ejecutar la consulta y obtener todos los resultados
            $result = $this->db->registers();

            return $result;
        }
    

        public function AltaProfesorModel($data){

            $this->db->query("INSERT INTO tb_profesor (nombre,apellido,dni,email,foto_perfil,celular) values (:nombre,:apellido,:dni,:email,:avatar,:celular)");

            $this->db->bind('nombre', $data['nombre']);
            $this->db->bind('apellido', $data['apellido']);
            $this->db->bind('dni', $data['dni']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('avatar', $data['avatar']);
            $this->db->bind('celular', $data['celular']);                  
         
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function BuscarPorMailProfesor($data)
        {
            $this->db->query("SELECT email
                            FROM tb_profesor 
                            WHERE email = :email");
            $this->db->bind('email', $data['email']);
            
            $result = $this->db->register();
            
            return $result;
        }

        public function BuscarPorDniProfesor($data)
        {
            $this->db->query("SELECT dni
                            FROM tb_profesor 
                            WHERE dni = :dni");
            $this->db->bind('dni', $data['dni']);
            
            $result = $this->db->register();
            
            return $result;
        }

        public function ValidarMailProfesor($data)
        {
            $this->db->query("SELECT email
                            FROM tb_profesor 
                            WHERE email = :email 
                            AND dni != :dni");
            $this->db->bind('email', $data['email']);
            $this->db->bind('dni', $data['dni']);
            
            $result = $this->db->register();
            return $result;
        }
    }

?>