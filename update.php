            
<div class="col-sm-1"></div>      
  


<div class="col-sm-6">      
    <?php
            echo "<br><br><h4>".$_SESSION['prenom']."</h4><h4>".$_SESSION['nom']."</h4><h4>".$_SESSION['email'];
    ?>
    </div>  
    <!-- AFFICHGE D'INFORMATION SELON LE CHOIX -->

    
<div class="col-sm-5">
        <h2>Update profil</h2>
    <form class="form-horizontal" role="form" method="post">
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" name="prenom" class="form-control" placeholder="Enter prenom" required>
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-10">
      <input type="text" name="nom" class="form-control" placeholder="Enter nom" required>
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-10">
      <input type="text" name="login" class="form-control" placeholder="Enter login" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10"> 
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" required>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-0 col-sm-5">
      <button type="submit" name="update" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>

<?php

if (isset($_POST['update']))
{
    // recuperation des donnees par post
    $idclient = $_SESSION['idclient'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    
    $connect=mysql_connect('localhost', 'root', '') or die("ERREUR DE CONNEXION A MySQL");
            mysql_select_db('ventelibre', $connect) or die("ERREUR DE CONNEXION A LA BASE ventelibre");
    
    // requete sql
 $query=mysql_query("update client set prenom='$prenom',nom='$nom', email='$email', login='$login', password='$password' where idclient='$idclient';") or die("ERREUR DE CONNEXION");
    
    // Analyse des resultat de la requete
    
    $row = mysql_affected_rows($connect);
        
    if($row >0)
    {
        echo "<div class='alert alert-success'>";
        echo "<strong>Success!</strong> Mise a jour reussie.";
        echo "</div>";
    }
    else
    {
        echo "<div class='alert alert-danger'>";
        echo "<strong>Erreur!</strong> Veuillez verifier vos informations.";
        echo "</div>";
    }

    
}

?>