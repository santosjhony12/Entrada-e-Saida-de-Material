<?php require_once ('verificarAcesso.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylelan.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Contagem</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/png" href="IMG/favicon.ico" />

</head>

<body>
  <header>
    <nav>
      <a href="main.php"><img src="IMG/nsg.png" class="imglogo2"></a>
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
          <li><a href="main.php">Menu</a></li>
          <li><a href="box.php">Box</a></li>
          <li><a href="lehr.php">Lehr</a></li>
          <li><a href="tanglass.php">Tanglass</a></li>
          
          <li><a href="listar.php">Listar</a></li>
          <li><a href="advertencia.php">AdvertĂȘncias</a></li>
          <li><a href="contagem.php">Voltar</a></li>
      </ul>
    </nav>
  </header>
  <script src="mobile-navbar.js"></script>
<!--MUDEI A PARTIR DAQUI-->
        <?php 
        require_once 'conexaoBD.php';
$depart = $_GET['txtDepart'];
if ($depart = '1'){
$descricao_depart = "Box";
}elseif ($depart = '2'){
  $descrico_depart = "Lehr";
} elseif($depart ='3'){
  $descricao_depart = "Tanglass";
}




        echo '
        <div class="w3-container w3-center">
                <div class="w3-content w3-center">
                <h1 class="w3-center w3-round-large w3-margin" style="background: #007BFF; color: white" >Contagem de LanĂ§amentos</h1>
                
                ';
                $sql = "SELECT count(id_lanc) quant_lanc FROM lancamento WHERE cod_depart = '".$_GET['txtDepart']."' and data_lanc between '".$_GET['datainicio']."' and '".$_GET['datafinal']."' and tipo_movimento = '".$_GET['txtMovimento']."';";
                
                $resultado = $conexao->query($sql);
                if($resultado != null)
                foreach($resultado as $linha) {
                echo '<div class="w3-container w3-center w3-card-4"';
                echo '<br><br><h2>Departamento:  '.$descricao_depart.'</h2>';
                  echo '<br><br><h2>Tipo de Movimento:  '.$_GET['txtMovimento'].'</h2>';
                   echo '<br><br><h2>Quantidade de LanĂ§amentos:  '.$linha['quant_lanc'].'</h2><br><br>';
                   echo '</div>';
                    }
            $conexao->close();
        
        /*and data_lanc between '".$_POST['date1']."' and '".$POST_['date2']."'"  */
        
        
        ?>
        <?php require_once 'rodape.php';?>