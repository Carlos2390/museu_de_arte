<?php
$servername = "localhost";
$database = "museu";
$username = "root";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exposicao_id = $_POST["exposicao_id"];
    $obra_id = $_POST["obra_id"];

    // Conexão com o banco de dados
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Consulta SQL para remover a associação da obra com a exposição
    $query = "DELETE FROM obras_de_arte_em_exposicoes WHERE obra_de_arte_id = $obra_id AND exposicao_id = $exposicao_id";

    if (mysqli_query($conn, $query)) {
        header("Location: obra_exposicao.php?exposicao_id=$exposicao_id");
        exit;
    } else {
        echo "Erro ao remover obra da exposição: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
}
?>
