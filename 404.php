<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Kulinarna_Magia
 */

get_header();
?>

<div class="error-404-page">
    <div class="error-404-container">
        <div class="error-404-content">
                <h1 class="error-404-title">
                    <?php esc_html_e( '404', 'kulinarna-magia' ); ?>
                </h1>
                <h2 class="error-404-subtitle">
                    <?php esc_html_e( 'Oops! Page Not Found', 'kulinarna-magia' ); ?>
                </h2>
                <p class="error-404-message">
                    <?php esc_html_e( 'The page you\'re looking for doesn\'t exist or has been moved. But don\'t worry, we have plenty of delicious recipes waiting for you!', 'kulinarna-magia' ); ?>
                </p>
                
                <div class="error-404-suggestions">
                    <h3><?php esc_html_e( 'What would you like to cook instead?', 'kulinarna-magia' ); ?></h3>
                    <div class="error-404-buttons">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-404 btn-404-primary">
                            <span class="btn-icon">🏠</span>
                            <?php esc_html_e( 'Back to Home', 'kulinarna-magia' ); ?>
                        </a>
                        <a href="<?php echo esc_url( get_post_type_archive_link( 'pl_recipe' ) ); ?>" class="btn-404 btn-404-secondary">
                            <span class="btn-icon">📚</span>
                            <?php esc_html_e( 'Browse Recipes', 'kulinarna-magia' ); ?>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/recipe-search/' ) ); ?>" class="btn-404 btn-404-tertiary">
                            <span class="btn-icon">🔍</span>
                            <?php esc_html_e( 'Search Recipes', 'kulinarna-magia' ); ?>
                        </a>
                    </div>
                </div>
                
                <!-- Popular Recipes Section -->
                <div class="error-404-popular">
                    <h3><?php esc_html_e( '✨ Try These Popular Recipes', 'kulinarna-magia' ); ?></h3>
                    <div class="error-404-recipes-grid">
                        <?php
                        $popular_recipes = new WP_Query(
                            array(
                                'post_type'      => 'pl_recipe',
                                'posts_per_page' => 3,
                                'orderby'        => 'rand',
                            )
                        );
                        
                        if ( $popular_recipes->have_posts() ) :
                            while ( $popular_recipes->have_posts() ) :
                                $popular_recipes->the_post();
                                ?>
                                <div class="error-404-recipe-card">
                                    <a href="<?php the_permalink(); ?>" class="error-404-recipe-link">
                                        <div class="error-404-recipe-image">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail( 'medium' ); ?>
                                            <?php else : ?>
                                                <svg viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
                                                    <defs>
                                                        <linearGradient id="defaultBg-<?php echo esc_attr( get_the_ID() ); ?>" x1="0%" y1="0%" x2="100%" y2="100%">
                                                            <stop offset="0%" style="stop-color:#9333ea;stop-opacity:1" />
                                                            <stop offset="100%" style="stop-color:#7e22ce;stop-opacity:1" />
                                                        </linearGradient>
                                                    </defs>
                                                    <rect x="0" y="0" width="400" height="300" fill="url(#defaultBg-<?php echo esc_attr( get_the_ID() ); ?>)"/>
                                                    <circle cx="200" cy="150" r="60" fill="rgba(255,255,255,0.1)"/>
                                                    <path d="M200 110 L210 130 L232 130 L215 145 L222 167 L200 152 L178 167 L185 145 L168 130 L190 130 Z" fill="rgba(255,255,255,0.2)"/>
                                                </svg>
                                            <?php endif; ?>
                                        </div>
                                        <div class="error-404-recipe-info">
                                            <h4 class="error-404-recipe-title"><?php the_title(); ?></h4>
                                            <div class="error-404-recipe-meta">
                                                <?php
                                                $prep_time  = get_post_meta( get_the_ID(), '_pl_recipe_prep_time', true );
                                                $cook_time  = get_post_meta( get_the_ID(), '_pl_recipe_cook_time', true );
                                                $servings   = get_post_meta( get_the_ID(), '_pl_recipe_servings', true );
                                                $difficulty = get_post_meta( get_the_ID(), '_pl_recipe_difficulty', true );
                                                
                                                if ( $prep_time || $cook_time ) :
                                                    $total_time = ( $prep_time ? intval( $prep_time ) : 0 ) + ( $cook_time ? intval( $cook_time ) : 0 );
                                                    ?>
                                                    <span class="error-404-meta-item">⏱️ <?php echo esc_html( $total_time ); ?> <?php esc_html_e( 'min', 'kulinarna-magia' ); ?></span>
                                                <?php endif; ?>
                                                
                                                <?php if ( $servings ) : ?>
                                                    <span class="error-404-meta-item">🍽️ <?php echo esc_html( $servings ); ?></span>
                                                <?php endif; ?>
                                                
                                                <?php if ( $difficulty ) : ?>
                                                    <span class="error-404-difficulty error-404-difficulty-<?php echo esc_attr( $difficulty ); ?>">
                                                        <?php
                                                        $difficulty_labels = array(
                                                            'easy'   => __( 'Easy', 'kulinarna-magia' ),
                                                            'medium' => __( 'Medium', 'kulinarna-magia' ),
                                                            'hard'   => __( 'Hard', 'kulinarna-magia' ),
                                                        );
                                                        echo esc_html( isset( $difficulty_labels[ $difficulty ] ) ? $difficulty_labels[ $difficulty ] : ucfirst( $difficulty ) );
                                                        ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
