<?php
	$navItems = $controller->getNavItems();

	/*** STEP 1 of 2: Determine all CSS classes (only 2 are enabled by default, but you can un-comment other ones or add your own) ***/
	foreach ($navItems as $ni) {
		$classes = array();

		if ($ni->isCurrent) {
			//class for the page currently being viewed
			$classes[] = 'active';
		}

		if ($ni->inPath) {
			//class for parent items of the page currently being viewed
			$classes[] = 'active';
		}

		//Put all classes together into one space-separated string
		$ni->classes = implode(" ", $classes);
		
		// check if is not home page and get path (if is child then get parent path)
		if(!$ni->isHome){
			$activeP = explode('/', $ni->url);
			$ni->pHandle = $activeP[1];
		}
	}

	//*** Step 2 of 2: Output menu HTML ***/
	echo '<ul class="header_menu nav clearfix">'; //opens the top-level menu

	foreach ($navItems as $ni) {

		echo '<li data-phandle="'.$ni->cObj->vObj->cvHandle.'">'; //opens a nav item
		
		echo '<a href="' . $ni->url . '" target="' . $ni->target . '" data-phandle="'.$ni->cObj->vObj->cvHandle.'">' . $ni->name . '<span>&nbsp;</span></a>';

		if ($ni->hasSubmenu) {
			echo '<ul class="submenu" >'; //opens a dropdown sub-menu
		} else {
			echo '</li>'; //closes a nav item
			echo str_repeat('</ul></li>', $ni->subDepth); //closes dropdown sub-menu(s) and their top-level nav item(s)
		}
	}

	echo '</ul>'; //closes the top-level menu
	

    //get path (if is child then get parent path)
    $activeP = explode('/', Page::getCurrentPage()->cPath);
    $x = count($activeP)-1;
    $activePage = $activeP[ $x ];

    for( $i = 1;$i< $x ; $i++ ):
            $inPath[] = $activeP[ $i ];
    endfor;
?>






<script type="text/javascript">
	$(document).ready(function(){
		var navLinks = $('.header_menu');
		var pHandle = '<?= $activePage; ?>';
		var inPath = {};
		<?php
			if(count($inPath)):
                            $counter = 0;
                            foreach ($inPath as $pag):
                ?>
                inPath['<?= $counter ?>'] = '<?= $pag;?>'; 
                            <?php
                            $counter++;
                            endforeach;
			endif;
		?>
		$(inPath).each(function(i,r){
			var inPathPage = navLinks.find("[data-phandle='" + inPath[i] + "']");
			inPathPage.addClass('nav-path-selected');
		});
		var active = navLinks.find("[data-phandle='" + pHandle + "']");
		active.addClass('active');
	})
</script>