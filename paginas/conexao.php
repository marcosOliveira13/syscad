<?php
$mysqli = new mysqli("localhost", "root","","nanotecc");
$res = $mysqli->query("SELECT * FROM usuario");
$itens = $res->fetch_all(MYSQLI_ASSOC);
?>