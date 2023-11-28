<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obras da Exposição</title>
    <link rel="stylesheet" href="estilos/cards.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<header class="text-center mt-4">
    <div class="mt-4">
        <a href="index.php" class="btn btn-secondary">Início</a> 
        <a href="exposicoes.php" class="btn btn-success">Ver Exposições</a>
    </div>
</header>
<body>
    <div class="container mt-5">
            <?php
            $servername = "localhost";
            $database = "museu";
            $username = "root";
            $password = "";
            
            if (isset($_GET["exposicao_id"])) {
                // Recupere o título da exposição com base no ID da exposição
                $exposicao_id = $_GET["exposicao_id"];
                $conn = mysqli_connect($servername, $username, $password, $database);

                if ($conn) {
                    $query = "SELECT titulo FROM exposicoes WHERE id = $exposicao_id";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        echo "<h1 class='text-center'>" . $row["titulo"] . "</h1>";
                    }
                }
            }
            ?>
        <div class="row">
            <?php
            

            // Verifica se o ID da exposição foi passado como parâmetro na URL
            if (isset($_GET["exposicao_id"])) {
                $exposicao_id = $_GET["exposicao_id"];

                // Conexão com o banco de dados
                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Conexão falhou: " . mysqli_connect_error());
                }

                // Consulta SQL para obter as obras da exposição
                $query = "SELECT obras_de_arte.id, obras_de_arte.titulo, obras_de_arte.url_image, obras_de_arte.artista, obras_de_arte.data_criacao, obras_de_arte.material
          FROM obras_de_arte
          INNER JOIN obras_de_arte_em_exposicoes ON obras_de_arte.id = obras_de_arte_em_exposicoes.obra_de_arte_id
          WHERE obras_de_arte_em_exposicoes.exposicao_id = $exposicao_id";


                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $src = $row["url_image"];
                        $alt = $row["titulo"];
                        $imagem = "<img src='" . $src . "' alt='" . $alt . "' class='card-img-top img-fluid'>";
                        $titulo = $row["titulo"];
                        $artista = $row["artista"];

                        $data_criacao = $row["data_criacao"];
                        $ano_criacao = date('Y', strtotime($data_criacao));
                        $material = $row["material"];

                        $descricao = $artista .' | '. $ano_criacao .' | '.  $material;
                        $id = $row["id"];
                        echo "<div class='col-md-4'>
                                <a href='obra_detalhe.php?obra_id=".$id. "' class='card'>
                                    $imagem
                                    <div class='card-content'>
                                        <h2>$titulo</h2>
                                        <p>$descricao</p>
                                    </div>
                                </a>
                                <form action='remove_obra_exposicao.php' method='POST'>
                                    <input type='hidden' name='exposicao_id' value=' $exposicao_id'>
                                    <input type='hidden' name='obra_id' value='$id'>
                                    <button type='submit' class='btn-exclusao btn btn-danger' onclick='return confirm('Tem certeza de que deseja remover esta obra da exposição?')'>Remover Obra</button>
                                </form>
                            </div>";
                    }
                } else {
                    echo "Nenhuma obra encontrada para esta exposição.";
                }

                // Fecha a conexão
                mysqli_close($conn);
            } else {
                echo "ID da exposição não fornecido.";
            }
            ?>
        </div>
        <div class="text-center mt-4">
            <a href="cadastra_obra_exposicao.php?exposicao_id=<?php echo $exposicao_id; ?>" class="btn btn-success">Cadastrar Obra</a>
            <button type='button' class='btn btn-danger' id='btnDesassociarObras'>Desassociar Obra</button>
            <div class="mt-4">
                <form action="delete_exposicao.php" method="POST" onsubmit="return confirm('Tem certeza de que deseja excluir esta exposição?')" class="text-center">
                    <a href="edit_exposicao.php?exposicao_id=<?php echo $exposicao_id; ?>" class="btn btn-warning">Editar Exposição</a>
                    <input type="hidden" name="exposicao_id" value="<?php echo $exposicao_id; ?>">
                    <button type="submit" class="btn btn-danger">Excluir Exposição</button>
                </form>
            </div>
        </div>
        <br>
        
    </div>
    
    <!-- Adicione este script no final do seu arquivo HTML -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Inicializa uma variável de controle
            var exclusaoVisivel = false;

            // Esconde os botões de exclusão inicialmente
            var botoesExclusao = document.querySelectorAll('.btn-exclusao');
            botoesExclusao.forEach(function (botao) {
                botao.style.display = 'none';
            });

            // Adiciona um ouvinte de evento ao botão "Desassociar Obras"
            document.getElementById('btnDesassociarObras').addEventListener('click', function () {
                // Alterna a visibilidade dos botões de exclusão
                exclusaoVisivel = !exclusaoVisivel;

                // Exibe ou oculta os botões de exclusão com base na variável de controle
                botoesExclusao.forEach(function (botao) {
                    botao.style.display = exclusaoVisivel ? 'inline-block' : 'none';
                });
            });
        });
    </script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
