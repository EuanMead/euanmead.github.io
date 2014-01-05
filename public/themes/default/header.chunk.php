<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo Site::name() . ' - ' . Site::title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo Site::description(); ?>">
    <meta name="keywords" content="<?php echo Site::keywords(); ?>">
    <meta name="robots" content="<?php echo Page::robots(); ?>">

    <?php Action::run('theme_meta'); ?>

    <!-- Open Graph Protocol -->
    <meta property="og:site_name" content="<?php echo Site::name(); ?>">
    <meta property="og:url" content="<?php echo Url::current(); ?>">
    <meta property="og:title" content="<?php echo Site::title(); ?> | <?php echo Site::name(); ?>">

    <!-- Google+ Snippets -->
    <meta itemprop="url" content="<?php echo Url::current(); ?>">
    <meta itemprop="name" content="<?php echo Site::title(); ?> | <?php echo Site::name(); ?>">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo Site::url(); ?>/public/assets/css/bootstrap.css" type="text/css" />
    <?php Stylesheet::add('public/themes/default/css/default.css', 'frontend', 2); ?>
    <?php Stylesheet::load(); ?>

    <?php Action::run('theme_header'); ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav icons -->
    <link rel="icon" href="<?php echo Site::url(); ?>favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo Site::url(); ?>favicon.ico" type="image/x-icon">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo Site::url(); ?>"><?php echo Site::name(); ?></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <?php echo Menu::get(); ?>
          </ul>
          <div class="pull-right user-panel">
            <?php Users::getPanel(); ?>
          </div>
        </div>
      </div>
    </div>