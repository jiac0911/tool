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
          <h1>Perceptron Multicapa:</h1>
        </div>
        <form action="graficaPerceptronMulticapa.php" method="post" enctype="multipart/form-data">

            <label for=lAlfa>Alfa</label>
            <input type="text" id="alfa" name="alfa" >
            <label for="lEnt">Número de Entradas</label>
            <input type="text" id="numEnt" name="numEnt" >
            <label for="lOcu">Número de Capas Ocultas</label>
            <input type="text" id="numOcu" name="numOcu" >
            <label for="lSal">Número de Salidas</label>
            <input type="text" id="numSal" name="numSal" >
            <label for="lIter">Número de Iteraciones</label>
            <input type="text" id="numIter" name="numIter" >
            <label for="lDat">Datos (.csv)</label><br>
            <input type="file" name="archivo" id="archivo" />
            <div ><br><input  type="submit" value="Entrenar" name="submit"></div>

        </form>




        </div>

    </body>
</html>