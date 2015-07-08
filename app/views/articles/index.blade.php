<h1>Articles</h1>

@foreach ($articles as $article)
    <strong>Article Name</strong>: {{ $article->name }} <br>
    <strong>Article Description</strong>: {{ $article->description }} <br>
    <strong>Article Price</strong>: {{ $article->price }} <br>
    <strong>Article Total in Shelf</strong>: {{ $article->total_in_shelf }} <br>
    <strong>Article Total in Vault</strong>: {{ $article->total_in_vault }} <br>
    <strong>Article Name</strong>: {{ $article->name }}     <br>
    {{ Form::open(array('method' => 'GET', 'route' => array('services.edit', $article->id))) }} 
    {{ Form::submit('Edit', array('class'=> 'btn btn-info')) }}
    {{ Form::close() }}
    
    {{ Form::open(array('method' => 'DELETE', 'route' => array('services.destroy', $article->id))) }} 
    {{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
    {{ Form::close() }}
    <hr>
@endforeach

