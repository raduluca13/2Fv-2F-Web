function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}


var changeText = function(content){

    /*=======================================COURSES=======================================*/
    document.getElementById("add_item0").innerHTML = '1. Adaugare punctaj student: ' + content[0] + ' ' + content[1];
    document.getElementById("add_item1").innerHTML = '2. Adaugare punctaj student: ' + content[5] + ' ' + content[6];

     document.getElementById("add_item0_show").innerHTML = '1. Punctaj [' + content[2] + ' - ' + content[4] + ']' + ' ' + content[3] + '.00 puncte.';
     document.getElementById("add_item1_show").innerHTML = '2. Punctaj [' + content[7] + ' - ' + content[9] + ']' + ' ' + content[8] + '.00 puncte.';


     document.getElementById("prez_item0").innerHTML = '1. Prezenta [' + content[12] + ' - ' + content[13] + '] +1 student:' + content[10] + ' ' + content[11];
     document.getElementById("prez_item1").innerHTML = '2. Prezenta [' + content[16] + ' - ' + content[17] + '] +1 student:' + content[14] + ' ' + content[15];
     document.getElementById("prez_item2").innerHTML = '3. Prezenta [' + content[20] + ' - ' + content[21] + '] +1 student:' + content[18] + ' ' + content[19];



     document.getElementById("bonus_item").innerHTML = 'Adaugare bonus student: ' + content[22] + ' ' + content[23];
     document.getElementById("bonus_item0").innerHTML = '1. Bonus [' + content[24] + ' - ' + content[26] + '] +' + content[25] + ' puncte.';

     document.getElementById("prez_l_item0").innerHTML = '1. Prezenta [' + content[29] + ' - ' + content[30] + '] +1 student:' + content[27] + ' ' + content[28];
     /*document.getElementById("prez_l_item1").innerHTML = '2. Prezenta [' + content[12] + ' - ' + content[13] + '] +1 student:' + content[10] + ' ' + content[11];*/




    /*=======================================LABORATORY=======================================*/
}

function retrieve_events()
{
	ajax.get('api/profesorh', { id: cookieGetLoggedUserID() }, function (response)
    {
        //console.log(response);
        if (response !== null)
        {
            var count = 0;
            var text = [];
            while(count < 31){

                var str = response.split(" end ")[count];
                text.push(str);

                count += 1;
            }

            changeText(text);
        }

    });
}

function PopulateEvents()
{
   (function(){
        var ul = document.createElement('ul');
        ul.setAttribute('class', "future_events");

        ajax.get('api/getevents',{ id: cookieGetLoggedUserID() 
         }, function (events)
        {
        events = events.split("#!#");
        events.pop();

        var evenimente = [];
        var ids = [];
        for(var i = 0; i < events.length; i++){
          if(i % 2 == 0) ids.push(events[i]);
          else evenimente.push(events[i]);
        }
        var t;
        document.getElementById('renderList').appendChild(ul);
        var idx = 0;
        evenimente.forEach(renderProductList);

        function renderProductList(element, index, arr) {
            var li = document.createElement('li');
            li.setAttribute('class','future_events_li');
            li.setAttribute('id',ids[idx]);
            li.setAttribute('href',"javascript:void(0)");
            li.setAttribute('onclick',"toggle_visibility('popupBoxOnePosition',id);")
            ul.appendChild(li);
            t = document.createTextNode(element);
            li.innerHTML=li.innerHTML + element;
            idx++;
        }

        // Click on a close button to hide the current list item
        var close = document.getElementsByClassName("close");
        var i;
        for (i = 0; i < close.length; i++) {
          close[i].onclick = function() {
            var div = this.parentElement;
            div.style.display = "none";
          }
        }

        // Add a "checked" symbol when clicking on a list item

        var list = document.querySelector('.future_events');
        if(list){
        list.addEventListener('click', function(ev) {
          if (ev.target.tagName === 'LI') {
            ev.target.classList.toggle('checked');
          }
        }, false);
        }

        var btn = document.getElementById('buttonasd');

        btn.addEventListener('click', function(e){

        var list = document.querySelectorAll('.future_events_li');

        var div_array = [...list]; // converts NodeList to Array
        div_array.forEach(div => {
          if (div.tagName === 'LI' && div.classList.toggle('checked'))
        div.classList.toggle('checked');
        /*apasa pe butonul de validare*/
        
      });
    });

    });

})();
}


function attend_event(id,v_key){
  ajax.post('api/getevents',{e_id: id, s_id: cookieGetLoggedUserID(), valid_key: v_key}, function (response)
  {
    
    if(response === 'true')
    {

        setElementVisible('profile_success');
        sleep(2000).then(() => {
        window.location.replace("/home");
        })
    }
    else
    {
        setElementVisible('profile_failure');
        sleep(2000).then(() => {
        window.location.replace("/home");
        })
    }
  });
}

function toggle_visibility(id,element) {

var e = document.getElementById(id);

if(e.style.display == 'block'){

  e.style.display = 'none';
}
else
  e.style.display = 'block';  
  var valid_btn = document.getElementById('edit_button');
  valid_btn.addEventListener('click', function(e){
    var key = getElementTextByID('inp');
  attend_event(element,key);
  });
}
addLoadEvent(retrieve_events);
addLoadEvent(PopulateEvents);
