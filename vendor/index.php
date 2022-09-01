<?php

/**
 * Kirki Plugin Admin Notice Dismiss
 */
add_action( 'admin_notices', 'bring_back_plugin_dismiss_notice' );
function bring_back_plugin_dismiss_notice() {
    global  $pagenow;
    if( $pagenow == 'customize.php' ) :
        $user_id = get_current_user_id();
        if ( !get_user_meta( $user_id, 'bring_back_kirki_plugin_dismissed' ) )
            echo '<p class="dismiss-button"><a href="?bring_back_kirki_dismissed">'.esc_html( 'Dismiss' ).'</a></p>';
    endif;
}
add_action( 'admin_init', 'bring_back_kirki_plugin_dismissed' );

function bring_back_kirki_plugin_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['bring_back_kirki_dismissed'] ) )
        add_user_meta( $user_id, 'bring_back_kirki_plugin_dismissed', 'true', true );
}
