<?php

class AuthModel {
    public function __construct()
    {
        $this->db = new Database;
    }

    /* Create: Función para dar de alta al usuario.
        Tener en cuenta que para los campos TIMESTAMP, no se usa la función bind.
    */
    public function crear_usuario($data)
	{
		$keyw = "keyword";
		$this->db->query("INSERT INTO tb_usuario
                          (Nombre, Apellido, Dni, Email, Celular, Contraseña) 
						  VALUES 
						  (:nombre, :apellido, :dni, :email, :celular, aes_encrypt(:contrasena, :keyword))");
        $this->db->bind('nombre', $data['nombre']);
        $this->db->bind('apellido', $data['apellido']);
		$this->db->bind('dni', $data['dni']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('celular', $data['celular']);                  
		$this->db->bind('contrasena', $data['contraseña']);
		$this->db->bind('keyword', $keyw);
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	/* Método para buscar el dni y la contraseña para comprobar si existe y poder loguear*/

	public function buscar_por_dni($data)
	{
		$this->db->query("SELECT Dni, Nombre, Email, AES_DECRYPT(Contraseña, 'keyword') AS pass 
						FROM tb_usuario 
						WHERE Dni = :dni");
		$this->db->bind('dni', $data['dni']);
		
		$result = $this->db->register();
		
		// Depuración
		if ($result) {
			error_log("Contraseña desencriptada: " . $result->pass);
		} else {
			error_log("Usuario no encontrado");
		}
		
		return $result;
	}

	public function buscar_por_mail($data)
	{
		$this->db->query("SELECT Email
						FROM tb_usuario 
						WHERE Email = :email");
		$this->db->bind('email', $data['email']);
		
		$result = $this->db->register();
		
		return $result;
	}


	public function buscar_por_mail_recuperar($data)
	{
		$this->db->query("SELECT Email
							FROM tb_usuario
							WHERE tb_usuario.Email =:email");
		$this->db->bind('email', $data['email']);
		
		$result = $this->db->register();
		return $result;
	}


	/* Método para buscar el dni y la contraseña para comprobar si existe y poder loguear el administrador*/
	public function buscar_por_dni_administrador($data)
	{
		// tb_administrador sería la tabla para los socios 
		$this->db->query("SELECT dni FROM tb_administrador WHERE dni = :dni AND contraseña = :contrasena");
		$this->db->bind('dni', $data['dni']);
		$this->db->bind('contrasena', $data['contraseña']);
		
		$result = $this->db->register();
		
		return $result;
	}

	public function change_pass($pass, $email)
	{
		
		$keyw = 'keyword';
		$this->db->query("UPDATE tb_usuario SET
								Contraseña = aes_encrypt(:new_pass,:keyword)
							 WHERE Email=:mail");
		$this->db->bind('new_pass', $pass);
		$this->db->bind('keyword', $keyw);
		$this->db->bind('mail', $email);
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

}
?>