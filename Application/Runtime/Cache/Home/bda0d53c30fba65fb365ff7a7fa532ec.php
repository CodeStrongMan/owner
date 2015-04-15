<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo ($site["site_keywords"]); ?>" />
<meta name="description" content="<?php echo ($site["site_description"]); ?>" />
<title><?php echo ($site["site_name"]); ?>-<?php echo ($site["site_short"]); ?></title>
<link href="/favicon.ico" rel="icon" type="image/x-icon" />
<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="/favicon.ico" rel="bookmark" /> 
<link type="text/css" rel="stylesheet" href="/Public/site/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="/Public/site/css/style.css">

<!-- <link type="text/css" rel="stylesheet" href="/Public/site/css/style.min.css"> -->
<script type="text/javascript" src="/Public/site/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/Public/site/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/site/js/selectivizr-min.js"></script>
<script type="text/javascript" src="/Public/site/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="/Public/site/js/PJ.min.js"></script>
<script type="text/javascript" src="/Public/Js/layer/layer.min.js"></script>

<link href="/Public/site/css/table.css" type="text/css" rel="stylesheet">

</head>

<body>

<script>
$(function(){
$.headerMove(300);
$.insideMove(1);
showMore();


	//下拉框
	$('.drop_down').click(function(event) {
		event.stopPropagation();
		$('.drop_down').removeClass('on');
		$(this).toggleClass('on');
	});
	$('.drop_ul li').click(function(event) {
		event.stopPropagation();
		$(this).parents('.drop_down').removeClass('on').find('.drop_text').html($(this).text());
	});
	$('body').click(function() {
		$('.drop_down').removeClass('on');
	});
	//定位导航
	var goon = 1;
	$('.scroll_fixed li').click(function() {
		var currentT;
		goon = 0;
		if ($(this).index() == 0) {
			currentT = 0;
		} else {
			currentT = $('.mainwords').eq($(this).index() - 1).offset().top + 10;
		};
		$(this).addClass('on').siblings().removeClass('on');
		if ($("html,body").is(':animated') == true) {
			return;
		};
		$("html,body").animate({
			scrollTop: currentT
		}, 500, function() {
			goon = 1;
		});
	});
	$(window).scroll(function() {
		var top = $(window).scrollTop();
		var scrollfooter = top + $(window).height();
		var footer = $('.mainwords').eq(9).offset().top + $('#footerbuy').height() + $('.mainwords').eq(9).height();
		if (goon == 0) {
			return;
		};
		if (scrollfooter > footer) {
			$('#footerbuy').removeClass('pf').css({
				'left': 'none',
				'margin-left': 'auto'
			});
		} else {
			$('#footerbuy').addClass('pf').css({
				'left': '50%',
				'margin-left': '-490px'
			});
		};
		if ($('.mainwords').eq(0).offset().top > top) {
			$('.scroll_fixed li').eq(0).addClass('on').siblings().removeClass('on');
		} else if ($('.mainwords').eq(0).offset().top <= top && top < $('.mainwords').eq(1).offset().top) {
			$('.scroll_fixed li').eq(1).addClass('on').siblings().removeClass('on');
		} else if ($('.mainwords').eq(1).offset().top <= top && top < $('.mainwords').eq(2).offset().top) {
			$('.scroll_fixed li').eq(2).addClass('on').siblings().removeClass('on');
		} else if ($('.mainwords').eq(2).offset().top <= top && top < $('.mainwords').eq(3).offset().top) {
			$('.scroll_fixed li').eq(3).addClass('on').siblings().removeClass('on');
		} else if ($('.mainwords').eq(3).offset().top <= top && top < $('.mainwords').eq(4).offset().top) {
			$('.scroll_fixed li').eq(4).addClass('on').siblings().removeClass('on');
		} else if ($('.mainwords').eq(4).offset().top <= top && top < $('.mainwords').eq(5).offset().top) {
			$('.scroll_fixed li').eq(5).addClass('on').siblings().removeClass('on');
		} else if ($('.mainwords').eq(5).offset().top <= top && top < $('.mainwords').eq(6).offset().top) {
			$('.scroll_fixed li').eq(6).addClass('on').siblings().removeClass('on');
		} else if ($('.mainwords').eq(6).offset().top <= top && top < $('.mainwords').eq(7).offset().top) {
			$('.scroll_fixed li').eq(7).addClass('on').siblings().removeClass('on');
		} else if ($('.mainwords').eq(7).offset().top <= top && top < $('.mainwords').eq(8).offset().top) {
			$('.scroll_fixed li').eq(8).addClass('on').siblings().removeClass('on');
		} else if (($('.mainwords').eq(8).offset().top <= top) && (top < $('.mainwords').eq(9).offset().top)) {
			$('.scroll_fixed li').eq(9).addClass('on').siblings().removeClass('on');
		} else if ($('.mainwords').eq(9).offset().top <= top) {
			$('.scroll_fixed li').eq(9).addClass('on').siblings().removeClass('on');
		};
	});
	
	//单选按钮
	$('.margin_right').click(function(){
		if($(this).hasClass('hk_bottom_buy_hover')==true){
			$(this).removeClass('hk_bottom_buy_hover').addClass('cn_bottom_buy_link');
			}else{
				$(this).siblings('.margin_right').removeClass('hk_bottom_buy_hover').addClass('cn_bottom_buy_link');
				$(this).addClass('hk_bottom_buy_hover');
				};
		});
});
</script>

<!-------------------------------header-------------------------------------------->
<div class="header">
	<div class="headerContainer">
    	<div class="topNav">
        	<ul class="clearfix">
            	<li>
                	<a href="/">
                    	<img src="/Public/site/img/logo.png">
                    </a>
                </li>
                <li class="clearfix navList">
                	<div class="list-menu">
                    	<a class="one-menu" href="/">首 页</a>
                    </div>   
             	<?php foreach($res as $v){?>
                    <div class="list-menu"> 
                    	<a class="one-menu" href="<?php echo U($v['link']);?>"><?php echo ($v["title"]); ?></a>     
                    	<?php foreach($v['content'] as $val){?>
                        <a class="two-menu" href='<?php echo ($val["1"]); ?>'><?php echo ($val["0"]); ?></a>
                        <?php }?>
                    </div>			
			<?php }?>

                </li>
                <li class="loginLi hide">
                	<a href="javascript:;">登录</a>
                    <a href="javascript:;">注册</a>
                </li>
                <li class="logged clearfix hide">
                	<div class="user">
                		<a href="#" class="user_name">138****5916</a>
                        <div class="user_tipBox">
                        	<a href="#"><i class="icon-user icon-white"></i> 用户中心</a>
                            <a href="#"><i class="icon-cog icon-white"></i> 账号设置</a>
                            <a href="#"><i class=" icon-arrow-right icon-white"></i> 退出登录</a>
                        </div> 
                    </div>
                    <div class="time">上午好！</div>
                </li>

            </ul>
        </div>
    </div>
</div>



<!---------------------------------内页导航-------------------------------------->
<div class="insideTitle">
    <div class="container">
    	<div class="title">
        	<span>产品展示</span>
        	<span>Product template</span>
        </div>
        <div class="sideBox clearfix">
            <ul class="insideMenu clearfix">
                <?php foreach($res['27']['content'] as $v){?>
            	<li><a href="<?php echo ($v["1"]); ?>"><?php echo ($v["0"]); ?></a></li>
                <?php }?>

            </ul>
            <div class="borderTop"></div>
        </div>
    </div>
</div>
<!---------------------------------内页导航---end------------------------------------>
<!-------------------------------------header--end---------------------------------------------->
<!-------------------------------container--style="display:none;"------------------------------------------>

<div class="container filter" style="width:980px;margin:30px auto 50px auto;background:none;">
	<dl class="introheader">
		<dt class="plan">Sitestar Pro建站功能配置计划</dt>
		<dt class="t1">免费版</dt>
		<dt class="r1">基础版</dt>
		<dt class="t4">标准版
		<div>
			高性价比
		</div>
		</dt>
		<dt class="t3">旗舰版</dt>
		<dt class="t2">0元</dt>
		<dt class="t8">
		<div room="1" prd="ez_Professional" lang="checked" class="margin_right hk_bottom_buy_hover">
			上海
		</div>
		<div room="2" prd="ez_ProHK" class="margin_right cn_bottom_buy_link">
			香港
		</div>
		<div room="3" prd="ez_Professional" class="cn_bottom_buy_link margin_right">
			北京
		</div>
		<div room="4" prd="ez_Professional" lang="checked" class="margin_right cn_bottom_buy_link">
			广州
		</div>
		<div class="mian_beian">
		</div>
		</dt>
		<dt class="t9">
		<div room="1" prd="ez_Ultimate" lang="checked" class="margin_right hk_bottom_buy_hover t9_width">
			上海
		</div>
		<div room="2" prd="ez_UltiHK" class="margin_right cn_bottom_buy_link t9_width">
			香港
		</div>
		<div room="3" prd="ez_Ultimate" class="margin_right cn_bottom_buy_link t9_width">
			北京
		</div>
		<div room="4" prd="ez_Ultimate" class="margin_right cn_bottom_buy_link t9_width">
			广州
		</div>
		<div class="mian_beiant">
		</div>
		</dt>
		<dt class="t10">
		<div room="1" prd="ez_Shop" class="margin_right hk_bottom_buy_hover">
			上海
		</div>
		<div room="2" prd="ez_ShopHK" lang="checked" class="margin_right cn_bottom_buy_link">
			香港
		</div>
		<div room="3" prd="ez_Shop" class="margin_right cn_bottom_buy_link">
			北京
		</div>
		<div room="4" prd="ez_Shop" class="margin_right cn_bottom_buy_link">
			广州
		</div>
		<div class="mian_beian">
		</div>
		</dt>
		<dt id="t11" class="t11">
		<div id="s_ult" lang="3" class="selectboxs sitestar drop_down">
			<span class="graytag drop_icon"></span><span class="p_price drop_text">2040.00元/3年</span>
			<ul class="drop_ul">
				<li>2040.00元/3年</li>
				<li>680.00元/1年</li>
				<li>1360.00元/2年</li>
			</ul>
		</div>
		<div id="onetype" typex="t11" class="prclst2 prclass" style="display: none;">
			<li lang="3">2040.00元/3年</li>
			<li lang="1">680.00元/1年</li>
			<li lang="2">1360.00元/2年</li>
			<li class="noborder" lang="5">3400.00元/5年</li>
		</div>
		</dt>
		<dt id="t12" class="r12">
		<div id="s_pro" lang="3" class="selectbox buy_t1 sitestar drop_down">
			<span class="redtag buy_t3 drop_icon"></span><span class="s_price buy_t2 drop_text">2640.00元/3年</span>
			<ul class="drop_ul">
				<li>2040.00元/3年</li>
				<li>680.00元/1年</li>
				<li>1360.00元/2年</li>
			</ul>
		</div>
		<div typex="t12" class="prclst buy_t4 prclass" style="display: none;">
			<li lang="3">2640.00元/3年</li>
			<li lang="1">880.00元/1年</li>
			<li lang="2">1760.00元/2年</li>
			<li class="noborder" lang="5">4400.00元/5年</li>
		</div>
		</dt>
		<dt id="t13" class="t11">
		<div id="s_prohk" lang="3" class="selectboxs sitestar drop_down">
			<span class="graytag drop_icon"></span><span class="p_price drop_text">5640.00元/3年</span>
			<ul class="drop_ul">
				<li>2040.00元/3年</li>
				<li>680.00元/1年</li>
				<li>1360.00元/2年</li>
			</ul>
		</div>
		<div typex="t13" class="prclst2 prclass" style="display: none;">
			<li lang="3">5640.00元/3年</li>
			<li lang="1">1880.00元/1年</li>
			<li lang="2">3760.00元/2年</li>
			<li class="noborder" lang="5">9400.00元/5年</li>
		</div>
		</dt>
	</dl>
	<table width="980" border="0" cellspacing="0" cellpadding="0" class="sitestarintro" style="margin:0 auto;">
	<colgroup><col width="80">
	<col width="140">
	<col width="104">
	<col width="121">
	<col width="160">
	<col width="215">
	<col width="160">
	</colgroup>
	<tbody>
	<tr>
		<td width="75" rowspan="10" class="buy_blk mainwords">
			计划
		</td>
		<td width="170" class="buy_blk_td1">
			<span class="but_font">优惠活动</span>
		</td>
		<td width="49" class="buy_blk_td2">&nbsp;
			
		</td>
		<td width="279" class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td width="163" class="buy_price_td2">
			<div id="scrollWrap">
				<ul style="margin-top: -20.7349925390078px;">
					<li>
                              买二年送一年
					</li>
					<li>买三年送二年</li>
				</ul>
			</div>
		</td>
		<td width="163" class="buy_price_td3">
			<div id="scrollWraps">
				<ul style="margin-top: -20.7349925390078px;">
					<li> 买二年送一年</li>
					<li>买三年送二年</li>
				</ul>
			</div>
		</td>
		<td width="81" class="buy_price_td1">
			<div id="scrollWrapss" style="height:26px; overflow:hidden;">
				<ul style="margin-top: -20.7349925390078px;">
					<li>
                              买二年送一年
					</li>
					<li>买三年送二年</li>
				</ul>
			</div>
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			空间大小
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 buy_left">
			100M
		</td>
		<td class="buy_price_td22">
			5G
		</td>
		<td class="buy_price_td33">
			10G
		</td>
		<td class="buy_price_td11">
			20G
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			赠英文.com域名1个
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			月流量
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 buy_left">
			1G
		</td>
		<td class="buy_price_td22">
			50G
		</td>
		<td class="buy_price_td33">
			100G
		</td>
		<td class="buy_price_td11">
			200G
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			上传文件个数
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 buy_left">
			50
		</td>
		<td class="buy_price_td2">
			5000
		</td>
		<td class="buy_price_td3">
			10000
		</td>
		<td class="buy_price_td1">
			50000
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			去除底部版权
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="g55 buy_price_td33">&nbsp;
			
		</td>
		<td class="g buy_price_td11">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			域名绑定
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2">
			10
		</td>
		<td class="buy_price_td3">
			50
		</td>
		<td class="buy_price_td1">
			50
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			页面个数
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 buy_left">
			10
		</td>
		<td class="buy_price_td22">
			不限
		</td>
		<td class="buy_price_td33">
			不限
		</td>
		<td class="buy_price_td11">
			不限
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			技术支持
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			赠送二级域名
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="g buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="g55 buy_price_td33">&nbsp;
			
		</td>
		<td class="g buy_price_td11">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td rowspan="13" class="buy_blk mainwords">
			模块
		</td>
		<td class="buy_blk_td1">
			文本
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			图片
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			图文
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			Flash
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			音乐
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			视频
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			导航
		</td>
		<td class="buy_blk_td2">
			页面导航
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			自定义导航
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			代码
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			多语言
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			通栏
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			会员
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			购物车
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td rowspan="8" class="buy_blk mainwords">
			页面管理
		</td>
		<td class="buy_blk_td11">
			自定义浏览器地址栏
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			鼠标拖动调整顺序
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			复制页面
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			复制为底板
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			导航栏是否可见
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			支持设定密码访问
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			支持站外链接
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			SEO设置（页面）
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk mainwords" rowspan="1">
			底板管理
		</td>
		<td class="buy_blk_td11">
			添加/复制/删除底板
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td rowspan="5" class="buy_blk mainwords">
			文件管理
		</td>
		<td class="buy_blk_td1">
			我的文件
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			图片
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			声音
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			Flash
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			文档
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk mainwords" rowspan="1">
			插件
		</td>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 buy_left">
			部分插件
		</td>
		<td class="buy_price_td22">
			大部分插件
		</td>
		<td class="buy_price_td33">
			大部分插件
		</td>
		<td class="buy_price_td11">
			所有插件
		</td>
	</tr>
	<tr>
		<td rowspan="13" class="buy_blk mainwords">
			设置
		</td>
		<td class="buy_blk_td1">
			站点基本设置
		</td>
		<td class="buy_blk_td2">
			站点名称
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			网站编辑语言
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			站点宽度
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			ICO图标
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			网站下线
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			第三方网站认证
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			Seo设置（全局）
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			页面背景
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			站点背景
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			多语言站点
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 g buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			水印设置
		</td>
		<td class="buy_blk_td2">
			文本水印
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			图片水印
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			数据库备份
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td rowspan="1" class="buy_blk mainwords">
			手机访问
		</td>
		<td class="buy_blk_td11">
			设置手机访问
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td rowspan="5" class="buy_blk mainwords">
			模板
		</td>
		<td class="buy_blk_td1">
			网站初始化
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			网店模板(部分)
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			网店模板(全部)
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2">&nbsp;
			
		</td>
		<td class="buy_price_td3 ">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			安装模板
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			网站数据清空
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td rowspan="37" class="buy_blk mainwords">
			电子商务
		</td>
		<td class="buy_blk_td11">
			添加文章
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			文章管理
		</td>
		<td class="buy_blk_td2">&nbsp;
			
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			添加产品
		</td>
		<td class="buy_blk_td22">&nbsp;
			
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			产品管理
		</td>
		<td class="buy_blk_td2">
			产品规格
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			产品分类
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			产品仓库
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 ">&nbsp;
			
		</td>
		<td class="buy_price_td3 ">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			标签管理
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22">&nbsp;
			
		</td>
		<td class="buy_price_td33">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			产品评论
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2">&nbsp;
			
		</td>
		<td class="buy_price_td3">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			产品留言
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22">&nbsp;
			
		</td>
		<td class="buy_price_td33">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			产品导入导出
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			多条件组合查询
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 ">&nbsp;
			
		</td>
		<td class="buy_price_td33 ">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			批量操作(统一调价,库存,分类等)
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2">&nbsp;
			
		</td>
		<td class="buy_price_td3">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			产品导入导出（支持淘宝助理5.5）
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 ">&nbsp;
			
		</td>
		<td class="buy_price_td33">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			会员管理
		</td>
		<td class="buy_blk_td2">
			会员等级
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
		</td>
		<td class="buy_blk_td22">
			会员注册项
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			登录验证码开关
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			第三方帐号登录(QQ,新浪微博)
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 price">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			会员审核开关
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			订单管理
		</td>
		<td class="buy_blk_td22">
			简单订单管理
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			收款单，退款单，发货单，退货单
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 ">&nbsp;
			
		</td>
		<td class="buy_price_td3 ">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			订单打印，快递单模版自定义
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 ">&nbsp;
			
		</td>
		<td class="buy_price_td33 ">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			多条件组合查询
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 ">&nbsp;
			
		</td>
		<td class="buy_price_td3 ">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			邮件
		</td>
		<td class="buy_blk_td22">
			支持邮件自动发送
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22 ">&nbsp;
			
		</td>
		<td class="buy_price_td33 ">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			可自定义邮件发送模板
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 ">&nbsp;
			
		</td>
		<td class="buy_price_td3 ">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
			统计报表
		</td>
		<td class="buy_blk_td22">
			销售额总揽
		</td>
		<td class="buy_price_td11 buy_left">
		</td>
		<td class="buy_price_td22">&nbsp;
			
		</td>
		<td class="buy_price_td33">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			销售量排名
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 ">&nbsp;
			
		</td>
		<td class="buy_price_td3 ">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
		</td>
		<td class="buy_blk_td22">
			会员购买量排名
		</td>
		<td class="buy_price_td11 buy_left">
		</td>
		<td class="buy_price_td22">&nbsp;
			
		</td>
		<td class="buy_price_td33">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			产品购买排名
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 ">&nbsp;
			
		</td>
		<td class="buy_price_td3 ">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
		</td>
		<td class="buy_blk_td22">
			销售指标分析
		</td>
		<td class="buy_price_td11 buy_left">
		</td>
		<td class="buy_price_td22">&nbsp;
			
		</td>
		<td class="buy_price_td33 ">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">
			电子商务设置
		</td>
		<td class="buy_blk_td2">
			交易设置
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 ">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
		</td>
		<td class="buy_blk_td22">
			配送设置(根据地区,重量设定运费)
		</td>
		<td class="buy_price_td11 buy_left">
		</td>
		<td class="buy_price_td22">&nbsp;
			
		</td>
		<td class="buy_price_td33 ">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			物流公司
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2">&nbsp;
			
		</td>
		<td class="buy_price_td3">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
		</td>
		<td class="buy_blk_td22">
			发货地址（可设定默认发货地址）
		</td>
		<td class="buy_price_td11 buy_left">
		</td>
		<td class="buy_price_td22">&nbsp;
			
		</td>
		<td class="buy_price_td33">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			配送设置（可编辑配送方式）
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2 price2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">
		</td>
		<td class="buy_blk_td22">
			地区管理(可编辑城市地区)
		</td>
		<td class="buy_price_td11 buy_left">
		</td>
		<td class="buy_price_td22">&nbsp;
			
		</td>
		<td class="buy_price_td33">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td1">&nbsp;
			
		</td>
		<td class="buy_blk_td2">
			<table cellspacing="0" cellpadding="0" border="0" id="sitestarintro2">
			<tbody>
			<tr>
				<td>
					支付设置(支付宝,快钱,财付通接口)
				</td>
			</tr>
			</tbody>
			</table>
		</td>
		<td class="buy_price_td1 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td2">&nbsp;
			
		</td>
		<td class="buy_price_td3 g5">&nbsp;
			
		</td>
		<td class="buy_price_td1 g2">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td class="buy_blk_td11">&nbsp;
			
		</td>
		<td class="buy_blk_td22">
			收货时间设置
		</td>
		<td class="buy_price_td11 buy_left">&nbsp;
			
		</td>
		<td class="buy_price_td22">&nbsp;
			
		</td>
		<td class="buy_price_td33 g55">&nbsp;
			
		</td>
		<td class="buy_price_td11 g">&nbsp;
			
		</td>
	</tr>
	</tbody>
	</table>
	<dl class="tfooter pf dw" id="footerbuy">
		<dt class="w408 br2 wh"></dt>
		<dt class="w1745 wh"><a lang="" room="1" href="javascript:void(0);" class="buybuttong">免费体验</a></dt>
		<dt class="w174 wh"><a lang="ez_Professional" room="1" href="javascript:void(0);" class="buybuttong">点我开通</a></dt>
		<dt class="rf217 wh"><a lang="ez_Ultimate" room="1" href="javascript:void(0);" class="buybuttonr">马上开通</a></dt>
		<dt class="w1746 wh"><a lang="ez_Shop" room="1" href="javascript:void(0);" class="buybuttong">点我开通</a></dt>
	</dl>
	<!--右侧定位导航-->
	<ul class="scroll_fixed">
		<li class="on">计划</li>
		<li>模块</li>
		<li>页面管理</li>
		<li>底板管理</li>
		<li>文件管理</li>
		<li>插件</li>
		<li>设置</li>
		<li>手机访问</li>
		<li>模板</li>
		<li>电子商务</li>
	</ul>
</div>

<!----------------------------------fixMenu-------------------------------------------------------->
<div class="fixMenu">
	<div class="menuBox">
        <div class="onlineQQ fixBlock">
        	<a style="cursor:pointer;" class="clearfix">
            	<img class="blockIcon" src="/Public/site/img/qqOnline.png">
            	<span class="blockTxt">在线咨询</span>
            </a>
        </div>
        <div class="backTop fixBlock">
        	<a href="javascript:;" class="clearfix">
            	<img class="blockIcon" src="/Public/site/img/gotop.png">
                <span class="blockTxt" ></span>
                <span class="blockTxt">返回顶部</span>
            </a>
        </div>
    </div>    
</div>
<!----------------------------------rightMenu---end----------------------------------------------------->
<!----------------------------------footer-------------------------------------------------------->
<div class="footer">
	<div class="topF">
    	<div class="content clearfix">
    		<?php foreach($res as $v){?>
            <ul>             
			<li><a href="<?php echo U($v['link']);?>"><?php echo ($v["title"]); ?></a></li>
            	<?php foreach($v['content'] as $val){?>
			<li><a href="<?php echo ($val["1"]); ?>"><?php echo ($val["0"]); ?></a></li>
            	<?php }?>
            </ul>
		<?php }?>

            <div class="wxCode"><img src="/Public/site/img/qrcode.png" width='113px' height='135px'></div>
        </div>
    </div>
<div class="middleF" style="display:none;">
    <div class="content clearfix">
        <div class="contactUs">
            <div class="title">
                联系我们
            </div>
            <div calss="UsBox clearfix">
                <div class="address">
                    <p>
                        地 址：浙江温州乐清市柳市镇柳市大厦10楼1005
                    </p>
                    <p>
                        总 机：0577 - 27802780
                    </p>
                    <p>
                        E-Mail：eshion@eshion.net
                    </p>
                    <p>
                        邮编：325604
                    </p>
                </div>
                <div class="QQserver">
                    <div class="phone">
                        <p>
                            业务咨询：分机808、805
                        </p>
                        <p>
                            售后服务：分机801、803、804
                        </p>
                    </div>
                    <div class="QQ clearfix">
                        <a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="shellUs"></div>
    </div>
</div>
<div class="bottomF">
    <div class="content clearfix">
       <div class="pull-left"> <?php echo ($site["site_copyright"]); ?></div>
       <!--<div class="pull-left" style="margin-top:8px;margin-left:10px;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254638729'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/stat.php%3Fid%3D1254638729%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
       </div>-->
       <div style="clear:both;">
           <a href="javascript:;"><img src="/Public/site/img/b1.gif"></a>
           <a href="javascript:;"><img src="/Public/site/img/b2.gif"></a>
           <a href="javascript:;"><img src="/Public/site/img/b3.gif"></a>
           <a href="javascript:;"><img src="/Public/site/img/b4.gif"></a>
       </div>
    </div>

</div>


    

</div>
<!--QQ弹窗-->
<div class="alert_QQservice">
    <div class="QQservice_box">
        <div class="QQ_title">
            <div class="service clearfix">客户服务中心<a class="closeA"></a></div>
        </div>
        <div class="content">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">售前咨询</a></li>
                    <li><a href="#tab2" data-toggle="tab">售后服务</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <table class="table">
                            <tr>
                                <td class="theme" colspan="3">&gt;  客服</td>
                            </tr>
                            <?php if(is_array($onqq["serviceqq"])): foreach($onqq["serviceqq"] as $key=>$v): ?><tr>
                                <td>
                                    <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($v["1"]); ?>&site=qq&menu=yes">
                                    <span><img src="/Public/site/img/pa.gif"></span><span><?php echo ($v["0"]); ?></span>
                                    </a>
                                </td>
                            </tr><?php endforeach; endif; ?>


                        </table>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <table class="table">
                            <tr>
                                <td class="theme" colspan="3">&gt;  售后技术</td>
                            </tr>
                            <?php if(is_array($onqq["skillqq"])): foreach($onqq["skillqq"] as $key=>$v): ?><tr>
                                <td>
                                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($v["1"]); ?>&site=qq&menu=yes">
                                    <span><img src="/Public/site/img/pa.gif"></span><span><?php echo ($v["0"]); ?></span>
                                    </a>
                                </td>
                                <td>7 x 24小时,为您处理技术问题</td>
                                
                            </tr><?php endforeach; endif; ?>
                        </table>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
<!----------------------------------footer---end---------------------------------------------------->
<!----------------------------------登录注册弹层---------------------------------------------------->
<div class="newUser hide" style="width:400px;position:fixed;left:50%;margin-left:-200px;top:50%;background:#FFF;z-index:1001;padding:20px;">
	<a href="#" class="close_btn"></a>
    <div class="tabbable"> <!-- Only required for left/right tabs -->
    	<ul class="nav nav-tabs">
    		<li class="active"><a href="#tab1" data-toggle="tab">登录</a></li>
   			<li><a href="#tab2" data-toggle="tab">注册</a></li>
    	</ul>
    	<div class="tab-content">
    		<div class="tab-pane active login" id="tab1">
    			<input type="text" class="user" placeholder="请输入您的邮箱或者手机" />
                <input type="password" class="password" placeholder="请输入您密码" />
                <div class="findP clearfix">
                	<label>
                		<input type="checkbox" />
                    	<span>自动登录</span>
                    </label>
                    <a class="forgetP" href="#">忘记密码</a>
                </div>
                <input class="sub_btn" type="button" value="登 录">
                <div class="comLogin clearfix">
                	<div class="comT">联合登录</div>
                    <div class="ways">
                    	<a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                </div>
    		</div>
    		<div class="tab-pane register" id="tab2">
   				<input class="account" type="text" placeholder="请输入您的手机号码" />
                <div class="tiptxt clearfix"><img src="/Public/site/img/wrong.png"><span></span></div>
                <input class="code" type="text" placeholder="短信验证码"/><input class="codeBtn" type="button" value="获取验证码" />
                <div class="tiptxt clearfix"><img src="/Public/site/img/wrong.png"><span></span></div>
                <input class="passW passW01" type="password" placeholder="请输入密码" />
                <div class="tiptxt clearfix"><img src="/Public/site/img/wrong.png"><span></span></div>
                <input class="passW passW02" type="password" placeholder="请再次输入密码" />
                <div class="tiptxt clearfix"><img src="/Public/site/img/wrong.png"><span></span></div>
                <input class="email" type="text" placeholder="请输入您的邮箱" />
                <div class="tiptxt clearfix"><img src="/Public/site/img/wrong.png"><span></span></div>
                <input class="nickname" type="text" placeholder="请输入用户昵称" />
                <div class="tiptxt clearfix"><img src="/Public/site/img/wrong.png"><span></span></div>
                <input class="sub_btn" type="button" value="注 册">
                <div class="comLogin clearfix">
                	<div class="comT">联合登录</div>
                    <div class="ways">
                    	<a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                </div>
    		</div>
    	</div>
    </div>
</div>
<script>
$.headerMove(550);
//表单验证
$(function(){
    //注册账号输入框
     $('.newUser .register .account').focus(function(){
        $(this).next('.tiptxt').addClass('tip').css('visibility','visible').children('span').html('请填写您最常用的手机号码');
     });
    $('.newUser .register .account').blur(function(){
        var tel = $(this).val();
        var reg = /^1\d{10}$/;
         if (!reg.test(tel)) {
               $(this).addClass('wrong')
                .next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('手机格式不正确');
            return;
         }else{
              $(this).removeClass('wrong').addClass('right')
               .next('.tiptxt')
               .css('visibility','hidden')
               .removeClass('tip'); 
        }         
    });
    //注册验证码输入框
    $('.newUser .register .code').focus(function(){
       $(this).next().next('.tiptxt')
           .addClass('tip').css('visibility','visible')
           .children('span').html('请填写您收到的短信验证码');   
    });
    $('.newUser .register .code').blur(function(){
        var code = $(this).val();
        var reg = /^[0-9]\d{5}$/;
        if (!reg.test(code)) {
               $(this).addClass('wrong')
                .next().next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('验证码格式不正确');
            return;
         }else{
              $(this).removeClass('wrong').addClass('right')
                .next().next('.tiptxt')
               .css('visibility','hidden')
               .removeClass('tip'); 
        }      
        
    }) ;
    //注册密码输入框
    $('.newUser .tab-content .register .passW01').focus(function(){
      $(this).next('.tiptxt').addClass('tip').css('visibility','visible').children('span').html('请输入6-16位密码，区分大小写，不可包含空格');   
    });
    $('.newUser .tab-content .register .passW01').blur(function(){
        var passW = $(this).val();
        var reg = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){5,19}$/;
        if(!reg.test(passW)){
            $(this).addClass('wrong')
                .next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('密码格式不正确');
                return;
        }else{
            $(this).removeClass('wrong').addClass('right')
               .next('.tiptxt')
               .css('visibility','hidden')
               .removeClass('tip')
               .children('span').html('');
        }  ;   
    });
    //注册密码再次输入
     $('.newUser .tab-content .register .passW02').focus(function(){
         $(this).next('.tiptxt').addClass('tip').css('visibility','visible').children('span').html('请再次输入密码'); 
     });
     $('.newUser .tab-content .register .passW02').blur(function(){
        if($(this).val()!==$('.newUser .tab-content .register .passW01').val()){
            $(this).addClass('wrong')
                .next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('两次输入密码不一致');
        }else if($(this).val()==''){
            $(this).addClass('wrong')
                .next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('请输入密码');
        }else{
          $(this).removeClass('wrong').addClass('right')
               .next('.tiptxt')
               .css('visibility','hidden')
               .removeClass('tip')
               .children('span').html('');  
        }
     });
    //注册邮箱验证
      $('.newUser .tab-content .register .email').focus(function(){
           $(this).next('.tiptxt').addClass('tip').css('visibility','visible').children('span').html('请填写您最常用的邮箱'); 
      })
    $('.newUser .tab-content .register .email').blur(function(){
        var email = $(this).val();
        var reg =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!reg.test(email)){
             $(this).addClass('wrong')
                .next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('邮箱格式不正确');
        }else{
             $(this).removeClass('wrong').addClass('right')
               .next('.tiptxt')
               .css('visibility','hidden')
               .removeClass('tip')
               .children('span').html('');
        }
    })
/*    //注册用户昵称
     $('.newUser .tab-content .register .nickname').focus(function(){
        $(this).next('.tiptxt').addClass('tip').css('visibility','visible').children('span').html('请填写您的用户昵称');     
     })
     $('.newUser .tab-content .register .nickname').blur(function(){
         var name = $(this).val();
         var reg = /[a-zA-Z0-9]{1,10}|[\u4E00-\uFA29]{1,5}/g;
         if(!reg.test(name)){
             $(this).addClass('wrong')
                .next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('昵称格式不正确');
         }else{
            $(this).removeClass('wrong').addClass('right')
               .next('.tiptxt')
               .css('visibility','hidden')
               .removeClass('tip')
               .children('span').html('');    
         }
     })*/
    //注册获取验证码点击
    $('.newUser .register .codeBtn').click(function(){
        var num = 60;//60秒可重发
        function goon(){
            var timer = setTimeout(function(){
            if(num>0){
             num = num - 1;
                 $('.newUser .register .codeBtn').attr('disabled','disabled').val('重新发送'+'('+num+')'); 
                goon();
                }else{
                    $('.newUser .register .codeBtn').removeAttr('disabled').val('获取验证码');
                    return;
                }
            },1000) 
        };
         goon();
    });
    
});
</script>

</body>
</html>