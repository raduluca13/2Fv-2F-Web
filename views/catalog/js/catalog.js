
function init()
{
	var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
	var observer = new MutationObserver(function(mutations) {
	    mutations.forEach(function(mutation,index,list){
	      var entry = {
	        mutation: mutation,
	        el: mutation.target,
	        value: mutation.target.textContent,
	        oldValue: mutation.oldValue
	      };
	      // console.log("Recording mutation:", entry);

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
}

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
