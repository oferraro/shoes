<?php

class ArticlesController extends BaseController {
    public $restful = true;
    
    public function showIndex() 
    {
        return View::make('articles.index');
    }
}
