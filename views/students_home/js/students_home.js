function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

function PopulateChances()
{
    ajax.post('api/computechanches', {
        id : cookieGetUserID()
        }, function (chances)
    {
      /*console.log(chances);*/
      chances=chances.split(" ");
      courses_attendances = chances[0];
      courses_attendances=parseInt(courses_attendances*100);
      laboratories_attendances = chances[1];
      laboratories_attendances=parseInt(laboratories_attendances*100);
      web_events = chances[2];
      web_events=parseInt(web_events*100);
      project_situation = chances[3];
      project_situation=parseInt(project_situation*100);
      promovability_chance = chances[4];
      promovability_chance=parseInt(promovability_chance*100);


      document.getElementById("courses_attendances_value").textContent=courses_attendances+"%";
      document.getElementById("laboratories_attendances_value").textContent=laboratories_attendances+"%";
      document.getElementById("web_events_value").textContent=web_events+"%";
      document.getElementById("project_situation_value").textContent=project_situation+"%";
      document.getElementById("promovability_chance_value").textContent=promovability_chance+"%";
      document.getElementById("courses_attendances").style.width=(courses_attendances+"%");
      document.getElementById("laboratories_attendances").style.width=(laboratories_attendances+"%");
      document.getElementById("web_events").style.width=(web_events+"%");
      document.getElementById("project_situation").style.width=(project_situation+"%");
      document.getElementById("promovability_chance").style.width=(promovability_chance+"%");
      document.getElementById("github_frame").src="http://colmdoyle.github.io/gh-activity/gh-activity.html?user=".concat(GetGithubAccountCookieValue(),"&repo=pbr&type=repo");

      if (promovability_chance < 50)
        document.getElementById("face").src="/public/images/sad_face.png"
      else
        document.getElementById("face").src="/public/images/smiley_face.png"
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
