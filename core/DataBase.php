<?php 
namespace App\core;
class DataBase{
    private \PDO|null $pdo=null ;//Pas de connection
    public function openconnection(){
        try {
        $this->pdo=new \PDO("mysql:dbname=gestion_scolaire_l2;host=127.0.0.1","root","");
        } catch (\Exception $th) {
            die("Erreur de connection-Contactez votre admin");
            //throw $th;
        }
   
    }
    public function closeconnection(){
        $this->pdo=null;

    }
    public function executeselect($sql,$data=[],$single=false){
        $this->openconnection();
        $stm=$this->pdo->prepare($sql);
        $stm->execute($data);
        if ($single){
            $resutl=$stm->fetchall();
        }else{
            $result=$stm->fetch();
        }
        $this->closeconnection();
        return $result;
    }
    public function executeupdate($sql,$data=[]){
        $this->openconnection();
        $stm=$this->pdo->prepare($sql);
        $stm->execute($data);
        $stm>rowcount($stm);
        $result=$stm;
        $this->closeconnection();
        return $result;
    }

}