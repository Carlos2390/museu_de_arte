<?php
// Verifica se há um parâmetro de erro na URL
if (isset($_GET['erro'])) {
    $erro = $_GET['erro'];

    // Exibe a mensagem correspondente ao erro
    if ($erro === 'obra_associada') {
        echo '<div class="alert alert-danger" role="alert">
                Esta obra já está associada a esta exposição.
              </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Obras em Exposições</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastrar Obras em Exposições</h1>
        <form action="insert_obra_exposicao.php" method="POST" class="mt-4">
            <div class="form-group">
                <label for="exposicao">Selecione a Exposição:</label>
                <select class="form-control" name="exposicao" id="exposicao">
                    <?php
                    $servername = "localhost";
                    $database = "museu";
                    $username = "root";
                    $password = "";

                    // Conexão com o banco de dados
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // ID da exposição obtido via GET
                    $exposicao_id = isset($_GET['exposicao_id']) ? $_GET['exposicao_id'] : null;

                    // Consulta SQL para obter as exposições do banco de dados
                    $query = "SELECT id, titulo FROM exposicoes";
                    $result = mysqli_query($conn, $query);

                    // Preenche as opções com os resultados da consulta
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = ($row['id'] == $exposicao_id) ? 'selected' : '';
                        echo "<option value='" . $row['id'] . "' $selected>" . $row['titulo'] . "</option>";
                    }

                    // Fecha a conexão
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="obra_arte">Selecione a Obra de Arte:</label>
                <select class="form-control" name="obra_arte" id="obra_arte">
                    <?php
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Consulta SQL para obter as obras de arte do banco de dados
                    $query = "SELECT id, titulo FROM obras_de_arte";
                    $result = mysqli_query($conn, $query);

                    // Preenche as opções com os resultados da consulta
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['titulo'] . "</option>";
                    }

                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        <div class="mt-4">
            <a href="exposicoes.php" class="btn btn-success">Ver Exposições</a>
            <a href="index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
