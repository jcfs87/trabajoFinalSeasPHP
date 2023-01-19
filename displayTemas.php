<?php 
require_once './connection.php';
$db = Database::getInstance();
$mysqli = $db->getConnection();
$sql_query1 = "select * from usuario";
$sql_query2 = "select * from tema";
$sql_query3 = "select * from comentario";
$result = $mysqli->query($sql_query1);
$result2 = $mysqli->query($sql_query2);
$result3 = $mysqli->query($sql_query3);
    echo '<table border="1">';
    echo '<th> id_usuario </th><th> Nombre </th> <th> Email </th>';
while ($reg = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>';
        echo '<td>', $reg['id_usuario'], '</td>';
        echo '<td>', $reg['nombre'], '</td>';
        echo '<td>', $reg['email'], '</td>';
        echo '</tr>';
}
        echo '</table>';
        echo '<br><br>';
        echo '<table border="1">';
        echo '<th> id tema </th> <th> tema propuesto foro </th> <th> id usuario</th>';
while ($reg = mysqli_fetch_array($result2, MYSQLI_BOTH)) {
            echo '<tr>';
            echo '<td>', $reg[0], '</td>';
            echo '<td>', $reg['descripcion'], '</td>';
            echo '<td>', $reg[2], '</td>';
            echo '</tr>';
}
            echo '</table>';
            echo '</table>';
            echo '<br><br>';
            echo '<table border="1">';
            echo '<th> id usuario </th> <th> id tema </th> <th> mensaje sobre el tema </th>';
while ($reg = mysqli_fetch_array($result3, MYSQLI_BOTH)) {
                echo '<tr>';
                echo '<td>', $reg[0], '</td>';
                echo '<td>', $reg[1], '</td>';
                echo '<td>', $reg[2], '</td>';
                echo '</tr>';
}
                echo '</table>';


?>
<p><a href="index.php">Volver</a></p>
