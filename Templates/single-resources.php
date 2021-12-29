<?php
/**
 * The template for displaying single resources.
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

    // Author Job title
    $author_job = get_field('job_title', 'user_'. $author_id ); 

    // Resource Title
    $resource_title = get_the_title( get_the_ID());

    // Resource Category
    $resource_category = get_the_category( get_the_ID() );

    // Template type
    $resource_type = get_field('resource_type');

?>

<div id="primary" <?php astra_primary_class(); ?>>
    <main id="main" class="site-main">
    <section class="bs-section container-resource-header section-w-100 py-4">  
        <div class="bs-row section-w-100-inner">
            <div class="bs-col-xs-12 bs-col-md-6">
            
            </div>
            <div class="bs-col-xs-12 bs-col-md-6">
                <div class="resource-meta"><p><?php echo $resource_category[0]->name; ?></p></div>
                <div class="resource-title"><h1><?php echo $resource_title ?></h1></div>
                    <?php if($resource_type == 'nongated') {
                        if( have_rows('non_gated_content') ):
                        while( have_rows('non_gated_content') ): the_row(); 
                    
                            // Get sub field values.
		                    $button_text = get_sub_field('non_gated_resource_button_text');
		                    $button_link = get_sub_field('non_gated_resource_button_url'); ?>

                            <div class="supermums-button-wrap my-xs-2"><a href="<?php echo $button_link ?>" class="button supermums-button"><?php echo $button_text ?></a></div>
                    	<?php endwhile;
                        endif;
                        } 
                      elseif($resource_type == 'gated') { ?>
                        <div class="supermums-button-wrap my-xs-2">
                            <a href="#gatedcontentdownload" class="button supermums-button">Download Now</a>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </section>      

        <?php

		if($resource_type == 'gated') {

            // Loads in content for the gated asset
            get_template_part( 'template-parts/resources/gated-resource' );
        
        }
        elseif($resource_type == 'nongated') {
            // Loads in content for the non gated asset
            get_template_part( 'template-parts/resources/non-gated-resource' );
        }

        // Loads in content for related resources
        get_template_part( 'template-parts/resources/related-resources' );
        ?>

    </main>
</div><!-- #primary -->
<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


