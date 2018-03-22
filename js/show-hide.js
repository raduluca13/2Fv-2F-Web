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
	document.getElementById('a_hide_c').style.display = "none";
	if(document.getElementById('ul_su_curs').style.display = "block"){
		document.getElementById('ul_su_curs').style.display = "none";
		document.getElementById('a_su_curs').style.display = "block";
	}	
}
function hide_lab(){
	document.getElementById('a_hide_l').style.display = "none";
	if(document.getElementById('ul_su_lab').style.display = "block"){
		document.getElementById('ul_su_lab').style.display = "none";
		document.getElementById('a_su_lab').style.display = "block";
	}
}
function hide_ev(){
	document.getElementById('a_hide_ev').style.display = "none";
	if(document.getElementById('ul_su_even').style.display = "block"){
		document.getElementById('ul_su_even').style.display = "none";
		document.getElementById('a_su_even').style.display = "block";
	}
}
function show_ranking_curs(){
	if(document.getElementById('a_hide_c').style.display = "none"){
		document.getElementById('a_hide_c').style.display = "block";
	}

	document.getElementById('search_input_c').style.display = "block";
	document.getElementById('a_su_curs').style.display = "none";
	document.getElementById('ul_su_curs').style.display = "table";
}

function show_rankings_lab(){
	if(document.getElementById('a_hide_l').style.display = "none"){
		document.getElementById('a_hide_l').style.display = "block";
	}
	document.getElementById('search_input_l').style.display = "block";
	document.getElementById('a_su_lab').style.display = "none";
	document.getElementById('ul_su_lab').style.display = "table";
}

function show_rankings_ev(){
	if(document.getElementById('a_hide_e').style.display = "none"){
		document.getElementById('a_hide_e').style.display = "block";
	}
	document.getElementById('search_input_e').style.display = "block";
	document.getElementById('a_su_even').style.display = "none";
	document.getElementById('ul_su_even').style.display = "table";
}
function hide_curs_c(){
	document.getElementById('a_hide_c').style.display = "none";
	document.getElementById('search_input_c').style.display = "none";
	if(document.getElementById('ul_su_curs').style.display = "block"){
		document.getElementById('ul_su_curs').style.display = "none";
		document.getElementById('a_su_curs').style.display = "block";
	}	
}
function hide_lab_c(){
	document.getElementById('a_hide_l').style.display = "none";
	document.getElementById('search_input_l').style.display = "none";
	if(document.getElementById('ul_su_lab').style.display = "block"){
		document.getElementById('ul_su_lab').style.display = "none";
		document.getElementById('a_su_lab').style.display = "block";
	}
}
function hide_ev_c(){
	document.getElementById('a_hide_ev').style.display = "none";
	document.getElementById('search_input_e').style.display = "none";
	if(document.getElementById('ul_su_even').style.display = "block"){
		document.getElementById('ul_su_even').style.display = "none";
		document.getElementById('a_su_even').style.display = "block";
	}
}
/*
function myFunction() {
    var x = document.getElementById("fname").value;
    document.getElementById("demo").innerHTML = x;
}
*/