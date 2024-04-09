<?php

add_filter( 'aws_searchbox_markup', 'my_aws_searchbox_markup' );
function my_aws_searchbox_markup( $markup ) {
    $markup = preg_replace( '/<svg([\s\S]*?)<\/svg>/', 'NEW_SVG_MARKUP', $markup );
    return $markup;
}