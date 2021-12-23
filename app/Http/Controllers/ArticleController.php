<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;


class ArticleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth.role:admin');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::with('categorie')->get();

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {             
        $article = Article::create($this->validator());
        $this->storeImage($article);

        return response()->json([
            'message' => 'article successfully created',
            'article' => $article
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $article->categorie_id = $request->title;
        // $article->intitule = $request->intitule;
        // $article->prix = $request->prix;
        // $article->quantite = $request->quantite;
        // $article->photo = $request->photo;
        // $article->save();
        // $article->categories()->sync($request->categorie_id);
        // $this->storeImage($article);

        $article = Article::find($id);
        $article->update($request->all());

        return $article;
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::FindOrFail($id);

        $article->delete();

        return response()->json($data, 200,);
    }

    public function validator()
    {
        return request()->validate([
                'intitule' => 'required|string|between:3,100',
                'prix' => 'required|integer',
                'quantite' => 'required|integer',
                'photo' => 'required|image:jpeg,png,jpg|max:2048',
                'categorie_id' => 'required|integer'
            ]);
    }

    public function forUpdate()
    {
        return request()->validate([
                'intitule' => 'string|between:3,100',
                'prix' => 'integer',
                'quantite' => 'integer',
                'photo' => 'image:jpeg,png,jpg|max:2048',
                'categorie_id' => 'integer'
            ]);
    }


    private function storeImage(Article $article)
    {
        if (request('photo')) {
            $article->update([
                'photo' => request('photo')->store('images', 'public'),
            ]);
        }
    }

    public function nbArticleEnStock()
    {
        $data = Article::all()->count();

        return response()->json($data, 200);
    }
}
