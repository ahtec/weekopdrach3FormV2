<html>
    <head>



    </head>


    <body STYLE="font-size: 20px; font-family:Courier New, Courier, monospace; background-color: antiquewhite;">
        <?php
        $var1 = count($_GET);
        if ($var1 == 1) {        // show personen
            echo "<p>";
            if (isset($_GET['naam'])) {

                $naam = $_REQUEST['naam'];
            }

            echo "</p>";
        }
        require_once 'loginGegevens.php';
        $conextion = new mysqli(DBSERVER, DBUSER, DBPASS, DBASE);
        if (!$conextion->connect_error) {
//            $sql = "CREATE DATABASE personen ";
//            $result = mysqli_query($conextion, $sql);
//"SELECT * FROM `personen` WHERE `naam` = '".$naam."'";

            $sql = "SELECT * FROM `personen` WHERE `naam` = '" . $naam . "'";
echo $sql;
            $result = mysqli_query($conextion, $sql);
            
            
            if ($result->num_rows === 0) {
//            die("lege result set");
            } else {
//            echo " result set niet leeg";
            }


            echo " <h5>  Dit is de pagina achter een succesvolle login</h5>
            <table>
            <tr>
                <th>Naam</th>
                <th>ww</th>
                <th>Adres</th>
                <th>Woonplaats</th>
                <th>Gender</th>
                <th>SerialzedObject van Persoon</th>
            </tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['naam'] . "</td>";
                echo "<td>" . $row['ww'] . "</td>";
                echo "<td>" . $row['adres'] . "</td>";
                echo "<td>" . $row['woonplaats'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
//                echo "<td>" . $row['objectPersoon'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_close($conextion);
        ?>


    </body>

</html>