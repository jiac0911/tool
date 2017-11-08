<?php

    require_once('../functions/datosUnicapa.php');

    $adaline=new Adaline($nroEntra, $nroDatos, $alfa, $nroIte);
    $adaline->train($datos);
    var_dump($adaline);
    die();
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

            <div id="divperceptron"><?php for ($i=0; $i < sizeof($adaline->vectorPesos)-1 ; $i++) { ?>

                <label for="">Peso <?= $i+1 ?>:</label><?= $adaline->vectorPesos[$i]; ?><br>


            <?php }?></div>


        </div>

        <script>
            var y= <?= json_encode($adaline->vectorPesos) ?>;
            y.unshift('Datos');
            var x=['x',0,1,2,3]
            var chart = c3.generate({
                bindto: '#chart',
                data: {
                    x: 'x',
                  columns: [
                    y,
                    x
                  ]
                }
            });
        </script>
    </body>
</html>