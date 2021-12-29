<?php
/**
 * Block Name: Blog Carousel Block
 *
 * This is the template that displays the success stories loop block.
 */
?>
    <div class="bs-col-xs-12 upstart-posts-wrapper">
        <div class="upstart-posts-slider upstart-slick">
            <div class="upstart-posts-slider-items">
                <?php $blog_posts = array(
                        'post_type' => 'post',
                        'posts_per_page' => 8,
                        'orderby' => 'date',
                     );

                $query = new WP_Query($blog_posts);
                while ( $query->have_posts() ) : $query->the_post(); 

                // Featured Image
                $post_title = get_the_title( get_the_ID());
                $blog_category  = get_the_category( get_the_ID() );
                $post_read = wp_reading_time();
        
                ?>
                
                <div class="upstart-blog-card upstart-related-post-item bs-flex bs-flex-direction-col">
                    <div class="upstart-blog-card-img">
                        <?php if(has_post_thumbnail()){
                                the_post_thumbnail();
                            }
                        ?>
                    </div>
                    <div class="upstart-blog-card-content bs-flex bs-flex-direction-col p-1">
                        <div class="upstart-blog-card-title bs-justify-content-flex-start bs-flex-grow-1">
                            <h3 class="font-web"><?php echo $post_title ?></h3>
                        </div>
                        <div class="upstart-blog-card-btn bs-justify-content-center btn-primary bs-flex-grow-1"><a class="button upstart-button" href="<?php the_permalink() ?>">READ MORE</a></div>
                        <div class="upstart-blog-card-meta bs-justify-content-flex-end">
                            <p class=""><span><?php echo $blog_category[0]->name; ?></span> | <span><?php echo $post_read ?></span>
                        </div>
                    </div>
                </div>
                <?php endwhile;
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata(); 
                ?>
            </div>
        </div>
    </div>