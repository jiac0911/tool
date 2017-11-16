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

    $adalinetxt = fopen("adaline.txt", "w")or die("Unable to open file!");
    for ($i=0; $i < sizeof($adaline->vectorPesos)-1 ; $i++) {
        $txt = "Peso ".$i.": ".$adaline->vectorPesos[$i]. "\r\n";
        fwrite($adalinetxt, $txt);

    }
        $txt = "ECM: ".$adaline->ecm[$adaline->iteraciones]. "\r\n";
        fwrite($adalinetxt, $txt);
        $txt = "Iteraciones: ".$adaline->iteraciones. "\r\n";
        fwrite($adalinetxt, $txt);
             fclose($adalinetxt);

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


        <div id="chart"></div>


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