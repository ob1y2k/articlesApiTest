<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;
use DB;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['list', 'view']]);
    }

    /**
     * Retrieve all articles
     *
     * @param  int  $id
     * @return Response
     */
    public function list()
    {
        return Article::all();
    }

    /**
     * Retrieve the article for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function view($id)
    {
        return Article::findOrFail($id);
    }

    /**
     * Edit the article for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'permalink' => 'required|string',
            'author' => 'required|string',
            'tags' => 'required|string',
            'cover_photo_url' => 'required|url',
            'thumb_photo_url' => 'required|url'            
        ]);

        $article->title = $request->get('title');
        $article->content = $request->get('content');
        $article->permalink = $request->get('permalink');
        $article->author = $request->get('author');
        $article->tags = $request->get('tags');
        $article->cover_photo_url = $request->get('cover_photo_url');
        $article->thumb_photo_url = $request->get('thumb_photo_url');
        $article->save();

        return Article::findOrFail($id);

    }

    /**
     * Create the article.
     *     
     * @return Response
     */
    public function create(Request $request)
    {
       
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'permalink' => 'required|string',
            'author' => 'required|string',
            'tags' => 'required|string',
            'cover_photo_url' => 'required|url',
            'thumb_photo_url' => 'required|url'            
        ]);

        $new_article = Article::insert([
            'title' => $request->get('title'), 
            'permalink' => $request->get('permalink'),
            'author' => $request->get('author'),  
            'content' => $request->get('content'),  
            'tags' => $request->get('tags'),    
            'cover_photo_url' => $request->get('cover_photo_url'),
            'thumb_photo_url' => $request->get('thumb_photo_url'), 
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')            
        ]);

        if($new_article) {
            $new_id = DB::connection() -> getPdo() -> lastInsertId();
            return Article::findOrFail($new_id);
        }
        else
            return '{"error":["Error inserting new article in database"]}';

    }

    //
}
