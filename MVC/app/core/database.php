<?php 
// clase para conectarse a la base de datos y ejecutar consultas con PDO

   class Database{
      private $host =DB_HOST;
      private $user = DB_USER;
      private $password = DB_PASSWORD;
      private $db_name = DB_NAME;

      private $dbh; // database handlers
      private $stmt; // statement
      private $error;

      public function __construct(){
         // configurar conexion

         $dsn = 'mysql:host='.$this->host .';dbname='.$this->db_name;
         $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
         );
         // crear instancia de PDO

         try {
            $this->dbh = new PDO($dsn,$this->user,$this->password,$options);
            $this->dbh->exec('set names utf8'); // 
            
         } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
         }
      }

      //Se prepara la consulta
      public function query($sql){
         $this->stmt = $this->dbh->prepare($sql);
      }

      //Vinculamos la consulta con bind
      public function bind($param, $value, $type = null){
         if (is_null($type)){
            switch(true){
               case is_int($value):
                  $type = PDO::PARAM_INT;
               break;
               case is_bool($value):
                  $type = PDO::PARAM_BOOL;
               break;
               case is_null($value):
                  $type = PDO::PARAM_NULL;
               break;
               default:
                  $type = PDO::PARAM_STR;
               break;
            }
         }
         $this->stmt->bindValue($param,$value,$type);
      }

      //Ejecuta la consulta
      public function execute(){
         return $this->stmt->execute();
      }

      //Obtener los registers
      public function registers(){
         $this->execute();
         return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      }

      //Obtener un único register
      public function register(){
         $this->execute();
         return $this->stmt->fetch(PDO::FETCH_OBJ);
      }

      // Obtener cantidad de filas con el método rowCount
      public function rowCount() {
         return $this->stmt->rowCount();
     }
 
     // Obtener el último ID insertado
     public function lastId() {
         return $this->dbh->lastInsertId();
     }
   }
?>