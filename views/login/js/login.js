var formConds = [];

function loginOnLoad()
{
    var formCondEmail = new FormularConditionObject('username_error', function ()
    {
        if (getElementTextByID('username') === 'admin')
            return true;
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(getElementTextByID('username')).toLowerCase());
    });
    formConds.push(formCondEmail);
    activateErrorElemets(formConds);
}

addLoadEvent(loginOnLoad);

function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

function onBlur()
{
    activateErrorElemets(formConds);
}

function jsLogin()
{
    if (!activateErrorElemets(formConds))
        return;
    ajax.post('api/users', {
        username: getElementTextByID('username'),
        password:getElementTextByID('password')
    }, function (response)
    {
        id = response.split(" ")[0];
        user_type = response.split(" ")[1];
        if (id > 0)
        {
          setElementVisible('login_success');
          sleep(2500).then(() => {
            cookieUserLogin(id);
            CookieUserTypeLogin(user_type);
            window.location.replace("/home");

          })
        }
        else
          {
            setElementVisible('login_failure');
          }
    });
}
