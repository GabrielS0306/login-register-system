<?php 

    /**
     * Conexão com o banco de dados usando PDO
     * 
     * Certifique-se de substituir as credenciais de conexão (host, dbname, username, password) pelos valores corretos do seu ambiente de banco de dados.
     */
    try {
        $host = 'localhost';
        $dbname = 'auth_system';
        $username = 'root';
        $password = '';

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Conexão realizada com sucesso!";
    } catch (PDOException $erro) {
        echo "Erro na conexão: " . $erro->getMessage();
    }

?>