'use strict';
class aaJSClass{
	constructor(){
		this.valBegin();
	}
	valBegin(){
		var tags = {
			inputs : document.getElementsByTagName('input'),
			selects : document.getElementsByTagName('select'),
			textareas : document.getElementsByTagName('textarea'),
			buttons : document.getElementsByTagName('button'),
		}
		for(var tag in tags){
			var tags_into = tags[tag];	
			var tags_length = tags_into.length;
			for(var a=0;a<tags_length;a++){
				var click="",dblclick="",focus="",load="",mousedown="",mousemove="",mouseout="",mouseover="",mouseup="",reset="",resize="",select="",submit="",unload="",keyup="",keypress="",keydown="",blur="",change="";
				var div = document.createElement("div");
				div.className="aajs_alerts";
				if(tags_into[a].getAttribute("aajs") && tags_into[a].disabled == false){
					var arr_val = tags_into[a].getAttribute("aajs").split(",");
					var arr_val_length = arr_val.length;
					var div = document.createElement("div");
					div.id = tags_into[a].id+"_aajs_alerts";
					div.className="aajs_alerts";
					var request = new Array();
					if(/required/.test(tags_into[a].getAttribute("aajs"))){
						if(tags_into[a].type == "select-one"){
							change += "vEmpty(this);";
						}else{
							blur += "vEmpty(this);";	
						}
						if(tags_into[a].type != "hidden"){
							var p0 = document.createElement("span");
							p0.id = tags_into[a].id+"_empty";
							p0.innerHTML = aajs_language.required_message_alert;
							if(tags_into[a].value != ""){ p0.className = "del"; }
							div.append(p0);
						}
					}
					if(/number/.test(tags_into[a].getAttribute("aajs"))){
						keypress+="return vNumbers(event,this);";
						if(tags_into[a].type != "hidden"){
							var p2 = document.createElement("span");
							p2.id = tags_into[a].id+"_number";
							p2.innerHTML = aajs_language.number_message_alert;
							if(tags_into[a].value != ""){ p2.className = "del"; }
							div.append(p2);
						}
					}
					if(/letter/.test(tags_into[a].getAttribute("aajs"))){
						keypress += "return vLetter(event,this);";
						if(tags_into[a].type != "hidden"){
							var p3 = document.createElement("span");
							p3.id = tags_into[a].id+"_letter";
							p3.innerHTML = aajs_language.letter_message_alert;
							if(tags_into[a].value != ""){ p3.className = "del"; }
							div.append(p3);
						}
					}
					if(/email/.test(tags_into[a].getAttribute("aajs"))){
						blur += "vEmail(this);";
						if(tags_into[a].type != "hidden"){
							var p4 = document.createElement("span");
							p4.id = tags_into[a].id+"_email";
							p4.innerHTML = aajs_language.email_message_alert;
							if(tags_into[a].value != ""){ p4.className = "del"; }
							div.append(p4);
						}
					}
					if(/searchajax/.test(tags_into[a].getAttribute("aajs"))){
						keyup += "searchajax('"+tags_into[a].getAttribute("aajs").match(/searchajax{(.*)}/)[1].replace(",","',")+");";
					}
					if(/min/.test(tags_into[a].getAttribute("aajs"))){
						blur += "vMin(this,'"+tags_into[a].getAttribute("aajs").match(/min{(.*)}/)[1]+"');";
						if(tags_into[a].type != "hidden"){
							var p5 = document.createElement("span");
							p5.id = tags_into[a].id+"_min";
							p5.innerHTML = aajs_language.min_message_alert(tags_into[a].getAttribute("aajs").match(/min{(.*)}/)[1]);
							if(tags_into[a].value != ""){ p5.className = "del"; }
							div.append(p5);
						}
					}
					if(/click/.test(tags_into[a].getAttribute("aajs"))){
						click += tags_into[a].getAttribute("aajs").match(/click{(.*)}/)[1];
					}
					if(/dblclick/.test(tags_into[a].getAttribute("aajs"))){
						dblclick += tags_into[a].getAttribute("aajs").match(/dblclick{(.*)}/)[1];
					}
					if(/focus/.test(tags_into[a].getAttribute("aajs"))){
						focus += tags_into[a].getAttribute("aajs").match(/focus{(.*)}/)[1];
					}
					if(/keyup/.test(tags_into[a].getAttribute("aajs"))){
						keyup += tags_into[a].getAttribute("aajs").match(/keyup{(.*)}/)[1];
					}
					if(/keypress/.test(tags_into[a].getAttribute("aajs"))){
						keypress += tags_into[a].getAttribute("aajs").match(/keypress{(.*)}/)[1];
					}
					if(/keydown/.test(tags_into[a].getAttribute("aajs"))){
						keydown += tags_into[a].getAttribute("aajs").match(/keydown{(.*)}/)[1];
					}
					if(/load/.test(tags_into[a].getAttribute("aajs"))){
						load += tags_into[a].getAttribute("aajs").match(/load{(.*)}/)[1];
					}
					if(/mousedown/.test(tags_into[a].getAttribute("aajs"))){
						mousedown += tags_into[a].getAttribute("aajs").match(/mousedown{(.*)}/)[1];
					}
					if(/mousemove/.test(tags_into[a].getAttribute("aajs"))){
						mousemove += tags_into[a].getAttribute("aajs").match(/mousemove{(.*)}/)[1];
					}
					if(/mouseout/.test(tags_into[a].getAttribute("aajs"))){
						mouseout += tags_into[a].getAttribute("aajs").match(/mouseout{(.*)}/)[1];
					}
					if(/mouseover/.test(tags_into[a].getAttribute("aajs"))){
						mouseover += tags_into[a].getAttribute("aajs").match(/mouseover{(.*)}/)[1];
					}
					if(/mouseup/.test(tags_into[a].getAttribute("aajs"))){
						mouseup += tags_into[a].getAttribute("aajs").match(/mouseup{(.*)}/)[1];
					}
					if(/reset/.test(tags_into[a].getAttribute("aajs"))){
						reset += tags_into[a].getAttribute("aajs").match(/reset{(.*)}/)[1];
					}
					if(/resize/.test(tags_into[a].getAttribute("aajs"))){
						resize += tags_into[a].getAttribute("aajs").match(/resize{(.*)}/)[1];
					}
					if(/select/.test(tags_into[a].getAttribute("aajs"))){
						select += tags_into[a].getAttribute("aajs").match(/select{(.*)}/)[1];
					}
					if(/submit/.test(tags_into[a].getAttribute("aajs"))){
						submit += tags_into[a].getAttribute("aajs").match(/submit{(.*)}/)[1];
					}
					if(/unload/.test(tags_into[a].getAttribute("aajs"))){
						unload += tags_into[a].getAttribute("aajs").match(/unload{(.*)}/)[1];
					}
					if(/blur/.test(tags_into[a].getAttribute("aajs"))){
						blur += tags_into[a].getAttribute("aajs").match(/blur{(.*)}/)[1];
					}
					if(/change/.test(tags_into[a].getAttribute("aajs"))){
						change += tags_into[a].getAttribute("aajs").match(/change{(.*)}/)[1];
					}
					if(/send/.test(tags_into[a].getAttribute("aajs"))){
						tags_into[a].type = "button";
						click +="((valEnd(this))? submit() : false);";
					}
				}
				if(click.length > 0){
					tags_into[a].setAttribute("onclick",click);
				}
				if(dblclick.length > 0){
					tags_into[a].setAttribute("ondblclick",dblclick);
				}
				if(focus.length > 0){
					tags_into[a].setAttribute("onfocus",focus);
				}
				if(keyup.length > 0){
					tags_into[a].setAttribute("onkeyup",keyup);
				}
				if(keypress.length > 0){
					tags_into[a].setAttribute("onkeypress",keypress);
				}
				if(keydown.length > 0){
					tags_into[a].setAttribute("onkeydown",keydown);
				}
				if(load.length > 0){
					tags_into[a].setAttribute("onload",load);
				}
				if(mousedown.length > 0){
					tags_into[a].setAttribute("onmousedown",mousedown);
				}
				if(mousemove.length > 0){
					tags_into[a].setAttribute("onmousemove",mousemove);
				}
				if(mouseout.length > 0){
					tags_into[a].setAttribute("onmouseout",mouseout);
				}
				if(mouseover.length > 0){
					tags_into[a].setAttribute("onmouseover",mouseover);
				}
				if(mouseup.length > 0){
					tags_into[a].setAttribute("onmouseup",mouseup);
				}
				if(reset.length > 0){
					tags_into[a].setAttribute("onreset",reset);
				}
				if(resize.length > 0){
					tags_into[a].setAttribute("onresize",resize);
				}
				if(select.length > 0){
					tags_into[a].setAttribute("onselect",select);
				}
				if(submit.length > 0){
					tags_into[a].setAttribute("onsubmit",submit);
				}
				if(unload.length > 0){
					tags_into[a].setAttribute("onunload",unload);
				}
				if(blur.length > 0){
					tags_into[a].setAttribute("onblur",blur);
				}
				if(change.length > 0){
					tags_into[a].setAttribute("onchange",change);
				}
				tags_into[a].parentNode.append(div);
			}
		}
	}
}
var aajs = new aaJSClass;
function valEnd(_this){
	var tags = {
		inputs : document.getElementsByTagName('input'),
		selects : document.getElementsByTagName('select'),
		textareas : document.getElementsByTagName('textarea'),
		buttons : document.getElementsByTagName('button')
	}
	var send = true;
	for(var tag in tags){
			var tags_into = tags[tag];	
			var tags_length = tags_into.length;
		for(var a=0;a<tags_length;a++){
			if(tags_into[a].getAttribute("aajs") && tags_into[a].disabled == false){
				var arr_val = tags_into[a].getAttribute("aajs").split(",");
				var arr_val_length = arr_val.length;
				for(var b=0;b<arr_val_length;b++){
					if(send){
						if(arr_val[b] == "required"){
							send  = vEmpty(tags_into[a]);
						}else if(arr_val[b] == "email"){
							send = vEmail(tags_into[a]);
						}else if(arr_val[b].substr(0,3) == "min"){
							send = vMin(tags_into[a],arr_val[b].substr(3));
						}
					}else{
						break;
					}
				}
			}
		}
	}
	if(send){
		return true;
	}else{
		aajs_language.empty_alert();
		return false;
	}
}
function vMin(_this,num){
	if(_this.value.length < num){
		_this.style.borderColor = "#f44242";
		document.getElementById(_this.id+"_min").className = "";
		return false;
	}else{
		_this.style.borderColor = "#cccccc";
		document.getElementById(_this.id+"_min").className = "del";
		return true;
	}
}
function vEmpty(_this){
	if(( _this.value == null || _this.value.length == 0 || /^\s+$/.test(_this.value) )){
		_this.style.borderColor = "#f44242";
		if(document.getElementById(_this.id+"_empty")!=null)
			document.getElementById(_this.id+"_empty").className = "";
		return false;
	}else{
		_this.style.borderColor = "#cccccc";
		if(document.getElementById(_this.id+"_empty")!=null)
			document.getElementById(_this.id+"_empty").className = "del";
		return true;
	}
}
function vNumbers(evt,_this){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if(Number(_this.value) == 0 && evt.key!='0'){
		document.getElementById(_this.id+"_number").className = "";
	}else{
		document.getElementById(_this.id+"_number").className = "del";
	}
	if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46){
		return false;
	}else{
		return true;	
	}
}
function vLetter(e,_this){
    var key = e.keyCode || e.which;
    var tecla = String.fromCharCode(key).toLowerCase();
    var letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    var especiales = [8,35,36,37,46,39,9];
    var tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }   
	if(letras.indexOf(tecla)==-1 && !tecla_especial){
		return false;
		document.getElementById(_this.id+"_letter").className = "";
    }else{
    	document.getElementById(_this.id+"_letter").className = "del";
    	return true;
    }
}
function vEmail(_this){
	var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   	if (!expr.test(_this.value)){
       	aajs_language.email_alert();
       	document.getElementById(_this.id+"_email").className = "";
       	return false;
   	}else{
   		document.getElementById(_this.id+"_email").className = "del";
   		return true;
   	}
}
function ajax(url,settings,callback){
	window.XMLHttpRequest || (window.XMLHttpRequest = function() { return new ActiveXObject("Msxml2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP"); });
	var ajax = new XMLHttpRequest();
	ajax.open("POST",url,true);
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	var data="";
	for(var setting in settings){
	    data+="&"+setting+"="+settings[setting];
	}
	ajax.send(data);
	ajax.onreadystatechange = function(){
	    if (ajax.readyState == 4 && ajax.status == 200)
	    	callback(ajax.responseText);
	}
}
var div_searchajax = document.createElement("div");
div_searchajax.className = "aajssearchajax";
function searchajax(url,_this){
	var tagFather = _this.parentNode;
	tagFather.style.position = "relative";
	tagFather.appendChild(div_searchajax);
	if(_this.value.length>0){
		ajax(url,{value:_this.value},function(datas){
			var data = JSON.parse(datas);
			var objHTML="";
			for(var d in data){
				var obj = data[d];
				objHTML += "<a href='javascript:void(0)' onclick=\"searchajax_select('"+_this.id+"','"+obj[0]+"','"+obj[1]+"');\">"+obj[1]+" </a><br>";
			}
			div_searchajax.style.display = "block";
			div_searchajax.innerHTML = objHTML;
		});
	}else{
		document.getElementById("id"+_this.id).value = "";
		_this.value = "";
		div_searchajax.style.display = "none";
		div_searchajax.innerHTML = "";		
	}
}
function searchajax_select(__id,__obj_id,__obj_text){
	document.getElementById("id"+__id).value = __obj_id;
	document.getElementById(__id).value = __obj_text;
	div_searchajax.style.display = "none";
	div_searchajax.innerHTML = "";
}