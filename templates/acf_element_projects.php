<?php
global $wp_query;
global $post;
$post_type           = 'projects';
$iteration           = 0;
$selected            = $site_element['selected'] ?? false;
$featured_post       = false;
$current_parent_page = get_permalink( $post->ID );
$filter_category     = $_GET['category'] ?? false;

$taxonomy_args = array(
	'taxonomy' => $post_type . '_category',
	'orderby'  => 'name',
	'order'    => 'ASC'
);

$query = array(
	'post_type'   => $post_type,
	'numberposts' => - 1,
	'order'       => 'DESC',
);

if ( $filter_category ) {
	$query['tax_query'] = array(
		[
			'taxonomy' => $post_type . '_category',
			'field'    => 'slug',
			'terms'    => $filter_category,
		]
	);
}

if ( $selected ) {
	$acf_posts = $selected;

	/** overwrites the query attributes with the ones needed for the "selected post list" **/
	$query = array_merge( $query, [
		'post__in' => $acf_posts,
		'orderby'  => 'post__in',
		'order'    => 'ASC',
	] );
}

$posts = get_posts( $query );

/**
 * Check for featured post
 * then move featured post to the top of the list
 **/
foreach ( $posts as $key => $post ) {
	$fields = get_fields() ?? false;

	if ( isset( $fields['featured'] ) ) {
		$featured_post = $post;
		unset( $posts[ $key ] );
		array_unshift( $posts, $featured_post );
		break;
	}
}

/**
 * Create HTML filter for categories
 * then output the filter with JS data attributes
 **/
$categories      = get_categories( $taxonomy_args );
$category_items  = '';
$has_active_item = false;

foreach ( $categories as $category ) {
	$active          = ( $category->slug === $filter_category ? 'c-active' : false );
	$has_active_item = $has_active_item || ( $active != false );
	$category_items  .= '<li class="' . $active . '"><a href="' . add_query_arg( "category", $category->slug, $current_parent_page ) . '">' . $category->name . '</a></li>';
}

$category_items = '<li class="' . ( $has_active_item ? '' : 'c-active' ) . '" data-filter=""><a href="' . $current_parent_page . '">' . __( 'Alle', 'neofluxe' ) . '</a></li>' . $category_items;

$category_html = '<ul class="c-filter-list c-text-padding-inside">' . $category_items . '</ul>';

// IF NOT selected AND first item: show this code
?>
<div class="c-content__projects">
	<?php

	if ( ! $selected ) {
		?>
        <div class="c-container-wide c-filter c-line-top">
            <div class="c-container c-container-no-padding">
				<?php echo $category_html ?>
            </div>
        </div>
		<?php
	}
	?>

    <!-- teaser small home -->
	<?php foreach ( $posts as $post ): ?>
		<?php
		$iteration ++;
		$title               = get_field( 'title' );
		$fields              = get_fields() ?? false;
		$acf_images          = $fields['image'] ?? false;
		$acf_image_small     = $acf_images['size_small'] ?? false;
		$acf_image_large     = $acf_images['size_large'] ?? false;
		$acf_image_highlight = $fields['highlight_teaser_image'] ?? $acf_image_large;
		$thumbnail           = get_the_post_thumbnail( $post->ID, 'large' ) ?? $acf_image_small;
		$reversed            = (bool) $selected;
		// Get taxonomy name
		$taxonomy = 'category';
		if ( $post->post_type != 'post' ) {
			$taxonomy = $post->post_type . '_category';
		}

		$terms_json = json_encode( wp_list_pluck( wp_get_object_terms( $post->ID, $taxonomy ), 'slug' ) );

		if ( ! $selected
		     && $iteration == 1
		     && $acf_images ) {
			?>
            <div class="c-container-wide c-content__projects__item c-teaser-img-text-big c-line-top c-line-bottom">
                <div class="c-container c-container-no-padding">
                    <div class="c-row">

                        <div class="c-col-12">
                            <!-- anderes bildratio für mobile -->
                            <figure>
                                <span class="c-copyright-container">
                                    <?= do_shortcode( "[render_imagetag id=\"$acf_image_highlight\" mobile=\"$thumbnail\"]" ); ?>
                                    <span class="c-copyright-text c-text-small c-text-light">Test</span>
                                </span>
                            </figure>
                        </div>

                        <div class="c-col-8 c-text-block c-text-padding">
                            <span class="c-title-category"><?= __( 'Architektur', 'neofluxe' ) ?> / <?= do_shortcode( "[c_get_categories pid=\"$post->ID\" posttype=\"$taxonomy\"]" ); ?></span>
                            <h2><?= $title['bold'] ?> <span><?= $title['regular'] ?></span></h2>
                            <p><?= $post->post_excerpt ?></p>
                            <p><a class="c-icon c-link-arrow"
                                  href="<?= get_permalink( $post ); ?>"><?= __( 'mehr erfahren', 'neofluxe' ) ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
			<?php
		} else {
			?>
            <div class="c-container-wide c-content__projects__item c-teaser-img-text c-line-top c-line-bottom">
                <div class="c-container c-container-no-padding">
                    <!-- use c row reverse for switching img places-->
                    <div class="c-row<?php if ( ( $iteration % 2 == 0 ) != $reversed && $acf_images ) { ?> c-row-reverse<?php } ?>">

                        <div class="c-col-7 c-teaser-img-text-col-img">
                            <figure class="c-showroom-img"><?= do_shortcode( "[render_imagetag id=\"$acf_image_large\" mobile=\"$acf_image_small\"]" ); ?></figure>
                        </div>

                        <div class="c-col-5 c-text-block c-text-padding-var c-teaser-img-text-col-text<?php echo( has_post_thumbnail() ? ' c-text-padding-var' : ' c-text-padding' ); ?>">
                            <span class="c-title-category"><?= __( 'Architektur', 'neofluxe' ) ?> / <?= do_shortcode( "[c_get_categories pid=\"$post->ID\" posttype=\"$taxonomy\"]" ); ?></span>
                            <h2><?= $title['bold'] ?> <span><?= $title['regular'] ?></span></h2>
                            <p><?= $post->post_excerpt ?></p>
                            <p><a class="c-icon c-link-arrow"
                                  href="<?= get_permalink( $post ); ?>"><?= __( 'mehr erfahren', 'neofluxe' ) ?></a></p>
                        </div>

                    </div>
                </div>
            </div>
			<?php
		}
	endforeach; ?>
</div>

