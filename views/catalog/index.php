<script src="/login/js/login.js" type="text/javascript"></script>
<!-- <script src="/catalog/js/util.js" type="text/javascript"></script> -->
<script>
var formConds = [];

function loadChecker(){
  var conditionNrMat = new FormularConditionObject('nr_matricol_error', function () {
  /*var re = /^(([A-Z]{2}+[0-9]{2}+[A-Z]{9}))/;
  return re.test(String(getElementTextByID('nr_matricol')).toLowerCase());*/
    var re = /^([a-zA-Z]{2}[0-9]{11})/;
    return re.test(String(getElementTextByID('nr_matricol')));
  });


  var conditionSaptamana = new FormularConditionObject('saptamana_error', function () {
    var re = /^([0-9]+)/;
    return re.test(String(getElementTextByID('saptamana')).toLowerCase());
  });

  // var conditionDate = new FormularConditionObject('data_notare_error', function (){
  //   var re = /^(\d{1,2})-(\d{1,2})-(\d{4})/;
  //   var data = document.getElementByID('data_notare').value;
  //   return re.test(String(data));
  // });

  formConds.push(conditionNrMat);
  formConds.push(conditionSaptamana);
  // formConds.push(conditionDate);
  activateErrorElemets(formConds);
}
addLoadEvent(loadChecker);

function onBlur() {
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
      console.log(resultParsed);
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
      this['cell'+i].setAttribute('id', 'cell'+i);
      this['cell'+i].setAttribute('class', 'tableCell');
      this['cell'+i].setAttribute('contenteditable', true);
      // this['cell'+i].setAttribute('onChange', tdChangesHandler);
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
  // -------------- VERIFICARE UPDATE TD -----------------
  var insertedNodes = [];
  var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
    var observer = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {

        // if(mutation.type === 'childList'){
        //   var list_values = [].slice.call()
        // }
        for (var i = 0; i < mutation.addedNodes.length; i++){
          // console.log(mutation.addedNodes[i]);
          insertedNodes.push(mutation.addedNodes[i]);
        }
      })
    });
    var observerConfig = {
      attributes: true,
      childList: true,  //true for textContent,
      // attributeOldValue: true,
      subtree: true,
      characterData: false //false for textContent
    }
    
    tblBody.setAttribute('id','tblbd');
    // var tableRows = document.querySelectorAll('#tblbd');
    // var trs = tableRows[0].children;
    var tableRows = document.getElementById('tblbd');
    var nodeListTrs = document.querySelectorAll('tblbd');
    console.log(nodeListTrs);
    // var collectionCells = document.getElementsByClassName('tableCell'); 
    
    // var arr = Array.from(trs);
    // console.log(collectionCells);

      // for (let i = 0; i < trs.length; i++){
      //   var node = trs[i];
      //   console.log(node);

      //   observer.observe(node, observerConfig);
      //   // console.log(insertedNodes);
      // }   
    // observer.observe(document, { childList: true });
    // console.log(insertedNodes);
    
    

} // end showRanking


function hide(category){
  if(category === 'curs'){
    document.getElementById('a_hide_c').style.display = "none";
    document.getElementById('a_insert_c').style.display = "none";
    document.getElementById('search_input_c').style.display = "none";
    document.getElementById('csvFileId').style.display = "none";
    document.getElementById('csvFileLabelId').style.display = "none";

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
  if (!activateErrorElemets(formConds)){return;}
  let id_prof = cookieGetLoggedUserID();
  ajax.post('api/catalog', {
    cat: 'curs',
    nr_matricol: document.getElementById('nr_matricol').value,
    data_notare: document.getElementById('data_n').value,
    saptamana: document.getElementById('saptamana').value,
    id_prof: cookieGetLoggedUserID() // = id_prof;
    }, function (text){
      console.log(text);
      if (text === 'true')  {
        setElementVisible('prezentaInsertSuccess');
        // sleep(2500).then(() => {
        // window.location.replace("/catalog");
        // })
        setTimeout(function(){
          window.location.replace("/catalog");
        },200000);
      }
      else {
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
    nr_matricol: getElementTextByID('nr_matricol'),
    nota: getElementTextByID('nota'),
    data: getElementTextByID('data_notare'),
    saptamana: getElementTextByID('saptamana'),
    }, function (text){

      if (text === 'true')  {
        setElementVisible('notaInsertSuccess');
        // sleep(2500).then(() => {
        // window.location.replace("/catalog");
        // })
        setTimeout(function(){
          window.location.replace("/catalog");
        },5000);
      }
      else {
        setElementVisible('notaInsertFail');
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
  
  // inputElement.addEventListener("change", handleFiles, false); 
  // ---------- VARIANTA ----------------
  
  // fileA.addEventListener("click", function (e) {
  //   if (fileCSV) {
  //     fileCSV.click();
  //   }
  //   e.preventDefault(); // prevent navigation to "#"
  // }, false);
  // ---------------END VARIANTA ----------------
  
  // var importCsv = function(){}
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
        // let data = reader.result
        ajax.post('api/catalog', {
          cat: 'file',
          csvDestination: 'curs',
          data: reader.result
        }, function(response){
          console.log(response);
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
        ajax.post('api/catalog', {
          cat: 'file',
          csvDestination: 'lab', 
          data: reader.result
        }, function(response){
          console.log(response);
        });
      }
      var text = reader.readAsText(file,'UTF-8');
    } else {
      console.log('bad file');
    }
  });
}
  

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
          <label for="nr_mat">Nr_matricol*</label>
          <input type="text" name="nr_mat" id="nr_matricol" onblur="onBlur();">
          <span id="nr_matricol_error" >Nr matricol nu este valid</span>
        </div>
        <div>
          <label for="data_notare">Data Notare*</label>
          <input type="date" name="data_notare" id="data_n">
          <!-- <span id="data_notare_error"  onblur="onBlur();">Selectati data prezentei.</span> -->
        </div>
        <div>
          <label for="sapt">Saptamana*</label>
          <input type="number" name="sapt" min="1" step="1" id="saptamana" onblur="onBlur();">
          <span id="saptamana_error">Alegeti saptamana in care a fost pusa prezenta.</span>
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
          <label for="nr_matricol">Nr_matricol*</label>
          <input type="text" name="nr_matricol" id="nr_matricol" onblur="onBlur();">
          <span id="nr_matricol_error">Nr matricol nu este valid</span>
        </div>
        <div>
          <label for="nota">Nota</label>
          <input type="number" name="github" id="nota" min="1" max="10" step="1" onblur="onBlur();">
          <span id="nota_error">Nota este obligatorie</span>
        </div>
        <div>
          <label for="data_notare">Data_notare*</label>
          <input type="date" name="data_notare" id="data_notare" onblur="onBlur();">
          <span id="data_notare_error">Data nu este valida</span>
        </div>
        <div>
          <label for="saptamana">Saptamana*</label>
          <input type="number" name="saptamana" id="saptamana" min="1" step="1" max="13" onblur="onBlur();">
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
        <span id="eventInsertSucces">Eveniment adaugat cu succes.</span>
        <span id="eventInsertFail">Nota nu a putut fi inserata.</span>
        <script>
          setElementInvisible('eventInsertSucces')
          setElementInvisible('eventInsertFail')
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
