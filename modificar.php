<?php 
require "include/conn.php";


$sql = "SELECT * 
					FROM articulo ";

try{
	$statement = $coneccion->prepare($sql);
	$statement -> execute();
	$resultado = $statement -> fetchAll();

	} catch(PDOException $error){
			echo $error-> getMessage();
		}
	
?>
  <?php require "templates/header.php";?>

<h2>Editar Articulos</h2>

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
						<td><a href="update.php?codigo=<?php echo $resultados["codigo"]; ?> ">Editar</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
	</table>

	
<a href="index.php">Volver</a>

<?php require "templates/footer.php"; ?>