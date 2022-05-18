<?php 
namespace App\core;
abstract Class Model implements IModel{
    protected static DataBase|null $database=null; 
    protected static string $table;
    public function insert(){}
    public function update(){}

    public static function database():DataBase{
        if(self::$database==null){
            self::$database=new DataBase;
        }
        return self::$database;
    }
    public static function delete(int $id){
        $sql="delete from ? where id=?";
        return self::database()->executeupdate($sql,[self::$table,$id]);
    }
    public static function selectAll(){
        $sql="select * from ?";
        return self::database()->executeselect($sql,[self::$table]);
    }
    public static function selectById(int $id){
        $sql="select * from ? where id=?";
        return self::database()->executeselect($sql,[self::$table,$id]);
    } 
    public static function selectWhere(string $sql,array $data=[],$single=false){
       return self::database()->executeselect($sql,$data,$single);
    }

}