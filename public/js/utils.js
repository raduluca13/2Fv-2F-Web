function addLoadEvent(func)
{
    var oldonload = window.onload;
    if (typeof window.onload !== 'function')
    {
        window.onload = func;
    } else
    {
        window.onload = function ()
        {
            if (oldonload)
            {
                oldonload();
            }
            func();
        }
    }
}

function principalLoad()
{
    adjustHeader();
}

addLoadEvent(principalLoad);


var loginCookieName = 'loggedIn';
var userType = "userType";
var github_account = "githubAccount"

function setCookie(name, value, timeout)
{
    document.cookie = name + "=" + value + "; max-age=" + timeout;
}

function cookieUserLogin(id)
{
    setCookie(loginCookieName, id, new Date(Date.now() + 86400));//one day
}

function CookieUserTypeLogin(value)
{
    setCookie(userType, value, new Date(Date.now() + 86400));//one day
}

function CookieGithubAccountLogin(value)
{
    setCookie("githubAccount", value, new Date(Date.now() + 86400));//one day
}

function cookieIsUserLoggedIn()
{
    return document.cookie.indexOf(loginCookieName + "=") >= 0;

}

function GetUserTypeCookieValue()
{
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
      if(ca[i].toString().substr(0,loginCookieName.length)===userType)
      {
          var value = ca[i].toString().split('=')[1];
          return value;
          break;
      }
    }
    alert("Bad cookie");
    return 0;
}

function GetGithubAccountCookieValue()
{
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
      if(ca[i].toString().substr(1,github_account.length)===github_account)
      {
          var value = ca[i].toString().split('=')[1];
          return value;
          break;
      }
    }
    alert("Bad cookie");
    return 0;
}

function cookieUserLogout()
{
    document.cookie = loginCookieName + "=; max-age=-2";
    document.cookie = userType + "=; max-age=-2";
    document.cookie = github_account + "=; max-age=-2";
}

function cookieGetLoggedUserID()
{
    if(!cookieIsUserLoggedIn())
    {
        alert("Nu verifici ca userul sa fie logat!!!!!!!");
        return 0;
    }
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        if(ca[i].toString().substr(0,loginCookieName.length)===loginCookieName)
        {
            var value = ca[i].toString().split('=')[1];
            //alert(value);
            return value;
            break;
        }
        //while (c.charAt(0)==' ') c = c.substring(1,c.length);
        //if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    alert("EROARE! NU AR TREBUI SA AJUNGA AICI! BAD COOKIE");
    return 0;
}

function cookieGetUserID()
{
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        if(ca[i].toString().substr(0,loginCookieName.length)===loginCookieName)
        {
            var value = ca[i].toString().split('=')[1];
            return value;
            break;
        }
    }
    alert("EROARE! NU AR TREBUI SA AJUNGA AICI! BAD COOKIE");
    return 0;
}

var ajax = {};
ajax.x = function ()
{
    if (typeof XMLHttpRequest !== 'undefined')
    {
        return new XMLHttpRequest();
    }
    var versions = [
        "MSXML2.XmlHttp.6.0",
        "MSXML2.XmlHttp.5.0",
        "MSXML2.XmlHttp.4.0",
        "MSXML2.XmlHttp.3.0",
        "MSXML2.XmlHttp.2.0",
        "Microsoft.XmlHttp"
    ];

    var xhr;
    for (var i = 0; i < versions.length; i++)
    {
        try
        {
            xhr = new ActiveXObject(versions[i]);
            break;
        } catch (e)
        {
        }
    }
    return xhr;
};

ajax.send = function (url, callback, method, data, async)
{
    if (async === undefined)
    {
        async = true;
    }
    var x = ajax.x();
    x.open(method, url, async);
    x.onreadystatechange = function ()
    {
        if (x.readyState === 4)
        {
            callback(x.responseText)
        }
    };
    if (method === 'POST'){
        x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }
    x.send(data)
};
ajax.fileUpload = function(url, method, data, callback, async){
    if (async === undefined) {
        async = true;
    }
    // var x = ajax.x();
    var x = new XMLHttpRequest;
    
    x.open(method, url, async);
    x.onreadystatechange = function () {
        if (x.readyState === 4) {
            callback(x.responseText)
        }
    };
    if (method === 'POST'){
        /* 
        * The value of the boundary doesn't matter as long as no other structure in 
        * the request contains such a sequence of characters. We chose, nevertheless, 
        * a pseudo-random value based on the current timestamp of the browser. 
        */
        var boundary = "AJAX--------------" + (new Date()).getTime();
        var contentType = "multipart/form-data; boundary=" + boundary;
        x.setRequestHeader("Content-Type", contentType);
    }
    x.send(data);
}
ajax.get = function (url, data, callback, async)
{
    var query = [];
    for (var key in data)
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));

    ajax.send(url + (query.length ? '?' + query.join('&') : ''), callback, 'GET', null, async)
};

ajax.post = function (url, data, callback, async)
{
    var query = [];
    for (var key in data)
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    ajax.send(url, callback, 'POST', query.join('&'), async)
};

ajax.update = function (url, data, callback, async)
{
    var query = [];
    for (var key in data)
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    ajax.send(url, callback, 'PUT', query.join('&'), async)
};

ajax.delete = function (url, data, callback, async)
{
    var query = [];
    for (var key in data)
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));

    ajax.send(url + (query.length ? '?' + query.join('&') : ''), callback, 'DELETE', null, async)
};


function getElementTextByID(id)
{
    var element;
    if (element = document.getElementById(id))
        return element.value;
    return null;
}
function getCheckedValue(id)
{
    var element;
    if (element = document.getElementById(id))
        return element.checked;
    return null;
}

function setElementTextByID(id, text)
{
    var element;
    if (element = document.getElementById(id))
        element.textContent = text;
    return null;
}


function setElementInvisible(id) {
    var element;
    if (element = document.getElementById(id)) {
        //element.style.visibility='hidden';
        element.style.display = 'none';
        return true;
    }
    return false;
}
function setElementVisible(id, displayType)
{
    if (displayType === undefined)
        displayType = 'block';
    var element;
    if (element = document.getElementById(id))
    {
        element.style.display = displayType;
        return true;
    }
    return false;
}

function isElementInvisible(id)
{
    var element;
    if (element = document.getElementById(id)) {
        //element.style.visibility='hidden';
        if(element.style.display === 'none')
            return true;
    }
    return false;
}


function FormularConditionObject(errObjectID, errFunctionCheck)
{
    var ok=setElementInvisible(errObjectID);
    var obj = {};
    obj.errObjectID = errObjectID;
    obj.errFunctionCheck = errFunctionCheck;
    obj.checkCondition = function ()
    {
        if (obj.errFunctionCheck())
        {
            setElementInvisible(obj.errObjectID);
            return true;
        }
        else
        {
            setElementVisible(obj.errObjectID);
            return false;
        }
    };
    return obj;
}

function activateErrorElemets(condObjects)
{
    var isOK = true;
    for (var i = 0; i < condObjects.length; ++i)
        if (!condObjects[i].checkCondition())
            isOK = false;
    return isOK;
}

function logout()
{
    cookieUserLogout();
    window.location.replace("/index");
}

function adjustHeader()
{
    var seachedType;
    var result = cookieIsUserLoggedIn();
    if (result === true)
        seachedType = 'not-logged';
    else
        seachedType = 'logged-in';
    var links = document.getElementsByClassName(seachedType);
    for (var i = 0; i < links.length; ++i)
        links[i].style.display = 'none';
}
