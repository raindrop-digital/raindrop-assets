<?php
/**
 * The template for displaying single podcast.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php 

// Setup post variables

    // Featured Image
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

    // Author ID
    $author_id = get_the_author_meta('ID');

    // Author Name
    $author = get_the_author_meta('display_name', $author_id);

    // Author Avatar
    $author_avatar = get_field('profile_photo', 'user_'. $author_id );

    // podcast Title
    $podcast_title = get_the_title( get_the_ID());

    // podcast Category
    $podcast_category = get_the_category( get_the_ID() );

?>
<div id="primary" <?php astra_primary_class(); ?>>
    <main id="main" class="site-main">
            <?php // setup ACF group field
                if( have_rows('podcast_content') ): ?>
                    <?php while( have_rows('podcast_content') ): the_row(); 
                    
                    // Get sub field values.
                    $podcast_intro = get_sub_field('introduction');
                    $podcast_highlights = get_sub_field('episode_highlights');
                    $podcast_series = get_sub_field('series');
                    $podcast_episode = get_sub_field('episode');
                    $podcast_length = get_sub_field('length');
                    $podcast_apple_link = get_sub_field('apple_podcast_link');
                    $podcast_spotify_link = get_sub_field('spotify_podcast_link');
                    
                    ?>
        <section class="bs-section container-podcast-header section-w-100 py-4">  
        <div class="bs-row section-w-100-inner">
            <div class="bs-col-xs-12 bs-col-md-6 mb-2">
                <img class="" src="<?php echo $thumb[0]; ?>">
            </div>
            <div class="bs-col-xs-12 bs-col-md-6 bs-flex-direction-col">
                <div class="bs-col-xs-12 p-0 podcast-title"><h1><?php echo $podcast_title ?></h1></div>
                <div class="bs-col-xs-12 p-0 bs-flex bs-flex-direction-row col-podcast-meta">
                    <div class="meta-item item-series">Series <?php echo $podcast_series ?></div>
                    <div class="meta-seperator">|</div>
                    <div class="meta-item item-episode">Epsiode <?php echo $podcast_episode ?></div>
                    <div class="meta-seperator">|</div>
                    <div class="meta-item item-length"><?php echo $podcast_length ?></div>
                </div>
                <div class="bs-col-xs-12 p-0 podcast-excerpt"><p><?php echo $podcast_intro ?></p></div>
                <div class="bs-col-xs-12 px-0 py-2 my-xs-2 podcast-listen-btns">
                    <h3>Listen Now</h3>
                    <div class="btn-wrap">
                        <a href="<?php echo $podcast_apple_link ?>" class="button btn-pink btn-apple">Listen On Apple Podcasts</a>
                    </div>
                    <div class="btn-wrap"> 
                        <a href="<?php echo $podcast_spotify_link ?>" class="button btn-pink btn-spotify">Listen On Spotify</a>
                    </div> 
                </div>
                <div class="bs-col-xs-12 p-0 podcast-highlgihts">
                    <h3>Episode Highlights</h3>
                    <p><?php echo $podcast_highlights ?></p>
                    <p>This podcast is sponsored by RB, in partnership with <a href="https://www.enfamil.com/" target="_blank" rel="noopener"><strong>Enfa</strong></a>.</p>
                </div>
            </div>
        </div>
        </section>    
        <?php endwhile; ?>
        <?php endif; ?>
  
        <?php

        // Loads in content for the gated asset
        get_template_part( 'template-parts/podcasts/call-to-action-podcast' );

        // Loads in content for related podcasts
        get_template_part( 'template-parts/podcasts/related-podcast' );
        ?>

    </main>
</div><!-- #primary -->
<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>




