<?php

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

    $stmt = $conexao->prepare("
        SELECT id, username, email, password 
        FROM usuarios 
        WHERE email = :email
    ");

    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['usuario'] = $user['username'];
        $_SESSION['email'] = $user['email']; // 🔥 agora funciona no dashboard

        header("Location: ../dashboard.php");
        exit;
    }

    $_SESSION['error'] = "Email ou senha inválidos.";
    header("Location: ../login.php");
    exit;

?>