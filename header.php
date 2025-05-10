<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<head>
<link rel="stylesheet" href="styles.css">
</head>

<header>
    <div class="navbar">
        <h1><a href="index.php"><img src="img/MedClickDeLadinho.png" width="100" height="50" alt=""></a></h1>
        <nav>
            <ul>
                <li><button class="nav-button">Início</button></li>
                <div class="dropdown">
                    <button class="nav-button">Nossos Serviços</button>
                    <div class="dropdown-options">
                        <a href="AgendarConsulta.html">Agendar Consulta</a>
                        <a href="unidadesAfiliadas.html">Unidades afiliadas</a>
                        <a href="farmacias.html">Farmácias</a>
                    </div>
                </div>
                <li><a href="guiamedico.html"><button class="nav-button">Conheça a Med Click</button></a></li>
                <li><button class="nav-button">Afilados</button></li>

                <?php if (isset($_SESSION['usuario'])): ?>
                    <li>
                        <div class="usuario-container">
                            <span class="usuario-logado">Olá, <?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
                            <a class="logout" href="logout.php">Sair</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li><a href="login.html"><button class="nav-button login">Login</button></a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<style>
.usuario-logado {
    color: white;
    font-weight: bold;
    margin-left: 20px;
}
.logout {
    color: white;
    margin-left: 15px;
    text-decoration: underline;
    font-size: 0.9em;
}
.logout:hover {
    color: #ffc1c1;
}
.usuario-container {
    display: flex;
    align-items: center;
}
</style>
