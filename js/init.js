$(document).ready(function(){
	$('#side-bar > ul').metisMenu({
		toggle: false
	});
	$("#side-bar li>a").each(function(id,element){
		length = element.href.length;
		if(window.location.href.substr(0,length) == element.href ){
			ul = $(element.parentNode.parentNode.parentNode).children();
			ul[0].setAttribute("aria-expanded","true");
			li = $(element.parentNode.parentNode.parentNode);
			li[0].className = "active";
			element.parentNode.parentNode.className = "collapse in";
			element.parentNode.parentNode.setAttribute("aria-expanded","true");
		}
	});
	$(".btn-side-bar>a").click(function(){
		if($(".side-bar").hasClass("click")){
			$("#side-bar").removeClass("click");
		}else{
			$("#side-bar").addClass("click");
		}
	});
	$(".selectpicker").selectpicker();
	$('[data-toggle="tooltip"]').tooltip(); 
	x=0;
	$("#ordered").click(function(){	
		if(!x){
			$('#side-bar ul').sortable({
		        revert: true,
		        opacity: 0.6, 
		        cursor: 'move',
		        update: function() {
		            li = this.getElementsByTagName("li");
		            a = li[0].childNodes;
		            for(i=0;i<li.length;i++){
		            	a = li[i].childNodes;
		            	$.post("service/ordered",{idservice:a[0].id,ordered:(i+1)},function(data){});
		            }
		        }
		    });
			x=1;
		}else{
			$('#side-bar ul').sortable('disable');			
			x=0;
		}
	});
	$("i.glyphicon-minus").each(function(id,element){
		$(this).click(function(){
			div = this.parentNode.parentNode.parentNode.getElementsByClassName("box-container");
			$(div[0]).fadeToggle();
		});
	});
	$(".box").css("opacity","1");
	$('.datepickerx').datepicker({format: 'dd-mm-yyyy',language: "es",minDate: new Date()});
});