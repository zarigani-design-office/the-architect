<?php 
/**
 * カスタムフィールドを定義
 * 
 * @param array  $settings  MW_WP_Form_Setting オブジェクトの配列
 * @param string $type      投稿タイプ or ロール
 * @param int    $id        投稿ID or ユーザーID
 * @param string $meta_type post | user
 * @return array
 */

function the_architect_register_fields( $settings, $type, $id, $meta_type ) {
	// SCF::add_setting( 'ユニークなID', 'メタボックスのタイトル' );
	$Setting_name = SCF::add_setting( 'name-cf', '表示名設定' );
	$Setting_sns = SCF::add_setting( 'sns-cf', 'SNS設定' );
	$Setting_footer = SCF::add_setting( 'footer-cf', 'フッター設定' );
	$Setting_default_thumb = SCF::add_setting( 'default-thumb-cf', 'デフォルトサムネイル画像' );
	$Setting_top_slider = SCF::add_setting( 'top-slider-cf', 'トップページスライダー設定' );
	$Setting_top_contents = SCF::add_setting( 'top-page-cf', 'トップページコンテンツ設定' );
	$Setting_about = SCF::add_setting( 'about-cf', 'ABOUTページ情報' );
	$Setting_about_items = SCF::add_setting( 'about-items-cf', 'ABOUTページ企業情報項目' );
	$Setting_news = SCF::add_setting( 'news-cf', 'NEWSページ設定' );
	$Setting_works = SCF::add_setting( 'works-cf', 'WORKSページ設定' );

	

	// $Setting->add_group( 'ユニークなID', 繰り返し可能か, カスタムフィールドの配列 );

	if($type === 'theme-options'){
		//表示名
		$Setting_name->add_group( 'name-cf', false, array(
			array(
				'name'    => 'name-about',
				'label'   => 'ABOUT 表示名',
				'type'    => 'text',
				'default' => 'ABOUT',
			),
			array(
				'name'    => 'name-works',
				'label'   => 'WORKS 表示名',
				'type'    => 'text',
				'default' => 'WORKS',
			),
			array(
				'name'    => 'name-news',
				'label'   => 'NEWS 表示名',
				'type'    => 'text',
				'default' => 'NEWS',
			),
			array(
				'name'    => 'name-blog',
				'label'   => 'BLOG 表示名',
				'type'    => 'text',
				'default' => 'BLOG',
			),
			array(
				'name'    => 'name-contact',
				'label'   => 'CONTACT 表示名',
				'type'    => 'text',
				'default' => 'CONTACT',
			),
		) );
		$settings[] = $Setting_name;
		
		//SNS設定
		$Setting_sns->add_group( 'sns-cf', false, array(
			array(
				'name'    => 'sns-facebook',
				'label'   => 'Facebook URL',
				'type'    => 'text',
			),
			array(
				'name'    => 'sns-twitter',
				'label'   => 'Twitter URL',
				'type'    => 'text',
			),
			array(
				'name'    => 'sns-instagram',
				'label'   => 'Instagram URL',
				'type'    => 'text',
			),
		) );
		$settings[] = $Setting_sns;
		
		//フッター設定
		$Setting_footer->add_group( 'footer-cf', false, array(
			array(
				'name'    => 'footer-copyright',
				'label'   => 'フッターコピーライト',
				'type'    => 'text',
			),
		) );
		$settings[] = $Setting_footer;
		
		//サムネイル設定
		$Setting_default_thumb->add_group( 'default-thumb-cf', false, array(
			array(
				'name'    => 'default-thumb',
				'label'   => 'デフォルトサムネイル画像',
				'type'    => 'image',
			),
		) );
		$settings[] = $Setting_default_thumb;
		
		//トップページスライダー設定
		$Setting_top_slider->add_group( 'top-slider-cf', true, array(
			array(
				'name'    => 'top-slider-image',
				'label'   => 'トップページ　スライダー画像',
				'type'    => 'image',
			),
		) );
		$settings[] = $Setting_top_slider;
		
		//トップページコンテンツ設定
		$Setting_top_contents->add_group( 'top-page-cf', false, array(
			array(
				'name'  => 'top-check-list',
				'label' => 'トップページに表示する項目',
				'type'  => 'check',
				'choices' => array(
					'about'  => 'ABOUT',
					'works'  => 'WORKS',
					'news' => 'NEWS',
					'blog' => 'BLOG',
					'contact' => 'CONTACT',
				),
				'default' => array(
					'about', 'works', 'news', 'contact'
				),
			),
			array(
				'name'  => 'top-about-text',
				'label' => 'トップページ　ABOUTテキスト',
				'type'  => 'textarea',
			),
			array(
				'name'    => 'top-about-image',
				'label'   => 'トップページ　ABOUT画像',
				'type'    => 'image',
			),
			array(
				'name'  => 'top-works-text',
				'label' => 'トップページ　WORKSテキスト',
				'type'  => 'textarea',
			),
			array(
				'name'    => 'top-works-image',
				'label'   => 'トップページ　WORKS画像',
				'type'    => 'image',
			),
			array(
				'name'    => 'top-news-image',
				'label'   => 'トップページ　NEWS画像',
				'type'    => 'image',
			),
			array(
				'name'    => 'top-blog-image',
				'label'   => 'トップページ　BLOG画像',
				'type'    => 'image',
			),
			array(
				'name'  => 'top-contact-text',
				'label' => 'トップページ　CONTACT ショートコード貼り付け',
				'type'  => 'text',
			),
			array(
				'name'    => 'top-contact-image',
				'label'   => 'トップページ　CONTACT画像',
				'type'    => 'image',
			),
		) );

		$settings[] = $Setting_top_contents;
		
		//ABOUTページ情報
		$Setting_about->add_group( 'about-cf', false, array(
			array(
				'name'  => 'company-about-image',
				'label' => 'ABOUTページ ABOUT US画像',
				'type'  => 'image',
			),
			array(
				'name'  => 'company-about-title',
				'label' => 'ABOUTページ ABOUT US表示名',
				'type'  => 'text',
				'default' => 'ABOUT US',
			),
			array(
				'name'  => 'company-about-text',
				'label' => 'ABOUTページ ABOUT USテキスト',
				'type'  => 'wysiwyg',
			),
			array(
				'name'  => 'company-concept-image',
				'label' => 'ABOUTページ CONCEPT画像',
				'type'  => 'image',
			),
			array(
				'name'  => 'company-concept-title',
				'label' => 'ABOUTページ CONCEPT表示名',
				'type'  => 'text',
				'default' => 'CONCEPT',
			),
			array(
				'name'  => 'company-concept-text',
				'label' => 'ABOUTページ CONCEPTテキスト',
				'type'  => 'wysiwyg',
			),
			array(
				'name'  => 'company-info-title',
				'label' => 'ABOUTページ COMPANY表示名',
				'type'  => 'text',
				'default' => 'COMPANY',
			),
			array(
				'name'  => 'company-info-name',
				'label' => 'ABOUTページ 会社情報（会社名）',
				'type'  => 'text',
			),
			array(
				'name'  => 'company-info-address',
				'label' => 'ABOUTページ 会社情報（所在地）',
				'type'  => 'text',
			),
			array(
				'name'  => 'company-info-tel',
				'label' => 'ABOUTページ 会社情報（TEL）',
				'type'  => 'text',
			),
			array(
				'name'  => 'company-info-map',
				'label' => 'ABOUTページ 会社情報Google Map URL  埋め込みの<iframe src=の中のURLを入力してください。',
				'type'  => 'text',
				'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7477985372934!2d139.74323885148385!3d35.65858483872239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bbd9009ec09%3A0x481a93f0d2a409dd!2z5p2x5Lqs44K_44Ov44O8!5e0!3m2!1sja!2sjp!4v1534051580503',
			),
		) );
		$settings[] = $Setting_about;

		//ABOUTページ企業情報項目
		$Setting_about_items->add_group( 'about-items-cf', true, array(
			array(
				'name'  => 'company-info-item-name',
				'label' => '会社情報 追加項目名',
				'type'  => 'text',
			),
			array(
				'name'  => 'company-info-item-text',
				'label' => '会社情報 追加項目内容',
				'type'  => 'text',
			),
		) );
		$settings[] = $Setting_about_items;

		
		return $settings;
	}
}
add_filter( 'smart-cf-register-fields', 'the_architect_register_fields', 10, 4 );


/**
 * @param string $page_title ページのtitle属性値
 * @param string $menu_title 管理画面のメニューに表示するタイトル
 * @param string $capability メニューを操作できる権限（maange_options とか）
 * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
 * @param string|null $icon_url メニューに表示するアイコンの URL
 * @param int $position メニューの位置
 */
SCF::add_options_page( '初期設定', '初期設定', 'manage_options', 'theme-options' );
