<?php 
$nameErr = $emailErr = $passwordErr = "";
$email = $name = $password = "";
require_once './connection.php';
$db = Database::getInstance();
$mysqli = $db->getConnection();


if (isset($_POST['login'])) {
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
    $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    if ($row && password_verify($password, $row['contrasena'])) {
        header('Location: foroScrem.php');
        echo "Usuario existe";
    } else {
        echo '<p class="error">Username password combination is wrong!!</p>';
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