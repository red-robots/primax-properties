<?php
/**
 * Template Name: Map
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

			<div class="wrapper">
				<section class="what-we-do">
					<?php while ( have_posts() ) : the_post(); 

					$page_content = get_field('page_content');
					$heading = get_field('heading');
					$slogan = get_field('slogan');
					$extra_line_one = get_field('extra_line_one');
					$extra_line_two = get_field('extra_line_two');

					?>

						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php echo $page_content; ?>
						</div><!-- .entry-content -->

					<?php endwhile; // End of the loop.?>

					<div class="entry-content">
					
						<h2 class="map-head"><?php echo $heading; ?></h2>
					</div>

				</section>
			</div><!-- wrapper -->
<?php
	
	$listArray = array();
	$numArray = array();
	$total = 0;

	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'=>'market',
		'posts_per_page' => -1, 
		'order' => 'ASC', 
		'orderby' => 'title'
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
    if($title == 'Alabama') {$sTitle = 'Alabama'; $size = 'large-count'; $dataState = 'al'; $letter = 'A';
    } elseif($title == 'Alaska') {$sTitle = 'Alaska'; $size = 'large-count'; $dataState = 'ak';$letter = 'B';
	} elseif($title == 'Arkansas') {$sTitle = 'Arkansas'; $size = 'large-count'; $dataState = 'ar';$letter = 'C';
	} elseif($title == 'Arizona') {$sTitle = 'Arizona'; $size = 'large-count'; $dataState = 'az';$letter = 'D';
	} elseif($title == 'California') {$sTitle = 'California'; $size = 'large-count'; $dataState = 'ca';$letter = 'E';
	} elseif($title == 'Colorado') {$sTitle = 'Colorado'; $size = 'large-count'; $dataState = 'co';$letter = 'F';
	} elseif($title == 'Connecticut') {$sTitle = 'Connecticut'; $size = 'small-count'; $dataState = 'ct';$letter = 'G';
	} elseif($title == 'Delaware') {$sTitle = 'Delaware'; $size = 'small-count'; $dataState = 'de';$letter = 'H';
	} elseif($title == 'DC') {$sTitle = 'DC'; $size = 'small-count'; $dataState = 'dc';$letter = 'I';
	} elseif($title == 'Florida') {$sTitle = 'Florida'; $size = 'large-count'; $dataState = 'fl';$letter = 'J';
	} elseif($title == 'Georgia') {$sTitle = 'Georgia'; $size = 'large-count'; $dataState = 'ga';$letter = 'K';
	} elseif($title == 'Hiawai') {$sTitle = 'Hiawai'; $size = 'large-count'; $dataState = 'hi';$letter = 'L';
	} elseif($title == 'Idaho') {$sTitle = 'Idaho'; $size = 'large-count'; $dataState = 'id';$letter = 'M';
	} elseif($title == 'Illinois') {$sTitle = 'Illinois'; $size = 'large-count'; $dataState = 'il';$letter = 'N';
	} elseif($title == 'Indiana') {$sTitle = 'Indiana'; $size = 'large-count'; $dataState = 'in';$letter = 'O';
	} elseif($title == 'Iowa') {$sTitle = 'Iowa'; $size = 'large-count'; $dataState = 'ia';$letter = 'P';
	} elseif($title == 'Kansas') {$sTitle = 'Kansas'; $size = 'large-count'; $dataState = 'ks';$letter = 'Q';
	} elseif($title == 'Kentucky') {$sTitle = 'Kentucky'; $size = 'large-count'; $dataState = 'ky';$letter = 'R';
	} elseif($title == 'Louisiana') {$sTitle = 'Louisiana'; $size = 'large-count'; $dataState = 'la';$letter = 'S';
	} elseif($title == 'Maine') {$sTitle = 'Maine'; $size = 'large-count'; $dataState = 'me';$letter = 'T';
	} elseif($title == 'Maryland') {$sTitle = 'Maryland'; $size = 'small-count'; $dataState = 'md';$letter = 'U';
	} elseif($title == 'Massachusetts') {$sTitle = 'Massachusetts'; $size = 'small-count'; $dataState = 'ma';$letter = 'V';
	} elseif($title == 'Michigan') {$sTitle = 'Michigan'; $size = 'large-count'; $dataState = 'mi';$letter = 'W';
	} elseif($title == 'Minnesota') {$sTitle = 'Minnesota'; $size = 'large-count'; $dataState = 'mn';$letter = 'X';
	} elseif($title == 'Mississippi') {$sTitle = 'Mississippi'; $size = 'large-count'; $dataState = 'ms';$letter = 'Y';
	} elseif($title == 'Missouri') {$sTitle = 'Missouri'; $size = 'large-count'; $dataState = 'mo';$letter = 'Z';
	} elseif($title == 'Montana') {$sTitle = 'Montana'; $size = 'large-count'; $dataState = 'mt';$letter = 'a';
    } elseif($title == 'Nebraska') {$sTitle = 'Nebraska'; $size = 'large-count'; $dataState = 'ne';$letter = 'b';
	} elseif($title == 'Nevada') {$sTitle = 'Nevada'; $size = 'large-count'; $dataState = 'nv';$letter = 'c';
	} elseif($title == 'New Hampshire') {$sTitle = 'New Hampshire'; $size = 'small-count'; $dataState = 'nh';$letter = 'd';
	} elseif($title == 'New Jersey') {$sTitle = 'New Jersey'; $size = 'small-count'; $dataState = 'nj';$letter = 'e';
	} elseif($title == 'New Mexico') {$sTitle = 'New Mexico'; $size = 'large-count'; $dataState = 'nm';$letter = 'f';
	} elseif($title == 'New York') {$sTitle = 'New York'; $size = 'large-count'; $dataState = 'ny';$letter = 'g';
	} elseif($title == 'North Carolina') {$sTitle = 'North Carolina'; $size = 'large-count'; $dataState = 'nc';$letter = 'h';
	} elseif($title == 'North Dakota') {$sTitle = 'North Dakota'; $size = 'large-count'; $dataState = 'nd';$letter = 'i';
	} elseif($title == 'Ohio') {$sTitle = 'Ohio'; $size = 'large-count'; $dataState = 'oh';$letter = 'j';
	} elseif($title == 'Oklahoma') {$sTitle = 'Oklahoma'; $size = 'large-count'; $dataState = 'ok';$letter = 'k';
	} elseif($title == 'Oregon') {$sTitle = 'Oregon'; $size = 'large-count'; $dataState = 'or';$letter = 'l';
	} elseif($title == 'Pennsylvania') {$sTitle = 'Pennsylvania'; $size = 'large-count'; $dataState = 'pa';$letter = 'm';
	} elseif($title == 'Rhode Island') {$sTitle = 'Rhode Island'; $size = 'small-count'; $dataState = 'ri';$letter = 'n';
	} elseif($title == 'South Carolina') {$sTitle = 'South Carolina'; $size = 'large-count'; $dataState = 'sc';$letter = 'o';
    } elseif($title == 'South Dakota') {$sTitle = 'South Dakota'; $size = 'large-count'; $dataState = 'sd';$letter = 'p';
	} elseif($title == 'Tennesse') {$sTitle = 'Tennesse'; $size = 'large-count'; $dataState = 'tn';$letter = 'q';
	} elseif($title == 'Texas') {$sTitle = 'Texas'; $size = 'large-count'; $dataState = 'tx';$letter = 'r';
	} elseif($title == 'Utah') {$sTitle = 'Utah'; $size = 'large-count'; $dataState = 'ut';$letter = 's';
	} elseif($title == 'Virginia') {$sTitle = 'Virginia'; $size = 'large-count'; $dataState = 'va';$letter = 't';
	} elseif($title == 'Vermont') {$sTitle = 'Vermont'; $size = 'small-count'; $dataState = 'vt';$letter = 'u';
	} elseif($title == 'Washington') {$sTitle = 'Washington'; $size = 'large-count'; $dataState = 'wa';$letter = 'v';
	} elseif($title == 'West Virginia') {$sTitle = 'West Virginia'; $size = 'large-count'; $dataState = 'wv';$letter = 'w';
	} elseif($title == 'Wisconson') {$sTitle = 'Wisconson'; $size = 'large-count'; $dataState = 'wi';$letter = 'x';
	} elseif($title == 'Wyoming') {$sTitle = 'Wyoming'; $size = 'large-count'; $dataState = 'wy';$letter = 'y';
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
		'datastate' => $dataState,
		'size' => $size, 
		'title' => $sTitle
    ));

    $total += $numProp;
	

    endwhile;
    endif; 
    // End Loop

    
    ?>	

<div id="states">
		<ul class="stately" > 
			<?php 

			foreach( $listArray as $state ) {
				echo '<li data-state="' . $state['datastate'] . '" class="' . $state['class'] . '">' . $state['letter'] . '</li>';
			}

			?>
		</ul>


		<?php 

		//$totalCount = 0;

		foreach( $numArray as $numDesc ) { 
					$myNum =  $numDesc['num'];

					if( $myNum !== '' ) { $stateClass = 'stateinfo'; } else { $stateClass = 'stateno'; }
					
					echo '<div class="' . $stateClass . ' ' . $numDesc['datastate'] . '">';

						echo '<div class="state-name">'. $numDesc['title'] . '</div>';

						if( $myNum !== '' ) {
							echo '<div class="count counter ' . $numDesc['size'] . ' wow zoomIn">' . $myNum . '</div>';
						}

						// Show hover only if we have something...
						if( $numDesc['desc'] != '') {
							echo '<div id="js-target" class="displaynone ">' . $numDesc['desc'] . '</div>';
						}

					echo '</div>'; // close it so it's a child

				}

				// get the total number
				$intTotal = (int)$total;
				
			?>
			<div class="total-count">
				Total: 
				<div class="count totalnum">
				<?php echo $intTotal; ?>
				</div>
			</div>
			

			
	</div><!-- stately -->
		

				
			<section class="map-below">
			<h3><?php echo $slogan; ?></h3>
				<p><?php echo $extra_line_one; ?></p>
				<p><?php echo $extra_line_two; ?></p>
			</section>



		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->

<?php get_footer(); ?>