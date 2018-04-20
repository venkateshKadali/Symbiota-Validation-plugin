<?php
function valid_add_custom_metabox(){

	add_meta_box(
		'valid_meta',
		'Validation',
		'validation_meta_callback',
		'validation',
		'normal',
		'high'
	);

}

add_action('add_meta_boxes', 'valid_add_custom_metabox');


function validation_meta_callback( $post ){
	wp_nonce_field( basename(__FILE__ ), 'valid_jobs_nonce');
	$valid_stored_meta = get_post_meta( $post->ID );
	?>

<form action="#" method="POST">
			<div style="margin:15px;">
				<table cellspacing='3'>
					<tr>
						<td style="width:120px;">
							<b>Login:</b>
						</td>
						<td>
							<input name="login" value="<?php echo $login; ?>" size="20" /> 
							<span style="color:red;">*</span>
							<input type='checkbox' name='cb_login' value='login' /> <?php echo ""; ?>
							<br/>&nbsp;
						</td>
					</tr>
					<tr>
						<td>
							<b>Password:</b>
						</td>
						<td>
							<input name="pwd" id="pwd" value="" size="20" type="password" autocomplete="off" /> 
							<span style="color:red;">*</span>
							<input type='checkbox' name='cb_pwd' value='pwd' /> <?php echo ""; ?>
						</td> 
					</tr>
					<tr>
						<td>
							<b>Password Again:</b> 
						</td>
						<td>
							<input id="pwd2" name="pwd2" value="" size="20" type="password" autocomplete="off" /> 
							<span style="color:red;">*</span>
							<input type='checkbox' name='cb_pwd2' value='pwd2' /> <?php echo ""; ?>
							<br/>&nbsp;
						</td> 
					</tr>
					<tr>
						<td><span style="font-weight:bold;">First Name:</span></td>
						<td>
							<input id="firstname" name="firstname" size="40" value="<?php echo (isset($_POST['firstname'])?htmlspecialchars($_POST['firstname']):''); ?>"> 
							<span style="color:red;">*</span>
							<input type='checkbox' name='cb_firstname' value='firstname' /> <?php echo ""; ?>
						</td>
					</tr>
					<tr>
						<td><span style="font-weight:bold;">Last Name:</span></td>
						<td>
							<input id="lastname" name="lastname" size="40" value="<?php echo (isset($_POST['lastname'])?htmlspecialchars($_POST['lastname']):''); ?>"> 
							<span style="color:red;">*</span>
							<input type='checkbox' name='cb_lastname' value='lastname' /> <?php echo ""; ?>
						</td>
					</tr>
					<tr>
						<td><span style="font-weight:bold;">Email Address:</span></td>
						<td>
							<span class="profile"><input name="emailaddr"  size="40" value="<?php echo $emailAddr; ?>"></span> 
							<span style="color:red;">*</span>
							<input type='checkbox' name='cb_emailaddr' value='emailaddr' /> <?php echo ""; ?>

						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><span style="color:red;">* required fields</span></td>
					</tr>
				</table>

				<div style="margin:15px 0px 10px 0px;"><b><u>Information below is optional, but encouraged</u></b></div>
				<table cellspacing='3'>
					<tr>
						<td><b>Title:</b></td>
						<td>
							<span class="profile"><input name="title"  size="40" value="<?php echo (isset($_POST['title'])?htmlspecialchars($_POST['title']):''); ?>"></span>
							<input type='checkbox' name='cb_title' value='title' /> <?php echo ""; ?>
						</td>
					</tr>
					<tr>
						<td><b>Institution:</b></td>
						<td>
							<span class="profile"><input name="institution"  size="40" value="<?php echo (isset($_POST['institution'])?htmlspecialchars($_POST['institution']):'') ?>"></span>
							<input type='checkbox' name='cb_institution' value='institution' /> <?php echo ""; ?>
						</td>
					</tr>
                    <tr>
                        <td><b>Department:</b></td>
                        <td>
                            <span class="profile"><input name="department"  size="40" value="<?php echo (isset($_POST['department'])?htmlspecialchars($_POST['department']):'') ?>"></span>
                            <input type='checkbox' name='cb_department' value='department' /> <?php echo ""; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Street Address:</b></td>
                        <td>
                            <span class="profile"><input name="address"  size="40" value="<?php echo (isset($_POST['address'])?htmlspecialchars($_POST['address']):'') ?>"></span>
                            <input type='checkbox' name='cb_address' value='address' /> <?php echo ""; ?>
                        </td>
                    </tr>
					<tr>
						<td><span style="font-weight:bold;">City:</span></td>
						<td>
							<span class="profile"><input id="city" name="city" size="40" value="<?php echo (isset($_POST['city'])?$_POST['city']:''); ?>"></span>
							<input type='checkbox' name='cb_city' value='city' /> <?php echo ""; ?>
						</td>
					</tr>
					<tr>
						<td><span style="font-weight:bold;">State:</span></td>
						<td>
							<span class="profile"><input id="state" name="state"  size="40" value="<?php echo (isset($_POST['state'])?htmlspecialchars($_POST['state']):''); ?>"></span>
							<input type='checkbox' name='cb_state' value='state' /> <?php echo ""; ?>
						</td>
					</tr>
					<tr>
						<td><b>Zip Code:</b></td>
						<td>
							<span class="profile"><input name="zip"  size="40" value="<?php echo (isset($_POST['zip'])?htmlspecialchars($_POST['zip']):''); ?>"></span>
							<input type='checkbox' name='cb_zip' value='zip' /> <?php echo ""; ?>
						</td>
					</tr>
					<tr>
						<td><span style="font-weight:bold;">Country:</span></td>
						<td>
							<span class="profile"><input id="country" name="country"  size="40" value="<?php echo (isset($_POST['country'])?htmlspecialchars($_POST['country']):''); ?>"></span>
							<input type='checkbox' name='cb_country' value='country' /> <?php echo ""; ?>
						</td>
					</tr>
					<tr>
						<td><b>Url:</b></td>
						<td>
							<span class="profile"><input name="url"  size="40" value="<?php echo (isset($_POST['url'])?htmlspecialchars($_POST['url']):''); ?>"></span>
							<input type='checkbox' name='cb_url' value='url' /> <?php echo ""; ?>
						</td>
					</tr>
					<tr>
						<td><b>Biography:</b></td>
						<td>
							<span class="profile">
								<textarea name="biography" rows="4" cols="40"><?php echo (isset($_POST['biography'])?htmlspecialchars($_POST['biography']):''); ?></textarea>
								<input type='checkbox' name='cb_biography' value='biography' /> <?php echo ""; ?>
							</span>
						</td>
					</tr>
				</table>
			</div>

		</form>

	<?php
	
}


function valid_meta_save($post){
	$is_autosave = wp_is_post_autosave($post);
	$is_revision = wp_is_post_revision($post);
	$is_valid_nonce = (isset($_POST['symbiota_jobs_nonce']) &&  wp_verify_nonce( 
		$_POST[ 'symbiota_jobs_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	if(isset($_POST['cb_login'])){
		update_post_meta($post, 'cb_login', sanitize_text_field($_POST['cb_login']));
	}
	if(isset($_POST['cb_pwd'])){
		update_post_meta($post, 'cb_pwd', sanitize_text_field($_POST['cb_pwd']));
	}
	if(isset($_POST['cb_pwd2'])){
		update_post_meta($post, 'cb_pwd2', sanitize_text_field($_POST['cb_pwd2']));
	}
	if(isset($_POST['cb_firstname'])){
		update_post_meta($post, 'cb_firstname', sanitize_text_field($_POST['cb_firstname']));
	}
	if(isset($_POST['cb_lastname'])){
		update_post_meta($post, 'cb_lastname', sanitize_text_field($_POST['cb_lastname']));
	}
	if(isset($_POST['cb_emailaddr'])){
		update_post_meta($post, 'cb_emailaddr', sanitize_text_field($_POST['cb_emailaddr']));
	}
		if(isset($_POST['cb_title'])){
		update_post_meta($post, 'cb_title', sanitize_text_field($_POST['cb_title']));
	}
		if(isset($_POST['cb_institution'])){
		update_post_meta($post, 'cb_institution', sanitize_text_field($_POST['cb_institution']));
	}
		if(isset($_POST['cb_department'])){
		update_post_meta($post, 'cb_department', sanitize_text_field($_POST['cb_department']));
	}
		if(isset($_POST['cb_address'])){
		update_post_meta($post, 'cb_address', sanitize_text_field($_POST['cb_address']));
	}
		if(isset($_POST['cb_city'])){
		update_post_meta($post, 'cb_city', sanitize_text_field($_POST['cb_city']));
	}
		if(isset($_POST['cb_state'])){
		update_post_meta($post, 'cb_state', sanitize_text_field($_POST['cb_state']));
	}
		if(isset($_POST['cb_zip'])){
		update_post_meta($post, 'cb_zip', sanitize_text_field($_POST['cb_zip']));
	}
		if(isset($_POST['cb_country'])){
		update_post_meta($post, 'cb_country', sanitize_text_field($_POST['cb_country']));
	}
		if(isset($_POST['cb_url'])){
		update_post_meta($post, 'cb_url', sanitize_text_field($_POST['cb_url']));
	}
		if(isset($_POST['cb_biography'])){
		update_post_meta($post, 'cb_biography', sanitize_text_field($_POST['cb_biography']));
	}
	return $post;
}
add_action('save_post', 'valid_meta_save');
?>
