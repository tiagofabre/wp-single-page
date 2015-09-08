<?php
    
    add_shortcode( 'wp-single-page-home', 'single_page_concat');
    
    function single_page_concat()
    {
        $args = array(
            'post_type' => 'page',
            'orderby' => 'featured-checkbox',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                'key' => 'parital-single-page',
                'value' => 'yes'
                )
            )
        );
    
        $featured_query = new WP_Query($args);
        
        while ($featured_query->have_posts()) : $featured_query->the_post();
        ?>
            <div class="package-items">
                <div class="item-image">
                    <?php if ( has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php 
                        the_post_thumbnail(); 
                        post_content();   
                        ?>

                    </a>
                    <?php endif; ?>
                </div>
                <h2><a href="<?php the_permalink() ?>" class="package-title"><?php the_title(); ?></a></h2>
                <?php the_content('Read More About This Durango Package'); ?>
                <a href="<?php the_permalink() ?>" class="read-more">Read More...</a>
                <hr>
            </div>
        <?php endwhile; ?>
            </div>
<?php
    }
    
?>

