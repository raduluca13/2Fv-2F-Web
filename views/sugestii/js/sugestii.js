/*Marius Cretu*/
function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}


function verify_nullable(link){
    return (link === "");

}

var changeText = function(content){

    /*=======================================COURSES=======================================*/
    if(today() !== content[0]) document.getElementById("d_item0").innerHTML = content[0]; /*The next event date.*/
    else document.getElementById("d_item0").innerHTML = "Today";

    document.getElementById("item1").innerHTML = content[1]; /*The first event description */
    if(!verify_nullable(content[2])) { document.getElementById("a_item1").href = content[2]; document.getElementById("a_item1").innerHTML = "link"; }
    else document.getElementById("a_item1").innerHTML = "";

    if(today() !== content[3]) document.getElementById("d_item1").innerHTML = content[3];
    else document.getElementById("d_item1").innerHTML = "Today";
    /*end item1*/
    document.getElementById("item2").innerHTML = content[4]; /*The second event description */
    if(!verify_nullable(content[5])) { document.getElementById("a_item2").href = content[5]; document.getElementById("a_item2").innerHTML = "link"; }
    else document.getElementById("a_item2").innerHTML = "";

    if(today() !== content[6]) document.getElementById("d_item2").innerHTML = content[6];
    else document.getElementById("d_item2").innerHTML = "Today";
    /*end item2*/

    document.getElementById("item3").innerHTML = content[7]; /*The third event description */
    if(!verify_nullable(content[8])) { document.getElementById("a_item3").href = content[8]; document.getElementById("a_item3").innerHTML = "link"; }

    if(today() !== content[9]) document.getElementById("d_item3").innerHTML = content[9];
    else document.getElementById("d_item3").innerHTML = "Today";
    /*end item3*/
    /*=======================================COURSES=======================================*/

    /*=======================================LABORATORY=======================================*/
    if(today() !== content[10]) document.getElementById("l_d_item0").innerHTML = content[10]; /*The next event date.*/
    else document.getElementById("l_d_item0").innerHTML = "Today";

    document.getElementById("l_item1").innerHTML = content[11]; /*The first event description */
    if(!verify_nullable(content[12])) { document.getElementById("l_a_item1").href = content[12]; document.getElementById("l_a_item1").innerHTML = "link"; }
     else document.getElementById("l_a_item1").innerHTML = "";

    if(today() !== content[13]) document.getElementById("l_d_item1").innerHTML = 'Posted ' + content[13];
    else document.getElementById("l_d_item1").innerHTML = "Posted Today";
    /*end item1*/
    document.getElementById("l_item2").innerHTML = content[14]; /*The second event description */
    if(!verify_nullable(content[15])) { document.getElementById("l_a_item2").href = content[15]; document.getElementById("l_a_item2").innerHTML = "link"; }
     else document.getElementById("l_a_item2").innerHTML = "";

    if(today() !== content[16]) document.getElementById("l_d_item2").innerHTML = 'Posted ' + content[16];
    else document.getElementById("l_d_item2").innerHTML = "Posted Today";
    /*end item2*/

    document.getElementById("l_item3").innerHTML = content[17]; /*The third event description */
    if(!verify_nullable(content[18])) { document.getElementById("l_a_item3").href = content[18]; document.getElementById("l_a_item3").innerHTML = "link"; }
    else document.getElementById("l_a_item3").innerHTML = "";

    if(today() !== content[19]) document.getElementById("l_d_item3").innerHTML = 'Posted ' + content[19];
    else document.getElementById("l_d_item3").innerHTML = "Posted Today";

    /*=======================================LABORATORY=======================================*/
}

function today(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    }

    if(mm<10) {
        mm = '0'+mm
    }
    today = yyyy + '-' + mm + '-' + dd;
    return today;
}


/*GET method*/
function retrieve_courses()
{
    ajax.get('api/sugestii', { id: cookieGetLoggedUserID() }, function (response)
    {
        if (response !== null)
        {
            var count = 0;
            var text = [];
            while(count < 20){

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
        ul.setAttribute('id', 'ul_su_even');
        ul.setAttribute('display', 'none');
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
        document.getElementById('sec3').appendChild(ul);
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
        window.location.replace("/sugestii");
        })
    }
    else
    {
        setElementVisible('profile_failure');
        sleep(2000).then(() => {
        window.location.replace("/sugestii");
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

/*GET method*/
addLoadEvent(retrieve_courses);
addLoadEvent(PopulateEvents);
