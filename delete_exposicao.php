<?php
// delete_exposicao.php

$servername = "localhost";
$database = "museu";
$username = "root";
$password = "";

// Verifica se o ID da exposição foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["exposicao_id"])) {
    $exposicao_id = $_POST["exposicao_id"];

    // Conexão com o banco de dados
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Consulta SQL para excluir a exposição
    $query = "DELETE FROM exposicoes WHERE id = $exposicao_id";

    if (mysqli_query($conn, $query)) {
        // Redireciona de volta à página de exposições após a exclusão
        header("Location: exposicoes.php");
        exit; // Encerra o script após o redirecionamento
    } else {
        echo "Erro ao excluir exposição: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
} else {
    echo "ID da exposição não fornecido.";
}
?>
