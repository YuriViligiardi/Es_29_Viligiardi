<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cambio.php</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $importo = intval($_GET["importo"]);
        $valuta = $_GET["valuta"];

        $cambio = array("dollaro" => 1.08, "yen" => 165.99, "franchi svizzeri" => 0.94, "sterline" => 0.83);
        $data = date("d-m-Y");
        $giorno = date("l");

        $soldiConv = calculatecambio($giorno, $importo, $valuta, $cambio);
        
        $datiCambio = array("importo utente" => $importo, "valuta" => $valuta, "cambio" => $cambio, "data" => $importo, "importo" => $importo, "importo" => $importo, "importo" => $importo)

        function calculateCommissioni($g, $cambio){
            if ($g == "Saturday" || $g == "Sunday") {
                $sconto = ($cambio / 100) * 5;
                return $cambio - $sconto;
            } else {
                $sconto = ($cambio / 100) * 2.5;
                return $cambio - $sconto;
            }
        }

        function calculatecambio($giorno, $i, $v , $c){
            switch ($v) {
                case "dollaro":
                    $i = calculateCommissioni($giorno, $i);
                    $cambio = $i * $c["dollaro"];
                    return $cambio;

                case "yen":
                    $i = calculateCommissioni($giorno, $i);
                    $cambio = $i * $c["dollaro"];
                    return $cambio;

                case "franchi svizzeri":
                    $i = calculateCommissioni($giorno, $i);
                    $cambio = $i * $c["dollaro"];
                    return $cambio;

                case "sterline":
                    $i = calculateCommissioni($giorno, $i);
                    $cambio = $i * $c["dollaro"];
                    return $cambio;
                
                default:
                    echo "Errore, non è stata fatta nessuna conversione";
                    break;
            }
        }
    ?>
</body>
</html>