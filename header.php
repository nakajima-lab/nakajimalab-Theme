<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php get_template_part('twitter-card');?>
    <title>
        <?php
            global $page, $paged;
                
                if(is_front_page()): 
                    bloginfo('name');
                elseif(is_page()):
                    wp_title('-', true, 'right');
                    bloginfo('name');
                elseif(is_single()):
                    wp_title('-', true, 'right');
                    bloginfo('name');
                elseif(is_archive()):
                    echo esc_html(get_post_type_object(get_post_type())->label);
                    echo' - ';
                    bloginfo('name');
                elseif(is_search()):
                    echo '「';
                    echo the_search_query();
                    echo '」の検索結果';
                    echo '-';
                    bloginfo('name');
                else:
                    the_title();
                endif;
                
                if($paged >= 2 || $page >= 2) : //２ページ目以降の場合
                    echo ' - 中島研究室｜東京工芸大学'.sprintf('%sページ',
                    max($paged,$page));
                endif;
                ?>
    </title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/nkajimaLogo2.png">
    <script src="<?php echo get_template_directory_uri(); ?>/js/snap.svg-min.js"></script>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@500;700&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
    <div id="js-load-bg" class="js_loading">
        <div id="js-load-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/img/nakalogo.svg" alt="">
        </div>
        <svg id="beat" width="298" height="134" viewBox="0 0 298 134" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="beatAnim" d="M0.5 66.5H95L104.5 47.5L113.5 82.5L130.5 27L141 111.5L157.5 0.5L176 132L203.5 66.5H298"/>
        </svg>
    </div>

    <!-- <script type="text/javascript">
            $(function(){
                if(window.performance){
                    if(performance.navigation.type == 1){
                        loadAnim();
                    }else{
                        let ref = document.referrer;
                        let hereHost = window.location.hostname;

                        // let sStr = "^https?://" + hereHost;
                        let sStr = hereHost;
                        //let sStr = "/^https/" + hereHost;
                        let rExp = new RegExp(sStr, "i");

                        if(ref.length == 0){
                            loadAnim();
                        }else if(ref.match(rExp)){
                            moveAnim();
                        }else{
                            loadAnim();
                        }
                    }
                }
            });

                let ref = document.referrer;
                        let hereHost = window.location.hostname;

                        // let sStr = "^https?://" + hereHost;
                        let sStr = hereHost;
                        let rExp = new RegExp(sStr, "i");

                        if(ref.match(rExp)){
                            loadAnim();
                        }else{
                            moveAnim();
                        }
            });
        </script> -->

    <header class="header flex">
        <div class="flex header-logo">
            <h1 class="logo-link" >
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/Logo_naka.svg" alt=""></a>
            </h1>
            <p>
                <?php
                
                if(is_front_page()): 
                    bloginfo( 'description' );
                elseif(is_archive()):
                    echo esc_html(get_post_type_object(get_post_type())->label);
                elseif(is_search()):
                    echo '「';
                    echo the_search_query();
                    echo '」の検索結果';
                else:
                    the_title();
                endif;
                    
                ?>
            </p>
        </div>
        
        <nav class="glo-nav">
        <div class="openbtn"><span></span><span></span></div>
            <div id="glo-nav-sp">
                    <ul class="flex sp-flex">
                        <li class="glo-nav__item"><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">中島研究室について</a></li>
                        <li class="glo-nav__item"><a href="<?php echo esc_url( home_url( '/activities' ) ); ?>">活動内容</a></li>
                        <li class="glo-nav__item"><a href="<?php echo esc_url(home_url( '/news' )); ?>">ニュース</a></li>
                        <li class="glo-nav__item"><a href="<?php echo esc_url(home_url( '/work' )); ?>">作品・研究</a></li>
                        <li class="glo-nav__item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>#teacher">指導教員</a></li>
                        <li class="glo-nav__item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>#access">アクセス</a></li>
                    </ul>
            </div>
            <!-- <?php
                $args = array(
                    'menu_class' => 'flex',
                    'container' => false,
                );
                wp_nav_menu($args);
            ?> -->
        </nav>
    </header>

    <article class="grid article-area">