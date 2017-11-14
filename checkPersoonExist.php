<html>
    <head>


    </head>
    <body>
        <div>

            <?php
            require_once 'versleutel.php';
            require_once 'loginGegevens.php';
            require_once 'objectPersoon.php';


            $returnText = "";

            $naam = $_REQUEST['naam'];
            $ww = $_REQUEST['ww'];
            $ww = verSleutel($ww);

            $connectie = new mysqli(DBSERVER, DBUSER, DBPASS, DBASE);
            if (!$connectie->connect_error) {
                $sql = sprintf("SELECT * FROM personen WHERE naam = '%s' and ww = '%s'", $naam, $ww);
//                $sql = sprintf("SELECT * FROM personen  WHERE naam = '%s' ", $paramNaam);
                echo $sql;

                $result = mysqli_query($connectie, $sql);
                if ($result->num_rows == 0) {
                    //user met ww niet gevonden
                    // zoeken of naam user voorkomt
                    $sql = sprintf("SELECT * FROM personen WHERE naam = '%s' ", $naam);
                    $result = mysqli_query($connectie, $sql);
                    if ($result->num_rows == 0) {
                        $errorTxt = "Naam bestaat niet";
                        header("Location: inloggen.php?errorTxt=$errorTxt ");
                    } else {
                        $errorTxt = "Wachtwoord niet juist";
                        header("Location: inloggen.php?errorTxt=$errorTxt ");
                    }
                } else {
                    header("Location: inlogVervolgPagina.php?naam=$naam");
                }
            } else {
                $returnText = "Connectie error";
                header("Location: inloggen.php?errorTxt=$errorTxt ");
            }


            storeRegel($naam, $ww);

            function naamBestaat($paramNaam, $paramWW, $connectie) {
//                var_dump($paramNaam);
                $eruit = FALSE;
//                       "SELECT * FROM `personen` WHERE `naam`='gerard' and `ww`='doets'
//                echo $paramNaam;
//                echo "<br>" . $paramWW;
                $sql = sprintf("SELECT * FROM personen WHERE naam = '%s' and ww = '%s'", $paramNaam, $paramWW);
//                $sql = sprintf("SELECT * FROM personen  WHERE naam = '%s' ", $paramNaam);
                echo $sql;

                $result = mysqli_query($connectie, $sql);
                var_dump($result);
                var_dump($result->num_rows);
                if ($result->num_rows != 0) {
                    $eruit = TRUE;
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