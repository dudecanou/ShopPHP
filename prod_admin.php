<div class="col-sm-1"></div>



<div class="col-sm-5">
        <h3>Add product</h3>
    <form class="form-horizontal" role="form" method="post">
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" name="nomprod" class="form-control" placeholder="Enter name" required>
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-10">
      <input type="text" name="description" class="form-control" placeholder="Enter description" required>
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-10">
      <input type="text" name="prix" class="form-control" placeholder="Enter price" required>
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-10">
      <input type="text" name="photo" class="form-control" placeholder="Enter pics URL" required>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-0 col-sm-5">
      <button type="submit" name="new" class="btn btn-primary">Add</button>
    </div>
  </div>
</form>
    
    
    <?php
    if (isset($_POST['new']))
{
$idprod=NULL;
$nomprod=$_POST['nomprod'];
$description=$_POST['description'];
$prix=$_POST['prix'];
$photo=$_POST['photo'];

//Connexion a MySQL et a la base de donnees demo37
$connect=mysql_connect('localhost', 'root', '') or die("ERREUR DE CONNEXION A MySQL");
mysql_select_db('ventelibre', $connect) or die("ERREUR DE CONNEXION A LA BASE shop");

//Requete d'insertion
$requete=mysql_query("insert into produit values('$idprod','$nomprod','$description','$prix','$photo');") or die("ERREUR DE CONNEXION A LA TABLE produit");

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
<div class="col-sm-1"></div>



<div class="col-sm-4">
    <h3>Update and Delete</h3>


<form method="post">
    <td>
        <select class="form-control" name="id">
            
        <?php
            // Connexion base de donnee Galaxy
            $connect=mysql_connect('localhost', 'root', '') or die("ERREUR DE CONNEXION A MySQL");
            mysql_select_db('ventelibre', $connect) or die("ERREUR DE CONNEXION A LA BASE ventelibre");
            $query=mysql_query("select idproduit, nomprod from produit;") or die("ERREUR DE CONNEXION");
            
            // Affichage des resultats
            while ($row = mysql_fetch_row($query))
            {
                echo "<option>".$row[0]." - ".$row[1]."</option>";
            }
            ?>

            
            
            
            </select></td>
    <br>
    <td><input type="submit" class='btn btn-info' value="Ok" name="ok"></td>
</form>
    
    <!-- AFFICHGE D'INFORMATION SELON LE CHOIX -->
    
<?php
    // Si le choix "ok" a ete initialiser
    if(isset($_POST['ok']))
    {
        $id = $_POST['id'];
        $query=mysql_query("select * from produit where idproduit='$id';") or die("ERREUR DE CONNEXION");
        $row=mysql_fetch_row($query);
        
        echo "<form class='form-horizontal' role='form' method='post'>";
        
        echo "<div class='form-group'>";
        echo "<div class='col-sm-10'>";
        echo "<input type='HIDDEN' name='idproduit' class='form-control' value ='$row[0]'>";
        echo "</div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "<div class='col-sm-10'>";
        echo "<input type='text' name='nomprod' class='form-control' value ='$row[1]'>";
        echo "</div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "<div class='col-sm-10'>";
        echo "<input type='text' name='description' class='form-control' value ='$row[2]'>";
        echo "</div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "<div class='col-sm-10'>";
        echo "<input type='text' name='prix' class='form-control' value ='$row[3]'>";
        echo "</div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<div class='col-sm-10'>";
        echo "<input type='text' name='photo' class='form-control' value ='$row[4]'>";
        echo "</div>";
        echo "</div>";
        


        echo "<div class='form-group'>"; 
        echo "<div class='col-sm-offset-0 col-sm-11'>";
        echo "<button type='submit' name='update' class='btn btn-success'>Update</button>";
        echo "<button type='submit' name='delete' class='btn btn-danger'>Delete</button>";
        echo "</div>";
        echo "</div>";
        echo "</form>";

        
    }
    ?>

<?php

if (isset($_POST['update']))
{
    // recuperation des donnees par post
    $id = $_POST['idproduit'];
    $nom = $_POST['nomprod'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $photo = $_POST['photo'];
    // requete sql
 $query=mysql_query("update produit set nomprod='$nom', description='$description', prix='$prix', photo='$photo' where idproduit='$id';") or die("ERREUR DE CONNEXION");
    
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
    echo "<strong>Erreur!</strong> Echec mise a jour.";
    echo "</div>";
    }

}
    
    if (isset($_POST['delete']))
{
    // recuperation des donnees par post
    $id = $_POST['idproduit'];
    
    // requete sql
 $requete=mysql_query("delete from produit where idproduit='$id';") or die("ERREUR DE CONNEXION A LA TABLE recettes");

    
    // Analyse des resultat de la requete
    
    $row = mysql_affected_rows($connect);
        
    if($row >0)
    {
        echo "<div class='alert alert-success'>";
    echo "<strong>Success!</strong> Suppression reussie.";
    echo "</div>";
    }
    else
    {
        echo "<div class='alert alert-danger'>";
    echo "<strong>Erreur!</strong> Echec suppression.";
    echo "</div>";
    }

}

?>
</div>
<div class="col-sm-2"></div>
