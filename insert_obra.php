<?php
$servername = "localhost";
$database = "museu";
$username = "root";
$password = "";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $titulo = $_POST["titulo"];
    $artista = $_POST["artista"];
    $data_criacao = $_POST["data_criacao"];
    $material = $_POST["material"];
    $dimensao = $_POST["dimensao"];
    $url_image = $_POST["url_image"];

    // Conexão com o banco de dados
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Consulta SQL para inserir os dados na tabela obras_de_arte_em_exposicoes
    $sql = "INSERT INTO obras_de_arte (titulo, artista, data_criacao, material, dimensoes, url_image) VALUES ('{$titulo}', '{$artista}', '{$data_criacao}', '{$material}', '{$dimensao}', '{$url_image}')";

    if (mysqli_query($conn, $sql)) {
        // Redireciona de volta à página de cadastro de obra em exposição após o sucesso
        header("Location: index.php");
        exit; // Encerra o script após o redirecionamento
    } else {
        echo "Erro ao cadastrar obra na exposição: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
}
?>
