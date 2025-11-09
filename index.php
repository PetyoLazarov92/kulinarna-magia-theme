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
            <a href="<?php echo esc_url( get_post_type_archive_link( 'pl_recipe' ) ); ?>" class="hero-cta">
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
                        'post_type'      => 'pl_recipe',
                        'posts_per_page' => 6,
                        'orderby'        => 'rand',
                    )
                );

                if ( $featured_recipes->have_posts() ) :
                    while ( $featured_recipes->have_posts() ) :
                        $featured_recipes->the_post();
                        ?>
                        <article class="recipe-card">
                            <a href="<?php the_permalink(); ?>" class="recipe-card-image-wrapper">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium', array( 'class' => 'recipe-card-image' ) ); ?>
                                <?php else : ?>
                                    <div class="recipe-card-image recipe-default-image">
                                        <svg viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
                                            <defs>
                                                <linearGradient id="bgGradient-<?php echo esc_attr( get_the_ID() ); ?>" x1="0%" y1="0%" x2="100%" y2="100%">
                                                    <stop offset="0%" style="stop-color:#9333ea;stop-opacity:1" />
                                                    <stop offset="100%" style="stop-color:#7e22ce;stop-opacity:1" />
                                                </linearGradient>
                                            </defs>
                                            <rect x="0" y="0" width="400" height="300" fill="url(#bgGradient-<?php echo esc_attr( get_the_ID() ); ?>)"/>
                                            <circle cx="200" cy="150" r="60" fill="rgba(255,255,255,0.1)"/>
                                            <path d="M200 110 L210 130 L232 130 L215 145 L222 167 L200 152 L178 167 L185 145 L168 130 L190 130 Z" fill="rgba(255,255,255,0.2)"/>
                                            <path d="M160 120 Q150 140 155 160" stroke="rgba(255,255,255,0.15)" stroke-width="3" fill="none"/>
                                            <path d="M240 120 Q250 140 245 160" stroke="rgba(255,255,255,0.15)" stroke-width="3" fill="none"/>
                                            <circle cx="180" cy="180" r="8" fill="rgba(255,255,255,0.1)"/>
                                            <circle cx="220" cy="180" r="8" fill="rgba(255,255,255,0.1)"/>
                                            <circle cx="200" cy="195" r="5" fill="rgba(255,255,255,0.1)"/>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </a>
                            
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
                                    $prep_time  = get_post_meta( get_the_ID(), '_pl_recipe_prep_time', true );
                                    $cook_time  = get_post_meta( get_the_ID(), '_pl_recipe_cook_time', true );
                                    $servings   = get_post_meta( get_the_ID(), '_pl_recipe_servings', true );
                                    $difficulty = get_post_meta( get_the_ID(), '_pl_recipe_difficulty', true );
                                    
                                    if ( $prep_time ) :
                                        ?>
                                        <span class="meta-item">⏱️ <?php echo esc_html( $prep_time ); ?> <?php esc_html_e( 'min', 'kulinarna-magia' ); ?></span>
                                    <?php endif; ?>
                                    
                                    <?php if ( $servings ) : ?>
                                        <span class="meta-item">🍽️ <?php echo esc_html( $servings ); ?></span>
                                    <?php endif; ?>
                                    
                                    <?php if ( $difficulty ) : ?>
                                        <span class="difficulty-badge difficulty-<?php echo esc_attr( $difficulty ); ?>">
                                            <?php
                                            $difficulty_labels = array(
                                                'easy'   => __( 'Easy', 'pl-recipe-cookbook' ),
                                                'medium' => __( 'Medium', 'pl-recipe-cookbook' ),
                                                'hard'   => __( 'Hard', 'pl-recipe-cookbook' ),
                                            );
                                            echo esc_html( isset( $difficulty_labels[ $difficulty ] ) ? $difficulty_labels[ $difficulty ] : ucfirst( $difficulty ) );
                                            ?>
                                        </span>
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

        <hr class="section-divider" />
        
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
