@extends('layouts.admin')

@section('header')
<title>Admin | Video</title>

@section('content')
<h1>Alle videoer</h1>
<a href="/admin/video/ny"><div class="btn btn-primary" style="float:right; margin-top: -40px;">Ny video</div></a>
<table id="my-ajax-table" class="list-table">
	<thead>
		<th style="width:160px;">Tittel</th>
		<th style="width:160px;">Link</th>
		<th>Fremhevet</th>
		<th style="width:100px;"><span class="hidden">Se</span></th>
		<th><span class="hidden">Slett</span></th>
  	</thead>
	<tbody>   
       @foreach($video as $items)
           <tr>
               <td>{{ $items->ytTitle }}</td>
               <td>{{ $items->ytVideoLink}}</td>
               <td>
                   @if($items->ytHighlighted == 1)
                       Ja
                   @else
                       Nei
                   @endif
               </td>
               <td>
                   <a href="/admin/video/{{ $items->id}}">Endre</a>
               </td>
               <td>
                    <form method="POST" action="/video/{{ $items->id }}" onsubmit="ConfirmDelete()">
                        {{ csrf_field() }} 
                        {!! method_field('delete') !!}   
                        <button href="#"  type="button" class="btn btn-primary" onClick="return confirmChange( {{$items->id}} )">SLETT</button>
                        
                    </form> 
                </td>
               
           </tr>    
       @endforeach
    </tbody>
</table>

    <div class="row">
        <div class="col pagination-container">
            {!! $video->render() !!}
        </div>
    </div>
@stop

<script>
    function confirmChange(id, csrf, method)
    {
        	var info  = "<div class='alertify-info'>" 
        		              + "Vil du slette denne videoen?"
    	              + "</div>"
    	              + "<div class='button-group' style='width: 221px;'>"
    	              + "<form method='POST' action='/admin/video/{{ $items->id }}' style='width: 100px; margin-right: 10px; float:left;'>"
                      + "<input type='hidden' name='_token' value='MatV1tLlrfJRp1idfxmiSJJTt6Xt6vd3QPEnKqx7'>" 
                      + "<input type='hidden' name='_method' value='delete'>"                 
    	              + "<button type='submit' style='width: 100px; ' class='btn btn-danger'>Ja</button>"
    	              + "</form>"
      	              + "<button type='button' style='width: 100px; margin-right: 10px;' onclick='location.reload();' class='btn btn-info'>Avbryt</button>"
    	              + "</div>"
      			  ;
            alertify.alert(info);
            $('.alertify-buttons').hide();
    }
    
</script>