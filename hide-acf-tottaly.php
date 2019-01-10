<?php
/*Hide ACF Tottally*/

add_filter('acf/settings/show_admin', '__return_false');

function pands_admin_colors() {
   echo '<style type="text/css">
           h2.hndle.ui-sortable-handle a.acf-hndle-cog { display: none; visibility: hidden }
         </style>';
}

add_action('acf/input/admin_head', 'pands_admin_colors');

function disallowed_acf_page() {

    global $pagenow;

    if ($pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'acf-field-group') {
        wp_redirect(admin_url(), 301);
        exit;
    }

    $type = get_post_type($_GET['post']);
    if ($type == 'acf-field-group') {
        wp_redirect(admin_url(), 301);
        exit;
    }

}
add_action( 'admin_init', 'disallowed_acf_page' );

?>