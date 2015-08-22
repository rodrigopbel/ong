
{{-- This is ajax called inside the index page modal  --}}

<hr>
<p class="text-success">
<strong>Objetivos</strong> (vacio para eliminar objetivo )

</p>

{{'';$i=0}}
@foreach($destinos->objetivos as $objetivo)

<div class="form-group">

 <div class="col-md-6">
    <input class="form-control form-control-inline input-medium" name="objetivo[{{$i}}]" id="objetivo" type="text" value="{{$objetivo['objetivo']}}" placeholder="Objetivo #1"/>
    <input type="hidden" name="objetivoID[{{$i}}]" id="" type="text" value="{{$objetivo['id']}}" placeholder="Objetivo #1"/>
 </div>
{{'';$i++;}}
</div>
@endforeach
{{-- This is ajax called inside the index page modal  --}}




