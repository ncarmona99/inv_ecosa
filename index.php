<?php 
include('connection.php');

$con = connection();

$SQLProducto = 'SELECT p.idProducto, p.codProducto, p.empaque, p.descripcion, p.stock, c.nomCategoria FROM mydb.Producto p JOIN mydb.Categoria c ON p.Categoria_idCategoria = c.idCategoria ORDER BY p.idProducto';
$SQLTrabajadores = "SELECT idSolicitante, CONCAT(nombre, ' ', appaterno, ' ', apmaterno) AS 'nombreCompleto' FROM mydb.Solicitante WHERE numrut != 'NULL';";
                
$query1 = mysqli_query($con, $SQLProducto);
$query2 = mysqli_query($con, $SQLTrabajadores);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de oficina Eco S.A.</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>
<body>
    <form action="insertarSolicitud.php" id="form" method="POST">
        <div class="mb-3">
            <table id="myTable" class="display">
                <h1>Lista de Stock</h1>
                <thead>
                    <tr>
                        <th>ID Producto</th>
                        <th>COD Producto</th>
                        <th>Empaque</th>
                        <th>Descripcion</th>
                        <th>Stock</th>
                        <th>Categoría</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($query1)): ?>
                        <tr>
                            <td><?= $row['idProducto'] ?></td>
                            <td><?= $row['codProducto'] ?></td>
                            <td><?= $row['empaque'] ?></td>
                            <td><?= $row['descripcion'] ?></td>
                            <td><?= $row['stock'] ?></td>
                            <td><?= $row['nomCategoria'] ?></td>
                            <td style="border:0"><input type="radio" value="<?= $row['idProducto'] ?>" name="seleccion"></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="mb-3">
            <h1>Ingresar solicitud</h1>

            <label for="solicitante">Seleccione solicitante:</label>
            <select id="solicitante" name="solicitante">
                <?php while($row = mysqli_fetch_array($query2)): ?>
                <option value="<?php echo $row['idSolicitante'];?>"><?= $row['nombreCompleto'] ?></option>
                <?php endwhile; ?>
            </select><br>
            <label for="cantidad">Escriba cantidad que llevará del producto:</label>
            <input type="number" name="cantidad" id="cantidad"><br>
            <input type="submit" value="Agregar Producto">
        </div>
    </form>
    <script src="script.js"></script>
</body>
</html>
