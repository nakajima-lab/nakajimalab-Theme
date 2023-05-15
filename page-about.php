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
                            <p>わたしたち中島研究室（感性情報メディア研究室）は、人の心や感覚について理解を深めながら研究や作品制作を行う研究室です。</p>
                            <p>様々な感覚（存在感、一体感、触感、食感、不快感...）や様々な印象（きれい、楽しい、ドキドキする、癒される...）をもたらす人間の感性を解明したり、感性にはたらきかける手段を提案します。</p>
                        </div>
                </section>
                <section class="contents">
                    <div class="title">
                        <span class="border-h"></span>
                        <h2>研究テーマ</h2>
                    </div>
                    <div class="cont-text">
                        <p>中島研究室では、多く作品を制作したり、研究を行っています。</p>

                        <h3 class="heading-3">感性情報を伝えるハードウェアの制作</h3>
                        <p>一つに、感性情報を伝えるサウンドインスタレーションの制作や、インタラクティブアートの制作、デバイスの制作を行っています。</p>

                        <h3 class="heading-3">感覚間相互作用の解明とコンテンツへの展開</h3>
                        <p>二つに感覚間の相互作用を解明し、それをインタラクティブアートの制作やアプリケーションの制作、研究を行っています。。</p>

                        <h3 class="heading-3">作品鑑賞や日常体験の際に受ける心理的印象の解明</h3>
                        <p>三つに、作品を鑑賞するときや日常生活における、不快感やその関係についての心理的な印象を解明する研究を行っています。</p>

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