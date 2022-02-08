@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Escuela')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card ">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">star</i>
                        </div>
                        <h4 class="card-title">Filtro</h4>
                    </div>
                    <form method="POST" action="{{ route('grados.store') }}" autocomplete="off">
                        <div class="card-body ">
                            @csrf
                            @method('post')
                            <div class="row">
                                <label class="col-sm-4 col-form-label">{{ __('Alumnos') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select class="selectpicker col-sm-12 pl-0 pr-0" id="alumno" name="alumno" data-style="select-with-transition" title="" data-size="100" onchange="cambio()">
                                        <option value="0" selected>{{__('Todos')}}</option>
                                        @foreach ($alumnos as $alumno)
                                            <option value="{{$alumno->alm_id}}">{{$alumno->alm_nombre}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <input type="hidden" id="token" value="{{csrf_token()}}"/>

                            <table class="table table-striped table-no-bordered table-hover datatable-rose" style="width: 100%">
                              <thead class="text-primary">
                              <th>
                                    {{ __('N°') }}
                                </th>
                                <th>
                                  {{ __('Alumno') }}
                                </th>
                                <th>Grado</th>
                                <th>Materia</th>
                              </thead>
                              <tbody id="list">
                                @php
                                  $n=1;
                                @endphp
                                @foreach ($alumnos as $alumno)
                                <tr>
                                  <td>{{$n}}</td>
                                  <td>{{$alumno->alm_nombre}}</td>
                                  <td>{{$alumno->grado->grd_nombre}}</td>
                                  <td>
                                    @php
                                    $materias= $alumno->grado->materias($alumno->grado->grd_id)
                                    @endphp
                                    @foreach($materias as $materia)
                                      {{$materia->materia->mat_nombre}}, 
                                    @endforeach
                                  </td>

                                </tr>
                                @php
                                  $n++;
                                @endphp
                                @endforeach
                              </tbody>
                            </table>

                            </div>

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
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });

    function cambio(){
      console.log()

      $.ajax({
        type: 'post',
        url: "/filtro",
        headers: { 'X-CSRF-TOKEN': $('#token').val() },
        data: {
            id: $("#alumno").val(),
        },
        success: function (res) {
          $("#list").empty();
          
          n=1;
          $(res).each(function (key, value) {
          console.log(value)
            
            cadena="";
          $(value.materias).each(function (key, value2) {
            cadena=cadena+value2.materia.mat_nombre+", ";
          })

            html="<tr>"+
            "<td>"+n+"</trd>"+
            "<td>"+value.alm_nombre+"</trd>"+
            "<td>"+value.grado.grd_nombre+"</trd>"+
            "<td>"+cadena+"</trd>"+
            "</tr>"
            $("#list").append(html)
            n++
          })

        }
    })


    }
  </script>
@endpush
