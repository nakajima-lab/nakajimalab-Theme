<?php get_header(); ?>

<div class="section-area-left article-wrap">
            <main class="main-contents">
            <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <section class="contents">
                    <div class="title">
                        <span class="border-h"></span>
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="cont-text">
                        <?php the_post_thumbnail('large'); ?>
                        <?php the_content(); ?>
                        <p class="arrow">
                        <?php $h = $_SERVER['HTTP_HOST']; if(!empty($_SERVER['HTTP_REFERER']) && (strpos($_SERVER['HTTP_REFERER'],$h) !== false)): ?>
                            <a class="arr-left" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                                <svg width="23" height="18" viewBox="0 0 23 18"xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.71875 9H21.3385M21.3385 9L14.305 2M21.3385 9L14.305 16" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                            <?php endif; ?>
                        </p>
                    </div>
                </section>
            <?php endwhile; endif; ?>
            </main>
        </div>

        <?php get_sidebar(); ?>

<?php get_footer(); ?>