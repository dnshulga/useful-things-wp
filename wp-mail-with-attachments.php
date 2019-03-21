<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") :
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );


    if ( ! function_exists( 'wp_handle_upload' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }

    $name   = !empty($_POST['name']) ? 'Name: '.$_POST['name'].'<br/>' : '';

    $to = get_option('admin_email'); 

    $subject = 'Form with attachments';

    $body = $name;

    $headers = array(
        'From: Omko Website <noreply@domain.com>',
        'content-type: text/html'
    );

    $uploadedfile       = $_FILES['file'];
    $upload_overrides   = array( 'test_form' => false );
    $movefile           = wp_handle_upload( $uploadedfile, $upload_overrides );

    if( $movefile ) {
        $attachments = $movefile[ 'file' ];
        $res = wp_mail($to, $subject, $body, $headers, $attachments);
    } else {
        echo "Possible file upload attack!";
    }   

    if ($res) {
        echo 'success';
    }
    else {
        echo 'error';
    }
else :
    http_response_code(403);
    echo "Access Denied";
endif;