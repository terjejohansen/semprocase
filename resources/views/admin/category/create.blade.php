@extends('layouts.admin')
@section('header')
<title>Admin | Ny kategori</title>
@stop

@section('content')

    <form method="POST" action="/admin/kategori/">
    <div class="row">       
        <div class="col-md-6 col-md-offset-3">
            {{ csrf_field() }}
            <h1>Ny kategori</h1>
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
                <div class="panel-heading">Kategoriens navn *</div>
                <div class="panel-body">
                    <input type="text" name="caName" value="{{ old('caName') }}" style="width:100%;" />
                </div>
            </div>

        
            <button type="submit" class="btn btn-primary" style="margin-top:15px; float: right;">OPPRETT</button>
        </div>
    </div>    
    
    
    </form>
@stop