var links = {"Asus":"http://www.asus.com", "Hewlett-Packard":"http://www.hp.com", "Lenovo":"http://www.lenovo.com"};

function goToURL(){
	var s = document.forms.mySelect.selURL;//вибір елемента select
	var url = s.options[s.selectedIndex].value;//значення вибраного елемента option
	location.assign(url);
}
		
// Добавляємо в список select елементи option
var s = document.forms.mySelect.selURL;
for (var linkName in links){
	var opt = new Option();
	/* 
		або var opt = new Option(linkName, links[linkName]);
		або var opt = document.createElement("option");
	*/
	opt.text = linkName;
	opt.value = links[linkName];
	s.add(opt);
}

