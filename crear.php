<?php 
require "include/conn.php";

if(isset($_POST['submit'])){

$nuevo_articulo  = array(
	"codigo" 		=> $_POST['codigo'],
	"descripcion" 	=> $_POST['descripcion'],
	"volumen" 		=> $_POST['volumen'],
	"estado" 		=> $_POST['estado'],
);

$sql = "INSERT INTO articulo (codigo, descripcion, volumen, estado) 
	values (:codigo, :descripcion, :volumen, :estado)";

try{
	$statement = $coneccion->prepare($sql);
	$statement -> execute($nuevo_articulo);
	} catch(PDOException $error){
	echo $error-> getMessage();
		}
	}
?>
  <?php require "templates/header.php";?>

<?php if(isset($_POST['submit']) && $statement) : ?>
	<blockquote><?php echo $_POST['codigo'];?> se a añadido correctamente.</blockquote>

<?php endif ; ?> 
 
<h2> Añade un Articulo </h2>

<form method="post">
	<label for="codigo">Codigo</label>
	<input type="number" name="codigo" id="codigo">

	<label for="descripcion">Descripcion</label>
	<input type="text" name="descripcion" id="descripcion">

	<label for="volumen">Volumen</label>
	<input type="number" name="volumen" id="volumen">

	<label for="estado">Estado</label>
	<input type="number" name="estado" id="estado">
	<input type="submit" name="submit" value="Añadir">
</form>

<a href="index.php">Volver</a>

<?php require "templates/footer.php"; ?>