<script src="/login/js/login.js" type="text/javascript"></script>
<!-- <script src="/catalog/js/util.js" type="text/javascript"></script> -->
<script>
function loginOnLoad(){
    var formCondEmail = new FormularConditionObject('nr_matricol_error', function ()
    {
        /*var re = /^(([A-Z]{2}+[0-9]{2}+[A-Z]{9}))/;
        return re.test(String(getElementTextByID('nr_matricol')).toLowerCase());*/

        var re = /^[a-zA-Z]{2}/;
        return re.test(String(getElementTextByID('nr_matricol')));
    });


     var formCondEmail2 = new FormularConditionObject('saptamana_error', function ()
    {
        var re = /^([0-9]+)/;
        return re.test(String(getElementTextByID('saptamana')).toLowerCase());
    });
    formConds.push(formCondEmail);
    formConds.push(formCondEmail2);
    activateErrorElemets(formConds);
}
addLoadEvent(loginOnLoad);

function showRanking(category,type){
  if(category === 'curs'){
    document.getElementById('a_hide_c').style.display = "inline-block";
    document.getElementById('a_insert_c').style.display = "inline-block";
    document.getElementById('search_input_c').style.display = "block";

    document.getElementById('a_show_c').style.display = "none";
  }
  if(category === 'lab'){
    document.getElementById('a_hide_l').style.display = "inline-block";
    document.getElementById('a_insert_l').style.display = "inline-block";
    document.getElementById('search_input_l').style.display = "block";
    document.getElementById('a_show_l').style.display = "none";
  }
  if(category === 'ev'){
    document.getElementById('a_hide_e').style.display = "inline-block";
    document.getElementById('a_insert_e').style.display = "inline-block";
    document.getElementById('search_input_e').style.display ="block";
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
  if(type=='prezente'){
    if(category=='curs'){
    tabel.setAttribute("border", "2");
    ajax.get('/api/catalog', {}, function (results){
      let resultParsed = JSON.parse(results);
      resultParsed["prezente_curs"].forEach(populatePrezenteCurs);
      resultParsed=[];
    });
    }else if(category=='lab'){
      ajax.get('/api/catalog', {}, function(results){
        let resultParsed = JSON.parse(results);
        resultParsed["prezente_lab"].forEach(populatePrezenteLab);
        resultParsed=[];
      });
    }
  }else if(type=='note'){
    if(category=='lab'){
      ajax.get('/api/catalog', {}, function(results){
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
    cell.innerHTML = element[0];
    for (let i=1; i<14; i++){
      this['cell'+i] = row.insertCell(i);
      if (element[1]==i){
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
    cell.innerHTML = element[0]; /*element[1]+' '+element[2];*/
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

function insertPrezentaCurs(){
  document.getElementById('sec1').style.display = "none";
  document.getElementById('sec2').style.display = "none";
  document.getElementById('sec3').style.display = "none";
  document.getElementById('sec3_1').style.display = "none";
  document.getElementById('sec2_1').style.display = "none";
  document.getElementById('sec1_1').style.display = "block";
}
function insertNotaLab(){
  document.getElementById('sec1').style.display = "none";
  document.getElementById('sec2').style.display = "none";
  document.getElementById('sec3').style.display = "none";
  document.getElementById('sec1_1').style.display = "none";
  document.getElementById('sec3_1').style.display = "none";
  document.getElementById('sec2_1').style.display = "block";
}
function insertEveniment(){
  document.getElementById('sec1').style.display = "none";
  document.getElementById('sec2').style.display = "none";
  document.getElementById('sec3').style.display = "none";
  document.getElementById('sec3_1').style.display = "block";
  document.getElementById('sec2_1').style.display = "none";
  document.getElementById('sec1_1').style.display = "none";
}

function verificareInsertCurs(){
  ajax.post('api/catalog', {
    cat: 'prezenta',
    nr_matricol: getElementTextByID('nr_matricol'),
    saptamana: getElementTextByID('saptamana'),
    }, function (text){
      if (text === 'true')  {
        setElementVisible('register_success');
        // sleep(2500).then(() => {
        // window.location.replace("/catalog");
        // })
        setTimeout(function(){
          window.location.replace("/catalog");
        },2500);
      }
      else {
        setElementVisible('register_failure');
        // sleep(2500).then(() => {
        // window.location.replace("/catalog");
        // })
        setTimeout(function(){
          window.location.replace("/catalog");
        },2500);
      }

    });
}
function verificareInsertNota(){
  ajax.post('api/catalog', {
    cat: 'nota',
    nr_matricol: getElementTextByID('nr_matricol'),
    nota: getElementTextByID('nota'),
    data: getElementTextByID('data_notare'),
    saptamana: getElementTextByID('saptamana'),
    }, function (text){

      if (text === 'true')  {
        setElementVisible('register_success');
        // sleep(2500).then(() => {
        // window.location.replace("/catalog");
        // })
        setTimeout(function(){
          window.location.replace("/catalog");
        },5000);
      }
      else {
        setElementVisible('register_failure');
        // sleep(2500).then(() => {
        // window.location.replace("/catalog");
        // })
        setTimeout(function(){
          window.location.replace("/catalog");
        },5000);
      }

    });
}
function verificareInsertEveniment(){
  ajax.post('api/catalog', {
    cat: 'eveniment',
    title: getElementTextByID('title'),
    descriere: getElementTextByID('descriere'),
    }, function (text){
      if (text === 'true')  {
      setElementVisible('register_success');
      sleep(5000).then(() => {
      window.location.replace("/catalog");
      })
    //   setTimeout(function(){
    //     window.location.replace("/catalog");
    //   },5000);
    }
    else {
      setElementVisible('register_failure');
      // sleep(2500).then(() => {
      // window.location.replace("/catalog");
      // })
      setTimeout(function(){
        window.location.replace("/catalog");
      },5000);
    }

    });
}


</script>
<header>
	<h1 class="title">My WEB way!</h1>
	<nav>
		<ul id="nav_ul">
      <li id="home_li" class="nav_item"><a id="a_frontpage" href="/home">Home</a></li>
      <li id="sugestii_li" class="nav_item"><a id="a_sugestii" href="/sugestii">Suggestions</a></li>
      <li id="catalog_li" class="nav_item"><a id="a_catalog" href="/catalog">Rankings</a></li>
      <li id="profile" class="nav_item"><a id="a_profile" href="/profile">Profile</a>
        <li id="ddn" class="nav_item"><a id="logout" href="javascript:logout();">Logout</a>
			<!--ul id="dropdown"-->
				<!--li id="myprofile_li"><a id="a_myprofile" href="myprofile.html">Detalii</a></li-->
				<!--li id="logout_li"><a id="a_logout" href="logout.html">Logout</a></li-->
			<!--/ul-->
			</li>
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
      <a id="a_insert_c" class="info-link" href="#" onclick="insertPrezentaCurs();">Adaugati o prezenta</a>

  	</section>

    <section id="sec1_1" class="bigtitle">
      <h1 style="text-align:center">Inserare prezenta curs</h1>
      <form class="register" action="#" method="post">

        <span id="register_success"">Prezenta inserata cu succes.</span>
        <span id="register_failure"">Prezenta nu a putut fi inserata.</span>
        <script>
          setElementInvisible('register_success')
          setElementInvisible('register_failure')
        </script>
        <div>
          <label for="nr_matricol">Nr_matricol*</label>
          <input type="text" name="nr_matricol" id="nr_matricol">
          <span id="nr_matricol_error" onblur="onBlur();">Nr matricol nu este valid</span>
        </div>

        <div>
          <label for="saptamana">Saptamana*</label>
          <input type="number" name="saptamana" id="saptamana">
          <span id="saptamana_error"  onblur="onBlur();">Alegeti saptamana in care a fost pusa nota.</span>
        </div>

        <div class="actions">
          <button type="button" onclick="verificareInsertCurs();">INSERARE PREZENTA</button>
        </div>
      </form>
    </section>

  	<section id="sec2" class="bigtitle">
    	<h2 class="bigtitle-title">LABORATORY SCORES</h2>
    	<a id="a_show_l" href="#" onclick="showRanking('lab','note');" class="info-link">Click here for details</a>
    	<table id="ul_su_lab" class="table_table">
    	</table>

    	<input type="text" id="search_input_l" onkeyup="myFunction();" placeholder="Search for names..">
    	<a id="a_hide_l" class="info-link" href="#" onclick="hide('lab');">Hide</a>
      <a id="a_insert_l" class="info-link" href="#" onclick="insertNotaLab();">Adaugati o nota</a>
  	</section>

    <section id="sec2_1" class="bigtitle">
      <h1 style="text-align:center">Inserare nota laborator</h1>
      <form class="register" action="#" method="post">
        <span id="notaInserata">Nota inserata cu succes.</span>
        <span id="notaInserataFail">Nota nu a putut fi inserata.</span>
        <script>
          setElementInvisible('notaInserata');
          setElementInvisible('notaInserataFail');
        </script>
        <div>
          <label for="nr_matricol">Nr_matricol*</label>
          <input type="text" name="nr_matricol" id="nr_matricol" onblur="onBlur();">
          <span id="nr_matricol_error">Nr matricol nu este valid</span>
        </div>
        <div>
          <label for="nota">Nota</label>
          <input type="number" name="github" id="nota" onblur="onBlur();">
          <span id="nota_error">Nota este obligatorie</span>
        </div>
        <div>
          <label for="data_notare">Data_notare*</label>
          <input type="date" name="data_notare" id="data_notare" onblur="onBlur();">
          <span id="data_notare_error">Data nu este valida</span>
        </div>
        <div>
          <label for="saptamana">Saptamana*</label>
          <input type="number" name="saptamana" id="saptamana" onblur="onBlur();">
          <span id="saptamana_error">Alegeti saptamana in care a fost pusa nota.</span>
        </div>

        <div class="actions">
          <button type="button" onclick="verificareInsertNota();">ADAUGA NOTA LABORATOR</button>
        </div>
      </form>
  </section>

	<section id="sec3" class="bigtitle">
    <h2 class="bigtitle-title">Other Events Standings</h2>
    <a id="a_show_e" href="#" onclick="showRanking('ev','ev');" class="info-link">Click here for details</a>

    <table id="ul_su_ev" class="table_table">
    </table>

    <input type="text" id="search_input_e" onkeyup="myFunction()" placeholder="Search for names..">
    <a id="a_hide_e" class="info-link" href="#" onclick="hide('ev')">Hide</a>
    <a id="a_insert_e" class="info-link" href="#" onclick="insertEveniment();">Adaugati un eveniment</a>
  </section>

  <section id="sec3_1" class="bigtitle">
      <h1 style="text-align:center">Adaugare eveniment nou</h1>
      <form class="register" action="#" method="post">
        <span id="register_success">Eveniment adaugat cu succes.</span>
        <span id="register_failure">Nota nu a putut fi inserata.</span>
        <script>
          setElementInvisible('register_success')
          setElementInvisible('register_failure')
        </script>
        <div>

          <label for="title">Titlu*</label>
          <input type="text" name="title" id="title" onblur="onBlur();">
          <span id="nota_error">Titlul este obligatoriu</span>
        </div>

        <div>
          <label for="saptamana">Descriere*</label>
          <input type="text" name="saptamana" id="saptamana" onblur="onBlur();">
          <span id="facebook_error">Adaugati o scurta descriere.</span>
        </div>

        <div class="actions">
          <button type="button" onclick="verificareInsertEveniment();">INSERARE EVENIMENT</button>
        </div>
      </form>
    </section>
</div>
