<?php 

class DatabaseConnection {
    private $host = "localhost";
    private $dbname = "enrollment_system";
    private $username = "root";
    private $password = "";
    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erro) {
                echo "Connection failed: " . $erro->getMessage();
        }
    }
}

?>