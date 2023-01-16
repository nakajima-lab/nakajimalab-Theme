<?php get_header(); ?>

        <div class="section-area-left">
            <header>
                <div class="yt-area">
                    <div id="js-main-movie"></div>
                    <div id="yt-mask"></div>
                </div>
            </header>
            <main class="main-contents">
                <section class="contents">
                    <div id="anim-title">
                        <div class="title fade-title">
                            <span class="border-h"></span>
                            <h2>中島研究室について</h2>
                        </div>
                    </div>
                    <div class="cont-text">
                        <p>わたしたち中島研究室（感性情報メディア研究室）は、人の心や感覚について理解を深めながら作品制作を行う研究室です。</p>
                        <p>人間の感性を明らかにし、感性にはたらきかける新たなメディアの創出に取り組みます。</p>
                        <p class="arrow right">
                            <a href="<?php echo esc_url( home_url( '/about' ) ); ?>">
                                <svg width="23" height="18" viewBox="0 0 23 18"xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.71875 9H21.3385M21.3385 9L14.305 2M21.3385 9L14.305 16" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </p>
                    </div>
                </section>
                <section class="contents">
                    <div id="anim-title">
                        <div class="title fade-title">
                            <span class="border-h"></span>
                            <h2>活動内容</h2>
                        </div>
                    </div>
                    <div class="cont-text">
                        <p>中島研究室では、研究や制作に必要な理論や技術について、輪講と呼ばれる形態を採用しています。</p>
                        <p>この輪講により、学生が受動的に学習するのではなく、全員が主体となり能動的に知識を高められる場を整えています。</p>
                        <p class="arrow right">
                            <a href="<?php echo esc_url( home_url( '/activities' ) ); ?>">
                                <svg width="23" height="18" viewBox="0 0 23 18"xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.71875 9H21.3385M21.3385 9L14.305 2M21.3385 9L14.305 16" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </p>
                    </div>
                </section>
                <section class="contents">
                    <div id="anim-title">
                        <div class="title fade-title">
                            <span class="border-h"></span>
                            <h2>ニュース</h2>
                        </div>
                    </div>
                    <div class="cont-text">
                    <?php
                    if( wp_is_mobile() ){
                        $num = 3; //スマホの表示数(全件は-1)
                    } else {
                        $num = 6; //PCの表示数(全件は-1)
                    }
                    $args = [
                        'post_type' => 'news', // 投稿タイプのスラッグ(通常投稿なので'post')
                        'posts_per_page' => $num, // 表示件数
                    ];
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                    ?>
                        <div class="news-cont">
                            <div class="flex date">
                                <p><?php the_time('Y年m月d日'); ?></p>
                                <?php
                                    $category = get_the_category();
                                    $tag = get_the_tags();
                                    echo '<span class="tag '.$tag[0]->slug.'">'.$category[0]->name.'</span>';
                                ?>
                            </div>
                            <p class="container"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                        </div>
                        <?php endwhile; else: ?>
                        <p>まだニュースがありません</p>
                        <?php endif; ?>
                        <p class="arrow right">
                            <a href="<?php echo esc_url( home_url( '/news' ) ); ?>">
                                <svg width="23" height="18" viewBox="0 0 23 18"xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.71875 9H21.3385M21.3385 9L14.305 2M21.3385 9L14.305 16" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </p>
                    </div>
                </section>
                <section class="contents">
                    <div id="anim-title">
                        <div class="title fade-title">
                            <span class="border-h"></span>
                            <h2>作品・研究</h2>
                        </div>
                    </div>
                    <div class="cont-text">
                        <div class="grid work-list">
                        <?php
                        if( wp_is_mobile() ){
                            $num = 3; //スマホの表示数(全件は-1)
                        } else {
                            $num = 3; //PCの表示数(全件は-1)
                        }
                        $args = [
                            'post_type' => 'work', // 投稿タイプのスラッグ(通常投稿なので'post')
                            'posts_per_page' => $num, // 表示件数
                        ];
                        $the_query = new WP_Query( $args );
                        if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                        ?>
                            <div class="work-item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('post-thumbnail', array('class' => 'work-img', 'alt' => the_title_attribute('echo=0'))); ?>
                                    <div class="caption">
                                        <h3><?php echo wp_trim_words( get_the_title(), 20, '…' ); ?></h3>
                                        <?php
                                        $category = get_the_category();
                                        $tag = get_the_tags();
                                        echo '<span class="tag '.$tag[0]->slug.'">'.$category[0]->name.'</span>';
                                        ?>
                                        <p><?php echo wp_trim_words( get_the_content(), 40, '…' ); ?></p>
                                    </div>
                                </a>
                            </div>
                            <?php endwhile; else: ?>
                    <p>まだ作品・研究がありません</p>
                    <?php endif; ?>
                        </div>
                    <p class="arrow right">
                            <a href="<?php echo esc_url( home_url( '/work' ) ); ?>">
                                <svg width="23" height="18" viewBox="0 0 23 18"xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.71875 9H21.3385M21.3385 9L14.305 2M21.3385 9L14.305 16" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                    </p>
                    </div>
                </section>
                <section id="teacher" class="contents">
                    <div id="anim-title">
                        <div class="title fade-title">
                            <span class="border-h"></span>
                            <h2>指導教員</h2>
                        </div>
                    </div>
                    <div class="cont-text">
                        <h3>中島武三志</h3>
                        <p>東京工芸大学芸術学部インタラクティブメディア学科 助教</p>
                    </div>
                </section>
                <section id="access" class="contents">
                    <div id="anim-title">
                        <div class="title fade-title">
                            <span class="border-h"></span>
                            <h2>アクセス</h2>
                        </div>
                    </div>
                    <div class="cont-text">
                        <div class="addr">
                            <p>東京工芸大学　中野キャンパス</p>
                            <p>〒164-8678 東京都中野区本町2-9-5</p>
                        </div>
                        <div class="maps">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1575.8629974614262!2d139.6796877500214!3d35.69341596286022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f2da3ca9da8f%3A0x8b218c4d8c7b36b0!2z5p2x5Lqs5bel6Iq45aSn5a2m!5e0!3m2!1sja!2sjp!4v1666749975854!5m2!1sja!2sjp"
                                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <h3>お問い合わせ</h3>
                        <p class="form-link"><a href="">お問い合わせフォーム</a></p>
                    </div>
                </section>
            </main>
        </div>

        <?php get_sidebar(); ?>

    <?php get_footer(); ?>