<?php
	/**
		* Plugin Name: Param Iframe Generator
		* Plugin URI: http://www.frndzit.com/param-iframe-generator
		* Description: This is plugin for creating iframe by current page get url parameter.
		* Version: 1.0.1
		* Author: Tj Thouhid
		* Author URI: https://www.tjthouhid.com
		* License: A "Slug" license name e.g. GPL12
	**/
	function param_iframe_generator( $atts ) {
		$atts = shortcode_atts( array(
			'url' => 'https://www.example.com',
			'iframe-width' => '400px',
			'iframe-height' => '400px' 
	
		), $atts, 'param_iframe_generator' );
			ob_start();
			$str="";
		    if(isset($_GET)){
		    	foreach ($_GET as $key => $value) :
		    		if($str==""){
		    			$str.="?";
		    		}else{
		    			$str.="&";
		    		}
		    		$str.=$key."=".$value;
		    	endforeach;
		    }
		    echo "<iframe src='".$atts['url'].$str."' width='".$atts['iframe-width']."' height='".$atts['iframe-height']."' ></iframe>";
		    

		     $content = ob_get_clean();
		 	return $content;
	}
	add_shortcode( 'param-iframe-generator', 'param_iframe_generator' );
