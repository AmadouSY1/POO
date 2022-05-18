<?php
namespace App\Models;
class Inscription extends Model{
    private Classe $classe;

    //many to one avec Etudiant
    public function etudiant():Etudiant{
        $sql="select e.* from etudiant e,inscription ins where ins.etudiant_id=e.id and ins.id=?";
        parent::selectWhere($sql,[$this->id],true);
       return new Etudiant();
    }
    public function classe():Classe{
        $sql="select cl.* from inscription ins,classe cl where ins.classe_id=classe.id and ins.id=?";
        parent::selectWhere($sql,[$this->id],true);
    }
}