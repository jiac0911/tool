<?php

    require_once('../functions/datosMulticapa.php');
    require_once('../functions/funcionesHipotesis.php');
    require_once('madaline.php');

$madaline=new Madaline($nroEntra,$nroDatos,$alfa,$nroIte,$nroOcultas);
$madaline->train($datos);

    $datosecm=$madaline->ecm;
    $datositer;
    for ($i=0; $i < $madaline->iteraciones; $i++) {
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
          <h1>Madaline:</h1>
        </div>
        <div id="chart"></div>


   <script>
        var datosecm= <?= json_encode($datosecm) ?>;
        var datositer= <?= json_encode($datositer) ?>;
        var x=datositer;
        x.unshift('x');
        var y=datosecm;

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