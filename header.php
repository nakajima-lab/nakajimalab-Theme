<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="twitter:card" content="summary">
<?php
if (is_singular()){//投稿・固定ページの場合
if(have_posts()): while(have_posts()): the_post();
  echo '<meta name="twitter:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'">';echo "\n";//抜粋を表示
endwhile; endif;
  echo '<meta name="twitter:title" content="'; the_title(); echo '">';echo "\n";//単一記事タイトルを表示
  echo '<meta name="twitter:url" content="'; the_permalink(); echo '">';echo "\n";//単一記事URLを表示
  } else {//単一記事ページページ以外の場合（アーカイブページやホームなど）
  echo '<meta name="twitter:description" content="'; bloginfo('description'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログの説明文を表示
  echo '<meta name="twitter:title" content="'; bloginfo('name'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログのタイトルを表示
  echo '<meta name="twitter:url" content="'; bloginfo('url'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログのURLを表示
}
$str = $post->post_content;
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿にイメージがあるか調べる
if (is_singular()){//投稿・固定ページの場合
  if (has_post_thumbnail()){//投稿にサムネイルがある場合の処理
    $image_id = get_post_thumbnail_id();
    $image = wp_get_attachment_image_src( $image_id, 'full');
    $img_url = $image[0];
    echo '<meta name="twitter:image" content="'.$image[0].'">';echo "\n";
  } else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {//投稿にサムネイルは無いが画像がある場合の処理
    $img_url = $imgurl[2];
    echo '<meta name="twitter:image" content="'.$imgurl[2].'">';echo "\n";
  } else {//投稿にサムネイルも画像も無い場合の処理
    $ogp_image = get_template_directory_uri().'/images/og-image.jpg';
    $img_url = $ogp_image;
    echo '<meta name="twitter:image" content="'.$ogp_image.'">';echo "\n";
  }
} else {//単一記事ページページ以外の場合（アーカイブページやホームなど）
  if (get_header_image()){//ヘッダーイメージがある場合は、ヘッダーイメージを
    $img_url = get_header_image();
    echo '<meta name="twitter:image" content="'.$img_url.'">';echo "\n";
    
  } else {//ヘッダーイメージがない場合は、テーマのスクリーンショット
    $img_url = get_template_directory_uri().'/screenshot.png';
    echo '<meta name="twitter:image" content="'.$img_url.'">';echo "\n";
  }
}
//ドメイン情報を$results[1]に取得する
preg_match( '/https?:\//(.+?)\//i', admin_url(), $results );
//画像の縦横幅を取得
list($width,$height) = getimagesize($img_url);
?>
<meta name="twitter:domain" content="<?php echo $results[1] ?>">
<meta name="twitter:image:width" content="<?php echo $width ?>">
<meta name="twitter:image:height" content="<?php echo $height ?>">
<meta name="twitter:creator" content="@63x4_252">
<meta name="twitter:site" content="@63x4_252">
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