<?php
/**
* content-listing.php
* Template for displaying the list of items within a page with a custom pagination.
* i.e. index or archive page
*/

?>
<div class="col-md-12">
<?php
/* Start the Loop */
while ( have_posts() ) : the_post();

  /*
   * Include the Post-Format-specific template for the content.
   * If you want to override this in a child theme, then include a file
   * called content-___.php (where ___ is the Post Format name) and that will be used instead.
   */
  get_template_part( 'template-parts/content-item', get_post_format() );

endwhile;
?>
</div>
