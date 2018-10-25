// JavaScript Document


$(function(){
	$('.tasks-list input[type="checkbox"]').change(function(){$(this).closest("li").toggleClass("task-done")});
	});


