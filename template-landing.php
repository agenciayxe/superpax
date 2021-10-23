<?php
/*
Template name: Landing Page - Newsletter
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>SuperPax</title>
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/landing.css">
    <?php wp_head(); ?>
    <link rel="shortcut icon" href="http://superpax.com.br/wp-content/themes/superpax/img/fav-logo.ico" />
</head>
<body>
    <div class="content">
        <div class="background">
            <img src="<?php echo get_bloginfo('template_url'); ?>/img/landing/logo.png" class="image-logo" alt="">
            <img src="<?php echo get_bloginfo('template_url'); ?>/img/landing/title.png" class="title" alt="">
        </div>
        <div class="left">
            <h2>FICAMOS MUITO FELIZES POR VOCÊ ESTAR AINDA MAIS PERTINHO DA GENTE!</h2>
            <div class="form">
                <form action="">
                    <h3>Preencha o formulário para receber todas as novidades, informações, lembretes e claro, muita promoção PARA VOCÊ ECONOMIZAR MAIS.</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nome Completo</label>
                            <input name="nome" value="" type="text" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label>E-mail</label>
                            <input name="email" value="" type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Cidade</label>
                            <input name="cidade" value="" type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Bairro</label>
                            <input name="bairro" value="" type="text" class="form-control">
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="description">
                                <input name="aceito" type="checkbox">
                                Concordo em receber comunicações por email de acordo com a <a href="" target="_blank">Política de Privacidade</a>.
                            </div>
                        </div>
                    </div>
                    <button type="submit">Receba Ofertas</button>
                </form>
                <?php /* echo do_shortcode('[dinamize-form id="44634"]') */ ?>
            </div>
        </div>
    </div>
    <footer>    
        <div class="footer-info">
            <div class="list-icons">
                <a href="<?php echo InfoVar::show('instagram'); ?>" target="_blank">
                    <div class="single-icons">
                        <i class="fab fa-instagram"></i>
                    </div>
                </a>
                <a href="<?php echo InfoVar::show('facebook'); ?>" target="_blank">
                    <div class="single-icons">
                        <i class="fab fa-facebook-square"></i>
                    </div>
                </a>
                <a href="<?php echo InfoVar::show('youtube'); ?>" target="_blank">
                    <div class="single-icons">
                        <i class="fab fa-youtube"></i>
                    </div>
                </a>
            </div>
            <div class="info-site">
                <a href="https://www.redeconomia.com.br/"><div class="link-site">www.redeconomia.com.br</div></a>
            </div>
        </div>
        <div class="icon-logo">
            <img src="<?php echo get_bloginfo('template_url'); ?>/img/landing/icon.png" class="img-icon" alt="">
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>