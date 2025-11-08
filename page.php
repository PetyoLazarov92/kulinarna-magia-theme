<?php
/**
 * Template for displaying pages
 *
 * @package Kulinarna_Magia
 */

get_header();
?>

<div class="content-area">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        
        <div class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="page-content">
                <?php
                the_content();

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kulinarna-magia' ),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div>
        </article>

        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>

        <?php
    endwhile;
    ?>
</div>

<?php
get_footer();
