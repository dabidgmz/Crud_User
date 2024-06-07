<?php
class Conexion {
    private $dsn = 'mysql:host=127.0.0.1;dbname=Users;charset=utf8';
    private $user = 'root';
    private $password = '';
    public $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO($this->dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa";
        } catch(PDOException $error) {
            echo "Error: ".$error->getMessage();
        }
    }
}
?>