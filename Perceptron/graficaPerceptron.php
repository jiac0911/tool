<?php

    require_once('../functions/datosUnicapa.php');
    require_once('../functions/funcionesHipotesis.php');

    $perceptron=new Perceptron($nroEntra, $nroDatos, $alfa, $nroIte);
    $perceptron->train($datos);
    $datosGrafica=datosGrafica($nroEntra-1,$nroDatos,$datos,$perceptron->salida,$perceptron->vectorPesos);

    $perceptrontxt = fopen("perceptron.txt", "w")or die("Unable to open file!");
    for ($i=0; $i < sizeof($perceptron->vectorPesos)-1 ; $i++) {
        $txt = "Peso ".$i.": ". $perceptron->vectorPesos[$i]. "\r\n";
        fwrite($perceptrontxt, $txt);
    }

        $txt="Iteraciones: ". $perceptron->iteraciones."\n";
        fwrite($perceptrontxt, $txt);
         fclose($perceptrontxt);
?>

<html>
    <title>SI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles/w3.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/perceptron.css">
    <link href="../c3/c3.css" rel="stylesheet">

<!-- Load d3.js and c3.js -->
    <script src="../c3/d3.v3.min.js" charset="utf-8"></script>
    <script src="../c3/c3.min.js"></script>

    <body>

<!-- Sidebar -->
<?php include '../layouts/sideBar.php';?>

<!-- Page Content -->
        <div style="margin-left:25%">
        <div class="w3-container w3-teal">
          <h1>Perceptron:</h1>
        </div>


        <div id="chart"></div>
<script>
        var datos= <?= json_encode($datosGrafica) ?>;
        var x=datos[0];
        x.unshift('x');
        var y=datos[1];
        y.unshift('Datos');
        var chart = c3.generate({
            bindto: '#chart',
            data: {
                x: 'x',
              columns: [
                x,
                y
              ]
            }
        });
    </script>

    </body>

</html>