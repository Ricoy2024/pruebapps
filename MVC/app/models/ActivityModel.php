<?php

class ActivityModel {
    public function __construct()
    {
        $this->db = new Database;
    }

    //Método que va a buscar a la base de datos el listado de actividades
    public function obtener_lista_actividades_model(){

        // Preparar la consulta SQL
        $this->db->query("SELECT * FROM `tb_actividad` WHERE id IN (1,2,3,4,5,6,7)");

        // Ejecutar la consulta y obtener todos los resultados
        $result = $this->db->registers();

        return $result;
    }

    //Método que va a buscar a la base de datos el listado de actividades
    public function obtener_listado_clases_model(){

        // Preparar la consulta SQL
        $this->db->query("
            SELECT c.hora, 
                c.dia, 
                c.id, 
                a.nombre AS actividad_nombre, 
                COALESCE(p.nombre, 'Sin profesor asignado') AS profesor_nombre, 
                COALESCE(p.apellido, '') AS profesor_apellido
            FROM tb_clase c
            JOIN tb_actividad a ON c.id_actividad = a.id
            LEFT JOIN tb_profesor p ON c.id_profesor = p.id
            ORDER BY dia, hora
        ");

        // Ejecutar la consulta y obtener todos los resultados
        $result = $this->db->registers();

        return $result;
    }

    public function obtener_listado_dias_model(){

        $this->db->query("SELECT DISTINCT dia
        FROM tb_clase");

        // Ejecutar la consulta y obtener todos los resultados
        $result = $this->db->registers();

        return $result;
    }

    public function obtener_listado_horas_model(){

        $this->db->query("SELECT DISTINCT hora
        FROM tb_clase");

        // Ejecutar la consulta y obtener todos los resultados
        $result = $this->db->registers();

        return $result;
    }

    public function guardar_clase_anotada_model($data) {
        // Paso 0: Obtener el ID de Usuario desde tb_usuario
        $this->db->query("SELECT Id FROM tb_usuario WHERE Dni = :dni");
        $this->db->bind('dni', $data['dni']);

        $row = $this->db->register();
        if (!$row) {
            // Si no se encuentra el usuario, retornar falso
            return false;
        }
        
        $idUsuario = $row->Id;

        // Paso 1: Obtener el ID de actividad desde tb_actividad
        $this->db->query("SELECT id FROM tb_actividad WHERE nombre = :nombre");
        $this->db->bind('nombre', $data['nombre']);

        $row = $this->db->register();
        
        if (!$row) {
            // Si no se encuentra el usuario, retornar falso
            return false;
        }
        
        $idActividad = $row->id;
    
        // Paso 2: Obtener el ID de Clase desde tb_clase usando id_actividad, hora y dia de $data
        $this->db->query("SELECT id FROM tb_clase WHERE id_actividad = :id_actividad AND hora = :hora AND dia = :dia");
        $this->db->bind('id_actividad', $idActividad);
        $this->db->bind('hora', $data['hora']);
        $this->db->bind('dia', $data['dia']);
 
        $row = $this->db->register();
        
        if (!$row) {
            // Si no se encuentra la clase, retornar falso
            return false;
        }

        $idClase = $row->id;

        // Paso 3: Buscar si la clase ya existe en la tabla tb_inscripcion
        $this->db->query("SELECT * FROM tb_inscripcion WHERE id_clase = :id_clase AND id_usuario = :id_usuario");
        $this->db->bind('id_usuario', $idUsuario);
        $this->db->bind('id_clase', $idClase);

        $row = $this->db->registers();
        
        if ($row) {
            // Si encuentra la clase, retornar falso ya que la persona ya está registrada a esta clase
            return false;
        }
    
        // Paso 3: Insertar la inscripción en tb_inscripcion
        $this->db->query("INSERT INTO tb_inscripcion (id_usuario, id_clase) VALUES (:id_usuario, :id_clase)");
        $this->db->bind('id_usuario', $idUsuario);
        $this->db->bind('id_clase', $idClase);
    
        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true; // Éxito
        } else {
            return false; // Error
        }
    }

    public function crear_clase_nueva_model($data) {

        $this->db->query("SELECT id FROM tb_actividad WHERE nombre = :nombre");
        $this->db->bind('nombre', $data['nombre']);

        $result = $this->db->register();
    
        if (!$result) {
            // Si no se encuentra la actividad, retornar falso
            return false;
        }
        
        // Obtener el ID de la actividad desde el objeto resultante
        $id_actividad = $result->id;

        $this->db->query("SELECT id FROM tb_clase WHERE hora = :hora AND dia = :dia");
        $this->db->bind('hora', $data['hora']);
        $this->db->bind('dia', $data['dia']);

        $result = $this->db->register();
    
        if (!$result) {
            // Si no se encuentra la actividad, retornar falso
            return false;
        }
        
        // Obtener el ID de la actividad desde el objeto resultante
        $id_clase = $result->id;

        $this->db->query("UPDATE tb_clase
                        SET id_actividad = :id_actividad, id_profesor = :id_profesor
                        WHERE id = :id_clase");
        $this->db->bind('id_actividad', $id_actividad);
        $this->db->bind('id_profesor', $data['id_profesor']);
        $this->db->bind('id_clase', $id_clase);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true; // Éxito
        } else {
            return false; // Error
        }
    }

    public function traer_clase_seleccionada_model($id_clase_seleccionada) {
        $this->db->query("SELECT * FROM tb_clase WHERE id = :id_clase");
        $this->db->bind('id_clase', $id_clase_seleccionada);

        $result = $this->db->register();
    
        if ($result) {
            // Si no se encuentra la actividad, retornar falso
            return $result;
        }
        else {
            return false;
        }
    }

    public function traer_profesor_model() {

        $this->db->query("SELECT *
        FROM tb_profesor");

        // Ejecutar la consulta y obtener todos los resultados
        $result = $this->db->registers();

        return $result;
    }

    //Método que va a buscar a la base de datos el listado de actividades
    public function listar_actividades_model()
    {
        // Preparar la consulta SQL
        $this->db->query("SELECT l.hora, nvl(l.nombre,'Sin actividad') as lunes ,nvl(m.nombre,'Sin actividad') as martes ,nvl(mi.nombre,'Sin actividad') as miercoles, nvl(j.nombre,'Sin actividad') as Jueves,nvl(v.nombre,'Sin actividad') as Viernes, nvl(s.nombre,'Sin actividad') as Sabado
        from 
        (SELECT b.dia, b.hora,a.nombre
        FROM tb_actividad a , tb_clase b 
        where a.id=b.id_actividad
        and b.dia='Lunes' ) l
        LEFT JOIN 
        (SELECT b.dia, b.hora,a.nombre
        FROM tb_actividad a , tb_clase b 
        where a.id=b.id_actividad
        and b.dia='Martes' )M 
        ON  l.hora =  m.hora
        LEFT JOIN 
        (SELECT b.dia, b.hora,a.nombre
        FROM tb_actividad a , tb_clase b 
        where a.id=b.id_actividad
        and b.dia='Miercoles' )Mi 
        ON  l.hora =  mi.hora
        LEFT JOIN 
        (SELECT b.dia, b.hora,a.nombre
        FROM tb_actividad a , tb_clase b 
        where a.id=b.id_actividad
        and b.dia='Jueves' )j
        ON  l.hora =  j.hora
        LEFT JOIN 
        (SELECT b.dia, b.hora,a.nombre
        FROM tb_actividad a , tb_clase b 
        where a.id=b.id_actividad
        and b.dia='Viernes' )v
        ON  l.hora =  v.hora
        LEFT JOIN 
        (SELECT b.dia, b.hora,a.nombre
        FROM tb_actividad a , tb_clase b 
        where a.id=b.id_actividad
        and b.dia='Sabado' )s
        ON  l.hora =  s.hora  
        ORDER BY l.hora ASC;");

        
        // Ejecutar la consulta y obtener todos los resultados
        $result = $this->db->registers();
        
        return $result;
    }


    public function traer_listado_actividades_model() {
        // Paso 1: Obtener el ID de Usuario desde tb_usuario usando el DNI de $_SESSION
        $this->db->query("SELECT Id FROM tb_usuario WHERE Dni = :dni");
        $this->db->bind('dni', $_SESSION['Dni']);

        $row = $this->db->register();
        if (!$row) {
            // Si no se encuentra el usuario, retornar falso
            echo "Usuario no encontrado";
            return false;
        }
        
        $idUsuario = $row->Id;

        // Paso 2: Obtener el id_clase de las clases que el usuario está registrado
        $this->db->query("SELECT DISTINCT id, id_clase FROM tb_inscripcion WHERE id_usuario = $idUsuario");

        // Ejecutar la consulta y obtener todos los resultados
        $listaClasesInscriptas = $this->db->registers();

        // Crear un array para almacenar los nombres de las actividades
        $nombresActividades = array();

        foreach($listaClasesInscriptas as $claseInscripta) {

            $idClase = $claseInscripta->id_clase;
            $this->db->query("SELECT id_actividad, hora, dia FROM tb_clase WHERE id = $idClase");

            $res = $this->db->register();

            $idActividad = $res->id_actividad;

            // Realizar la consulta para obtener el nombre de la actividad
            $this->db->query("SELECT nombre FROM tb_actividad WHERE id = $idActividad");

            // Ejecutar la consulta y obtener el resultado
            $actividad = $this->db->register(); // Asumo que register() obtiene una sola fila

            // Almacenar el nombre de la actividad en el array como un objeto con la propiedad 'nombre'
            if ($actividad) {
                $nombresActividades[] = (object) ['id' => $claseInscripta->id,
                                                'nombre' => $actividad->nombre,
                                                'dia' => $res->dia,
                                                'hora' => $res->hora];

            }
        }

        // Devolver el array con los nombres de las actividades
        return $nombresActividades;

    }

    public function eliminar_actividad_socio_model($id_clase_seleccionada) {
        $this->db->query("DELETE FROM tb_inscripcion WHERE id = $id_clase_seleccionada");
        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true; // Éxito
        } else {
            return false; // Error
        }
    }

    public function eliminar_actividad_model($id_clase_seleccionada) {

        $this->db->query("DELETE FROM tb_inscripcion WHERE id_clase = :id_clase");
        $this->db->bind('id_clase', $id_clase_seleccionada);

        //Ejecutar la consulta
        if ($this->db->execute()) {
        } 
        else {
            return false; // Error
        }

        // $this->db->query("DELETE FROM tb_clase WHERE id = :id_clase");
        // $this->db->bind('id_clase', $id_clase_seleccionada);

        
        $this->db->query("UPDATE tb_clase 
                                SET id_actividad = 8, id_profesor = null
                                WHERE id = :id_clase");
        $this->db->bind('id_clase', $id_clase_seleccionada);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true; // Éxito
        } else {
            return false; // Error
        }
    }

    public function editar_clase_model($data){

        $this->db->query("UPDATE tb_clase 
                SET id_actividad = :id_actividad, id_profesor = :id_profesor
                WHERE id = :id");
        $this->db->bind('id_actividad', $data['id_actividad']);
        $this->db->bind('id_profesor', $data['id_profesor']);
        $this->db->bind('id', $data['id_clase']);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true; // Éxito
        } else {
            return false; // Error
        }
    }
}
?>