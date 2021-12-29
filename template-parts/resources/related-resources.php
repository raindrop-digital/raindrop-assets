<?php
/**
 * Template part for displaying related resources.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */
?>
<section class="bs-section py-4 px-2 section-grey section-w-100">
    <div class="bs-row section-w-100-inner">
        <div class="bs-col-xs-12 supermums-related-posts-wrapper">
            <h3 class="supermums-related-posts-title">Releated Resources</h3>
            <div class="supermums-post-slider supermums-slick">
                <div class="supermums-post-slider-items">
                <?php
                    $related_posts = array(
                        'post_type' => 'resources',
                        'post__not_in' => array(get_the_ID()),
                        'posts_per_page' => 6,
                        'orderby' => 'date',
                        'category__in'   => wp_get_post_categories( $post->ID ),
                     );

                    $query = new WP_Query($related_posts);
                    while ( $query->have_posts() ) : $query->the_post(); 
                        // Set variables
                        $post_title = get_the_title( get_the_ID());
                        $resource_category = get_the_category( get_the_ID() );
                        // Output
                    ?>
                <div class="supermums-resource-card supermums-related-resource-item bs-flex bs-flex-direction-col">
                    <div class="supermums-resource-card-img">
                        <a class="" href="<?php the_permalink() ?>">
                        <?php if(has_post_thumbnail()){
                                the_post_thumbnail();
                            }
                        ?>
                        </a>
                    </div>
                    <div class="supermums-resource-card-content bs-flex bs-flex-direction-col p-1">
                        <div class="supermums-resource-card-title bs-justify-content-flex-start bs-flex-grow-1">
                            <h3 class=""><?php echo $post_title ?></h3>
                        </div>
                        <div class="supermums-resource-card-meta bs-justify-content-flex-end">
                            <p class=""><span><?php echo $resource_category[0]->name; ?></span></span>
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