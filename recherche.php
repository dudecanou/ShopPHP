    
                <form class="form-inline" method="post" style="text-align:center">
                    
    <input type="text" class="form-control" size="50" name="mot_cle" placeholder="Search....." >
                    
    <input type="submit" name="rechercher" class="btn btn-danger" value="Search"></input>
                    
  </form>
                    <?php
if (isset($_REQUEST['rechercher']))
{ 

   $mot=$_POST['mot_cle'];
    
    $connect=mysql_connect('localhost', 'root', '') or die("ERREUR DE CONNEXION A MySQL");
mysql_select_db('ventelibre', $connect) or die("ERREUR DE CONNEXION A LA BASE velovert");

$query=mysql_query("select * from produit where nomprod like '%$mot%'");
$nb=mysql_num_rows($query);


     echo "
        <table class='table'>
        <tr>
        <th style='text-align:center'>#ref</th>
        <th style='text-align:center'>NOM</th>
        <th style='text-align:center'>DESCRIPTION</th>
        <th style='text-align:center'>PRIX</th>
        <th style='text-align:center'>PHOTO</th>
        <th style='text-align:center' class='col-sm-1'>QTE</th>
        <th></th>
        </tr>";

        while($row = mysql_fetch_array($query))
        {
            echo "<form method = 'post'>";
            echo "<tr>";
            echo "<td style='text-align:center'>" . $row['idproduit'] . "</td>";
            echo "<td style='text-align:center'>" . $row['nomprod'] . "</td>";
            echo "<td style='text-align:center'>" . $row['description'] . "</td>";
            echo "<td style='text-align:center'>" . $row['prix'] . "</td>";
            echo "<td style='text-align:center'><img src='".$row['photo']."'height='80px' width='80px'></td>";
            echo "<td style='text-align:center'><input name='quantite'></td>";
            //echo "<td style='text-align:center'><input class='form-control' type='text' name='quantite' value=''></td>";
            echo "<td style='text-align:center'><button type='submit' name='add' class='btn btn-info' value=".$row['idproduit'].">Add to cart</button></td>";
            echo "</tr>";
            echo "</form>";

        }
echo "</table>";
}


        if (isset($_POST['add']))
        {
            
             $connect=mysql_connect('localhost', 'root','') or die("Erreur de connexion a mySql");
        mysql_select_db('ventelibre',$connect) or die("Erreur de connexion a bd: ventelibre");

                        
            $idclient=$_SESSION['idclient'];
            $idproduit=$_POST['add'];
            $date = date("Y-m-d");
            $quantite=$_POST['quantite'];

                      echo  $idclient . $idproduit . $date . $quantite;

            //Requete d'insertion
            $requete=mysql_query("INSERT INTO `ventelibre`.`achat` (`idachat`, `idclient`, `idproduit`, `dateachat`, `quantite`) VALUES (NULL, $idclient, $idproduit, '$date', '$quantite');") or die("ERREUR DE CONNEXION A LA TABLE achat");

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

