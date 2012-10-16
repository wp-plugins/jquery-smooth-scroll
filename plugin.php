<?php/*Plugin Name: jQuery Smooth ScrollPlugin URI: http://www.blogsynthesis.com/wordpress-jquery-smooth-scroll-plugin/Description: This plugin makes all ancher links to scroll smoothly and adds back to top link or button.Author: BlogSynthesisAuthor URI: http://www.blogsynthesis.com/Version: 1.1.03*//*  Copyright 2012 Anand Kumar (blogsynthesis.com)  This program is free software; you can redistribute it and/or modify  it under the terms of the GNU General Public License, version 2, as   published by the Free Software Foundation.  This program is distributed in the hope that it will be useful,  but WITHOUT ANY WARRANTY; without even the implied warranty of  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the  GNU General Public License for more details.  You should have received a copy of the GNU General Public License  along with this program; if not, write to the Free Software  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA    Kindly check README.txt for more details about the plugin.*/class BlogSynthesisSmoothScroll {	/*--------------------------------------------*	 * Constants	 *--------------------------------------------*/	 	 	const name = 'BlogSynthesis Scroll to Top';	const slug = 'blogsynthesis-scroll-to-top';	/*--------------------------------------------*	 * Constructor	 *--------------------------------------------*/	function __construct() {	    // Define constants used throughout the plugin	    $this->init_plugin_constants();  		load_plugin_textdomain( 'blogsynthesis', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );    	// Load JavaScript and stylesheets    	$this->register_scripts_and_styles();		// Plugin Actions	    	    add_action( 'wp_footer', array( $this, 'display_link' ) );    	} // end constructor	/*--------------------------------------------*	 * Core Functions	 *---------------------------------------------*/	function display_link() {		?>		<a id="scroll-to-top" href="#" title="<?php _e('Scroll to Top','blogsynthesis'); ?>"><?php _e('Top','blogsynthesis'); ?></a>		<?php	} 	  	  	/*--------------------------------------------*	 * Private Functions	 *---------------------------------------------*/   	// Initializes constants used for convenience throughout the plugin.	private function init_plugin_constants() {		if ( !defined( 'PLUGIN_NAME' ) ) {		  define( 'PLUGIN_NAME', self::name );		} 		if ( !defined( 'PLUGIN_SLUG' ) ) {		  define( 'PLUGIN_SLUG', self::slug );		} 	} // end init_plugin_constants	// Registers and enqueues stylesheets	private function register_scripts_and_styles() {		if ( is_admin() ) {			// no admin styes or scripts		} else { 			$this->load_file( self::slug . '-script', '/js/jss-script.min.js', true );			$this->load_file( self::slug . '-style', '/css/jss-style.min.css' );		} // end if/else	} // end register_scripts_and_styles	// Helper function for registering and enqueueing scripts and styles.	private function load_file( $name, $file_path, $is_script = false ) {		$url = plugins_url($file_path, __FILE__);		$file = plugin_dir_path(__FILE__) . $file_path;		if( file_exists( $file ) ) {			if( $is_script ) {				wp_register_script( $name, $url, array('jquery') );				wp_enqueue_script( $name );			} else {				wp_register_style( $name, $url );				wp_enqueue_style( $name );			} // end if		} // end if    	} // end load_file    } // end classnew BlogSynthesisSmoothScroll();