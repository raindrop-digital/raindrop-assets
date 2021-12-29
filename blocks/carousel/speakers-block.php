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
$className = 'speaker-carousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if( $is_preview ) {
    $className .= ' is-admin';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="bs-row supermums-slick supermums-carousel <?php echo esc_attr($className); ?>">
    <?php if( have_rows('speaker_selection') ): ?>
		<div class="bs-col-xs-12 speaker-carousel-items">
			<?php while( have_rows('speaker_selection') ): the_row(); 
                    // Create variables for the fields
					$speaker_name = get_sub_field('speaker_name');
					$speaker_title = get_sub_field('speaker_title');
					$talk_title = get_sub_field('talk_title');
					$speaker_description = get_sub_field('speaker_description');

					// Image variables
					$speaker_image = get_sub_field('speaker_image');
					$speaker_image_size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)


				?>
                <div class="speaker-carousel-item bs-flex bs-flex-direction-col">
						<div class="speaker-img"><?php if( $speaker_image ) {
						echo wp_get_attachment_image( $speaker_image, $speaker_image_size );
						}?>
						</div>
						<h5 class="mb-xs-04"><?php echo $speaker_name; ?></h4>
						<p class="font-wm"><?php echo $speaker_title; ?></p>
						<p class="font-blue font-wm"><?php echo $talk_title; ?></p>
						<p class=""><?php echo $speaker_description; ?></p>
                </div>
			<?php endwhile; ?>
		</div>
	<?php else: ?>
		<p>Please add a speaker.</p>
	<?php endif; ?>
</div>