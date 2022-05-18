<?php 
namespace App\Models;
use App\core\Model;
class Module extends Model{
    private int $id;
    private string $libelle; 


    public function __construct()
    {
        parent::$table="module";
    } 

    public static function selectAll(){
        $sql="select * from ?";
        return self::database()->executeselect($sql,[parent::$table]);
    }
    //OneToMany avec Cours
    //Un Module associee a plusieurs cours
    public function cours():array{
        $sql="select c.* from cours c,module m where m.cours_id=c.id and m.id=?";
        parent::selectWhere($sql,[$this->id]);
        return [];
    }

    //ManyToMany avec Professeurs
    
    public function professeurs():array{
        "select u.* from useur u,module m where u.module_id=m.id and {$this->id}=m.id";
        return [];
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }
}