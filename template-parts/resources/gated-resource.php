<?php
/**
 * Template part for displaying gated resource.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

?>

<section class="bs-section py-4 section-w-100">
    <div class="bs-row section-w-100-inner">

        <?php if( have_rows('gated_content') ): ?>
        <?php while( have_rows('gated_content') ): the_row(); 
		
		// Get sub field values.
		$gated_title = get_sub_field('gated_resource_content_title');
		$gated_content = get_sub_field('gated_resource_content');
        $gated_form = get_sub_field('form_shortcode')
        
		?>

        <div class="bs-col-xs-12 bs-col-md-7 mb-xs-2">
            <div class=""><h3><?php echo $gated_title ?></h3></div>
            <div class="">
            <p><?php echo $gated_content ?></p>
            </div>
        </div>
        <div id="gatedcontentdownload" class="bs-col-xs-12 bs-col-md-4 bs-col-md-push-1 mb-xs-2">
                    <div class="bs-col-xs-12 p-2 col-resource-form">
                       <?php echo do_shortcode( $gated_form ); ?>
                </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>