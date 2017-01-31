<header class="banner">
  <div class="container">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
      <a class="navbar-brand" title="" href="<?= esc_url( home_url( '/' ) ); ?>"><?= get_bloginfo( 'name' ); ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar-content"
                                                                                              aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu([
            'theme_location'  => 'primary_navigation',
            'container_id'    => 'navbar-content',
            'container_class' => 'collapse navbar-collapse',
            'menu_class'      => 'nav navbar-nav',
            'walker'          => new Bootstrap_Walker_Nav_Menu()
          ]);
        endif;
        ?>
    </nav>
  </div>
</header>
