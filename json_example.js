function loadDoc(){
	var xmlhttp;
	var url = "links.txt";
	if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
	else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			var myArr = JSON.parse(xmlhttp.responseText);
			myFunction(myArr);
			}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	
	function myFunction(arr){
		var out = "";
		var i;
		for(i = 0; i < arr.length; i++) {
			out += '<a href="' + arr[i].url + '">' + 
			arr[i].display + '</a><br>';
		}
		document.getElementById("json_example").innerHTML = out;
	}
}