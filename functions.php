<?php

/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage kjuku
 */

require_once get_template_directory() . '/theme-config.php';

/*
 * init theme support
 */
function themrishvite_theme_support()
{
	add_theme_support('html5', array(
		'comment-form',
		'comment-list',
		'search-form',
		'gallery',
		'caption',
		'style',
		'script'
	));
	add_theme_support("post-thumbnails");
	add_theme_support('title-tag');
	add_theme_support('editor-styles');
	add_theme_support('custom-logo');
	add_theme_support('automatic-feed-links');
	register_nav_menus(array(
		'main-menu' => __('mainmenu', 'themrishvite')
	));
}
add_action('after_setup_theme', 'themrishvite_theme_support');

function cors_http_header()
{
	header("Access-Control-Allow-Origin: *");
}
add_action('send_headers', 'cors_http_header');


add_action('wp_enqueue_scripts', function () {
	if (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true) {
		//develop mode
		function vite_head_module_hook()
		{
			echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT . '"></script>';
		}
		add_action('wp_footer', 'vite_head_module_hook');
	} else {
		// production mode, 'npm run build' must be executed in order to generate assets

		// read manifest.json to figure out what to enqueue
		$manifest = json_decode(file_get_contents(DIST_PATH . '/manifest.json'), true);

		// Move 'main.js' to the front of the array if it exists
		if (is_array($manifest) && isset($manifest['main.js'])) {
			$mainJs = $manifest['main.js'];
			unset($manifest['main.js']);
			$manifest = ['main.js' => $mainJs] + $manifest;
		}

		// is ok
		if (is_array($manifest)) {

			// get first key, by default is 'main.js'
			$manifest_key = array_keys($manifest);
			if (isset($manifest_key[0])) {
				// enqueue CSS files
				foreach (@$manifest["main.css"] as $css_file) {
					wp_enqueue_style('main', DIST_URI . '/' . $css_file);
				}
				// enqueue main JS file
				$js_file = @$manifest[$manifest_key[0]]['file'];
				if (!empty($js_file)) {
					wp_enqueue_script('main', DIST_URI . '/' . $js_file, JS_DEPENDENCY, '', JS_LOAD_IN_FOOTER);
				}
			}
		}
	}
});

function readScript()
{

	$kit_id = 'kjk6cks'; // あなたのAdobe FontsのKit IDに置き換えてください

	wp_enqueue_script('mytheme-typekit', 'https://use.typekit.net/' . $kit_id . '.js', array(), null, false);

	wp_add_inline_script('mytheme-typekit', 'try{Typekit.load({ async: true })}catch(e){}');

	// 提供されたAdobe Fontsのローディングスクリプトをインラインで追加します。
	$inline_script = <<<EOD
			(function(d) {
					var config = {
							kitId: '$kit_id',
							scriptTimeout: 3000,
							async: true
					},
					h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\\bwf-loading\\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
			})(document);
			EOD;

	// 'after'を使用して、Adobe Fontsスクリプトの後に実行されるように設定します。
	wp_add_inline_script('mytheme-typekit', $inline_script, 'after');


	wp_enqueue_style(
		'Noto Sans Jp',
		'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600;700&display=swap',
		[]
	);
}
add_action('wp_enqueue_scripts', 'readScript');

$template_directory_uri = get_template_directory_uri();

function get_image_path($file_name, $extension = 'png')
{
	global $template_directory_uri;
	// イメージの相対パス
	$img_relative_path = "/dist/assets/images/{$file_name}.{$extension}";

	// サーバー上の実際のファイルパス
	$full_file_path = get_template_directory() . $img_relative_path;

	// filemtime() が機能するように、実際のファイルパスを使用
	$time_stamp = file_exists($full_file_path) ? filemtime($full_file_path) : '';

	// 最終的なURLを生成
	$img_url = $template_directory_uri . $img_relative_path . '?' . $time_stamp;

	return $img_url;
}


// ショートコードを追加する関数
function get_image_path_shortcode($atts)
{
	// ショートコードの属性を解析
	$file_name = $atts['name'] ?? 'default';
	$extension = $atts['extension'] ?? 'png';

	// 画像パスを取得
	return get_image_path($file_name, $extension);
}
add_shortcode('image_path', 'get_image_path_shortcode');


