<?php

namespace App\Classes;

use App\RouteLog;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Event;
use App\SqlLog;
use App\Classes\BrowserDetection;
use App\DevicesLog;
use App\AgentsLog;
use App\UserLog;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class LogSystem {

    public static function start($error = false) {
        $route = self::routeLog();
        $devices = self::devices_log();
        $agents = self::agents_log();
//        
        $userLog = self::user_log($route, 1, 1, $error);
      
    }

    private static function user_log($route = 1, $devices = 1, $agents = 1, $error = false) {
        try{
        $browser = new BrowserDetection();
        $userLog = new UserLog();
        $userLog->user_id = Crypt::decrypt(Session::get('id'));
        $userLog->device_id = $devices;
        $userLog->client_ip = $_SERVER['REMOTE_ADDR'];
        $userLog->is_robot = $browser->isRobot();
        $userLog->route_id = $route;
        $userLog->error_type = $error;
        $userLog->save();
         }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    private static function routeLog() {
        $input = collect(Input::all());
        $route = new \App\RouteLog();
        $route->action =  Route::getCurrentRoute()->getAction()['controller'];
        $route->name = Request::path();
        $route->input_data = $input->toJson();
        $route->save();
        return $route->id;
    }

    private static function devices_log() {
        $browser = new BrowserDetection();
        $devices = new DevicesLog();
        $devices->platform_os = $browser->getPlatform();
        $devices->is_mobile = $browser->isMobile();
        $devices->save();
        return $devices->id;
    }

    private static function agents_log() {

        $browser = new BrowserDetection();
        $agents = new AgentsLog();
        $agents->browser = $browser->getBrowser();
        $agents->browser_version = $browser->getVersion();
        $agents->name = $browser->getUserAgent();
        $agents->save();
    }

}
?>