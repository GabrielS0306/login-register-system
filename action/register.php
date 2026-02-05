<?php

    session_start();
    require_once '../DataBase/conexao.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: ../register.php");
        exit;
    }

    $user = trim($_POST['user'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($user) || empty($email) || empty($password)) {
        header("Location: ../register.php");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php");
        exit;
    }

    if ($password !== $confirm_password) {
        header("Location: ../register.php");
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // verifica email existente
    $sql = "SELECT id FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header("Location: ../register.php");
        exit;
    }

    // insere usuário
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->execute();

    header("Location: ../login.php");
    exit;

?>