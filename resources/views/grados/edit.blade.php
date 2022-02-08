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
