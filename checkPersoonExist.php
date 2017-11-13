<html>
    <head>


    </head>
    <body>
        <div>

            <?php
            require_once 'loginGegevens.php';

            $returnText = "";

            $naam = $_REQUEST['naam'];
            $ww = $_REQUEST['ww'];


            $connectie = new mysqli(DBSERVER, DBUSER, DBPASS, DBASE);

            if (!$connectie->connect_error) {
                if (naamBestaat($naam, $connectie)) {

//                    header("Location: inlogVervolgPagina.php?naam=$naam ");   // terug naar index.php
                } else {
                    $returnText = "Naam $naam komt niet voor";
//                    header("Location: inloggen.php?errorText=$returnText ");   // terug naar index.php
                }


                storeRegel($naam, $ww);
            }

            function naamBestaat($paramNaam, $connectie) {
                var_dump($paramNaam);
                $eruit = TRUE;
//                       "SELECT * FROM `personen` WHERE `naam`='gerard' and `ww`='doets'


                $sql = sprintf("SELECT * FROM personen WHERE naam = '%s' and ww = '%s'", $paramNaam, "doets");
//                $sql = sprintf("SELECT * FROM personen  WHERE naam = '%s' ", $paramNaam);
                echo $sql;

                $result = mysqli_query($connectie, $sql);
//                var_dump($result);

                if (!$result) {
                    $eruit = FALSE;
                }
                return $eruit;
            }

            function storeRegel($erinNaamFile, $erinText) {
                $fh = fopen($erinNaamFile . ".txt", 'a+');
                fwrite($fh, "naam: " . $erinNaamFile . PHP_EOL);
                fwrite($fh, "ww  : " . $erinText . PHP_EOL);
                fclose($fh);
            }
            ?>

        </div>
    </body>
</html>