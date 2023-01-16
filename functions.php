<?php
/* CSSとJavaScriptの読み込み */
function my_script_init()
  { // WordPressに含まれているjquery.jsを読み込まない
    wp_deregister_script('jquery');
    // jQueryの読み込み
    wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.6.1.min.js', "", "1.0.1", true);
    wp_enqueue_script( 'gsap', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js', "", "1.0.1", true);
    wp_enqueue_script( 'scrollTrigger', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollTrigger.min.js', "", "1.0.1", true);
    wp_enqueue_script( 'yt-js', get_template_directory_uri() . '/js/yt.js', array( 'jquery' ), '1.0.1', true );
    wp_enqueue_script( 'btn-js', get_template_directory_uri() . '/js/btn.js', array( 'jquery' ), '1.0.1', true );
    wp_enqueue_script( 'anim-js', get_template_directory_uri() . '/js/anim.js', array('jquery'), '1.0.1', true );
    wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css', array(), filemtime( get_template_directory().'/style.css' ) );
  }
  add_action('wp_enqueue_scripts', 'my_script_init');

  function nakajima_setup() {
    add_theme_support( 'post-thumbnails' ); //アイキャッチ画像をON
    add_theme_support( 'menus');
 }
 add_action( 'after_setup_theme', 'nakajima_setup' );

 function sort_side_menu( $menu_order ) {
  return array(
    "index.php", // ダッシュボード
    "edit.php?post_type=manual",
    "edit.php?post_type=news",
    "edit.php?post_type=work",
    "edit.php?post_type=page", // 固定ページ
    "edit.php", // 投稿
    "separator1", // 区切り線1
    "upload.php", // メディア
    "edit-comments.php", // コメント
    "separator2", // 区切り線2
    "themes.php", // 外観
    "plugins.php", // プラグイン
    "users.php", // ユーザー
    "tools.php", // ツール
    "options-general.php", // 設定
    "separator-last" // 区切り線（最後）
  );
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'sort_side_menu' );

function custom_login_logo() {
  ?>
    <style type="text/css">
      #login h1 a {
        display: block;
        background-repeat: no-repeat;
        background-size: cover;
        background-image: url(<?php echo get_template_directory_uri(); ?>/img/nakalogo.svg);
        width: 119px;
        height: 100px;
      }
    </style>
  <?php
  }
  add_action( 'login_head', 'custom_login_logo' );

  // 固定ページの画像呼び出しパスの簡略化
function imagepassshort($arg) {
  $content = str_replace('"img/', '"' . get_bloginfo('template_directory') . '/img/', $arg);
  return $content;
}
add_action('the_content', 'imagepassshort');

add_filter( 'run_wptexturize', '__return_false' );

function sc_home_url() {
  return esc_url( home_url('/') );
}
add_shortcode('home_url', 'sc_home_url');

// ニュースページのclass
// function my_replace_to_a( $postarr ) {
//   $post_type = get_posts(array('post_type'=>'post'));
//   $content_post = $post_type->post_content;
//   $postarr = str_replace('<a', '<a class="link"', $content_post );
//   return $postarr;
// }
// add_filter('wp_insert_post_data', 'my_replace_to_a');

function my_replace_to_a( $postarr ) {
  global $post;
  if('news' == get_post_type() || 'work' == get_post_type() || 'manual' == get_post_type()){
    $postarr['post_content'] = str_replace('<a', '<a class="link"', $postarr['post_content'] );
  }
  return $postarr;
}
add_filter('wp_insert_post_data', 'my_replace_to_a');

function my_replace_to_h3( $postarr ) {
  global $post;
  if('news' == get_post_type() || 'work' == get_post_type() || 'manual' == get_post_type()){
    $postarr['post_content'] = str_replace('<h3', '<h3 class="heading-3"', $postarr['post_content'] );
  }
  return $postarr;
}
add_filter('wp_insert_post_data', 'my_replace_to_h3');

function my_replace_to_img( $postarr ) {
  global $post;
  if('news' == get_post_type() || 'work' == get_post_type() || 'manual' == get_post_type()){
    $postarr['post_content'] = str_replace('<img', '<img class="article-img"', $postarr['post_content'] );
  }
  return $postarr;
}
add_filter('wp_insert_post_data', 'my_replace_to_img');



// function post_has_archive($args, $post_type){
//   if('post'== $post_type){
//     $args['rewrite']=true;
//     $args ["label"] = 'ニュース'; /*「投稿」のラベル名 */
//     $args['has_archive']='news'; /* アーカイブにつけるスラッグ名 */
//   }
//   return $args;
// }
// add_filter('register_post_type_args', 'post_has_archive', 10, 2);


//カスタム投稿タイプの追加
add_action( 'init', 'create_post_type' );
function create_post_type() {
//カスタム投稿タイプ１（ここから）
register_post_type(
'news',
array(
'labels' => array(
'name' => __( 'ニュース' ),
'singular_name' => __( 'ニュース' )
),
'public' => true,
'has_archive' => true,
'supports' => array('title','editor','thumbnail','author'),
)
);

register_taxonomy_for_object_type('category', 'news');
register_taxonomy_for_object_type('post_tag', 'news');
//カスタム投稿タイプ１（ここまで）

//カスタム投稿タイプ２（ここから）
register_post_type(
'work',
array(
'labels' => array(
'name' => __( '作品・研究' ),
'singular_name' => __( '作品・研究' )
),
'public' => true,
'has_archive' => true,
'supports' => array('title','editor','thumbnail', 'author'),
)
);

register_taxonomy_for_object_type('category', 'work');
register_taxonomy_for_object_type('post_tag', 'work');
//カスタム投稿タイプ２（ここまで）

register_post_type(
  'manual',
  array(
  'labels' => array(
  'name' => __( 'マニュアル' ),
  'singular_name' => __( 'マニュアル' )
  ),
  'public' => true,
  'has_archive' => true,
  'supports' => array('title','editor','thumbnail','author'),
  )
  );
  
  register_taxonomy_for_object_type('category', 'manual');
  register_taxonomy_for_object_type('post_tag', 'manual');

}


function get_index_into_h2() {
  //グローバル変数を使う為の宣言
  global $post;
  //マッチングで<h>タグを取得する
  preg_match_all('/<h[2]>.+<\/h[2]>/u', $post->post_content, $matches);
  //取得した<h>タグの個数をカウント
  $matches_count = count($matches[0]);
  if(empty($matches)){
      //<h>タグがない場合の出力
      echo '<span>Sorry no index</span>';
  }else{
      //<h>タグが存在する場合に<h>タグを出力
      for ($i = 0; $i < $matches_count; $i++){
          echo  $matches[0][$i];
      }
  }     
}
?>