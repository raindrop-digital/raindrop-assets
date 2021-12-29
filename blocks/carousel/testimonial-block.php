<?php

/**
 * Tutor Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'supermums-carousel-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$className = 'testimonial-carousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if( $is_preview ) {
    $className .= ' is-admin';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="bs-row supermums-slick supermums-carousel <?php echo esc_attr($className); ?>">
    <?php if( have_rows('testimonial_selection') ): ?>
		<div class="bs-col-xs-12 testimonial-carousel-items">
			<?php while( have_rows('testimonial_selection') ): the_row(); 
                    // Create variables for the fields
					$review_content = get_sub_field('review_content');
					$review_company = get_sub_field('review_company');
					$review_name = get_sub_field('review_name_author');

					// Image variables
					$review_image = get_sub_field('speaker_image');
					$review_image_size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)


				?>
                <div class="testimonial-carousel-item bs-flex bs-flex-direction-col">
						<?php if($review_content) { ?>
						<p class="font-white review-content"><?php echo $review_content; ?></h4>
						<?php } ?>
						<?php if($review_name) { ?>
						<p class="font-white font-wm review-name"><?php echo $review_name; ?></p>
						<?php } ?>
						<?php if($review_company) { ?>
						<p class="font-white font-wm review-company"><?php echo $review_company; ?></p>
						<?php } ?>
						<?php if( $review_image ) { ?>
						<div class="review-img">
						<?php echo wp_get_attachment_image( $review_image, $review_image_size ); ?></div>
						<?php } ?>
                </div>
			<?php endwhile; ?>
		</div>
	<?php else: ?>
		<p>Please add a testimonial.</p>
	<?php endif; ?>
</div>