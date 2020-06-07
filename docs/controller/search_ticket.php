<?php
    include '../../config/conexionBD.php';

    $key = isset($_POST['i_filter']) ? trim($_POST['i_filter']) : null;

    $partes = preg_split("/[\s,]+/", $key);

    if (sizeof($partes) >= 2) {
        $cedula = $partes[0];
        $placa = $partes[1];
    } else {
        $cedula = "";
        $placa = "";   
    }
    
    $sql = "SELECT *
            FROM clientes t1
                INNER JOIN vehiculos t2 ON t1.cli_codigo = t2.cli_codigo 
                INNER JOIN tickets t3   ON t2.veh_codigo = t3.veh_codigo
            WHERE
                t1.cli_cedula = '$cedula' AND
                t2.veh_placa = '$placa'";

    $table_head = " <tr>
                        <th colspan='2'>Información acerca del Ticket.</th>
                    </tr> ";

    $resultUs = $conn->query($sql);

    echo $table_head;

    if ($resultUs) {

        if ($resultUs->num_rows > 0) {

            while ($rowUs = $resultUs->fetch_assoc()) {
                echo "<tr>";
                echo "<th class='th_v'>Número de Ticket:</th>";
                echo " <td >" . $rowUs["tic_numero"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Fecha/Hora de Ingreso:</th>";
                echo " <td >". $rowUs["tic_fecha_ingreso"] ." ". $rowUs["tic_hora_ingreso"] ."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Fecha/Hora de Salida:</th>";
                echo " <td >". $rowUs["tic_fecha_salida"] ." ". $rowUs["tic_hora_salida"] ."</td>";
                echo "</tr>";


                echo "<tr>
                        <th colspan='2'>Información acerca del Vehículo.</th>
                    </tr>";

                echo "<tr>";
                echo "<th class='th_v'>Placa:</th>";
                echo " <td >" . $rowUs["veh_placa"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Marca:</th>";
                echo " <td >" . $rowUs['veh_marca'] ."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Modelo:</th>";
                echo " <td >" . $rowUs['veh_modelo'] . "</td>";
                echo "</tr>";
                

                echo "<tr>
                        <th colspan='2'>Información acerca del Cliente.</th>
                    </tr>";

                echo "<tr>";
                echo "<th class='th_v'>Cédula:</th>";
                echo " <td >" . $rowUs["cli_cedula"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Nombres:</th>";
                echo " <td >" . $rowUs['cli_nombre'] ."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Dirección:</th>";
                echo " <td >" . $rowUs['cli_direccion'] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Teléfono:</th>";
                echo " <td >" . $rowUs['cli_telefono'] . "</td>";
                echo "</tr>";
                echo "<tr>";
            }
        
        } else {
            echo "<tr>";
            echo "<td colspan='1'> No existen tickets con ese cliente y vehiculo.</td>";
        }

    } else {
        echo " <tr><td colspan='1'>Error: " . mysqli_error($conn) . "</td></tr>";
        echo "</tr>";
    }
    
    $conn->close();
?>