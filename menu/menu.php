<?php require_once("../conexao/conexao.php") ?>
<!-- <?php session_start(); ?> -->
<?php
      if(isset($_SESSION["user_portal"])){
        $user = $_SESSION["user_portal"];
        
        $verifica = "SELECT prioridade FROM `nesql`.`usuario_tb` WHERE usuario_id = '{$user}' ";

        $verifica_con_user = mysqli_query($conecta, $verifica);
        if(!$verifica_con_user){
          die("Falha no banco");
        }

        $verifica_login_op = mysqli_fetch_assoc($verifica_con_user);
        $login_op = $verifica_login_op["prioridade"];

        $verifica_second = "SELECT `operador_tb`.* FROM `nesql`.`operador_tb` WHERE login = '$login_op';";

        $verifica_con_op = mysqli_query($conecta, $verifica_second);
        if(!$verifica_con_op){
          die("Falha no banco");
        }
        $permissao = mysqli_fetch_assoc($verifica_con_op);
        if(empty($permissao)){
          $acesso = 0;
        }else{
          $acesso = 1;
        }
      }
    ?>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="../lista/lista.php"><img src="//d3ugyf2ht6aenh.cloudfront.net/stores/001/517/589/themes/common/logo-602181780-1623288178-c441acff08f291ebff190bce6ea3225f1623288178.ico?0" alt="" width="20" height="20" class="d-inline-block align-text-top"> BIGAZINE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../main-cpf/main-cpf.php">LISTA</a>
        </li>
        <?php if($login_op == 1){?>
        <li class="nav-item">
          <a class="nav-link" href="../criar-ti/criar-ti.php">CRIAR</a>
        </li>
        <?php } ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="../lista/lista.php">LISTA</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="../sair/sair.php">SAIR</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

      <!-- <nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
      <a class="navbar-brand" href="#">Comodas em MDF</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../main/main.php">Chamados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../sel-criar/select-criar.php">Criar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./lista/lista.php">Lista</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../sair/sair.php">Sair</a>
        </li>
      </ul>
  </div>
</nav> -->
  <script type="text/javascript">
  const currentLocation = location.href;
  const menuItem = document.querySelectorAll('a');
  const menuLength = menuItem.length;
  for(let i=0; i<menuLength; i++){
    if(menuItem[i].href == currentLocation){
      menuItem[i].className = "nav-link active";
    }else if(currentLocation === "http://localhost:8000/criar/criar.php"){
      menuItem[1].className = " active";
    }else if(currentLocation === "http://localhost:8000/detalhe/detalhe.php"){
      menuItem[0].className = " active";
    }
  }
</script>