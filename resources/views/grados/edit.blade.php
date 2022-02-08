@extends('layouts.app', ['activePage' => 'grados', 'titlePage' => __('Grados')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">bookmark</i>
                        </div>
                        <h4 class="card-title">Modificar Grado</h4>
                    </div>
                    <form method="POST" action="{{ route('grados.update',$grado->grd_id) }}" autocomplete="off">
                        <div class="card-body ">
                            @csrf
                            @method('put')
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nombre *') }}</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('grd_nombre') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('grd_nombre') ? ' is-invalid' : '' }}" name="grd_nombre" id="grd_nombre" type="text" placeholder="{{ __('nombre') }}" value="{{$grado->grd_nombre}}"/>
                                        @include('alerts.feedback', ['field' => 'grd_nombre'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-10 col-form-label">{{ __('Hacer click sobre las materias que desea agregar *') }}</label>
                                
                                @foreach($materias as $materia)
                                    <div class="col-sm-6">

                                        <div class="alert {{$materia->comprobar($grado->grd_id,$materia->mat_id)}}" id="div{{$materia->mat_id}}" onclick="changeSelected('{{$materia->mat_id}}')">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            </button>
                                            <span>
                                            <b>{{$materia->mat_nombre}}</b>
                                            @if($materia->comprobar($grado->grd_id,$materia->mat_id)=="alert-info")
                                            <input type="hidden" name="mat{{$materia->mat_id}}" value="0">
                                            @else
                                            <input type="hidden" name="mat{{$materia->mat_id}}" value="1">
                                            @endif
                                            </span>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="id_validate" value="{{$grado->grd_id}}">
                            </div>

                        <div class="card-footer ">
                            <a href="{{ route('grados.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-info">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

                    
@push('js')
<script>
    function changeSelected(mat_id){
        if($("#div"+mat_id).hasClass('alert-info')){
            $("#div"+mat_id).removeClass('alert-info')
            $("#div"+mat_id).addClass('alert-success')
            $("#div"+mat_id).find("input").val('1')
        }else{
            $("#div"+mat_id).removeClass('alert-success')
            $("#div"+mat_id).addClass('alert-info') 
            $("#div"+mat_id).find("input").val('0')
        }
    }
</script>
@endpush