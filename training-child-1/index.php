<?php get_header(); ?>
<div class="col-sm-8 blog-main">
    
    <?php
    if ( have_posts() ) {
        $count = 0;
        while ( have_posts() ) : the_post();
          $count++;
          if($count <= of_get_option('limit_post', 'no')){

    ?>
    <div class="blog-post">
        <h2 class="blog-post-title"><?php the_title(); ?></h2>
        <p class="blog-post-meta"><?php the_date(); ?> by <?php the_author(); ?></p>
        <?php the_content(); ?>
    </div>
    <?php
          }
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