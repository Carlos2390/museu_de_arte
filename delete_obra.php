<?php
$servername = "localhost";
$database = "museu";
$username = "root";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o ID da obra a ser excluída
    $obra_id = $_POST["obra_id"];

    // Conexão com o banco de dados
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }
    // Remover associações
    $queryRemoveAssociacao = "DELETE FROM obras_de_arte_em_exposicoes WHERE obra_de_arte_id = $obra_id";
    mysqli_query($conn, $queryRemoveAssociacao);

    // Consulta SQL para excluir a obra da tabela
    $query = "DELETE FROM obras_de_arte WHERE id = $obra_id";

    if (mysqli_query($conn, $query)) {
        // Redireciona de volta à página inicial após a exclusão
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao excluir a obra: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
}
?>
