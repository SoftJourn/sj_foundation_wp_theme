<?php

add_action( 'wp_enqueue_scripts', 'wp_sj_enqueue' );
add_theme_support( 'post-thumbnails' );

function wp_sj_enqueue() {
    wp_enqueue_script( 'wp-api' );
    wp_localize_script(
        'wp-api',
        'wpApiSettings',
        array(
            'root' => esc_url_raw( rest_url() ),
            'nonce' => wp_create_nonce( 'wp_rest' ),
            'user' => wp_get_current_user(),
            'logout_link' => wp_logout_url('/'),
        )
    );
}

update_option( 'permalink_structure', '/%postname%/' );