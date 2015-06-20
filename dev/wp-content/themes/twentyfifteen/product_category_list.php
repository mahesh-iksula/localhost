<?php
/*
 * Template Name: Product Category list
 * Description: A Page Template with a darker design.
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php 
		//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

			$taxonomy     = 'product_category';
			$orderby      = 'name'; 
			$show_count   = 0;      // 1 for yes, 0 for no
			$pad_counts   = 0;      // 1 for yes, 0 for no
			$hierarchical = 1;      // 1 for yes, 0 for no
			$title        = '';

			$args = array(
			'taxonomy'     => $taxonomy,
			'orderby'      => $orderby,
			'show_count'   => $show_count,
			'pad_counts'   => $pad_counts,
			'hierarchical' => $hierarchical,
			'title_li'     => $title
			);
		?>
<h2>Product Cateory Listing</h2>
<ul id="navprolist">
<?php wp_list_categories( $args ); ?>
</ul>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
