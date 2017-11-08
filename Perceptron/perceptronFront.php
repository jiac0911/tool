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
        <form action="graficaPerceptron.php" method="post" enctype="multipart/form-data">

            <label for="fname">Numero de Iteraciones</label>
            <input type="text" id="nroIte" name="nroIte" >
            <label for="lname">Bias</label>
            <input type="text" id="bias" name="bias" >
            <label for="lname">Alfa</label>
            <input type="text" id="alfa" name="alfa" >
            <label for="lname">Datos (.csv)</label><br>
            <input type="file" name="archivo" id="archivo" />
            <div ><br><input  type="submit" value="Entrenar" name="submit"></div>

        </form>




        </div>

    </body>
</html>