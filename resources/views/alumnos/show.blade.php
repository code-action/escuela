@extends('layouts.app', ['activePage' => 'alumnos', 'titlePage' => __('Alumnos')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">person</i>
                        </div>
                        <h4 class="card-title">Alumno</h4>
                    </div>
                    <form method="POST" action="{{ route('alumnos.update',$alumno->alm_id) }}" autocomplete="off">
                        <div class="card-body ">
                            @csrf
                            @method('put')

                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('Código') }}</label>
                                <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('alm_codigo') ? ' has-danger' : '' }}">
                                        <input readonly class="form-control{{ $errors->has('alm_codigo') ? ' is-invalid' : '' }}" name="alm_codigo" id="alm_codigo" type="text" placeholder="{{ __('código') }}" value="{{ $alumno->alm_codigo }}"/>
                                        @include('alerts.feedback', ['field' => 'alm_codigo'])
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('Nombre') }}</label>
                                <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('alm_nombre') ? ' has-danger' : '' }}">
                                        <input readonly class="form-control{{ $errors->has('alm_nombre') ? ' is-invalid' : '' }}" name="alm_nombre" id="alm_nombre" type="text" placeholder="{{ __('nombre') }}" value="{{ $alumno->alm_nombre }}"/>
                                        @include('alerts.feedback', ['field' => 'alm_nombre'])
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('Edad') }}</label>
                                <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('alm_edad') ? ' has-danger' : '' }}">
                                        <input readonly class="form-control{{ $errors->has('alm_edad') ? ' is-invalid' : '' }}" name="alm_edad" id="alm_edad" type="number" placeholder="{{ __('edad') }}" value="{{ $alumno->alm_edad }}" min="1" pattern="^[0-9]+"/>
                                        @include('alerts.feedback', ['field' => 'alm_edad'])
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('Sexo') }}</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                    <input readonly class="form-control{{ $errors->has('alm_edad') ? ' is-invalid' : '' }}" name="alm_edad" id="alm_edad" type="text" placeholder="{{ __('edad') }}" value="{{ $alumno->alm_sexo }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('Grado') }}</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                    <input readonly class="form-control{{ $errors->has('alm_edad') ? ' is-invalid' : '' }}" name="alm_edad" id="alm_edad" type="text" placeholder="{{ __('edad') }}" value="{{ $alumno->grado->grd_nombre }}"/>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('Observación') }}</label>
                                <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('alm_observacion') ? ' has-danger' : '' }}">
                                        <textarea readonly maxlength="99" cols="30" rows="3" class="form-control" id="alm_observacion" name="alm_observacion" type="text" placeholder="{{ __('observación') }}"aria-required="true">{{ $alumno->alm_observacion }}</textarea>
                                        @include('alerts.feedback', ['field' => 'alm_observacion'])
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_validate" value="{{$alumno->alm_id}}">
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('alumnos.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
