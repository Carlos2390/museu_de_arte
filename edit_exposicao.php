<?php
$servername = "localhost";
$database = "museu";
$username = "root";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["exposicao_id"])) {
    // Obtém o ID da obra a ser editada
    $exposicao_id = $_GET["exposicao_id"];

    // Conexão com o banco de dados
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Consulta SQL para obter os detalhes da obra com base no ID
    $query = "SELECT * FROM exposicoes WHERE id = $exposicao_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $titulo = $row["titulo"];
        $data_inicio = $row['data_inicio'];
        $data_fim = $row['data_fim'];
    } else {
        echo "Obra não encontrada.";
        exit;
    }

    // Fecha a conexão
    mysqli_close($conn);
} else {
    echo "ID da obra não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Obra de Arte</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Obra de Arte</h1>
        <form action="update_exposicao.php" method="POST">
            <input type="hidden" name="exposicao_id" value="<?php echo $exposicao_id; ?>">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $titulo; ?>">
            </div>
            <div class="form-group">
                <label for="artista">Data de Início:</label>
                <input type="date" class="form-control" name="data_inicio" id="data_inicio" value="<?php echo $data_inicio; ?>">
            </div>
            <div class="form-group">
                <label for="data_fim">Data de Fim:</label>
                <input type="date" class="form-control" name="data_fim" id="data_fim" value="<?php echo $data_fim; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="obra_detalhe.php?exposicao_id=<?php echo $exposicao_id; ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
