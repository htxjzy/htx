<?php get_header(); ?>
<link rel="stylesheet" href="/p/css/original_main.css">
<div class="layui-carousel htx_banners" id="htx_banners2">
  <div carousel-item>
    <div style="background:url(/p/images/banners/banner_task.jpg) center top no-repeat;"><a style="display:block; width:100%; height:450px;" href="#"></a></div>
    <div style="background:url(/p/images/banners/banner_task.jpg) center top no-repeat;"><a style="display:block; width:100%; height:450px;" href="#"></a></div>
  </div>
</div>
<div class="wrap-for-s">
<?php include TEMPLATEPATH.'/t_inc_nav_box.php'; ?>
<div class="dyn-nav dyn-nav-for-s">
	<blockquote class="layui-elem-quote">当前位置 <i class="layui-icon" style="font-size:22px; margin:0 10px; color:#FF5722;"></i> <a href="/" title="返回首页">首页</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;"></i> <span>需求大全</span>
    </blockquote>
</div>
    <div class="task">
        <div class="layui-main layui-main-assignments">
<div class="task-cat layui-clear  pb35">
<fieldset class="layui-elem-field">
<legend>工程咨询</legend>
<div class="layui-field-box">
<div class="htx-engineering-box layui-clear">
                        <div class="htx-box-left">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'consulting'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'recommended')	
);
include TEMPLATEPATH.'/a_inc_recommended_box.php';
?> 
                            
                            <div class="listing-box">
                                <h3>
                                    <i class="layui-icon" style="font-size:28px; color:#aaa;">&#xe60a;</i> <span>近期中的任务需求</span>
                                    <a href="/assignmentstax/consulting">更多</a>
                                </h3>
                                <div class="listing-box-ui">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'consulting')
);
include TEMPLATEPATH.'/a_inc_loop_box.php';
?> 
                                </div>
                            </div>
                        </div>
                        <div class="htx-box-right">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'consulting'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'cases')	
);
include TEMPLATEPATH.'/a_inc_cases_box.php';
?>                         
                            <div class="log-box">
                                <div class="log-box-top layui-clear">
                                    <div class="log-box-top-img">
                                        <img src="/p/images/kfb-blue30.png" alt="">
                                    </div>
                                    <div class="log-box-top-text">
                                          <span>
                                              优质的服务商代表
                                          </span>
                                    </div>
                                </div>
                                <div class="log-box-bottom">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'consulting')
);
include TEMPLATEPATH.'/a_inc_shops_box.php';
?> 
                                        
                                        <div style="clear:both"></div>                                    
                                        <a class="click-a" target="_blank" href="/other/submission">快速发布需求</a>                                  
                                </div>

                            </div>

                        </div>


                    </div>
  </div>
</fieldset>            
</div><!--.task-cat end-->

<div class="task-cat layui-clear  pb35">
<fieldset class="layui-elem-field">
<legend>工程勘察</legend>
<div class="layui-field-box">
<div class="htx-engineering-box layui-clear">
                        <div class="htx-box-left">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'investigation'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'recommended')	
);
include TEMPLATEPATH.'/a_inc_recommended_box.php';
?> 
                            <div class="listing-box">
                                <h3>
                                    <i class="layui-icon" style="font-size:28px; color:#aaa;">&#xe60a;</i> <span>近期中的任务需求</span>
                                    <a href="/assignmentstax/investigation">更多</a>
                                </h3>
                                <div class="listing-box-ui">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'investigation')
);
include TEMPLATEPATH.'/a_inc_loop_box.php';
?> 
                                </div>
                            </div>
                        </div>
                        <div class="htx-box-right">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'investigation'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'cases')	
);
include TEMPLATEPATH.'/a_inc_cases_box.php';
?>     
                            <div class="log-box">
                                <div class="log-box-top layui-clear">
                                    <div class="log-box-top-img">
                                        <img src="/p/images/kfb-blue30.png" alt="">
                                    </div>
                                    <div class="log-box-top-text">
                                          <span>
                                              优质的服务商代表
                                          </span>
                                    </div>
                                </div>
                                <div class="log-box-bottom">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'investigation')
);
include TEMPLATEPATH.'/a_inc_shops_box.php';
?> 
                                        <div style="clear:both"></div>                                    
                                        <a class="click-a" target="_blank" href="/other/submission">快速发布需求</a>                                  
                                </div>

                            </div>

                        </div>


                    </div>
  </div>
</fieldset>            
</div><!--.task-cat end-->

<div class="task-cat layui-clear  pb35">
<fieldset class="layui-elem-field">
<legend>工程设计</legend>
<div class="layui-field-box">
<div class="htx-engineering-box layui-clear">
                        <div class="htx-box-left">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'design'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'recommended')	
);
include TEMPLATEPATH.'/a_inc_recommended_box.php';
?>
                            <div class="listing-box">
                                <h3>
                                    <i class="layui-icon" style="font-size:28px; color:#aaa;">&#xe60a;</i> <span>近期中的任务需求</span>
                                    <a href="/assignmentstax/design">更多</a>
                                </h3>
                                <div class="listing-box-ui">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'design')
);
include TEMPLATEPATH.'/a_inc_loop_box.php';
?> 
                                </div>
                            </div>
                        </div>
                        <div class="htx-box-right">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'design'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'cases')	
);
include TEMPLATEPATH.'/a_inc_cases_box.php';
?>     
                            <div class="log-box">
                                <div class="log-box-top layui-clear">
                                    <div class="log-box-top-img">
                                        <img src="/p/images/kfb-blue30.png" alt="">
                                    </div>
                                    <div class="log-box-top-text">
                                          <span>
                                              优质的服务商代表
                                          </span>
                                    </div>
                                </div>
                                <div class="log-box-bottom">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'design')
);
include TEMPLATEPATH.'/a_inc_shops_box.php';
?> 
                                        <div style="clear:both"></div>                                    
                                        <a class="click-a" target="_blank" href="/other/submission">快速发布需求</a>                                  
                                </div>

                            </div>

                        </div>


                    </div>
  </div>
</fieldset>            
</div><!--.task-cat end-->

<div class="task-cat layui-clear  pb35">
<fieldset class="layui-elem-field">
<legend>工程招标</legend>
<div class="layui-field-box">
<div class="htx-engineering-box layui-clear">
                        <div class="htx-box-left">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'bidding'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'recommended')	
);
include TEMPLATEPATH.'/a_inc_recommended_box.php';
?>
                            <div class="listing-box">
                                <h3>
                                    <i class="layui-icon" style="font-size:28px; color:#aaa;">&#xe60a;</i> <span>近期中的任务需求</span>
                                    <a href="/assignmentstax/bidding">更多</a>
                                </h3>
                                <div class="listing-box-ui">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'bidding')
);
include TEMPLATEPATH.'/a_inc_loop_box.php';
?> 
                                </div>
                            </div>
                        </div>
                        <div class="htx-box-right">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'bidding'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'cases')	
);
include TEMPLATEPATH.'/a_inc_cases_box.php';
?>     
                            <div class="log-box">
                                <div class="log-box-top layui-clear">
                                    <div class="log-box-top-img">
                                        <img src="/p/images/kfb-blue30.png" alt="">
                                    </div>
                                    <div class="log-box-top-text">
                                          <span>
                                              优质的服务商代表
                                          </span>
                                    </div>
                                </div>
                                <div class="log-box-bottom">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'bidding')
);
include TEMPLATEPATH.'/a_inc_shops_box.php';
?> 
                                        <div style="clear:both"></div>                                    
                                        <a class="click-a" target="_blank" href="/other/submission">快速发布需求</a>                         
                                </div>

                            </div>

                        </div>


                    </div>
  </div>
</fieldset>            
</div><!--.task-cat end-->

<div class="task-cat layui-clear  pb35">
<fieldset class="layui-elem-field">
<legend>工程造价</legend>
<div class="layui-field-box">
<div class="htx-engineering-box layui-clear">
                        <div class="htx-box-left">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'cost'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'recommended')	
);
include TEMPLATEPATH.'/a_inc_recommended_box.php';
?>
                            <div class="listing-box">
                                <h3>
                                    <i class="layui-icon" style="font-size:28px; color:#aaa;">&#xe60a;</i> <span>近期中的任务需求</span>
                                    <a href="/assignmentstax/cost">更多</a>
                                </h3>
                                <div class="listing-box-ui">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'cost')
);
include TEMPLATEPATH.'/a_inc_loop_box.php';
?> 
                                </div>
                            </div>
                        </div>
                        <div class="htx-box-right">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'cost'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'cases')	
);
include TEMPLATEPATH.'/a_inc_cases_box.php';
?>     
                            <div class="log-box">
                                <div class="log-box-top layui-clear">
                                    <div class="log-box-top-img">
                                        <img src="/p/images/kfb-blue30.png" alt="">
                                    </div>
                                    <div class="log-box-top-text">
                                          <span>
                                              优质的服务商代表
                                          </span>
                                    </div>
                                </div>
                                <div class="log-box-bottom">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'cost')
);
include TEMPLATEPATH.'/a_inc_shops_box.php';
?> 
                                        <div style="clear:both"></div>                                    
                                        <a class="click-a" target="_blank" href="/other/submission">快速发布需求</a>                               
                                </div>

                            </div>

                        </div>


                    </div>
  </div>
</fieldset>            
</div><!--.task-cat end-->

<div class="task-cat layui-clear  pb35">
<fieldset class="layui-elem-field">
<legend>工程监理</legend>
<div class="layui-field-box">
<div class="htx-engineering-box layui-clear">
                        <div class="htx-box-left">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'supervision'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'recommended')	
);
include TEMPLATEPATH.'/a_inc_recommended_box.php';
?>
                            <div class="listing-box">
                                <h3>
                                    <i class="layui-icon" style="font-size:28px; color:#aaa;">&#xe60a;</i> <span>近期中的任务需求</span>
                                    <a href="/assignmentstax/supervision">更多</a>
                                </h3>
                                <div class="listing-box-ui">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'supervision')
);
include TEMPLATEPATH.'/a_inc_loop_box.php';
?> 
                                </div>
                            </div>
                        </div>
                        <div class="htx-box-right">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'supervision'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'cases')	
);
include TEMPLATEPATH.'/a_inc_cases_box.php';
?>    
                            <div class="log-box">
                                <div class="log-box-top layui-clear">
                                    <div class="log-box-top-img">
                                        <img src="/p/images/kfb-blue30.png" alt="">
                                    </div>
                                    <div class="log-box-top-text">
                                          <span>
                                              优质的服务商代表
                                          </span>
                                    </div>
                                </div>
                                <div class="log-box-bottom">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'supervision')
);
include TEMPLATEPATH.'/a_inc_shops_box.php';
?> 
                                        <div style="clear:both"></div>                                    
                                        <a class="click-a" target="_blank" href="/other/submission">快速发布需求</a>                          
                                </div>

                            </div>

                        </div>


                    </div>
  </div>
</fieldset>            
</div><!--.task-cat end-->

<div class="task-cat layui-clear  pb35">
<fieldset class="layui-elem-field">
<legend>工程施工</legend>
<div class="layui-field-box">
<div class="htx-engineering-box layui-clear">
                        <div class="htx-box-left">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'construction'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'recommended')	
);
include TEMPLATEPATH.'/a_inc_recommended_box.php';
?>
                            <div class="listing-box">
                                <h3>
                                    <i class="layui-icon" style="font-size:28px; color:#aaa;">&#xe60a;</i> <span>近期中的任务需求</span>
                                    <a href="/assignmentstax/construction">更多</a>
                                </h3>
                                <div class="listing-box-ui">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'construction')
);
include TEMPLATEPATH.'/a_inc_loop_box.php';
?> 
                                </div>
                            </div>
                        </div>
                        <div class="htx-box-right">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'construction'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'cases')	
);
include TEMPLATEPATH.'/a_inc_cases_box.php';
?>    
                            <div class="log-box">
                                <div class="log-box-top layui-clear">
                                    <div class="log-box-top-img">
                                        <img src="/p/images/kfb-blue30.png" alt="">
                                    </div>
                                    <div class="log-box-top-text">
                                          <span>
                                              优质的服务商代表
                                          </span>
                                    </div>
                                </div>
                                <div class="log-box-bottom">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'construction')
);
include TEMPLATEPATH.'/a_inc_shops_box.php';
?> 
                                        <div style="clear:both"></div>                                    
                                        <a class="click-a" target="_blank" href="/other/submission">快速发布需求</a>                             
                                </div>

                            </div>

                        </div>


                    </div>
  </div>
</fieldset>            
</div><!--.task-cat end-->

<div class="task-cat layui-clear  pb35">
<fieldset class="layui-elem-field">
<legend>财务服务</legend>
<div class="layui-field-box">
<div class="htx-engineering-box layui-clear">
                        <div class="htx-box-left">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'finance'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'recommended')	
);
include TEMPLATEPATH.'/a_inc_recommended_box.php';
?>
                            <div class="listing-box">
                                <h3>
                                    <i class="layui-icon" style="font-size:28px; color:#aaa;">&#xe60a;</i> <span>近期中的任务需求</span>
                                    <a href="/assignmentstax/finance">更多</a>
                                </h3>
                                <div class="listing-box-ui">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'finance')
);
include TEMPLATEPATH.'/a_inc_loop_box.php';
?> 
                                </div>
                            </div>
                        </div>
                        <div class="htx-box-right">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'finance'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'cases')	
);
include TEMPLATEPATH.'/a_inc_cases_box.php';
?>    
                            <div class="log-box">
                                <div class="log-box-top layui-clear">
                                    <div class="log-box-top-img">
                                        <img src="/p/images/kfb-blue30.png" alt="">
                                    </div>
                                    <div class="log-box-top-text">
                                          <span>
                                              优质的服务商代表
                                          </span>
                                    </div>
                                </div>
                                <div class="log-box-bottom">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'finance')
);
include TEMPLATEPATH.'/a_inc_shops_box.php';
?> 
                                        <div style="clear:both"></div>                                    
                                        <a class="click-a" target="_blank" href="/other/submission">快速发布需求</a>                              
                                </div>

                            </div>

                        </div>


                    </div>
  </div>
</fieldset>            
</div><!--.task-cat end-->

<div class="task-cat layui-clear  pb35">
<fieldset class="layui-elem-field">
<legend>评估服务</legend>
<div class="layui-field-box">
<div class="htx-engineering-box layui-clear">
                        <div class="htx-box-left">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'valuation'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'recommended')	
);
include TEMPLATEPATH.'/a_inc_recommended_box.php';
?>
                            <div class="listing-box">
                                <h3>
                                    <i class="layui-icon" style="font-size:28px; color:#aaa;">&#xe60a;</i> <span>近期中的任务需求</span>
                                    <a href="/assignmentstax/valuation">更多</a>
                                </h3>
                                <div class="listing-box-ui">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'valuation')
);
include TEMPLATEPATH.'/a_inc_loop_box.php';
?> 
                                </div>
                            </div>
                        </div>
                        <div class="htx-box-right">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'valuation'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'cases')	
);
include TEMPLATEPATH.'/a_inc_cases_box.php';
?>    
                            <div class="log-box">
                                <div class="log-box-top layui-clear">
                                    <div class="log-box-top-img">
                                        <img src="/p/images/kfb-blue30.png" alt="">
                                    </div>
                                    <div class="log-box-top-text">
                                          <span>
                                              优质的服务商代表
                                          </span>
                                    </div>
                                </div>
                                <div class="log-box-bottom">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'valuation')
);
include TEMPLATEPATH.'/a_inc_shops_box.php';
?> 
                                        <div style="clear:both"></div>                                    
                                        <a class="click-a" target="_blank" href="/other/submission">快速发布需求</a>                                
                                </div>

                            </div>

                        </div>


                    </div>
  </div>
</fieldset>            
</div><!--.task-cat end-->

<div class="task-cat layui-clear  pb35">
<fieldset class="layui-elem-field">
<legend>其他服务</legend>
<div class="layui-field-box">
<div class="htx-engineering-box layui-clear">
                        <div class="htx-box-left">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'rest'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'recommended')	
);
include TEMPLATEPATH.'/a_inc_recommended_box.php';
?>
                            <div class="listing-box">
                                <h3>
                                    <i class="layui-icon" style="font-size:28px; color:#aaa;">&#xe60a;</i> <span>近期中的任务需求</span>
                                    <a href="/assignmentstax/rest">更多</a>
                                </h3>
                                <div class="listing-box-ui">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'rest')
);
include TEMPLATEPATH.'/a_inc_loop_box.php';
?> 
                                </div>
                            </div>
                        </div>
                        <div class="htx-box-right">
<?php
$tax_query = array(
	'relation'=>'AND',
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'rest'),
	array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'cases')	
);
include TEMPLATEPATH.'/a_inc_cases_box.php';
?>    
                            <div class="log-box">
                                <div class="log-box-top layui-clear">
                                    <div class="log-box-top-img">
                                        <img src="/p/images/kfb-blue30.png" alt="">
                                    </div>
                                    <div class="log-box-top-text">
                                          <span>
                                              优质的服务商代表
                                          </span>
                                    </div>
                                </div>
                                <div class="log-box-bottom">
<?php
$tax_query = array(
	array('taxonomy' => 'assignmentstax', 'field'=>'slug', 'terms' =>'rest')
);
include TEMPLATEPATH.'/a_inc_shops_box.php';
?> 
                                        <div style="clear:both"></div>                                    
                                        <a class="click-a" target="_blank" href="/other/submission">快速发布需求</a>                                 
                                </div>

                            </div>

                        </div>


                    </div>
  </div>
</fieldset>            
</div><!--.task-cat end-->
                </div>
            </div>
        </div>

    </div>
</div><!--.wrap-for-s end-->
<?php get_footer(); ?>