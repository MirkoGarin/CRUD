<?php 
require "include/conn.php";

if(isset($_GET['codigo'])){

$sql = "delete from articulo
	where codigo = :codigo";

try{
	$statementDelete = $coneccion->prepare($sql);
	$statementDelete ->bindValue(':codigo', $_GET['codigo']);
	$statementDelete -> execute();
	} catch(PDOException $error){
		echo $error-> getMessage();
	}

} 


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

<h2>Borrar Articulos</h2>

<?php if(isset($statementDelete)) echo "Usuario Eliminado"; ?>

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
						<td><a href="borrar.php?codigo=<?php echo $resultados["codigo"]; ?> ">Eliminar</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
	</table>

	
<a href="index.php">Volver</a>

<?php require "templates/footer.php"; ?>