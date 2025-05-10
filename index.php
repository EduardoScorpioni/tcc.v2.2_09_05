<?php
session_start();

// Redirecionar para login se não estiver logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Med Click</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="ico/Med-Click_1.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
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
</head>

<body>
<?php include 'header.php'; ?>

    <div class="carrossel">
        <div class="imagens">
            <!-- Adicione ou remova imagens conforme necessário -->
            <img src="car/img1 (3).jpg"  alt="Descrição da imagem 1">
            <img src="car/img1 (2).jpg"  alt="Descrição da imagem 2">
            <img src="car/img1 (1).jpg"  alt="Descrição da imagem 3">
        </div>
        <button class="botao anterior" onclick="navegar(-1)">&#9664;</button>
        <button class="botao proximo" onclick="navegar(1)">&#9654;</button>
        <div class="indicadores">
          <!-- Pontos adicionados dinamicamente -->
      </div>
    </div>
  
    <script>
        let indiceAtual = 0;
  
  function navegar(direcao) {
      const imagens = document.querySelector('.imagens');
      const totalImagens = imagens.children.length;
  
      indiceAtual = (indiceAtual + direcao + totalImagens) % totalImagens;
      imagens.style.transform = `translateX(-${indiceAtual * 100}vw)`;
  
      atualizarIndicadores();
  }
  
  function iniciarTransicaoAutomatica() {
      setInterval(() => {
          navegar(1);
      }, 3000);
  }
  
  function criarIndicadores() {
      const indicadores = document.querySelector('.indicadores');
      const totalImagens = document.querySelector('.imagens').children.length;
  
      for (let i = 0; i < totalImagens; i++) {
          const ponto = document.createElement('span');
          ponto.onclick = () => irParaImagem(i); // Permite navegação ao clicar nos pontos
          indicadores.appendChild(ponto);
      }
  
      atualizarIndicadores();
  }
  
  function atualizarIndicadores() {
      const indicadores = document.querySelector('.indicadores').children;
  
      for (let i = 0; i < indicadores.length; i++) {
          indicadores[i].classList.remove('ativo');
      }
  
      indicadores[indiceAtual].classList.add('ativo');
  }
  
  function irParaImagem(indice) {
      indiceAtual = indice;
      navegar(0); // Atualiza visualmente sem alterar índice
  }
  
  window.onload = () => {
      criarIndicadores();
      iniciarTransicaoAutomatica();
  };
  </script>
    <main>
        
        <div class="help-section">
            <h2>Como podemos te ajudar?</h2>
            
        <div class="cards">
            <div class="card">
                <div class="card-details">
                   <div class="ico"><i class="fa-solid fa-hospital"></i></div> 
                  <p class="text-title">Unidades afiliadas</p>
                  <p class="text-body">Veja aqui todas as nossas Unidades de hospitais registradas</p>
                </div>
                <button class="card-button">Ver Sobre</button>
              </div>
              <div class="card">
                <div class="card-details">
                    <div class="ico"><i class="fa-solid fa-house-medical-circle-xmark"></i></div>
                  <p class="text-title">Farmácias</p>
                  <p class="text-body">Veja aqui todas as farmácias aqui registradas.</p>
                </div>
                <a href="farmacias.html"></a>
                <button class="card-button">Ver Sobre
                  <a href="farmacias.html"></a>
                </button>
              </div>
              <div class="card">
                <div class="card-details">
                    <div class="ico"><i class="fa-solid fa-clipboard-check"></i></div>
                  <p class="text-title">Agendar Consulta</p>
                  <p class="text-body">Veja aqui aonde Agendar a sua consulta de forma rápida.</p>
                </div>
                <button class="card-button">Ver Sobre</button>
              </div>
              <div class="card">
                <div class="card-details">
                    <div class="ico"><i class="fa-solid fa-user-doctor"></i></div>
                  <p class="text-title">Guia Médico</p>
                  <p class="text-body">Veja aqui todos os médicos registrados em nosso site.</p>
                </div>
                <button class="card-button">Ver Sobre</button>
              </div>
              
        </div>
        </div>
        <div class="unidades">
            <p>Unidades afiliadas à Med Click</p>
                <div class="cards">
                    <div class="card">
                        <div class="card-details">
                           <div class="ico"><i class="fa-solid fa-hospital"></i></div> 
                          <p class="text-title">Unidades afiliadas</p>
                          <p class="text-body">Veja aqui todas as nossas Unidades de hospitais registradas</p>
                        </div>
                        <button class="card-button">Como Chegar</button>
                      </div>
                      <div class="card">
                        <div class="card-details">
                            <div class="ico"><i class="fa-solid fa-house-medical-circle-xmark"></i></div>
                          <p class="text-title">Farmácias</p>
                          <p class="text-body">Veja aqui todas as farmácias aqui registradas.</p>
                        </div>
                        <button class="card-button">Como Chegar</button>
                      </div>
                      <div class="card">
                        <div class="card-details">
                            <div class="ico"><i class="fa-solid fa-clipboard-check"></i></div>
                          <p class="text-title">Agendar Consulta</p>
                          <p class="text-body">Veja aqui aonde Agendar a sua consulta de forma rápida.</p>
                        </div>
                        <button class="card-button">Como Chegar</button>
                      </div>
                      <div class="card">
                        <div class="card-details">
                            <div class="ico"><i class="fa-solid fa-user-doctor"></i></div>
                          <p class="text-title">Guia Médico</p>
                          <p class="text-body">Veja aqui todos os médicos registrados em nosso site.</p>
                        </div>
                        <button class="card-button">Como Chegar</button>
                      </div>
                </div>
        </div>

        <?php include 'footer.php'; ?>

    </main>
</body>
</html>
