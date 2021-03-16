<?php
/**
 * The template for displaying search forms
 *
 */
?>
<form action="<?php bloginfo('url'); ?>/" method="get" class="search-form">
    <div class="search-table">
      <div class="search-row">
        <div class="search-cell1">
          <input type="text" id="search-site" value="" placeholder="Search Website..." name="s" class="search-text" title="Search Website..." tabindex="-1" aria-label="Search Website...">
        </div>
        <div class="search-cell2">
          <input class="search-submit" alt="Search" title="Search" value="" type="submit" tabindex="-1" aria-label="Search">
        </div>
        <div class="search-cell3">
          <a href="#" target="_blank" class="search-link search-exit active" tabindex="-1" aria-label="Close Search Module"><img src="img/ico-exit.svg" alt="Exit" title="Exit"></a>
        </div>
      </div>
    </div>
</form> 
            
            
