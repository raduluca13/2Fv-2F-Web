function showDiv_curs() {
	if(document.getElementById('ul_su_lab').style.display == "block"){
		document.getElementById('ul_su_lab').style.display = "none";
		document.getElementById('a_su_lab').style.display = "block";
	}
	if(document.getElementById('ul_su_even').style.display == "block"){
		document.getElementById('ul_su_even').style.display = "none";
		document.getElementById('a_su_even').style.display = "block";
	}
	if(document.getElementById('a_hide_c').style.display == "none"){
		document.getElementById('a_hide_c').style.display = "block";
	}
	document.getElementById('a_su_curs').style.display = "none";
	document.getElementById('ul_su_curs').style.display = "block";
}

function showDiv_lab() {
	if(document.getElementById('ul_su_curs').style.display == "block"){
		document.getElementById('ul_su_curs').style.display = "none";
		document.getElementById('a_su_curs').style.display = "block";
	}
	if(document.getElementById('ul_su_even').style.display == "block"){
		document.getElementById('ul_su_even').style.display = "none";
		document.getElementById('a_su_even').style.display = "block";
	}
	if(document.getElementById('a_hide_l').style.display == "none"){
		document.getElementById('a_hide_l').style.display = "block";
	}
	document.getElementById('a_su_lab').style.display = "none";
	document.getElementById('ul_su_lab').style.display = "block";
}

function showDiv_ev() {
	if(document.getElementById('ul_su_curs').style.display == "block"){
		document.getElementById('ul_su_curs').style.display = "none";
		document.getElementById('a_su_curs').style.display = "block";
	}
	if(document.getElementById('ul_su_lab').style.display == "block"){
		document.getElementById('ul_su_lab').style.display = "none";
		document.getElementById('a_su_lab').style.display = "block";
	}
	if(document.getElementById('a_hide_ev').style.display == "none"){
		document.getElementById('a_hide_ev').style.display = "block";
	}
	document.getElementById('a_su_even').style.display == "none";
	document.getElementById('ul_su_even').style.display = "block";
}
// function showRanking(category){
// 	if(category === 'curs'){
// 		document.getElementById('a_hide_c').style.display = "block";
// 		document.getElementById('search_input_c').style.display = "block";
// 		document.getElementById('a_show_c').style.display = "none";
// 	}
// 	if(category === 'lab'){
// 		document.getElementById('a_hide_l').style.display = "block";	
// 		document.getElementById('search_input_l').style.display = "block";
// 		document.getElementById('a_show_l').style.display = "none";
// 	}
// 	if(category === 'ev'){
// 		document.getElementById('a_hide_e').style.display = "block";
// 		document.getElementById('search_input_e').style.display ="block";
// 		document.getElementById('a_show_e').style.display = "none";
// 	}
	
// 	var tabel = document.getElementById('ul_su_'+category);
// 	var tblHead = document.createElement("thead");
// 	var row = document.createElement("tr");

// 	var td = document.createElement("td");
// 	var text = document.createTextNode("Numar Matricol");
// 	td.appendChild(text);
// 	row.appendChild(td);
// 	tblHead.appendChild(row);

// 	var prezenteCurs;
// 	var prezenteLab;

// 	ajax.get('/api/catalog', {}, function (results){
    	
//     	let result = JSON.parse(results);
//     	console.log(result);
//     	prezenteCurs = [];
//     	prezenteLab = [];
//     	var iterator = result.keys();
//     	for
//     	prezenteCurs = results.indexOf('prezente_curs');
//     	prezenteLab = results.indexOf('prezente_lab');
//     	console.log('asdsadasd', prezenteCurs);
// 	});
// 	console.log(prezenteCurs);

// 	for(let i=1; i<14;i++){
// 		var td = document.createElement("td");
// 		let text = document.createTextNode("S"+i);
// 		td.appendChild(text);
// 		row.appendChild(td);
// 	}

// 	tblHead.appendChild(row);
// 	tabel.appendChild(tblHead);
	
// 	var tblBody = document.createElement("tbody");
// 	for(let i=0; i<14; i++){
// 		var row = document.createElement("tr");
// 	}

// 	tabel.appendChild(tblBody);

// 	document.getElementById('ul_su_'+category).style.display="block";
// 	tabel.setAttribute("border", "2");
// }


function hide(category){
	if(category === 'curs'){
		document.getElementById('a_hide_c').style.display = "none";
		document.getElementById('search_input_c').style.display = "none";
		document.getElementById('ul_su_'+category).innerHTML = '';
		document.getElementById('ul_su_'+category).style.display = "none";
		document.getElementById('a_show_c').style.display = "block";	
	}
	if(category === 'lab'){
		document.getElementById('a_hide_l').style.display = "none";
		document.getElementById('search_input_l').style.display = "none";
		document.getElementById('ul_su_'+category).innerHTML = '';
		document.getElementById('ul_su_'+category).style.display = "none";
		document.getElementById('a_show_l').style.display = "block";
	}
	if(category === 'ev'){
		document.getElementById('a_hide_e').style.display = "none";
		document.getElementById('search_input_e').style.display = "none";
		document.getElementById('ul_su_'+category).innerHTML = '';
		document.getElementById('ul_su_'+category).style.display = "none";
		document.getElementById('a_show_e').style.display = "block";	
	}
}
/*
function myFunction() {
    var x = document.getElementById("fname").value;
    document.getElementById("demo").innerHTML = x;
}
*/