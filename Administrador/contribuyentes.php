<!DOCTYPE html>
<html>

<head>
    <title>Participante</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>
    <div style="margin-bottom: 5px; margin-left:30px;">
        <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-success">Agregar</button>
        <button onclick="document.getElementById('id03').style.display='block'" class="btn btn-primary">Mantenimiento</button>
        <a target="blank" href="../pdf/alumnospdf.php" class="btn btn-danger">Reportes</a>
        <div style="float: right; margin-right:40px;">

            <form action="" method="post">
                <input type="text" style="border-radius: 5px;" name="busqueda" required>
                <input type="submit" value="Buscar" class="btn btn-info" name="send_busqueda"></input>
            </form>
        </div>
    </div>




    <!-- Inicio Modal -->



    <div class="w3-container">
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:700px">
                <div class="w3-center"><br>
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

                    <p>Registrar Nuevo Contribuyente</p>
                </div>


                <form class="w3-container" method="post" action="mant_contribuyentes.php">
                    <div class="w3-section">
                       <!-- <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Subir</button>
                        </div>-->


                        <label><b>Medidor</b></label>
             <input class="w3-input w1-border " type="number" placeholder="Escriba el numero del MEDIDOR" name="medidor" required
              title="Solo se permiten Numeros" min="1" pattern="^[0-9]+"><br>
              <label><b>NIC</b></label>
             <input class="w3-input w1-border " type="number" placeholder="Escriba el numero del NIC" name="nic" required
              title="Solo se permiten Numeros" min="1" pattern="^[0-9]+"><br>
              <label><b>NIS</b></label>
             <input class="w3-input w1-border " type="number" placeholder="Escriba el numero de NIS" name="nis" required
              title="Solo se permiten Numeros" min="1" pattern="^[0-9]+"><br>  
              <label><b>Nombres</b></label>
             <input class="w3-input w3-border " type="text" placeholder="Escriba el nombre del contribuyente" name="nombre" required
             pattern="[A-Za-z A-Za-z]+" title="No se permiten Numeros"><br>
             <label><b>Dirección</b></label>
             <input class="w3-input w3-border " type="text" placeholder="Escriba la dirección" name="nombre" required
            ><br>
            <label><b>Municipio</b></label>
             <input class="w3-input w3-border " type="text" readonly="readonly" name="nombre"  value="SAN SEBASTIAN SALITRILLO" required
            ><br>
            <label><b>UNICOM</b></label>
             <input class="w3-input w1-border " type="number"  name="nis" readonly="readonly" value="5113"required
              title="Solo se permiten Numeros" min="1" pattern="^[0-9]+"><br>  
              <input type="submit" class="w3-button w3-block w3-green w3-section w3-padding" value="Registrar" name="send_insert">
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
   
    </div>




        <!--  Modal 3 -->
        <div id="id03" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:700px">
                <div class="w3-center"><br>
                    <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                    <p>Mantenimiento de Cliente</p>
                </div>
                <form class="w3-container" method="post" action="mant_contribuyentes.php">
                    <div class="w3-section">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Convocatoria</th>
                                    <th scope="col">Curso</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $conn = new baseD();
                                $consulta_participante = $conn->busquedaFree("SELECT
                `participante`.`idParticipante`,
                `participante`.`nombres`,
                `participante`.`apellidos`,
                `participante`.`fechaNacimiento`,
                `participante`.`sexo`,
                `participante`.`dui`,
                `participante`.`nit`,
                `participante`.`direccion`,
                `convocatoria`.`nombreConvocatoria`,
                `participantecurso`.`idCurso`

              FROM
                `dawproyecto`.`participante`
                INNER JOIN `dawproyecto`.`convocatoria`
                  ON (
                    `participante`.`idConvocatoria` = `convocatoria`.`idConvocatoria`
                  ) 
                  INNER JOIN `dawproyecto`.`participantecurso`
                  ON (
                    `participante`.`idParticipante` = `participantecurso`.`idParticipante`
                  ) 
                  ;
              ");

                                foreach ($consulta_participante as $datos) {
                                    $id_del = $datos['idParticipante'];
                                    $nombre = $datos['nombres'];
                                    $apellidos = $datos['apellidos'];
                                    $convocatoria = $datos['nombreConvocatoria'];
                                    $idcurso = $datos['idCurso'];
                                ?>
                                    <tr>
                                        <td><input type='radio' value='<?php echo $id_del; ?>' name='id_us' required></td>
                                        <td> <?php echo $nombre; ?></td>
                                        <td><?php echo $apellidos; ?></td>
                                        <td><?php echo $convocatoria; ?></td>
                                        <?php
                                        $consulta_curso = $conn->busquedaFree("SELECT * FROM curso where idCurso = $idcurso");
                                        foreach ($consulta_curso as $datos_curso) {
                                            $curso = $datos_curso['nombreCurso'];
                                            echo '<td>' . $curso . '</td>';
                                        }
                                        ?>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div style="text-align: center;">
                            <input type="submit" class="w3-button  w3-blue w3-section w3-padding" value="Actualizar" name="send_update">
                            <input type="submit" class="w3-button w3-red w3-section w3-padding" value="Eliminar" name="send_dl">
                        </div>
                    </div>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('id03').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->

        <!-- Data -->
        <div>
            <form action="" method="post">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Dui</th>
                            <th scope="col">Nit</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Convocatoria</th>
                            <th scope="col">Curso</th>
                        </tr>
                    <tbody>

                        <?php
                        if (isset($_POST['send_busqueda'])) {
                            $busqueda = $_POST['busqueda'];
                            if (strpos($busqueda, '-')) {
                                $consulta = $conn->busquedaFree("SELECT
                `participante`.`idParticipante`,
                `participante`.`nombres`,
                `participante`.`apellidos`,
                `participante`.`fechaNacimiento`,
                `participante`.`sexo`,
                `participante`.`dui`,
                `participante`.`nit`,
                `participante`.`direccion`,
                `convocatoria`.`nombreConvocatoria`,
                `telefonoparticipante`.`numeroTelefono`,
                `participantecurso`.`idCurso`
              FROM
                `dawproyecto`.`participante`
                INNER JOIN `dawproyecto`.`convocatoria`
                  ON (
                    `participante`.`idConvocatoria` = `convocatoria`.`idConvocatoria`
                  )
                  INNER JOIN `dawproyecto`.`telefonoparticipante`
                                ON (
                                  `participante`.`idParticipante` = `telefonoparticipante`.`idParticipante`
                                )
                                INNER JOIN `dawproyecto`.`participantecurso`
                                ON (
                                  `participante`.`idParticipante` = `participantecurso`.`idParticipante`
                                )  WHERE idTelefono = 2 AND dui = '$busqueda';
              ");
                                foreach ($consulta as $datos) {
                                    $id = $datos['idParticipante'];
                                    $nombre = $datos["nombres"];
                                    $apellido = $datos['apellidos'];
                                    $fecha = $datos['fechaNacimiento'];
                                    $sexo = $datos['sexo'];
                                    $dui = $datos['dui'];
                                    $nit = $datos['nit'];
                                    $direccion = $datos['direccion'];
                                    $convocatoria = $datos['nombreConvocatoria'];
                                    $telefono = $datos['numeroTelefono'];
                                    $curso = $datos['idCurso'];
                                    echo " <tr>
                        <td>$nombre</td>
                        <td>$apellido</td>
                        <td>$telefono</td>
                        <td>$fecha</td>
                        <td>$sexo</td>
                        <td>$dui</td>
                        <td>$nit</td>
                        <td>$direccion</td>
                        <td>$convocatoria</td>";
                                    $consulta_curso = $conn->busquedaFree("SELECT * FROM curso where idCurso = $curso");
                                    foreach ($consulta_curso as $datos_curso) {
                                        $curso = $datos_curso['nombreCurso'];
                                        echo '<td>' . $curso . '</td>';
                                    }
                                    echo "</tr>";
                                }
                            } else {
                                $consulta = $conn->busquedaFree("SELECT
                `participante`.`idParticipante`,
                `participante`.`nombres`,
                `participante`.`apellidos`,
                `participante`.`fechaNacimiento`,
                `participante`.`sexo`,
                `participante`.`dui`,
                `participante`.`nit`,
                `participante`.`direccion`,
                `convocatoria`.`nombreConvocatoria`,
                `telefonoparticipante`.`numeroTelefono`,
                `participantecurso`.`idCurso`
              FROM
                `dawproyecto`.`participante`
                INNER JOIN `dawproyecto`.`convocatoria`
                  ON (
                    `participante`.`idConvocatoria` = `convocatoria`.`idConvocatoria`
                  )
                  INNER JOIN `dawproyecto`.`telefonoparticipante`
                                ON (
                                  `participante`.`idParticipante` = `telefonoparticipante`.`idParticipante`
                                )
                                INNER JOIN `dawproyecto`.`participantecurso`
                                ON (
                                  `participante`.`idParticipante` = `participantecurso`.`idParticipante`
                                )  WHERE idTelefono = 2 and nombres  LIKE '%$busqueda%';
              ");
                                foreach ($consulta as $datos) {
                                    $id = $datos['idParticipante'];
                                    $nombre = $datos["nombres"];
                                    $apellido = $datos['apellidos'];
                                    $fecha = $datos['fechaNacimiento'];
                                    $sexo = $datos['sexo'];
                                    $dui = $datos['dui'];
                                    $nit = $datos['nit'];
                                    $direccion = $datos['direccion'];
                                    $convocatoria = $datos['nombreConvocatoria'];
                                    $telefono = $datos['numeroTelefono'];
                                    $curso = $datos['idCurso'];
                                    echo " <tr>
                        <td>$nombre</td>
                        <td>$apellido</td>
                        <td>$telefono</td>
                        <td>$fecha</td>
                        <td>$sexo</td>
                        <td>$dui</td>
                        <td>$nit</td>
                        <td>$direccion</td>
                        <td>$convocatoria</td>";
                                    $consulta_curso = $conn->busquedaFree("SELECT * FROM curso where idCurso = $curso");
                                    foreach ($consulta_curso as $datos_curso) {
                                        $curso = $datos_curso['nombreCurso'];
                                        echo '<td>' . $curso . '</td>';
                                    }
                                    echo "</tr>";
                                }
                            }
                        } else {
                            $consulta = $conn->busquedaFree("SELECT
  `participante`.`idParticipante`,
  `participante`.`nombres`,
  `participante`.`apellidos`,
  `participante`.`fechaNacimiento`,
  `participante`.`sexo`,
  `participante`.`dui`,
  `participante`.`nit`,
  `participante`.`direccion`,
  `convocatoria`.`nombreConvocatoria`,
  `telefonoparticipante`.`numeroTelefono`,
  `participantecurso`.`idCurso`
FROM
  `dawproyecto`.`participante`
  INNER JOIN `dawproyecto`.`convocatoria`
    ON (
      `participante`.`idConvocatoria` = `convocatoria`.`idConvocatoria`
    )
    INNER JOIN `dawproyecto`.`telefonoparticipante`
                  ON (
                    `participante`.`idParticipante` = `telefonoparticipante`.`idParticipante`
                  )
                  INNER JOIN `dawproyecto`.`participantecurso`
                  ON (
                    `participante`.`idParticipante` = `participantecurso`.`idParticipante`
                  )  Where idTelefono = 2;
");
                            foreach ($consulta as $datos) {
                                $id = $datos['idParticipante'];
                                $nombre = $datos["nombres"];
                                $apellido = $datos['apellidos'];
                                $fecha = $datos['fechaNacimiento'];
                                $sexo = $datos['sexo'];
                                $dui = $datos['dui'];
                                $nit = $datos['nit'];
                                $direccion = $datos['direccion'];
                                $convocatoria = $datos['nombreConvocatoria'];
                                $telefono = $datos['numeroTelefono'];
                                $curso = $datos['idCurso'];
                                echo " <tr>
          <td>$nombre</td>
          <td>$apellido</td>
          <td>$telefono</td>
          <td>$fecha</td>
          <td>$sexo</td>
          <td>$dui</td>
          <td>$nit</td>
          <td>$direccion</td>
          <td>$convocatoria</td>";
                                $consulta_curso = $conn->busquedaFree("SELECT * FROM curso where idCurso = $curso");
                                foreach ($consulta_curso as $datos_curso) {
                                    $curso = $datos_curso['nombreCurso'];
                                    echo '<td>' . $curso . '</td>';
                                }
                                echo "</tr>";
                            }
                        }

                        ?>
                    </tbody>
            </form>
        </div>

</body>
<script>
    $(function() {
        $("#telp").change(function() {
            if ($(this).val() !== "") {
                $("#telc").removeAttr("required");
            } else {
                $('#telc').prop("required", true);
            }
        });
    });

    $(function() {
        $("#seleccion_modal").change(function() {
            if ($(this).val() == 1) {
                $("#cursos_modal").hide();
                $("#participante_modal").show();
            } else if ($(this).val() == 4) {
                $("#participante_modal").hide();
                $("#cursos_modal").show();
            } else {
                $("#cursos_modal").hide();
                $("#participante_modal").show();
            }
        });
    });
</script>

</html>