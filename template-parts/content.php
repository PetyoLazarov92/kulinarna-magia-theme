<?php
/**
 * Template part for displaying posts
 *
 * @package Kulinarna_Magia
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;
        ?>
    </header>

    <?php if ( has_post_thumbnail() && is_singular() ) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        if ( is_singular() ) :
            the_content();
        else :
            the_excerpt();
        endif;

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kulinarna-magia' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div>

    <footer class="entry-footer">
        <div class="entry-meta">
            <span class="posted-on">
                <?php echo esc_html( get_the_date() ); ?>
            </span>
            <span class="byline">
                <?php
                /* translators: %s: post author */
                printf( esc_html__( 'by %s', 'kulinarna-magia' ), esc_html( get_the_author() ) );
                ?>
            </span>
        </div>
    </footer>
</article>
