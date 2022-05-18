<?php 
namespace App\Models;
class Professeur  extends User{
    private string $grade;
    private Adresse $adresse;
    private string $nomcomplet;
    public function __construct()
    {
        parent::__construct();
        parent::$role="ROLE_PROFESSEUR";
        $this->adresse=new Adresse();
    }

    public static function selectAll(){
        $sql="select * from ".parent::$table."  where role like ?";
        return parent::database()->executeselect($sql,[parent::$role]);
    }
     //OneToMany avec Cours
    public function cours():array{
        return [];
    }

    //ManyToMany avec Module
    
    public function modules():array{
        return [];
    }

    //OneToOne  avec Adresse
    public function adresse():Adresse|null{
        return null;
    }


    public function insert(){
        $sql="INSERT INTO  ".parent::$table."  ('id','login','password','nom_complet','role','grade','ville','quartier')
            VALUES (?,?,?,?,?,?,?,?)";
             return parent::database()->executeupdate($sql,[$this->id,$this->login,
            $this->password,$this->nomcomplet,parent::$role,$this->grade,$this->adresse->getVille(),
            $this->adresse->getQuartier()]);
  
  }
    /**
     * Get the value of grade
     */ 
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set the value of grade
     *
     * @return  self
     */ 
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    //Redefinition => evolution
      //1-Heritage de Methode
      //2-Redefinir=> changer son comportement
       /**
       * Set the value of role
       *
       * @return  self
       */ 
      public function setRole($role)
      {
          return $this->role;
      }

    /**
     * Get the value of nomcomplet
     */ 
    public function getNomcomplet()
    {
        return $this->nomcomplet;
    }

    /**
     * Set the value of nomcomplet
     *
     * @return  self
     */ 
    public function setNomcomplet($nomcomplet)
    {
        $this->nomcomplet = $nomcomplet;

        return $this;
    }
}