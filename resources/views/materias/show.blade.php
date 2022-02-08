@extends('layouts.app', ['activePage' => 'materias', 'titlePage' => __('Materias')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">book</i>
                        </div>
                        <h4 class="card-title">Materia</h4>
                    </div>
                        <div class="card-body ">
                            @csrf
                            @method('put')
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                        <input readonly class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="nombre" type="text" placeholder="{{ __('nombre') }}" value="{{$materia->mat_nombre}}"/>
                                        @include('alerts.feedback', ['field' => 'nombre'])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('materias.index') }}"><button type="button" class="btn btn-fill btn-default">Regresar</button></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
