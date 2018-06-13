/*Marius Cretu*/

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
/*GET method*/
addLoadEvent(retrieve_courses);