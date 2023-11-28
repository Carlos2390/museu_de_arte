<?php
$servername = "localhost";
$database = "museu";
$username = "root";
$password = "";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $exposicao_id = $_POST["exposicao"];
    $obra_arte_id = $_POST["obra_arte"];

    // Conexão com o banco de dados
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Verifica se a obra já está associada a essa exposição
    $verifica_query = "SELECT * FROM obras_de_arte_em_exposicoes WHERE obra_de_arte_id = '$obra_arte_id' AND exposicao_id = '$exposicao_id'";
    $verifica_result = mysqli_query($conn, $verifica_query);

    if (mysqli_num_rows($verifica_result) > 0) {
        // A obra já está associada a essa exposição, redireciona de volta à página da exposição
        header("Location: cadastra_obra_exposicao.php?exposicao_id=$exposicao_id&erro=obra_associada");
        exit;
    }
    
    // Consulta SQL para inserir os dados na tabela obras_de_arte_em_exposicoes
    $query = "INSERT INTO obras_de_arte_em_exposicoes (obra_de_arte_id, exposicao_id) VALUES ('$obra_arte_id', '$exposicao_id')";

    if (mysqli_query($conn, $query)) {
        // Redireciona de volta à página de cadastro de obra em exposição após o sucesso
        header("Location: cadastra_obra_exposicao.php?exposicao_id=$exposicao_id");
        exit; // Encerra o script após o redirecionamento
    } else {
        echo "Erro ao cadastrar obra na exposição: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
}
?>
