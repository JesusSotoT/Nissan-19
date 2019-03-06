<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <!-- Title Page-->
    <title>Nissan 2019 - Registro Participante</title>
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
         $.datepicker.setDefaults($.datepicker.regional['es']);
    $( ".datepicker" ).datepicker({
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        showAnim: "slide"
    });
  } );
  </script>
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Registro Participante | Nissan 2019 </h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row m-b-55">
                            <div class="name">Nombre</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="first_name">
                                            <label class="label--desc">Nombre(s)</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name">
                                            <label class="label--desc">Apellido Paterno</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name"></div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name">
                                            <label class="label--desc">Apellido Materno</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <?php
                            include "conexion.php";
                            $query = $conn -> query ("SELECT * FROM paises");
                    

                            ?>
                            <div class="name">País</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Seleccione país de origen</option>
                                            <?php 
while ($valores = mysqli_fetch_array($query)) {
                        
  echo '<option value="'.$valores[id].'">'.$valores[pais].'</option>';
}
                                             ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-t-20">
                            <label class="label label--block">Genero</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Femenino
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Masculino
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Fecha de Nacimiento</div>
                            <div class="value">
                                <div class="input-group" id="datepicker">
                                    <input class="input--style-5 datepicker" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Estatura:</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="area_code">
                                            <label class="label--desc">CM</label>
                                        </div>
                                    </div>
                                    <?php
                            include "conexion.php";
                            $query = $conn -> query ("SELECT * FROM tagm_tallas");
                    

                            ?>
                                    <div class="name">Talla:</div>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Seleccione la talla</option>
                                            <?php 
while ($valores = mysqli_fetch_array($query)) {
                        
  echo '<option value="'.$valores[id].'">'.$valores[talla].'</option>';
}
                                             ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="row row-space">
                                <?php
                            include "conexion.php";
                            $query = $conn -> query ("SELECT * FROM tagm_tipos_sangre");
                    

                            ?>
                                <div class="name">Tipo de Sangre:</div>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="subject">
                                        <option disabled="disabled" selected="selected">Seleccione Tipo de sangre</option>
                                        <?php 
while ($valores = mysqli_fetch_array($query)) {
                        
  echo '<option value="'.$valores[id].'">'.$valores[tipo_sangre].'</option>';
}
                                             ?>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Alegias:</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea rows="10" cols="40"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Enfermedades<br>/Medicamentos:</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea rows="10" cols="40"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Imagenes</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <label class=" m-r-55">Foto 1:
                                        </label>
                                        <div id="imagePreview">
                                            <input id="uploadFile" type="file" name="image" class="img" />
                                            <div class="hover">
                                                <i class="ion-camera"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label class="">Foto 2:
                                        </label>
                                        <div id="imagePreview">
                                            <input id="uploadFile" type="file" name="image" class="img" />
                                            <div class="hover">
                                                <i class="ion-camera"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-row m-b-55">
                                <div class="name">Habitacion:</div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <div class="input-group-desc">
                                                <input class="input--style-5" type="text" name="first_name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Siguiente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script>
    $(function() {
        $("#uploadFile").on("change", function() {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    $("#imagePreview").css("background-image", "url(" + this.result + ")");
                }
            }
        });
    });
    </script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <!-- Main JS-->
    <script src="js/global.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->