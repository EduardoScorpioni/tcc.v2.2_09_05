<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medclick";

$_SESSION['usuario'] = $user['nome'];
$_SESSION['id'] = $user['id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM pacientes WHERE cpf = ? OR email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($senha, $user['senha'])) {
        $_SESSION['usuario'] = $user['nome'];
        $_SESSION['id'] = $user['id'];
        header("Location: index.html?login=ok");

exit;

        exit;
    } else {
        header("Location: login.html?erro=senha");

    }
} else {
    echo "Usuário não encontrado.";
}

$stmt->close();
$conn->close();
?>
