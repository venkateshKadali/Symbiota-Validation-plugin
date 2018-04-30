    <?php

include_once('symbiota/config/symbini.php');



add_shortcode('valid', 'valid_shortcode_function');

function valid_shortcode_function($attr, $content){

    extract(shortcode_atts(array(
        'id' => ''
    ), $attr));
    ?>

    <script type="text/javascript">
        function validateform(f){
            var pwd1 = f.password.value;
            var pwd2 = f.passwordAgain.value;
            if(pwd1 == "" || pwd2 == ""){
                alert("Both password fields must contain a value");
                return false;
            }
            if(pwd1.charAt(0) == " " || pwd1.slice(-1) == " "){
                alert("Password cannot start or end with a space, but they can include spaces within the password");
                return false;
            }
            if(pwd1.length < 7){
                alert("Password must be greater than 6 characters");
                return false;
            }
            if(pwd1 != pwd2){
                alert("Password do not match, please enter again");
                f.pwd.value = "";
                f.pwd2.value = "";
                f.pwd2.focus();
                return false;
            }
            if(f.login.value.replace(/\s/g, "") == ""){
                window.alert("User Name must contain a value");
                return false;
            }
            if( /[^0-9A-Za-z_!@#$-+]/.test( f.login.value ) ) {
                alert("Login name should only contain 0-9A-Za-z_!@ (spaces are not allowed)");
                return false;
            }
            if(f.emailaddr.value.replace(/\s/g, "") == "" ){
                window.alert("Email address is required");
                return false;
            }
            if(f.firstname.value.replace(/\s/g, "") == ""){
                window.alert("First Name must contain a value");
                return false;
            }
            if(f.lastname.value.replace(/\s/g, "") == ""){
                window.alert("Last Name must contain a value");
                return false;
            }
    
            return true;
        }
</script>
 <body>   

    <form name="newProfile" id="newProfile" action="../wp-content/plugins/valid/update.php" method="post" onsubmit="return validateform(this);">
        <?php

// onsubmit="return checkHarvestparamsForm(this);
        if(get_post_meta($id, 'cb_login') != NULL){
                ?>
                <div>
                    <?php echo "Login: " ?> <span style="color:red;">*</span><input type="text" id="login" size="43" name="login" value="" />
                </div>
                <?php
        }

        if(get_post_meta($id, 'cb_pwd') != NULL){
                ?>
                <div>
                    <?php echo "Password: " ?><span style="color:red;">*</span> <input type="password" id="password" size="43" name="password" value=""/>
                </div>
                <?php
        }

        if(get_post_meta($id, 'cb_pwd2') != NULL){
                ?>
                <div>
                    <?php echo "Password Again: " ?><span style="color:red;">*</span> <input type="password" id="passwordAgain" size="43" name="passwordAgain" value="" />
                </div>
                <?php
        }

        if(get_post_meta($id, 'cb_firstname') != NULL){
                ?>
                <div>
                    <?php echo "First Name: " ?><span style="color:red;">*</span> <input type="text" id="firstname" size="43" name="firstname" value="" />
                </div>
                <?php
        }

        if(get_post_meta($id, 'cb_lastname') != NULL){
                ?>
                <div>
                    <?php echo "Last Name: " ?> <span style="color:red;">*</span><input type="text" id="lastname" size="43" name="lastname" value="" />
                </div>
                <?php
        }

        if(get_post_meta($id, 'cb_emailaddr') != NULL){
                ?>
                <div>
                    <?php echo "Email Address: " ?><span style="color:red;">*</span> <input type="text" id="emailaddr" size="43" name="emailaddr" value=""/>

                </div>
                <?php
        }
        if(get_post_meta($id, 'cb_title') != NULL){
                ?>
                <div>
                    <?php echo "Title: " ?> <input type="text" id="title" size="43" name="title" value=""/>
                </div>
                <?php
        }
        if(get_post_meta($id, 'cb_institution') != NULL){
                ?>
                <div>
                    <?php echo "Institution: " ?> <input type="text" id="institution" size="43" name="institution" value=""/>
                </div>
                <?php
        }
        if(get_post_meta($id, 'cb_department') != NULL){
                ?>
                <div>
                    <?php echo "Department: " ?> <input type="text" id="department" size="43" name="department" value=""/>
                </div>
                <?php
        }
        if(get_post_meta($id, 'cb_address') != NULL){
                ?>
                <div>
                    <?php echo "Street Address: " ?> <input type="text" id="address" size="43" name="address" value=""/>
                </div>
                <?php
        }
        if(get_post_meta($id, 'cb_city') != NULL){
                ?>
                <div>
                    <?php echo "City: " ?> <input type="text" id="city" size="43" name="city" value=""/>
                </div>
                <?php
        }
        if(get_post_meta($id, 'cb_state') != NULL){
                ?>
                <div>
                    <?php echo "State: " ?> <input type="text" id="state" size="43" name="state" value=""/>
                </div>
                <?php
        }
        if(get_post_meta($id, 'cb_zip') != NULL){
                ?>
                <div>
                    <?php echo "Zip Code: " ?> <input type="text" id="zip" size="43" name="zip" value=""/>
                </div>
                <?php
        }
        if(get_post_meta($id, 'cb_country') != NULL){
                ?>
                <div>
                    <?php echo "Country: " ?> <input type="text" id="country" size="43" name="country" value=""/>
                </div>
                <?php
        }
        if(get_post_meta($id, 'cb_url') != NULL){
                ?>
                <div>
                    <?php echo "Url: " ?> <input type="text" id="url" size="43" name="url" value=""/>
                </div>
                <?php
        }
        if(get_post_meta($id, 'cb_biography') != NULL){
                ?>
                <div>
                    <?php echo "Biography: " ?> <input type="text" id="biography" size="43" name="biography" value=""/>
                </div>
                <?php
        }
        ?>
        <div style="margin-bottom:10px; margin-top: 10px"><input type="submit" name="submit" class="nextbtn" value="Create Login" /></div>
    </form>
</body>
    <?php
}
?>

<?php

    function valid_post_type(){	
    	$singular = __('Validation');
    	$plural = __('Validations');
    	$slug1 = str_replace( ' ', '_', strtolower( $singular ) );

    	$labels = array(
    		'name'				=>$plural,
    		'singular_name'		=>$singular,
    		'add_new'			=>'Add New',
    		'add_new_item'		=>'Add New ' . $singular,
    		'edit'				=>'Edit',
    		'edit_item'			=>'Edit ' . $singular,
    		'new_item'			=>'New' . $singular,
    		'view'				=>'View ' . $singular,
    		'view_item'			=>'View ' . $singular,
    		'search_term'		=>'Search ' . $plural,
    		'parent'			=>'Parent' .$singular,
    		'not_found'			=>'No ' . $plural . ' found',
    		'not_found_in_trash'=>'No ' . $plural . ' in Trash'
    	);

    	$args = array(
    		'labels'              => $labels,
    		'public'              => true,
    		'publicly_queryable'  => true,
    		'exclude_from_search' => false,
    		'show_in_nav_menus'   => true,
    		'show_ui'             => true,
    		'show_in_menu'        => true,
    		'show_in_admin_bar'   => true,
    		'menu_position'       => 10,
    		'menu_icon'           => 'dashicons-admin-plugins',
    		'can_export'          => true,
    		'delete_with_user'    => false,
    		'hierarchical'        => true,
    		'has_archive'         => true,
    		'query_var'           => true,
    		'capability_type'     => 'post',
    		'map_meta_cap'        => true,
	        // 'capabilities' => array(),
    		'rewrite'             => array( 
    			'slug' => 'validation',
    			'with_front' => true,
    			'pages' => true,
    			'feeds' => true,
    		),
    		'supports'            => array( 
    			'title' ,
    		)
    	);


    	register_post_type($slug1, $args);


    }
    add_action('init', 'valid_post_type');

    add_filter('manage_edit-validation_columns', 'valid_set_columns');
    add_action('manage_validation_posts_custom_column', 'valid_custom_column', 10, 2);

    function valid_set_columns($columns) {
        return $columns
        + array('valid_shortcode' => __('Shortcode'));
    }

    function valid_custom_column($column, $post_id) {
        $slider_meta = get_post_meta($post_id, "_selected_items", true);
        echo "[valid id='$post_id' /]";

    }

?>


