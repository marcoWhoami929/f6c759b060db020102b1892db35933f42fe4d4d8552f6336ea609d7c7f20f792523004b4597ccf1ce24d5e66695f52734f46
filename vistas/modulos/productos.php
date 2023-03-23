<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Gestor Productos
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor Productos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">

          Agregar Producto

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Titulo</th>
              <th>Categoria</th>
              <th>Subcategoria</th>
              <th>Ruta</th>
              <th>Estado</th>
              <th>Mas Vendido</th>
              <th>Palabras claves</th>
              <th>Portada</th>
              <th>Imagen Principal</th>
              <th>Multimedia</th>
              <th>Detalles</th>
              <th>Tipo de Oferta</th>
              <th>Valor Oferta</th>
              <th>Imagen Oferta</th>
              <th>Fin Oferta</th>
              <th>Acciones</th>

            </tr>

          </thead>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar producto</h4>

      </div>

      <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!--=====================================
            ENTRADA PARA EL TÍTULO
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa-brands fa-product-hunt"></i></span>

              <input type="text" class="form-control input-lg validarProducto tituloProducto" placeholder="Ingresar título producto">

            </div>

          </div>

          <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-link"></i></span>

              <input type="text" class="form-control input-lg rutaProducto" placeholder="Ruta url del producto" readonly>

            </div>

          </div>

          <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO MERCADO LIBRE
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-link"></i></span>

              <input type="text" class="form-control input-lg rutaProductoMercadoLibre" placeholder="Ruta url del producto mercado libre">

            </div>

          </div>

          <!--=====================================
            
            ======================================-->
          <input type="hidden" class="form-control input-lg seleccionarTipo" value="fisico" id="seleccionarTipo">
          <!--=====================================
            ENTRADA PARA AGREGAR MULTIMEDIA
            ======================================-->

          <div class="form-group agregarMultimedia">



            <!--=====================================
              SUBIR MULTIMEDIA DE PRODUCTO FÍSICO
              ======================================-->

            <div class="multimediaFisica needsclick dz-clickable" style="display:none">

              <div class="dz-message needsclick">

                Arrastrar o dar click para subir imagenes.

              </div>

            </div>

          </div>

          <!--=====================================
            AGREGAR DETALLES FÍSICOS
            ======================================-->

          <div class="detallesFisicos" style="display:none">

            <div class="panel">DETALLES</div>

            <!-- MARCA -->

            <div class="form-group row">

              <div class="col-xs-3">
                <input class="form-control input-lg" type="text" value="Marca" readonly>
              </div>

              <div class="col-xs-9">
                <select class="form-control input-lg detalleMarca">

                  <option value="">Elegir Marca</option>

                  <option value="sherwin-williams">Sherwin Williams</option>
                  <option value="goni">Goni</option>
                  <option value="3m">3m</option>
                  <option value="zaak">Zaak</option>
                  <option value="tekbond">Tekbond</option>
                  <option value="excelo">Excelo</option>
                  <option value="flex">Flex</option>
                  <option value="automagic">Automagic</option>
                  <option value="arnold">Arnold</option>
                  <option value="ultra">Ultra</option>
                  <option value="planet-color">Planet Color</option>

                </select>
              </div>

            </div>
            <!-- CÓDIGO PRODUCTO -->

            <div class="form-group row">

              <div class="col-xs-3">
                <input class="form-control input-lg" type="text" value="Codigo" readonly>
              </div>

              <div class="col-xs-9">
                <input type="text" class="form-control input-lg codigoProducto" placeholder="Código del producto">
              </div>

            </div>

          </div>

          <!--=====================================
            AGREGAR CATEGORÍA
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <select class="form-control input-lg seleccionarCategoria">

                <option value="">Selecionar categoría</option>

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {

                  echo '<option value="' . $value["id"] . '">' . $value["category"] . '</option>';
                }

                ?>

              </select>

            </div>

          </div>

          <!--=====================================
            AGREGAR SUBCATEGORÍA
            ======================================-->

          <div class="form-group  entradaSubcategoria" style="display:none">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <select class="form-control input-lg seleccionarSubCategoria">

              </select>

            </div>

          </div>

          <!--=====================================
            AGREGAR DESCRIPCIÓN
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

              <textarea type="text" maxlength="2000" rows="3" class="form-control input-lg descripcionProducto" placeholder="Ingresar descripción producto"></textarea>

            </div>

          </div>

          <!--=====================================
            AGREGAR PALABRAS CLAVES
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-key"></i></span>

              <input type="text" class="form-control input-lg tagsInput pClavesProducto" data-role="tagsinput" placeholder="Ingresar palabras claves">

            </div>

          </div>

          <!--=====================================
            AGREGAR FOTO DE PORTADA
            ======================================-->

          <div class="form-group">

            <div class="panel">SUBIR FOTO PORTADA</div>

            <input type="file" class="fotoPortada">

            <p class="help-block">Tamaño recomendado 1360px * 420px <br> Peso máximo de la foto 2MB</p>

            <img src="vistas/img/cabeceras/default/default.png" class="img-thumbnail previsualizarPortada" width="100%">

          </div>

          <!--=====================================
            AGREGAR FOTO DE MULTIMEDIA
            ======================================-->

          <div class="form-group">

            <div class="panel">SUBIR FOTO PRINCIPAL DEL PRODUCTO</div>

            <input type="file" class="fotoPrincipal">

            <p class="help-block">Tamaño recomendado 400px * 450px <br> Peso máximo de la foto 2MB</p>

            <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="200px">

          </div>

          <!--=====================================
            AGREGAR PRECIO, PESO Y ENTREGA
            ======================================-->

          <div class="form-group row" style="display:none">

            <!-- PRECIO -->

            <div class="col-md-6 col-xs-12">

              <div class="panel">PRECIO</div>

              <div class="input-group">

                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="number" class="form-control input-lg precio" min="0" step="any">

              </div>

            </div>
            <div class="col-md-6 col-xs-6">

              <!--=====================================
              AGREGAR OFERTAS
              ======================================-->
              <div class="panel">OFERTA</div>

              <div class="form-group">

                <select class="form-control input-lg selActivarOferta">

                  <option value="">No tiene oferta</option>
                  <option value="oferta">Activar oferta</option>

                </select>

              </div>

            </div>


          </div>
          <div class="datosOferta" style="display:none">

            <!--=====================================
              VALOR OFERTAS
              ======================================-->

            <div class="form-group row">

              <div class="col-xs-6">

                <div class="input-group">

                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                  <input class="form-control input-lg valorOferta precioOferta" tipo="oferta" type="number" value="0" min="0" placeholder="Precio">

                </div>

              </div>

              <div class="col-xs-6">

                <div class="input-group">

                  <input class="form-control input-lg valorOferta descuentoOferta" tipo="descuento" type="number" value="0" min="0" placeholder="Descuento">
                  <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                </div>

              </div>

            </div>

            <!--=====================================
              FECHA FINALIZACIÓN OFERTA
              ======================================-->

            <div class="form-group">

              <div class="input-group date">

                <input type='text' class="form-control datepicker input-lg valorOferta finOferta">

                <span class="input-group-addon">

                  <span class="glyphicon glyphicon-calendar"></span>

                </span>

              </div>

            </div>

            <!--=====================================
              FOTO OFERTA
              ======================================-->

            <div class="form-group">

              <div class="panel">SUBIR FOTO OFERTA</div>

              <input type="file" class="fotoOferta valorOferta">

              <p class="help-block">Tamaño recomendado 640px * 430px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/ofertas/default/default.jpg" class="img-thumbnail previsualizarOferta" width="100px">

            </div>

          </div>

        </div>

      </div>

      <!--=====================================
        PIE DEL MODAL
        ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="button" class="btn btn-primary guardarProducto">Guardar producto</button>

      </div>

      <!-- </form> -->

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar producto</h4>

      </div>

      <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!--=====================================
            ENTRADA PARA EL TÍTULO
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa-brands fa-product-hunt"></i></span>

              <input type="text" class="form-control input-lg validarProducto tituloProducto" readonly>

              <input type="hidden" class="idProducto">
              <input type="hidden" class="idCabecera">

            </div>

          </div>

          <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-link"></i></span>

              <input type="text" class="form-control input-lg rutaProducto" readonly>

            </div>

          </div>

          <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO MERCADO LIBRE
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-link"></i></span>

              <input type="text" class="form-control input-lg rutaProductoMercadoLibre" placeholder="Ruta url del producto mercado libre">

            </div>

          </div>

          <!--=====================================
            ENTRADA PARA SELECCIONAR EL TIPO DEL PRODUCTO
            ======================================-->

          <input type="hidden" class="form-control input-lg seleccionarTipo" readonly>

          <!--=====================================
            ENTRADA PARA AGREGAR MULTIMEDIA
            ======================================-->

          <div class="form-group agregarMultimedia">



            <!--=====================================
              SUBIR MULTIMEDIA DE PRODUCTO FÍSICO
              ======================================-->

            <div class="row previsualizarImgFisico"></div>

            <div class="multimediaFisica needsclick dz-clickable" style="display:none">

              <div class="dz-message needsclick">

                Arrastrar o dar click para subir imagenes.

              </div>

            </div>

          </div>


          <!--=====================================
            AGREGAR DETALLES FÍSICOS
            ======================================-->

          <div class="detallesFisicos" style="display:none">

            <div class="panel">DETALLES</div>

            <!-- MARCA -->

            <div class="form-group row">

              <div class="col-xs-3">
                <input class="form-control input-lg" type="text" value="Marca" readonly>
              </div>

              <div class="col-xs-9 editarMarca">
                <select class="form-control input-lg detalleMarca" id="detalleMarca">

                  <option value="sherwin-williams">Sherwin Williams</option>
                  <option value="goni">Goni</option>
                  <option value="3m">3m</option>
                  <option value="zaak">Zaak</option>
                  <option value="tekbond">Tekbond</option>
                  <option value="excelo">Excelo</option>
                  <option value="flex">Flex</option>
                  <option value="automagic">Automagic</option>
                  <option value="arnold">Arnold</option>
                  <option value="ultra">Ultra</option>
                  <option value="planet-color">Planet Color</option>

                </select>
              </div>

            </div>
            <!-- CÓDIGO PRODUCTO -->

            <div class="form-group row">

              <div class="col-xs-3">
                <input class="form-control input-lg" type="text" value="Codigo" readonly>
              </div>

              <div class="col-xs-9">
                <input type="text" class="form-control input-lg codigoProducto" id="codigoProducto" placeholder="Código del producto">
              </div>

            </div>

          </div>

          <!--=====================================
            AGREGAR CATEGORÍA
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <select class="form-control input-lg seleccionarCategoria">

                <option class="optionEditarCategoria"></option>

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {

                  echo '<option value="' . $value["id"] . '">' . $value["category"] . '</option>';
                }

                ?>

              </select>

            </div>

          </div>

          <!--=====================================
            AGREGAR SUBCATEGORÍA
            ======================================-->

          <div class="form-group entradaSubcategoria">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <select class="form-control input-lg seleccionarSubCategoria">

                <option class="optionEditarSubCategoria"></option>

              </select>

            </div>

          </div>

          <!--=====================================
            AGREGAR DESCRIPCIÓN
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

              <textarea type="text" maxlength="2000" rows="3" class="form-control input-lg descripcionProducto"></textarea>

            </div>

          </div>

          <!--=====================================
            AGREGAR PALABRAS CLAVES
            ======================================-->

          <div class="form-group editarPalabrasClaves">

            <!--   <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                  <input type="text" class="form-control input-lg tagsInput pClavesProducto" data-role="tagsinput"  placeholder="Ingresar palabras claves">

                </div> -->

          </div>

          <!--=====================================
            AGREGAR FOTO DE PORTADA
            ======================================-->

          <div class="form-group">

            <div class="panel">SUBIR FOTO PORTADA</div>

            <input type="file" class="fotoPortada">
            <input type="hidden" class="antiguaFotoPortada">

            <p class="help-block">Tamaño recomendado 1360px * 420px <br> Peso máximo de la foto 2MB</p>

            <img src="vistas/img/cabeceras/default/default.png" class="img-thumbnail previsualizarPortada" width="100%">

          </div>

          <!--=====================================
            AGREGAR FOTO DE MULTIMEDIA
            ======================================-->

          <div class="form-group">

            <div class="panel">SUBIR FOTO PRINCIPAL DEL PRODUCTO</div>

            <input type="file" class="fotoPrincipal">
            <input type="hidden" class="antiguaFotoPrincipal">

            <p class="help-block">Tamaño recomendado 400px * 450px <br> Peso máximo de la foto 2MB</p>

            <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="200px">

          </div>

          <!--=====================================
            AGREGAR PRECIO, PESO Y ENTREGA
            ======================================-->

          <div class="form-group row" style="display:none">

            <!-- PRECIO -->

            <div class="col-md-6 col-xs-12">

              <div class="panel">PRECIO</div>

              <div class="input-group">

                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="number" class="form-control input-lg precio" min="0" step="any">

              </div>

            </div>
            <div class="col-md-6 col-xs-6">

              <!--=====================================
            AGREGAR OFERTAS
            ======================================-->
              <div class="panel">OFERTA</div>
              <div class="form-group">

                <select class="form-control input-lg selActivarOferta">

                  <option value="">No tiene oferta</option>
                  <option value="oferta">Activar oferta</option>

                </select>

              </div>

            </div>

          </div>



          <div class="datosOferta" style="display:none">

            <!--=====================================
              VALOR OFERTAS
              ======================================-->

            <div class="form-group row">

              <div class="col-xs-6">

                <div class="input-group">

                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                  <input class="form-control input-lg valorOferta precioOferta" tipo="oferta" type="number" value="0" min="0" placeholder="Precio">

                </div>

              </div>

              <div class="col-xs-6">

                <div class="input-group">

                  <input class="form-control input-lg valorOferta descuentoOferta" tipo="descuento" type="number" value="0" min="0" placeholder="Descuento">
                  <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                </div>

              </div>

            </div>

            <!--=====================================
              FECHA FINALIZACIÓN OFERTA
              ======================================-->

            <div class="form-group">

              <div class="input-group date">

                <input type='text' class="form-control datepicker input-lg valorOferta finOferta">

                <span class="input-group-addon">

                  <span class="glyphicon glyphicon-calendar"></span>

                </span>

              </div>

            </div>

            <!--=====================================
              FOTO OFERTA
              ======================================-->

            <div class="form-group">

              <div class="panel">SUBIR FOTO OFERTA</div>

              <input type="file" class="fotoOferta valorOferta">
              <input type="hidden" class="antiguaFotoOferta">

              <p class="help-block">Tamaño recomendado 640px * 430px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/ofertas/default/default.jpg" class="img-thumbnail previsualizarOferta" width="100px">

            </div>

          </div>

        </div>

      </div>

      <!--=====================================
        PIE DEL MODAL
        ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="button" class="btn btn-primary guardarCambiosProducto">Guardar cambios</button>

      </div>

    </div>

  </div>

</div>

<?php

$eliminarProducto = new ControladorProductos();
$eliminarProducto->ctrEliminarProducto();

?>