// JavaScript Document


$(function(){
	
$(".dynamicsparkline").sparkline([10,8,5,7,5,4,1,10,8,12,7,7,4,5,8,8,7,7,11,5,9,12,7],{type:"line",lineColor:"#7BB4CE",fillColor:"#DEF0F9"}),	
	
$(".dynamicbars").sparkline([5,6,7,2,0,-4,-2,4,1,10,8,12,7,-2,4,8,10,8],{type:"bar",barColor:"#7BB4CE",negBarColor:"#c76868"}),

Morris.Bar({element:"topsellers_barchart",data:[{device:"3G",geekbench:137},{device:"3GS",geekbench:275},{device:"4",geekbench:380},{device:"4S",geekbench:655},{device:"5",geekbench:1571}],xkey:"device",ykeys:["geekbench"],labels:["Geekbench"],barRatio:.4,xLabelAngle:35,hideHover:"auto",barColors:["#61a9dc"]});
$(".visible-tooltip").tooltip("show");
});
