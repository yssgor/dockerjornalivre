<?php require_once 'header.php'; ?>
<section class="list-post">
<?php $query = new WP_Query(array( 'posts_per_page' => -1) ); ?>
<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>




  <div class="post">
    <p><?php the_post_thumbnail() ?></p>
    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

    </br>
    <small><?php the_time( 'F jS, Y' ); ?>  <?php the_author_posts_link(); ?></small>
  
    <div class="entry">
      <h2><?php the_excerpt(); ?></h2>
    </div>

  </div>

 <?php endwhile; 
 wp_reset_postdata();
 else : ?>
 <?php endif; ?>

 </section>
 <?php require_once 'footer.php'; ?>