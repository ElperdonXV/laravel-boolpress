<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Model\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(12);

        return response()->json([
            'response' => true,
            'results' => $posts,
        ]);
    }

    public function inRandomOrder(){
        $posts = Post::inRandomOrder()->limit(4)->get();
        return response()->json([
            'response' => true,
            'results' => [
               'data'=>$posts
            ]
        ]);
    }

    public function search(Request $request){
        $data = $request->all();

        //apriamo una chiamata eloquent senza chiuderla
        $posts = Post::where('id', '>=', 1);
         //se abbiamo orderbycolumn e orderbysort in $data
        //li usiamo per ordinare
        if (
            array_key_exists('orderbycolumn', $data) &&
            array_key_exists('orderbysort', $data)
        ) {
            $posts->orderBy($data['orderbycolumn'], $data['orderbysort']);
        }

         if (array_key_exists('tags', $data)) {
            foreach ($data['tags'] as $tag) {
                //fa una join per controllare i tag che sono associati al product
                $posts->whereHas('tags', function (Builder $query) use ($tag) {
                    $query->where('name', '=', $tag);
                });
            }
        }

        $posts = $posts->with(['tags', 'category'])->get();
        return response()->json([
            'response' => true,
            'count' =>  $posts->count(),
            'results' => [
               'data'=>$posts
            ]
        ]);
    }
}
