<!DOCTYPE html>
<html class="wide wow-animation" lang="es">

<head>
  <?php
  global $wp;

  ?>
  <title>Seven7 | Jeans Levanta Cola y prendas femeninas</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo get_template_directory_uri() ?>images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Fira+Sans:300,600,800,800i%7COpen+Sans:300,400,400i">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/fonts.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/custom.min.css">
  <meta name="title" content="Seven7 | Jeans Levanta Cola y prendas femeninas" />
  <meta name="description" content="Somos referentes de la moda colombiana diseñando y fabricando prendas de vestir originales con mano de obra nacional dirigidas al mercado latino.">
  <meta name="keywords" content="Jeans levanta cola, ropa femenina, vestidos, blusas." />
  <meta name="robots" content="index,follow" />
  <link rel="canonical" href="<?php echo home_url($wp->request) ?>" />
  <meta property="og:locale" content="es_MX" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Seven7 | Jeans Levanta Cola y prendas femeninas" />
  <meta property="og:description" content="Somos referentes de la moda colombiana diseñando y fabricando prendas de vestir originales con mano de obra nacional dirigidas al mercado latino." />
  <meta property="og:url" content="<?php echo home_url($wp->request) ?>" />
  <meta property="og:site_name" content="Seven7" />
  <meta property="article:publisher" content="https://www.facebook.com/seven7jeans/" />
  <meta property="article:tag" content="Moda" />
  <meta property="article:section" content="Prendas" />
  <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/images/logo_respuesta.jpg" />
  <meta property="og:image:secure_url" content="<?php echo get_template_directory_uri() ?>/images/logo_respuesta.jpg" />
  <meta property="og:image:width" content="350" />
  <meta property="og:image:height" content="114" />
  <meta name="fragment" content="!" />
  <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="<?php echo get_template_directory_uri() ?>/images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
		<![endif]-->
</head>

<body>
  <script>
    var ajaxURL = "<?php echo admin_url("admin-ajax.php") ?>"
  </script>
  <!-- <div class="preloader">
    <div class="cssload-container">
      <svg class="filter" version="1.1">
        <defs>
          <filter id="gooeyness">
            <fegaussianblur in="SourceGraphic" stddeviation="10" result="blur"></fegaussianblur>
            <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 20 -10" result="gooeyness">
            </fecolormatrix>
            <fecomposite in="SourceGraphic" in2="gooeyness" operator="atop"></fecomposite>
          </filter>
        </defs>
      </svg>
      <div class="dots">
        <div class="dot mainDot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
      </div>
      <p>Cargando...</p>
    </div>
  </div> -->
  <div class="page">
    <header class="page-header">
      <!-- RD Navbar-->
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-stick-up-clone="false" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" data-lg-stick-up-offset="120px" data-xl-stick-up-offset="35px" data-xxl-stick-up-offset="35px">

          <div class="rd-navbar-inner">
            <div class="rd-navbar-panel">
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <div class="rd-navbar-brand"><a class="brand-name" href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="" width="108" height="40" /></a></div>
            </div>
            <div class="rd-navbar-nav-wrap">

              <ul class="rd-navbar-nav">
                <li class="<?php if (is_home() || is_front_page()) echo "active" ?>">
                  <a href="<?php echo esc_attr(home_url()) ?>">Inicio</a>
                </li>
                <li class="<?php if (is_page(590)) echo "active" ?>">
                  <a href="<?php echo get_permalink(590) ?>">Blog</a>
                </li>
                <li class="<?php if (is_page(65)) echo "active" ?>">
                  <a href="<?php echo get_permalink(65) ?>">Nosotros</a>
                </li>
                <li class="<?php if (is_page(9)) echo "active" ?>">
                  <a href="<?php echo get_permalink(9) ?>">Portafolio</a>
                </li>

                <li class="<?php if (is_page(49)) echo "active" ?>">
                  <a href="<?php echo get_permalink(49) ?>">Catálogo</a>
                </li>
                <li class="<?php if (is_page(11)) echo "active" ?>">
                  <a href="<?php echo get_permalink(11) ?>">Políticas</a>
                </li>
                <li class="<?php if (is_page(53)) echo "active" ?>">
                  <a href="<?php echo get_permalink(53) ?>">Contacto</a>
                </li>
                <li id="search_in_web">
                  <a><i class="linear-icon-magnifier"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>