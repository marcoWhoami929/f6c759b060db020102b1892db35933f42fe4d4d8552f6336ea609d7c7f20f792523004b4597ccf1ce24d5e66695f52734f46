<!--=====================================
MENU
======================================-->

<ul class="sidebar-menu">



  <?php

  if ($_SESSION["perfil"] == "Administrador") {

    echo '<li><a href="plantilla"><i class="fa-solid fa-screwdriver-wrench"></i> <span>Plantilla</span></a></li>';
  }

  ?>

  <li><a href="slide"><i class="fa fa-edit"></i> <span>Gestor Slide</span></a></li>

  <li class="treeview">

    <a href="#">
      <i class="fa-sharp fa-solid fa-table-list"></i>
      <span>Gestor Categorías</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>

    <ul class="treeview-menu">

      <li><a href="categorias"><i class="fa fa-circle-o"></i> Categorías</a></li>
      <li><a href="subcategorias"><i class="fa fa-circle-o"></i> Subcategorías</a></li>

    </ul>

  </li>

  <li><a href="productos"><i class="fa-solid fa-cubes"></i> <span>Gestor Productos</span></a></li>

  <li><a href="banner"><i class="fa-solid fa-images"></i><span>Gestor Banner</span></a></li>

  <li><a href="sucursales"><i class="fa-solid fa-store"></i><span>Gestor Sucursales</span></a></li>

  <li><a href="revista"><i class="fa-solid fa-book"></i><span>Gestor Revista</span></a></li>

  <li><a href="fichasTecnicas"><i class="fa fa-file-pdf"></i><span>Fichas Técnicas</span></a></li>

  <li><a href="videos"><i class="fa fa-video-camera" aria-hidden="true"></i><span>Videos Clientes</span></a></li>
  <?php

  if ($_SESSION["perfil"] == "Administrador") {

    echo '<li><a href="perfiles"><i class="fa fa-key"></i> <span>Gestor Perfiles</span></a></li>';
  }

  ?>

</ul>