<?php 
require_once ('model/db/DBConnection.php');

class ToEmail extends DBConnection{
        
    private $DB;

    public function __construct() {
        $conn = new DBConnection();
        $this->DB = $conn->Connect();
    }
    
    public function save($name, $email){
        $return = $this->testIfExist($email);
        if($return === true){
           return  $this->insert($name, $email);
        }
        return $return;
    }
    
    public function delete($id) {
        $delete = "DELETE FROM psnToEmail WHERE agnID= :id";
        $stm = $this->DB->prepare($delete);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        $this->runQuery($stm);       
        return $this->testDelete($stm->rowCount());
    }
    
    public function update($column, $value, $id){
        $sql = "UPDATE psnToEmail SET {$column} = :value WHERE agnID = :id";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":value", $value, PDO::PARAM_STR);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        return $this->runQuery($stm);
    }
    
    private function insert($name, $email) {
         $sql = "INSERT INTO psnToEmail (agnEmail,agnName) VALUES (:email, :name)";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":name", $name, PDO::PARAM_STR);
        $stm->bindParam(":email", $email, PDO::PARAM_STR);
        $this->runQuery($stm);
        return intval($this->DB->lastInsertId());
    }
    
    private function testDelete($rowDelete) {
        if($rowDelete == 1){
            return true;
        }
        return false;
    }
    
     private function selectByEmail($email) {
        $sql = "SELECT agnID FROM psnToEmail WHERE agnEmail = :email";
        $stm = $this->DB->prepare($sql);
        $stm->bindValue(":email", $email, PDO::PARAM_STR);
        return  $this->RunSelect($stm);
    }  
    private  function testIfExist($email) {
        $emailExist = $this->selectByEmail($email);
        if(sizeof($emailExist) == 0){
            return true;
        }
        return intval($emailExist[0]['agnID']);
    }

}
