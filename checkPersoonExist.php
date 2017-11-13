<html>
    <head>


    </head>
    <body>
        <div>

            <?php
            require_once 'loginGegevens.php';
    
            $returnText = "";

            $naam = $_REQUEST['naam'];
            $ww   = $_REQUEST['ww'];

    
        $connectie = new mysqli(DBSERVER, DBUSER, DBPASS, DBASE);
        if (!$connectie->connect_error) {
            if (naamBestaat($naam, $connectie)) {
            
            echo var_dump($_REQUEST);

            storeRegel($naam, $ww);

            function storeRegel($erinNaamFile, $erinText) {
                $fh = fopen($erinNaamFile . ".txt", 'a+');
                fwrite($fh, "naam: ".$erinNaamFile.PHP_EOL);
                fwrite($fh, "ww  : ".$erinText.PHP_EOL);
                fclose($fh);
            }
            ?>

        </div>
    </body>
</html>