<aside>
	<ul class="sidebar---posts-list">
	<?php
	$ps_cat_ids=[];
	foreach (get_the_category() as $v) array_push($ps_cat_ids,$v->cat_ID);
	$ps_query = new WP_Query([
		'category__in' => $ps_cat_ids,
		'post__not_in'=>[0=>the_ID()],
		'orderby'=>['date'=>'DESC'],
		'posts_per_page' => 3
	]); 
	while ( $ps_query->have_posts() ) {
		$ps_query->the_post();
		print('<li><a class="sidebar--posts-list-item" href="'.get_the_permalink().'">'.get_the_title().'</a></li>');
	}
	?>
	</ul>
</aside>
