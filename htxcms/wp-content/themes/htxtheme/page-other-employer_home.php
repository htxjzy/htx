<?php 
/*
Template Name: 雇主主页
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
    <div class="guess_list">
        <h3 class="layui-clear">
            <span>猜您可能会需要</span>
            <a href="#">更多>></a>
        </h3>
        <div class="guess_list_li">
            <ul class="layui-clear">
                <li>
                    <em>
                        <a href="#">
                            <img src="/p/images/member/avatar_middle.jpg" alt="">
                        </a>
                    </em>
                    <div class="g_main">
                        <div class="company_name">
                            <a href="#" target="_blank" title="印轩品牌设计有限公司">印轩品牌设计有限公司</a>
                            <span>好评：<b>100.0%</b> </span>
                        </div>
                        <div class="g_grade">
                            <a href="#">
                                <!--从二力到九力图标读取顺序为 icohgz2 icohgz3 icohgz4 icohgz5 icohgz6 icohgz7 icohgz8 icohgz9 默认为一力-->
                                <i class="iico">
                                   一力<i class="icohg "></i>
                                </i>
                            </a>
                        </div>
                        <samp>
                            <a class="layui-btn layui-btn-sm layui-btn-warm" href="#">进入商铺</a>
                        </samp>
                    </div>
                </li>
                <li>
                    <em>
                        <a href="#">
                            <img src="/p/images/member/avatar_middle.jpg" alt="">
                        </a>
                    </em>
                    <div class="g_main">
                        <div class="company_name">
                            <a href="#" target="_blank" title="印轩品牌设计有限公司">印轩品牌设计有限公司</a>
                            <span>好评：<b>100.0%</b> </span>
                        </div>
                        <div class="g_grade">
                            <a href="#">
                                <!--从二力到九力图标读取顺序为 icohgz2 icohgz3 icohgz4 icohgz5 icohgz6 icohgz7 icohgz8 icohgz9 默认为一力-->
                                <i class="iico">
                                    二力<i class="icohg icohgz2"></i>
                                </i>
                            </a>
                        </div>
                        <samp>
                            <a class="layui-btn layui-btn-sm layui-btn-warm" href="#">进入商铺</a>
                        </samp>
                    </div>

                </li>
                <li>
                    <em>
                        <a href="#">
                            <img src="/p/images/member/avatar_middle.jpg" alt="">
                        </a>
                    </em>
                    <div class="g_main">
                        <div class="company_name">
                            <a href="#" target="_blank" title="印轩品牌设计有限公司">印轩品牌设计有限公司</a>
                            <span>好评：<b>100.0%</b> </span>
                        </div>
                        <div class="g_grade">
                            <a href="#">
                                <!--从二力到九力图标读取顺序为 icohgz2 icohgz3 icohgz4 icohgz5 icohgz6 icohgz7 icohgz8 icohgz9 默认为一力-->
                                <i class="iico">
                                   四力<i class="icohg icohgz4"></i>
                                </i>
                            </a>
                        </div>
                        <samp>
                            <a class="layui-btn layui-btn-sm layui-btn-warm" href="#">进入商铺</a>
                        </samp>
                    </div>
                </li>
                <li>
                    <em>
                        <a href="#">
                            <img src="/p/images/member/avatar_middle.jpg" alt="">
                        </a>
                    </em>
                    <div class="g_main">
                        <div class="company_name">
                            <a href="#" target="_blank" title="印轩品牌设计有限公司">印轩品牌设计有限公司</a>
                            <span>好评：<b>100.0%</b> </span>
                        </div>
                        <div class="g_grade">
                            <a href="#">
                                <!--从二力到九力图标读取顺序为 icohgz2 icohgz3 icohgz4 icohgz5 icohgz6 icohgz7 icohgz8 icohgz9 默认为一力-->
                                <i class="iico">
                                    三力<i class="icohg icohgz3"></i>
                                </i>
                            </a>
                        </div>
                        <samp>
                            <a class="layui-btn layui-btn-sm layui-btn-warm" href="#">进入商铺</a>
                        </samp>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="user-box layui-clear pb20">
        <div class="user-box-left">
            <div class="my_tx">
                <img src="/p/images/member/user_tx2.png" alt="">
            </div>
            <h3 class="text-center"><b>火天信工程网</b></h3>
            <p class="">信誉：
                <a href="#">
                   <i class="iico">一品<i class="icohg icohgz2"></i></i>
                </a>
            </p>
            <p class="">好评：暂无</p>
            <p class="">认证：
                <i class="icom icosm_on"></i>
                <i class="icom icosj_on"></i>
                <i class="icom icoyx_on"></i>
                <i class="icom icobk_on"></i>
            </p>
            <p class="">地区：广西-南宁市-青秀区</p>
            <div class="about">
                <b>个人简介：</b>
                <p>暂无</p>
            </div>
            <div class="text-center">
                <a href="javascript:;" class="layui-btn layui-btn-sm ">修改</a>
            </div>
        </div>
        <div class="main-center">
            <div class="company_num">
                <a class="select"  href="javascript:;">
                    <span><b class="f16 mr5">0</b>个</span>
                    <p>已发布的任务数</p>
                    <i></i>
                </a>
                <a href="javascript:;">
                    <span><b class="f16 mr5">0</b>条</span>
                    <p>收到威客的评价</p>
                    <i></i>
                </a>
                <a href="javascript:;">
                    <span><b class="f16 mr5">0</b>条</span>
                    <p>收到威客的评价</p>
                    <i></i>
                </a>
            </div>
            <div class="employer_list">
                <ul>
                    <li class="layui-clear">
                        <div class="time">2017-12-26</div>
                        <div class="title"><a href="#">已发布 <span class="bc-red">只做一个动画</span></a></div>
                    </li>
                    <li class="layui-clear">
                        <div class="time">2017-12-26</div>
                        <div class="title"><a href="#">已发布 <span class="bc-red">交流直流降压至DC12v及锂电池供电方案制作</span></a></div>
                    </li>
                    <li class="layui-clear">
                        <div class="time">2017-12-26</div>
                        <div class="title"><a href="#">已发布 <span class="bc-red">找人教我解读DC_LINE.bin文件</span></a></div>
                    </li>
                    <li class="layui-clear">
                        <div class="time">2017-12-26</div>
                        <div class="title"><a href="#">已发布 <span class="bc-red">户外运动产品LOGO设计</span></a></div>
                    </li>
                    <li class="layui-clear">
                        <div class="time">2017-12-26</div>
                        <div class="title"><a href="#">已发布 <span class="bc-red">游戏网站修改</span></a></div>
                    </li>
                    <li class="layui-clear">
                        <div class="time">2017-12-26</div>
                        <div class="title"><a href="#">已发布 <span class="bc-red">儿童鞋服品牌商标设计</span></a></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="user-box-right">
            <em>
                <img src="/p/images/member/myhome.png" alt="" class="img-responsive">
            </em>
            <p class="p1">累积已发布<span>3147675</span>个</p>
            <p class="p2">服务商总量<span>10980918</span>人</p>
            <div class="sub-button">
                <a class="f16  layui-bg-red" href="javascript:;">免费发布任务</a>
                <a class="f14  layui-bg-orange po_re mt20 button" href="javascript:;">
                    <span>体验微信发布更畅快</span>
                    <div class="po_ab">
                        <em>
                            <img src="/p/images/htxfuwuhao.jpg" class="img-responsive">
                        </em>
                        <p class="text-center pt10 bc-black">微信扫描，一步即发</p>
                        <i></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</article>
<?php get_footer(); ?>

<?php } ?>



