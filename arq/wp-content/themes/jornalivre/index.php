<?php require_once 'header.php'; ?>
<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
            ?>

			<div class="post">
                <p><?php the_post_thumbnail() ?></p>
                <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

                </br>
                <small><?php the_time( 'F jS, Y' ); ?>  <?php the_author_posts_link(); ?></small>
  
            <div class="entry">
            <h2><?php the_excerpt(); ?></h2>
            </div>
            <div class="conteudo">
                <?php the_content(); ?>
            </div>

        </div>
        <?php
		}
	}

?>
<?php require_once 'footer.php'; ?>
