<?php
  require 'connexion.php';
  require 'functions.php';

  if(isset($_POST["submit"])) {
    $req = 'SELECT *
            FROM personne
            INNER JOIN specialite ON personne.idSpe = specialite.id;
            ';
    $res = $bdd->query($req);
  }
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
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

    <!-- Bootstrap core CSS -->
    <link href="../projetLibellule/css/bootstrap.min.css" rel="stylesheet">
    <link href="../projetLibellule/css/style.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../bootstrap-3.3.6/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../bootstrap-3.3.6/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body onload="initialize()">
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

      <div class='col-md-6'>
          <?php
          if (isset($_POST["submit"])) {
            foreach($res as $key) {
              echo '
              <div class="col-md-6">
                  <a data-toggle="modal" data-target="#myModal" >'.$key["prenom"].'&nbsp;'.$key["nom"].'</a>
                  <span class="label label-default">'.$key["libelle"].'</span>
                  <p>'.$key["adresse"].' '.$key["codePostal"].' '.$key["ville"].'</p>
              </div>';
            }
          }
          ?>
      </div>
      <div class='col-md-6'>
        <div class="jumbotron">
          <div id="map_canvas"></div>
          <h3>Rechercher un spécialiste</h3>
          <form action="#" method="POST">
          <select name="spe">
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
        <input id="adresse" placeholder="Adresse" type="text" name="adresse">
        <button>Me Trouver</button>
        <p></p>
  			<p><input type="submit" class="btn btn-lg btn-success" name="submit"></p>
          </form>
        </div>
      </div>

      <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php echo $key["prenom"].'&nbsp;'.$key["nom"]; ?>
      </div>
      <div class="modal-body">
        ...
      </div>
    </div>
  </div>
</div>


    <script src="../projetLibellule/scripts/script_js.js"></script>
    <script src="../projetLibellule/js/jquery-2.2.0.min.js"></script>
    <script src="../projetLibellule/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap-3.3.6/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
