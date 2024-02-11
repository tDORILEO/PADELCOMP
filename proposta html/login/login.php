<?php
// Conexão com o banco de dados (substitua com suas próprias credenciais)
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Conectando ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Pegando os valores do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta SQL para verificar se o email e a senha correspondem a um registro no banco de dados
$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Se encontrou um registro, redireciona para outra página
    header("Location: outro_index.html");
} else {
    // Se não encontrou um registro, redireciona para a página de login com mensagem de erro
    header("Location: index.html?login=erro");
}

$conn->close();
?>
