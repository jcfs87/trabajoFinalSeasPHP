<!doctype html>
<html>
<head>
<link rel="stylesheet" href="formularioModificacion.css">
<meta charset="utf-8">
<title>Registrar usuario</title>
</head>
<?php
      include_once('./registrarUsuario.php');
?>

<body>
  
<p><span class="error">* required field</span></p> 
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
Name: <input type="text" name="name" required>
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
E-mail: <input type="text" name="email" required>
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Password: <input type="password" name="password" required>
<span class="error">* <?php echo $passwordErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php

echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $password_hash;
?>
</body>
</html>