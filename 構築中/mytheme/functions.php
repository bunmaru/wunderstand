<?php
function my_length($length){
    return 50;
}
add_filter("expert_mblength", "my_length");

function my_more($more){
    return "…";
}
add_filter("expert_more", "my_more");

//アイキャッチ画像
add_theme_support('post-thumbnails');

//編集画面の設定
function editor_setting($init) {
	$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre';

	$style_formats = array(
		array(
			'title' => '補足情報',
			'block' => 'div',
			'classes' => 'point'
		),
		array(
			'title' => '注意書き',
			'block' => 'div',
			'classes' => 'attention'
		)
	);

	$init['style_formats'] = json_encode( $style_formats );


	return $init;
}
add_filter('tiny_mce_before_init', 'editor_setting');

//スタイルメニューを有効化
function add_stylemenu( $buttons ){
	array_splice( $buttons, 1, 0, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'add_stylemenu' );

//サムネイル画像
function mythumb($size){
	if (has_post_thumbnail()){
		$postthumb = wp_get_attachment_image_src(get_post_thumbnail_id(), $size);
		$url = $postthumb[0];
	}else{
		$url = get_template_directory_uri() .  '/picnic.jpg';
	}
	return $url;
}

//カスタムメニュー
register_nav_menu('sitenav', 'サイトナビゲーション');
register_nav_menu('pickupnav', 'お勧め記事');

//トグルボタン
function navbtn_scripts(){
	wp_enqueue_script('navbtn-script', get_template_directory_uri() . '/navbtn.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'navbtn_scripts');

//前後記事に関するメタデータの出力を禁止(firefox先読みによるカウント増加防止)
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head()',10,0);

//botのアクセスを判別
function is_bot(){
	$ua = $_SERVER['HTTP_USER_AGENT'];

	$bots = array(
		"googlebot",
		"mshost",
		"yahoo"
	);
	foreach($bots as $bot){
		if(strpos($ua, $bot) !== false){
			return true;
		}
	}
	return false;
}

//ウィジェットエリア
register_sidebar(array(
	'id' => 'submenu',
	'name' => 'サブメニュー',
	'description' => 'サイドバーに表示するウィジェットを指定。',
	'before_widget' => '<aside id="%1$s" class="mymenu widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '<h2>'
));
register_sidebar(array(
	'id' => 'ad',
	'name' => '広告',
	'description' => 'サイドバーに表示する広告を指定。',
	'before_widget' => '<aside id="%1$s" class="myad widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '<h2>'
));

//html5対応
add_theme_support('html5',array('serach-form'));

//ヘッダー画像
add_theme_support('custom-header',array(
	'width' => 1000,
	'height' => 300,
	'header-text' => false,
));