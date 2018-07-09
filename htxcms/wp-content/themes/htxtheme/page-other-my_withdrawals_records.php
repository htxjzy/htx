<?php 
/*
Template Name: 提现记录
*/
?>
<?php
if(!is_user_logged_in()){	
	echo "请先登录";
}else{
?>		
<?php get_header(); ?>
<link rel="stylesheet" href="/p/css/member.css">
<a class="banner_box" style="background:url(/p/images/banners/banner_user.jpg) center top no-repeat;" href="#"></a>
<!-- banner end -->

<article class="layui-main">
<?php include(TEMPLATEPATH . '/p_user_menu.php'); ?>
<div class="layui-center-box layui-clear">
        <div class="user-left">
<?php include(TEMPLATEPATH . '/p_user_finance_sidebar.php'); ?>
<script>
$(function(){
	$(".layui-main .layui-clear > a:nth-child(3)").addClass("cur");
	$(".layui-main .layui-clear .finance-nav ul li:nth-child(3) a").addClass("select");	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
<div class="htx-box htx-box-money">
                <h3>
                    <b class="bc-red">提现记录</b>
                    <span class=" layui-form fr">
                        <span class="layui-inline w200 mr0 fl">
                            <input type="text" name="title" required="" lay-verify="required" placeholder="请输入关键字" autocomplete="off" class="layui-input">
                        </span>
                        <span class="layui-inline mr0 fl">
                            <button class="layui-btn layui-btn-danger" lay-submit="" lay-filter="formDemo">
                                <i class="layui-icon" style="font-size:18px; color:#fff;"></i>搜索
                            </button>
                        </span>
                    </span>
                </h3>
                <div class="list_box">
                     <div class="list_li">
                         <strong>提现状态：</strong>
                         <a class="cur" href="javascript:;">所有</a>
                         <a href="javascript:;">待审核</a>
                         <a href="javascript:;">审核中</a>
                         <a href="javascript:;">已成功</a>
                         <a href="javascript:;">失败</a>
                         <a href="javascript:;">转退款</a>
                     </div>
                    <div class="list_li">
                        <strong>申请时间：</strong>
                        <a class="cur" href="javascript:;">全部</a>
                        <a href="javascript:;">近一周</a>
                        <a href="javascript:;">近一个月</a>
                        <a href="javascript:;">近三个月</a>
                        <a href="javascript:;">近半年</a>
                    </div>
                </div>
                <div class="htx-table">
                    <div class="query-title">
                        <span class="fl">查询到 <b class="bc-red">0</b> 条提现记录</span>
                        <span class="fr">币种：人民币　　单位：元</span>
                    </div>
                    <table  class="layui-table"  lay-skin="nob">
                        <colgroup>
                            <col width="165">
                            <col width="200">
                            <col width="200">
                            <col width="86">
                            <col width="100">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>交易号</th>
                            <th>申请时间</th>
                            <th>处理时间</th>
                            <th>银行类型</th>
                            <th>提现金额</th>
                            <th>提现状态</th>
                        </tr>
                        </thead>
                        <tbody>
                             <tr>
                                <td>1234567890</td>
                                <td>2017年11月12日 17:45:22</td>
                                <td>2017年11月12日 17:45:22</td>
                                 <td>中国银联</td>
                                 <td><span class="bc-yellow2">+8850</span></td>
                                 <td>进行中</td>
                            </tr>
                             <tr>
                                 <td colspan="6">
                                     <div class="layui-none-information">
                                         <i></i>
                                         <span>暂时没有信息</span>
                                     </div>
                                 </td>
                             </tr>
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </div>
</article>
<?php get_footer(); ?>

<?php } ?>



