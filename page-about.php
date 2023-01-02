<?php 
/*
Template Name: 中島研究室について
*/
get_header(); ?>

    
        <?php if(have_posts()): while(have_posts()): the_post();?>
        <div class="section-area-left article-wrap">
            <main class="main-contents">
                <section class="contents">
                    <div class="title">
                        <span class="border-h"></span>
                        <h2>中島研究室について</h2>
                    </div>
                    <div class="cont-text">
                        <p></p>
                        <p></p>
                        <p class="arrow">
                            <a class="arr-left" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <svg width="23" height="18" viewBox="0 0 23 18"xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.71875 9H21.3385M21.3385 9L14.305 2M21.3385 9L14.305 16" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </p>
                    </div>
                </section>
            </main>
        </div>
        <?php endwhile; endif; ?>

        <?php get_sidebar(); ?>


<?php get_footer(); ?>