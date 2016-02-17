<?php
session_start();
?>

<div class="col-sm-1"></div>

<div class="col-sm-5">
    <h2>Login account</h2>
<form class="form-horizontal" role="form" method="post">
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
    <div class="col-sm-offset-0 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-0 col-sm-10">
      <button type="submit" name="valider" class="btn btn-warning">Submit</button>

    </div>
  </div>
</form>
    
    <?php
// Si le button valider est initialiser

if (isset($_POST['valider']))
{

    $login = $_POST['login'];
    $password = $_POST['password'];
    
    
    // Connexion avec MySql
    $connect=mysql_connect('localhost', 'root', '') or die("ERREUR DE CONNEXION A MySQL");
    mysql_select_db('ventelibre', $connect) or die("ERREUR DE CONNEXION A LA BASE shop");
    
    // Requete SQL
    $query=mysql_query("select * from client where login='$login' and password='$password';") or die("ERREUR DE CONNEXION");
    $row=mysql_num_rows($query);
    // Traitement et affichage des resultats
    if ($row >0)
    {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        
        $result=mysql_fetch_row($query);
        $_SESSION['idclient']=$result[0];
        $_SESSION['prenom']=$result[1];
        $_SESSION['nom']=$result[2];
        $_SESSION['email']=$result[3];
        $_SESSION['login']=$result[4];
        $_SESSION['password']=$result[5];

        header('location:acceuil_client.php');

    }
    else
    {
        echo "<div class='alert alert-danger'>";
    echo "<strong>Erreur!</strong> Login/Password incorrect.";
    echo "</div>";
    }
}
?>
    
</div>

<div class="col-sm-1"></div>


<div class="col-sm-5">
        <h2>Register account</h2>
    <form class="form-horizontal" role="form" method="post" action="index.php?lien=login" >
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
      <button type="submit" name="new" class="btn btn-warning">Creat Account</button>
    </div>
  </div>
</form>
    
    
    <?php
    if (isset($_POST['new']))
{
$idclient=NULL;
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$email=$_POST['email'];
$login=$_POST['login'];
$password=$_POST['password'];


//Connexion a MySQL et a la base de donnees demo37
$connect=mysql_connect('localhost', 'root', '') or die("ERREUR DE CONNEXION A MySQL");
mysql_select_db('ventelibre', $connect) or die("ERREUR DE CONNEXION A LA BASE shop");

//Requete d'insertion
$requete=mysql_query("insert into client values('$idclient','$prenom','$nom','$email','$login','$password');") or die("ERREUR DE CONNEXION A LA TABLE client");

//Analyse des resultats de la requete SQL
$resultat=mysql_affected_rows();
if($resultat<=0)
{
    echo "<div class='alert alert-danger'>";
    echo "<strong>Erreur!</strong> Veuillez verifier vos informations.";
    echo "</div>";
}
else
{
    echo "<div class='alert alert-success'>";
    echo "<strong>Success!</strong> Inscription reussie.";
    echo "</div>";
}

}
?>
</div>
<a class="navbar-brand" href="index.php?lien=login_admin" style="color:black; font-size:35px; " ><img src="images/admin.png" width="100" height="50"/></a>
