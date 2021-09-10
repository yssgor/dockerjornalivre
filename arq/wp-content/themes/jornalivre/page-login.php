<?php require_once 'header.php'; ?>

<?php
if ( ! is_user_logged_in() ) { // Display WordPress login form:
    $args = array(
        'redirect' => home_url(), 
        'form_id' => 'loginform-custom',
        'label_username' => __( 'Nome de usuario' ),
        'label_password' => __( 'Password' ),
        'label_remember' => __( 'Lembre-me' ),
        'label_log_in' => __( 'Log In' ),
        'remember' => true
    );
    wp_login_form( $args );
} else { // If logged in:
    wp_loginout( home_url() ); // Display "Log Out" link.
    echo " | ";
    wp_register('', ''); // Display "Site Admin" link.
}
?>

<?php require_once 'footer.php'; ?>
