
<?php 
require "include/conn.php";

if(isset($_GET['codigo'])){

$sql = "SELECT * 
		FROM articulo 
		where codigo = :codigo";

try{
	$statement = $coneccion->prepare($sql);
	$statement ->bindValue(':codigo', $_GET['codigo']);
	$statement -> execute();

	$codigo = $statement->fetch(PDO::FETCH_ASSOC);

	} catch(PDOException $error){
		echo $error-> getMessage();
	}

} else{
		echo "se necesita un codigo";
		exit;

}

	if (isset($_POST['submit'])){
	$codigo = [
		"codigo" 		=> $_POST['codigo'],
		"descripcion" 	=> $_POST['descripcion'],
		"volumen" 		=> $_POST['volumen'],
		"estado" 		=> $_POST['estado']
	];

	$sql = "UPDATE articulo 
			set 
			codigo = :codigo,
			descripcion = :descripcion,
			volumen = :volumen,
			estado = :estado

			where codigo = :codigo";

	try {
		$statement = $coneccion->prepare($sql);
		$statement -> execute($codigo);
		} catch(PDOException $error){
			echo $error->getMessage(); 

		}
	}

?>
<?php require "templates/header.php";?>

<?php if (isset($_POST['submit']) && $statement): ?>
	<blockquote><?php echo $_POST['codigo']; ?> modificado correctamente. </blockquote>

<?php endif; ?>

<h2>Editar un Articulo</h2>

<form method="POST">
	<?php foreach($codigo as $key => $value): ?>
		<label for="<?php echo $key; ?>"> <?php echo ucfirst($key); ?></label>
		<input name="<?php echo $key;?>" id="<?php echo $key;?>"
				value="<?php echo $value; ?>" <?php echo($key ==='codigo' ? 'readonly':null);?>>	
		<?php endforeach; ?>
		<input type="submit" name="submit" value="Modificar">
</form>

<a href="index.php">Volver</a>

<?php require "templates/footer.php"; ?>





<?php

error_reporting(E_ALL);

ini_set('display_errors', '1');

?>