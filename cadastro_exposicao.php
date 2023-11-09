<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Exposições</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastro de Exposições</h1>
        <form action="insert_exposicao.php" method="POST" class="mt-4">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Digite o Título da Exposição">
            </div>
            <div class="form-group">
                <label for="data_inicio">Data Inicial</label>
                <input type="date" class="form-control" name="data_inicio" id="data_inicio">
            </div>
            <div class="form-group">
                <label for="data_fim">Data Final</label>
                <input type="date" class="form-control" name="data_fim" id="data_fim">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <div class="mt-4">
            <a href="exposicoes.php" class="btn btn-success">Ver Exposições</a>
            <a href="index.php" class="btn btn-secondary">Início</a>
        </div>
        
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
