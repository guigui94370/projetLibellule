<?php
  require 'connexion.php';
  require 'functions.php';

  if(isset($_POST["submit"])) {
    $req = 'SELECT personne.id, 
              personne.nom, 
              personne.prenom, 
              personne.codePostal,
              personne.ville,
              personne.adresse,
              personne.locX,
              personne.locY,
              specialite.libelle
            FROM personne, specialite
            WHERE personne.idSpe = specialite.id AND (specialite.libelle LIKE "%'.$_POST["ville"].'%")';
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

    <div class="container">
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
      
      <div class="jumbotron">
        <div id="map_canvas"></div>
        <h3>Rechercher un spécialiste</h3>
        <form action="#" method="POST">
			<input id="spe" type="text" name="spe">
      <p></p>
			<p><input type="submit" class="btn btn-lg btn-success" name="submit"></p>
        </form>
      </div>

      <div class="row marketing">
        
          <?php
          if (isset($_POST["submit"])) {
            foreach($res as $key) {
              echo '
              <div class="col-lg-6">
                <h4>'.$key["prenom"].'&nbsp;'.$key["nom"].'</h4>
                <span class="label label-default">'.$key["libelle"].'</span>
                <p>'.$key["adresse"].' '.$key["codePostal"].' '.$key["ville"].'</p>
              </div>';
            }
          }
          ?>
           

        <!-- <div class="col-lg-6">
          <h4>Justin Bieber</h4>
          <span class="label label-default">Kinésithérapeute</span>
          <p>5 avenue de la République 75011 Paris</p>

          <h4>Mathieu Kasovitz</h4>
          <span class="label label-default">Chirurgien Plasticien</span>
          <p>5 avenue de la République 75011 Paris</p>

          <h4>René Lataupe</h4>
          <span class="label label-default ">Soffrologue</span>
          <p>5 avenue de la République 75011 Paris</p>
        </div> -->
        <nav>
		  <ul class="pagination">
		    <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
		    <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
		    <li class="disabled"><a href="#">2<span class="sr-only">(current)</span></a></li>
		    <li class="disabled"><a href="#">3<span class="sr-only">(current)</span></a></li>
		    <li class="disabled"><a href="#" aria-label="Forward"><span aria-hidden="true">&raquo;</span></a></li>
		  </ul>
		</nav>
      </div>

      <footer class="footer">
        <p>&copy; 2015 GWesley</p>
      </footer>

    </div> <!-- /container -->

    <script src="../projetLibellule/scripts/script_js.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap-3.3.6/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
