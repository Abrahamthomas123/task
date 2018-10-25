// JavaScript Document
$(function(){
	$.ajax({
             url:getBaseURL()+'start/productsold/5', 
             type:'POST',
             success:function(data){
				 var data = $.parseJSON(data);
						productsold(data);
                 }                 
            });
	
});


function productsold(datavalue)
{
	var l={element:"areachart-small",behaveLikeLine:!0,data:datavalue,xkey:"x",ykeys:["y","z"],labels:["Y","Z"],grid:!1,lineColors:["#3498DB","#E74C3C","#F39C12","#2C3E50","#1abc9c","#34495e","#9b59b6","#e74c3c"]};Morris.Line(l);
$(".visible-tooltip").tooltip("show");
}