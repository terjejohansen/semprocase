@extends('layouts.admin');

@section('content')
    @if(count($errors))
		<ul>
		@foreach($errors->all() AS $error)
			<li>
				{{ $error }} 
			</li>
		@endforeach
		</ul>
	@endif	
	

    <form method="POST" action="/admin/kategori/{{ $category->id }}">
        <div class="row">       
        <div class="col-md-6 col-md-offset-3">
        {{ csrf_field() }}
        {{ method_field('put') }} 
            <h1>Endre kategori</h1>
            <div class="panel panel-default">
                <div class="panel-heading">Kategoriens navn *</div>
                <div class="panel-body">
                    <input type="text" name="caName" value="{{ $category->caName }}" style="width:100%;" />
                </div>
            </div>

            
            <button type="submit" class="btn btn-primary" style="margin-top:15px; float: right;">Endre</button>
    </div>    
    
    
    </form>

@stop