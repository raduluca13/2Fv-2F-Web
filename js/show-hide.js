function showDiv_curs() {
	if(document.getElementById('ul_su_lab').style.display = "block"){
		document.getElementById('ul_su_lab').style.display = "none";
		document.getElementById('a_su_lab').style.display = "block";
	}
	if(document.getElementById('ul_su_even').style.display = "block"){
		document.getElementById('ul_su_even').style.display = "none";
		document.getElementById('a_su_even').style.display = "block";
	}
	if(document.getElementById('a_hide_c').style.display = "none"){
		document.getElementById('a_hide_c').style.display = "block";
	}
	document.getElementById('a_su_curs').style.display = "none";
	document.getElementById('ul_su_curs').style.display = "block";
}

function showDiv_lab() {
	if(document.getElementById('ul_su_curs').style.display = "block"){
		document.getElementById('ul_su_curs').style.display = "none";
		document.getElementById('a_su_curs').style.display = "block";
	}
	if(document.getElementById('ul_su_even').style.display = "block"){
		document.getElementById('ul_su_even').style.display = "none";
		document.getElementById('a_su_even').style.display = "block";
	}
	if(document.getElementById('a_hide_l').style.display = "none"){
		document.getElementById('a_hide_l').style.display = "block";
	}
	document.getElementById('a_su_lab').style.display = "none";
	document.getElementById('ul_su_lab').style.display = "block";
}

function showDiv_ev() {
	if(document.getElementById('ul_su_curs').style.display = "block"){
		document.getElementById('ul_su_curs').style.display = "none";
		document.getElementById('a_su_curs').style.display = "block";
	}
	if(document.getElementById('ul_su_lab').style.display = "block"){
		document.getElementById('ul_su_lab').style.display = "none";
		document.getElementById('a_su_lab').style.display = "block";
	}
	if(document.getElementById('a_hide_ev').style.display = "none"){
		document.getElementById('a_hide_ev').style.display = "block";
	}
	document.getElementById('a_su_even').style.display = "none";
	document.getElementById('ul_su_even').style.display = "block";
}

function hide_curs(){
	if(document.getElementById('ul_su_curs').style.display = "block"){
		document.getElementById('ul_su_curs').style.display = "none";
		document.getElementById('a_su_curs').style.display = "block";
	}

}


function hide_lab(){
	if(document.getElementById('ul_su_lab').style.display = "block"){
		document.getElementById('ul_su_lab').style.display = "none";
		document.getElementById('a_su_lab').style.display = "block";
	}
}

function hide_ev(){
	if(document.getElementById('ul_su_even').style.display = "block"){
		document.getElementById('ul_su_even').style.display = "none";
		document.getElementById('a_su_even').style.display = "block";
	}
}