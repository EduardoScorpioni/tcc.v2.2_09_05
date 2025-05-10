<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = ""; // Altere se tiver senha
$dbname = "medclick";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Coletar dados do formulário
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$data_nascimento = $_POST['data_nascimento'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$possui_deficiencia = $_POST['possui_deficiencia'];
$deficiencia = isset($_POST['deficiencia']) ? $_POST['deficiencia'] : NULL;
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

 // Verifica se já existe CPF ou E-mail
$verifica_sql = "SELECT id FROM pacientes WHERE cpf = ? OR email = ?";
$verifica_stmt = $conn->prepare($verifica_sql);
$verifica_stmt->bind_param("ss", $cpf, $email);
$verifica_stmt->execute();
$verifica_result = $verifica_stmt->get_result();

if ($verifica_result->num_rows > 0) {
    echo "Erro: CPF ou E-mail já cadastrados!";
    exit;
}
$verifica_stmt->close();


$sql = "INSERT INTO pacientes (nome, cpf, email, endereco, data_nascimento, sexo, telefone, possui_deficiencia, deficiencia, senha)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        header("Location: login.html?sucesso=1");
        exit;
        

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $nome, $cpf, $email, $endereco, $data_nascimento, $sexo, $telefone, $possui_deficiencia, $deficiencia, $senha);


if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
} else {
    header("Location: login.html?erro=senha");


}

$stmt->close();
$conn->close();
?>
