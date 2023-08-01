<!DOCTYPE html>
<head>
    <?php wp_head(  )?>
</head>

<header class="site-header">
      <div class="container">
        <h1 class="school-logo-text float-left">
          <a href="<?php echo site_url();?>"><strong>Fictional</strong> University</a>
        </h1>
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <?php
                wp_nav_menu( array(
                   'theme_location' => 'HeaderMenu' 
                ) );
            ?>
            
          </nav>
          <div class="site-header__util">
            <a href="<?php echo wp_login_url( ) ?>" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="<?php echo esc_url(site_url( '/wp-signup.php')); ?>" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </header>


<body>
