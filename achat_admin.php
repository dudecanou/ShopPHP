<div class="col-sm-1"></div>



<div class="col-sm-4">
    <h3>Delete achat</h3>


<form method="post">
    <td>
        <select class="form-control" name="id">
            
        <?php
            // Connexion base de donnee Galaxy
            $connect=mysql_connect('localhost', 'root', '') or die("ERREUR DE CONNEXION A MySQL");
            mysql_select_db('ventelibre', $connect) or die("ERREUR DE CONNEXION A LA BASE ventelibre");
            $query=mysql_query("select idachat, idclient, idproduit, dateachat, quantite  from achat;") or die("ERREUR DE CONNEXION");
            
            // Affichage des resultats
            while ($row = mysql_fetch_row($query))
            {
                echo "<option>".$row[0]." - ".$row[1]."- ".$row[2]."</option>";
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
        $query=mysql_query("select * from achat where idachat='$id';") or die("ERREUR DE CONNEXION");
        $row=mysql_fetch_row($query);
        
        echo "<form class='form-horizontal' role='form' method='post'>";
        
        echo "<div class='form-group'>";
        echo "<div class='col-sm-10'>";
        echo "<input type='text' name='idachat' class='form-control' value ='$row[0]'>";
        echo "</div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "<div class='col-sm-10'>";
        echo "<input type='text' name='idclient' class='form-control' value ='$row[1]'>";
        echo "</div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "<div class='col-sm-10'>";
        echo "<input type='text' name='idproduit' class='form-control' value ='$row[2]'>";
        echo "</div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "<div class='col-sm-10'>";
        echo "<input type='text' name='date' class='form-control' value ='$row[3]'>";
        echo "</div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "<div class='col-sm-10'>";
        echo "<input type='text' name='quantite' class='form-control' value ='$row[4]'>";
        echo "</div>";
        echo "</div>";

        echo "<div class='form-group'>"; 
        echo "<div class='col-sm-offset-0 col-sm-11'>";
        echo "<button type='submit' name='delete' class='btn btn-danger'>Delete</button>";
        echo "</div>";
        echo "</div>";
        echo "</form>";

        
    }
    ?>

<?php

    
    if (isset($_POST['delete']))
{
    // recuperation des donnees par post
    $id = $_POST['idachat'];
    
    // requete sql
 $requete=mysql_query("delete from achat where idachat='$id';") or die("ERREUR DE CONNEXION A LA TABLE recettes");

    
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
       echo "<div class='alert alert-success'>";
    echo "<strong>Erreur!</strong> Echec suppression.";
    echo "</div>";
    }

}

?>
</div>
<div class="col-sm-2"></div>
