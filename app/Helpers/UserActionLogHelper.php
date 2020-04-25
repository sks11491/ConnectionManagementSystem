<?php


namespace App\Helpers;
use Request;
use App\UserActionLog as UserActionLog;


class UserActionLogHelper
{


    public static function addToLog($createdByName, $createdForName, $action)
    {
    	$log = [];
    	$log['created_by_name'] = $createdByName;
    	$log['created_for_name'] = $createdForName;
        $log['action'] = $action;
    	UserActionLog::create($log);
    }


    public static function userActionLists()
    {
    	return UserActionLog::latest()->get();
    }


}