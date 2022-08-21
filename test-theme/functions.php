<?php
//variables
$ps_headlibs=[
    'bootstrap@5.2.0'=>'<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">',
    'jquery@3.6.0'=>'<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>',
    'ionicons@2.0.1'=>'<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" crossorigin="anonymous" defer>'
];
$ps_footerlibs=[
    'bootstrap@5.2.0'=>'<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous" defer></script>'
];
//functions
function ps_printFunc($arr,$key){ //return callable to print value
    $v='';
    if (!!$arr && !!$key) $v=$arr[$key];
    return function() use ($v){ print($v);};
}
function ps_ioniconsLoad($version=null) { //append Ionicons condition
    $v='';
    if ( !have_posts() && is_search() ) $v=$version;
    return ps_printFunc($ps_headlibs,$version);
}
function ps_dateFilter($date,$format,$post) { //modify date output condition
    if (!$post->post_modified) return $date;
    return date_i18n($format, strtotime($post->post_modified_gmt), true);
}
function ps_updateTermsOutput($term_list,$taxonomy) { //modify category output
    return get_the_term_list(the_ID(), $taxonomy, '', ', ', '');
}
function ps_taxonomyOrderFilter($query){ // change order of taxonomy query
    if (
        !is_admin() &&
        $query->is_main_query() &&
        !$query->is_tax('category') &&
        !$query->is_tax('tag')
    ) $query->set('orderby',['modified'=>'ASC']);
}
function ps_404rw(){ // enforce 404
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
}
//action hooks
add_action( 'wp_head', ps_printFunc($ps_headlibs,'bootstrap@5.2.0'));
add_action( 'wp_head', ps_printFunc($ps_headlibs,'jquery@3.6.0'), 2);
add_action( 'wp_head', ps_ioniconsLoad('ionicons@2.0.1'));
add_action( 'wp_footer', ps_printFunc($ps_footerlibs,'bootstrap@5.2.0'),11);
add_action( 'pre_get_posts', 'ps_taxonomyOrderFilter', 99, 1);
?>