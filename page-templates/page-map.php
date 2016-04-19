<?php
/**
 * Template Name: Map
 */

get_header(); ?>

	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

			
<?php
	
	$listArray = array();
	$numArray = array();

	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'=>'market',
		'posts_per_page' => -1
	));
	if ($wp_query->have_posts()) : ?>
	
    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

    $numProp = get_field('number_of_properties');
    $desc = get_field('description');
    $title = get_the_title();
    
    // Set the class based off if there are properties
    if($numProp != '') {
    	$class = 'yes';
    } else {
    	$class = 'no-properties';
    }

    // Set the states variables
    if($title == 'Alabama') {$dataState = 'al';$letter = 'A';
    } elseif($title == 'Alaska') {$dataState = 'ak';$letter = 'B';
	} elseif($title == 'Arkansas') {$dataState = 'ar';$letter = 'C';
	} elseif($title == 'Arizona') {$dataState = 'az';$letter = 'D';
	} elseif($title == 'California') {$dataState = 'ca';$letter = 'E';
	} elseif($title == 'Colorado') {$dataState = 'co';$letter = 'F';
	} elseif($title == 'Connecticut') {$dataState = 'ct';$letter = 'G';
	} elseif($title == 'Delaware') {$dataState = 'de';$letter = 'H';
	} elseif($title == 'DC') {$dataState = 'dc';$letter = 'I';
	} elseif($title == 'Georgia') {$dataState = 'ga';$letter = 'J';
	} elseif($title == 'Florida') {$dataState = 'fl';$letter = 'K';
	} elseif($title == 'Hiawai') {$dataState = 'hi';$letter = 'L';
	} elseif($title == 'Idaho') {$dataState = 'id';$letter = 'M';
	} elseif($title == 'Illinois') {$dataState = 'il';$letter = 'N';
	} elseif($title == 'Indiana') {$dataState = 'in';$letter = 'O';
	} elseif($title == 'Iowa') {$dataState = 'ia';$letter = 'P';
	} elseif($title == 'Kansas') {$dataState = 'ks';$letter = 'Q';
	} elseif($title == 'Kentucky') {$dataState = 'ky';$letter = 'R';
	} elseif($title == 'Louisiana') {$dataState = 'la';$letter = 'S';
	} elseif($title == 'Maine') {$dataState = 'me';$letter = 'T';
	} elseif($title == 'Maryland') {$dataState = 'md';$letter = 'U';
	} elseif($title == 'Massachusetts') {$dataState = 'ma';$letter = 'V';
	} elseif($title == 'Michigan') {$dataState = 'mi';$letter = 'W';
	} elseif($title == 'Minnesota') {$dataState = 'mn';$letter = 'X';
	} elseif($title == 'Mississippi') {$dataState = 'ms';$letter = 'Y';
	} elseif($title == 'Missouri') {$dataState = 'mo';$letter = 'Z';
	} elseif($title == 'Montana') {$dataState = 'mt';$letter = 'a';
    } elseif($title == 'Nebraska') {$dataState = 'ne';$letter = 'b';
	} elseif($title == 'Nevada') {$dataState = 'nv';$letter = 'c';
	} elseif($title == 'New Hampshire') {$dataState = 'nh';$letter = 'd';
	} elseif($title == 'New Jersey') {$dataState = 'nj';$letter = 'e';
	} elseif($title == 'New Mexico') {$dataState = 'nm';$letter = 'f';
	} elseif($title == 'New York') {$dataState = 'ny';$letter = 'g';
	} elseif($title == 'North Carolina') {$dataState = 'nc';$letter = 'h';
	} elseif($title == 'North Dakota') {$dataState = 'nd';$letter = 'i';
	} elseif($title == 'Ohio') {$dataState = 'oh';$letter = 'j';
	} elseif($title == 'Oklahoma') {$dataState = 'ok';$letter = 'k';
	} elseif($title == 'Oregon') {$dataState = 'or';$letter = 'l';
	} elseif($title == 'Pennsylvania') {$dataState = 'pa';$letter = 'm';
	} elseif($title == 'Rhode Island') {$dataState = 'ri';$letter = 'n';
	} elseif($title == 'South Carolina') {$dataState = 'sc';$letter = 'o';
    } elseif($title == 'South Dakota') {$dataState = 'sd';$letter = 'p';
	} elseif($title == 'Tennesse') {$dataState = 'tn';$letter = 'q';
	} elseif($title == 'Texas') {$dataState = 'tx';$letter = 'r';
	} elseif($title == 'Utah') {$dataState = 'ut';$letter = 's';
	} elseif($title == 'Virginia') {$dataState = 'va';$letter = 't';
	} elseif($title == 'Vermont') {$dataState = 'vt';$letter = 'u';
	} elseif($title == 'Washington') {$dataState = 'wa';$letter = 'v';
	} elseif($title == 'West Virginia') {$dataState = 'wv';$letter = 'w';
	} elseif($title == 'Wisconson') {$dataState = 'wi';$letter = 'x';
	} elseif($title == 'Wyoming') {$dataState = 'wy';$letter = 'y';
	} 

    // State color and render
    array_push($listArray, array(
		'datastate' => $dataState,
		'letter' => $letter,
		'class' => $class
    ));

    // State Number and Description
	array_push($numArray, array(
		'desc' => $desc,
		'num' => $numProp,
		'datastate' => $dataState
    ));


    endwhile;
    endif; 
    // End Loop

    // echo '<pre>';
	// print_r($listArray);
	// echo '</pre>';
    ?>	

<div id="states">
		<ul class="stately" > 
			<?php 

			foreach( $listArray as $state ) {
				echo '<li data-state="' . $state['datastate'] . '" class="' . $state['class'] . '">' . $state['letter'] . '</li>';
			}

			?>
		</ul>


		<?php foreach( $numArray as $numDesc ) { 
					$myNum =  $numDesc['num'];
					if( $myNum !== '' ) { $stateClass = 'stateinfo'; } else { $stateClass = 'stateno'; }
					
					echo '<div class="' . $stateClass . ' ' . $numDesc['datastate'] . '">';

					if( $myNum !== '' ) {
						echo '<div class="count wow zoomIn">' . $myNum . '</div>';
					}
					echo '<div id="js-target" class="displaynone ">' . $numDesc['desc'] . '</div>';

					echo '</div>'; // close it so it's a child
				}	
			?>

			
	</div><!-- stately -->
		

				
			



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
