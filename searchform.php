<form action="<?php echo esc_url(home_url('/')); ?>" role="search" method="get">
  <input type="search" name="s" placeholder="Search" value="<?php echo esc_attr(get_search_query() );?>">
  <button type="submit">Search</button>
</form>