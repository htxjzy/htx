<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'htx_db');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'loca');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8mb4');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/*更改默认上传地址*/
define( 'UPLOADS', ''.'uploads' );

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         's~L/]Pj@<z=wuLcn~QxTPK>wa->;mj2.UF-Ia?CAUWel*Y[*/6ejS$V5{2-y_f-%');
define('SECURE_AUTH_KEY',  'u!Tg-]$Cy,tfi&]|R^{*wRyj6vn8<aaxZwq7l+g,+1G=O,8b7H1Vs8BkrSV}cn5j');
define('LOGGED_IN_KEY',    'QY%,&sxZ^B&7rn78ia=s.vT$L2AN*%6`t@IqMw,`BYM*b#@w^>0I.9<|2a?-qc&X');
define('NONCE_KEY',        '5Z:N%azxj[.A?x:VJ[A7<3T2YR3cie(p<O09O)9^<IRlARPx[n`aO-!e,@SDcx,l');
define('AUTH_SALT',        '6Q7 X}j(n)tf{l[~:],Y1S9-s?aR6hF#]{;s^S(k5v`z6]5^O2xiYppE%J<a% `8');
define('SECURE_AUTH_SALT', 'cX}!FY%*cV=wywck#AkpGN}?:j6>5E9I&vE8Elq AplDFIEFrJud]=81dR>vgbtJ');
define('LOGGED_IN_SALT',   '3|ZD#Wr&71!u+i8DxeXf%HO+0-0PRR![u,LMtd4Z_jmSp?~TnVIwu1}zVV#,JQf+');
define('NONCE_SALT',       'J6p:o{*4/GF(Jffn?$,JC7hpjVjq<#NhW>U7nil?t(Jp9|yT|=Y7E_e$3cFjQQ9,');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'htx_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

//define('DISABLE_WP_CRON', true); //这里是禁止定时发布

define('WP_POST_REVISIONS', 0);

define('AUTOSAVE_INTERVAL', 600);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
