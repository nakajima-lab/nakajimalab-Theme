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
                    </div>
                </section>
            <?php endwhile; endif; ?>
            </main>
        </div>

        <?php get_sidebar(); ?>

<?php get_footer(); ?>