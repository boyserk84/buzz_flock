<?php
/**
 * Template part for displaying each item on the listing page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package buzz_flock
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header container-fluid">
		<div class="entry-thumbnail col-xs-12 col-md-6">
		<?php

		if( has_post_thumbnail() ){
	    $tb_size = array();
	    // TODO: Add an option for listing tb as a circle "img-circle"
	    $tb_attr = array("class"=>"img-thumbnail", "title"=>get_the_title() );
	    echo get_the_post_thumbnail( null, $tb_size, $tb_attr);
	  } else {
	    ?>
	    <div class="img-thumbnail" style="width:100%; height:300px;"></div>
	    <?php
	  }
		?>
  </div><!--.entry-thumbnail-->
	<div class="entry-content col-xs-12 col-md-6">
		<?php
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
    ?>
      <div class="entry-description hidden-xs col-xs-0 col-md-12">
      <?php
  			the_content( sprintf(
  				/* translators: %s: Name of current post. */
  				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'buzz_flock' ), array( 'span' => array( 'class' => array() ) ) ),
  				the_title( '<span class="screen-reader-text">"', '"</span>', false )
  			) );

  			wp_link_pages( array(
  				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'buzz_flock' ),
  				'after'  => '</div>',
  			) );
      ?>
      </div><!--.entry-description-->
    <?php
		if ( 'post' === get_post_type() ) : ?>
      <div class="entry-meta">
			<?php buzz_flock_posted_on(); ?>
		  </div><!-- .entry-meta -->
		<?php
		endif; ?>
	</div><!-- .entry-content -->
	</header><!-- .entry-header -->

</article><!-- #post-## -->
