<html>
    <head>
    </head>
    <div>
        <?php
        require_once 'versleutel.php';
        require_once 'loginGegevens.php';
        require_once 'objectPersoon.php';
        $returnText = "";

        $naam = $_REQUEST['naam'];
        $ww = $_REQUEST['ww'];
        $ww = verSleutel($ww);
//        $naam = htmlspecialchars($naam);
        $adres = $_GET['adres'];
        $woonplaats = $_GET['woonplaats'];
        $gender = $_GET['gender'];

//        $regel = "<naam> " . $_GET['naam'] ."</naam>";
        $regel = maakXml("naam", $_GET['naam']);
        storeRegel($naam, $regel);
        $versleuteldWW = verSleutel($_GET['ww']);
//        $regel = maakXml("ww", $_GET['ww']);
//        storeRegel($naam, $regel);

        $regel = maakXml("adres", $_GET['adres']);
        storeRegel($naam, $regel);

        $regel = maakXml("Woonplaats", $_GET['woonplaats']);
        storeRegel($naam, $regel);

        $regel = maakXml("Gender", $_GET['gender']);
        storeRegel($naam, $regel);

//        $pfdFileClasse = new FPDF();
//        $pfdFileClasse.
        
        $connectie = new mysqli(DBSERVER, DBUSER, DBPASS, DBASE);
        if (!$connectie->connect_error) {
            if (naamBestaat($naam, $connectie)) {
                // naam bestaat al, we doen niets
                $returnText = "Naam $naam bestaat al";
            } else {
//                $ojPersoon = new persoon();
//                $ojPersoon->naam = $naam;
//                $ojPersoon->adres = $adres;
//                $ojPersoon->woonplaats = $woonplaats;
//                $ojPersoon->gender = $gender;
//
//                storeRegel($naam, "Start serializeData");
//                $serializeData = serialize($ojPersoon);
//                storeRegel($naam, $serializeData);
//                storeRegel($naam, "Einde serializeData");

//                $query = "INSERT INTO `personen` (`naam`, `ww`, `adres`, `woonplaats`, `gender`,`objectPersoon`) VALUES ( '$naam', '$ww','$adres', '$woonplaats','$gender' , '$serializeData' )";

                $query = "INSERT INTO `personen` (`naam`, `ww`, `adres`, `woonplaats`, `gender` ) VALUES ( '$naam', '$versleuteldWW', '$adres', '$woonplaats', '$gender'  )";
                $result = $connectie->query($query);


                //            $serializeData = addslashes($serializeData);
                //            $serializeData = htmlspecialchars($serializeData);
                //$serializeData = "ggggg";
                //             file_put_contents("serpersonn.txt", $serializeData);
                //            echo $serializeData;
                //            var_dump($serializeData);
                //            $packedData = pack('H*', base_convert($input, 2, 16));
                //            echo $packedData;
                //            $packedData = pack("H*", $serializeData);
                //              $query = "INSERT INTO `personen` (`naam`, `adres`, `woonplaats`, `gender`, `objectPersoon`) VALUES ('naam', NULL, NULL, NULL, 'hhhhhhh')";
                //$query = "INSERT INTO `personen` (`naam`, `adres`, `woonplaats`, `gender`,'objectPersoon') VALUES ( '$naam', '$adres', '$woonplaats','$gender' , {$serializeData} )";
                //
                        ////Recoverable fatal error: Object of class persoon could not be converted to string in C:\xampp\htdocs\weekOpdracht3\voegPersoonToe.php on line 39
                //
                        //            $query = "INSERT INTO `personen` (`naam`, `adres`, `woonplaats`, `gender`) VALUES ( '$naam', '$adres', '$woonplaats', '$gender'  )";
                //            echo "<br>";
                //            echo $query;




                mysqli_close($connectie);        // sluit de connectie
            }
        } else {

            $returnText = "er is geen database actief";
        }

        
        if ($returnText != "") {
            header("Location: inloggen.php?errorTxt=$returnText ");   // terug naar index.php
        } else {
            $returnText = "User is toegevoegd";
            header("Location: inloggen.php?errorTxt=$returnText ");   // terug naar index.php
        }

//            exit;
//        }
//      //////////////  Begin van de functies ///////////////
        //////////////  Begin van de functies ///////////////
        //////////////  Begin van de functies ///////////////
        //////////////  Begin van de functies ///////////////
        function naamBestaat($paramNaam, $connectie) {
            $eruit = TRUE;

            $sql = "SELECT * FROM personen WHERE naam = '" . $paramNaam . "'";
            $result = mysqli_query($connectie, $sql);
//            var_dump($result);
            if ($result->num_rows == 0) {
                $eruit = FALSE;
            }
            return $eruit;
        }

        function storeRegel($erinNaamFile, $erinText) {
            $fh = fopen($erinNaamFile . ".txt", 'a+');
            fwrite($fh, "\n");
            fwrite($fh, $erinText);
            fwrite($fh, "\n");
            fclose($fh);
        }

        function convert2bin($regel) {
            $eruit = "";
            for ($i = 0; $i < count($regel); $i++) {
                
            }
        }

        function maakXml($tag, $content) {
            $eruit = "";
            $eruit = "<$tag>" . $content . "</$tag>\n ";
//            $eruit =  ";".$content;
            return $eruit;
        }
        ?>

    </div>

</body>
</html>
