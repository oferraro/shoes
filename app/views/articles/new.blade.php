@if(isset($article))
    <h1>Edit Article</h1>
    {{ Form::model($article, array('route' => array('services.update', $article->id), 'method'=>'PATCH', 'class'=>'form-inlineclass="form-inline')) }}
    <input name="_method" type="hidden" value="PATCH">
@else
    <h1>New Article</h1>
    {{ Form::open(array('url'=>'article/create', 'method'=>'POST', 'class'=>'form-inlineclass="form-inline')) }}
@endif
<p>
    {{ isset($message)?$message:'' }}
</p>
<p>
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name') }}
</p>
<p>
    {{ Form::label('description', 'Description') }}
</p>
<p>
    {{ Form::textarea('description') }}
</p>
<p>
    {{ Form::label('price', 'Price') }}
    {{ Form::text('price') }}
</p>
<p>
    {{ Form::label('total_in_shelf', 'Total In Shelf') }}
    {{ Form::text('total_in_shelf') }}
</p>
<p>
    {{ Form::label('total_in_vault', 'Total In Vault') }}
    {{ Form::text('total_in_vault') }}
</p>
<p>    
    {{ Form::label('store_id', 'Store') }}
    {{ Form::select('store_id', Store::all()->lists('name', 'id')) }}
</p>

{{ Form::submit('Add Article') }}

{{ Form::close() }}

