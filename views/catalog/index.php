<script>
var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
var observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation,index,list){
      var entry = {
        mutation: mutation,
        el: mutation.target,
        value: mutation.target.textContent,
        oldValue: mutation.oldValue
      };
      console.log("Recording mutation:", entry);

      if (mutation.type == 'childList') {
        // console.log('\n'+'A child node has been added or removed.');
        // console.log('--childList TARGET---',mutation.target);
      }
      else if (mutation.type == 'attributes') {
        // console.log('\n'+'The ' + mutation.attributeName + ' attribute was modified.');
        // console.log('--------attr TARGET-----', mutation.target.textContent);
        // console.log('--------oldValue-------', mutation.oldValue);
      }
      else if (mutation.type == 'characterData'){
        // console.log(mutation);
        // console.log('characterData.rework');
      }
    })
});
var observerConfig = {
  attributes: true,
  childList: true,  //true for textContent,
  attributeOldValue: true,
  subtree: true,
  characterData: false //false for textContent
}


</script>
<header>
	<h1 class="title">My WEB way!</h1>
	<nav>
		<ul id="nav_ul">
      <li id="home_li" class="nav_item"><a id="a_frontpage" href="/home">Home</a></li>
      <li id="catalog_li" class="nav_item"><a id="a_catalog" href="/catalog">Rankings</a></li>
      <li id="profile_li" class="nav_item"><a id="a_profile" href="/profile">Profile</a>
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

      <label id="csvFileLabelId" for="csvFileId">Adauga prezente din fisier CSV
        <input name="csvFileId" id="csvFileId" type="file" style="display:none">
         <!-- onchange="handleFiles(this.files)" -->
      </label>
      <!-- <a href="#" id="a_csv_c" onclick="importCsv();">Adauga prezente din fisier CSV</a>  -->
  	</section>

    <section id="sec1_1" class="bigtitle">
      <h1 style="text-align:center">Inserare prezenta curs</h1>
      <form class="register" action="#" method="post">

        <span id="prezentaInsertSuccess">Prezenta inserata cu succes.</span>
        <span id="prezentaInsertFail">Prezenta nu a putut fi inserata.</span>
        <script>
          setElementInvisible('prezentaInsertSuccess');
          setElementInvisible('prezentaInsertFail');
        </script>
        <div>
          <label for="nr_matricol">Nr_matricol*</label>
          <input type="text" name="nr_mat" id="nr_matricol" onblur="blurChecker('nr_matricol');">
          <span id="nr_matricol_error" style="display:none" >Nr matricol nu este valid</span>
        </div>
        <div>
          <label for="data_notare">Data Notare*</label>
          <input type="date" name="data_notare" id="data_notare" onblur="blurChecker('data_notare');">
          <span id="data_notare_error"  style="display:none">Selectati data prezentei.</span>
        </div>
        <div>
          <label for="saptamana">Saptamana*</label>
          <input type="number" name="sapt" min="1" step="1" max="13" id="saptamana" onblur="blurChecker('saptamana');">
          <span id="saptamana_error" style="display:none">Alegeti saptamana in care a fost pusa prezenta.</span>
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
      <label id="csvFileLabelIdL" for="csvFileIdLab">Adauga prezente din fisier CSV
        <input name="csvFileIdLab" id="csvFileIdLab" type="file" style="display:none">
         <!-- onchange="handleFiles(this.files)" -->
      </label>
  	</section>

    <section id="sec2_1" class="bigtitle">
      <h1 style="text-align:center">Inserare nota laborator</h1>
      <form class="register" action="#" method="post">
        <span id="notaInsertSuccess">Nota inserata cu succes.</span>
        <span id="notaInsertFail">Nota nu a putut fi inserata.</span>
        <script>
          setElementInvisible('notaInsertSuccess');
          setElementInvisible('notaInsertFail');
        </script>
        <div>
          <label for="nr_matricolLab">Nr_matricol*</label>
          <input type="text" name="nr_matricolLab" id="nr_matricolLab" onblur="blurChecker('nr_matricolLab');">
          <span id="nr_matricolLab_error" style="display:none">Nr matricol nu este valid</span>
        </div>
        <div>
          <label for="nota">Nota</label>
          <input type="number" name="github" id="nota" min="1" max="10" step="1" onblur="blurChecker('nota');">
          <span id="nota_error" style="display:none">Nota este obligatorie</span>
        </div>
        <div>
          <label for="data_notareLab">Data_notare*</label>
          <input type="date" name="data_notareLab" id="data_notareLab" onblur="blurChecker('data_notareLab');">
          <span id="data_notareLab_error" style="display:none">Data nu este valida</span>
        </div>
        <div>
          <label for="saptamanaLab">Saptamana*</label>
          <input type="number" name="saptamanaLab" id="saptamanaLab" min="1" step="1" max="13" onblur="blurChecker('saptamanaLab');">
          <span id="saptamanaLab_error" style="display:none">Alegeti saptamana in care a fost pusa nota.</span>
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
        <span id="eventInsertSucces">Eveniment adaugat cu succes.</span>
        <span id="eventInsertFail">Nota nu a putut fi inserata.</span>
        <script>
          setElementInvisible('eventInsertSucces')
          setElementInvisible('eventInsertFail')
        </script>
        <div>
          <label for="eveniment">Eveniment*</label>
          <input type="text" name="eveniment" id="eveniment">
          <span id="eveniment_error" style="display:none">Titlul evenimentului este obligatoriu</span>
        </div>
         <div>
          <label for="passkey">Passkey</label>
          <input type="password" name="passkey" id="passkey" >
          <span id="passkey_error" style="display:none">Adaugati o scurta descriere.</span>
        </div>
        <div class="actions">
          <button type="button" onclick="verificareInsertEveniment();">INSERARE EVENIMENT</button>
        </div>
      </form>
    </section>
</div>
<script>
var formConds = [];
var editedFields = [];
var editableFields = [];
var listedStudentsCurs = document.createElement("div");
listedStudentsCurs.setAttribute('id','listaStudenti');
listedStudentsCurs.style.display = 'none';
console.log(listedStudentsCurs);
var listedStudentsLab = [];

var body = document.body;
body.appendChild(listedStudentsCurs);

function blurChecker(field){
  if(field == 'nr_matricol'){
    var conditionNrMat = new FormularConditionObject('nr_matricol_error', function () {
      /*var re = /^(([A-Z]{2}+[0-9]{2}+[A-Z]{9}))/;
      return re.test(String(getElementTextByID('nr_matricol')).toLowerCase());*/
      var re = /^([S]{1}[0-9]{7})/;
      return re.test(String(getElementTextByID('nr_matricol')));
    });
    formConds.push(conditionNrMat);
  }
  if(field == 'nr_matricolLab'){
    var conditionNrMatL = new FormularConditionObject('nr_matricolLab_error', function () {
      /*var re = /^(([A-Z]{2}+[0-9]{2}+[A-Z]{9}))/;
      return re.test(String(getElementTextByID('nr_matricol')).toLowerCase());*/
      var re = /^([S]{1}[0-9]{7})/;
      return re.test(String(getElementTextByID('nr_matricolLab')));
    });
    formConds.push(conditionNrMatL);
  }

  if(field == 'saptamana'){
    var conditionSaptamana = new FormularConditionObject('saptamana_error', function () {
      var re = /^([0-9])/;
      return re.test(String(getElementTextByID('saptamana')).toLowerCase());
    });
    formConds.push(conditionSaptamana);
  }
  if(field == 'saptamanaLab'){
    var conditionSaptamanaL = new FormularConditionObject('saptamanaLab_error', function () {
      var re = /^([0-9])/;
      return re.test(String(getElementTextByID('saptamanaLab')).toLowerCase());
    });
    formConds.push(conditionSaptamanaL);
  }
  if(field == 'data_notare'){
    var conditionDate = new FormularConditionObject('data_notare_error', function (){
      var re = /^(\d{4})-(\d{1,2})-(\d{1,2})/;
      var data = document.getElementById('data_notare').value;
      return re.test(String(data));
    });
    formConds.push(conditionDate);
  }
  if(field == 'data_notareLab'){
    var conditionDateL = new FormularConditionObject('data_notareLab_error', function (){
      var re = /^(\d{4})-(\d{1,2})-(\d{1,2})/;
      var data = document.getElementById('data_notareLab').value;
      return re.test(String(data));
    });
    formConds.push(conditionDateL);
  }
  if(field == 'nota'){
    var conditionNota = new FormularConditionObject('nota_error', function(){
      var re = /^(\d{1,2})/;
      return re.test(String(getElementTextByID('nota')));
    });
    formConds.push(conditionNota);
  }
  // if(field == 'passkey'){
  //   var conditionPasskey = new FormularConditionObject('passkey_error'), function(){
  //     var re = /^(x[0-9]{2}xv)/;
  //     return re.test(String(getElementTextByID('passkey')));
  //   }
  //   formConds.push(conditionPasskey);
  // }
  // if(field == 'eveniment'){
  //   var conditionEveniment = new FormularConditionObject('eveniment_error'), function(){
  //     var re = /^[a-zA-Z]*/;
  //     return re.test(String(getElementTextByID('eveniment')));
  //   }
  //   formConds.push(conditionEveniment);
  // }
  activateErrorElemets(formConds);
}

function showRanking(category,type){
  if(category === 'curs'){
    document.getElementById('a_hide_c').style.display = "inline-block";
    document.getElementById('a_insert_c').style.display = "inline-block";
    document.getElementById('csvFileLabelId').style.display = "inline-block";
    document.getElementById('search_input_c').style.display = "block";

    document.getElementById('a_show_c').style.display = "none";
  }
  if(category === 'lab'){
    document.getElementById('a_hide_l').style.display = "inline-block";
    document.getElementById('a_insert_l').style.display = "inline-block";
    document.getElementById('csvFileLabelIdL').style.display = "inline-block";
    document.getElementById('search_input_l').style.display = "block";
    document.getElementById('a_show_l').style.display = "none";
  }
  if(category === 'ev'){
    document.getElementById('a_hide_e').style.display = "inline-block";
    document.getElementById('a_insert_e').style.display = "inline-block";
    document.getElementById('search_input_e').style.display ="block";
    document.getElementById('a_show_e').style.display = "none";
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
  // var td = document.createElement("td");
  // let text = document.createTextNode("Total");
  // td.appendChild(text);
  // row.appendChild(td);

  tblHead.appendChild(row);
  tabel.appendChild(tblHead);

  var tblBody = document.createElement("tbody");
  tabel.appendChild(tblBody);

  document.getElementById('ul_su_'+category).style.display="block";
  if(type=='prezente'){
    if(category=='curs'){
      // tabel.setAttribute("border", "2");
      ajax.get('/api/catalog', {}, function (results){
        let resultParsed = JSON.parse(results);
        // console.log(resultParsed);
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
    // var studenti = document.querySelector('div#listaStudenti');
    if(index==0){
      console.log(tblBody);
      var row = tblBody.insertRow(index);//table.bdoy.length
      let cell = row.insertCell(0);
      cell.innerHTML = arr[0][0]; //nr_matricol  poate element[0]


      // var para = document.createElement("p");
      // var student = Object.assign(para);
      // student.innerHTML = element[0];
      // studenti.appendChild(student);

      for (let i=1; i<14; i++){
        this['cell'+i] = row.insertCell(i);
        // observer.observe(this['cell'+i],observerConfig);
        this['cell'+i].setAttribute('id', 'cell_curs_'+index+'_'+i);
        this['cell'+i].setAttribute('class', 'tableCell');
        // this['cell'+i].setAttribute('onInput', 'someFunction(this);');
        this['cell'+i].setAttribute('contenteditable', true);
        // this['cell'+i].setAttribute('onChange', tdChangesHandler);
        if (element[3]==i){
          this['cell'+i].innerHTML = 1;
        }else{
          this['cell'+i].innerHTML = null;
        }
      }
    }
    else{
      for (var i=0; i<tblBody.children.length;i++){
        console.log(tblBody.children.item(i));
        console.log(tblBody.children.item(i).children.item(0));
        //------------daca exista deja nr_matricol in tabel-----
        if(tblBody.children.item(i).children.item(0).innerHTML == element[0]){
          this['cell'] = tblBody.children.item(i).children.item(0).parentNode;
          for(let i=1;i<14; i++){
            if(element[3]==i){
              console.log(this['cell']);
              this['cell'].children.item(i).innerHTML = 1;
            }
          }
        }
        else{
          var row = tblBody.insertRow(tblBody.children.length);
          let cell = row.insertCell(0);
          cell.innerHTML = element[0]; //nr_matricol  poate element[0]

          for (let i=1; i<14; i++){
            this['cell'] = row.insertCell(i);
            // observer.observe(this['cell'+i],observerConfig);
            this['cell'].setAttribute('id', 'cell_curs_'+tblBody.children.length+'_'+i);
            this['cell'].setAttribute('class', 'tableCell');
            // this['cell'+i].setAttribute('onInput', 'someFunction(this);');
            this['cell'].setAttribute('contenteditable', true);
            // this['cell'+i].setAttribute('onChange', tdChangesHandler);
            if (element[3]==i){
              this['cell'].innerHTML = 1;
            }else{
              this['cell'].innerHTML = null;
            }
          }
        }
      }


      // for(var i=0; i<studenti.children.length; i++){
      //   if(studenti.children.item(i).textContent == element[0]){
      //     console.log(studenti.children.item(i));
      //     console.log(studenti.children[i]);
      //     // var y = document.querySelector(x);
      //     // console.log(y);
      //     //---------celula cu nodul existent
      //     this['studentExistent']= 1;
      //     // console.log(this['studentExistent']);


      //   }
      // }
    }


  } // -----------end populatePrezenteCurs() ---------------

  //---------------------NOT USED--------------------
  function populatePrezenteLab(element, index, arr){
    var row = tblBody.insertRow(index);
    let cell = row.insertCell(0);
    cell.innerHTML = element[0];
    for (let i=1; i<14; i++){
      this['cell'+i] = row.insertCell(i);
      this['cell'+i].setAttribute('id', 'cel_lab'+index+'_'+i);
      this['cell'+i].setAttribute('contenteditable', true);
      // row.insertCell(tableRef.rows.length);
      if (element[1]==i){
        this['cell'+i].innerHTML = 1;
      }else{
        this['cell'+i].innerHTML = '-';
      }
    }
  }
  function populateNoteLab(element, index, arr){
    // var studenti = document.querySelector('div#listaStudenti');
    if(index==0){
      console.log(tblBody);
      var row = tblBody.insertRow(index);//table.bdoy.length
      let cell = row.insertCell(0);
      cell.innerHTML = arr[0][0]; //nr_matricol  poate element[0]


      // var para = document.createElement("p");
      // var student = Object.assign(para);
      // student.innerHTML = element[0];
      // studenti.appendChild(student);

      for (let i=1; i<14; i++){
        this['cell'] = row.insertCell(i);
        console.log(this['cell']);
        // observer.observe(this['cell'+i],observerConfig);
        this['cell'].setAttribute('id', 'cell_curs_'+index+'_'+i);
        this['cell'].setAttribute('class', 'tableCell');
        // this['cell'+i].setAttribute('onInput', 'someFunction(this);');
        this['cell'].setAttribute('contenteditable', true);
        // this['cell'+i].setAttribute('onChange', tdChangesHandler);
        if (element[4]==i){
          this['cell'].innerHTML = element[3];
        }else{
          this['cell'].innerHTML = null;
        }
      }
    }
    else{
      for (var i=0; i<tblBody.children.length;i++){
        console.log(tblBody.children.item(i));
        console.log(tblBody.children.item(i).children.item(0));
        debugger;
        //------------daca exista deja nr_matricol in tabel-----
        if(tblBody.children.item(i).children.item(0).innerHTML == element[0]){
          this['cell'] = tblBody.children.item(i).children.item(0).parentNode;
          for(let i=1;i<14; i++){
            if(element[4]==i){
              console.log(this['cell']);
              this['cell'].children.item(i).innerHTML = element[3];
            }
          }
        }
        else{
          //-------inseram linie noua  --------------
          var row = tblBody.insertRow(tblBody.children.length);
          let cell = row.insertCell(0);
          cell.innerHTML = element[0]; //nr_matricol  poate element[0]

          //--------inseram celulele------------------
          for (let i=1; i<14; i++){
            this['cell'] = row.insertCell(i);
            // observer.observe(this['cell'+i],observerConfig);
            this['cell'].setAttribute('id', 'cell_curs_'+tblBody.children.length+'_'+i);
            this['cell'].setAttribute('class', 'tableCell');
            // this['cell'+i].setAttribute('onInput', 'someFunction(this);');
            this['cell'].setAttribute('contenteditable', true);
            // this['cell'+i].setAttribute('onChange', tdChangesHandler);
            if (element[4]==i){
              this['cell'].innerHTML = element[3];
            }else{
              this['cell'].innerHTML = null;
            }
          }
        }
      }


      // for(var i=0; i<studenti.children.length; i++){
      //   if(studenti.children.item(i).textContent == element[0]){
      //     console.log(studenti.children.item(i));
      //     console.log(studenti.children[i]);
      //     // var y = document.querySelector(x);
      //     // console.log(y);
      //     //---------celula cu nodul existent
      //     this['studentExistent']= 1;
      //     // console.log(this['studentExistent']);


      //   }
      // }
    }
  }
  // console.log(editableFields);
  // editableFields.forEach(function(element,index,list){
  //   if(index%14 != 0){
  //     observer.observe(element,observerConfig);
  //   }
  // })
  // document.querySelectorAll('.tableCell').forEach(function(element,index,list){
  //   observer.observe(element,observerConfig);
  // })
  if(category=='curs'){
    observer.observe(document.querySelector('#ul_su_curs>tbody'),observerConfig);
  }
  else if(category == 'lab'){
    observer.observe(document.querySelector('#ul_su_lab>tbody'),observerConfig);
  }
  else if (category == 'ev'){
    console.log('no observer attached yet');
    // observer.observe(document.querySelector('#ul_su_ev>tbody'),observerConfig);
  }
} // end showRanking

function hide(category){
  if(category === 'curs'){
    document.getElementById('a_hide_c').style.display = "none";
    document.getElementById('a_insert_c').style.display = "none";
    document.getElementById('search_input_c').style.display = "none";

    document.getElementById('csvFileId').style.display = "none";
    document.getElementById('csvFileLabelId').style.display = "none";
    observer.disconnect();
    document.getElementById('ul_su_'+category).innerHTML = '';
    document.getElementById('ul_su_'+category).style.display = "none";

    document.getElementById('a_show_c').style.display = "block";
  }
  if(category === 'lab'){
    document.getElementById('a_hide_l').style.display = "none";
    document.getElementById('a_insert_l').style.display = "none";
    document.getElementById('search_input_l').style.display = "none";

    document.getElementById('csvFileIdLab').style.display = "none";
    document.getElementById('csvFileLabelIdL').style.display = "none";
    observer.disconnect();
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
  if (!activateErrorElemets(formConds)){
    console.log('rau');
    return;
  }

  let id_prof = cookieGetLoggedUserID();

  ajax.post('api/catalog', {
    cat: 'curs',
    nr_matricol: document.getElementById('nr_matricol').value,
    data_notare: document.getElementById('data_notare').value,
    saptamana: document.getElementById('saptamana').value,
    id_prof: cookieGetLoggedUserID() // = id_prof;
    }, function (text){
      // console.log(text);
      if (text == 'true')  {
        setElementInvisible('prezentaInsertFail')
        setElementVisible('prezentaInsertSuccess');
        // sleep(2500).then(() => {
        // window.location.replace("/catalog");
        // })
        setTimeout(function(){
          window.location.replace("/catalog");
        },200000);
      }
      else {
        setElementInvisible('prezentaInsertSuccess')
        setElementVisible('prezentaInsertFail');
        // sleep(2500).then(() => {
        // window.location.replace("/catalog");
        // })
        setTimeout(function(){
          window.location.replace("/catalog");
        },200000);
      }

    });
}
function verificareInsertNota(){
  ajax.post('api/catalog', {
    cat: 'lab',
    nr_matricol: getElementTextByID('nr_matricolLab'),
    nota: getElementTextByID('nota'),
    data_notare: getElementTextByID('data_notareLab'),
    id_prof : cookieGetLoggedUserID(),
    saptamana: getElementTextByID('saptamanaLab')
    }, function (text){

      let checker = JSON.parse(text);
      console.log('checker: ', checker);
      if (checker == 'done')  {
        console.log('dadada');
        setElementInvisible('notaInsertFail');
        setElementVisible('notaInsertSuccess');
        // sleep(2500).then(() => {
        // window.location.replace("/catalog");
        // })
        setTimeout(function(){
          window.location.replace("/catalog");
        },10000);
      }
      else {
        console.log('nununu');
        console.log(text);
        setElementInvisible('notaInsertSuccess')
        setElementVisible('notaInsertFail');
        // sleep(2500).then(() => {
        // window.location.replace("/catalog");
        // })
        setTimeout(function(){
          window.location.replace("/catalog");
        },10000);
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
      setElementVisible('eventInsertSucces');
      sleep(5000).then(() => {
      window.location.replace("/catalog");
      })
    //   setTimeout(function(){
    //     window.location.replace("/catalog");
    //   },5000);
    }
    else {
      setElementVisible('eventInsertFail');
      // sleep(2500).then(() => {
      // window.location.replace("/catalog");
      // })
      setTimeout(function(){
        window.location.replace("/catalog");
      },5000);
    }

    });
}

//-----------------IMPORT & PARSE CSV -----------------
window.onload = function(){
  var fileCSV = document.getElementById("csvFileId");
  var fileCSV2 = document.getElementById("csvFileIdLab");


  fileCSV.addEventListener('change', function(e) {
    var file = fileCSV.files[0];
    var textType = /application\/vnd.ms-excel/;
    // text/plain
    // text/x-csv
    if (file.type.match(textType)) {
      var reader = new FileReader();

      reader.onload = function(e) {
        let fileContent = reader.result;
        ajax.post('api/catalog', {
          cat: 'file',
          csvDestination: 'curs',
          data: fileContent
        }, function(response){
          console.log(response);
          if(response=='true'){
            alert('Fisierul a fost importat cu succes in baza de date');
          }
        });
      }
      // reader.readAsArrayBuffer(file);
      // reader.readAsDataURL(file);
      var text = reader.readAsText(file,'UTF-8');
      // var data = reader.readAsDataURL(file);
      // var rawData = reader.readAsBinaryString(file);
    } else {
      console.log('bad file');
    }
  });

  fileCSV2.addEventListener('change', function(e) {
    var file = fileCSV2.files[0];
    var textType = /application\/vnd.ms-excel/;

    if (file.type.match(textType)) {
      var reader = new FileReader();

      reader.onload = function(e) {
        console.log('here');
        ajax.post('api/catalog', {
          cat: 'file',
          csvDestination: 'lab',
          data: reader.result
        }, function(response){
          console.log(response);
          if(response=='true'){
            alert('Fisierul a fost importat cu succes in baza de date');
          }
        });
      }
      var text = reader.readAsText(file,'UTF-8');
    } else {
      console.log('bad file');
    }
  });
}
//------------------END IMPORT CSV --------------------

  // -------------IMPORT FOR FILES --NEEDS REWORK. NOT USED ------------
  // function handleFiles(files){
  //   var fileInput = document.getElementById("csvFileId");
  //   var filess = fileInput.files;
  //   var fileC = filess[0]; //iterate if more / file = files.item(i);

  //   var formData=new FormData();
  //   console.log(fileC);
  //   formData.append("file",fileC);
  //   console.log(formData);
  //   ajax.fileUpload('api/catalog', "POST", {
  //     cat: 'file',
  //     file: formData
  //   }, function (response){
  //     console.log(response);
  //   })
  // }
  // document.querySelector("#csvFileId").onchange = importCsv;
  // ----------------------END IMP-------------------------------

</script>
