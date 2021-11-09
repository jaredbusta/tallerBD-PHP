//<?php
////////////////// CONEXION A LA BD ////////////////////
//require "../conexion/conexion.php";
///////////////// CONSULTA A LA BD ///////////////////
//#$usuarios = "SELECT * FROM usuario";
//$usuarios = "SELECT * FROM  usuario order by id_usuario";
//$resUsuarios = $conexion->query($usuarios);
//#$resUsuarios2 = $conexion->query($usuariosI);
//?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../ext/aos.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond" rel="stylesheet">
    <link rel="stylesheet" href="../img/iconos/css/fontello.css">
    <link rel="stylesheet" href="../ext/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/keyframes.css">
    <link rel="stylesheet" href="../css/banner.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script src="ext/bootstrap/js/jquery.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <header>
        <nav class="ewk_navbar navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="https://rickandmortyapi.com/" target="https://rickandmortyapi.com/">Rick y Morty</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.html">Home<span class="sr-only">Page</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://rickandmortyapi.com/api/ " target="https://rickandmortyapi.com/api/ ">Api</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link true" href="scrooll.html" tabindex="-1" aria-disabled="true">Scroll API</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link true" href="https://rickandmortyapi.com/documentation" target="https://rickandmortyapi.com/documentation" tabindex="-1" aria-disabled="true">Documentación</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section>
        <div class="ewk_cont_banner">
            <div class="ewk_sombra">
                <h1>EWebik</h1>
                <p>Diseños elegantes y contemporaneos</p>
                <hr />
                <div class="ewk_cont_banner_link">
                    <a class="ewk_banner_link" href="">Proyectos</a>
                    <a class="ewk_banner_link_1" href="">Licitaciones</a>
                    <a class="ewk_banner_link_2" href="">Cotización</a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <h1>Usuarios crud</h1>
    </section>
    <section>
        <dvi class="container">
            <div class="row ewk_cont_sec_1">
                <div class="col-md-9">
                    <table aling=center class="table table-striped table-bordered" id="usuarios">
                        <!--alineación centrada OJO -->
                        <tr>
                            <th>ID</th>
                            <th>nick</th>
                            <th> Nombre</th>
                            <th>correo</th>
                        </tr>
                        <?php
                        ///////////// MOSTRAR RESULTADOS DE LA CONSULTA /////////////
                        while ($registroUsuarios = $resUsuarios->fetch_array(MYSQLI_BOTH)) {
                            echo '<tr>
            <td>' . $registroUsuarios['id_usuario'] . '</td>
            <td>' . $registroUsuarios['nick'] . '</td>
            <td>' . $registroUsuarios['nombre'] . '</td>
            <td>' . $registroUsuarios['correo'] . '</td>
            </tr>';
                        }
                        ?>
                    </table>
                </div>
        </dvi>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Crud</h2>

                    <!-- OJO aquí empieza el formulario para la inserción -->
                    <form method="post">
                        <h3 align=center> Agregar Nuevo Usuario </h3>
                        <table align=center>
                            <tr>
                                <td><input required name="idusuario" placeholder="ID Usuario" /></td>
                                <td><input required name="nick" placeholder="Nick" /></td>
                                <td><input required name="nombre" placeholder="Nombre" /></td>
                                <td><input required name="correo" placeholder="Correo" /></td>
                            </tr>
                        </table>
                        <div align=center>
                            <input type="submit" name="insertar" value="Insertar Usuario" />
                        </div>
                    </form>
                    <!-- Acciones del botón INSERTAR -->
                    <?php
                    ////////////// PRESIONAR EL BOTÓN /////////////////
                    if (isset($_POST['insertar'])) {
                        $id = $_POST['idusuario'];
                        $nic = $_POST['nick'];
                        $nom = $_POST['nombre'];
                        $corr = $_POST['correo'];
                        mysqli_query($conexion, "insert into usuario (id_usuario, nick, nombre, correo) 
					values ('$id', '$nic', '$nom', '$corr')") or die(mysqli_error($conexion)); ///OJO////
                        header("location:v_usuarios.php"); // para que actualice la página
                    }
                    ?>
                </div>

                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section>
    

    <script>
        //ajax con funciones asincronas
        $(document).ready(function(){
            
            $.ajax({
                url: "../controller/lista_usuarios.php",
                method:"post",
                dataType: "json",
                contentType:"application/json;charset='utf8'",
                data:{},
                complete: function(datos) {
                    console.log(datos.responseJSON);
                    $("#usuarios").empty();
                    $.each(datos.responseJSON,function(i,v){
                        $("#usuarios").append(
                       `<tr>
                            <td>${v.id_usuario}</td>
                            <td>nick</td>
                            <td> Nombre</td>
                            <td>correo</td>
                        </tr>` 
                    );
                    })
                    
                },
                error:function(err){
                  
                }
            })
        });
        
    </script>

   
    <script src="ext/bootstrap/js/bootstrap.min.js"></script>
    <script src="ext/aos.js"> </script>
    <script src="js/index.js"></script>
</body>

</html>