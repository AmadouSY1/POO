<?php 
namespace App\Models;
class AC extends User{
    
    
    public function __construct()
    {
        parent::$role="ROLE_AC";
    }

    public static function selectAll(){
        $sql="select * from ".parent::$table."  where role like ?";
        return parent::selectWhere($sql,[parent::$role]);
    }
    public function insert(){
        $sql="INSERT INTO ? ('id','login','password','role') VALUES (?,?,?,?)";
        parent::selectUpdate($sql,[self::table,$this->id,$this->login,$this->password,self::role]);
  }
}