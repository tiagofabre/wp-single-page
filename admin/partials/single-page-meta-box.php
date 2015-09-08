<?php
    
     /**
     *
     *              Meta box
     *
     */
    function wp_sp_partial_page() {
        add_meta_box( 'prfx_meta', __( 'Partial single page', '@wpsp' ), 'wp_sp_partial_page_callback', 'page', 'side', 'high' );
    }
    add_action( 'add_meta_boxes', 'wp_sp_partial_page' );
    
    /**
    * Outputs the content of the meta box
    */
    function wp_sp_partial_page_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
        $prfx_stored_meta = get_post_meta( $post->ID );
        ?>
        <span class="prfx-row-title"><?php _e( 'Check if this is a partial single page: ', '@wpsp' )?></span>
        <div class="prfx-row-content">
            <label for="parital-single-page">
                <input type="checkbox" name="parital-single-page" id="parital-single-page" value="yes" <?php if ( isset ( $prfx_stored_meta['parital-single-page'] ) ) checked( $prfx_stored_meta['parital-single-page'][0], 'yes' ); ?> />
                <?php _e( 'Featured Item', '@wpsp' ) ?>
            </label>

        </div>
        <?php
    }
    
    /**
     * Saves the custom meta input
     */
    function prfx_meta_save( $post_id ) {
    
        // Checks save status - overcome autosave, etc.
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    
        // Exits script depending on save status
        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }
    
    // Checks for input and saves - save checked as yes and unchecked at no
    if( isset( $_POST[ 'parital-single-page' ] ) ) {
        update_post_meta( $post_id, 'parital-single-page', 'yes' );
    } else {
        update_post_meta( $post_id, 'parital-single-page', 'no' );
    }
    
    }
    add_action( 'save_post', 'prfx_meta_save' );
?>
