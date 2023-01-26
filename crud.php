<?php
     require_once './connection.php';
     $db = Database::getInstance();
     $mysqli = $db->getConnection();
     $descripcion = "";
     $id_usuarioTema = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['textTema'])) {
        $descripcion = $_POST['descripcion'];
        $id_usuarioTema = $_POST['id_usuarioTema'];
        $sql = "insert into tema (descripcion, id_usuarioTema)
    values (?, ?)";
        $stmt = $mysqli-> prepare($sql) or die(mysqli_connect_error());
        $stmt-> bind_param("ss", $descripcion, $id_usuarioTema);
        $result = $stmt->execute();
        if ($result) {
             echo 'Your registration was successful! <br>';
            $_SESSION['id'] = mysqli_insert_id($mysqli);
        } else {
            echo 'Something went wrong!';
        }
    } else {
        echo 'Something went wrong!';
    }
} else {
    echo 'algo esta mal';
}
?>