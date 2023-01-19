<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Usuario</title>
<link rel="stylesheet" href="formularioModificacion.css">
</head>
<?php 
     include_once('./crud.php');
?>

<body>
  
<p><span class="error">* required field</span></p> 
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<div class="form-element">
    <label for="Name">Name</label>
     <input type="text" name="name" required>
    <span class="error">* <?php echo $nameErr;?></span>
</div>

<div class="form-element">
<label for="Email">Email</label>

 <input type="text" name="email" required>
<span class="error">* <?php echo $emailErr;?></span>
</div>

<div class="form-element">
<label for="Email">Password</label>
<input type="password" name="password" required>
<span class="error">* <?php echo $passwordErr;?></span>
</div>

<button type="submit" name="login" value="login">Log In</button>
</form>

<?php

echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $password;
?>
</body>
</html>
