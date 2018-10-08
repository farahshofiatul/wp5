<?php get_header(); ?>
<div class="col-sm-8 blog-main">
    
    <?php
    $wp_query->set('posts_per_page', of_get_option('limit_post','no'));
    $wp_query->query($wp_query->query_vars);
    if ( have_posts() ) {
        while ( have_posts() ) : the_post();
    ?>
    <div class="blog-post">
        <h2 class="blog-post-title"><?php the_title(); ?></h2>
        <p class="blog-post-meta"><?php the_date(); ?> by <?php the_author(); ?></p>
        <?php the_content(); ?>
    </div>
    <?php
          
        endwhile;
    } 
    ?>
</div>
<div id="sidebar-right" class="col-sm-3 col-sm-offset-1 blog-sidebar">
  <ul>
  <?php 
  if(of_get_option('show_sidebar','no') == true){
    if ( ! dynamic_sidebar( 'sidebar-right' ) ) :
    endif; 
  }
  ?>
  </ul>
</div>
<?php get_footer(); ?>