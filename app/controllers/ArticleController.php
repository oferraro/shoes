<?php

class ArticleController extends \BaseController {

    /**
	 * Display a listing of the articles by store.
	 *
	 * @return Response
	 */
    public function articles_by_store ($id) {
        $columns = array (  'articles.id', 'articles.description', 'articles.name', 'articles.price', 'articles.total_in_shelf', 
                            'articles.total_in_vault', 'stores.name as store_name');
        $response['articles']       = DB::table('articles')->join('stores', 'stores.id', '=', 'articles.store_id')
                                        ->where('stores.id', $id)->select($columns)->get();
        $response['success']        = true;
        $response['total_elements'] = count($response['articles']); 
        if ($response['total_elements']>0) {
            return Response::json($response);
        } else {
            $error['success']    = false;
            $error['error_code'] = 404; 
            $error['error_msg']  ='Record not found';
            return Response::json($error);
        }
    }
    
    /**
	 * Display a listing of the stores.
	 *
	 * @return Response
	 */
    public function stores () {
        $response['stores']         = Store::all();
        $response['success']        = true;
        $response['total_elements'] = count($response['stores']);
        if ($response['total_elements']>0) {
            return Response::json($response);
        } else {
            $error['success']    = false;
            $error['error_code'] = 404; 
            $error['error_msg']  ='Record not found';
            return Response::json($error);   
        }
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $columns = array (  'articles.id', 'articles.description', 'articles.name', 'articles.price', 'articles.total_in_shelf', 
                            'articles.total_in_vault', 'stores.name as store_name');
        $articles['articles'] = DB::table('articles')->join('stores', 'stores.id', '=', 'articles.store_id')->select($columns)->get();

        
        $articles['success']        = true;
        $articles['total_elements'] = count($articles['articles']);
        if ($articles['total_elements']>0) { 
            return Response::json ($articles);
        } else {
            $error['success']    = false;
            $error['error_code'] = 404; 
            $error['error_msg']  ='Record not found';
            return Response::json($error);   
        }
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('articles.new');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return Response::json(Input::get());
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        
		$article['article'] = Article::find($id);
        if ($article && $article['article'] != "") {
            $article['success'] = true;
            $store = Store::find($article['article']->store_id);
            $article['article']['store']   = $store->name;
            return Response::json ($article);
        } else {
            $response['success']    = false;
            $response['error_code'] = 404; 
            $response['error_msg']  ='Record not found';
            return Response::json ($response);
        }
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $article = Article::find($id);
		return View::make('articles.new', array('article'=>$article));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::all();
        $article = Article::find($id);
        unset($input['_method']);
        unset($input['_token']);
        $article->name              = $input['name'];
        $article->description       = $input['description'];
        $article->price             = $input['price'];
        $article->total_in_shelf    = $input['total_in_shelf'];
        $article->total_in_vault    = $input['total_in_vault'];
        $article->store_id          = $input['store_id'];
        $article->update();
        
        return Redirect::route('services.show', $id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Article::find($id)->delete();
        return Redirect::route('services.index');
	}


}
