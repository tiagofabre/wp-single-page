<?php

add_shortcode('wp-single-page-home', 'wp_sp_concat');
/*
 * Add new shortcode to override the contetn of the main page to add partial pages
 */
function wp_sp_concat()
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
                <h2><?php the_title_attribute(); ?></h2>
                    <?php
                    the_post_thumbnail();

                    ?>

                </a>
                <?php endif; ?>
            </div>
            <h2><?php the_title_attribute(); ?></h2>
            <?php the_content('Read More About This Durango Package'); ?>

            <hr>
        </div>
    <?php endwhile; ?>
        </div>
<?php
}

?>

