<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package buzz_flock
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-page-header container-fluid">This is content ** remove me **
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

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
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php buzz_flock_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .post-page-header -->

	<div class="post-page-content">
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
	</div><!-- .post-page-content -->

	<footer class="post-page-footer">
		<?php buzz_flock_entry_footer(); ?>
	</footer><!-- .post-page-footer -->
</article><!-- #post-## -->
