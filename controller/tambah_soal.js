var xmlhttprequest;
var times;
times = 0;

function test() {
	alert("Success");
}

function newSoal() {
	times = times + 1;
	xmlhttprequest = cekBrowser();
	if (times == 1) idedit = "soal_baru";
	else idedit = "soal_baru" + times;
	var url = "controller/extra_soal_panel.php?times="+times;
	// alert(times);
	xmlhttprequest.onreadystatechange = function() {
		// alert(xmlhttprequest.readyState);
		if (xmlhttprequest.readyState == 4 && xmlhttprequest.status == 200) {
			document.getElementById(idedit).innerHTML = xmlhttprequest.responseText;
		}
	}
	xmlhttprequest.open("GET", url, true);
	xmlhttprequest.send();
}

function cekBrowser() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	} else {
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
}