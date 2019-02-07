<?php
	function yourstheme_menu_link_attributes( $args ) {
		global $wp;
		$current_url = untrailingslashit(add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $wp->request ) ) );
		$href = untrailingslashit( $args['href']);

		if($current_url == $href)
			$args['href'] = '';	
		return $args;
	}
	add_filter( 'nav_menu_link_attributes', 'yourstheme_menu_link_attributes' );