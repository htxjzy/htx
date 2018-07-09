<meta charset="utf-8"/>
<script type="text/javascript">
    function setCookie(name,value)
    {
        var Days = 30;
        var exp = new Date();
        exp.setTime(exp.getTime() + Days*24*60*60*1000);
        document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
    }

    //jsonp 登录函数
    function jsonp_do_login(data)
    {
        document.getElementById('name').innerHTML = 'B 您好:' + data.session.name + '<a href="http://www.htxgcw.cn/sso/session-api.php?action=logout&sessid='+data.sessid+'">退出</a>';
        //console.log(data);
        setCookie('__SESSID', data.sessid);
    }
</script>
<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$session = check_session();
$sessid = $_COOKIE['__SESSID'];

if($session) {
	
    echo 'B2 您好:' . $session['name'] . '<a href="http://www.htxgcw.cn/sso/session-api.php?action=logout&sessid='.$sessid.'">退出</a>';
	echo '<br/>';
	echo $session['name'].'-'.$session['passwd'].'-'.$session['email'].'-'.$session['phone'];
	
} else {
    echo '<span id="name">B您还没有登录!<a href="http://www.htxgcw.cn/other/user_login">登录</a></span>';
}

function check_session()
{
    $sessid = $_COOKIE['__SESSID'];
    $json = file_get_contents("http://www.htxgcw.cn/sso/session-api.php?id=$sessid&action=check");
    $json_data = json_decode($json, true);

    if($json_data == null || empty($json_data['session'])) {
        return false;
    } else {
        return $json_data['session'];
    }
}

if(!$session){
	$rand = rand();
    echo '<script type="text/javascript" src="http://www.htxgcw.cn/sso/session-api.php?call=jsonp_do_login&{$rand}"></script>';
}
?>