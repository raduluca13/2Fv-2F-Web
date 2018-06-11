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
        if ((getElementTextByID('pwd') === getElementTextByID('c_pwd')) || getElementTextByID('c_pwd') == "")
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
    activateErrorElemets(formConds);
}

addLoadEvent(profileOnLoad);

function onBlur()
{
    activateErrorElemets(formConds);
}

function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

function jsProfile()
{
    // console.log(getElementTextByID('firstname'));
    // console.log(getElementTextByID('lastname'));
    // console.log(getElementTextByID('git'));
    // console.log(getElementTextByID('fb'));
    // console.log(getElementTextByID('pwd'));

    if (!activateErrorElemets(formConds))
        return;

    ajax.post('api/profile', {
        firstName: getElementTextByID('firstname'),
        lastName: getElementTextByID('lastname'),
        gitHub: getElementTextByID('git'),
        faceBook: getElementTextByID('fb'),
        password: getElementTextByID('pwd')
    }, function (text)
    {
        if (text === 'true')
        {
            setElementVisible('profile_success');
            sleep(2500).then(() => {
            window.location.replace("/login");
            })
        }
        else
        {
            setElementVisible('profile_failure');
            sleep(2500).then(() => {
            window.location.replace("/profile");
            })
        }
    });
}
