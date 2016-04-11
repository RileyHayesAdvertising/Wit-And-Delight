<form method="get" action="<?php echo home_url( '/' ); ?>" role="search">
    <label for="s" class="isVisuallyHidden">Search</label>
    <div class="pill">
        <div class="pill-section">
            <input class="input input_violator" type="text" id="s" name="s" placeholder="Enter..." value="<?php the_search_query(); ?>" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" />
        </div>
        <div class="pill-section pill-section_fill">
            <button class="btn" type="submit">Search</button>
        </div>
    </div>
</form>