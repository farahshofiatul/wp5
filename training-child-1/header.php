<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php 
    wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php echo '<img src="'. of_get_option('logo_upload','no') .'">';?>
<div class="container">
    <div class="blog-header">
        <h1 class="blog-title">Training Blog</h1>
        <p class="lead blog-description">Theme </p>
    </div>

    <div class="row">