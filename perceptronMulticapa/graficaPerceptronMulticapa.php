<?php

    //require_once('../functions/datosMulticapa.php');
    require_once('../functions/datosMulticapa.php');
    include_once 'perceptronMulticapa.php';


   /* var_dump($alfa);
    die();*/

    $numEntradas=$nroEntra;
    $numOcultas=$nroOcultas;
    $numSalidas=$nroSalidas;
    $numIteraciones=$nroIte;

    // $alfa=0.005;
    // $numEntradas=4;
    // $numOcultas=3;
    // $numSalidas=3;
    // $numIteraciones=10000;


    /*$matrizDatos=array(
        array(5.10,3.50,1.40,0.20,1,1,0.69735771,-0.29163324),
        array(4.90,3.00,1.40,0.20,1,1,0.69058914,-0.30860214),
        array(4.70,3.20,1.30,0.20,1,1,0.69304083,-0.2980321),
        array(4.60,3.10,1.50,0.20,1,1,0.69478335,-0.30233368)
            );*/

    /*$matrizDatos=array(
        array(1,1,1,1,0,1,1,0,1,1,0,1,1,1,1,1,0,0,0,0),
        array(0,1,0,0,1,0,0,1,0,0,1,0,1,1,1,1,0,0,0,1),
        array(1,1,1,0,0,1,1,1,1,1,0,0,1,1,1,1,0,0,1,0),
        array(1,1,1,0,0,1,1,1,1,0,0,1,1,1,1,1,0,0,1,1),
        array(1,0,1,1,0,1,1,1,1,0,0,1,0,0,1,1,0,1,0,0),
        array(1,1,1,1,0,0,1,1,1,0,0,1,1,1,1,1,0,1,0,1),
        array(1,1,1,1,0,0,1,1,1,1,0,1,1,1,1,1,0,1,1,0),
        array(1,1,1,0,0,1,1,1,1,0,0,1,0,0,1,1,0,1,1,1),
        array(1,1,1,1,0,1,1,1,1,1,0,1,1,1,1,1,1,0,0,0),
        array(1,1,1,1,0,1,1,1,1,0,0,1,0,0,1,1,1,0,0,1),

    );*/

// var_dump($datos);
// die();
    $perceptronM=new perceptronMulticapa($alfa,$numEntradas,$numOcultas,$numSalidas,$numIteraciones,$datos);
    $perceptronM->entrenar();
    // var_dump($perceptronM->yk);
    // die();

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
          <h1>Perceptron multicapa:</h1>

        </div>
        <h6>Salida 1: <?= $perceptronM->yk[0]; ?></h6>
        <h6>Salida 2: <?= $perceptronM->yk[1]; ?></h6>
        <h6>Salida 3: <?= $perceptronM->yk[2]; ?></h6>
        <h6>Salida 4: <?= $perceptronM->yk[3]; ?></h6>
<!--         <div id="chart"></div>


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
    </script> -->
    </body>
</html>
