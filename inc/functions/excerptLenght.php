<?php 
function excerptLenght( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'excerptLenght', 999 );
?>