<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {

    public function selectById($id){
        $post = Post::find($id)->makeHidden(["slug"]);

        if (!$post){
            return $this->sendNotFoundMessage("Post does not exists");
        }

        $data = [
            "data" => $this->transformPost($post)
        ];

        return $this->sendSuccessMessage($data);
    }

    public function showAll(){
        $limit = \Request::get('limit');
        $posts = Post::paginate($limit)->makeHidden(["slug"]);


        if (!$posts){
            $this->sendNotFoundMessage("Posts are not found");
        }

        $data = [
            "count" => count($posts),
            "data" => $this->transformAll($posts->toArray())
        ];

        return $this->sendSuccessMessage($data);

    }

    private function transformPost($post){
        return [
            'id' => $post["id"],
            'heading' => $post["heading"],
            'content' => $post["text"],
            "owner_id" => $post["user_id"],
            "updated" => $post["updated_at"],
            "created" => $post["created_at"],

        ];
    }

    private function transformAll($posts){
        $result = [];

        for($i = 0; $i < count($posts); $i++) {
          array_push($result,$this->transformPost($posts[$i]));
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
