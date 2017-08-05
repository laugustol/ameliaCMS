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
				var xonclick=""
				var xonkeyup="";
				var xonkeypress="";
				var xonkeydown="";
				var xonblur="";
				var xonchange="";
				var div = document.createElement("div");
				div.className="aajs_alerts";
				if(tags_into[a].getAttribute("aajs") && tags_into[a].disabled == false){
					var arr_val = tags_into[a].getAttribute("aajs").split(",");
					var arr_val_length = arr_val.length;
					var div = document.createElement("div");
					div.id = tags_into[a].id+"_aajs_alerts";
					div.className="aajs_alerts";
					var request = new Array();
					for(var b=0;b<arr_val_length;b++){
						if(arr_val[b] == "required"){ 
							if(tags_into[a].type == "select-one"){
								xonchange += "vEmpty(this);";
							}else{
								xonblur += "vEmpty(this);";	
							}
							if(tags_into[a].type != "hidden"){
								var p0 = document.createElement("span");
								p0.id = tags_into[a].id+"_empty";
								p0.innerHTML = aajs_language.required_message_alert;
								if(tags_into[a].value != ""){ p0.className = "del"; }
								div.append(p0);
							}
						}else if(arr_val[b] == "number"){
							xonkeypress+="return vNumbers(event,this);";
							if(tags_into[a].type != "hidden"){
								var p2 = document.createElement("span");
								p2.id = tags_into[a].id+"_number";
								p2.innerHTML = aajs_language.number_message_alert;
								if(tags_into[a].value != ""){ p2.className = "del"; }
								div.append(p2);
							}
						}else if(arr_val[b] == "letter"){
							xonkeypress += "return vLetter(event,this);";
							if(tags_into[a].type != "hidden"){
								var p3 = document.createElement("span");
								p3.id = tags_into[a].id+"_letter";
								p3.innerHTML = aajs_language.letter_message_alert;
								if(tags_into[a].value != ""){ p3.className = "del"; }
								div.append(p3);
							}
						}else if(arr_val[b] == "email"){
							xonblur += "vEmail(this);";
							if(tags_into[a].type != "hidden"){
								var p4 = document.createElement("span");
								p4.id = tags_into[a].id+"_email";
								p4.innerHTML = aajs_language.email_message_alert;
								if(tags_into[a].value != ""){ p4.className = "del"; }
								div.append(p4);
							}
						}else if(arr_val[b].substr(0,11) == "searchajax{"){
							xonkeyup += "searchajax('"+arr_val[b].substr(11)+"',"+arr_val[(b+1)].replace('}','')+");";
						}else if(arr_val[b].substr(0,3) == "min"){
							xonblur += "vMin(this,'"+arr_val[b].substr(3)+"');";
							if(tags_into[a].type != "hidden"){
								var p5 = document.createElement("span");
								p5.id = tags_into[a].id+"_min";
								p5.innerHTML = aajs_language.min_message_alert(arr_val[b].substr(3));
								if(tags_into[a].value != ""){ p5.className = "del"; }
								div.append(p5);
							}
						/*}else if(){

						}else if(){
							
						}else if(){
							
						}else if(){
							
						}else if(){

						}else if(){*/

						}else if(arr_val[b] == "send"){
							tags_into[a].type = "button";
							xonclick +="((valEnd(this))? submit() : false);";
						}
					}
				}
				tags_into[a].setAttribute("onclick",xonclick);
				tags_into[a].setAttribute("onkeyup",xonkeyup);
				tags_into[a].setAttribute("onkeypress",xonkeypress);
				tags_into[a].setAttribute("onkeydown",xonkeydown);
				tags_into[a].setAttribute("onblur",xonblur);
				tags_into[a].setAttribute("onchange",xonchange);
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