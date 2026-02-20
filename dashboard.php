<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./src/styles/dashboard.css">
</head>
<body>
    <aside class="sidebar">
        <h2 class="logo">DevPanel</h2>
        <nav>
            <ul>
                <li class="active">Dashboard</li>
                <li>Projetos</li>
                <li>Relatórios</li>
                <li>Configurações</li>
            </ul>
        </nav>
    </aside>
    <div class="main-content">
        <header class="topbar">
            <div>
                <h1>Dashboard</h1>
                <p>
                    Bem-vindo de volta,  
                    <?= htmlspecialchars($_SESSION['usuario']) ?> 
                </p>
            </div>
            <div class="top-actions">
                <button id="toggleTheme">🌙</button>
                <div class="user">
                    <img src="https://i.pravatar.cc/40" alt="User">
                    <button class="logout">Sair</button>
                </div>
            </div>
        </header>
        <section class="cards">
            <div class="card">
                <h3>Projetos</h3>
                <p class="number">12</p>
            </div>
            <div class="card">
                <h3>Tarefas</h3>
                <p class="number">34</p>
            </div>
            <div class="card">
                <h3>Mensagens</h3>
                <p class="number">5</p>
            </div>
            <div class="card">
                <h3>Concluídos</h3>
                <p class="number">8</p>
            </div>
        </section>
        <section class="table-section">
            <h2>Atividades Recentes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Projeto</th>
                        <th>Status</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- done / progress / pending -->
                    <tr>
                        <td>Site Portfólio</td>
                        <td><span class="status done">Concluído</span></td>
                        <td>18/02/2026</td>
                    </tr>
                    <tr>
                        <td>Sistema Login</td>
                        <td><span class="status progress">Em andamento</span></td>
                        <td>17/02/2026</td>
                    </tr>
                    <tr>
                        <td>Landing Page</td>
                        <td><span class="status pending">Pendente</span></td>
                        <td>15/02/2026</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

    <script src="./src/Js/dashboard.js"></script>
</body>
</html>