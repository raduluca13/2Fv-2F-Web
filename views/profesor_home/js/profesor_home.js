
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
  ajax.get('api/getevents',{
  }, function (events)
  {
    events = events.split("#!#");
    document.getElementById("future1").textContent=events[0];
    document.getElementById("future2").textContent=events[1];
    document.getElementById("future3").textContent=events[2];
    document.getElementById("future4").textContent=events[3];
    document.getElementById("future5").textContent=events[4];
    document.getElementById("future6").textContent=events[5];
  });
}

addLoadEvent(retrieve_events);
addLoadEvent(PopulateEvents);
