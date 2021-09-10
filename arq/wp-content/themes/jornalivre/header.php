<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo(); ?></title>
    <?php wp_head(); ?>
    
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/estilo.css' ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/reset.css' ?>">
</head>
<body>
    
    <header>
        <section class="caixa">
            <div class="titulo">
                <h1><?php bloginfo();?></h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="<?php echo home_url(); ?>">Inicio</a></li>
                <?php if(! is_user_logged_in()) { ?>
                    <li><a href="<?php echo home_url() . '/login'; ?>">Log in</a></li>
                <?php }else{?>
                    <li><a href="<?php echo home_url() . '/post'; ?>">Adicionar Post</a></li>
                    <li><a href="<?php echo home_url() . '/adicionar-usuario'; ?>">Adicionar Usuario</a></li>
                    <li><?php wp_loginout( home_url() ); ?></li>
                <?php } ?>
                </ul>
            </div>
        </section>
    </header>
