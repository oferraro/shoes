<?php

class ArticlesController extends BaseController {
    public $restful = true;
    public $layout = 'layouts.default';
    
    public function index() 
    {
        $this->layout->title = 'Home';
        $this->layout->content = 'index';
    }
    
    public function all() 
    {
        $articles = Article::all();
        $view = View::make('articles.index', array('articles'=>$articles));
        $this->layout->title = 'The title';
        $this->layout->content = $view;
    }
    
    public function new_article() 
    {
        $this->layout->title = 'The title';
        $this->layout->content = View::make('articles.new');
    }
    
    public function create() 
    {
        if (!Input::get('store_id')) {
            Redirect::to('user/login')->with('message', 'Please, create Stores first');
        } else {
            $article = new Article ();
            $article->name = Input::get('name');
            $article->description = Input::get('description');
            $article->price = Input::get('price');
            $article->total_in_shelf = Input::get('total_in_shelf');
            $article->total_in_vault = Input::get('total_in_vault');
            $article->store_id = Input::get('store_id');
            $article->save();
            return Redirect::to('articles')->with('message', 'The Article was created succesfully');
        }
    }
    
    public function new_store () 
    {
        $this->layout->title = 'The title';
        $this->layout->content = View::make('articles.new_store');
    }
    
    public function new_store_add() 
    {
        $store = new Store ();
        $store->name    = Input::get('name');
        $store->address = Input::get('address');
        $store->save();
        return Redirect::to('articles')->with('message', 'The store was created succesfully');
    }

}
