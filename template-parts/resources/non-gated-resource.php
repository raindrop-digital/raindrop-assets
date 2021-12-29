<?php
/**
 * Template part for displaying non gated resource.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

?>

<section class="bs-section py-4 section-w-100">
    <div class="bs-row section-w-100-inner">

        <?php if( have_rows('non_gated_content') ): ?>
        <?php while( have_rows('non_gated_content') ): the_row(); 
		
		// Get sub field values.
		$non_gated_title = get_sub_field('non_gated_resource_content_title');
		$non_gated_content = get_sub_field('non_gated_resource_content');
        $button_text = get_sub_field('non_gated_resource_button_text');
        $button_link = get_sub_field('non_gated_resource_button_url');
		
		?>


        <div class="bs-col-xs-12 bs-col-md-7 m-order-2 mb-xs-2">
            <div class=""><h3><?php echo $non_gated_title ?></h3></div>
            <div class="">
            <p><?php echo $non_gated_content ?></p>
            </div>
            <div class="supermums-button-wrap my-xs-2">
                <a href="<?php echo $button_link ?>" class="button supermums-button"><?php echo $button_text ?></a>
            </div>
        </div>
        <div class="bs-col-xs-12 bs-col-md-4 bs-col-md-push-1 m-order-1  mb-xs-2">
                    <?php
                // Check rows exists.
                if( have_rows('resource_details') ): ?>
                    <div class="bs-col-xs-12 p-2 col-resource-details mb-xs-2">
                    <ul class="list-reset">
                    <h4>Details</h4>
                <?php // Loop through rows.
                while( have_rows('resource_details') ) : the_row();
            
                // Load sub field value.
                $non_gated_detail_icon = get_sub_field('non_gated_icon'); 
                $non_gated_detail_content = get_sub_field('non_gated_feature_content'); ?>
                    <li class="resource-detail-item bs-flex bs-flex-direction-row mb-xs-04">
                        <p class="resource-detail-mark"><?php echo $non_gated_detail_icon; ?></p>
                        <div class="resource-detail-item-content"><?php echo $non_gated_detail_content; ?></div>
                    </li>
                    <?php
            // End loop.
        endwhile; ?>
                </ul>
            </div>
        <?php else :
        endif; ?>
                    <?php
                // Check rows exists.
                if( have_rows('speakers') ): ?>

            <div class="bs-col-xs-12 p-2 col-resource-speakers">
                <ul class="list-reset">
                    <h4>Speakers</h4>
                <?php // Loop through rows.
                while( have_rows('speakers') ) : the_row();
            
                // Load sub field value.
                $non_gated_speaker_image = get_sub_field('non_gated_speaker_image');
                $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
                $non_gated_speaker_name = get_sub_field('non_gated_speaker_name');  
                $non_gated_speaker_job = get_sub_field('non_gated_speaker_job');
                ?>
                    <li class="resource-speaker-item bs-flex bs-flex-direction-row bs-align-items-center mb-xs-2">
                        <?php
                            if( $non_gated_speaker_image ) {
	                           echo wp_get_attachment_image( $non_gated_speaker_image, $size );
                            }
                        ?>
                        <div class="resource-speaker-item-content"><span class="resource-speaker-item-name"><?php echo $non_gated_speaker_name; ?></span><span class="resource-speaker-item-job"><?php echo $non_gated_speaker_job; ?></span></div>
                    </li>
                    <?php
            // End loop.
        endwhile; ?>
                </ul>
            </div>
        <?php else :
        endif; ?>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>