<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Obra de Arte</title>
    <link rel="stylesheet" href="estilos/cards.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .obra-imagem {
            max-width: 1000px;
            height: 500px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php
        $servername = "localhost";
        $database = "museu";
        $username = "root";
        $password = "";

        if (isset($_GET["obra_id"])) {
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
                $src = $row["url_image"];
                $alt = $titulo;
                $imagem = "<img src='" . $src . "' alt='" . $alt . "' class='img-fluid obra-imagem'>";
                $artista = $row["artista"];
                $data_criacao = $row["data_criacao"];
                $ano_criacao = date('Y', strtotime($data_criacao));
                $material = $row["material"];
                $dimensoes = $row["dimensoes"];

                echo "<h1 class='text-center'>$titulo</h1>";
                echo "<div class='text-center'>$imagem</div>";
                echo "<div class='text-center'><p class='text-lg'>$artista | $ano_criacao | $material</p></div>";
                echo "<div class='text-center'><p class='text-lg'>$dimensoes</p></div>";
            } else {
                echo "Obra não encontrada.";
            }

            // Fecha a conexão
            mysqli_close($conn);
        } else {
            echo "ID da obra não fornecido.";
        }
        ?>
        <div class='text-center mt-4'>
            <div class="mt-4">
                <a href="exposicoes.php" class="btn btn-success">Ver Exposições</a>
            </div> <br>
            <a href='index.php' class='btn btn-primary'>Início</a>
        </div>
        <br>
    </div>
    <?php include 'partials/_footer.html';?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
