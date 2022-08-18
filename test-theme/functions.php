<?php
var $ps_headlibs=[
    'bootstrap@5.2.0'=>'<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">',
    'jquery@3.6.0'=>'<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>',
    'ionicons@2.0.1'=>'<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" crossorigin="anonymous" defer>'
];
var $ps_footerlibs=[
    'bootstrap@5.2.0'=>'<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous" defer></script>'
];
function $ps_ioniconsLoad($version): {
    if ( !have_posts() && is_search() ) print($ps_headlibs[$version]);
}
add_action( 'wp_head', $ps_headlibs['bootstrap@5.2.0']);
add_action( 'wp_head', $ps_headlibs['jquery@3.6.0'], 2);
add_action( 'wp_head', $ps_ioniconsLoad('ionicons@2.0.1'));
add_action( 'wp_footer', $ps_footerlibs['bootstrap@5.2.0'],11);



?>