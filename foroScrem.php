<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
include_once 'crud.php';?>

<body>
<div class= ".miClase">
  <h1>¡Bienvenido a nuestro Foro!</h1>
  <p>Esperamos que disfrutes tu estancia aquí.</p>
  
</div>
<div>   
  <p>Escribe el tema</p>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <textarea id="descripcion" name="descripcion" rows="4" 
  cols="50" placeholder="Escribe aquí tu descripción aquí.">
</textarea>
 <br>
  <input type="number" name="id_usuarioTema" required>
  <br>
  <button type="textTema" name="textTema" value="textTema">Enviar</button>
</form>
  </div>
</body>
</html>