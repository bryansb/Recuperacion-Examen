<?php
    include '../../config/conexionBD.php';

    $cedula = trim($_POST['i_filter']);
        
    $sql = "SELECT * FROM clientes WHERE cli_cedula LIKE '$cedula';";

    $table_head = " <tr>
                        <th colspan='2'>Información</th>
                    </tr> ";

    $resultUs = $conn->query($sql);

    echo $table_head;

    if ($resultUs) {

        if ($resultUs->num_rows > 0) {

            while ($rowUs = $resultUs->fetch_assoc()) {
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
            echo "<td colspan='1'> No existen usuarios registrados con los criterios de busqueda.</td>";
        }

    } else {
        echo " <tr><td colspan='1'>Error: " . mysqli_error($conn) . "</td></tr>";
        echo "</tr>";
    }
    
    $conn->close();
?>