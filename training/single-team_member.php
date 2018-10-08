<?php get_header();?>
<div class="col-sm-8 blog-main">  
    <?php 
    if ( have_posts() ) {      
      while ( have_posts() ) : the_post();?>
        <div class="blog-post">
        <h2 class="blog-post-title"><?php the_title(); ?></h2>
        <p class="blog-post-meta"><?php the_date(); ?> by <?php the_author(); ?></p>
        <?php
        echo '<center>';
        echo '<table>';
        echo '<tr>';
        $meta = rwmb_meta( 'prefix-image', '' ,get_the_ID() );
        echo '<td>';
        echo '<center>';
        foreach ($meta as $value) {
          echo '<img src= "'.$value['url'].'"></br>';
        }
        echo esc_html( get_post_meta( get_the_ID(), 'prefix-position', true )).'</br>';
        echo esc_html( get_post_meta( get_the_ID(), 'prefix-email', true )).'</br>';
        echo esc_html( get_post_meta( get_the_ID(), 'prefix-phone', true )).'</br>';
        echo esc_html( get_post_meta( get_the_ID(), 'prefix-website', true )).'</br>';
        echo '</center>';
        echo '</td>';
        echo '</tr>';
        echo '</table>';
        echo '<center>';
        echo'</div>';
      endwhile;
    } 
    ?>
</div>
<div id="sidebar-right" class="col-sm-3 col-sm-offset-1 blog-sidebar">
  <ul>
  <?php if ( ! dynamic_sidebar( 'sidebar-right' ) ) : ?>
  <?php endif; ?>
  </ul>
</div>
<?php get_footer(); ?>