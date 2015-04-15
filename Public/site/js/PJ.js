// JavaScript Document
/////////////////////////////////首页///////////////////////////////////////
/*************头部导航***************************/
$.headerMove=function(Nheight){
	$('.navList').mouseover(function(){
		$('.header').stop().animate({height:Nheight},{ 
		easing: 'easeOutExpo', 
		duration: 700, 
		});
		$('.navList').stop().animate({height:Nheight},{ 
		easing: 'easeOutExpo', 
		duration: 700, 
		});
		$('.list-menu').stop().animate({height:Nheight},{ 
		easing: 'easeOutExpo', 
		duration: 700, 
		});
		});
	$('.navList').mouseleave(function(){
		$('.header').stop().animate({height:'100px'},{ 
		easing: 'easeOutExpo', 
		duration: 700, 
		});
		$('.navList').stop().animate({height:'100px'},{ 
		easing: 'easeOutExpo', 
		duration: 700, 
		});
		$('.list-menu').stop().animate({height:'100px'},{ 
		easing: 'easeOutExpo', 
		duration: 700, 
		});
		});
	$('.list-menu').mouseover(function(){
		$(this).addClass('onBg').siblings('.list-menu').removeClass('onBg');
		$(this).children('.one-menu').addClass('red')
			   .parents('.list-menu').siblings('.list-menu')
			   .children('a').removeClass('red');
		});
	$('.list-menu').mouseout(function(){
		$(this).removeClass('onBg');
		$('.one-menu').removeClass('red');
		});
};
$(function(){	
	$('a').click(function(){$(this).blur();});
/*************首页轮播图大***************************/
	function textMove(num,time,offsetTop){
		var num,time,offsetTop;
		$('.indexFocus .textImg').eq(num).delay(time).animate({top:offsetTop},{
					easing: 'easeInOutExpo', 
					duration: 2000
					})
		}
	$('.indexFocus .arrow').click(function(){
		var index = $(this).index();
			if($('.indexFocus ul').is(':animated')==true){return}
			$(this).addClass('on').siblings().removeClass('on');
			if(index==0){
				$('.indexFocus ul').animate({margin:'0px auto 0 auto'},{
					easing: 'easeInOutExpo', 
					duration: 2000
					})
				textMove(0,200,270);
				textMove(1,100,-120);	
				textMove(2,100,-120);	
				}
			else if(index==1){
				$('.indexFocus ul').animate({margin:'-550px auto 0 auto'},{
					easing: 'easeInOutExpo', 
					duration: 2000
					})
				textMove(0,200,800);
				textMove(1,100,270);	
				textMove(2,100,-120);	
				}
			else if(index==2){
				$('.indexFocus ul').animate({margin:'-1100px auto 0 auto'},{
					easing: 'easeInOutExpo', 
					duration: 2000
					})
				textMove(0,100,800);
				textMove(1,200,800);	
				textMove(2,100,270);	
				}	
		});
			var run=1;
			function autoMove(){
				if(run==1){
					var index = $('.indexFocus .on').index();
					if($('.indexFocus ul').is(':animated')==true){return}	
					if(index==2){
						index = 0;
						}else{
							index = index + 1;
							}
					$('.indexFocus .arrow').eq(index).addClass('on').siblings().removeClass('on');
					if(index==0){
						$('.indexFocus ul').animate({margin:'0px auto 0 auto'},{
							easing: 'easeInOutExpo', 
							duration: 2000
							})
						textMove(0,200,270);
						textMove(1,100,-120);	
						textMove(2,100,-120);	
						}
					else if(index==1){
						$('.indexFocus ul').animate({margin:'-550px auto 0 auto'},{
							easing: 'easeInOutExpo', 
							duration: 2000
							})
						textMove(0,200,800);
						textMove(1,100,270);	
						textMove(2,100,-120);	
						}
					else if(index==2){
						$('.indexFocus ul').animate({margin:'-1100px auto 0 auto'},{
							easing: 'easeInOutExpo', 
							duration: 2000
							})
						textMove(0,100,800);
						textMove(1,200,800);	
						textMove(2,100,270);		
						}
				}
				setTimeout(function(){autoMove();},4000);
				}
		setTimeout(function(){autoMove();},3000);
		$('.indexFocus').hover(
			function(){
				run=0;
				},
			function(){
				run=1;}
		)
/*************首页轮播图小***************************/
	var offset = 0;
	var goTo = 1;
	var copy = $('.samllBox li').clone();
		copy.appendTo($('.samllBox ul'));
	var imgNum = $('.samllBox img').length;
	var imgWidth = $('.samllBox img').width();
	$('.samllBox ul').width(imgNum*imgWidth);;
	function smallMove(offset){
		if($('.samllBox ul').is(':animated')==true){return}
		$('.samllBox ul').animate({margin:'0 0 0 '+offset},500);
		}
	$('.samllWrapper .next').click(function(){
		if($('.samllBox ul').is(':animated')==true){return}
		offset = offset-imgWidth;
		if(offset<-imgNum*imgWidth/2){
			$('.samllBox ul').css('margin-left','0');
			offset = 0;
			offset = offset-imgWidth;
			}
		smallMove(offset)
		})	
	$('.samllWrapper .prev').click(function(){
		if($('.samllBox ul').is(':animated')==true){return}
		offset = offset+imgWidth;
		if(offset>0){
			offset = -imgWidth*7;
			$('.samllBox ul').css('margin-left',offset);
			offset = offset+imgWidth;
			}
		smallMove(offset)
		})
	function autoPlay(){
		if(goTo==1){
			$('.samllWrapper .next').trigger('click');
			}
		setTimeout(function(){autoPlay();},3000);
		}
	setTimeout(function(){autoPlay();},3000);	
	$('.samllWrapper').hover(
		function(){
			goTo = 0;},
		function(){
			goTo = 1;}	
	)
/*************案例展示效果***************************/
	var caseOffH = $('.WeCase ul li a').height();
	$('.WeCase ul li a').mouseenter(function(){
			$(this).children('.caseOff').stop().animate({top:'0px'},{
							easing: 'easeOutBounce', 
							duration: 1000
							})
		});
	$('.WeCase ul li a').mouseleave(function(){
		$(this).children('.caseOff').stop().animate({top:-caseOffH},300)
		})	;
/*************新闻资讯切换***************************/
	$('.newsWrapper .tabBtn span').eq(0).mouseover(function(){
		$('.companyNews').stop().animate({margin:'0 0 0 0'},500);
		$(this).addClass('redSpan').siblings('span').removeClass('redSpan');
		});
	$('.newsWrapper .tabBtn span').eq(1).mouseover(function(){
		$('.companyNews').stop().animate({margin:'-275px 0 0 0'},500);
		$(this).addClass('redSpan').siblings('span').removeClass('redSpan');
		});		
});
/////////////////////////////////templet///////////////////////////////////////
/*************内页导航效果***************************/
$.insideMove=function(num){
var sideAW = $('.sideBox .insideMenu li a').eq(num).outerWidth();
var originalLeft = $('.sideBox .insideMenu li a').eq(num).offset().left- $('.insideTitle .container').offset().left;
$('.sideBox .insideMenu li a').eq(num).addClass('red');	
$('.sideBox .borderTop').css({'left':originalLeft,'width':sideAW});
$('.sideBox .insideMenu li a').mouseover(function(){
	var curLeft = parseInt($('.sideBox .borderTop').css('left'));
	var newLeft = $(this).offset().left - $('.insideTitle .container').offset().left -1;
	var leftOver01 = newLeft + 15;
	var leftOver02 = newLeft - 15;
	var thisW = $(this).outerWidth();
	if(curLeft<newLeft){
		
		$('.sideBox .borderTop').stop().animate({left:leftOver01,width:thisW},400,function(){
			$('.sideBox .borderTop').stop().animate({left:newLeft},300)
			})
	}else if(curLeft>newLeft){
		$('.sideBox .borderTop').stop().animate({left:leftOver02,width:thisW},400,function(){
			$('.sideBox .borderTop').stop().animate({left:newLeft},300)
			})
		}else{
			return
			}
	});
$('.insideMenu').mouseout(function(){
	var curLeft = parseInt($('.sideBox .borderTop').css('left'));
	var leftOver01 = originalLeft + 15;
	var leftOver02 = originalLeft - 15;
	if(curLeft>originalLeft){
	$('.sideBox .borderTop').stop().animate({left:leftOver02,width:sideAW},400,function(){
		$('.sideBox .borderTop').stop().animate({left:originalLeft},400)
		})
	}else if(curLeft<originalLeft){
		$('.sideBox .borderTop').stop().animate({left:leftOver01,width:sideAW},400,function(){
			$('.sideBox .borderTop').stop().animate({left:originalLeft},400)
			})
		}else{
			return
			}
	});	
};

/////////////////////////////////productMark///////////////////////////////////////
/*************行业分类点击展开***************************/
function showMore(){
var tradeBoxH = $('.tradeBox').height();
$('.showMore a').click(function(){
	if($('.tradeBox').attr('value')==0){
		if($('.tradeBox').is(':animated')==true){return};
		var showHeight = $('.tradeHeight').height();
		$('.tradeBox').attr('value','1').animate({height:showHeight},500,function(){
			$('.showMore a i').text('点击收起');
		});
		}else{
			if($('.tradeBox').is(':animated')==true){return};
			$('.tradeBox').attr('value','0').animate({height:tradeBoxH},500,function(){
				$('.showMore a i').text('点击查看更多');
				});
			};
	});
};			
$(function(){
	$('.volNor span').click(function(){
	$(this).addClass('on').siblings('span').removeClass('on');
	});	
$('.volTrade span').click(function(){
	$('.volTrade span').removeClass('on');
	$(this).addClass('on');
	});
$('.volColor span').click(function(){
	$('.volColor span').removeClass();
	if($(this).index()==1){
		$(this).addClass('on');
		}
	else if($(this).index()==2){
		$(this).addClass('volred');
		}
	else if($(this).index()==3)	{
		$(this).addClass('volgrey');
		}
	else if($(this).index()==4){
		$(this).addClass('volwhite');
		}
	else if($(this).index()==5){
		$(this).addClass('volblack');
		}	
	else if($(this).index()==6){
		$(this).addClass('volpink');
		}	
	else if($(this).index()==7){
		$(this).addClass('volpurple');
		}
	else if($(this).index()==8){
		$(this).addClass('volblue');
		}	
	else if($(this).index()==9){
		$(this).addClass('volgreen');
		}
	else if($(this).index()==10){
		$(this).addClass('volorange');
		}
	else if($(this).index()==11){
		$(this).addClass('volcolourful');
		}					
	});
});