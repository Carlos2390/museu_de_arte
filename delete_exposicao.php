<?php
$servername = "localhost";
$database = "museu";
$username = "root";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exposicao_id = $_POST["exposicao_id"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Excluir relacionamentos na tabela obras_de_arte_em_exposicoes
    $query_delete_relacionamentos = "DELETE FROM obras_de_arte_em_exposicoes WHERE exposicao_id = $exposicao_id";
    mysqli_query($conn, $query_delete_relacionamentos);

    $query_delete_exposicao = "DELETE FROM exposicoes WHERE id = $exposicao_id";
    
    if (mysqli_query($conn, $query_delete_exposicao)) {
        header("Location: exposicoes.php");
        exit;
    } else {
        echo "Erro ao excluir exposição: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
