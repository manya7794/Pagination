<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>

    <link rel="stylesheet" href="css/login.css" /> <!-- KICKSTART -->
    <meta charset="utf-8">

    <!--Javascript-->
    <script src="js/login.js"></script>

    <title>Page de connexion</title>
  </head>
  <body>
    <img class="caption" src="img/Logo-P8.png">
    <!--Ajouter index.php dans l'action -->
    <form class="connexion" action="verification.php" method="post">

      <div class="login">
        <label> <b>Identifiant :</b></label>
        <input class="login" type="text" placeholder= "Identifiant (3 caractères min.)"  name="Identifiant" value="" size="30" required>
      </div>

      <div class="password">
        <label><b>Mot de passe :</b></label>
        <input type="password" placeholder="Mot de passe" name="password" value="" required>
      </div>

      <div class="boutons">
        <input type="submit" id="submit" name="submit" value="OK">
        <button class="white" name="resetbtn" onclick="reset()">Reset</button>
        <input type="submit" id="nouveau_compte" name="nouveau_compte" value="Ajouter un compte">
      </div>

    </form>

  </body>
</html>