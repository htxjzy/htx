<?php
//The number of words that limit the content of a comment
function excerptsubject($comment_id, $max_length) {		
   	$subject_str = get_comment($comment_id)->comment_content;
   	if (mb_strlen($subject_str,'utf-8') > $max_length ) {
   	$subject_str = mb_substr($subject_str, 0, $max_length, 'utf-8');
   	}
   	return $subject_str;
}

/*function on_publish_draft_post( $post ) {
    file_put_contents("publish_post6.txt", "bbbbaaaa");
}
add_action(  'draft_to_publish',  'on_publish_draft_post', 10, 1 );

function on_publish_pending_post( $post ) {
    file_put_contents("publish_post7.txt", "bbbbaaaa");
}
add_action(  'pending_to_publish',  'on_publish_pending_post', 10, 1 );*/



//file_put_contents("publish_post4.txt", "bbbbaaaa");

//file_put_contents("publish_post3.txt", "bbbbaaaa");


//file_put_contents("test.txt", "aaabbbccc");


/*function on_publish_draft_post( $new_status, $old_status, $post ) {
    file_put_contents("publish_post7.txt", "bbbbaaaa");
}
add_action( 'transition_post_status',  'on_publish_draft_post', 10, 1 );*/



/*//create a newtable
function the_table_install () {   

    global $wpdb;

    $table_name = $wpdb->prefix . "listen_user_qq";  //获取表前缀，并设置新表的名称

    if($wpdb->get_var("show tables like $table_name") != $table_name) {  //判断表是否已存在

        $sql = "CREATE TABLE " . $table_name . " (

          id bigint(20) NOT NULL AUTO_INCREMENT,
		  
		  username VARCHAR(50) DEFAULT '' NOT NULL,
		  
		  lastlogin datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		  
		  sex VARCHAR(10) DEFAULT '' NOT NULL,
		  
		  province VARCHAR(50) DEFAULT '' NOT NULL,
		  
		  city VARCHAR(50) DEFAULT '' NOT NULL,
		  
		  birthday VARCHAR(50) DEFAULT '' NOT NULL,
		  
		  pic VARCHAR(150) DEFAULT '' NOT NULL,
		  
		  openid VARCHAR(150) DEFAULT '' NOT NULL,
		  		  
		  PRIMARY KEY (openid),
		  
          UNIQUE KEY id (id)

          );";

        require_once(ABSPATH . "wp-admin/includes/upgrade.php");  //引用wordpress的内置方法库

        dbDelta($sql);

    }

}*/
