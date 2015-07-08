<h1>New Article</h1>
{{ Form::open(array('url'=>'article/new_store', 'method'=>'POST', 'class'=>'form-inlineclass="form-inline')) }}
<p>
    {{ isset($message)?$message:'' }}
</p>
<p>
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name') }}
</p>
<p>
    {{ Form::label('address', 'Address') }}
    {{ Form::text('address') }}
</p>

{{ Form::submit('Add Store') }}

{{ Form::close() }}

