var url_base = document.getElementById("initjs").src.split("?")[1];
$(document).ready(function(){
	$('#side-bar > ul').metisMenu({
		toggle: false
	});
	$("#side-bar li>a").each(function(id,element){
		if( window.location.href.substr(0,element.href.length) == element.href ){
			ulcero = $(element.parentNode.parentNode.parentNode.parentNode);
			ulcero[0].setAttribute("aria-expanded","true");
			element.parentNode.parentNode.parentNode.parentNode.className = "collapse in";
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
		        	$.post(url_base+"service/delete_ordered",{event:''});
		        	$("#side-bar ul > li").each(function(id,element){
						console.log(element.childNodes[0].id+" "+id);
						$.post(url_base+"service/ordered",{idservice:element.childNodes[0].id,ordered:(id+1)});
					});
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
tinymce.init({ 
	selector:'.tinymce',
	plugins: [
		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		'searchreplace wordcount visualblocks visualchars code fullscreen',
		'insertdatetime media nonbreaking save table contextmenu directionality',
		'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
	],
	language: "es",
	toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
		toolbar2: 'print preview media | forecolor backcolor emoticons | imageplus code',
	height : "350", 
	
	toolbar_items_size: 'small',
	file_browser_callback: function(field_name, url, type, win){
		win.document.getElementById(field_name).value = 'my browser value';
	}, 
	relative_urls : false,
	convert_urls : true,
	setup: function(editor) {
        editor.addButton('imageplus', {
            type: 'button',
            title: 'Insert image',
            icon: 'image',
            id: 'imageplus', 
			onclick: function() {
            	editor.focus();
            	show_gallery_modal(1);
	        }
	    });
	}
});
//Gallery
function show_gallery_modal(editor,_this){
	$.post(url_base+"gallery/show_ajax",{event:"ajax"},function(data){
		d = JSON.parse(data);
		img = "<ul class='gallery'>";
		for(var i=0;i<d.length;i++){
			if(editor==0){
				img += "<li><a onclick='selected_two(this,\""+_this.id+"\");'><img id='"+d[i]["idgallery"]+"' src='"+url_base+d[i]["src"]+"' title='"+d[i]["name"]+"'></a></li>";
			}else{
				img += "<li><a onclick='selected(this);'><img id='"+d[i]["idgallery"]+"' src='"+url_base+d[i]["src"]+"' title='"+d[i]["name"]+"'></a></li>";
			}
		}
		img += "</ul>";
		$("#gallery_modal .modal-body").html(img);
	});
	$("#gallery_modal").modal('show');
	$(".progressbar").css("width","0");
	$(".progressbar").html("");
	$("#image").val("");
	$("#image").attr("onchange","upload('"+editor+"','"+_this.id+"');")
}
function upload(editor,_id){
	var formData = new FormData($("#formuploadajax")[0]);
    var ruta = url_base+"gallery/upload";
    $.ajax({
        url: ruta,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        xhr: function() {
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener("progress", function(evt) {
			  	if (evt.lengthComputable) {
				    var percentComplete = evt.loaded / evt.total;
				    percentComplete = parseInt(percentComplete * 100);
					$(".progressbar").css("width",percentComplete+"%");
					$(".progressbar").html(percentComplete+"%");
				}
			}, false);
			return xhr;
		},
        success: function(datos){
            if(editor=='1'){
            	$(".gallery").prepend("<li><a onclick='selected(this);'>"+datos+"</a></li>");
            }else if(editor=='2'){
            	$(".gallery").prepend("<li><a onclick='show_img(this);'>"+datos+"</a></li>");
        	}else{
        		$(".gallery").prepend("<li><a onclick='selected_two(this,\""+_id+"\");'>"+datos+"</a></li>");
        	}
        }
    });
}
function selected(_this){
	img = _this.getElementsByTagName("img");
	$(".gallery_selected").attr("class","");
	img[0].className += "gallery_selected";
	tinymce.activeEditor.execCommand('mceInsertContent', false, "<img src='"+img[0].src+"'>");
}
function selected_two(_this,id){
	img = _this.getElementsByTagName("img");
	$(".gallery_selected").attr("class","");
	img[0].className += "gallery_selected"
	document.getElementById(id).src = img[0].src;
	document.getElementById("idgallery_"+id).value = img[0].id;
}
function show_img(_this){
	var src = _this.getElementsByTagName("img")[0].src.replace(url_base,"");
	$('#gallery_modal').modal('show');
	$.post(url_base+"gallery/query/",{src:src},function(datas){
		var data = $.parseJSON(datas);
		$("#form_modal").attr("action",url_base+"gallery/edit/"+data["idgallery"]);
		$("#image_preview").attr("src",data["src"]);
		$("#image_preview").attr("alt",data["alternative"]);
		$("#src").val(url_base+data["src"]);
		$("#title").val(data["title"]);
		$("#legend").val(data["legend"]);
		$("#alternative").val(data["alternative"]);
		$("#description").val(data["description"]);
		$("#created").html("<b>"+aajs_language.gallery_created_by+": </b> "+data["person"]+" "+data["date_created"]);
		$("#img_delete").attr("href",url_base+"gallery/delete/"+data["idgallery"]);
	});
}