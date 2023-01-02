<?php 
/*
Template Name: 活動内容
*/
get_header(); ?>

    
        <?php if(have_posts()): while(have_posts()): the_post();?>
        <div class="section-area-left article-wrap">
            <main class="main-contents">
                <section class="contents">
                    <div class="title">
                        <span class="border-h"></span>
                        <h2>活動内容</h2>
                    </div>
                    <div class="cont-text">
                        <p>中島研究室では、主に人々の感性について研究し、その感性に働きかけるメディアやデバイスの創出に取り組んでいます。</p>
                        <p>また研究に必要な知識や技術について、学生全員が能動的に得られるような環境を整えています。それを実現しているのが《輪講》と呼ばれる形態です。</p>
                    </div>
                </section>
                <section class="contents">
                    <div class="title">
                        <span class="border-h"></span>
                        <h2>輪講について</h2>
                    </div>
                    <div class="cont-text">
                        <p>輪講については、大辞泉より以下のように定義されています。</p>
                        <p>一つの書物を何人かで順番に講義すること（デジタル大辞泉, 小学館）</p>
                        <p>当研究室では輪講とは、一つの教科書をもとに、各章ごとに担当者を振り分け、学生が学生に対してお互いに講義を行うことと解釈し輪講を行っています。講師役となった学生は当日までにスライドを作成し、そのスライドをもとに講義を行います。</p>
                        <p>中島ゼミでは理論と技術の二軸に分けて輪講を行っています。</p>
                        <img class="article-img" src="<?php echo get_template_directory_uri(); ?>/img/act/act-01.png" alt="">
                        <p>中島ゼミでの理論を学ぶための輪講は、感性情報学や感性についての知識を深める場として、全員が参加して学べることが望ましいと考えています。これはゼミに所属する上での必要な知識、知覚心理学や感性情報学を共通言語にするため、またお互いの研究や制作活動の質向上を実現させるために行っています。</p>
                        <p>一方で技術を得るための輪講は希望者のみとしています。これは自身の制作に役立つ技術に絞って参加できることが望ましく、電子工作など自分が得たい技術を高めるために参加できるように行っています。</p>
                        <p>現在、下級生のために公開しておりますので、ご興味のある方はご見学にいらしてください。</p>
                        <h3 class="heading-3">輪行の様子</h3>
                        <img class="article-img" src="<?php echo get_template_directory_uri(); ?>/img/act/act-02.png" alt="">
                        <p>参考：<a class="link" href="https://design.visional.inc/archives/1669" rel="noopener noreferrer">https://design.visional.inc/archives/1669</a></p>
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