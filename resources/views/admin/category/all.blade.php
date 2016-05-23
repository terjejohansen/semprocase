@extends('layouts.admin')

@section('header')
<title>Admin | Kategorier</title>

@section('content')
<h1>Alle kategorier</h1>
<a href="/admin/kategori/ny"><div class="btn btn-primary" style="float:right; margin-top: -40px;">Ny kategori</div></a>
<table id="my-ajax-table" class="list-table">
	<thead>
		<th style="width:160px;">Navn</th>
		<th style="width:160px;">Tittel</th>
		<th>Aktiv</th>
		<th style="width:100px;"><span class="hidden">Se</span></th>
		<th><span class="hidden">Slett</span></th>
  	</thead>
	<tbody>   
       @foreach($category as $items)
           <tr>
               <td>{{ $items->caName }}</td>
               <td>{{ $items->caTitle}}</td>
               <td>
                   @if($items->caActive == 1)
                       Ja
                   @else
                       Nei
                   @endif
               </td>
               <td ><a href="kategori/{{ $items->id}}" style="margin:0 auto;">Endre</a></td>
               <td>
                <form method="POST" action="/customer/{{ $items->id }}" onsubmit="ConfirmDelete()">
                    {{ csrf_field() }} 
                    {{ method_field('delete') }}   
                    <button href="#"  type="button" class="btn btn-primary" onClick="return confirmChange( {{$items->id}} )">SLETT</button>
                    
                </form> 
            </td>
           </tr>    
       @endforeach
    </tbody>
</table>

    <div class="row">
        <div class="col pagination-container">
            {!! $category->render() !!}
        </div>
    </div>
@stop




<script>

function confirmChange(id)
{
    	var info  = "<div class='alertify-info'>" 
    		              + "Vil du bytte kategorier til videoene i denne kategorien?"
	              + "</div>"
	              + "<div class='button-group'>"
	              + "<a href='/admin/kategori/"+id+"/nykategori'><button type='button' style='width: 100px; float:left; margin-right: 10px;' class='btn btn-success'>Ja</button></a>"
				  + "<form method='POST' action='/admin/kategori/{{ $items->id }}' style='float:left; width: 100px; margin-right: 10px; float:left;'>"
                  + "<input type='hidden' name='_token' value='MatV1tLlrfJRp1idfxmiSJJTt6Xt6vd3QPEnKqx7'>" 
                  + "<input type='hidden' name='_method' value='delete'>"                 
	              + "<button type='submit' style='width: 100px; ' class='btn btn-danger'>Bare slett</button>"
	              + "</form>"
				  + "<button type='button' style='width: 100px; margin-right: 10px; float:left;' onclick='location.reload();' class='btn btn-info'>Avbryt</button>"
	              + "</div>"
  			  ;
        alertify.alert(info);
        $('.alertify-buttons').hide();
}

</script>