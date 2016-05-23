@extends('layouts.admin')
@section('header')
<title>Admin | Ny video</title>
@stop

@section('content')

    <form method="POST" action="/admin/video/">
    <div class="row">       
        <div class="col-md-6 col-md-offset-3">
            {{ csrf_field() }}
            <h1>Ny video</h1>
                @if(count($errors))
                    <ul style="width:100%;">
                        @foreach($errors->all() AS $error)
                            <li style="width: 100%; color: red;">
                                {{ $error }} 
                            </li>
                        @endforeach
                    </ul>
                @endif	
            <div class="panel panel-default">
                <div class="panel-heading">Tittel *</div>
                <div class="panel-body">
                    <input type="text" name="ytTitle" value="{{ old('ytTitle') }}" style="width:100%;" />
                </div>
            </div>
                
            <div class="panel panel-default">
                <div class="panel-heading">Kategori *</div>
                <div class="panel-body">
                    <select name="idCategory" class="selectpicker" style="width:100%;">
                        
                            @foreach($category as $item)
                               <option value="{{ $item->id }}">{{ $item->caName }}</option>

                            @endforeach
                    </select>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">Link *</div>
                <div class="panel-body">
                    <input type="text" name="ytVideoLink" value="{{ old('ytVideoLink') }}" style="width:100%;" />
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">Link til bakgrunnsbilde</div>
                <div class="panel-body">
                    <input type="text" name="ytBackgroundLink" value="{{ old('ytBackgroundLink') }}" style="width:100%;" />
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">Beskrivelse *</div>
                <div class="panel-body">
                    <textarea name="ytDescription" style="width:100%;">{{ old('ytDescription') }} </textarea>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">Fremhevet video</div>
                <div class="panel-body">
                    <input type="checkbox" name="ytHighlighted" value="1" />
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" style="margin-top:15px; float: right;">OPPRETT</button>
        </div>
    </div>    
    
    
    </form>
@stop