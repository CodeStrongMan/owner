
/*var ETlist = function(json_data=null,dom1,dom2,the_id=0){
		var tmpList = json_data;

		var oList = eval(tmpList);
		alert(oList);
		var data = {
			id:the_id,
			list:oList
		};
		
		$(function(){
			$(dom1).html(""+easyTemplate($(dom2).html(),data));
		})
}*/
function imgChart(dom1,tray){
	var data = {
			labels : [tray.one,tray.two,tray.three,tray.fore,tray.five,tray.six,tray.seven],
			datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					data : [0,0,0,0,0,0,0]
				}
			]
		}
		
			var ctx = $(dom1).get(0).getContext("2d");
			var myNewChart = new Chart(ctx);
			myNewChart.Line(data);
	
}

function ETlist(data,data1,dada2,data3){
	var tmpList = data;
	
	var oList = eval(tmpList);
	
	var data = {
		id:data3,
		list:oList
	};
	
	$(function(){
		$(data1).html(""+easyTemplate($(dada2).html(),data));
	})
}