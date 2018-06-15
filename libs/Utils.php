<?php

class Utils
{
    private static $logintag = 'loggedIn';
    private static $user_type = 'userType';

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
        return true;
    }
}
