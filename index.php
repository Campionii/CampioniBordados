<?php 
require_once("sistema/conexao.php")
 ?>

<!DOCTYPE html>
<html>

<head>
  <title><?php echo $nome_sistema ?></title>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,300,700,800" rel="stylesheet" media="screen">

  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/style.css" rel="stylesheet" media="screen">
  
  <link rel="shortcut icon" type="image/x-icon" href="sistema/img/icone.png">
  <!-- =======================================================
    Theme Name: Alstar
    Theme URL: https://bootstrapmade.com/alstar-free-parallax-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<style type="text/css">
  a, a:hover {
  color: <?php echo $cor_sistema ?>
}


/* Back to top button */
.back-to-top {
  background: <?php echo $cor_sistema ?>
  color: #fff;
}


.back-to-top:focus {
  background: <?php echo $cor_sistema ?>
  color: #fff;
}

.back-to-top:hover {
  background: #019090;
  color: #fff;
}

.navbar-default {
  background: <?php echo $cor_sistema ?>
}

.form-control:focus {
  border-color: <?php echo $cor_sistema ?>
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 2px <?php echo $cor_sistema ?>;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 2px <?php echo $cor_sistema ?>;
}

.service .carousel-indicators .active {
  background: <?php echo $cor_sistema ?>
}

.btn-theme {
  background: <?php echo $cor_sistema ?>
}

.contact-widget i {
  color: <?php echo $cor_sistema ?>
}


#intro .btn-get-started {
  font-family: "Raleway", sans-serif;
  font-weight: 500;
  font-size: 14px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 12px 32px;
  border-radius: 3px;
  transition: 0.5s;
  line-height: 1;
  margin: 10px;
  color: #fff;
  -webkit-animation-delay: 0.8s;
  animation-delay: 0.8s;
  border: 2px solid <?php echo $cor_sistema ?>;
}

#intro .btn-get-started:hover {
  background: <?php echo $cor_sistema ?>;
  color: #fff;
  text-decoration: none;
}

</style>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle nav</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Logo text or image -->
        <a class="navbar-brand" href="index.html"><?php echo $nome_sistema ?></a>

      </div>
      <div class="navigation collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li class="current"><a href="#intro">Home</a></li>
          <li><a href="#about">Sobre</a></li>
           <?php 
        $query = $pdo->query("SELECT * FROM servicos order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
         ?>

          <li><a href="#services">Serviços</a></li>
        <?php } ?>


 <?php 
        $query = $pdo->query("SELECT * FROM trabalhos order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
         ?>
          <li><a href="#portfolio">Trabalhos</a></li>
        <?php } ?>

         <?php 
        $query = $pdo->query("SELECT * FROM equipe order by id asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
         ?>
          <li><a href="#team">Equipe</a></li>
        <?php } ?>
          <li><a href="#contact">Contato</a></li>
           <li><a href="sistema" target="_blank">Acesso</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- intro area -->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <?php 
        $query = $pdo->query("SELECT * FROM banner order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
         ?>
        <div class="carousel-inner" role="listbox">

          <?php 
          for($i=0; $i < $total_reg; $i++){
    $id = $res[$i]['id'];
    $titulo = $res[$i]['titulo'];   
    $subtitulo = $res[$i]['subtitulo'];   
    $imagem = $res[$i]['imagem'];

    if($i == 0){
      $active = 'active';
    }else{
       $active = '';
    }
           ?>

          <!-- Slide 1 -->
          <div class="item <?php echo $active ?>">
            <div class="carousel-background"><img src="sistema/img/banners/<?php echo $imagem ?>" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animated fadeInDown"><?php echo $titulo ?></h2>
                <p class="animated fadeInUp"><?php echo $subtitulo ?></p>
               
              </div>
            </div>
          </div>

        <?php } ?>
          
        </div>

      <?php } ?>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon fa fa-angle-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon fa fa-angle-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <!-- About -->
  <section id="about" class="home-section bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="section-heading">
            <h2><?php echo $titulo_sobre ?></h2>
            <div class="heading-line"></div>
            <p><?php echo $subtitulo_sobre ?></p>
          </div>
        </div>
      </div>
      <div class="row wow fadeInUp">
        <div class="col-md-6 about-img">
          <?php if($exibir_sobre == 'Imagem'){ ?>
        <img src="sistema/img/<?php echo $imagem_sobre ?>" alt="">
        <?php }else{ ?>
           <iframe class="video-mobile" width="100%" height="320px" src="<?php echo $video_sobre ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id=""></iframe>
        <?php } ?>
        </div>

        <div class="col-md-6 content">
         <?php echo $descricao_sobre ?>
        </div>
      </div>
    </div>
  </section>

 
 <?php 
    $query = $pdo->query("SELECT * FROM servicos order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
         ?>


  <!-- Services -->
  <section id="services" class="home-section bg-white" style="margin-top: -200px">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="section-heading">
            <h2><?php echo $titulo_servicos ?></h2>
            <div class="heading-line"></div>
            <p><?php echo $subtitulo_servicos ?></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div id="carousel-service" class="service carousel slide">
            <!-- slides -->
            <div class="carousel-inner">


             <?php 
          for($i=0; $i < $total_reg; $i++){
    $id = $res[$i]['id'];
    $titulo = $res[$i]['titulo'];   
    $descricao = $res[$i]['descricao'];   
    $video = $res[$i]['video'];
    $imagem = $res[$i]['imagem'];
    $exibir = $res[$i]['exibir'];

    if($i == 0){
      $active = 'active';
    }else{
       $active = '';
    }
           ?>
            
              <div class="item <?php echo $active ?>">
                <div class="row">
                  <div class="col-sm-12 col-md-offset-1 col-md-6">
                    <div class=" bounceInLeft">
                      <h4><?php echo $titulo ?></h4>
                      <p><?php echo $descricao ?></p>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-5">
                    <div class="screenshot wow bounceInRight">
                      <?php if($exibir == 'Imagem'){ ?>
                      <img src="sistema/img/servicos/<?php echo $imagem ?>" class="img-responsive" alt="" />
                      <?php }else{ ?>
                       <iframe class="video-mobile" width="100%" height="320px" src="<?php echo $video ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id=""></iframe>
                    <?php } ?>
                    </div>
                  </div>
                </div>
              </div>              
           

          <?php } ?>

           </div>

            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php                 
          for($i=0; $i < $total_reg; $i++){  
            if($i == 0){
              $active = 'active';
            }else{
               $active = '';
            }
               ?>
              <li data-target="#carousel-service" data-slide-to="<?php echo $i ?>" class="<?php echo $active ?>" onclick="new WOW().init();"></li>
            <?php } ?>
             
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php } ?>


 <?php 
        $query = $pdo->query("SELECT * FROM trabalhos order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
         ?>

  <!-- Works -->
  <section id="portfolio" class="home-section bg-gray" style="margin-top: -50px">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="section-heading" style="margin-top: -100px">
            <h2><?php echo $titulo_trabalhos ?></h2>
            <div class="heading-line"></div>
            <p><?php echo $subtitulo_trabalhos ?></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">

          <ul id="og-grid" class="og-grid">
             <?php 
          for($i=0; $i < $total_reg; $i++){
    $id = $res[$i]['id'];
    $titulo = $res[$i]['titulo'];   
    $descricao = $res[$i]['descricao'];   
    $video = $res[$i]['video'];
    $imagem = $res[$i]['imagem'];
    $exibir = $res[$i]['exibir'];
    $link = $res[$i]['link'];

    //retirar caracter
    $descricao = str_replace(array('"'), ' ** ', $descricao);

    if($i == 0){
      $active = 'active';
    }else{
       $active = '';
    }

    ?>
            <li>
    <a href="<?php echo $link ?>" data-largesrc="sistema/img/trabalhos/<?php echo $imagem ?>" data-title="<?php echo $titulo ?>" data-description="<?php echo $descricao ?>" onclick="chamarImg('<?php echo $exibir ?>', '<?php echo $video ?>')">                
    <img src="sistema/img/trabalhos/<?php echo $imagem ?>" alt=""/>
                 
              </a>
            </li>
                     
           <?php } ?>
           
           
          </ul>

        </div>
      </div>
    </div>
  </section>

<?php } ?>


 <?php 
        $query = $pdo->query("SELECT * FROM equipe order by id asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
         ?>
  <!-- Team -->
  <section id="team" class="home-section bg-white" style="margin-top: -70px">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="section-heading" style="margin-top: -100px">
            <h2><?php echo $titulo_equipe ?></h2>
            <div class="heading-line"></div>
            <p><?php echo $subtitulo_equipe ?></p>
          </div>
        </div>
      </div>
      <div class="row">

            <?php 
          for($i=0; $i < $total_reg; $i++){
    $id = $res[$i]['id'];
    $nome = $res[$i]['nome'];   
    $cargo = $res[$i]['cargo'];
    $imagem = $res[$i]['imagem'];
   
           ?>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
          <div class="box-team wow bounceInUp" data-wow-delay="0.1s">
            <img src="sistema/img/equipe/<?php echo $imagem ?>" alt="" class="img-circle img-responsive" />
            <h4><?php echo $nome ?></h4>
            <p><?php echo $cargo ?></p>
          </div>
        </div>

      <?php } ?>
      
       
      </div>
    </div>
  </section>
<?php } ?>

  <!-- Contact -->
  <section id="contact" class="home-section bg-gray" style="margin-top: -70px">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="section-heading" style="margin-top: -100px">
            <h2><?php echo $titulo_contato ?></h2>
            <div class="heading-line"></div>
            <p><?php echo $subtitulo_contato ?> </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div id="sendmessage">Obrigado, mensagem recebida!</div>
          <div id="errormessage" style="border:none; padding:0px"></div>

          <form action="enviar.php" method="post" class="form-horizontal contactForm" role="form">
            <div class="col-md-offset-2 col-md-8">
              <div class="form-group">
                <input type="text" name="nome" class="form-control" id="name" placeholder="Seu Nome" data-rule="minlen:4"
                  data-msg="Pelo menos 4 caracteres" />
                <div class="validation"></div>
              </div>
            </div>

            <div class="col-md-offset-2 col-md-8">
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Seu Email" data-rule="email"
                  data-msg="Insira um email válido" />
                <div class="validation"></div>
              </div>
            </div>   

            <div class="col-md-offset-2 col-md-8">
              <div class="form-group">
                <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Seu Telefone (Opcional)"/>
                <div class="validation"></div>
              </div>
            </div>           

            <div class="col-md-offset-2 col-md-8">
              <div class="form-group">
                <textarea class="form-control" name="mensagem" rows="5" data-rule="required" data-msg="Insira sua Mensagem"
                  placeholder="Messagem"></textarea>
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-2 col-md-8">
                <button type="submit" class="btn btn-theme btn-lg btn-block">Enviar</button>
              </div>
            </div>
          </form>

        </div>
      </div>

    </div>
  </section>

  <!-- Bottom widget -->
  <section id="bottom-widget" class="home-section bg-white" style="margin-top: -70px">
    <div class="container">
      <div class="row" style="margin-top: -70px">
        <?php if($endereco_sistema != ""){ 
          $colunas = 'col-md-4';
          ?>
        <div class="col-md-4">
          <div class="contact-widget wow bounceInLeft">
            <i class="fa fa-map-marker fa-4x"></i>
            <h5>Endereço</h5>
            <p>
              <?php echo $endereco_sistema ?>
            </p>
          </div>
        </div>
      <?php }else{
        $colunas = 'col-md-6';
      } ?>
        <div class="<?php echo $colunas ?>">
          <div class="contact-widget wow bounceInUp">
             <a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsapp_sistema ?>" class="link-neutro"><i class="fa fa-phone fa-4x"></i>
            <h5>Telefone / Whatsapp</h5></a>
            <p>
              <a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsapp_sistema ?>" class="link-neutro" style="color:#2e2e2e"><?php echo $telefone_sistema ?></a>
            </p>
          </div>
        </div>
        <div class="<?php echo $colunas ?>">
          <div class="contact-widget wow bounceInRight">
            <i class="fa fa-envelope fa-4x"></i>
            <h5>Email</h5>
            <p>
              <?php echo $email_sistema ?>
            </p>
          </div>
        </div>
      </div>
      <div class="row mar-top30">
        <div class="col-md-12">
          <h5>Nossas Redes Sociais</h5>
          <ul class="social-network">
            <?php if($facebook_sistema != ""){ ?>
            <li><a href="<?php echo $facebook_sistema ?>" target="_blank" title="Ver Facebook">
                <span class="fa-stack fa-2x">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span></a>
            </li>
          <?php } ?>
          <?php if($instagram_sistema != ""){ ?>
            <li><a href="<?php echo $instagram_sistema ?>" target="_blank"  title="Ver Instagram">
                <span class="fa-stack fa-2x">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                </span></a>
            </li>
             <?php } ?>
          <?php if($twitter_sistema != ""){ ?>
            <li><a href="<?php echo $twitter_sistema ?>" target="_blank"  title="Ver Twitter">
                <span class="fa-stack fa-2x">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span></a>
            </li>
             <?php } ?>
          <?php if($youtube_sistema != ""){ ?>
            <li><a href="<?php echo $youtube_sistema ?>" target="_blank"  title="Ver youtube">
                <span class="fa-stack fa-2x">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                </span></a>
            </li>
             <?php } ?>
          <?php if($linkedin_sistema != ""){ ?>
             <li><a href="<?php echo $linkedin_sistema ?>" target="_blank"  title="Ver Linkedin">
                <span class="fa-stack fa-2x">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                </span></a>
            </li>
             <?php } ?>
          
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer style="background: <?php echo $cor_sistema ?>">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><?php echo $texto_rodape ?></p>
        
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- js -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nav.js"></script>
  <script src="js/modernizr.custom.js"></script>
  <script src="js/grid.js"></script>
  <script src="js/stellar.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Custom Javascript File -->
  <script src="js/custom.js"></script>

</body>

</html>

<script type="text/javascript">
  function chamarImg(exibir, video){
    $('#div-img').html('');
    if(exibir != 'Imagem'){
      setTimeout(function() {
        $('#div-img').html('<iframe class="video-mobile" width="80%" height="320px" src="'+video+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id=""></iframe>');
      }, 100);      
    }else{

    }
  }
</script>


  <script type="text/javascript" src="sistema/painel/js/mascaras.js"></script>
  <!-- Ajax para funcionar Mascaras JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 