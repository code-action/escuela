<div class="sidebar" data-color="azure" data-background-color="black" data-image="{{ asset('material') }}/img/md-1.jpg">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{asset('')}}">
          <i class="material-icons">star</i>
            <p>Inicio</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'alumnos' ? ' active' : '' }}">
        <a class="nav-link" href="{{asset('alumnos')}}">
          <i class="material-icons">person</i>
            <p>Alumnos</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'materias' ? ' active' : '' }}">
        <a class="nav-link" href="{{asset('materias')}}">
          <i class="material-icons">books</i>
            <p>Materias</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'grados' ? ' active' : '' }}">
        <a class="nav-link" href="{{asset('grados')}}">
          <i class="material-icons">bookmark</i>
            <p>Grados</p>
        </a>
      </li>
    </ul>
  </div>
</div>
