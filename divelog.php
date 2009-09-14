<?php
/*
Plugin Name: Dive Log
Plugin URI: http://divelogplugin.wordpress.com/
Description: Plugin to help keep record of your diving.
Version: 1.0
Author: Juan Lacort
Author URI: http://www.facebook.com/jalacort
*/


$images_url = get_option('home') . '/wp-content/plugins/dive-log/images/';

@define('ICONS_FILEPATH', $images_url);




function post_data($id) {

	/* Get values from Post Form*/
	$plugin_power = $_REQUEST['plugin_power'];
	$inm_num = $_REQUEST['inm_num'];	
	$inm_date = $_REQUEST['inm_date'];	
	$inm_name = $_REQUEST['inm_name'];	
	$location = $_REQUEST['location'];	
	$scuba_club = $_REQUEST['scuba_club'];	
	$scuba_club_url = $_REQUEST['scuba_club_url'];	
	
	$bottom_time = $_REQUEST['bottom_time'];
	$max_depth = $_REQUEST['max_depth'];
	$inm_type = $_REQUEST['inm_type'];	
	
	$air_tank = $_REQUEST['air_tank'];			
	$init_pres = $_REQUEST['init_pres'];		
	$final_pres = $_REQUEST['final_pres'];	
	
	$weather = $_REQUEST['weather'];			
	$air_temp = $_REQUEST['air_temp'];		
	$sea_cond = $_REQUEST['sea_cond'];		
	$sea_temp = $_REQUEST['sea_temp'];	
	$currents = $_REQUEST['currents'];		
	$visibility = $_REQUEST['visibility'];	
	
	$suit = $_REQUEST['suit'];			
	$weights = $_REQUEST['weights'];		
	$computer = $_REQUEST['computer'];		
	$other = $_REQUEST['other'];				
		
	
	/*  */

	delete_post_meta($id, 'plugin_power');	
	
	delete_post_meta($id, 'inm_num');	
	delete_post_meta($id, 'inm_date');		
	delete_post_meta($id, 'inm_name');		
	delete_post_meta($id, 'location');	
	delete_post_meta($id, 'bottom_time');
	delete_post_meta($id, 'max_depth');
	delete_post_meta($id, 'scuba_club');
	delete_post_meta($id, 'scuba_club_url');			
	delete_post_meta($id, 'inm_type');		
	delete_post_meta($id, 'air_tank');	
	delete_post_meta($id, 'init_pres');	
	delete_post_meta($id, 'final_pres');	

	delete_post_meta($id, 'weather');
	delete_post_meta($id, 'air_temp');			
	delete_post_meta($id, 'sea_cond');		
	delete_post_meta($id, 'sea_temp');	
	delete_post_meta($id, 'currents');	
	delete_post_meta($id, 'visibility');	
	
	delete_post_meta($id, 'suit');		
	delete_post_meta($id, 'weights');	
	delete_post_meta($id, 'computer');	
	delete_post_meta($id, 'other');	
	
	add_post_meta($id,'plugin_power', $plugin_power,true); 

	if (isset($inm_num) && !empty($inm_num)) {
		add_post_meta($id,'inm_num', $inm_num,true); 
	}

	if (isset($inm_date) && !empty($inm_date)) {
		add_post_meta($id,'inm_date', $inm_date,true); 
	}
	
	if (isset($inm_name) && !empty($inm_name)) {
		add_post_meta($id,'inm_name', $inm_name,true); 
	}		
	
	if (isset($location) && !empty($location)) {	
		add_post_meta($id,'location', $location,true); 
	}

	if (isset($scuba_club) && !empty($scuba_club)) {	
		add_post_meta($id,'scuba_club', $scuba_club,true); 
	}	
	
	if (isset($scuba_club_url) && !empty($scuba_club_url)) {	
		add_post_meta($id,'scuba_club_url', $scuba_club_url,true); 
	}		
	
	if (isset($bottom_time) && !empty($bottom_time)) {
		add_post_meta($id,'bottom_time', $bottom_time,true); 
	}
	
	if (isset($max_depth) && !empty($max_depth)) {
		add_post_meta($id,'max_depth', $max_depth,true); 
	}	

		add_post_meta($id,'inm_type', $inm_type,true); 		


	if (isset($air_tank)) {
		add_post_meta($id,'air_tank', $air_tank,true); 
	}	

	if (isset($init_pres) && !empty($init_pres)) {
		add_post_meta($id,'init_pres', $init_pres,true); 
	}	
	
	if (isset($final_pres) && !empty($final_pres)) {
		add_post_meta($id,'final_pres', $final_pres,true); 
	}	


	if (isset($weather)) {
		add_post_meta($id,'weather', $weather,true); 
	}	

	if (isset($air_temp) && !empty($air_temp)) {
		add_post_meta($id,'air_temp', $air_temp,true); 
	}	

	if (isset($sea_temp) && !empty($sea_temp)) {
		add_post_meta($id,'sea_temp', $sea_temp,true); 
	}	
	
	if (isset($sea_cond)) {
		add_post_meta($id,'sea_cond', $sea_cond,true); 
	}				
	
	if (isset($currents)) {
		add_post_meta($id,'currents', $currents,true); 
	}	

	if (isset($visibility)) {
		add_post_meta($id,'visibility', $visibility,true); 
	}		

	if (isset($suit)) {
		add_post_meta($id,'suit', $suit,true); 
	}	

	if (isset($weights) && !empty($weights)) {
		add_post_meta($id,'weights', $weights,true); 
	}	

	if (isset($computer)) {
		add_post_meta($id,'computer', $computer,true); 		
	}				

	if (isset($other) && !empty($other)) {
		add_post_meta($id,'other', $other,true); 
	}	

}


function my_plugin_input($id) {
/* Post FORM */
global $post;

?>

<div id="divelog" class="postbox closed">
    <h3><?php _e('Dive Log', 'divelog') ?></h3>
	<div class="inside">
		
			<table width="100%">
				<tr>
					<td colspan="2"><div align="center"><strong>Plugin Power</strong></div></td>
				</tr>
				<tr align="center">
				<?php 
				$plugin_power = 'OFF'; // Initializes OFF
				$plugin_power = get_post_meta($post->ID, plugin_power, true); ?>
					<td> ON 
					  <label>
					  <input name="plugin_power" type="radio" value="ON" <?	if  ($plugin_power == 'ON') {	echo 'checked'; } ?>/>
				    </label></td>
					<td>OFF<label>
					  <input name="plugin_power" type="radio" value="OFF" <?	if  ($plugin_power != 'ON') {	echo 'checked'; } ?>/>
				    </label></td>
				</tr>				
			</table>
			
		<hr />

			<table width="100%">
				<tr>
					<td colspan="7"><div align="center"><strong>Inmersion Identification</strong></div></td>
				</tr>
				<tr>	
				
			<?php $inm_num = get_post_meta($post->ID, inm_num, true); ?>			
		 	<td><?php _e('Num.','divelog') ?></td>
			
			<?php
			$inm_date = get_option('inm_date');
			if  ($inm_date == 'yes') {			
			 	 ?>			
		 	<td><?php _e('Date ','divelog') ?></td>
			<?php } ?>		
							
			<?php $inm_name = get_post_meta($post->ID, inm_name, true); ?>			
		 	<td><?php _e('Name ','divelog') ?></td>

			<?php 
			$location = get_option('location');
			if  ($location == 'yes') {?>	
		 	<td><?php _e('Location ','divelog') ?></td>
			<?php } // del if?>	
			
			<?php 
			$inm_type = get_option('inm_type');
			if  ($inm_type == 'yes') {?>			
		 	<td><?php _e('Type ','divelog') ?></td>
			<?php } // del if?>	

			<?php
			$scuba_club = get_option('scuba_club');
			if  ($scuba_club == 'yes') {			
			 	 ?>			
		 	<td><?php _e('Club ','divelog') ?></td>
			<?php } ?>		
			
			<?php
			$scuba_club_link = get_option('scuba_club_link');
			if  ($scuba_club_link == 'yes') {			
			 	 ?>			
		 	<td><div align="center">
		 	  <?php _e('Scuba Club ','divelog') ?>
		 	  </div></td>
			<?php } ?>																											
<tr>
<td><input type='textbox' name='inm_num' id='inm_num' size='2' value='<?php echo $inm_num?>'/>	</td>

<?php 
$inm_date = get_option('inm_date');
if  ($inm_date == 'yes') { 
	$inm_date = get_post_meta($post->ID, inm_date, true);
?>
	<td><input type='textbox' name='inm_date' id='inm_date' size='9' value='<?php echo $inm_date?>'/>	</td>	
<?php } ?>

<?php 
$inm_name = get_option('inm_name');
if  ($inm_name == 'yes') { 
	$inm_name = get_post_meta($post->ID, inm_name, true);

?>
	<td><input type='textbox' name='inm_name' id='inm_name' size='10' value='<?php echo $inm_name?>'/>	</td>
<?php } ?>

<?php 
$location = get_option('location');
if  ($location == 'yes') { 
	$location = get_post_meta($post->ID, location, true);
?>
	<td><input type='textbox' name='location' id='location' size='10' value='<?php echo $location?>'/>	</td>	
<?php } ?>



<?php 
$inm_type = get_option('inm_type');
if  ($inm_type == 'yes') {
	$inm_type = get_post_meta($post->ID, inm_type, true); 
?>			
<td>
<select name="inm_type"><option value="day" <?php if(inm_type == 'day'){echo ' selected';} ?>> Day </option><option value="night" <?php if(inm_type == 'night') {echo ' selected';} ?>> Night </option> </select></td>
<?php } ?>		

<?php 
$scuba_club_link = get_option('scuba_club_link');
if  ($scuba_club_link == 'yes') { 
	$scuba_club = get_post_meta($post->ID, scuba_club, true);
?>
	<td><input type='textbox' name='scuba_club' id='scuba_club' size='8' value='<?php echo $scuba_club?>'/></td>	
<?php } ?>

<?php 
$scuba_club_link = get_option('scuba_club_link');
if  ($scuba_club_link == 'yes') { 
	$scuba_club_url = get_post_meta($post->ID, scuba_club_url, true);
?>
	<td><input type='textbox' name='scuba_club_url' id='scuba_club_url' size='34' value='<?php echo $scuba_club_url?>' style="font-size:9px;"/></td>	
<?php } ?>
</tr>					
	</table>
	
			<hr />
			
	<table width="100%">
	
	<tr>
		<td colspan="5">
			<div align="center"><strong>Inmersion Details	    </strong></div></td>
	</tr>
	<tr>

			<?php 
			$bottom_time = get_option('bottom_time');
			if  ($bottom_time == 'yes') {?>				
			
		 	<td><?php _e('Bottom Time ','divelog') ?></td>
			<?php } ?>
			
			<?php 
			$max_depth = get_option('max_depth');
			if  ($max_depth == 'yes') {?>				
		
		 	<td><?php _e('Max. depth ','divelog') ?></td>
			<?php } ?>	

			<?php 
			$air_tank = get_option('air_tank');
			if  ($air_tank == 'yes') {?>	
			
		 	<td><?php _e('Air Tank ','divelog') ?></td>
			<?php } // del if?>	
			
		<?php 
			$init_pres = get_option('init_pres');
			if  ($init_pres == 'yes') {?>	
		 	<td><?php _e('Initial Pres. ','divelog') ?></td>
			<?php } // del if?>	
			
		<?php 
			$final_pres = get_option('final_pres');
			if  ($final_pres == 'yes') {?>	
		 	<td><?php _e('Final Pres. ','divelog') ?></td>
			<?php } // del if?>													
	</tr>

			<tr>			
			<?php 
			$bottom_time = get_option('bottom_time');
			if  ($bottom_time == 'yes') {?>	
			<?php $bottom_time = get_post_meta($post->ID, bottom_time, true); ?>			
		 	<td><input type='textbox' name='bottom_time' id='bottom_time' size='2' value='<?php echo $bottom_time?>'/>	</td>
			<?php } // del if?>
			
			<?php 
			$max_depth = get_option('max_depth');
			if  ($max_depth == 'yes') { 
				$max_depth = get_post_meta($post->ID, max_depth, true);
			?>
				<td><input type='textbox' name='max_depth' id='max_depth' size='2' value='<?php echo $max_depth?>'/>	</td>	
			<?php } ?>
		
			

			<?php 
			$air_tank = get_option('air_tank');
			if  ($air_tank == 'yes') {?>	
			<?php $air_tank = get_post_meta($post->ID, air_tank, true); ?>			
		 	<td>	<select name="air_tank"><option value="10L" <?php if ($air_tank =='10L'){echo 'SELECTED';}?> > 10L </option><option value="12L" <?php if ($air_tank =='12L'){echo 'SELECTED';}?>> 12L </option><option value="15L" <?php if ($air_tank =='15L'){echo 'SELECTED';}?>> 15L </option> </select>	</td>
			<?php } // del if?>		
			
		<!-- Initial Pres -->
		<?php 
			$init_pres = get_option('init_pres');
			if  ($init_pres == 'yes') {?>	
			<?php $init_pres = get_post_meta($post->ID, init_pres, true); ?>			
		 	<td><input type="text" name="init_pres" size="3" value="<?php echo $init_pres?>" /></td>
			<?php } // del if?>		
			
		<!-- Final Pres -->
		<?php 
			$final_pres = get_option('final_pres');
			if  ($final_pres == 'yes') {?>	
			<?php $final_pres = get_post_meta($post->ID, final_pres, true); ?>			
		 	<td>	<input type="text" name="final_pres" size="3" value="<?php echo $final_pres?>" />	</td>
			<?php } // del if?>	
		  </tr>
	</table>

		<hr />
	
			<table width="100%">
			
			<tr>
				<td colspan="6">
					<div align="center"><strong>Weather Conditions			    </strong></div></td>
			</tr>
			<tr>
		<!-- Sea Temp -->
		<?php 
			$sea_temp = get_option('sea_temp');
			if  ($sea_temp == 'yes') {?>	
		 	<td><?php _e('Water Temp. ','divelog') ?></td>
			<?php } // del if?>					
			
		<!-- Currents -->			
		<?php 
			$currents = get_option('currents');
			if  ($currents == 'yes') {?>	
		 	<td><?php _e('Currents ','divelog') ?></td>
			<?php } // del if?>							

		<!-- Visibility -->			
		<?php 
			$visibility = get_option('visibility');
			if  ($visibility == 'yes') {?>	
		 	<td><?php _e('Visibility ','divelog') ?></td>
			<?php } // del if?>				
	
		<!-- Weather -->
		<?php 
			$weather = get_option('weather');
			if  ($weather == 'yes') {?>	
			<?php $weather = get_post_meta($post->ID, weather, true); ?>			
		 	<td><?php _e('Weather ','divelog') ?></td>
			<?php } // del if?>	
			
		<!-- Air Temp. -->
		<?php 
			$air_temp = get_option('air_temp');
			if  ($air_temp == 'yes') {?>	
			<?php $air_temp = get_post_meta($post->ID, air_temp, true); ?>			
		 	<td><?php _e('Air Temp. ','divelog') ?></td>
			<?php } // del if?>			
			
		<!-- Sea cond. -->			
		<?php 
			$sea_cond = get_option('sea_cond');
			if  ($sea_cond == 'yes') {?>	
			<?php $sea_cond = get_post_meta($post->ID, sea_cond, true); ?>			
		 	<td><?php _e('Sea Cond. ','divelog') ?></td>
			<?php } // del if?>		
	  </tr>
	  <tr>
			<?php $sea_temp = get_option('sea_temp');
			if  ($sea_temp == 'yes') {
			$sea_temp = get_post_meta($post->ID, sea_temp, true); 
			?>		  
			<td>	<input type="text" name="sea_temp" size="3" value="<?php echo $sea_temp?>" />	</td>
			<?php } ?>
			
			
			<?php $currents = get_option('currents');
			if  ($currents == 'yes') {
			$currents = get_post_meta($post->ID, currents, true); 
			?>	
			<td><select name="currents"> <option value="none" <?php if(currents == 'none'){ echo ' selected';} ?>>None</option> <option value="slight" <?php if(currents == 'slight'){ echo ' selected';} ?>>Slight</option><option value="moderate" <?php if(currents == 'moderate'){ echo ' selected';} ?>>Moderate</option><option value="strong" <?php if(currents == 'strong'){ echo ' selected';} ?>>Strong</option></select>	</td>

			<?php } ?>
			
			<?php $visibility = get_option('visibility');
			if  ($visibility == 'yes') {
			$visibility = get_post_meta($post->ID, visibility, true); 
			?>				

			<td><select name="visibility"> <option value="excellent" <?php if(visibility == 'excellent'){ echo ' selected';} ?>>Excellent</option> <option value="good" <?php if(visibility == 'good'){ echo ' selected';} ?>>Good</option><option value="fair" <?php if(visibility == 'fair'){ echo ' selected';} ?>>Fair</option><option value="poor" <?php if(visibility == 'poor'){ echo ' selected';} ?>>Poor</option><option value="limited" <?php if(limited == 'none'){ echo ' selected';} ?>>Limited</option></select>	</td>	  

			<?php } ?>
			
			<?php $weather = get_option('weather');
			if  ($weather == 'yes') {
			$weather = get_post_meta($post->ID, weather, true); 
			?>				
<td><select name="weather"> <option value="sunny" <?php if(weather == 'sunny'){ echo ' selected';} ?>>Sunny</option> <option value="cloudy" <?php if(weather == 'cloudy'){ echo ' selected';} ?>>Cloudy</option><option value="windy" <?php if(weather == 'windy'){ echo ' selected';} ?>>Windy</option><option value="rainy" <?php if(weather == 'rainy'){ echo ' selected';} ?>>Rainy</option><option value="stormy" <?php if(weather == 'stormy'){ echo ' selected';} ?>>Stormy</option></select>	</td>
			<?php } ?>
			
			<?php $air_temp = get_option('air_temp');
			if  ($air_temp == 'yes') {
			$air_temp = get_post_meta($post->ID, air_temp, true); 
			?>				
			
<td><input type="text" name="air_temp" size="3" value="<?php echo $air_temp?>"/>	</td>

			<?php } ?>

			<?php $sea_cond = get_option('sea_cond');
			if  ($sea_cond == 'yes') {
			$sea_cond = get_post_meta($post->ID, sea_cond, true); 
			?>					
			
<td><select name="sea_cond"> <option value="calm" <?php if(sea_cond == 'calm'){ echo ' selected';} ?>>Calm</option> <option value="smooth" <?php if(sea_cond == 'smooth'){ echo ' selected';} ?>>Smooth</option><option value="slight" <?php if(sea_cond == 'slight'){ echo ' selected';} ?>>Slight</option><option value="moderate" <?php if(sea_cond == 'moderate'){ echo ' selected';} ?>>Moderate</option><option value="Swell" <?php if(sea_cond == 'swell'){ echo ' selected';} ?>>Swell</option><option value="thermocline" <?php if(sea_cond == 'thermocline'){ echo ' selected';} ?>>Thermocline</option></select>	</td>
			<?php } ?>
	  </tr>
	  </table>

			<hr />

		<table width="100%">
		
		<tr>
			<td colspan="4"> <div align="center"><strong>Equipment
			</strong></div></td>
		</tr>
		
			<tr>
	
	
		<!-- Suit -->			
		<?php 
			$suit = get_option('suit');
			if  ($suit == 'yes') {?>	
		 	<td><?php _e('Suit ','divelog') ?></td>
			<?php } // del if?>	
			

		<!-- Weights -->			
		<?php 
			$weights = get_option('weights');
			if  ($weights == 'yes') {?>	
		 	<td><?php _e('Weights ','divelog') ?></td>
			<?php } // del if?>	
			
		<!-- Computer -->			
		<?php 
			$computer = get_option('computer');
			if  ($computer == 'yes') {?>	
		 	<td><?php _e('Computer ','divelog') ?></td>
			<?php } // del if?>		
			
		
		<!-- Other -->			
		<?php 
			$other = get_option('other');
			if  ($other == 'yes') {?>	
		 	<td><?php _e('Other ','divelog') ?></td>
			<?php } // del if?>	
					
									
			</tr>
	
	<tr>
			<?php 
			$suit = get_option('suit');
			if  ($suit == 'yes') {?>	
			<?php $suit = get_post_meta($post->ID, suit, true); ?>	
<td><select name="suit"> <option value="shorty" <?php if(suit == 'shorty'){ echo ' selected';} ?>>Shorty</option> <option value="long" <?php if(suit == 'long'){ echo ' selected';} ?>>Long</option><option value="long+vest" <?php if(suit == 'long+vest'){ echo ' selected';} ?>>Long+Vest</option></select>	</td>	

	<?php } ?>
	
			<?php 
			$suit = get_option('weights');
			if  ($weights == 'yes') {
			$weights = get_post_meta($post->ID, weights, true); ?>	

<?php $weight = get_option('weight') ?>
<td><input type="text" name="weights" size="3" value="<?php echo $weights?>" /> <?php echo ' ' . $weight?>	</td>

	<?php } ?>
	
			<?php 
			$computer = get_option('computer');
			if  ($computer == 'yes') {
			$computer = get_post_meta($post->ID, computer, true); ?>		

<td><select name="computer"> <option value="yes" <?php if(computer == 'yes'){ echo ' selected';} ?>>Yes</option> <option value="no" <?php if(computer == 'no'){ echo ' selected';} ?>>No</option></select>	</td>

	<?php } ?>

			<?php 
			echo 'otrtos!';
			$other = get_option('other');
			if  ($other == 'yes') {
				$other = get_post_meta($post->ID, other, true); ?>	
				<td>aaa<input type="text" name="other" value="<?php echo $other?>" />	</td>
	<?php } ?>
	
	</tr>
	</table>		
	</div>
</div>
<?php

}

function divelog_show($content) {	


	
/* Detail only shown when in post view*/
if (is_single()){
		global $post;
		
		$plugin_power = get_post_meta($post->ID, plugin_power, true); 	
		
		$inm_date = get_post_meta($post->ID, inm_date, true); 
		$inm_num = get_post_meta($post->ID, inm_num, true); 
		$bottom_time = get_post_meta($post->ID, bottom_time, true); 
		$max_depth = get_post_meta($post->ID, max_depth, true);

		$inm_type = get_option($post->ID, inm_type, true);		
		$inm_type_icon = get_option($post->ID, inm_type_icon, true);		
		
		$init_pres = get_option($post->ID, init_pres, true);
		$final_pres = get_option($post->ID, final_pres, true);					
							
		
		if ($inm_type_icon == 'yes'){
			$inm_type_icon_path = get_post_meta($post->ID, inm_type_icon_path, true);
		}		
		 
if($plugin_power == 'ON'){ /* Only if the plugin is ON on this post*/		
?>		

	<br />

	<table align="center" id="divelog" width="100%" border="0">
	<td>
		<table  width="100%" align="center" cellpadding="0px">
			<tr height="50px">
				<!-- Inm. Number-->
				<?php if (get_option('inm_num_icon') == 'yes'){ 
				if (get_post_meta($post->ID, inm_num, true) != ''){ ?>
				<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . get_option('inm_num_icon_path')?>" style="background-repeat:no-repeat; padding: 5px 10px 0px 10px"> <div align="left">#<?php echo $inm_num ?> </div></td>
				<? 
					} 
				} else { echo '<td width="50px"># ' . $inm_num .'</td>' ;} ?>
							
				<!-- Inm. Date -->
				<?php if (get_post_meta($post->ID, inm_date, true) != ''){ ?>
				<td> <div align="center"><?php echo $inm_date ?> </div></td>
				<? } ?>
				<!-- Inm. Name -->
				<td><div align="center"><?php echo get_post_meta($post->ID, inm_name, true) ?> </div></td>

				<!-- Location -->
				<td> <div align="center"><?php echo get_post_meta($post->ID, location, true) ?> </div></td>
						
				<!-- Inm. Type-->
				<?php if (get_option('inm_type_icon') == 'yes'){ 
						if (get_post_meta($post->ID, inm_type, true) == 'day') { ?>
							<td background="<?php echo $wp.ICONS_FILEPATH . 'day.gif'?>" style="background-repeat:no-repeat">
							
							<?php } else { ?>
<td background="<?php echo $wp.ICONS_FILEPATH . 'night.gif'?>" style="background-repeat:no-repeat">						
				<?php } ?>
			  </td>
				<?php } else {
								if (get_post_meta($post->ID, inm_type, true) == 'day'){
									 echo '<td width="50px">Day </td>' ;
								} 
								
								if (get_post_meta($post->ID, inm_type, true) == 'night'){
									 echo '<td width="50px">Night </td>' ;
								} 
							}
								?>

							
				<!-- Scuba club -->
				<?php if (get_option(scuba_club) == 'yes'){ ?>
					<td > <div align="center">
					<?php if (get_option(scuba_club_link) == 'yes'){ ?>
						<a href="<?php echo get_post_meta($post->ID, scuba_club_url, true) ?>" target="_blank"> <?php } ?>
						<?php echo get_post_meta($post->ID, scuba_club, true) ?> 
						<?php if (get_option(scuba_club_link) == 'yes'){ ?>
					  </a>
							<?php } ?>
						</div></td>
				<?php } ?>
							
		  </tr>
	  </table>
		<table width="100%" height="50px" align="center"  border="0">
				<tr height="50px">	

				<?php 				
			if (get_option('bottom_time_icon') == 'yes'){ 
				if (get_post_meta($post->ID, bottom_time, true) != ''){ ?>			
					<td width="50"  background="<?php echo $wp.ICONS_FILEPATH  . get_option('bottom_time_icon_path')?>" style="background-repeat:no-repeat"><div align="right"><?php echo $bottom_time ?>'</div></td>
			      <?php }
				  	} else { echo '<td width="50px"> ' . $bottom_time . "'" . '</td>' ;} ?>
					
					<td width="50px" align="left" background="<?php echo $wp.ICONS_FILEPATH . get_option('max_depth_icon_path')?>" style="background-repeat:no-repeat"><div align="right"><?php echo $max_depth ?> <?php echo get_option('longitude')?></div></td>
				
				<td width="50px" background="<?php echo $wp.ICONS_FILEPATH  . get_option('init_pres_icon_path')?>" style="background-repeat:no-repeat; padding-left:0px" align="left"> <?php echo get_post_meta($post->ID, init_pres, true) ?> </td>		
				
				<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . get_option('final_pres_icon_path')?>" style="background-repeat:no-repeat; padding-left:3px" align="left"><?php echo get_post_meta($post->ID, final_pres, true) ?></td>							
			
				<!-- Weather-->
				<?php $weather = get_post_meta($post->ID, weather, true); ?>
				<?php if (get_option('weather_icon') == 'yes'){ 
						if (get_post_meta($post->ID, weather, true) == 'stormy') { ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'stormy.gif' ;?>" style="background-repeat:no-repeat" />									
				<?php } ?>
				<?php if  (get_post_meta($post->ID, weather, true) == 'rainy'){ ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'rainy.gif' ;?>" style="background-repeat:no-repeat" />						
				<?php } ?>

				<?php if  (get_post_meta($post->ID, weather, true) == 'sunny'){ ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'sunny.gif' ;?>" style="background-repeat:no-repeat" />						
				<?php } ?>		
						
				<?php if  (get_post_meta($post->ID, weather, true) == 'windy'){ ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'windy.gif' ;?>" style="background-repeat:no-repeat" />						
				<?php } ?>	
				
				&nbsp;</td>
				<?php } else { 
							switch ($weather) {
								case 'stormy': 
									echo '<td width="50px">'. Stormy  .'</td>';
									break;		

								case 'sunny': 
									echo '<td width="50px">'. Sunny  .'</td>';
									break;	
										
								case 'rainy': 
									echo '<td width="50px">'. Rainy  .'</td>';
									break;													

								case 'windy': 
									echo '<td width="50px">'. Windy  .'</td>';
									break;	

								}
						}									
				?>				
				
				<!-- Visibility-->
				<?php 
				$visibility = get_post_meta($post->ID, visibility, true);
				if (get_option('visibility_icon') == 'yes'){ 
						if (get_post_meta($post->ID, visibility, true) == 'excellent') { ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'excellent.gif' ;?>" style="background-repeat:no-repeat" />						

							
							<?php } ?>
				<?php if  (get_post_meta($post->ID, visibility, true) == 'good'){ ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'good.gif' ;?>" style="background-repeat:no-repeat" />						
				
				<?php } ?>

				<?php if  (get_post_meta($post->ID, visibility, true) == 'fair'){ ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'fair.gif' ;?>" style="background-repeat:no-repeat" />						
					
				<?php } ?>		
						
				<?php if  (get_post_meta($post->ID, visibility, true) == 'poor'){ ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'poor.gif' ;?>" style="background-repeat:no-repeat" />						
				<?php } ?>				&nbsp;</td>
				<?php } else {
							switch ($visibility) {
								case 'excellent': 
									echo '<td width="50px">'. 'Excellent Visibility'  .'</td>';
									break;		

								case 'good': 
									echo '<td width="50px">'. 'Good Visibility'  .'</td>';
									break;	
										
								case 'fair': 
									echo '<td width="50px">'. 'Fair Visibility'  .'</td>';
									break;													

								case 'poor': 
									echo '<td width="50px">'. 'Poor Visibility'  .'</td>';
									break;	
								}				
				}
				
				 ?>		</tr>
			
			</table>
			
			<table width="100%" align="center" cellpadding="0px" border="0">
			<tr align="center" height="55px">
			
				<!-- Air Temp -->
				<?php if (get_option('air_temp_icon') == 'yes'){ ?>
				<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . get_option('air_temp_icon_path')?>" style="background-repeat:no-repeat; padding-left:25px" align="left"> <?php echo get_post_meta($post->ID, air_temp, true) . '&deg;' . $temp_scale ?> </td>											
				<?php } else {
				$temp_scale = get_option('temperature');
				if ($temp_scale == 'far') {
					$temp_scale = 'F';
				} else {
					$temp_scale = 'C';
				}
						echo '<td width="50px">' . 'Air: ' . get_post_meta($post->ID, air_temp, true) . '&deg;' . $temp_scale .  '</td>';
				} ?>
				
				<!-- Sea Temp -->
				<?php if (get_option('sea_temp_icon') == 'yes'){ ?>
				<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . get_option('sea_temp_icon_path')?>" style="background-repeat:no-repeat; padding-left:25px" align="left"> <?php echo get_post_meta($post->ID, sea_temp, true) . '&deg;' . $temp_scale ?> </td>											
				<?php } else {
				$temp_scale = get_option('temperature');				
				if ($temp_scale == 'far') {
					$temp_scale = 'F';
				} else {
					$temp_scale = 'C';
				}				
						echo '<td width="50px">' . 'Water: ' . get_post_meta($post->ID, sea_temp, true) . '&deg;' . $temp_scale  . '</td>';
				}  ?>				
				
				<!-- Sea Currents -->
				
				<?php 
				$currents = get_post_meta($post->ID, currents, true);
				if (get_option('currents_icon') == 'yes'){ 
					if (get_post_meta($post->ID, currents, true) == 'strong') { ?>
				<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'strong.gif' ?>" style="background-repeat:no-repeat">
				<?php } ?>
				
				<?php if  (get_post_meta($post->ID, currents, true) == 'moderate'){ ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'moderate.gif' ?>" style="background-repeat:no-repeat">						
				<?php } ?>

				<?php if  (get_post_meta($post->ID, currents, true) == 'slight'){ ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'slight.gif' ?>" style="background-repeat:no-repeat">						
				<?php } ?>		
						
				<?php if  (get_post_meta($post->ID, currents, true) == 'none'){ ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'none.gif' ?>" style="background-repeat:no-repeat">						
				<?php } ?>	
				
			  </td>
				<?php }  else {
							switch ($currents) {
								case 'strong': 
									echo '<td width="50px">'. 'Strong Currents'  .'</td>';
									break;		

								case 'moderate': 
									echo '<td width="50px">'. 'Moderate Currents'  .'</td>';
									break;	
										
								case 'slight': 
									echo '<td width="50px">'. 'Slight Currents'  .'</td>';
									break;													

								case 'none': 
									echo '<td width="50px">'. 'No Currents'  .'</td>';
									break;	
								}				
				} ?>				
				
				<!-- SUIT -->
				<?php 
				$suit = get_post_meta($post->ID, suit, true);
				if (get_option('suit_icon') == 'yes'){ 
						if (get_post_meta($post->ID, suit, true) == 'shorty') { ?>
							<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'shorty.gif' ?>" style="background-repeat:no-repeat">							
							<?php } ?>
				<?php if  (get_post_meta($post->ID, suit, true) == 'long'){ ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'long.gif' ?>" style="background-repeat:no-repeat">						
				<?php } ?>
				
			  </td>
				<?php } else {
							switch ($suit) {
								case 'shorty': 
									echo '<td width="50px">'. Shorty  .'</td>';
									break;		

								case 'long': 
									echo '<td width="50px">'. Long  .'</td>';
									break;	
								}	
					}
				?>	
				
				<!-- COMPUTER -->
				<?php if (get_option('computer_icon') == 'yes'){ 
					if (get_post_meta($post->ID, computer, true) == 'yes') { ?>
							<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'computer_yes.gif' ?>" style="background-repeat:no-repeat">							
					<?php } ?>
				<?php if  (get_post_meta($post->ID, computer, true) == 'no'){ ?>
<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . 'computer_no.gif' ?>" style="background-repeat:no-repeat">						
				<?php } ?>
				
			  </td>
			  <?php } else {
			  			if (get_post_meta($post->ID, computer, true) == 'yes'){
							echo '<td width="50px">' . 'Computer' . '</td>';} else {
							echo '<td width="50px">' . 'No Computer' . '</td>';}
				} ?>
				
				<!-- WEIGHTS -->
				<?php if (get_option('weights_icon') == 'yes'){ ?>
					<td width="50px" background="<?php echo $wp.ICONS_FILEPATH . get_option('weights_icon_path') ?>" style="background-repeat:no-repeat">
				<?php echo get_post_meta($post->ID, weights, true); ?> <?php echo ' ' . get_option('weight'); ?></td>							
				<?php } else {
						echo '<td width="50px">' . get_post_meta($post->ID, weights, true) . get_option('weight') . '</td>';} ?>					
						
			<?php 
			$other = get_option('other');
			if  ($other == 'yes') {
				$other = get_post_meta($post->ID, other, true); ?>	
				<td><?php echo $other?></td>
	<?php } ?>						
			</tr>
			
		</table>
</td>
</table>
		
			
		<?php
	} // if is_single()
}		// if Plugin_power == ON
	return $content;
} 


/* Applies the CSS file*/
function divelog_css() {
		$home = get_settings('siteurl');
		$stylesheet = $home.'/wp-content/plugins' . '/dive-log' . '/css/divelog.css';
		echo('<link rel="stylesheet" href="' . $stylesheet . '" type="text/css" media="screen" />');
}

// Put functions into one big function we'll call at the plugins_loaded  
// action. This ensures that all required plugin functions are defined.

function widget_divelog_init() {
	// Check for the required plugin functions. This will prevent fatal
  	// errors occurring when you deactivate the dynamic-sidebar plugin.
  	if ( !function_exists('register_sidebar_widget') )
  		return;

	/* Calculates the total tiempo*/		
	function suma_tiempo_fondo() {
		global $wpdb;
		$suma_tiempo_fondo = $wpdb->get_var("
			SELECT SUM(meta_value)
			FROM $wpdb->postmeta
			WHERE meta_key = 'bottom_time'
			");
		?>
		<table>
			<tr><td><img src="<?php echo $wp.ICONS_FILEPATH . '/bottom_time.gif'; ?>" alt="Bottom Time"/></td>
			<td> Total Bottom Time<?php echo '<br />' . '<center>' . round($suma_tiempo_fondo/60),0 . 'h. ' . ($suma_tiempo_fondo%60) . 'min. ' . '</center>'; ?> </td>
			</tr>
		</table>
		
		
		<?
		
	}
	
   	// This is the function that outputs the total bottom_time
  	function widget_divelog($args) {
 		// $args is an array of strings that help widgets to conform to
  		// the active theme: before_widget, before_title, after_widget,
  		// and after_title are the array keys. Default tags: li and h2.
  		extract($args);

   		// This one string determines whether you want it to appear in the main page or everywhere
  		$options = get_option('widget_divelog');
  		$showInHome = $options['showInHome'];
  		$title = htmlspecialchars(stripcslashes($options['title']), ENT_QUOTES);
  		global $wpdb;
  		if($showInHome == 1) {
  			if(is_home())
   				echo $before_widget . $before_title . $title . $after_title;
  		} else {
  			echo $before_widget . $before_title . $title . $after_title;
  		}
		if($showInHome == 1) {
			if(is_home())
				echo suma_tiempo_fondo();
		} else {
			echo suma_tiempo_fondo();
		}
		if($showInHome == 1) {
			if(is_home())
	  			echo $after_widget . "<!-- end of widget -->";
		} else {
  			echo $after_widget . "<!-- end of widget -->";
		}
	}
// This registers our widget so it appears with the other available
// widgets and can be dragged and dropped into any active sidebars.
register_sidebar_widget(array('Dive Log', 'widgets'), 'suma_tiempo_fondo');	
		
}
 
 /* ---- */
 
function modify_menu(){
	add_options_page(
		'Dive Log options',
		'Dive Log',
		'manage_options',
		__FILE__,
		'admin_options');
}

function update_options(){
	$ok = false;
	
	
	if($_REQUEST['temperature'] == 'cent'){
		update_option('temperature','cent');
		$ok = true;

		} else {
				update_option('temperature','far'); 
						$ok = true;
		}
	
	if($_REQUEST['longitude'] == 'm'){
		update_option('longitude','m');
		$ok = true;

		} else {
				update_option('longitude','f'); 
						$ok = true;
		}

	if($_REQUEST['weight'] == 'kg'){
		update_option('weight','kg');
		$ok = true;

		} else {
				update_option('weight','lb'); 
						$ok = true;
		}		
	
	if($_REQUEST['inm_num']){
		update_option('inm_num','yes');
		$ok = true;

		} else {
				update_option('inm_num','no'); 
						$ok = true;
		}
	
	if($_REQUEST['inm_num_icon']){
		update_option('inm_num_icon','yes');
		$ok = true;

		} else {
				update_option('inm_num_icon','no'); 
						$ok = true;
		}
	
	if($_REQUEST['inm_num_icon_path']){
		update_option('inm_num_icon_path',$_REQUEST['inm_num_icon_path']);
		$ok = true;
	}	

	if($_REQUEST['inm_date']){
		update_option('inm_date',$_REQUEST['inm_date']);
		$ok = true;
	}	
	
	if($_REQUEST['inm_name']){
		update_option('inm_name',$_REQUEST['inm_name']);
		$ok = true;
	}
	
	if($_REQUEST['location']){
		update_option('location',$_REQUEST['location']);
		$ok = true;
	}
	
	if($_REQUEST['location_icon']){
		update_option('location_icon',$_REQUEST['location_icon']);
		$ok = true;
	}	
	
	if($_REQUEST['location_icon_path']){
		update_option('location_icon_path',$_REQUEST['location_icon_path']);
		$ok = true;
	}	


	if($_REQUEST['scuba_club']){
		update_option('scuba_club','yes');
		$ok = true;
	} else {
		update_option('scuba_club','no');
		$ok = true; }

	if($_REQUEST['scuba_club_link']){
		update_option('scuba_club_link',$_REQUEST['scuba_club_link']);
		$ok = true;
	}	
	
	
	if($_REQUEST['scuba_club_url']){
		update_option('scuba_club_url',$_REQUEST['scuba_club_url']);
		$ok = true;
	}		
		
	if($_REQUEST['bottom_time']){
		update_option('bottom_time','yes');
		$ok = true;

		} else {
				update_option('bottom_time','no'); 
						$ok = true;
		}

	if($_REQUEST['bottom_time_icon']){
		update_option('bottom_time_icon','yes');
		$ok = true;

		} else {
				update_option('bottom_time_icon','no'); 
						$ok = true;
		}	
		
	if($_REQUEST['bottom_time_icon_path']){
		update_option('bottom_time_icon_path',$_REQUEST['bottom_time_icon_path']);
		$ok = true;
	}
	
	if($_REQUEST['max_depth']){
		update_option('max_depth','yes');
		$ok = true;
	}	else {
		update_option('max_depth','no');
		$ok = true;		
	}
	
	if($_REQUEST['max_depth_icon']){
		update_option('max_depth_icon','yes');
		$ok = true;
	}	else {
		update_option('max_depth_icon','no');
		$ok = true;
	
	}

	if($_REQUEST['max_depth_icon_path']){
		update_option('max_depth_icon_path',$_REQUEST['max_depth_icon_path']);
	}
	
	if($_REQUEST['inm_type']){
		update_option('inm_type','yes');
		$ok = true;
	} else{ 
		update_option('inm_type','no');
		$ok = true;	
	}
	
	if($_REQUEST['inm_type_icon']){
		update_option('inm_type_icon','yes');
		$ok = true;
	} else {
		update_option('inm_type_icon','no');
		$ok = true;		
	}
	
	if($_REQUEST['inm_type_icon_path']){
		update_option('inm_type_icon_path','yes');
		$ok = true;
	}	else {
		update_option('inm_type_icon_path','no');
		$ok = true;	
	}
	
	if($_REQUEST['air_tank']){
		update_option('air_tank',$_REQUEST['air_tank']);
		$ok = true;
	}	

	if($_REQUEST['air_tank_icon']){
		update_option('air_tank_icon',$_REQUEST['air_tank_icon']);
		$ok = true;
	}				

	if($_REQUEST['air_tank_icon_path']){
		update_option('air_tank_icon_path',$_REQUEST['air_tank_icon_path']);
		$ok = true;
	}	
	
	if($_REQUEST['init_pres']){
		update_option('init_pres','yes');
		$ok = true;
	}	else {
		update_option('init_pres','no');
		$ok = true;		
	}

	if($_REQUEST['init_pres_icon']){
		update_option('init_pres_icon','yes');
		$ok = true;
	} else {
		update_option('init_pres_icon','no');
		$ok = true;	
	}				

	if($_REQUEST['init_pres_icon_path']){
		update_option('init_pres_icon_path',$_REQUEST['init_pres_icon_path']);
		$ok = true;
	} 

	if($_REQUEST['final_pres']){
		update_option('final_pres','yes');
		$ok = true;
	}	else {
		update_option('final_pres','no');
		$ok = true;	
	}

	if($_REQUEST['final_pres_icon']){
		update_option('final_pres_icon','yes');
		$ok = true;
	} else {
		update_option('final_pres_icon','no');
		$ok = true;	
	}

	if($_REQUEST['final_pres_icon_path']){
		update_option('final_pres_icon_path',$_REQUEST['final_pres_icon_path']);
		$ok = true;
	} 
	
	if($_REQUEST['weather']){
		update_option('weather','yes');
		$ok = true;

		} else {
				update_option('weather','no'); 
						$ok = true;
		}

	if($_REQUEST['weather_icon']){
		update_option('weather_icon','yes');
		$ok = true;

		} else {
				update_option('weather_icon','no'); 
						$ok = true;
		}	
		
	if($_REQUEST['weather_icon_path']){
		update_option('weather_icon_path',$_REQUEST['weather_icon_path']);
		$ok = true;
	}	
	
	if($_REQUEST['air_temp']){
		update_option('air_temp','yes');
		$ok = true;

		} else {
				update_option('air_temp','no'); 
						$ok = true;
		}

	if($_REQUEST['air_temp_icon']){
		update_option('air_temp_icon','yes');
		$ok = true;

		} else {
				update_option('air_temp_icon','no'); 
						$ok = true;
		}	
		
	if($_REQUEST['air_temp_icon_path']){
		update_option('air_temp_icon_path',$_REQUEST['air_temp_icon_path']);
		$ok = true;
	}		
	
	if($_REQUEST['sea_cond']){
		update_option('sea_cond','yes');
		$ok = true;

		} else {
				update_option('sea_cond','no'); 
						$ok = true;
		}

	if($_REQUEST['sea_cond_icon']){
		update_option('sea_cond_icon','yes');
		$ok = true;

		} else {
				update_option('sea_cond_icon','no'); 
						$ok = true;
		}	
		
	if($_REQUEST['sea_cond_icon_path']){
		update_option('sea_cond_icon_path',$_REQUEST['sea_cond_icon_path']);
		$ok = true;
	}	
	
	if($_REQUEST['sea_temp']){
		update_option('sea_temp','yes');
		$ok = true;

		} else {
				update_option('sea_temp','no'); 
						$ok = true;
		}

	if($_REQUEST['sea_temp_icon']){
		update_option('sea_temp_icon','yes');
		$ok = true;

		} else {
				update_option('sea_temp_icon','no'); 
						$ok = true;
		}	
		
	if($_REQUEST['sea_temp_icon_path']){
		update_option('sea_temp_icon_path',$_REQUEST['sea_temp_icon_path']);
		$ok = true;
	}		
	
	if($_REQUEST['currents']){
		update_option('currents','yes');
		$ok = true;

		} else {
				update_option('currents','no'); 
						$ok = true;
		}

	if($_REQUEST['currents_icon']){
		update_option('currents_icon','yes');
		$ok = true;

		} else {
				update_option('currents_icon','no'); 
						$ok = true;
		}	
		
	if($_REQUEST['currents_icon_path']){
		update_option('currents_icon_path',$_REQUEST['currents_icon_path']);
		$ok = true;
	}		
	
	if($_REQUEST['visibility']){
		update_option('visibility','yes');
		$ok = true;

		} else {
				update_option('visibility','no'); 
						$ok = true;
		}

	if($_REQUEST['visibility_icon']){
		update_option('visibility_icon','yes');
		$ok = true;

		} else {
				update_option('visibility_icon','no'); 
						$ok = true;
		}	
		
	if($_REQUEST['visibility_icon_path']){
		update_option('visibility_icon_path',$_REQUEST['visibility_icon_path']);
		$ok = true;
	}	
	
	if($_REQUEST['suit']){
		update_option('suit','yes');
		$ok = true;

		} else {
				update_option('suit','no'); 
						$ok = true;
		}

	if($_REQUEST['suit_icon']){
		update_option('suit_icon','yes');
		$ok = true;

		} else {
				update_option('suit_icon','no'); 
						$ok = true;
		}	
		
	if($_REQUEST['suit_icon_path']){
		update_option('suit_icon_path','yes');
		$ok = true;
	} else {
		update_option('suit_icon_path','no');
		$ok = true;	
	}
	
	if($_REQUEST['weights']){
		update_option('weights','yes');
		$ok = true;

		} else {
				update_option('weights','no'); 
						$ok = true;
		}

	if($_REQUEST['weights_icon']){
		update_option('weights_icon','yes');
		$ok = true;

		} else {
				update_option('weights_icon','no'); 
						$ok = true;
		}	
		
	if($_REQUEST['weights_icon_path']){
		update_option('weights_icon_path',$_REQUEST['weights_icon_path']);
		$ok = true;
	}		

	if($_REQUEST['computer']){
		update_option('computer','yes');
		$ok = true;

		} else {
				update_option('computer','no'); 
						$ok = true;
		}

	if($_REQUEST['computer_icon']){
		update_option('computer_icon','yes');
		$ok = true;

		} else {
				update_option('computer_icon','no'); 
						$ok = true;
		}	
		
	if($_REQUEST['computer_icon_path']){
		update_option('computer_icon_path',$_REQUEST['computer_icon_path']);
		$ok = true;
	}	
	
	if($_REQUEST['other']){
		update_option('other','yes');
		$ok = true;

		} else {
				update_option('other','no'); 
						$ok = true;
		}

	if($_REQUEST['other_icon']){
		update_option('other_icon','yes');
		$ok = true;

		} else {
				update_option('other_icon','no'); 
						$ok = true;
		}	
		
	if($_REQUEST['other_icon_path']){
		update_option('other_icon_path',$_REQUEST['other_icon_path']);
		$ok = true;
	}		
		
	
	
		
}

function admin_options(){
?> <div class="wrap"><h2>Dive Log Options</h2><?
	if($_REQUEST['submit']){
		update_options();
	} 
	
	print_options_form();
	
	?></div><?php
	
}

function print_options_form(){

	/* INITIALIZING VARIABLES */
	
	update_option('temperature','cent');
	update_option('longitude','m');
	update_option('weight','kg');
	update_option('inm_num','yes');
	update_option('inm_num_icon','yes');
	
	update_option('inm_num_icon_path','inm_num.gif');
	update_option('scuba_club','yes');
	update_option('bottom_time','yes');
	update_option('bottom_time_icon','yes');
	update_option('max_depth','yes');
	update_option('max_depth_icon','yes');
	update_option('max_depth_icon_path','max_depth.gif');
	update_option('inm_type','yes');
	update_option('inm_type_icon','yes');
	update_option('inm_type_icon_path','yes');
	update_option('init_pres','yes');
	update_option('init_pres_icon','yes');
	update_option('init_pres_icon_path','init_pres.gif');
	update_option('final_pres','yes');
	update_option('final_pres_icon','yes');
	update_option('final_pres_icon_path','final_pres.gif');
	update_option('weather','yes');
	update_option('weather_icon','yes');
	update_option('air_temp','yes');
	update_option('air_temp_icon','yes');
	update_option('air_temp_icon_path','air_temp.gif');
	update_option('sea_cond','yes');
	update_option('sea_cond_icon','yes');
	update_option('sea_temp','yes');
	update_option('sea_temp_icon','yes');
	update_option('sea_temp_icon_path','sea_temp.gif');
	update_option('currents','yes');
	update_option('currents_icon','yes');
	update_option('visibility','yes');
	update_option('visibility_icon','yes');
	update_option('suit','yes');
	update_option('suit_icon','yes');
	update_option('weights','yes');
	update_option('weights_icon','yes');
	update_option('weights_icon_path','weights.gif');
	update_option('computer','yes');
	update_option('computer_icon','yes');	
	
	/* END OF VARIABLES INITIALIZATION */
	?>
	<br />
 
	<form method="post">
	<table class="form-table" width="40%">
<tr valign="top">
<th rowspan="4">Localization</th>			
<td><em>Field Name</em></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
	<td>Longitude </td>
	<td><input name="longitude" type="radio" value="m" <?php if (get_option('longitude')=='m') {echo 'checked'; } ?>/>Meters</td>
	<td><input name="longitude" type="radio" value="f" <?php if (get_option('longitude')=='f') {echo 'checked'; } ?>/>Feet</td>
    </tr>
<tr>
	<td>Weight </td>
	<td><input name="weight" type="radio" value="kg" <?php if (get_option('weight')=='kg') {echo 'checked'; } ?> />Kg.</td>
	<td><input name="weight" type="radio" value="lb" <?php if (get_option('weight')=='lb') {echo 'checked'; } ?>/>Lb.</td>
    </tr>
<tr>
	<td>Temperature </td>
	<td><input name="temperature" type="radio" value="cent" <?php if (get_option('temperature')=='cent') {echo 'checked'; } ?> />&deg;C</td>
	<td><input name="temperature" type="radio" value="far" <?php if (get_option('temperature')=='far') {echo 'checked'; } ?>/>&deg;F</td>
    </tr>	
</table>
	
		<table class="form-table">
<tr valign="top">
<th rowspan="7">Inmersion identification </th>		
		<tr>
			<td></td>
			<td><em>Field Name</em></td>
			<td><div align="center"><em>Use Field	</em></div></td>
			<td><div align="center"><em>Show Icon
		    </em></div></td>	
		    <td><div align="center"><em>File Name </em></div></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Date</td>
			<td><input name="inm_date" type="checkbox" value="yes" <?php if (get_option('inm_date')=='yes') {echo 'checked'; }?> /></td>
			<td>&nbsp;</td>	
		    <td>&nbsp;</td>
		</tr>

				
		<tr>
			<td>&nbsp;</td>
			<td>Inmersion number</td>
			<td><input name="inm_num" type="checkbox" value="yes" <?php if (get_option('inm_num')=='yes') {echo 'checked'; }?>   /></td>
			<td><input name="inm_num_icon" type="checkbox" value="yes" <?php if (get_option('inm_num_icon')=='yes') {echo 'checked'; }?>   /></td>	
		    <td><input type="text" name="inm_num_icon_path" size=20" value="<?= get_option('inm_num_icon_path')  ?>" /> </td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>Inmersion Name </td>
		  <td><input name="inm_name" type="checkbox" value="yes" <?php if (get_option('inm_name')=='yes') {echo 'checked'; }?> /></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>Location</td>
		  <td><input name="location" type="checkbox" value="yes" <?php if (get_option('location')=='yes') {echo 'checked'; }?> /></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>Scuba club </td>
		  <td><input name="scuba_club" type="checkbox" value="yes" <?php if (get_option('scuba_club')=='yes') {echo 'checked'; }?> /></td>
		  <td>&nbsp;<!--<input name="scuba_club_link" type="checkbox" value="yes" <?php if (get_option('scuba_club_link')=='yes') {echo 'checked'; }?>  />--></td>
		  <td><input type="text" name="scuba_club_url" size="40" value="<?= get_option('scuba_club_url')  ?>" /></td>
		</tr>		
		


		</table>

		<table class="form-table">
<tr valign="top">
<th rowspan="5">Inmersion details </th>		
		<tr>
			<td></td>
			<td><em>Field Name</em></td>
			<td><div align="center"><em>Use Field	</em></div></td>
			<td><div align="center"><em>Show Icon
		    </em></div></td>	
		    <td><div align="center"><em>File Name </em></div></td>
		</tr>		
		

		
		<tr>
		  <td>&nbsp;</td>
		  <td>Type</td>
		  <td><input name="inm_type" type="checkbox" value="yes" <?php if (get_option('inm_type')=='yes') {echo 'checked'; }?> /></td>
		  <td><input name="inm_type_icon" type="checkbox" value="yes" <?php if (get_option('inm_type_icon')=='yes') {echo 'checked'; }?> /></td>
		  <td>&nbsp;<!--<input type="inm_type_icon_path" name="bottom_time_icon2" size="20" value="<?= get_option('inm_type_icon_path')  ?>" />--></td>
		  </tr>
		<tr>
			<td>&nbsp;</td>
			<td>Bottom Time</td>
			<td><input name="bottom_time" type="checkbox" value="yes" <?php if (get_option('bottom_time')=='yes') {echo 'checked'; }?>  /></td>
			<td><input name="bottom_time_icon" type="checkbox" value="yes" <?php if (get_option('bottom_time_icon')=='yes') {echo 'checked'; }?> /></td>	
		    <td><input type="text" name="bottom_time_icon_path" size="20" value="<?= get_option('bottom_time_icon_path')  ?>" /></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td>Max. Depth</td>
			<td><input name="max_depth" type="checkbox" value="yes" <?php if (get_option('max_depth')=='yes') {echo 'checked'; }?> /></td>
			<td><input name="max_depth_icon" type="checkbox" value="yes" <?php if (get_option('max_depth_icon')=='yes') {echo 'checked'; }?> /></td>	
		    <td><input type="text" name="max_depth_icon_path" size="20"  value="<?= get_option('max_depth_icon_path')  ?>"/></td>
		</tr>				
	  </table>
<table class="form-table">
<tr valign="top">
<th rowspan="5">Air  details </th>		
	<tr>
			<td></td>
			<td><em>Field Name</em></td>
			<td><div align="center"><em>Use Field	</em></div></td>
			<td><div align="center"><em>Show Icon
		    </em></div></td>	
		    <td><div align="center"><em>File Name </em></div></td>
	</tr>		
		

		
		<tr>
			<td>&nbsp;</td>
			<td>Air Tank capacity </td>
			<td><input name="air_tank" type="checkbox" value="yes" <?php if (get_option('air_tank')=='yes') {echo 'checked'; }?> /></td>
			<td>&nbsp; <!-- <input name="air_tank_icon" type="checkbox" value="yes" <?php if (get_option('air_tank_icon')=='yes') {echo 'checked'; }?> /></td> -->	
		    <td>&nbsp; <!-- <input type="text" name="air_tank_icon_path" size="20" value="<?= get_option('air_tank_icon_path')  ?>" />--></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td>Initial pressure</td>
			<td><input name="init_pres" type="checkbox" value="yes" <?php if (get_option('init_pres')=='yes') {echo 'checked'; }?> /></td>
			<td><input name="init_pres_icon" type="checkbox" value="yes" <?php if (get_option('init_pres_icon')=='yes') {echo 'checked'; }?> /></td>	
		    <td><input type="text" name="init_pres_icon_path" size="20"  value="<?= get_option('init_pres_icon_path')  ?>"/></td>
		</tr>				
		<tr>
			<td>&nbsp;</td>
			<td>Final pressure</td>
			<td><input name="final_pres" type="checkbox" value="yes" <?php if (get_option('final_pres')=='yes') {echo 'checked'; }?> /></td>
			<td><input name="final_pres_icon" type="checkbox" value="yes" <?php if (get_option('final_pres_icon')=='yes') {echo 'checked'; }?> /></td>	
		    <td><input type="text" name="final_pres_icon_path" size="20"  value="<?= get_option('final_pres_icon_path')  ?>"/></td>
		</tr>		
	  </table>	  

<table class="form-table">
<tr valign="top">
<th rowspan="8">Weather and sea conditions </th>		
	<tr>
			<td></td>
			<td><em>Field Name</em></td>
			<td><div align="center"><em>Use Field	</em></div></td>
			<td><div align="center"><em>Show Icon
		    </em></div></td>	
		    <td><div align="center"><em>File Name </em></div></td>
	</tr>		
		

		
		<tr>
			<td>&nbsp;</td>
			<td>Weather</td>
			<td><input name="weather" type="checkbox" value="yes" <?php if (get_option('weather')=='yes') {echo 'checked'; }?> /></td>
			<td><input name="weather_icon" type="checkbox" value="yes" <?php if (get_option('weather_icon')=='yes') {echo 'checked'; }?> /></td>	
		    <td>&nbsp;<!-- <input type="text" name="weather_icon_path" size="20" value="<?= get_option('weather_icon_path')  ?>" />--></td>
		</tr>
		
		<tr>
		  <td>&nbsp;</td>
		  <td>Air Temp.</td>
		  <td><input name="air_temp" type="checkbox" value="yes" <?php if (get_option('air_temp')=='yes') {echo 'checked'; }?> /></td>
		  <td><input name="air_temp_icon" type="checkbox" value="yes" <?php if (get_option('air_temp_icon')=='yes') {echo 'checked'; }?> /></td>
		  <td><input type="text" name="air_temp_icon_path" size="20" value="<?= get_option('air_temp_icon_path')  ?>" /></td>
    </tr>
		<tr>
			<td>&nbsp;</td>
			<td>Sea conditions </td>
			<td><input name="sea_cond" type="checkbox" value="yes" <?php if (get_option('sea_cond')=='yes') {echo 'checked'; }?> /></td>
			<td><input name="sea_cond_icon" type="checkbox" value="yes" <?php if (get_option('sea_cond_icon')=='yes') {echo 'checked'; }?> /></td>	
		    <td>&nbsp;<!--<input type="text" name="sea_cond_icon_path" size="20"  value="<?= get_option('sea_cond_icon_path')  ?>"/>--></td>
		</tr>				
		<tr>
		  <td>&nbsp;</td>
		  <td>Water Temp. </td>
		  <td><input name="sea_temp" type="checkbox" value="yes" <?php if (get_option('sea_temp')=='yes') {echo 'checked'; }?> /></td>
		  <td><input name="sea_temp_icon" type="checkbox" value="yes" <?php if (get_option('sea_temp_icon')=='yes') {echo 'checked'; }?> /></td>
		  <td><input type="text" name="sea_temp_icon_path" size="20"  value="<?= get_option('sea_temp_icon_path')  ?>"/></td>
    </tr>
		<tr>
			<td>&nbsp;</td>
			<td>Currents</td>
			<td><input name="currents" type="checkbox" value="yes" <?php if (get_option('currents')=='yes') {echo 'checked'; }?> /></td>
			<td><input name="currents_icon" type="checkbox" value="yes" <?php if (get_option('currents_icon')=='yes') {echo 'checked'; }?> /></td>	
		    <td>&nbsp;<!--<input type="text" name="currents_icon_path" size="60"  value="<?= get_option('currents_icon_path')  ?>"/>--></td>
		</tr>		
		<tr>
			<td>&nbsp;</td>
			<td>Visibility</td>
			<td><input name="visibility" type="checkbox" value="yes" <?php if (get_option('visibility')=='yes') {echo 'checked'; }?> /></td>
			<td><input name="visibility_icon" type="checkbox" value="yes" <?php if (get_option('visibility_icon')=='yes') {echo 'checked'; }?> /></td>	
		    <td>&nbsp; <!-- <input type="text" name="visibility_icon_path" size="60"  value="<?= get_option('visibility_icon_path')  ?>"/>--> </td>
		</tr>			
	  </table>	
	   		
<table class="form-table">
<tr valign="top">
<th rowspan="6">Equipment</th>		
	<tr>
			<td></td>
			<td><em>Field Name</em></td>
			<td><div align="center"><em>Use Field	</em></div></td>
			<td><div align="center"><em>Show Icon
		    </em></div></td>	
		    <td><div align="center"><em>File Name </em></div></td>
	</tr>		
		

		
		<tr>
			<td>&nbsp;</td>
			<td>Suit</td>
			<td><input name="suit" type="checkbox" value="yes" <?php if (get_option('suit')=='yes') {echo 'checked'; }?> /></td>
			<td><input name="suit_icon" type="checkbox" value="yes" <?php if (get_option('suit_icon')=='yes') {echo 'checked'; }?> /></td>
			<td>&nbsp<!-- <input type="text" name="suit_icon_path" size="20" value="<?= get_option('icon_tiempo_fondo')  ?>" />--></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td>Weights</td>
			<td><input name="weights" type="checkbox" value="yes" <?php if (get_option('weights')=='yes') {echo 'checked'; }?> /></td>
			<td><input name="weights_icon" type="checkbox" value="yes" <?php if (get_option('weights_icon')=='yes') {echo 'checked'; }?> /></td>	
		    <td><input type="text" name="weights_icon_path" size="20"  value="<?= get_option('weights_icon_path')  ?>"/></td>
		</tr>				
		<tr>
			<td>&nbsp;</td>
			<td>Computer</td>
			<td><input name="computer" type="checkbox" value="yes" <?php if (get_option('computer')=='yes') {echo 'checked'; }?> /></td>
			<td><input name="computer_icon" type="checkbox" value="yes" <?php if (get_option('computer_icon')=='yes') {echo 'checked'; }?> /></td>	
		    <td>&nbsp;</td>
		</tr>		
		<tr>
			<td>&nbsp;</td>
			<td>Other</td>
			<td><input name="other" type="checkbox" value="on" <?php if (get_option('other')=='yes') {echo 'checked'; }?> /></td>
			<td>&nbsp;</td>	
		    <td>&nbsp;</td>
		</tr>			
	  </table>			
		<p class="submit">
			<input type="submit" name="submit" value="Guardar Cambios" >
		</p>
</form>
	
	<?php
}

add_action('edit_form_advanced', 'my_plugin_input');
add_action('save_post', 'post_data');
add_action('edit_post', 'post_data');
add_action('publish_post', 'post_data');
add_action('save_post', 'post_data');

add_action('wp_head', 'divelog_css');
add_filter('the_content' , 'divelog_show');

add_action('widgets_init', 'widget_divelog_init');

add_action('admin_menu','modify_menu');

?>
