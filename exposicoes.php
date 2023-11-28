<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exposições</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="mb-4">Exposições</h1>
            <a href="index.php" class="btn btn-primary mb-3">Início</a>
            <a href="cadastro_exposicao.php" class="btn btn-success mb-3">Cadastrar Exposição</a>
            
        </div>
    </div>

    <div class="container mt-5">
        <?php
        $servername = "localhost";
        $database = "museu";
        $username = "root";
        $password = "";

        // Criar conexão
        $conn = mysqli_connect($servername, $username, $password, $database);

        // Verificar a conexão
        if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }

        // Consulta SQL para selecionar todas as exposições
        $query = "SELECT * FROM exposicoes";
        $result = mysqli_query($conn, $query);

        // Verificar se há exposições
        if (mysqli_num_rows($result) > 0) {
            // Loop para percorrer as exposições e exibir cada uma
            while ($row = mysqli_fetch_assoc($result)) {
                // Adiciona o ID da exposição como um parâmetro na URL
                echo "<a href='obra_exposicao.php?exposicao_id=" . $row["id"] . "' class='btn btn-info mb-3'>" . $row["titulo"] . "</a><br>";
            }
        } else {
            echo "Não foram encontradas exposições na tabela.";
        }

        // Fechar a conexão
        mysqli_close($conn);
        ?>
    </div>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
