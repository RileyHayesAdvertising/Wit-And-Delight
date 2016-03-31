<form method="get" action="<?php echo home_url( '/' ); ?>" role="search">
    <fieldset>
        <label for="s">Search</label>
        <input type="search" id="s" name="s" placeholder="Enter..." value="<?php the_search_query(); ?>" autocomplete="on" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" />
        <button type="submit">Search</button>
    </fieldset>
</form>