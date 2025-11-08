<?php
/**
 * Main template file
 *
 * @package Kulinarna_Magia
 */

get_header();
?>

<?php if ( is_front_page() && is_home() ) : ?>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-container">
            <h2 class="hero-title"><?php esc_html_e( '✨ Culinary Magic ✨', 'kulinarna-magia' ); ?></h2>
            <p class="hero-subtitle"><?php esc_html_e( 'Where delicious wonders happen', 'kulinarna-magia' ); ?></p>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'pl-recipe' ) ); ?>" class="hero-cta">
                <?php esc_html_e( '🍳 Browse Recipes', 'kulinarna-magia' ); ?>
            </a>
        </div>
    </section>

    <!-- Featured Recipes Section -->
    <div class="content-area">
        <section class="featured-recipes">
            <h2 class="section-title"><?php esc_html_e( '🌟 Featured Recipes', 'kulinarna-magia' ); ?></h2>
            
            <div class="recipes-grid">
                <?php
                $featured_recipes = new WP_Query(
                    array(
                        'post_type'      => 'pl-recipe',
                        'posts_per_page' => 6,
                        'orderby'        => 'rand',
                    )
                );

                if ( $featured_recipes->have_posts() ) :
                    while ( $featured_recipes->have_posts() ) :
                        $featured_recipes->the_post();
                        ?>
                        <article class="recipe-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium', array( 'class' => 'recipe-card-image' ) ); ?>
                                </a>
                            <?php endif; ?>
                            
                            <div class="recipe-card-content">
                                <h3 class="recipe-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <?php if ( has_excerpt() ) : ?>
                                    <div class="recipe-card-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="recipe-card-meta">
                                    <?php
                                    $prep_time = get_post_meta( get_the_ID(), '_pl_prep_time', true );
                                    $cook_time = get_post_meta( get_the_ID(), '_pl_cook_time', true );
                                    $servings  = get_post_meta( get_the_ID(), '_pl_servings', true );
                                    
                                    if ( $prep_time ) :
                                        ?>
                                        <span>⏱️ <?php echo esc_html( $prep_time ); ?> <?php esc_html_e( 'min', 'kulinarna-magia' ); ?></span>
                                    <?php endif; ?>
                                    
                                    <?php if ( $servings ) : ?>
                                        <span>🍽️ <?php echo esc_html( $servings ); ?> <?php esc_html_e( 'servings', 'kulinarna-magia' ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

        <!-- Info Boxes -->
        <section class="info-boxes">
            <div class="info-box">
                <div class="info-box-icon">📖</div>
                <h3 class="info-box-title"><?php esc_html_e( 'Tested Recipes', 'kulinarna-magia' ); ?></h3>
                <p class="info-box-text"><?php esc_html_e( 'Every recipe is tested and approved with love and care.', 'kulinarna-magia' ); ?></p>
            </div>
            
            <div class="info-box">
                <div class="info-box-icon">🌱</div>
                <h3 class="info-box-title"><?php esc_html_e( 'For Every Taste', 'kulinarna-magia' ); ?></h3>
                <p class="info-box-text"><?php esc_html_e( 'From classics to modern interpretations - for beginners and experts.', 'kulinarna-magia' ); ?></p>
            </div>
            
            <div class="info-box">
                <div class="info-box-icon">💫</div>
                <h3 class="info-box-title"><?php esc_html_e( 'With Passion', 'kulinarna-magia' ); ?></h3>
                <p class="info-box-text"><?php esc_html_e( 'Cooking is magic when done with love and inspiration.', 'kulinarna-magia' ); ?></p>
            </div>
        </section>
    </div>

<?php else : ?>
    <div class="content-area">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type() );
            endwhile;

            the_posts_navigation();
        else :
            ?>
            <p><?php esc_html_e( 'No posts found.', 'kulinarna-magia' ); ?></p>
            <?php
        endif;
        ?>
    </div>
<?php endif; ?>

<?php
get_footer();
