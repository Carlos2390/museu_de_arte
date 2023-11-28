<h1>Museu: Sistema de Gerenciamento de Obras e Exposições</h1>

<h2>Visão Geral</h2>
<p>
    Bem-vindo ao Museu, um sistema web dedicado ao gerenciamento de obras de arte e exposições.
    Este projeto oferece uma plataforma interativa para curadores de museus e entusiastas de arte controlarem e explorarem a rica coleção de obras.
</p>

<h2>Funcionalidades Principais</h2>
<ul>
    <li><strong>Cadastro de Obras de Arte:</strong> Registre obras de arte, incluindo informações como título, artista, data de criação, material, dimensões e imagem.</li>
    <li><strong>Cadastro de Exposições:</strong> Adicione exposições, especificando título, data de início, data de término e local.</li>
    <li><strong>Associação de Obras a Exposições:</strong> Associe obras de arte a exposições para destacar a presença delas em eventos específicos.</li>
    <li><strong>Detalhes da Obra de Arte:</strong> Visualize detalhes específicos de uma obra de arte, incluindo sua imagem, artista, data de criação, material e dimensões.</li>
    <li><strong>Detalhes da Exposição:</strong> Explore exposições para ver a lista de obras associadas, proporcionando uma visão abrangente dos eventos.</li>
    <li><strong>Edição e Exclusão:</strong> Edite informações de obras de arte e exposições, além de excluir itens, sempre mantendo a consistência do sistema.</li>
</ul>

<h2>Pré-requisitos</h2>
<ul>
    <li>Servidor web (por exemplo, Apache) ou ambiente de desenvolvimento (como XAMPP ou WampServer).</li>
    <li>MySQL para armazenamento de dados.</li>
    <li>PHP para a lógica do servidor.</li>
</ul>

<h2>Instruções de Instalação</h2>
<ol>
    <li>Clone este repositório em seu ambiente web local.</li>
    <li>Importe o script SQL fornecido (`script.sql`) para criar o banco de dados e tabelas necessárias.</li>
    <li>Configure as credenciais do banco de dados no código PHP, se necessário.</li>
    <li>Inicie seu servidor web e abra o projeto no navegador.</li>
</ol>

<h2>Estrutura do Projeto</h2>
<ul>
    <li><strong>index.php:</strong> Página inicial exibindo obras e exposições.</li>
    <li><strong>cadastra_obra.php:</strong> Formulário para adicionar novas obras de arte.</li>
    <li><strong>cadastra_exposicao.php:</strong> Formulário para criar novas exposições.</li>
    <li><strong>obra_detalhe.php:</strong> Detalhes específicos de uma obra de arte.</li>
    <li><strong>obra_exposicao.php:</strong> Lista obras associadas a uma exposição.</li>
    <li><strong>edit_obra.php:</strong> Formulário para editar informações de uma obra de arte.</li>
    <li><strong>edit_exposicao.php:</strong> Formulário para editar informações de uma exposição.</li>
    <li><strong>insert_obra_exposicao.php:</strong> Associa uma obra a uma exposição.</li>
    <li><strong>delete_exposicao.php:</strong> Remove uma exposição.</li>
    <li><strong>delete_obra.php:</strong> Remove uma obra de arte.</li>
</ul>

<h2>Contribuições e Melhorias</h2>
<p>
    Este projeto é um trabalho em andamento. Contribuições são bem-vindas para aprimorar a usabilidade, corrigir bugs ou adicionar novos recursos.
    Sinta-se à vontade para abrir issues ou enviar pull requests.
</p>
