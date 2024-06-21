<?php
// Conexão com o banco de dados.

include("config.php");

$conexao = mysqli_connect(SERVER, USER, PASSWORD, DATABASE) or die("Server connection error. " . mysqli_connect_error());