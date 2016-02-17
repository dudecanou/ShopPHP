<?php
session_start();
?>

<div class="col-sm-1"></div>

<div class="col-sm-5">
    <h2>Login admin</h2>
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
    $query=mysql_query("select * from admin where login='$login' and password='$password';") or die("ERREUR DE CONNEXION");
    $row=mysql_num_rows($query);
    // Traitement et affichage des resultats
    if ($row >0)
    {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        
        $result=mysql_fetch_row($query);
        $_SESSION['login']=$result[0];
        $_SESSION['password']=$result[1];

        header('location:acceuil_admin.php');

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

<div class="col-sm-6" style="text-align:center">
  
    <br>
    <img src="images/ano_logo.png" width="400" height="400"/>
                
</div>
