// JavaScript Document


$(function(){
function e(){
	for(c.length>0&&(c=c.slice(1));c.length<d;)
	{
		var e=c.length>0?c[c.length-1]:50,t=a(1,9),l=a(1,9),n=e+t-l;0>n?n=0:n>100&&(n=100),
		c.push(n)
	}
		for(var r=[],o=0;o<c.length;++o)
		r.push([o,c[o]]);
return[r,n]
}
function a(e,a){return Math.floor(Math.random()*(a-e+1)+e)}
function t(){
	random_data=e(),
	g.setData([random_data][0]),
	$("#plot-chart-value").text(random_data[1]),
	g.draw(),
	setTimeout(t,h)};
var c=[],d=50,h=150;
$("#updateInterval").val(h).change(function(){var e=$(this).val();e&&!isNaN(+e)&&(h=+e,1>h?h=1:h>2e3&&(h=2e3),$(this).val(""+h))}),
random_data=e();
var g=$.plot("#placeholder",[random_data[0]],{grid:{borderWidth:0},series:{color:"#3498DB",lines:{lineWidth:4,fill:.1},shadowSize:0,points:{radius:5}},
yaxis:{min:0,max:100,color:"#e5e5e5",ticks:4,font:{color:"#aaa"}},
xaxis:{color:"#eee",ticks:10,font:{color:"#aaa"}}});
t();
});
;