<?php 
require_once("../vendor/autoload.php");
/*//Front controller
//Url localhost:8000
require_once("../vendor/autoload.php");
//Chargement Manuel
use App\Models\RP;
 $rp=new RP();
 $rp->setId(1)
    ->setLogin("douvewane")
    ->setPassword("douve");

$rp->setRole("ROLE_AC");
echo $rp->getRole();*/

use App\Core\DataBase;
$ta=new DataBase();
$ta->openconnection();


