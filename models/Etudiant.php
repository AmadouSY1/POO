<?php 
namespace App\Models;
class Etudiant extends User{
    
    public function __construct(){
        parent::__construct();
        parent::$role="ROLE_ETUDIANT";
    }

    public static function selectAll(){
        $sql="select * from ".parent::$table."  where role like ?";
        return parent::selectWhere($sql,[parent::$role]);
    }
    
    public function inscription():array{
        $sql="select ins.* from user u,inscription ins where u.id=ins.etudiant_id and u.id=?";
        parent::selectWhere($sql,[$this->id]);
        return [];
    }
    public function insert(){
        $sql="INSERT INTO ".self::$table." ('id','login','password','role') VALUES (?,?,?,?)";
        return parent::database()->executeupdate($sql,[$this->id,$this->login,$this->password,self::role]);
  }
}