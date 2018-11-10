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