<?php 
namespace App\exception;
class BdExceptionConnection extends \Exception{
    public $message="erreur de connexion";
}