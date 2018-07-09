<?php 
/*
Template Name: 开设账户
*/

get_header(); ?>
  <div class="abanner">
  	<img class="img-responsive" src="/m/images/banner-regiter.jpg" alt="宝盛微交易" />
  </div>
  <div class="row parow" style="background:#e6e6e6;">
  
	<div class="col-md-12">
    	<div class="daohang"><span>当前位置：</span><a href="/">首页</a><span>&gt;</span><span>开设账户</span></div>
        
        <div class="page_cont">
        	<img class="img-responsive" src="/m/images/img-register.jpg" alt="宝盛微交易" />

    <div id="register">
    <form name="landpageregform" class="landpageregform" method="post" action="http://www.bsbinary.com/guide/listentfroad" onSubmit="return checkmessage()" />
        <div class="row">
            <div class="col-md-6">
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">姓名</span>
                  <input name="firstname" id="firstname" type="text" class="form-control" placeholder="请输入您的姓名"/>
                </div>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">邮箱</span>
                  <input name="email" id="email" type="text" class="form-control" placeholder="请输入您的电子邮箱"/>
                </div>
            </div><!--.col-md-6 end-->
            <div class="col-md-6">   
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">手机</span>
                  <input name="telephone" id="telephone" type="text" class="form-control" placeholder="请输入您的手机号码"/>
                </div>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Q&nbsp;Q</span>
                  <input name="uqq" id="uqq" type="text" class="form-control" placeholder="请输入您的QQ号码" pattern="^[1-9][0-9]{4,}"/>
                </div>
            </div><!--.col-md-6 end-->
        </div><!--.row end-->
        
        <p>注册须知：注册人必须满18周岁，且完全接受宝盛国际交易的相关条款；注册后如果没有收到邮件，请点击<a rel="nofollow" target="_blank" href="http://dkc.duokebo.com/webchat/chat.aspx?siteid=384725">在线客服</a></p>    	
            <input type="hidden" name="registerUrl" id="registerUrl" value="<?php echo curPageURL(); ?>" /> 
            <input type="hidden" name="bscname" value="www.bsbwei.cc" /> 
            <input type="hidden" name="oftc" value="<?php echo $oftc; ?>" />
            <input type="hidden" name="p1" value="<?php echo $p1; ?>" />               
            <input type="hidden" name="previousUrl" id="previousUrl" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />    
                
            <input name="lastname" type="hidden" id="lastname" value="m"/>
        <input type="submit" name="submit" class="submit" value="开户注册"/>
    </form>
    </div><!--#register end-->
  
        </div><!--.page_cont end--> 
        
    </div>  
  </div>

<?php get_footer(); ?>