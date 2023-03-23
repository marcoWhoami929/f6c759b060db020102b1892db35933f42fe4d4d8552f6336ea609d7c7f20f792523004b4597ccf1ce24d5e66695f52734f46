<?php

$slide = ControladorSlide::ctrMostrarSlide();

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Gestor Slider Principal
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor Slider </li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary agregarSlide">

          Agregar slider

        </button>

      </div>

      <div class="box-body">

        <ul class="todo-list">

          <?php

          foreach ($slide as $key => $value) {


            $title = json_decode($value["title"], true);
            $subtitle = json_decode($value["subtitle"], true);

            echo '<li class="itemSlide" id="' . $value["id"] . '">

          <div class="box-group" id="accordion">

            <!--=====================================
            CAJA GESTOR SLIDE
            ======================================-->                  

            <div class="panel box box-info">

              <!--=====================================
              CABEZA DE LA CAJA GESTOR SLIDE
              ======================================-->      

              <div class="box-header with-border">

                <span class="handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>

                <h4 class="box-title">

                <a data-toggle="collapse" data-parent="#accordion" href="#collapse' . $value["id"] . '">';

            if ($value["name"] != "") {

              echo '<p class="text-uppercase">' . $value["name"] . '</p>';
            } else {

              echo 'Slide ' . $value["id"];
            }

            echo '</a>

                </h4>

                <div class="btn-group pull-right">

                  <button class="btn btn-primary guardarSlide"
                   id="' . $value["id"] . '"
                   indice="' . $key . '"
                   nameSlide="' . $value["name"] . '"
                   activeSlide=' . $value["active"] . '
                   buttonActive=' . $value["buttonActive"] . '
                   image="' . $value["image"] . '"
                   routeImage="' . $value["image"] . '"
                   titleTexto="' . $title["texto"] . '"
                   titleColor="' . $title["color"] . '"
                   subtitleTexto="' . $subtitle["texto"] . '"
                   subtitleColor="' . $subtitle["color"] . '"
                   textButton="' . $value["textButton"] . '"
                   action="' . $value["action"] . '"
                    >

                    <i class="fa-solid fa-floppy-disk"></i>

                  </button>

                  <button class="btn btn-danger eliminarSlide"
                   id="' . $value["id"] . '"
                   image="' . $value["image"] . '"">

                   <i class="fa-solid fa-trash-can"></i></button>

                </div>

              </div>

              <!--=====================================
              MÓDULOS COLAPSABLES
              ======================================-->      

              <div id="collapse' . $value["id"] . '" class="panel-collapse collapse collapseSlide">

                <!--=====================================
                EDITOR SLIDE
                ======================================-->    
                
                <div class="row">

                  <!--=====================================
                  PRIMER BLOQUE
                  ======================================--> 
              
                  <div class="col-md-4 col-xs-12">
            
                    <div class="box-body">

                      <!--=====================================
                      MODIFICAR NOMBRE SLIDE
                      ======================================-->      
                    
                      <div class="form-group">
                    
                        <label>Nombre del Slide:</label>

                        <input type="text" class="form-control nombreSlide" indice="' . $key . '" value="' . $value["name"] . '">

                      </div>  
                      <!--=====================================
                      MODIFICAR  SLIDE ACTIVO
                      ======================================--> 

                      <div class="form-group">

                        <input type="hidden" class="activeSlide" value="' . $value["active"] . '">

                        <label>Activar Slide:</label>

                        <label class="checkbox-inline">
                        
                          <input class="activeSlideTrue" type="radio" value="1" name="activeSlide' . $key . '" indice="' . $key . '">

                          Activo

                        </label>

                        <label class="checkbox-inline">
                        
                          <input class="activeSlideFalse" type="radio" value="0" name="activeSlide' . $key . '" indice="' . $key . '">

                          Inactivo

                        </label>

                      </div> 
                    

                      <!--=====================================
                      MODIFICAR EL FONDO DEL SLIDE
                      ======================================--> 

                      <div class="form-group">
                    
                        <label>Cambiar Imagen:</label>

                        <br>

                        <p class="help-block">
                        <img src="' . $value["image"] . '" class="img-thumbnail previsualizarFondo" width="300px">
                        </p>

                        <input type="file" class="subirFondo" indice="' . $key . '">

                        <p class="help-block">Tamaño recomendado 1360px * 420px</p>

                      </div>

                      <!--=====================================
                      MODIFICAR EL BOTÓN DEL SLIDE
                      ======================================--> 

                      <div class="form-group">
  
                        <label>Texto del botón:</label>

                        <input type="text" class="form-control botonSlide" indice="' . $key . '" value="' . $value["textButton"] . '" placeholder="EJEMPLO: IR A LA PROMOCIÓN">

                      </div>

                      <div class="form-group">
                  
                        <label>Url del botón:</label>

                        <input type="text" class="form-control urlSlide" indice="' . $key . '" value="' . $value["action"] . '" placeholder="EJEMPLO: http://www.sanfranciscodekkerlab.com">

                      </div>
                      <!--=====================================
                      MODIFICAR  BOTTON ACTIVO
                      ======================================--> 

                      <div class="form-group">

                        <input type="hidden" class="buttonActive" value="' . $value["buttonActive"] . '">

                        <label>Activar Botón Slide:</label>

                        <label class="checkbox-inline">
                        
                          <input class="buttonActiveTrue" type="radio" value="1" name="buttonActive' . $key . '" indice="' . $key . '">

                          Activo

                        </label>

                        <label class="checkbox-inline">
                        
                          <input class="buttonActiveFalse" type="radio" value="0" name="buttonActive' . $key . '" indice="' . $key . '">

                          Inactivo

                        </label>

                      </div> 

                    </div>

                  </div>

                  

                  <!--=====================================
                  SEGUNDO BLOQUE
                  ======================================--> 

                  <div class="col-md-4 col-xs-12">
                
                    <div class="box-body">

                      <!--=====================================
                      CAMBIO TITULO
                      ======================================--> 

                      <div class="form-group">

                        <label>Title:</label>

                        <input type="text" class="form-control cambioTituloTexto1" indice="' . $key . '"  value="' . $title["texto"] . '">

                        <div class="input-group my-colorpicker">
                        
                          <input type="text" class="form-control cambioColorTexto1" indice="' . $key . '" value="' . $title["color"] . '">

                          <div class="input-group-addon">

                            <i></i>

                          </div>

                        </div>

                      </div>

                      <!--=====================================
                      CAMBIO SUBTITULO
                      ======================================--> 

                      <div class="form-group">

                        <label>Subtitle:</label>

                        <input type="text" class="form-control cambioTituloTexto2" indice="' . $key . '" value="' . $subtitle["texto"] . '">

                        <div class="input-group my-colorpicker">
                        
                          <input type="text" class="form-control cambioColorTexto2" indice="' . $key . '" value="' . $subtitle["color"] . '">

                          <div class="input-group-addon">

                            <i></i>

                          </div>

                        </div>

                      </div>';



            echo '

              </div>

            </div>

          </div>

        </li>';
          }


          ?>

        </ul>

      </div>

    </div>

  </section>

</div>

<?php

$eliminarSlide = new ControladorSlide();
$eliminarSlide->ctrEliminarSlide();

?>