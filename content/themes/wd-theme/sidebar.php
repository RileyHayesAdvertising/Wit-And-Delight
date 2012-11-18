<div class="panel">
    <h2 class="hdg hdg_4">
        <span class="hdg-split">Discovering the</span>
        <span class="hdg-split">Wit and Delight</span>
    </h2>
    <ul>
        <li><a href="/?cat=14">Fashion</a></li>
        <li><a href="/?cat=18">Design</a></li>
        <li><a href="#">Products</a></li> <!-- TODO Category Add Link (cat doesn't exist) -->
        <li><a href="/?cat=5">Oddities</a></li>
    </ul>
</div>
<div class="panel">
    <h2 class="hdg hdg_4">See Categories</h2> <!-- TODO Make categories expandible / collapsible -->
    <ul>
        <?php wp_list_categories('orderby=count&order=desc&style=list&number=10&title_li='); ?>
    </ul>
    <h2 class="hdg hdg_4">See Tags</h2> <!-- TODO Make tags expandible / collapsible -->
    <ul>
        <li><a href="#">Tag Name</a></li> <!-- TODO Display All Tags with links -->
        <li><a href="#">Tag Name</a></li>
        <li><a href="#">Tag Name</a></li>
        <li><a href="#">Tag Name</a></li>
        <li><a href="#">Tag Name</a></li>
        <li><a href="#">Tag Name</a></li>
        <li><a href="#">Tag Name</a></li>
        <li><a href="#">Tag Name</a></li>
        <li><a href="#">Tag Name</a></li>
        <li><a href="#">Tag Name</a></li>
        <li><a href="#">Tag Name</a></li>
        <li><a href="#">Tag Name</a></li>
        <li><a href="#">Tag Name</a></li>
    </ul>
</div>
<div class="panel">
    <h2 class="hdg hdg_4">Favorite Things</h2> <!-- TODO Wire up favorite thing plugin -->
    <img src="//placehold.it/232x120" alt="" /> <!-- TODO Remove placeholder -->
</div>
<div class="panel">
    <h2 class="isHidden">Contact Info</h2>
    <ul>
        <li><a href="mailto:witanddelight@gmail.com">witanddelight@gmail.com</a></li>
        <li><a href="tel:612-845-6858">612 845 6858</a></li>
        <li><a href="#">Linked In</a></li> <!-- TODO Add Link -->
        <li><a href="#">Behance</a></li> <!-- TODO Add Link -->
        <li><a href="#">Dribbble</a></li> <!-- TODO Add Link -->
    </ul>
</div>