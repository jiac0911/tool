<?php

    require_once('../functions/datosUnicapa.php');

    $perceptron=new Perceptron($nroEntra, $nroDatos, $alfa, $nroIte);
    $perceptron->train($datos);

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

<div style="margin: 20px !important;"><?php for ($i=0; $i < sizeof($perceptron->vectorPesos)-1 ; $i++) { ?>

    <label for="">Peso <?= $i+1 ?>:</label><?= $perceptron->vectorPesos[$i]; ?><br>


<?php }?></div>

        <div id="chart"></div>
        </div>

    <script>
        var chart = c3.generate({
            bindto: '#chart',
            data: {
              columns: [
                ['data1', 30, 200, 100, 400, 150, 250]
              ]
            }
        });
    </script>

    </body>

</html>