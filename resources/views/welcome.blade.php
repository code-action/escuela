@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Escuela')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
      </div>

      <!-- <div class="row">
        <div class="col-sm-4">
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
                  <p class="card-category">Pacientes</p>
                  <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">list</i> Registrados
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">medication</i>
                  </div>
                  <p class="card-category">Consultas</p>
                  <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">list</i> Registradas
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">

        </div>
      </div> -->

    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
