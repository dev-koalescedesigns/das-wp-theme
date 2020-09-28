<?php

use Walker_Nav_Menu;

class megaMenu extends Walker_Nav_Menu {
	//start_el function
	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0){
		$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
		$permalink = $item->url;

		/*
		if($depth == 2){ //Test to make columns
			$output .= "<div class='column'>";
		}*/

		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";

		if( $permalink) {
			if($title == 'Accessories - Image'){	//THIS NEEDS TO BE THE TITLE OF THE IMAGE IN MENU
				$output .= '<img src="' . $permalink . '">';
			} else {
				$output .= '<a href="' . $permalink . '">';
				$output .= $title;
			}
		} else {
			$output .= '<span>';	
			$output .= $title;
		}

		if( $description != '' && $depth == 0 ) {
			$output .= '<span class="description">' . $description . '</span>';
		}

		if( $permalink) {
			if($title == 'Accessories - Image'){
				$output .= '</img>';
			} else {
				$output .= '</a>';
			}
			
		} else {
			$output .= '</span>';
		}

		/*
		if($depth == 2){
			$output .= "</div>";
		} */

	}

}