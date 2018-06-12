var formConds = [];

function profileOnLoad()
{
    var formFirstName = new FormularConditionObject('firstname_error', function ()
    {
        var re = /^[a-zA-Z]{2}/;
        return re.test(String(getElementTextByID('firstname')));
    });
    var formLastName = new FormularConditionObject('lastname_error', function ()
    {
        var re = /^[a-zA-Z]{2}/;
        return re.test(String(getElementTextByID('lastname')));
    });
    var formGit = new FormularConditionObject('github_error', function ()
    {
      var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
        '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
        return pattern.test(getElementTextByID('git'));
    });
    var formFacebook = new FormularConditionObject('facebook_error', function ()
    {
      var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
        '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
        return pattern.test(getElementTextByID('fb'));
    });

    var formPassword = new FormularConditionObject('password_error', function ()
    {
        var re = /^[a-zA-Z0-9]{8}/;
        // return re.test(String(getElementTextByID('pwd')));
        if (re.test(String(getElementTextByID('pwd'))) || getElementTextByID('pwd') == "")
        {
            return true;
        }
        setElementTextByID('password_error', 'Enter a password longer than 8 characters!');
        return false;
    });
    var formConfirmPassword = new FormularConditionObject('confirm_password_error', function ()
    {
        if ((getElementTextByID('pwd') === getElementTextByID('c_pwd')))
        {
          return true;
        }
        setElementTextByID('confirm_password_error', 'Password does not match the confirm password!');
        return false;
    });
    formConds.push(formFirstName);
    formConds.push(formLastName);
    formConds.push(formGit);
    formConds.push(formFacebook);
    formConds.push(formPassword);
    formConds.push(formConfirmPassword);
}
/* Add user info and verify the forms */
addLoadEvent(profileOnLoad);
addLoadEvent(retrieve);

function onBlur()
{
    activateErrorElemets(formConds);
}

function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

/*POST method*/
function jsProfile()
{

    console.log(getElementTextByID('pwd'));

    if (!activateErrorElemets(formConds))
        return;
    ajax.post('api/profile', {
        id: cookieGetLoggedUserID(),
        firstName: getElementTextByID('firstname'),
        lastName: getElementTextByID('lastname'),
        gitHub: getElementTextByID('git'),
        faceBook: getElementTextByID('fb'),
        password: getElementTextByID('pwd')
    }, function (text)
    {
    if (text === 'true')
    {
        console.log("Totul a fost ok!");
        setElementVisible('profile_success');
        sleep(2500).then(() => {
        window.location.replace("/login");
        })
    }
    else
    {
        console.log("Nu a fost ok!");
        setElementVisible('profile_failure');
        sleep(2500).then(() => {
        window.location.replace("/profile");
        })
    }
    });
}
/*POST method*/


/*GET method*/
function retrieve()
{
    ajax.get('api/profile', { id: cookieGetLoggedUserID() }, function (response)
    {
        if (response !== null)
        {
            document.getElementById('firstname').value = response.split(" ")[0];
            document.getElementById('lastname').value = response.split(" ")[1];
            document.getElementById('git').value = response.split(" ")[2];
            document.getElementById('fb').value = response.split(" ")[3];
        }
    });    
}
/*GET method*/

