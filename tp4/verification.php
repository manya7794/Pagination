<?php

function alert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if (isset($_POST['submit'])) {
  session_start();
  try {
  if(isset($_POST['Identifiant']) && isset($_POST['password']))
  {
      $db_username = 'root';
      $db_password = '';
      $db_name     = 'technoweb';
      $db_host     = 'localhost';
      $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
             or die('could not connect to database');

      $Format_Email = '#[a-z0-9]{1,}[\-\_\.a-z0-9]{0,}@[a-z]{2,}[\-\_\.a-z0-9]{0,}\.[a-z]{2,6}$#';
      if(!preg_match($Format_Email, $_POST['Identifiant']))  throw new Exception("Le paramètre email ne correspond pas au format attendu");
      $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['Identifiant']));
      $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));

      if($username !== "" && $password !== ""){

          $select = "SELECT mdp FROM `utilisateurs` WHERE email = '$username'";
          $result = $db->query($select);
          while($row = $result->fetch_object()){
            $hash = $row->mdp;
          }
          if(password_verify($password, $hash)) {
           alert("Connexion réussie");
           echo '<script type="text/javascript">document.location.href="admin.php"</script>';
          } else {
            alert("Utilisateur ou mot de passe incorrect");
            echo '<script type="text/javascript">document.location.href="login.php"</script>';
          }

      }
      else
      {
        alert("Utilisateur ou mot de passe incorrect");
        echo '<script type="text/javascript">document.location.href="login.php"</script>';
      }
  }
  else
  {
     header('Location: login.php');
  }
  } catch (Exception $e) {
    alert("Le format de l'email ne correspond pas au format attendu");
    echo '<script type="text/javascript">document.location.href="login.php"</script>';
  }
  finally{
   $Pdo_Object = null;
  }
  mysqli_close($db);

} else if (isset($_POST['nouveau_compte'])) {

  $mysqli = new mysqli("localhost", "root", "", "technoweb");
  if($mysqli === false){
      die("ERROR: Could not connect. " . $mysqli->connect_error);
  }

  $email = $mysqli->real_escape_string($_REQUEST['Identifiant']);
  $pwd = $mysqli->real_escape_string($_REQUEST['password']);
  $pwd = PASSWORD_HASH($_POST["password"], PASSWORD_BCRYPT);


  $sql = "INSERT INTO utilisateurs (email,mdp,admin) VALUES ('$email','$pwd',0);";
  if($mysqli->query($sql) === true){
      alert("Utilisateur créé");
       echo '<script type="text/javascript">document.location.href="login.php"</script>';
  } else{
      echo "Erreur: Impossible de faire $sql. " . $mysqli->error;
      echo '<script type="text/javascript">document.location.href="login.php"</script>';
  }

  $mysqli->close();

} else {
    //Aucun bouton selectionne
}

?>