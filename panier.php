<h3 style="text-align:center">COLLECTION HIVER 2016</h3>

<?php

        $idclient = $_SESSION['idclient'];

        $connect=mysql_connect('localhost', 'root','') or die("Erreur de connexion a mySql");
        mysql_select_db('ventelibre',$connect) or die("Erreur de connexion a bd: ventelibre");

        $query = mysql_query("SELECT a.idachat, a.idproduit, a.dateachat, a.quantite, p.nomprod, p.prix from achat a, produit p 
                                where a.idclient='$idclient' and a.idproduit=p.idproduit;");

        echo "<table class='table'>
        <tr>
        <th style='text-align:center'>#refAchat</th>
        <th style='text-align:center'>#refProd</th>
        <th style='text-align:center'>DATE</th>
        <th style='text-align:center'>NOM</th>
        <th style='text-align:center'>PRIX</th>
        <th style='text-align:center'>QTE</th>
        <th style='text-align:center' class='col-sm-1'></th>
        <th style='text-align:center'></th>
        <th style='text-align:center'></th>
        <th style='text-align:center'></th>
        </tr>";


// 0 - t.idachat
//1 - t.idproduit
//2 - t.date
//3 - t.qte
//4 - p.prod_name
//5 - p.prod_price

$subTotal=0;
       while($row = mysql_fetch_row($query))
        {
           $rowTotal = $row[3]*$row[5];
           $subTotal+=$rowTotal;
            echo "<form method = 'post'>";
            echo "<tr>";
            echo "<td style='text-align:center'>" . $row[0] . "</td>";
            echo "<td style='text-align:center'>" . $row[1] . "</td>";
            echo "<td style='text-align:center'>" . $row[2] . "</td>";
            echo "<td style='text-align:center'>" . $row[4] . "</td>";
            echo "<td style='text-align:center'>" . $row[5] . "</td>";
            echo "<td style='text-align:center'>" . $row[3] . "</td>";
            echo "<td style='text-align:center'><input name='quantite2' value='".$row[3]."'></td>";
            echo "<td style='text-align:center'><button type='submit' name='update' class='btn btn-info' value=".$row[0].">Update</button></td>";
            echo "<td>". $rowTotal . "</td>";
            echo "<td style='text-align:center'><button type='submit' name='delete' class='btn btn-danger' value=".$row[0].">delete</button></td>";
            echo "</form>";
            echo "</tr>";
        }

                $tax1=$subTotal*0.05;
                $tax2=$subTotal*0.099;
                $total=$subTotal+$tax1+$tax2;
                echo "<tr>
                        <th></th> <th></th> <th></th> <th></th> <th></th> <th>SUB-TOTAL</th> <th>$subTotal</th>
                    </tr>";
                echo "<tr>
                        <th></th> <th></th> <th></th> <th></th> <th></th> <th>TPS</th> <th>$tax1</th>
                    </tr>";
                echo "<tr>
                        <th></th> <th></th> <th></th> <th></th> <th></th> <th>TVQ</th> <th>$tax2</th>
                    </tr>";
                echo "<tr>
                        <th></th> <th></th> <th></th> <th></th> <th></th> <th>TOTAL</th> <th>$total</th>
                    </tr>";

        echo "</table>";


    if (isset($_POST['update']))
    {
        
    $quantite2=$_POST['quantite2'];
    $idachat=$_POST['update'];


    // requete sql
 $query=mysql_query("update achat set quantite = '$quantite2' where idachat='$idachat';") or die("ERREUR DE CONNEXION");
    
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
    $id = $_POST['delete'];
    
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
       echo "<div class='alert alert-danger'>";
    echo "<strong>Erreur!</strong> Echec suppression.";
    echo "</div>";
    }

}



/*$row = mysql_num_rows($query);
            if ($row > 0)
            {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td>Prix</td> <td>Qte</td> <td>Stotal</td>";
                echo "</tr>";
                $stotal = 0;
                while ($fetch = mysql_fetch_row($query))
                {   
                    echo "<tr>";
                    $stotal += $fetch[1]*$fetch[2];
                    echo "<td>".$fetch[1]. " $ </td>" . "<td>" . $fetch[2] ."</td><td>". $fetch[1]*$fetch[2] ." $ </td>";
                    echo "</tr>";
                }
                $tps = 0;
                $tvq = 0;
                $tps=$stotal*0.05;
                $tvq=$stotal*0.09975;
                $total = $stotal+$tps+$tvq;
                echo "<tr>";
                echo "<td colspan='2' align='right'>Sous-Total</td><td>" . $stotal . " $ </td></tr>";
                echo "<tr><td colspan='2' align='right'>TPS</td><td>" . $tps . " $ </td></tr>";
                echo "<tr><td colspan='2' align='right'>TVQ</td><td>" . $tvq . " $ </td></tr>";
                echo "<tr><td colspan='2' align='right'>Total</td><td>" . $total . " $ </td></tr>";
                echo "</table>";
            }
            
    

// -----------------------------------------


        if (isset($_POST['add']))
        {
            
$idclient=$_SESSION['idclient'];
$idproduit=$_POST['idproduit'];
$date = date("d/m/Y");
$quantite=$_POST['quantite'];

//Connexion a MySQL et a la base de donnees demo37
$connect=mysql_connect('localhost', 'root', '') or die("ERREUR DE CONNEXION A MySQL");
mysql_select_db('ventelibre', $connect) or die("ERREUR DE CONNEXION A LA BASE shop");

//Requete d'insertion
$requete=mysql_query("insert into achat values('$idclient','$idproduit','$date','$quantite');") or die("ERREUR DE CONNEXION A LA TABLE achat");
            
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
    */?>
