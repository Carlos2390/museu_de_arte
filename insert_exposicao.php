<?php
$servername = "localhost";
$database = "museu";
$username = "root";
$password = "";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $titulo = $_POST["titulo"];
    $data_inicio = $_POST["data_inicio"];
    $data_fim = $_POST["data_fim"];

    // Conexão com o banco de dados
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Consulta SQL para inserir os dados na tabela obras_de_arte_em_exposicoes
    $query = "INSERT INTO exposicoes (titulo, data_inicio, data_fim) VALUES ('{$titulo}', '{$data_inicio}', '{$data_fim}')";

    if (mysqli_query($conn, $query)) {
        // Redireciona de volta à página de cadastro de obra em exposição após o sucesso
        header("Location: exposicoes.php");
        exit; // Encerra o script após o redirecionamento
    } else {
        echo "Erro ao cadastrar obra na exposição: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
}
?>
