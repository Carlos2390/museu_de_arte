<?php include 'partials/_header.html';?>

    <div class="container mt-4">
        <div class="row">
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

            // Consulta SQL para selecionar todos os registros da tabela
            // $nome_obra = $_POST["pesquisa"];
            $termo_pesquisa = $_POST["pesquisa"];

            // Consulta SQL para buscar obras pelo nome
            $query = "SELECT * FROM obras_de_arte WHERE titulo LIKE '%$termo_pesquisa%' OR artista LIKE '%$termo_pesquisa%' OR material LIKE '%$termo_pesquisa%'";
            $result = mysqli_query($conn, $query);

            // Verificar se há registros
            if (mysqli_num_rows($result) > 0) {
                // Loop para percorrer os registros e exibir cada linha
                while ($row = mysqli_fetch_assoc($result)) {
                    $src = $row["url_image"];
                    $alt = $row["titulo"];
                    $imagem = "<img src='" . $src . "' alt='" . $alt . "' class='card-img-top img-fluid'>";
                    $titulo = $row["titulo"];
                    $artista = $row["artista"];

                    // Extraindo o ano da data de criação
                    $data_criacao = $row["data_criacao"];
                    $ano_criacao = date('Y', strtotime($data_criacao));
                    $material = $row["material"];
                    $dimensoes = $row["dimensoes"];

                    $descricao = $artista .' | '. $ano_criacao .' | '.  $material;
                    $id = $row["id"];

                    // Envolve a div CARD em uma âncora clicável
                    echo "<div class='col-md-4'>
                                <a href='obra_detalhe.php?obra_id=".$id. "' class='card'>
                                    $imagem
                                    <div class='card-content'>
                                        <h2>$titulo</h2>
                                        <p>$descricao</p>
                                    </div>
                                </a>
                            </div>";
                }
            } else {
                echo "Não foram encontrados registros na tabela.";
            }

            // Fechar a conexão
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
