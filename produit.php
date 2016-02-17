<h3 style="text-align:center">COLLECTION HIVER 2016</h3>

<?php
        $connect=mysql_connect('localhost', 'root','') or die("Erreur de connexion a mySql");
        mysql_select_db('ventelibre',$connect) or die("Erreur de connexion a bd: ventelibre");

        $query = mysql_query("SELECT * FROM produit;");

        echo "<table class='table'>
        <tr>
        <th style='text-align:center'>#ref</th>
        <th style='text-align:center'>NOM</th>
        <th style='text-align:center'>DESCRIPTION</th>
        <th style='text-align:center'>PRIX</th>
        <th style='text-align:center'>PHOTO</th>
        </tr>";

        while($row = mysql_fetch_array($query))
        {
            echo "<tr>";
            echo "<td style='text-align:center'>" . $row['idproduit'] . "</td>";
            echo "<td style='text-align:center'>" . $row['nomprod'] . "</td>";
            echo "<td style='text-align:center'>" . $row['description'] . "</td>";
            echo "<td style='text-align:center'>" . $row['prix'] . "</td>";
            echo "<td style='text-align:center' style='text-align:center'><img src='".$row['photo']."'height='150px' width='150px'></td>";
            echo "</tr>";
        }
        echo "</table>";

        mysql_close($connect);
    ?>