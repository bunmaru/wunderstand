<!DOCTYPE html>
<html lang="ja">
<head prefix="og:http://ogp.me/ns#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- TODO
ogp設定
TDK 

test
test
test
-->

   
    <title>    
        <?php wp_title("|", true, "right"); ?>
        <?php bloginfo("name"); ?>
    </title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>?ver=<?php echo date('U');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <div class="header-inner">
        <div class="site">
            <h1><a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/picnic-4x.png" alt="<?php bloginfo("name"); ?>" width="112" height="25">
        </a></h1>
        </div>
    </div>
</header>