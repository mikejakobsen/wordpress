<header class="banner">
  <div class="container">
    <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"></a>

    <nav class="nav-primary navbar" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sp-navbar-collapse-1">
            <div class="mobile-burger">
              <span class="sr-only">Toggle navigation</span>
              <div class="bar bar-left"></div>
              <div class="bar bar-middle"></div>
              <div class="bar bar-right"></div>
            </div>
          </button>
          <a href="#">
            <div class="logo" href="/">
              <a href="/" class="">
                    <h1>{{ the_field('global_title', 'option') }}</h1>
              </a>
            </div>
          </a>
        </div>

        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav navbar-right collapse navbar-collapse', 'menu_id' => 'sp-navbar-collapse-1']);
        endif;
        ?>
      </div>
    </nav>
  </div>
</header>
