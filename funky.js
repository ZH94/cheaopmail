function load(page){
	document.getElementById('page').setHtml(page);
}

function login(){
	var xmlhttp;
	if(window.XMLHttpRequest){ // code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("content").innerHTML=xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET', 'add.php', true);
	xmlhttp.send();
}


function message_send()
{
	var details = document.getElementsByClassName('messagedetails');
	var msg = document.getElementsByTagName('textarea');
	new Ajax.Request("action.php",
	{
		parameters: {'addMessage', to:details[0].value, subject:details[1].value, body:msg[0].value},
		method: "get",
		onSuccess: function(data){alert(data.responseText);},
		onCreate: function(response){
			var t = response.transport;
			t.setRequestheader = t.setRequestHeader.wrap(function(original, k, v){
				if(/^(accept|accept-language|content-lanuage)$/i.test(k))
					return original(k,v);
				if(/^content-type$/i.test(k) &&
					/^ (application\/x-form-urlencoded|multipart\/form-data|text\/plain)(;.+?$/i.text(v))
					return original(k,v);
				return;});
			}
	});
}