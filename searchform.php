<form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
<div class="input-group">
	<label for="s" class="search-label screen-reader-text"><?php _e('Search:', 'lights'); ?></label> <input name="s" id="s" class="search-input" type="text" placeholder="Search...">
    <button type="submit" class="search-submit button button-primary" value="<?php _e('Search', 'lights'); ?>">Search</button>
    </div>
</form>