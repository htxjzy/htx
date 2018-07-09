<?php
//Add the CSS file to the WP management background
function htx_add_css_admin_bo(){
	echo '<link rel="stylesheet" type="text/css" href="'.home_url().'/p/css/admin/htx-admin.css">';
}
add_action('admin_head', 'htx_add_css_admin_bo');


//Customizing user personal contact information
add_filter( 'user_contactmethods', 'z100_add_contact_fields' );
function z100_add_contact_fields( $contactmethods ) {
	$contactmethods['custom_user_mobile'] 	= '手机号码';
	//$contactmethods['custom_user_phone'] 	= '联系电话';
	//unset( $contactmethods['custom_user_phone'] );
	return $contactmethods;
}

//When admin edits the information of user, these fields are displayed
add_action('edit_user_profile','user_edit_extends_fields',10,1); 
function user_edit_extends_fields($profileuser){  
    $custom_user_notes     = get_user_meta($profileuser->ID, 'custom_user_notes', true);  
    ?> 
    <h3><?php _e('针对该用户') ?></h3>       
    <table class="form-table">  
    <!--<tr>  
        <td colspan="2"><?//php _e('针对给用户') ?></td>  
    </tr>-->  
    <tr>  
        <th>  
        <label for="custom_user_notes"><?php _e('备注') ?></label></th>  
        <td>  
        <!--<input type="text" name="custom_user_notes" id="custom_user_notes" class="input" size="20" value="<?//php echo $custom_user_notes; ?>" />-->  
      	<textarea name="custom_user_notes" id="custom_user_notes" rows="3" cols="30"><?php echo $custom_user_notes; ?></textarea>
        </td>  
    </tr>  
    </table>  
    <?php  
} 
    
//Admin saves these fields when editting user's information
add_action('edit_user_profile_update', 'user_extends_fields_save', 10, 1);   	
function user_extends_fields_save($user_id){  
     $custom_user_notes = trim($_POST['custom_user_notes']);           
     update_user_meta($user_id, 'custom_user_notes', $custom_user_notes);  
}   
