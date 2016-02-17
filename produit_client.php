<h3 style="text-align:center">COLLECTION HIVER 2016</h3>

<?php
        $connect=mysql_connect('localhost', 'root','') or die("Erreur de connexion a mySql");
        mysql_select_db('ventelibre',$connect) or die("Erreur de connexion a bd: ventelibre");

        $query = mysql_query("SELECT * FROM produit;");


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

        mysql_close($connect);

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