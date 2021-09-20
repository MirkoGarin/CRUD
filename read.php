<?php 
require "include/conn.php";

if(isset($_POST['submit'])){

	
$sql = "SELECT * 
					FROM articulo 
					where codigo = :codigo  ";

try{
	$statement = $coneccion->prepare($sql);
	$statement ->bindParam(':codigo', $_POST['codigo'] , PDO::PARAM_INT);
	$statement -> execute();
	$resultado = $statement -> fetchAll();

	} catch(PDOException $error){
	echo $error-> getMessage();
		}
	}
?>
  <?php require "templates/header.php";?>

<?php
if (isset($_POST['submit'])){
	if ($resultado && $statement->rowcount() > 0) { ?>

	<h2>Resultados</h2>

	<table>
		<thead>
			<tr>
			<th>Codigo</th>
			<th>Descripcion</th>
			<th>Volumen</th>
			<th>Estado</th>
		</tr>
		</thead>
			<tbody>
			<?php foreach ($resultado as $resultados) : ?>

					<tr>
						<td><?php echo $resultados["codigo"];?></td>
						<td><?php echo $resultados["descripcion"];?></td>
						<td><?php echo $resultados["volumen"];?></td>
						<td><?php echo $resultados["estado"];?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
	</table>
<?php } else { ?>
	<blockquote>No hay Articulos </blockquote>
<?php }

} ?>

<h2> Buscar articulo por codigo </h2>

<form method="post">
	<label for="codigo">Codigo</label>
	<input type="number" name="codigo" id="codigo">
	<input type="submit" name="submit" value="Buscar">
</form>

<a href="index.php">Volver</a>

<?php require "templates/footer.php"; ?>