<?php
// update_exposicao.php

$servername = "localhost";
$database = "museu";
$username = "root";
$password = "";

// Verifica se o formulário foi submetido via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exposicao_id = $_POST["exposicao_id"];
    $novo_titulo = $_POST["titulo"];
    $nova_data_inicio = $_POST["data_inicio"];
    $nova_data_fim = $_POST["data_fim"];
    $novo_local = $_POST["local"];
    
    // Adicione outros campos conforme necessário

    // Conexão com o banco de dados
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Consulta SQL para atualizar os dados da exposição
    $query = "UPDATE exposicoes SET 
                titulo = '$novo_titulo', 
                data_inicio = '$nova_data_inicio', 
                data_fim = '$nova_data_fim', 
                local = '$novo_local'
                WHERE id = $exposicao_id";

    // Adicione outros campos conforme necessário

    if (mysqli_query($conn, $query)) {
        // Redireciona de volta à página de exposições após a atualização
        header("Location: exposicoes.php");
        exit; // Encerra o script após o redirecionamento
    } else {
        echo "Erro ao atualizar exposição: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
} else {
    echo "Formulário não submetido corretamente.";
}
?>
