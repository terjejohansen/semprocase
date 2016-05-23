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
	    <div class="row">       
        <div class="col-md-12">
        <form method="POST" action="/admin/kategori/{{ $category->id }}">
            {{ csrf_field() }} 
            {{ method_field('delete') }}    
                <h1>Endre kategorien til videoer</h1>
                   <span>Gammel kategori: {{ $category->caName }}</span> <span class="hidden"><input type="text" name="oldId" id="oldId" value="{{ $category->id }}" /></span><br />
                <ul class="list-group">
                    <li style="width:48%; height:45px;" class="list-group-item">Velg ny kategori *:</li>
                    <li style="width:48%; height:45px;" class="list-group-item">
                        <select name="newId" class="selectpicker">
                        
                            @foreach($allCategories as $item)
                                @if($item->id != $category->id)
                                <option id="newId" value="{{ $item->id }}">{{ $item->caName }}</option>
                                @endif
                            @endforeach
                        </select>
                    </li>
                </ul>   
                <button type="submit" class="btn btn-primary" style="margin-top:15px; float: right;">Endre</button>
        </form>
    </div>    
    
    
    </form>

@stop
