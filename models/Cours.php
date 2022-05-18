<?php 
namespace App\Models;
use App\core\Model;
class Cours extends Model{
    private int $id;
    private string $heureDebut;
    private string $heureFin;
    private \DateTime $dateCours;


    public function __construct()
    {
        parent::$table="cours";
    } 

    //ManyToOne =>Classe
    public function classe():Classe{
        $sql="select cl.* from cours cr,classe cl where cr.classe_id=cl.id and c.id=?";
        parent::selectWhere($sql,[$this->id],true);
       return new Classe();
    }

    //ManyToOne =>Professeur
    public function professeur():Professeur{
        $sql="select from cours c,useur u where c.professeur_id=cl.id and c.id=?";
        parent::selectWhere($sql,[$this->id],true);
        return new Professeur();
     }
     //ManyToOne =>Module
    public function module():Module{
        $sql="select m.* from cours c,module m where c.module_id=m.id and c.id=?";
        parent::selectWhere($sql,[$this->id],true);
        return new Module();
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
     * Get the value of heureDebut
     */ 
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * Set the value of heureDebut
     *
     * @return  self
     */ 
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get the value of heureFin
     */ 
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * Set the value of heureFin
     *
     * @return  self
     */ 
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get the value of dateCours
     */ 
    public function getDateCours()
    {
        return $this->dateCours;
    }

    /**
     * Set the value of dateCours
     *
     * @return  self
     */ 
    public function setDateCours($dateCours)
    {
        $this->dateCours = $dateCours;

        return $this;
    }
}