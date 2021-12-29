<?php
/**
 * Block Name: Success Stories Feed
 *
 * This is the template that displays the success stories loop block.
 */

$case_study_posts = get_field('success_story_selector');
if( $case_study_posts ): ?>

<div class="bs-row m-0">
    <?php foreach( $case_study_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
    <?php 
        // Featured Image
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        $post_title = get_the_title( $post->ID );
        $post_content = get_the_excerpt( $post->ID );
        $post_categories = get_the_terms( $post->ID, 'success_stories_categories' );
        
        ?>
        
        <div class="bs-col-xs-12 p-0 upstart-success-story-feed-col" style="background-image: url('<?php echo $thumb['0'];?>')">
        <div class="upstart-success-story-feed-inner bs-flex bs-flex-direction-col">
            <div class="success-story-service-image-wrap bs-flex-grow-1 bs-justify-content-flex-start">
                <?php 
                $serviceimage = get_field('service_image', $post->ID);
                $imagesize = 'medium'; // (thumbnail, medium, large, full or custom size)
                if( $serviceimage ) {
                    echo wp_get_attachment_image( $serviceimage, $imagesize );
                }
                ?>
                <p class="font-wb font-white"><?php 
                foreach( $post_categories as $category ) {
                    echo $category->name;
                }
                ?></p>
            </div>
            <div class="success-story-service-content-wrap bs-flex-grow-1 bs-justify-content-center">
                <p class="font-wb font-white">Success Story</p>
                <p class="font-wm font-white text-xs text-sm text-md text-lg"><?php echo $post_title; ?></p>
                <p class="mb-xs-1 font-white"><?php echo $post_content; ?></p>
            </div>
            <div class="btn-primary btn-wrap bs-justify-content-flex-end">
                <a class="button upstart-button" href="<?php echo the_permalink($post->ID); ?>">Learn More</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>