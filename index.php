<?php
  require 'connexion.php';
  require 'functions.php';
?>

<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      #map_canvas { height: 50% ; width:auto;}
    </style>
    <link rel="icon" href="../../favicon.ico">
    <title>Espace Libellule</title>
    <!-- Google Map API (paramètres : sensor->geolocalisation, langage->langue, region->le pays) -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=places"></script>
    <!-- Bootstrap core CSS -->
    <link href="../projetLibellule/css/bootstrap.min.css" rel="stylesheet">
    <link href="../projetLibellule/css/style.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">
  </head>

  <body

      <?php
        if(isset($_POST["submit"]))
        {
          echo  "onload=\"init(); markerMap(".$_POST['spe'].", '".$_POST['address']."') \" ";
        } else { echo  "onload='init();'"; }
       ?>

   >
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Accueil</a></li>
            <li role="presentation"><a href="#">A Propos</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Espace Libellule</h3>
      </div>

<!-- Resultat Recherche -->

  <?php if(isset($_POST["submit"]))
        {
            $req = "SELECT *
                    FROM personne
                    LEFT JOIN specialite ON personne.idSpe = specialite.id
                    WHERE ville LIKE '".$_POST['address']."'
                    AND specialite.id = '".$_POST['spe']."'
                    ";
            $res = $bdd->query($req);
    ?>

    <div class='col-md-6' >
        <?php
          foreach($res as $key)
          {
            echo "<div class='col-sm-12 col-md-12 col-lg-6')'>
                    <div class='vignette'>
                      <a data-toggle='modal' data-target='#modal".$key[0]."' >".$key['prenom']."&nbsp;".$key['nom']."</a>
                      <span class='label label-default'>".$key['libelle']."</span>
                      <p>".$key['adresse']."<br/> ".$key['codePostal']." ".$key['ville']."</p>
                    </div>
                  </div>

                  <div class='modal fade' id='modal".$key[0]."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                    <div class='modal-dialog' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          ".$key['prenom']."&nbsp;".$key['nom']."
                        </div>
                        <div class='modal-body'>
                          ...
                        </div>
                      </div>
                    </div>
                  </div>";
            }
          ?>
    </div>
    <div class='col-md-6'>
      <div id="map_canvas"></div><br/>
      <div id='searchNav' class='col-md-12'>
        <center>
          <form id="form" class="form-inline" method="POST" action="" onSubmit="return controlForm()">
          <div class="form-group">
            <select id="listeSpe" name="spe" onclick='disable()' class='form-control'>
              <option value="" id="optionTitle">Choisir une Spécialité</option>
              <?php
                $results=$bdd->query("SELECT * FROM specialite");
                $results->setFetchMode(PDO::FETCH_OBJ);
                while( $result = $results->fetch() )
                {
                    echo "<option value='".$result->id."' >".$result->libelle."</option>";
                }
                $results->closeCursor();
              ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="address" name="address" placeholder="Adresse">
          </div>
          <div class="form-group">
            <button onclick='localisation()' type="button" class="btn btn-default" >
              &nbsp;<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&nbsp;
            </button>
            <button type="submit" name="submit" class="btn btn-default">Search</button>
          </div>
        </form>
        </center>
      </div>
    </div>

<!-- Page Accueil -->

    <?php } else { ?>
    <div id='searchNav' class='col-lg-12'>
        <h3 id='menuTitle'>Rechercher un spécialiste</h3>
        <form id="form" class="form-inline" method="POST" action="" onSubmit="return controlForm()">
          <div class="form-group">
            <select id="listeSpe" name="spe" onclick='disable()' class='form-control'>
              <option value="" id="optionTitle">Choisir une Spécialité</option>
              <?php
                $results=$bdd->query("SELECT * FROM specialite");
                $results->setFetchMode(PDO::FETCH_OBJ);
                while( $result = $results->fetch() )
                {
                    echo "<option value='".$result->id."' >".$result->libelle."</option>";
                }
                $results->closeCursor();
              ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="address" name="address" placeholder="Adresse">
          </div>
          <div class="form-group">
            <button onclick='localisation()' type="button" class="btn btn-default" >
              &nbsp;<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&nbsp;
            </button>
            <button type="submit" name="submit" class="btn btn-default">Search</button>
          </div>
        </form>
    </div>
    <?php } ?>

    <script src="../projetLibellule/js/jquery-2.2.0.min.js"></script>
    <script src="../projetLibellule/scripts/script_js.js"></script>
    <script src="../projetLibellule/js/bootstrap.min.js"></script>
  </body>
</html>
