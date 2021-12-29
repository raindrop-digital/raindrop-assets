<?php
/**
 * Template part for displaying related podcasts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */
?>
<section class="bs-section py-4 px-2 section-w-100">
    <div class="bs-row section-w-100-inner">
        <div class="bs-col-xs-12 supermums-related-posts-wrapper">
            <h3 class="supermums-related-posts-title">More To Explore</h3>
            <div class="supermums-post-slider supermums-slick">
                <div class="supermums-post-slider-items">
                <?php

                    // Setup taxonomy
                    $podcast_categories = get_the_terms( get_the_ID(), 'podcast_topics' );

                    foreach ( $podcast_categories as $category ) {
                        $category_ids[] = $category->term_id;
                    }

                    // Setup Args
                    $related_posts = array(
                        'post_type'         => 'podcast',
                        'post__not_in'      => array(get_the_ID()),
                        'posts_per_page'    => 6,
                        'post_status'       => 'publish',
                        'order'             => 'DESC',
                        'orderby'           => 'date',
                        'tax_query'         => array(
                                                array(
                                                'taxonomy' => 'podcast_topics',
                                                'field'    => 'id',
                                                'terms'    => $category_ids,
                                            ),
                                        ),
                    );

                    $query  = new WP_Query($args);

                    $query = new WP_Query($related_posts);
                    while ( $query->have_posts() ) : $query->the_post(); 
                        // Set variables
                        $podcast_title = get_the_title( get_the_ID());
                        $podcast_category = get_the_category( get_the_ID() );
                        $podcast_excerpt = get_the_excerpt( get_the_ID() );
                        // Output
                    ?>
                <div class="supermums-podcast-card supermums-related-podcast-item bs-flex bs-flex-direction-col">
                    <div class="supermums-podcast-card-img">
                        <a class="" href="<?php the_permalink() ?>">
                        <?php if(has_post_thumbnail()){
                                the_post_thumbnail();
                            }
                        ?>
                        </a>
                    </div>
                    <div class="supermums-podcast-card-content bs-flex bs-flex-direction-col p-1">
                        <div class="supermums-podcast-card-title bs-justify-content-flex-start bs-flex-grow-1">
                            <h3 class=""><a class="" href="<?php the_permalink() ?>"><?php echo $podcast_title ?></a></h3>
                            <p><?php echo $podcast_excerpt ?></p>
                        </div>
                        <div class="podcast-card-meta bs-flex bs-flex-direction-row">
                                            <?php
                    if( have_rows('podcast_content', $post->ID) ): ?>
                    <?php while( have_rows('podcast_content', $post->ID) ): the_row(); 
                    
                    // Get sub field values.
                    $podcast_series = get_sub_field('series', $post->ID);
                    $podcast_episode = get_sub_field('episode', $post->ID);
                    $podcast_length = get_sub_field('length', $post->ID);
                    
                    ?>
                    <div class="meta-item item-series">Series <?php echo $podcast_series ?></div>
                    <div class="meta-seperator">|</div>
                    <div class="meta-item item-episode">Episode <?php echo $podcast_episode ?></div>
                    <div class="meta-seperator">|</div>
                    <div class="meta-item item-length"><?php echo $podcast_length ?></div>

                    <?php endwhile; ?>
                    <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile;
                    wp_reset_postdata();
                ?>
                </div>
            </div>
        </div>
    </div>
</section>



