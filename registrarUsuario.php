<?php 
//Variables globales
$nameErr = $emailErr = $passwordErr = "";
$email = $name = $password = "";
require_once './connection.php';
$db = Database::getInstance();
$mysqli = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email = $_POST["email"];
        } else {
            $emailErr = "is not a valid email address";
        }
        if (preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {
            $name = $_POST["name"];
        } else {
            $nameErr = "Only letters alowed";
        }
        if (validarPassword($_POST["password"])) {
            $password = $_POST["password"];
        } else {
            $passwordErr = "la clave debe tener al menos 8 caracteres una letra mayuscula una minuscula y un numero";
        }
    }
    if (!empty($password)) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
    }
        $sql = "insert into usuario (nombre, email, contrasena )
        values (?, ?, ?)";
        $stmt = $mysqli-> prepare($sql) or die(mysqli_connect_error());
        $stmt-> bind_param("sss", $name, $email, $password_hash);
        $result = $stmt->execute();
    if ($result) {
             echo 'Your registration was successful! <br>';
             $_SESSION['id'] = mysqli_insert_id($mysqli);
    } else {
                echo 'Something went wrong!';
    }
}






function validarPassword($x)
{
    $mayuscula = preg_match("@[A-Z]@", $x);
    $minuscula = preg_match("@[a-z]@", $x);
    $numeros = preg_match("@[0-9]@", $x);
    if (!$mayuscula || !$minuscula || !$numeros ||  strlen($x) < 8) {
            return false;
    } else {
            return true;
    }
}


?>