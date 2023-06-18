<?php
/**
 * Functions
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
	add_theme_support( 'post-thumbnails'); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)			
	);
}
add_action( 'after_setup_theme', 'my_setup' );



/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */


function my_script_init()
{
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
	wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP&display=swap'); 

	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.js', array(), '1.0.1', true); 
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js');

	wp_enqueue_style('style-css', get_template_directory_uri() . '/../css/styles.css', array(), filemtime(get_theme_file_path('/../css/styles.css')), 'all');
	wp_enqueue_script('script-js', get_template_directory_uri() . '/../js/script.js', array('jquery'), filemtime(get_theme_file_path('/../js/script.js')), true);


	
	// // Google Fonts 読み込み
	// wp_enqueue_style('google fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;700&family=Roboto:wght@400;700&display=swap');
	// // swiper
	// wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
	// // swiper
	// wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js');

	// // オリジナルcss
	// wp_enqueue_style('my', get_template_directory_uri() . '/../css/styles.css', array(), filemtime(get_theme_file_path('/../css/styles.css')), 'all');
	// // オリジナルjs
	// wp_enqueue_script('my', get_template_directory_uri() . '/../js/script.js', array('jquery'), filemtime(get_theme_file_path('/../js/script.js')), true);

}
add_action('wp_enqueue_scripts', 'my_script_init');



/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
// function my_menu_init() {
// 	register_nav_menus(
// 		array(
// 			'global'  => 'ヘッダーメニュー',
// 			'utility' => 'ユーティリティメニュー',
// 			'drawer'  => 'ドロワーメニュー',
// 		)
// 	);
// }
// add_action( 'init', 'my_menu_init' );
/**
 * メニューの登録
 *
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */



// function register_my_menus() { 
//   register_nav_menus( array( //複数のナビゲーションメニューを登録する関数
//   //'「メニューの位置」の識別子' => 'メニューの説明の文字列',
//     'main' => 'メインメニュー',
//     'footer'  => 'フッターメニュー',
//   ) );
// }
// add_action( 'after_setup_theme', 'register_my_menus' );






/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
// function my_widget_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => 'サイドバー',
// 			'id'            => 'sidebar',
// 			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
// 			'after_widget'  => '</div>',
// 			'before_title'  => '<div class="p-widget__title">',
// 			'after_title'   => '</div>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'my_widget_init' );


/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title( $title ) {

	if ( is_home() ) { /* ホームの場合 */
		$title = 'ブログ';
	} elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
		$title = '' . single_cat_title( '', false ) . '';
	} elseif ( is_tag() ) { /* タグアーカイブの場合 */
		$title = '' . single_tag_title( '', false ) . '';
	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title( '', false ) . '';
	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
		$title = '' . single_term_title( '', false );
	} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
		$title = '「' . esc_html( get_query_var( 's' ) ) . '」の検索結果';
	} elseif ( is_author() ) { /* 作者アーカイブの場合 */
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) { /* 日付アーカイブの場合 */
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . '年';
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . '月';
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . '日';
		}
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'my_archive_title' );


/**
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
 */
function my_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );


/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
function my_excerpt_more( $more ) {
	return '...';

}
add_filter( 'excerpt_more', 'my_excerpt_more' );


// //pタグの除去

// add_action('init', function() {
// 	remove_filter('the_excerpt', 'wpautop');
// 	remove_filter('the_content', 'wpautop');
// 	});
// 	add_filter('tiny_mce_before_init', function($init) {
// 	$init['wpautop'] = false;
// 	$init[‘apply_source_formatting’] = true;
// 	return $init;
// 	});


// // 固定・投稿ページ共にpタグ自動挿入を解除する
add_action('init', function() {
	remove_filter('the_excerpt', 'wpautop');
	remove_filter('the_content', 'wpautop');
	});
	add_filter('tiny_mce_before_init', function($init) {
	$init['wpautop'] = false;
	$init['apply_source_formatting'] = true;
	return $init;
	});


	// Contact Form 7の自動pタグ無効
	add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
	function wpcf7_autop_return_false() {
		return false;
	}

// //pタグとbrタグの自動挿入を解除
// remove_filter('the_content', 'wpautop');
// remove_filter('the_excerpt', 'wpautop'); // 抜粋の自動整形を無効にする


// add_filter('the_content', 'wpautop_filter', 9);
// function wpautop_filter($content) {
// global $post;
// $remove_filter = false;
// $arr_types = array('works'); //適用させる投稿タイプを指定
// $post_type = get_post_type( $post->ID );
// if (in_array($post_type, $arr_types)) $remove_filter = true;
// if ( $remove_filter ) {
// remove_filter('the_content', 'wpautop');
// remove_filter('the_excerpt', 'wpautop');
// }
// return $content;
// }


// カスタム投稿タイプ【ブログ】：メインクエリの変更（アーカイブページにて表示件数を9件にする）
function change_set_blog($query) {
	if ( is_admin() || ! $query->is_main_query() ){
		return;
	}
	if ( $query->is_post_type_archive('blog') || is_tax(['blog_category'])) {
		$query->set( 'posts_per_page', '9' );
		return;
	}
}
add_action( 'pre_get_posts', 'change_set_blog' );


// カスタム投稿タイプ【works】:メインクエリの変更（アーカイブページにて表示件数を9件にする）
function change_set_liquor($query) {
	if ( is_admin() || ! $query->is_main_query() ){
		return;
	}
	if ( $query->is_post_type_archive('liquor') || is_tax(['liquor_category'])) {
		$query->set( 'posts_per_page', '6' );
		return;
	}
}
add_action( 'pre_get_posts', 'change_set_liquor' );







// /* カテゴリーの設定 */
// register_taxonomy(
// 	'custom_category', //カテゴリーの名前
// 	'blog', //使うカスタム投稿タイプ名
// 	array(
// 	'hierarchical' => true, //trueで親子関係使用
// 	'update_count_callback' => '_update_post_term_count',
// 	'label' => 'カテゴリー',
// 	'singular_label' => 'カテゴリー',
// 	'public' => true,
// 	'show_ui' => true
// 	)
// 	);



// カスタム投稿タイプ【works】
function cpt_register_liquor(){
	$args = [
		'label' => 'LIQUOR',
		'labels' => [
			'singular_name' => 'LIQUOR',
			'edit_item' => 'LIQUORを編集',
			'add_new_item' => '新規LIQUORを追加',
		],
		'public' => true, //カスタム投稿タイプを一般に公開するかどうか
		'hierarchical' => true, //階層化するかどうか
		'has_archive' => true, //アーカイブページを持つかどうか
		'show_in_rest' => true, //REST APIにカスタム投稿タイプを含めるかどうか → カスタム投稿タイプでブロックエディタを使うならtrue
		'delete_with_user' => false, //ユーザーを削除した後、コンテンツも削除するかどうか
		'exclude_from_search' => false, //検索から除外するかどうか
		'query_var' => true, //クエリパラメーターを使えるようにする → プレビュー画面を使うためにはtrue
		'menu_position' => 5, //管理画面に表示するメニューの位置
		'supports' => [
			'title', 'editor', 'thumbnail', 'custom-fields',
		], //カスタム投稿タイプがサポートする機能
	];
	register_post_type('liquor', $args);
}
add_action('init', 'cpt_register_liquor');




function tax_register_category(){
	$args = [
		'label' => 'カテゴリー',
		'labels' => [
			'singular_name' => 'カテゴリー',
			'edit_item' => 'カテゴリーを編集',
			'add_new_item' => '新規カテゴリーを追加'
		],
		'public' => true,
		'hierarchical' => true, //階層化するかどうか（カテゴリー的に使うならtrue、タグ的に使うならfalse）
    'show_ui' => true,
		'show_admin_column' => true,
		'show_in_rest' => true, //REST APIにカスタムタクソノミーを含めるかどうか、グーテンベルクのブロックエディターで分類を使用するにはtrue
		'query_var' => true, //クエリパラメーターを使えるようにする
    'show_in_nav_menus' => true,
    'hierarchical' => true,
	];
	register_taxonomy('liquor_category', 'liquor', $args);
}
add_action('init', 'tax_register_category');





// アイキャッチ画像を有効化
function setup_post_thumbnails(){
	add_theme_support('post-thumbnails', ['blog', 'liquor']);
	add_image_size('liquor', 525, 349, true);
}
add_action('after_setup_theme', 'setup_post_thumbnails');


// サムネイル画像再生成
function img_uncompressed(){
	return 100;
}
add_filter('jpeg_quality','img_uncompressed');




/**
* contact-form-7でバリデーションを追加
*/
add_filter('wpcf7_validate_text', 'wpcf7_validate_post', 11, 2);
add_filter('wpcf7_validate_text*', 'wpcf7_validate_post', 11, 2);
function wpcf7_validate_post($result,$tag){
$tag = new WPCF7_Shortcode($tag);
$name = $tag->name;
$value = isset($_POST[$name]) ? trim(wp_unslash(strtr((string) $_POST[$name], "\n", " "))) : "";
//$nameはContactForm7のフォーム要素(input等)のname="この部分"
//$valueはユーザーが入力した(選択した)値
//
//ここから項目を指定してバリデーションの追加
//
if ($name === "your-name") {
	//your-nameという名前のフォームに対して
	if(!preg_match("/^[ぁ-んァ-ヶー一-龠]+$/", $value)) {
	//if(!この部分はPHPで指定)は指定したい条件に当てはまらない(!)場合は
	if (method_exists($result, 'invalidate')) {
	$result->invalidate( $tag,"全角日本語で入力してください");
	} else {
	$result['valid'] = false;
	$result['reason'][$name] = '全角日本語で入力してください';
	}
	//条件を変えた場合は文言も書き換えておく。
	}
	}

	if ($name === "corp-pc" || $name === "corp") {
		if(!preg_match("/^[a-zA-Z0-9ぁ-んァ-ヶー一-龠]+$/", $value)) {
		//if(!この部分はPHPで指定)は指定したい条件に当てはまらない(!)場合は
		if (method_exists($result, 'invalidate')) {
		$result->invalidate( $tag,"全角日本語で入力してください");
		} else {
		$result['valid'] = false;
		$result['reason'][$name] = '全角日本語で入力してください';
		}
		//条件を変えた場合は文言も書き換えておく。
		}
		}

//
//ここまでバリデーションの追加
return $result;
}


// // テンプレートファイル名がabout.phpの場合
// add_action('init', function() {
//   if ( is_page_template('archive-works.php') ) {
//     remove_filter('the_content', 'wpautop');
//   };
// });

