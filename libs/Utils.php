<?php

class Utils
{
    private static $logintag = 'loggedIn';
    private static $user_type = 'userType';
    private static $github_account = 'githubAccount';
    private static $username = 'username';

    public static function setUserServices($user_services)
    {
        $GLOBALS['user_services'] = $user_services;
    }

    public static function requiredArguments($methodType, $arguments)
    {
        $missing = array();
        if ($methodType == 'GET'|| $methodType=='DELETE')
        {
            foreach ($arguments as $argument)
                if (!isset($_GET[$argument]))
                    array_push($missing, $argument);
        }
        else if($methodType == 'POST')
        {
            foreach ($arguments as $argument)
                if (!isset($_POST[$argument]))
                    array_push($missing, $argument);
        }

        if ($missing != array())
        {
            $result['error'] = 'Missing arguments: ' . json_encode($missing);
            echo json_encode($result);
            return false;
        }
        return true;
    }


    public static function UserLogOut()
    {
        header('Location: /index');
    }

    public static function UserGetId()
    {
        if(!isset($_COOKIE[self::$logintag]))
        {
          throw new Exception("Nu esti logat");
        }
        return $_COOKIE[self::$logintag];
    }

    public static function UserGetType()
    {
        if(!isset($_COOKIE[self::$user_type]))
            throw new Exception("Nu esti logat");

        return $_COOKIE[self::$user_type];
    }

    public static function IsUserLogged($redirectNeeded = false)
    {
        if(!isset($_COOKIE[self::$logintag]))
        {
          if ($redirectNeeded)
              header('Location: /login');
              return false;
        }
        $id=$_COOKIE[self::$logintag];
        $user_type=$_COOKIE[self::$user_type];
        $github_account=$_COOKIE[self::$github_account];
        $username=$_COOKIE[self::$username];
        $userServices = new User_Services();
        $hash_from_db = $userServices->GetUserCookieHash($id,$username);
        $hash = $id.$user_type.$github_account.$username;
        $hash = md5($hash);
        if($hash!=$hash_from_db)
        {
          setcookie(self::$logintag, "", time()-3600);
          setcookie(self::$user_type, "", time()-3600);
          setcookie(self::$github_account, "", time()-3600);
          setcookie(self::$username, "", time()-3600);
          header('Location: /login');
          return false;
        }
        return true;
    }
}
