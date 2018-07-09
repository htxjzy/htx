<?php 
/*
Template Name: 广告费用明细
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
                    <b class="bc-red">广告费用明细</b>
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
                         <strong>财务流向：</strong>
                         <a class="cur" href="javascript:;">所有</a>
                         <a href="javascript:;">支出</a>
                         <a href="javascript:;">收入</a>
                     </div>
                    <div class="list_li">
                        <strong>时间范围：</strong>
                        <a class="cur" href="javascript:;">全部</a>
                        <a href="javascript:;">近一周</a>
                        <a href="javascript:;">近一个月</a>
                        <a href="javascript:;">近三个月</a>
                        <a href="javascript:;">近半年</a>
                    </div>
                </div>
                <div class="htx-table">
                    <div class="query-title">
                        <span class="fl">查询到 <b class="bc-red">0</b> 条广告费用明细</span>
                        <span class="fr">币种：人民币　　单位：元</span>
                    </div>
                    <table  class="layui-table"  lay-skin="nob">
                        <colgroup>
                            <col width="155">
                            <col width="200">
                            <col width="100">
                            <col width="255">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>交易号</th>
                            <th>时间</th>
                            <th>类型</th>
                            <th>收支摘要</th>
                            <th>收支金额</th>
                        </tr>
                        </thead>
                        <tbody>
                             <tr>
                                 <td>1234567890</td>
                                 <td>2017年11月12日 17:45:22</td>
                                 <td>广告</td>
                                 <td>法规公益活动桃花运</td>
                                 <td>500</td>
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



