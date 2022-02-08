@extends('layouts.app', ['activePage' => 'materias', 'titlePage' => __('Materias')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">book</i>
                </div>
                <h4 class="card-title">{{ __('Lista de Materias') }}</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('materias.create') }}" class="btn btn-sm btn-info">{{ __('Nuevo') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-rose" style="display:none; width: 100%">
                    <thead class="text-primary">
                    <th>
                          {{ __('Número') }}
                      </th>
                      <th>
                        {{ __('Nombre') }}
                      </th>
                        <th class="text-right">
                          {{ __('Acciones') }}
                        </th>
                    </thead>
                    <tbody>
                      @php
                        $n=1;
                      @endphp
                      @foreach($materias as $materia)
                        <tr>
                          <td>{{ $n }}</td>
                          <td>
                            {{ $materia->mat_nombre}}
                          </td>
                        <td class="td-actions text-right">
                          <form action="{{ route('materias.destroy', $materia->mat_id) }}" method="post">
                          @csrf
                          @method('delete')
                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('materias.edit', $materia->mat_id) }}" title="Editar">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                            </a>
                            <a rel="tooltip" class="btn btn-info btn-link" href="{{ route('materias.show', $materia->mat_id) }}" title="Ver">
                              <i class="material-icons">assignment</i>
                              <div class="ripple-container"></div>
                            </a>
                            @if($materia->validar($materia->mat_id)<1)
                            <button type="button" rel="tooltip" class="btn btn-danger btn-link" href="#" title="Eliminar" onclick="
                            return swal({
                              title: '¿Eliminar materia?',
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
                            @else
                            <a rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="No se puede eliminar">
                              <i class="material-icons">block</i>
                              <div class="ripple-container"></div>
                            </a>
                            @endif
                          </form>
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