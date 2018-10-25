// JavaScript Document

$(function(){

$(".dynamicsparkline").sparkline([10,8,5,7,5,4,1,10,8,12,7,7,4,5,8,8,7,7,11,5,9,12,7],{type:"line",lineColor:"#7BB4CE",fillColor:"#DEF0F9"}),

$(".knob").knob({thickness:".05",font:"Open Sans",bgColor:"#f4f4f4",readOnly:!0});

var l={element:"areachart-small",behaveLikeLine:!0,data:[{x:"2011-01",y:15,z:7},{x:"2011-02",y:26,z:4},{x:"2011-03",y:21,z:18},{x:"2011-04",y:32,z:18},{x:"2011-05",y:15,z:7},{x:"2011-06",y:26,z:4},{x:"2011-07",y:18,z:14}],xkey:"x",ykeys:["y","z"],labels:["Y","Z"],grid:!1,lineColors:["#3498DB","#E74C3C","#F39C12","#2C3E50","#1abc9c","#34495e","#9b59b6","#e74c3c"]};Morris.Line(l);

$(".visible-tooltip").tooltip("show"),$('.tasks-list input[type="checkbox"]').change(function(){$(this).closest("li").toggleClass("task-done")});
});



$(function(){

var l={element:"areachart",behaveLikeLine:!0,data:[{x:"2011-01",y:15,z:7},{x:"2011-02",y:26,z:4},{x:"2011-03",y:21,z:18},{x:"2011-04",y:32,z:18},{x:"2011-05",y:15,z:7},{x:"2011-06",y:26,z:4},{x:"2011-07",y:18,z:14},{x:"2011-08",y:36,z:11},{x:"2011-09",y:15,z:12},{x:"2011-10",y:26,z:4},{x:"2011-11",y:28,z:11},{x:"2011-12",y:36,z:14}],xkey:"x",ykeys:["y","z"],labels:["Y","Z"],grid:!1,lineColors:["#A8D2ED","#607284","#F39C12","#2C3E50","#1abc9c","#34495e","#9b59b6","#e74c3c"]};Morris.Line(l);

});




$(function(){
	
Morris.Donut({element:"piechart",data:[{label:"Jam",value:25},{label:"Frosted",value:40},{label:"Custard",value:25},{label:"Sugar",value:10}],colors:["#3498db","#34495e","#1abc9c","#E74C3C","#9b59b6","#95a5a6"],formatter:function(e){return e+"%"}});

$(".visible-tooltip").tooltip("show"),$('.tasks-list input[type="checkbox"]').change(function(){$(this).closest("li").toggleClass("task-done")});
});

$(function(){
	
$(".dynamicbars").sparkline([5,6,7,2,0,-4,-2,4,1,10,8,12,7,-2,4,8,10,8],{type:"bar",barColor:"#7BB4CE",negBarColor:"#c76868"}),

Morris.Bar({element:"topsellers_barchart",data:[{device:"3G",geekbench:137},{device:"3GS",geekbench:275},{device:"4",geekbench:380},{device:"4S",geekbench:655},{device:"5",geekbench:1571}],xkey:"device",ykeys:["geekbench"],labels:["Geekbench"],barRatio:.4,xLabelAngle:35,hideHover:"auto",barColors:["#61a9dc"]});
$(".visible-tooltip").tooltip("show"),$('.tasks-list input[type="checkbox"]').change(function(){$(this).closest("li").toggleClass("task-done")});
});



$(function(){
$(".dynamicbars").sparkline([5,6,7,2,0,-4,-2,4,1,10,8,12,7,-2,4,8,10,8],{type:"bar",barColor:"#7BB4CE",negBarColor:"#c76868"}),
Morris.Bar({element:"users_barchart",data:[{device:"Ned",geekbench:5},{device:"Aus",geekbench:3},{device:"Fra",geekbench:7},{device:"Rus",geekbench:6},{device:"Nor",geekbench:2}],xkey:"device",ykeys:["geekbench"],labels:["Geekbench"],barRatio:.2,xLabelAngle:90,hideHover:"auto",
barColors:["#61a9dc"]})
$(".visible-tooltip").tooltip("show"),$('.tasks-list input[type="checkbox"]').change(function(){$(this).closest("li").toggleClass("task-done")});
});





$(function(){
var n,r,o,i,s;o=new Date,r=o.getDate(),i=o.getMonth(),s=o.getFullYear(),n=$("#calendar").fullCalendar({header:{left:"prev,next today",center:"title",right:"month,agendaWeek,agendaDay"},selectable:!0,selectHelper:!0,select:function(e,a,t){var l;return l=prompt("Event Title:"),l&&n.fullCalendar("renderEvent",{title:l,start:e,end:a,allDay:t},!0),n.fullCalendar("unselect")},editable:!0,events:[{title:"Long Event",start:new Date(s,i,3,12,0),end:new Date(s,i,7,14,0)},{title:"Lunch",start:new Date(s,i,r,12,0),end:new Date(s,i,r+2,14,0),allDay:!1},{title:"Click for Google",start:new Date(s,i,28),end:new Date(s,i,29),url:"http://google.com/"}]});
});

/*$(function(){
	$('.tasks-list input[type="checkbox"]').change(function(){$(this).closest("li").toggleClass("task-done")});
	});
*/
