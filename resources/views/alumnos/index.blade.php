@extends('layouts.app', ['activePage' => 'alumnos', 'titlePage' => __('Alumnos')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">person</i>
                </div>
                <h4 class="card-title">{{ __('Lista de Alumnos') }}</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('alumnos.create') }}" class="btn btn-sm btn-info">{{ __('Nuevo') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-rose" style="display:none; width: 100%">
                    <thead class="text-primary">
                      <th>
                          {{ __('Código') }}
                      </th>
                      <th>
                        {{ __('Nombre') }}
                      </th>
                      <th>
                        {{ __('Edad') }}
                      </th>
                      <th>
                        {{ __('Sexo') }}
                      </th>
                      <th>
                        {{ __('Grado') }}
                      </th>
                      <th>
                        {{ __('Observación') }}
                      </th>
                        <th class="text-right">
                          {{ __('Acciones') }}
                        </th>
                    </thead>
                    <tbody>
                      @foreach($alumnos as $alumno)
                        <tr>
                          <td>{{ $alumno->alm_codigo }}</td>
                          <td>
                            {{ $alumno->alm_nombre}}
                          </td>
                          <td>
                            {{ $alumno->alm_edad}}
                          </td>
                          <td>
                            {{ $alumno->alm_sexo}}
                          </td>
                          <td>
                            {{ $alumno->grado->grd_nombre}}
                          </td>
                          <td>
                            {{ $alumno->alm_observacion}}
                          </td>
                        <td class="td-actions text-right">
                          <form action="{{ route('alumnos.destroy', $alumno->alm_id) }}" method="post">
                          @csrf
                          @method('delete')
                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('alumnos.edit', $alumno->alm_id) }}" data-original-title="" title="Editar">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                            </a>
                            <a rel="tooltip" class="btn btn-info btn-link" href="{{ route('alumnos.show', $alumno->alm_id) }}" data-original-title="" title="Ver">
                              <i class="material-icons">assignment</i>
                              <div class="ripple-container"></div>
                            </a>
                            <button type="button" rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="Eliminar" onclick="
                            return swal({
                              title: '¿Eliminar alumno?',
                              text: '¿Está seguro? ¡Ya no estará disponible!',
                              type: 'question',
                              showCancelButton: true,
                              confirmButtonText: 'Eliminar',
                              cancelButtonText: 'Cancelar',
                              confirmButtonClass: 'btn btn-danger',
                              cancelButtonClass: 'btn btn-light',
                              buttonsStyling: false
                            }).then((result) => {
                              if (result.value) {
                                submit();
                              }
                            });">
                            <i class="material-icons">close</i>
                            </button>
                          </form>
                        </td>
                          {{-- @endcan --}}
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      $('#datatables').fadeIn(1100);
      $('#datatables').DataTable({
        "bFilter":false,
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          "lengthMenu": 'Mostrar _MENU_ registros',
              "info": 'Mostrando página _PAGE_ de _PAGES_',
              "infoEmpty": 'No hay registros disponibles',
              "zeroRecords": 'Registro no encontrado',
              "infoFiltered": '(Total de registros filtrados _MAX_)',
        "paginate": {
            "next":     'siguiente',
            "previous": 'anterior',
            "first":    'primero',
            "last":     'último'
        },
      },
        "columnDefs": [
          { "orderable": false, "targets": 4 },
        ],
      });
    });
  </script>
@endpush