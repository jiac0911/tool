<?php

    require_once('../functions/datosUnicapa.php');
    require_once('../functions/funcionesHipotesis.php');

    $adaline=new Adaline($nroEntra, $nroDatos, $alfa, $nroIte);
    $adaline->train($datos);



    $datosGrafica=datosGrafica($nroEntra-1,$nroDatos,$datos,$adaline->salida,$adaline->vectorPesos);
    $datosecm=$adaline->ecm;
    $datositer;
    for ($i=0; $i < $adaline->iteraciones; $i++) {
        $datositer[$i]=$i;
    }


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
          <h1>Adaline:</h1>
        </div>
<?php $adalinetxt = fopen("adaline.txt", "w")or die("Unable to open file!"); ?>
            <div id="divperceptron"><?php for ($i=0; $i < sizeof($adaline->vectorPesos)-1 ; $i++) { ?>

                <label for="">Peso <?= $i+1 ?>:</label><?= $adaline->vectorPesos[$i]; ?><br>
                    <?php
        $txt = $adaline->vectorPesos[$i]. ", ";
        fwrite($adalinetxt, $txt);


    ?>

            <?php }?></div>
            <?php fclose($adalinetxt);?>

        <div id="chart"></div>

        </div>

   <script>
        var datosecm= <?= json_encode($datosecm) ?>;
        var datositer= <?= json_encode($datositer) ?>;
        var x=datositer;
        x.unshift('x');
        var y=datosecm;
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
        //Hola jurko, esto es un comentario con amor <3
    </script>
    </body>
</html>