<?php 
include_once("models.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ejemplo Select</title>
        <link rel="stylesheet" href="bulma.min.css">
    </head>
    <body>
        <section class="section">
            <div class="container">
                <h1 class="title">Ejemplo Ajax</h1>
                <h2 class="subtitle">
                    Ejemplo simple de cargar control Select con Ajax
                </h2>

                <form>
                    <div class="field">
                        <label class="label">Marca</label>
                        <div class="control">
                            <div class="select">
                                <select id="sMarca">
                                    <option value="">Seleccionar Marca</option>
                                    <?php 
                                    //Cargar las opciones para el combo
                                    foreach($v_Marcas as $id => $marca){
                                        echo '<option value="' . $id . '">' . $marca . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Modelo</label>
                        <div class="control">
                            <div class="select">
                                <select id="sModelo" disabled >
                                    <option value="">Seleccionar Modelo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <script src="jquery.min.js"></script>
        <script>
            $(document).ready(function(){ //Utilizando JQuery para esperar que el documento html se cargue

                //Toda instruccion que utilizara elementos de documento estan disponibles despues de que este cargado el documento

                $("#sMarca").change(function(){ // Se habilita evento reaccion a cambio en el <select> id smarca

                    var id = this.value; // Obtener valor de la <option> seleccionado
                    $.ajax({ // Definicion de uso de AJAX con JQuery
                        url: "models.php?req=json&idMarca=" + id, // Propiedad que se asigna url donde carga JSON
                        dataType: "json", // Propiedad se asigna tipo de petición AJAX que se realizara
                        error: function(){ // Propiedad si surge algun error durante la peticion
                            alert("Error en la petición...");
                        }
                    }).done(function(result){ // Finalizado correctamente 
                        var texto = '<option value="">Seleccionar Modelo</option>'; // Texto se utilizara para contenar las nuevas opciones para el <select> Modelo
                        console.log(result.data); //Mostrar en consola navegador los valores resulantes de la url que se realizo la peticion
                        if(result.data.length <= 0){ // Si no retorna datos se deshabilita el control <select>
                            $("#sModelo").attr('disabled','disabled');
                        }else{// Si retorna valores de recorre el resultado
                            $.each(result.data, function(index, modelo){
                                texto += "<option value='"+modelo.id+"'>"+modelo.nombre+"</option>"; //concatena
                            });
                            $("#sModelo").removeAttr('disabled'); // se habilita el control <select>
                            $("#sModelo").html(texto); // Carga html al control <select> de modelos
                        }

                    });
                });

            });
        </script>
    </body>
</html>