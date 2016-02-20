<?php
  require 'connexion.php';

  if(isset($_POST["spe"]) && isset($_POST["city"]) && !empty($_POST["spe"]) && !empty($_POST["city"]))
  {
    $array = array();
    $req = "SELECT personne.id, personne.nom, personne.prenom, personne.codePostal, personne.ville, personne.adresse, personne.locX, personne.locY, specialite.libelle
            FROM personne
            LEFT JOIN specialite ON personne.idSpe = specialite.id
            WHERE ville LIKE '".$_POST['city']."'
            AND specialite.id = '".$_POST['spe']."'
            ";
    $res = $bdd->query($req);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $i = 0;
    while( $result = $res->fetch() )
    {
        $array[$i]['id'] = $result->id;
        $array[$i]['libelle'] = $result->libelle;
        $array[$i]['nom'] = $result->nom;
        $array[$i]['prenom'] = $result->prenom;
        $array[$i]['adresse'] = $result->adresse;
        $array[$i]['ville'] = $result->ville;
        $array[$i]['codePostal'] = $result->codePostal;
        $array[$i]['locX'] = $result->locX;
        $array[$i]['locY'] = $result->locY;
        $i++;
    }
    $array["json"] = json_encode($array);
    echo $array["json"];
  }
