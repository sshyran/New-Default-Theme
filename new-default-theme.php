<?php

class GP_New_Default_Theme extends GP_Plugin {
	public $id = 'new_default_theme';
	private $child_path;

	public function __construct() {
		parent::__construct();

		$this->add_action( 'plugins_loaded' );
		$this->add_filter( 'tmpl_load_locations', array( 'args' => 4 ) );
	}

	public function plugins_loaded() {
		$this->child_path = dirname( __FILE__ ) . '/templates/';

		if ( file_exists( $this->child_path . 'helper-functions.php' ) ) {
			require_once $this->child_path . 'helper-functions.php';
		}
	}

	public function tmpl_load_locations( $locations, $template, $args, $template_path ) {
		array_unshift( $locations, $this->child_path );

		return $locations;
	}

}

GP::$plugins->new_default_theme = new GP_New_Default_Theme;