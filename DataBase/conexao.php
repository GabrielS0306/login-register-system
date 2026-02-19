<?php 

    // Conexão com o banco de dados
    try {
        $host = 'localhost';
        $dbname = 'auth_system';
        $username = 'root';
        $password = '';

        $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Conexão realizada com sucesso! <br>";
    } catch (PDOException $erro) {
        echo "Erro na conexão: " . $erro->getMessage();
    }

?>