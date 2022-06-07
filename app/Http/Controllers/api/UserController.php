<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Barryvdh\Debugbar\Facade as DebugBar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller {

    public function selectById($id){
        $user = User::find($id)->makeHidden(["password","email_verified_at"]);

        if (!$user){
            return $this->sendNotFoundMessage("User does not exists");
        }

        $data = [
            "data" => $this->transformUser($user)
        ];

        return $this->sendSuccessMessage($data);
    }

    public function showAll(){
        $limit = \Request::get('limit');
        //$users = User::paginate($limit)->makeHidden(["password","email_verified_at"]);
        $users = Cache::rememberForever("users",function () use($limit){
            return User::paginate($limit)->makeHidden(["password","email_verified_at"]);
        });

        $data = [
            "count" => count($users),
            "data" => $this->transformAll($users->toArray())
        ];

        return $this->sendSuccessMessage($data);

    }

    public function store(Request $request){

        $params = $request->all();
        $data = [
            "name" => $params["name"],
            "last_name" => $params["last_name"],
            "email" => $params["email"],
            "password" => $params["password"],
        ];
        $data = $this->valid($data);

        if (!$data) return $this->sendNotFoundMessage("Wring data provided");

        try {
            $user = User::create($data);
        }catch (\Exception $exception){
            return $this->sendNotFoundMessage("We failed");
        }

        Cache::forget('users');

        if (!$user) return $this->sendNotFoundMessage("We failed");

        $data = ["message" => "success"];
        return $this->sendSuccessMessage($data);
    }

    private function transformUser($user){
        return [
            'id' => $user["id"],
            'name' => $user["name"],
            'sure_name' => $user["last_name"],
            "created" => $user["created_at"],
            "updated" => $user["updated_at"]

        ];
    }

    public function valid($data){
        if (!isset($data["name"]) || trim($data["name"]) == "") return false;
        if (!isset($data["last_name"]) || trim($data["last_name"]) == "") return false;
        if (!isset($data["email"]) || !$this->isEmail($data["email"])) return false;
        if (!isset($data["password"]) || trim($data["last_name"]) == "") return false;

        $data["password"] = bcrypt($data["password"]);

        return $data;
    }


    private function isEmail($str){
        if(filter_var($str, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    private function transformAll($users){
        $result = [];

        for($i = 0; $i < count($users); $i++) {
          array_push($result,$this->transformUser($users[$i]));
        }

        return $result;
    }

    private function sendSuccessMessage($data){
        return response()->json($data,200);
    }

    private function sendNotFoundMessage($message){
        return response()->json([
            "error" => $message
        ],404);
    }

}
