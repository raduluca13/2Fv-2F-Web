<link rel="stylesheet" type="text/css" href="/catalog/css/catalog.css"></script>
<script>
function showRanking(category,type){
  // console.log(category);
  if(category === 'curs'){
    document.getElementById('a_hide_c').style.display = "inline-block";
    document.getElementById('a_show_c').style.display = "none";
  }
  if(category === 'lab'){
    document.getElementById('a_hide_l').style.display = "inline-block";
    document.getElementById('a_show_l').style.display = "none";
  }
  if(category === 'ev'){
    document.getElementById('a_hide_e').style.display = "inline-block";
    document.getElementById('a_show_e').style.display = "none";
    return;
  }

  var tabel = document.getElementById('ul_su_'+category);
  var tblHead = document.createElement("thead");
  var row = document.createElement("tr");

  var td = document.createElement("td");
  var text = document.createTextNode("Numar Matricol");
  td.appendChild(text);
  row.appendChild(td);
  tblHead.appendChild(row);


  for(let i=1; i<14;i++){
    var td = document.createElement("td");
    let text = document.createTextNode("S"+i);
    td.appendChild(text);
    row.appendChild(td);
  }

  tblHead.appendChild(row);
  tabel.appendChild(tblHead);

  var tblBody = document.createElement("tbody");
  tabel.appendChild(tblBody);

  document.getElementById('ul_su_'+category).style.display="block";
  var idUser = cookieGetUserID();
  console.log('id: ',idUser);
  console.log('type: ', type);
  console.log('category: ', category);
  if(type=='prezente'){
    if(category=='curs'){
      tabel.setAttribute("border", "2");
      ajax.get('/api/catalog', {id:idUser}, function (results){
        let resultParsed = JSON.parse(results);
        resultParsed["prezente_curs"].forEach(populatePrezenteCurs);
        resultParsed=[];
      });
    }else if(category=='lab'){
      ajax.get('/api/catalog', {id:idUser}, function(results){
        let resultParsed = JSON.parse(results);
        resultParsed["prezente_lab"].forEach(populatePrezenteLab);
        resultParsed=[];
      });
    }
  }else if(type=='note'){
    if(category=='lab'){
      ajax.get('/api/catalog', {id:idUser}, function(results){
        let resultParsed = JSON.parse(results);
        resultParsed["note_lab"].forEach(populateNoteLab);
        resultParsed=[];
      });
    }
  }
  function populatePrezenteCurs(element, index, arr){
    // var tblBody = document.getElementById("ul_su_curs").getElementsByTagName('tbody');
    var row = tblBody.insertRow(index);//table.bdoy.length
    let cell = row.insertCell(0);
    cell.innerHTML = element[1]+' '+element[2];
    for (let i=1; i<14; i++){
      this['cell'+i] = row.insertCell(i);
      if (element[3]==i){
        this['cell'+i].innerHTML = 1;
      }else{
        this['cell'+i].innerHTML = '-';
      }
    }
  }
  function populatePrezenteLab(element, index, arr){
    var row = tblBody.insertRow(index);
    let cell = row.insertCell(0);
    cell.innerHTML = element[0];
    for (let i=1; i<14; i++){
      this['cell'+i] = row.insertCell(i);
      // row.insertCell(tableRef.rows.length);
      if (element[1]==i){
        this['cell'+i].innerHTML = 1;
      }else{
        this['cell'+i].innerHTML = '-';
      }
    }
  }
  function populateNoteLab(element, index, arr){
    var row = tblBody.insertRow(index);//table.bdoy.length
    let cell = row.insertCell(0);
    cell.innerHTML = element[1]+' '+element[2];
    for (let i=1; i<14; i++){
      // console.log('populare curs coloana',i);
      this['cell'+i] = row.insertCell(i);
      if (element[4]==i){
        this['cell'+i].innerHTML = element[3];
      }else{
        this['cell'+i].innerHTML = '-';
      }
    }
  }
}
function hide(category){
  if(category === 'curs'){
    document.getElementById('a_hide_c').style.display = "none";
    document.getElementById('a_insert_c').style.display = "none";
    document.getElementById('search_input_c').style.display = "none";
    document.getElementById('ul_su_'+category).innerHTML = '';
    document.getElementById('ul_su_'+category).style.display = "none";
    document.getElementById('a_show_c').style.display = "block";
  }
  if(category === 'lab'){
    document.getElementById('a_hide_l').style.display = "none";
    document.getElementById('a_insert_l').style.display = "none";
    document.getElementById('search_input_l').style.display = "none";
    document.getElementById('ul_su_'+category).innerHTML = '';
    document.getElementById('ul_su_'+category).style.display = "none";
    document.getElementById('a_show_l').style.display = "block";
  }
  if(category === 'ev'){
    document.getElementById('a_hide_e').style.display = "none";
    document.getElementById('a_insert_e').style.display = "none";
    document.getElementById('search_input_e').style.display = "none";
    document.getElementById('ul_su_'+category).innerHTML = '';
    document.getElementById('ul_su_'+category).style.display = "none";
    document.getElementById('a_show_e').style.display = "block";
  }
}
</script>

<header>
	<h1 class="title">My WEB way!</h1>
	<nav>
		<ul id="nav_ul">
      <li id="home_li" class="nav_item"><a id="a_frontpage" href="/home">Home</a></li>
      <li id="catalog_li" class="nav_item"><a id="a_catalog" href="/catalog">Rankings</a></li>
      <li id="sugestii_li" class="nav_item"><a id="a_sugestii" href="/sugestii">Suggestions</a></li>
      <li id="ddn" class="nav_item"><a id="logout" href="javascript:logout();">Logout</a>	</li>
		</ul>
	</nav>
</header>

<div class="main_container">
	<section id="sec1" class="bigtitle">
  	<h2 class="bigtitle-title">COURSE SCORES</h2>
  	<a id="a_show_c" href="#" onclick="showRanking('curs','prezente');" class="info-link">Click here for details</a>

    <table id="ul_su_curs" class="table_table">
    </table>

  	<input type="text" id="search_input_c" onkeyup="myFunction()" placeholder="Search for names..">
 		<a id="a_hide_c" class="info-link" href="#" onclick="hide('curs');">Hide</a>
  </section>
	<section id="sec2" class="bigtitle">
  	<h2 class="bigtitle-title">LABORATORY SCORES</h2>
  	<a id="a_show_l" href="#" onclick="showRanking('lab','note');" class="info-link">Click here for details</a>
  	<table id="ul_su_lab" class="table_table">
  	</table>

  	<input type="text" id="search_input_l" onkeyup="myFunction();" placeholder="Search for names..">
  	<a id="a_hide_l" class="info-link" href="#" onclick="hide('lab');">Hide</a>
	</section>
  <section id="sec3" class="bigtitle">
    <h2 class="bigtitle-title">Other Events Standings</h2>
    <a id="a_show_e" href="#" onclick="showRanking('ev','ev');" class="info-link">Click here for details</a>

    <table id="ul_su_ev" class="table_table">
    </table>

    <input type="text" id="search_input_e" onkeyup="myFunction()" placeholder="Search for names..">
    <a id="a_hide_e" class="info-link" href="#" onclick="hide('ev')">Hide</a>
  </section>
</div>
