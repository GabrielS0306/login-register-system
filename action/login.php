<?php

    // login.php - processa o login do usuário
    session_start();
    require_once '../DataBase/conexao.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: ../login.php");
        exit;
    }

    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['password'] ?? '';

    if (empty($email) || empty($senha)) {
        $_SESSION['error'] = "Todos os campos são obrigatórios.";
        header("Location: ../login.php");
        exit;
    }

    // busca usuário APENAS pelo email
    $stmt = $conexao->prepare("SELECT id, username, password FROM users WHERE email = :email");

    $stmt->execute([':email' => $email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // verifica a senha
    if ($user && password_verify($senha, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['usuario'] = $user['username'];

        header("Location: ../dashboard.php");
        exit;
    }

    // login inválido
    $_SESSION['error'] = "Email ou senha inválidos.";
    header("Location: ../login.php");
    exit;

?>