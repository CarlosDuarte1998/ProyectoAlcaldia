 <?php
  //include_once("menuAdmi.php");
  ?>
 <!DOCTYPE html>
 <html>

 <head>
   <title>Admin</title>
 </head>

 <body>
   <div style="margin-bottom: 5px; margin-left:16px;">
     <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-success">Agregar</button>
     <button onclick="document.getElementById('id03').style.display='block'" class="btn btn-primary">Mantenimiento</button>
     <a target="bank" href="../pdf/Ad_docentespdf.php" class="btn btn-danger">Reportes</a>
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
           <p>Registrar Contribuyente CLESA</p>
         </div>
         <form class="w3-container" method="post" action="mant_docentes.php">
           <div class="w3-section">
             <label><b>Nombres de Contribuyente</b></label>
             <input class="w3-input w3-border " type="text" placeholder="Escriba el Nombre" name="nombre" required
             pattern="[A-Za-z- A-Za]+" title="No se permiten Numeros">

             <label><b>Apellidos de Contribuyente</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba los Apellidos" name="apellido" required
             pattern="[A-Za-z- A-Za]+" title="No se permiten Numeros">

             <label><b>Mediador</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba el Telefono" name="telefono" required
             pattern="[0-9]+" title="No se permiten Letras" maxlength="8">

             <label><b>Dirección</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba la dirección" name="direccion" required>

             <label><b>Municipio</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba la dirección" name="direccion" required
             pattern="[A-Za-z- A-Za]+" title="No se permiten Numeros">

             <label><b>Sexo</b></label>
             <select name="sexo" id="" class="w3-input w3-border">
               <option value="Hombre"><b>Hombre</b></option>
               <option value="Mujer"><b>Mujer</b></option>
             </select>
             <label><b>Epecialidad</b></label>
             <select name="especialidad" id="" class="w3-input w3-border">
               <?php
                require_once "../Clases/BD.php";
                $conn = new baseD();
                $consulta = $conn->busqueda("especialidad");

                foreach ($consulta as $datos) {
                  $id = $datos['idEspecialidad'];
                  $nombre = $datos['nombreEspecialidad'];
                ?>
                 <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
               <?php
                }
                ?>

             </select>
             <label><b>NIS</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba el número de DUI" name="dui" required
             pattern="[0-9]+" title="No se permiten Letras" maxlength="7">

             <label><b>NIC</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba el número de NIT" name="nit" required
             pattern="[0-9]+" title="No se permiten Letras" maxlength="7">

             <label><b>UNICOM</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba el número de NIT" name="nit" required
             pattern="[0-9]+" title="No se permiten Letras" maxlength="4">

             <label><b>Fecha de Ingreso</b></label>
             <input class="w3-input w3-border" type="date" placeholder="Escriba la Fecha de Nacimiento" name="fecha" max="2002-01-01" required>
             <input type="submit" class="w3-button w3-block w3-green w3-section w3-padding" value="Registrar" name="send_insert">
           </div>
         </form>
         <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
           <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
         </div>
       </div>
     </div>

     <!--  Modal 3 -->
     <div id="id03" class="w3-modal">
       <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:700px">
         <div class="w3-center"><br>
           <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
           <p>Mantenimiento de Contribuyentes</p>
         </div>
         <form class="w3-container" method="post" action="mant_docentes.php">
           <div class="w3-section">
             <table class="table">
               <thead class="thead-dark">
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">Nombre</th>
                   <th scope="col">Apellido</th>
                   <th scope="col">Especialidad</th>
                 </tr>
               </thead>
               <tbody>

                 <?php
                  $conn = new baseD();
                  $consulta_docentes = $conn->busquedaFree("SELECT
                `docente`.`idDocente`,
                `docente`.`nombres`,
                `docente`.`apellidos`,
                `docente`.`fechaNacimiento`,
                `docente`.`sexo`,
                `docente`.`dui`,
                `docente`.`nit`,
                `docente`.`direccion`,
                `especialidad`.`nombreEspecialidad`
              FROM
                `dawproyecto`.`docente`
                INNER JOIN `dawproyecto`.`especialidad`
                  ON (
                    `docente`.`idEspecialidad` = `especialidad`.`idEspecialidad`
                  );
              ");

                  foreach ($consulta_docentes as $datos) {
                    $id_del = $datos['idDocente'];
                    $nombre = $datos['nombres'];
                    $apellidos = $datos['apellidos'];
                    $especialidad = $datos['nombreEspecialidad'];
                  ?>
                   <tr>
                     <td><input type='radio' value='<?php echo $id_del; ?>' name='id_us' required></td>
                     <td> <?php echo $nombre; ?></td>
                     <td><?php echo $apellidos; ?></td>
                     <td><?php echo $especialidad; ?></td>
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
               <th scope="col">Fecha de Nacimiento</th>
               <th scope="col">Sexo</th>
               <th scope="col">Dui</th>
               <th scope="col">Nit</th>
               <th scope="col">Dirección</th>
               <th scope="col">Especialidad</th>
             </tr>
           <tbody>

             <?php
              if (isset($_POST['send_busqueda'])) {
                $busqueda = $_POST['busqueda'];
                if (strpos($busqueda, '-')) {
                  $consulta = $conn->busquedaFree("SELECT
                              `docente`.`idDocente`,
                              `docente`.`nombres`,
                              `docente`.`apellidos`,
                              `docente`.`fechaNacimiento`,
                              `docente`.`sexo`,
                              `docente`.`dui`,
                              `docente`.`nit`,
                              `docente`.`direccion`,
                              `especialidad`.`nombreEspecialidad`
                            FROM
                              `dawproyecto`.`docente`
                              INNER JOIN `dawproyecto`.`especialidad`
                                ON (
                                  `docente`.`idEspecialidad` = `especialidad`.`idEspecialidad`
                                )
                               WHERE dui = '$busqueda'
              ");
                  foreach ($consulta as $datos) {
                    $id = $datos['idDocente'];
                    $nombre = $datos["nombres"];
                    $apellido = $datos['apellidos'];
                    $fecha = $datos['fechaNacimiento'];
                    $sexo = $datos['sexo'];
                    $dui = $datos['dui'];
                    $nit = $datos['nit'];
                    $direccion = $datos['direccion'];
                    $especialidad = $datos['nombreEspecialidad'];
                    echo " <tr>
                <td>$nombre</td>
                <td>$apellido</td>
                <td>$fecha</td>
                <td>$sexo</td>
                <td>$dui</td>
                <td>$nit</td>
                <td>$direccion</td>
                <td>$especialidad</td>
                </tr>";
                  }
                } else {
                  $consulta = $conn->busquedaFree("SELECT
                              `docente`.`idDocente`,
                              `docente`.`nombres`,
                              `docente`.`apellidos`,
                              `docente`.`fechaNacimiento`,
                              `docente`.`sexo`,
                              `docente`.`dui`,
                              `docente`.`nit`,
                              `docente`.`direccion`,
                              `especialidad`.`nombreEspecialidad`
                            FROM
                              `dawproyecto`.`docente`
                              INNER JOIN `dawproyecto`.`especialidad`
                                ON (
                                  `docente`.`idEspecialidad` = `especialidad`.`idEspecialidad`
                                )
                               WHERE nombres  LIKE '%$busqueda%'");
                  foreach ($consulta as $datos) {
                    $id = $datos['idDocente'];
                    $nombre = $datos["nombres"];
                    $apellido = $datos['apellidos'];
                    $fecha = $datos['fechaNacimiento'];
                    $sexo = $datos['sexo'];
                    $dui = $datos['dui'];
                    $nit = $datos['nit'];
                    $direccion = $datos['direccion'];
                    $especialidad = $datos['nombreEspecialidad'];
                    echo " <tr>
                <td>$nombre</td>
                <td>$apellido</td>
                <td>$fecha</td>
                <td>$sexo</td>
                <td>$dui</td>
                <td>$nit</td>
                <td>$direccion</td>
                <td>$especialidad</td>
                </tr>";
                  }
                }
              } else {
                $consulta = $conn->busquedaFree("SELECT
                `docente`.`idDocente`,
                `docente`.`nombres`,
                `docente`.`apellidos`,
                `docente`.`fechaNacimiento`,
                `docente`.`sexo`,
                `docente`.`dui`,
                `docente`.`nit`,
                `docente`.`direccion`,
                `especialidad`.`nombreEspecialidad`
              FROM
                `dawproyecto`.`docente`
                INNER JOIN `dawproyecto`.`especialidad`
                  ON (
                    `docente`.`idEspecialidad` = `especialidad`.`idEspecialidad`
                  );
              ");
                foreach ($consulta as $datos) {
                  $id = $datos['idDocente'];
                  $nombre = $datos["nombres"];
                  $apellido = $datos['apellidos'];
                  $fecha = $datos['fechaNacimiento'];
                  $sexo = $datos['sexo'];
                  $dui = $datos['dui'];
                  $nit = $datos['nit'];
                  $direccion = $datos['direccion'];
                  $especialidad = $datos['nombreEspecialidad'];
                  echo " <tr>
                <td>$nombre</td>
                <td>$apellido</td>
                <td>$fecha</td>
                <td>$sexo</td>
                <td>$dui</td>
                <td>$nit</td>
                <td>$direccion</td>
                <td>$especialidad</td>
                </tr>";
                }
              }

              ?>
           </tbody>
       </form>
     </div>
 </body>

 </html>