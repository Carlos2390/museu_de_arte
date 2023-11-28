<?php
$servername = "localhost";
$database = "museu";
$username = "root";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["obra_id"])) {
    // Obtém o ID da obra a ser editada
    $obra_id = $_GET["obra_id"];

    // Conexão com o banco de dados
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Consulta SQL para obter os detalhes da obra com base no ID
    $query = "SELECT * FROM obras_de_arte WHERE id = $obra_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $titulo = $row["titulo"];
        $artista = $row["artista"];
        $data_criacao = $row["data_criacao"];
        $material = $row["material"];
        $dimensoes = $row["dimensoes"];
        $url_image = $row["url_image"];
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
        <form action="update_obra.php" method="POST">
            <input type="hidden" name="obra_id" value="<?php echo $obra_id; ?>">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $titulo; ?>">
            </div>
            <div class="form-group">
                <label for="artista">Artista</label>
                <input type="text" class="form-control" name="artista" id="artista" value="<?php echo $artista; ?>">
            </div>
            <div class="form-group">
                <label for="data_criacao">Data de Criação</label>
                <input type="date" class="form-control" name="data_criacao" id="data_criacao" value="<?php echo $data_criacao; ?>">
            </div>
            <div class="form-group">
                <label for="material">Material</label>
                <input type="text" class="form-control" name="material" id="material" value="<?php echo $material; ?>">
            </div>
            <div class="form-group">
                <label for="dimensoes">Dimensões</label>
                <input type="text" class="form-control" name="dimensoes" id="dimensoes" value="<?php echo $dimensoes; ?>">
            </div>
            <div class="form-group">
                <label for="url_image">URL da Obra</label>
                <input type="url" class="form-control" name="url_image" id="url_image" value="<?php echo $url_image; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="obra_detalhe.php?obra_id=<?php echo $obra_id; ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
