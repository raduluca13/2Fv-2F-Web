var formConds = [];

function registerOnLoad()
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
    var formCondEmail = new FormularConditionObject('username_error', function ()
    {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!(re.test(String(getElementTextByID('username')).toLowerCase()) || getElementTextByID('username') === 'admin'))
        {
            setElementTextByID('username', 'Username is not valid!');
            return false;
        }
        return true;
    });
    var formPassword = new FormularConditionObject('password_error', function ()
    {
        var re = /^[a-zA-Z0-9]{8}/;
        return re.test(String(getElementTextByID('password')));
    });
    var formConfirmPassword = new FormularConditionObject('confirm_password_error', function ()
    {
        return getElementTextByID('password') === getElementTextByID('confirm_password');
    });
    var githubAccount = new FormularConditionObject('github_error', function ()
    {
      var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
        '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
        return pattern.test(getElementTextByID('github'));
    });
    var facebookAccount = new FormularConditionObject('facebook_error', function ()
    {
      var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
        '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
        return pattern.test(getElementTextByID('facebook'));
    });
    var formConfirmPassword = new FormularConditionObject('confirm_password_error', function ()
    {
        return getElementTextByID('password') === getElementTextByID('confirm_password');
    });
    formConds.push(formCondEmail);
    formConds.push(formFirstName);
    formConds.push(formLastName);
    formConds.push(formPassword);
    formConds.push(formConfirmPassword);
    formConds.push(githubAccount);
    formConds.push(facebookAccount);
    activateErrorElemets(formConds);
}

addLoadEvent(registerOnLoad);

function onBlur()
{
    activateErrorElemets(formConds);
}

function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

function jsRegister()
{
    if (!activateErrorElemets(formConds))
        return;
    var gender=null;
    if(document.getElementById("male").checked == true)
    {
      gender='male';
    }
    else {
      gender='female';
    }
    ajax.post('api/register', {
        username: getElementTextByID('username'),
        password: getElementTextByID('password'),
        firstname: getElementTextByID('firstname'),
        lastname: getElementTextByID('lastname'),
        githubAccount : getElementTextByID('github'),
        facebookAccount : getElementTextByID('facebook'),
        gender : gender
    }, function (text)
    {
        if (text === 'true')
        {
            setElementVisible('register_success');
            sleep(2500).then(() => {
            window.location.replace("/login");
            })
        }
        else
        {
            setElementVisible('register_failure');
            sleep(2500).then(() => {
            window.location.replace("/register");
            })

          }
    });
}

function deselect_male()
{
  document.getElementById("male").checked = false;
}
function deselect_female()
{
  document.getElementById("female").checked = false;
}
