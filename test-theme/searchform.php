<form
	action="<?php echo esc_attr( home_url( '/' ) ); ?>"
	method="get">

	<input
		class="form-control"
		type="search"
		name="s"
		placeholder="Search..."
		minlength="3"
		maxlength="80"
		aria-label="Search"
		required
		value="<?php echo esc_attr( get_search_query() ); ?>">

	<button
		type="submit"
		aria-label="Submit">
	</button>

</form>
