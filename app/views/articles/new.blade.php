<h1>New Article</h1>

{{ Form::open(array('url'=>'article/create', 'method'=>'POST', 'class'=>'form-inlineclass="form-inline')) }}

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

