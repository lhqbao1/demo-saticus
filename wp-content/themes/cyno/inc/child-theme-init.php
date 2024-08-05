<?php
// Prevent direct access.
if (!defined('ABSPATH'))
	exit;


/**
 * Child Theme Initialize
 *
 */
class Child_Theme_Init
{
	/**
	 * Child Theme Init constructor.
	 */
	public function __construct()
	{

		$this->load_dependency();

		add_action('after_setup_theme', array($this, 'load_child_theme_language'), 99);
		add_action('wp_enqueue_scripts', [$this, 'load_assets'], 30);
		add_action('login_head',  [$this, 'login_css']);

		add_filter('use_block_editor_for_post', '__return_false', 10);
		add_filter('use_widgets_block_editor', '__return_false');
	}

	/**
	 * Check local environment
	 *
	 * @return bool
	 */
	public function is_localhost()
	{
		return !empty($_SERVER['HTTP_X_CYNO_THEME_HEADER']) && $_SERVER['HTTP_X_CYNO_THEME_HEADER'] === 'development';
	}

	/**
	 * Load dependency
	 *
	 * @return bool
	 */
	public function load_dependency()
	{
		// Load admin
		include_once THEME_INCLUDES_DIR . '/admin.php';

		// Load global
		include_once THEME_INCLUDES_DIR . '/global.php';
		include_once THEME_INCLUDES_DIR . '/taxonomy.php';
		include_once THEME_INCLUDES_DIR . '/widgets.php';


		// Load short code
		include_once THEME_INCLUDES_DIR . '/shortcodes/related-posts.php';
		include_once THEME_INCLUDES_DIR . '/shortcodes/home-banner.php';
		include_once THEME_INCLUDES_DIR . '/shortcodes/custom-accordion.php';
	}

	public function load_child_theme_language()
	{
		load_child_theme_textdomain('flatsome', get_stylesheet_directory() . '/languages/flatsome');
		load_child_theme_textdomain('cyno', get_stylesheet_directory() . '/languages');
	}

	/**
	 * Enqueue assets
	 *
	 * @return void
	 */
	public function load_assets()
	{
		$theme_environment = $this->is_localhost() ? '' : '.min';
		if (!$this->is_localhost()) :
			wp_enqueue_style('frontend-css', THEME_ASSETS_URI . '/css/frontend' . $theme_environment . '.css', array(), THEME_VERSION);
		endif;
		wp_enqueue_script('frontend-js', THEME_ASSETS_URI . '/js/frontend' . $theme_environment . '.js', array(), THEME_VERSION, true);
		//wp_enqueue_script('lazysizes-js', THEME_VENDOR_ASSETS_URI . '/lazysizes/lazysizes.min.js', array(), THEME_VERSION, true);
	}

	function login_css()
	{
		wp_enqueue_style('login-css', THEME_ASSETS_URI . '/css/login.min.css');
	}
}

new Child_Theme_Init();
