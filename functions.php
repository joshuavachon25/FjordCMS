<?php
    //include 'customs/NameOfYourCustomPostType.php';

    add_filter( 'allowed_block_types', 'cyberfjord_allowed_block_types' );
 
    function cyberfjord_allowed_block_types( $allowed_blocks ) {
      
      return array(
        'core/image',
        'core/paragraph',
        'core/heading',
        'core/quote',
        'core/list'
      );
     
    }
?>
