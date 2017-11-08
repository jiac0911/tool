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


        </div>

    </body>
</html>