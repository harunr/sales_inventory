<?php
class Database {
    private $host_name;
    private $user_name;
    private $password;
    private $database_name;

    public function connect() {

        $this->host_name="localhost";
        $this->user_name="u430957945_db_sales_inven";
        $this->password="Inven1254$";
        $this->database_name="u430957945_db_sales_inven";        
        $conn= new mysqli($this->host_name,$this->user_name,$this->password,$this->database_name);
        return $conn;
    }
}
?>