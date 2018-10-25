// JavaScript Document
$(function(){

$.ajax({
             url:getBaseURL()+'start/productsold/12', 
             type:'POST',
             success:function(data){
				 var data = $.parseJSON(data);
						profitchart(data);
                 }                 
            });
	
});


function profitchart(datavalue)
{
	var l={element:"areachart",behaveLikeLine:!0,data:datavalue,xkey:"x",ykeys:["y","z"],labels:["Y","Z"],grid:!1,lineColors:["#A8D2ED","#607284","#F39C12","#2C3E50","#1abc9c","#34495e","#9b59b6","#e74c3c"]};Morris.Line(l);
$(".visible-tooltip").tooltip("show");
}