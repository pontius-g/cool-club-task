<article class="post">
    <header>
        <h1 class="post--title"><?php
        print(get_the_title());
        //filter hooks
        add_filter('get_the_date', 'ps_dateFilter', 10, 3);
        add_filter('the_terms', 'ps_updateTermsOutput',10,2);
        ?></h1>
        <p class="post--date"><?php print(get_the_date('M jS, Y')) ?></p>
        <p class='post--categories'><?php var_dump(get_the_terms(the_ID(), 'category'))?></p>
        <p class="post--author"><?php
            $ps_authorLastName=get_the_author_meta('last_name');
            $ps_authorFirstName=get_the_author_meta('first_name');
            $ps_authorRoles=get_user_by('id', get_the_author_meta('ID'))->roles;
            var_dump($ps_authorRoles);
            print((!!$ps_authorLastName&&!!$ps_authorFirstName)? $ps_authorFirstName." ".$ps_authorLastName:get_the_author_meta('display_name'));
            if(in_array('administrator',$ps_authorRoles,true)) print('<span class="post--author-role">'.implode(', ',$ps_authorRoles).'</span>');
            remove_filter('get_the_date', 'ps_dateFilter', 10);
            remove_filter('the_terms', 'ps_updateTermsOutput',10);
        ?></p>
    </header>
    <div class="post--content"><?php the_content()?></div>
    <footer>
        <div class="post--nav-prev"><?php previous_post_link('&laquo; %link', 'предыдущий', true)?></div>
        <div class="post--nav-prev"><?php next_post_link('%link &raquo;', 'следующий', true)?></div>
    </footer>
</article>