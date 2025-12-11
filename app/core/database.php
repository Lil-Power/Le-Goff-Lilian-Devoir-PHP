<?php

function connection(){
  try{
    $bdd = new PDO('mysql:host=localhost:3306;dbname=touche-pas-au-klaxon;charset=utf8', 'root', '');
    return $bdd;
  }catch (Exception $e){
    die('Erreur : '. $e->getMessage());
  }
}