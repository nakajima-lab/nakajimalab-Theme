<?php 
/*
Template Name: お問い合わせ
*/
get_header(); ?>

    
        <?php if(have_posts()): while(have_posts()): the_post();?>
        <div class="section-area-left article-wrap">
            <main class="main-contents">
                <section class="contents">
                    <div class="title">
                        <span class="border-h"></span>
                        <h2>お問い合わせ</h2>
                    </div>
                    <div class="cont-text">
                        <p>現在、準備中です。当面のお問い合わせはメールにてお願いいたします。</p>
                        <p><img src="<?php echo get_template_directory_uri(); ?>/img/mail.png" alt="" width="300px"></p>
                        <p>なお、メールアドレスは画像ですので、送信の際はお手数ですがご自身でメーラーに入力してください。入力の際は件名に「〜ついてのお問合せ」等の用件、お名前、ご所属等ご入力いただけるとスムーズです。</p>
                        <p>また、各SNSでも受け付けております。お気軽にお問い合わせください。</p>
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