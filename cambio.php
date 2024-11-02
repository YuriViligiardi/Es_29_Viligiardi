<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cambio.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $importo = intval($_GET["importo"]);
        $valuta = $_GET["valuta"];

        $variCambi = array("dollaro" => 1.08, "yen" => 165.99, "franchi svizzeri" => 0.94, "sterline" => 0.83);
        $data = date("d-m-Y");
        $giorno = date("l");
        
        $datiCambio = array("data" => $data, "giorno" => $giorno, "importo Utente" => $importo, "cambio" => calculatecambio($importo, $valuta, $variCambi), "calcolo commissioni" => calculateCommissioni($giorno, $importo, false),"cambioTot" => calculateCambioTot($giorno, $importo, $valuta, $variCambi));

        showData($datiCambio, $valuta);

        //methods
        function showData($dc, $v){ 
            echo "<div id='divPhp'>";
                echo "<h1>DATI CAMBIO VALUTE</h1>";
                foreach ($dc as $key => $value) {
                    if ($key == "importo Utente") {
                        echo "<p>";
                            echo "<b> $key: </b>";
                            echo $value;
                        echo "</p>";
                        showFlag("euro");
                    } else if ($key == "calcolo commissioni") {
                        echo "<p>" . calculateCommissioni($dc["giorno"], $dc["importo Utente"], true) . "</p>";
                        echo "<p>";
                            echo "<b> $key: </b>";
                            echo $value;
                        echo "</p>";
                    } else if ($key == "cambio") {
                        echo "<p>";
                            echo "<b> $key: </b>";
                            echo $value;
                        echo "</p>";
                        showFlag($v);
                    } else {
                        echo "<p>";
                            echo "<b> $key: </b>";
                            echo $value;
                        echo "</p>";
                    }
                    
                }
                echo "<a href='valuta.html'><h3 id='home'>TORNA AL CAMBIO</h3></a>";
            echo "</div>";
        }

        function showFlag($f){
            $link = array("./img/it-flag.gif", "./img/us-flag.gif", "./img/ja-flag.gif", "./img/sz-flag.gif", "./img/uk-flag.gif");
            switch ($f) {
                case "euro":
                    echo "<img id='flag' src='". $link[0] . "' alt='Bandiera Italiana'>";
                    break;

                case "dollaro":
                    echo "<img id='flag' src='". $link[1] . "' alt='Bandiera USA'>";
                    break;

                case "yen":
                    echo "<img id='flag' src='". $link[2] . "' alt='Bandiera Giapponese'>";
                    break;

                case "franchi svizzeri":
                    echo "<img id='flag' src='". $link[3] . "' alt='Bandiera Svizzera'>";
                    break;

                case "sterline":
                    echo "<img id='flag' src='". $link[4] . "' alt='Bandiera UK'>";
                    break;
                
                default:
                    echo "<p>Errore, nessuna bandiera inserita</p>";
                    break;
            }
        }

        function calculateCambioTot($g, $i, $v, $vc){
            $sconto = calculateCommissioni($g, $i, false);
            $cambio = calculatecambio($i, $v, $vc);
            return $cambio - $sconto;
        }


        function calculateCommissioni($g, $i, $check){
            if ($g == "Saturday" || $g == "Sunday") {
                if ($check) {
                    return "<p>E' presente una commissine che è il 5% dell'importo</p>";
                }
                $sconto = ($i / 100) * 5;
                return $sconto;
            } else {
                if ($check) {
                    return "<p>E' presente una commissine che è il 2.5% dell'importo</p>";
                }
                $sconto = ($i / 100) * 2.5;
                return $sconto;
            }
        }

        function calculatecambio($i, $v , $vc){
            switch ($v) {
                case "dollaro":
                    $cambio = $i * $vc["dollaro"];
                    return $cambio;

                case "yen":
                    $cambio = $i * $vc["yen"];
                    return $cambio;

                case "franchi svizzeri":
                    $cambio = $i * $vc["franchi svizzeri"];
                    return $cambio;

                case "sterline":
                    $cambio = $i * $vc["sterline"];
                    return $cambio;
                
                default:
                    echo "Errore, non è stata fatta nessuna conversione";
                    break;
            }
        }
    ?>
</body>
</html>