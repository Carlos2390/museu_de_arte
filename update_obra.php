<?php
$servername = "localhost";
$database = "museu";
$username = "root";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $obra_id = $_POST["obra_id"];
    $titulo = $_POST["titulo"];
    $artista = $_POST["artista"];
    $data_criacao = $_POST["data_criacao"];
    $material = $_POST["material"];
    $dimensoes = $_POST["dimensoes"];
    $url_image = $_POST["url_image"];

    // Conexão com o banco de dados
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Consulta SQL para atualizar os dados na tabela obras_de_arte
    $query = "UPDATE obras_de_arte SET 
            titulo = '$titulo',
            artista = '$artista',
            data_criacao = '$data_criacao',
            material = '$material',
            dimensoes = '$dimensoes',
            url_image = '$url_image'
            WHERE id = $obra_id";

    if (mysqli_query($conn, $query)) {
        // Redireciona de volta à página de detalhes da obra após a atualização
        header("Location: obra_detalhe.php?obra_id=$obra_id");
        exit; // Encerra o script após o redirecionamento
    } else {
        echo "Erro ao atualizar a obra: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
}
?>
