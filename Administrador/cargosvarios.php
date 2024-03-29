<!DOCTYPE html>
 <html>

 <head>
   <title>Cargos Varios</title>
 </head>

 <body>
   <div style="margin-bottom: 5px; margin-left:16px;">
     <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-success">Agregar</button>
     <button onclick="document.getElementById('id03').style.display='block'" class="btn btn-primary" >Mantenimiento</button>
     <a target="blank" href="../pdf/cursospdf.php" class="btn btn-danger">Reportes</a>
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
           <p>Cargos Varios</p>
         </div>
         <form class="w3-container" method="post" action="mant_cargosvarios.php">
           <div class="w3-section">
           <label><b>Cargo Vario</b></label>
             <input class="w3-input w3-border " type="text" placeholder="Escriba el nombre del Curso" name="nombre" required
             pattern="[A-Za-z A-Za-z]+" title="No se permiten Numeros">

             <label><b>Estado</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Ejemplo: SA OO1" name="identificador" required
             pattern="[A-Za-z]+" title="No se permiten Numeros">

             <label><b>F Inic</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba el nombre del responsable" name="responsable" required
             pattern="[0-9\/]+" title="No se permiten Letras" maxlength="10">

             <label><b>F Fact</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba el nombre del responsable" name="responsable" required
             pattern="[0-9\/]+" title="No se permiten Letras" maxlength="10">

             <label><b>F Cobro</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba el nombre del responsable" name="responsable" required
             pattern="[0-9\/]+" title="No se permiten Letras" maxlength="10">

             <label><b>F Importe</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba el nombre del responsable" name="responsable" required
             pattern="[0-9\ $.]+" title="No se permiten Letras" maxlength="13">

             <label><b>Alcaldia</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba el nombre del responsable" name="responsable" required
             pattern="[A-Za-z A-Za-z]+" title="No se permiten Numeros">

             <label><b>Cuenta</b></label>
             <input class="w3-input w3-border" type="text" placeholder="Escriba el nombre del responsable" name="responsable" required
             pattern="[0-9]+" title="No se permiten Letras" maxlength="13">


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
           <p>Mantenimiento de Cargos Varios</p>
         </div>
         <form class="w3-container" method="post" action="mant_cargosvarios.php">
           <div class="w3-section">
             <table class="table">
               <thead class="thead-dark">
                 <tr>
                 <th scope="col">#</th>
                   <th scope="col">Nombre</th>
                   <th scope="col">Identificador</th>
                   <th scope="col">Responsable</th>
                 </tr>
               </thead>
               <tbody>

               <?php
                 require_once "../Clases/BD.php";
                  $conn = new baseD();
                  $consulta_cursos = $conn->busquedaFree("SELECT
                `curso`.`idCurso`,
                `curso`.`nombreCurso`,
                `curso`.`identificador`,
                `curso`.`responsable`
              FROM
                `dawproyecto`.`curso`
              ");

                  foreach ($consulta_cursos as $datos) {
                    $id_del = $datos['idCurso'];
                    $nombre = $datos['nombreCurso'];
                    $identificador = $datos['identificador'];
                    $responsable = $datos['responsable'];
                  ?>
                   <tr>
                     <td><input type='radio' value='<?php echo $id_del; ?>' name='id_us' required></td>
                     <td> <?php echo $nombre; ?></td>
                     <td><?php echo $identificador; ?></td>
                     <td><?php echo $responsable; ?></td>
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
             <th scope="col">Nombre del Curso</th>
               <th scope="col">identificador</th>
               <th scope="col">Responsable</th>
             </tr>
           </thead>
           <tbody>

             <?php
              if (isset($_POST['send_busqueda'])) {
                $busqueda = $_POST['busqueda'];
                if($busqueda != "") {
                  $consulta = $conn->busquedaFree("SELECT

                `curso`.`idCurso`,
                `curso`.`nombreCurso`,
                `curso`.`identificador`,
                `curso`.`responsable`
            FROM
              `dawproyecto`.`curso`
              WHERE nombreCurso like '%$busqueda%' OR responsable LIKE '%$busqueda%'");
               foreach ($consulta as $datos) {
                $id = $datos['idCurso'];
                $nombre = $datos['nombreCurso'];
                $identificador = $datos['identificador'];
                $responsable = $datos['responsable'];
                echo " <tr>
                <td>$nombre</td>
                <td>$identificador</td>
                <td>$responsable</td>
        </tr>";
              }

                
              }
            }else{
              $consulta = $conn->busquedaFree("SELECT

                `curso`.`idCurso`,
                `curso`.`nombreCurso`,
                `curso`.`identificador`,
                `curso`.`responsable`
            FROM
              `dawproyecto`.`curso`");
               foreach ($consulta as $datos) {
                $id = $datos['idCurso'];
                $nombre = $datos['nombreCurso'];
                $identificador = $datos['identificador'];
                $responsable = $datos['responsable'];
                echo " <tr>
                <td>$nombre</td>
                <td>$identificador</td>
                <td>$responsable</td>
        </tr>";
              }
            }
              ?>
           </tbody>
       </form>
     </div>
 </body>
 </html>
            