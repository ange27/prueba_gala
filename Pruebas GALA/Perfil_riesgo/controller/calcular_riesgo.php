<html>
<head>
    <title>Cálculo de riesgo de perfil</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
		/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

</head>
<body>
<header class="bg-primary bg-gradient pl-5 pt-2 pb-2" style="color:white">
        <h3>Cálculo de riesgo de perfil</h3>
        por Angélica De León
    </header>
    <main class="container-lg mt-4">
<?php
   include("config.php");

   $con = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DBNAME)
   or die ("html>script language='JavaScript'>alert('¡No es posible conectarse a la base de datos! Vuelve a intentarlo más tarde.'),history.go(-1)/script>/html>");
   
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $apellido_casada = $_POST['apellido_casada'];
    $pais_nacimiento = $_POST['pais_nacimiento'];
    $pais_residencia = $_POST['pais_residencia'];
    $nivel_ingresos = $_POST['nivel_ingreso'];
    $profesion = $_POST['profesion'];
    $edad = $_POST['edad'];
    $PEP = $_POST['PEP'];
    
    $query = "SELECT a.id AS id, a.nombre As nombre_campo, b.id_valor AS id_valor, b.nombre AS nombre_valor, b.puntos As puntos, a.peso AS peso
    FROM perfiles_campos a
    INNER JOIN perfiles_valores b ON b.id_campo = a.id AND (
    (b.id_campo = 1 AND b.id_valor = $pais_nacimiento) OR
    (b.id_campo = 2 AND b.id_valor = $pais_residencia) OR
    (b.id_campo = 3 AND b.id_valor = $profesion) OR
    (b.id_campo = 4 AND b.id_valor = $edad) OR
    (b.id_campo = 5 AND b.id_valor = $nivel_ingresos) OR
    (b.id_campo = 6 AND b.id_valor = $PEP))";

    $result = mysqli_query ($con, $query);

     while ($valor = mysqli_fetch_array($result)) {
        if ($valor['id'] == 1) {
            $desc_pais_n = $valor['nombre_valor'];
            $pais_n_peso = $valor['peso']/100;
            $pais_n_puntos = $valor['puntos'];
        } elseif ($valor['id'] == 2) {
            $desc_pais_r = $valor['nombre_valor'];
            $pais_r_peso = $valor['peso']/100;
            $pais_r_puntos = $valor['puntos'];
        } elseif ($valor['id'] == 3) {
            $desc_prof = $valor['nombre_valor'];
            $prof_peso = $valor['peso']/100;
            $prof_puntos = $valor['puntos'];
        } elseif ($valor['id'] == 4) {
            $desc_edad = $valor['nombre_valor'];
            $edad_peso = $valor['peso']/100;
            $edad_puntos = $valor['puntos'];
        } elseif ($valor['id'] == 5) {
            $desc_nvl_ing = $valor['nombre_valor'];
            $nvl_ing_peso = $valor['peso']/100;
            $nvl_ing_puntos = $valor['puntos'];
        } elseif ($valor['id'] == 6 && $PEP != 0) {
            $desc_pep = $valor['nombre_valor'];
            $pep_peso = $valor['peso']/100;
            $pep_puntos = $valor['puntos'];
        }
     }
     if ($PEP == 0) {
        $desc_pep = "Sí";
        $pep_peso = 0;
        $pep_puntos = 0;
     }
     $riesgo = ($pais_n_puntos * $pais_n_peso) + ($pais_r_puntos * $pais_r_peso) + ($prof_puntos * $prof_peso) + $edad_peso * $edad_peso + $nvl_ing_puntos + ($pep_puntos * $pep_peso);
     
     echo "<p><b>Nombre del perfil: </b>".$primer_nombre." ".$segundo_nombre." ".$apellido_casada." ".$primer_apellido." ".$segundo_apellido."<br>";
     echo "<b>Edad: </b>".$desc_edad."<br>";
     echo "<b>Pais de nacimiento: </b>".$desc_pais_n."<br>";
     echo "<b>Pais de residencia: </b>".$desc_pais_r."<br>";
     echo "<b>Profesión: </b>".$desc_prof."<br>";
     echo "<b>Nivel de ingreso: </b>".$desc_nvl_ing."<br>";
     echo "<b>¿Es PEP?: </b> ".$desc_pep."</p>";

     if($PEP == 0) {
        echo "<b>El riesgo del perfil es: ".$riesgo."</b> <div class='text-center bg-danger text-white rounded-3'style='width:20%'>Alto</div>";
     } else {
        if ($riesgo < 1200) {
            echo "<b>EL riesgo del perfil es: ".$riesgo."</b> <div class='text-center bg-success text-white rounded-3' style='width:20%'>Bajo</div>";
        } elseif ($riesgo > 1200 && $riesgo <=1400) {
            echo "<b>EL riesgo del perfil es: ".$riesgo."</b> <div class='text-center bg-warning text-white rounded-3'style='width:20%'>Medio</div>";
        } else {
            echo "<b>El riesgo del perfil es: ".$riesgo."</b> <div class='text-center bg-danger text-white rounded-3'style='width:20%'>Alto</div>";
        }
    }
?>

    </main>
</html>