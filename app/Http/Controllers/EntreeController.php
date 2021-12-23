<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BonApprovisionnements;
use Illuminate\Http\Request;
use Validator;

class EntreeController extends Controller
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
        $entrees = BonApprovisionnements::with('articles')->get();
        return response()->json($entrees, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'article_id' => 'required|string',
            'quantite' => 'required|integer',
            'bon_id' => 'required|integer',
            'fournisseur_id' => 'required|integer',
            'date' => 'required|date',
        ]);
        
        $bon = new BonApprovisionnements();
        $bon->date = '2021-12-20T01:16:35';
        $bon->fournisseur_id = 1;

        $bon->save();
        $article = new Article();
        $article->quantite = $validator['quantite'];
        $article->id = $validator['article_id'];


        //$bon = BonApprovisionnements::create($validator);
    //    $bon->articles()->attach($bon);
       $bon->articles()->attach($article, ['quantite'=> $article->quantite ]);
       //

        $article_update = Article::find($article);

        $attribute = $article_update->where('id', $article->id)->first();

        $attribute->quantite = $attribute->quantite + $article->quantite;
        
        $attribute->save();
   
        return response()->json($bon, 201);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
