<?php
/*
Template Name: Podcasts
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>


    <?php astra_content_page_loop(); ?>


    <div class="bs-section section-podcast py-6">
        <div class="section-podcast-inner-wrap">
            <?php
            $podcast_feed = array(
                'post_type' => 'podcast', 
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order'   => 'ASC',
        'facetwp' => true,
    );
    $query = new WP_Query($podcast_feed);
    while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-podcast bg-white b-shadow bs-flex bs-flex-direction-col">
                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <div class="podcast-thumbnail" style="background-image: url('<?php echo $image[0]; ?>')">
                </div>
                <?php endif; ?>
                <div class="bs-row">
                    <div class="bs-col-xs-12 podcast-title">
                        <h3 class=""><a href="<?php the_permalink() ?>" title="Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                    <div class="bs-col-xs-12 podcast-excerpt">
                        <p><?php the_excerpt(); ?></p>
                    </div>
                    <div class="bs-col-xs-12 podcast-meta">
                        <p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile;
    wp_reset_postdata();
    ?>
        </div>
    </div>

    <div class="bs-section">
            <div class="bs-row px-1">
                <div class="bs-col-xs-12 bs-col-md-8 p-2 b-border-pink bg-white">
                    <h3>Dont Miss An Episode</h3>
                    <div class=""></div>
                </div>

            </div>
    </div>

</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>