<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Cadastro de Obras</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Cadastro de Obras</h1>
        <form action="insert_obra.php" method="POST">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Digite o Título da Obra">
            </div>
            <div class="form-group">
                <label for="artista">Artista</label>
                <input type="text" class="form-control" name="artista" id="artista" placeholder="Digite o Nome do Artista">
            </div>
            <div class="form-group">
                <label for="data_criacao">Data de Criação</label>
                <input type="date" class="form-control" name="data_criacao" id="data_criacao" placeholder="Digite a Data de Criação da Obra">
            </div>
            <div class="form-group">
                <label for="material">Material</label>
                <input type="text" class="form-control" name="material" id="material" placeholder="Digite o Material da Obra">
            </div>
            <div class="form-group">
                <label for="dimensao">Dimensões</label>
                <input type="text" class="form-control" name="dimensao" id="dimensao" placeholder="Ex.: 25x30">
            </div>
            <div class="form-group">
                <label for="url_image">URL da Obra</label>
                <input type="url" class="form-control" name="url_image" id="url_image" placeholder="Digite o URL da Imagem da Obra">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="index.php" class="btn btn-secondary">Início</a>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
