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
                        <h4 class="card-title">Nueva Materia</h4>
                    </div>
                    <form method="POST" action="{{ route('materias.store') }}" autocomplete="off">
                        <div class="card-body ">
                            @csrf
                            @method('post')
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nombre *') }}</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('mat_nombre') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('mat_nombre') ? ' is-invalid' : '' }}" name="mat_nombre" id="mat_nombre" type="text" placeholder="{{ __('nombre') }}" value="{{ old('mat_nombre') }}"/>
                                        @include('alerts.feedback', ['field' => 'mat_nombre'])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('materias.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-info">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
