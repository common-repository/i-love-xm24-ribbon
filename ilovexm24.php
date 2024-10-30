<?php
/*
Plugin Name: Wordpress I love Xm24 Ribbon
Plugin URI: https://git.lattuga.net/hacklabbo/wordpress_ilovexm24_ribbon
Description:
Version: 0.0.4
Author: Hacklabbo
Author URI: http://www.ecn.org/xm24
License: GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: ilovexm24

@author		 HAcklabbo
@category  social
@package	 Wordpress I love Xm24 Ribbon
@since		 0.0.1

Wordpress I love Xm24 ribbon come from a void's idea. A Plugin for WordPress.
Copyright (C) 2017 Hacklabbo -

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/gpl-3.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;

class Xm24_Ribbon {
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( &$this, 'ilovexm24_load_scripts' ));
	}

	public function getHtmlRibbon() {
		$xm24_url = 'http://www.ecn.org/xm24';
		$xm24_text = 'I <span class="love">&#9829;</span> XM24';
		$xm24_title = 'Solidarietà ad Xm24 a rischio di sgombero!';

		$ribbon = '<div class="ilovexm24_content">'.
								'<a title="'.$xm24_title.'" class="ilovexm24_link" target="_blank" href="'.$xm24_url.'">'.
									$xm24_text.
								'</a>'.
							'</div>';

		return $ribbon;
	}

	public function ilovexm24_load_scripts(){
    wp_register_style( 'ilovexm24', plugins_url( 'css/ilovexm24.css', __FILE__), false, true );
	  wp_enqueue_style( 'ilovexm24' );

		wp_register_script( 'ilovexm24', plugins_url('js/ilovexm24.js', __FILE__), false, false, true);
		wp_enqueue_script( 'ilovexm24');

		$attrs = Array(
    	'ribbon' => $this->getHtmlRibbon()
  	);

	  wp_localize_script( 'ilovexm24', 'attrs', $attrs );
	}
}

$xm24r = new Xm24_Ribbon();
