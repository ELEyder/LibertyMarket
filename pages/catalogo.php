<?php
    require_once("../funciones/mysql.php");
    require_once("../funciones/funciones.php");
?>
<html>
    <head>
        <title>MERCADO MORADO S.A</title>
        <meta name="author" content="Eyder Huayta Tantavilca">
        <meta name="description" content="Mercado en linea de alimentos.">
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/catalogo.css">
        <link rel="shortcut icon" href="../icon.png">
    </head>
    <body>
        <?php
            fnMostrarCabecera("../img/logo.png");
        ?>
    <main class="contenido">
        <div class="subtitulo">
            <p>CATALOGO DE PRODUCTOS</p>
        </div>
        <div class="productos">
        <?php
            $tablaSQL = fnConsultaSelect("select * from productos");
            // Extraemos todas las filas de la tabla
            while ($row = mysqli_fetch_array($tablaSQL,MYSQLI_ASSOC)) {
                $id = $row['idProducto'];
                $nombre = $row['nombre'];
                $desc = $row['descripcion'];
                $precio = $row['precio'];
                $imagen = $row['imagen'];
                $img = "../img/" . $imagen . ".png";
                echo '<a class="producto" href="detalles.php?id='. $id .'"><div class="producto">
                <img class="producto" src="'.$img.'" alt="'.$imagen.'">
                <h1 class="producto">'.$nombre.'</h1>
                <p class="producto">Unidad: '.$desc.'</p>
                <p class="producto">Precio: S/.'.$precio.'</p>
            </div></a>';
            }
            ?>
        </div>
        <a class="regresar" href='../index.php'>Regresar</a>
    </main>
            <?php
            fnMostrarPie();
            ?>
    </body>
</html>