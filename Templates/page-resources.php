<?php
/*
Template Name: Resources
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <?php astra_content_page_loop(); ?>

    <?php astra_primary_content_bottom(); ?>

    <div class="section-resource py-6">
        <div class="section-resource-inner-wrap">
            <?php
            $resource_feed = array(
                'post_type' => 'help_guides', 
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order'   => 'ASC',
        'facetwp' => true,
    );
    $query = new WP_Query($resource_feed);
    while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-resource bg-white b-shadow bs-flex bs-flex-direction-col">
                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <div class="resource-thumbnail" style="background-image: url('<?php echo $image[0]; ?>')">
                </div>
                <?php endif; ?>
                <div class="bs-row">
                    <div class="bs-col-xs-12 resource-title">
                        <h3 class=""><a href="<?php the_permalink() ?>" title="Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                    <div class="bs-col-xs-12 resource-excerpt">
                        <p><?php the_excerpt(); ?></p>
                    </div>
                    <div class="bs-col-xs-12 resource-meta">
                        <p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile;
    wp_reset_postdata();
    ?>
        </div>
    </div>
</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>