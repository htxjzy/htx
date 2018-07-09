<?php if(is_home()){ ?>
<title><?php echo get_option('htx_home_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_home_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_home_description'); ?>"/> 
<?php } elseif(is_post_type_archive( array('experts') )) { ?> 
<title><?php echo get_option('htx_experts_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_experts_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_experts_description'); ?>"/> 
<?php } elseif(is_post_type_archive( array('assignments') )) { ?> 
<title><?php echo get_option('htx_assignments_big_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_assignments_big_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_assignments_big_description'); ?>"/> 
<?php } elseif(is_tax( 'assignmentstax', 'consulting' )) { ?> 
<title><?php echo get_option('htx_assignmentstax_consulting_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_assignmentstax_consulting_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_assignmentstax_consulting_description'); ?>"/> 
<?php } elseif(is_tax( 'assignmentstax', 'investigation' )) { ?> 
<title><?php echo get_option('htx_assignmentstax_investigation_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_assignmentstax_investigation_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_assignmentstax_investigation_description'); ?>"/> 
<?php } elseif(is_tax( 'assignmentstax', 'design' )) { ?> 
<title><?php echo get_option('htx_assignmentstax_design_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_assignmentstax_design_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_assignmentstax_design_description'); ?>"/> 
<?php } elseif(is_tax( 'assignmentstax', 'bidding' )) { ?> 
<title><?php echo get_option('htx_assignmentstax_bidding_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_assignmentstax_bidding_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_assignmentstax_bidding_description'); ?>"/> 
<?php } elseif(is_tax( 'assignmentstax', 'cost' )) { ?> 
<title><?php echo get_option('htx_assignmentstax_cost_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_assignmentstax_cost_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_assignmentstax_cost_description'); ?>"/> 
<?php } elseif(is_tax( 'assignmentstax', 'supervision' )) { ?> 
<title><?php echo get_option('htx_assignmentstax_supervision_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_assignmentstax_supervision_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_assignmentstax_supervision_description'); ?>"/> 
<?php } elseif(is_tax( 'assignmentstax', 'construction' )) { ?> 
<title><?php echo get_option('htx_assignmentstax_construction_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_assignmentstax_construction_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_assignmentstax_construction_description'); ?>"/> 
<?php } elseif(is_tax( 'assignmentstax', 'finance' )) { ?> 
<title><?php echo get_option('htx_assignmentstax_finance_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_assignmentstax_finance_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_assignmentstax_finance_description'); ?>"/> 
<?php } elseif(is_tax( 'assignmentstax', 'valuation' )) { ?> 
<title><?php echo get_option('htx_assignmentstax_valuation_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_assignmentstax_valuation_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_assignmentstax_valuation_description'); ?>"/> 
<?php } elseif(is_tax( 'assignmentstax', 'rest' )) { ?> 
<title><?php echo get_option('htx_assignmentstax_rest_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_assignmentstax_rest_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_assignmentstax_rest_description'); ?>"/> 
<?php } elseif(is_post_type_archive( array('shops') )) { ?> 
<title><?php echo get_option('htx_shops_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_shops_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_shops_description'); ?>"/> 
<?php } elseif(is_post_type_archive( array('voices') )) { ?> 
<title><?php echo get_option('htx_voices_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_voices_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_voices_description'); ?>"/> 
<?php } elseif(is_post_type_archive( array('stories') )) { ?> 
<title><?php echo get_option('htx_stories_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_stories_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_stories_description'); ?>"/> 
<?php } elseif(is_post_type_archive( array('news') )) { ?> 
<title><?php echo get_option('htx_news_title'); ?></title>
<meta name="keywords" content="<?php echo get_option('htx_news_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('htx_news_description'); ?>"/> 
<?php } else { ?> 
<title><?php the_title(); ?></title>
<meta name="keywords" content="<?php echo esc_html( get_post_meta(get_the_ID(),'page2_keywords',true)); ?>" />
<meta name="description" content="<?php  echo esc_html( get_post_meta($post->ID,'page2_description',true)); ?>"/>
<?php } ?> 