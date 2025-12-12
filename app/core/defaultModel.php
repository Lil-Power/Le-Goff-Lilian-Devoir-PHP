<?php

require "database.php";

function findAll($stmt){
  $bdd = connection();
  $query = $bdd->query($stmt);
  $result = $query->fetchAll();
  if ($result){
    return $result;
  }else {
    die("Une erreur s'est introduite dans la récupération des données");
}
}
