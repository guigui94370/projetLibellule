<?php
  require 'functions.php';

  if(isset($_POST["submit"])) {
    $lastName = $_POST["lastName"];
    $firstName = $_POST["firstName"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $password = $_POST["password"];
    $validPassword = $_POST["validPassword"];
    $specialite = $_POST["specialite"];
    $address = $_POST["address"];
    $codePostal = $_POST["codePostal"];
    $city = $_POST["city"];
    if(isset($_POST['displayEmail'])) {
      $displayEmail = $_POST["displayEmail"];
    }
    else {
      $displayEmail = "false";
    }

    // $personne = new Personne($lastName, $firstName, $email, $tel, $password, $validPassword, $specialite, $address, $codePostal, $city, $displayEmail);

    // $personne->afficherInfoPersonne(); 

    echo $lastName.'<br />'.$firstName.'<br />'.$email.'<br />'.$tel.'<br />'.$password.'<br />'.$validPassword.'<br />'.$specialite.'<br />'.$address.'<br />'.$codePostal.'<br />'.$city.'<br />'.$displayEmail.'<br />';
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

    <title>Espace Libellule - Inscriptions</title>

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
            <li role="presentation"><a href="inscriptions.php">Inscriptions</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Espace Libellule</h3>
      </div>
      <!-- FORMULAIRE D'INSCRIPTION -->
      <!-- 
          nom
          prenom
          mail
          telephone
          mdp
          validMdp
          afficheEmail
          specialite
          codePostal
          ville
          adresse 
        -->
        <form action="#" method="POST">
          <div class="form-group row">
            <label for="inputLastName" class="col-sm-2 form-control-label">Nom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputLastName" name="lastName" placeholder="Nom">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputFirstName" class="col-sm-2 form-control-label">Prénom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputFirstName" name="firstName" placeholder="Prénom">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 form-control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputTel" class="col-sm-2 form-control-label">Téléphone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputTel" name="tel" placeholder="Téléphone">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 form-control-label">Mot de passe</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Mot de passe">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputValidPassword" class="col-sm-2 form-control-label">Confirmer le mot de passe</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputValidPassword" name="validPassword" placeholder="Confirmer le mot de passe">
            </div>
          </div>
          <div class="form-group row">
            <label for="selectSpecialite" class="col-sm-2 form-control-label">Spécialité</label>
            <div class="col-sm-6">
                <select id="selectSpecialite" class="form-control" title="select" name="specialite">
                    <option value="">Spécialité</option>
                    <option value="test2">test2</option>
                    <option value="test3">test3</option>
                    <option value="test4">test4</option>
                </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputAddress" class="col-sm-2 form-control-label">Adresse</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Adresse">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputCodePostal" class="col-sm-2 form-control-label">Code postal</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputCodePostal" name="codePostal" placeholder="Code postal">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputCity" class="col-sm-2 form-control-label">Ville</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputCity" name="city" placeholder="Ville">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 sr-only">Email public</label>
            <div class="col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="displayEmail" value="true"> Souhaitez vous afficher votre adresse email au visiteur ?
                </label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-secondary" name="submit" value="Valider"/>
            </div>
          </div>
        </form>
      <footer class="footer">
        <p>&copy; 2015 GWesley</p>
      </footer>

    </div> <!-- /container -->

    <script src="../projetLibellule/scripts/script_js.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap-3.3.6/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
