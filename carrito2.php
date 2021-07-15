
    
                <div class="col-xs-12">
                    <?php
                        require_once "library/configServer.php";
                        require_once "library/consulSQL.php";
                        if(!empty($_SESSION['carro'])){
                            $suma = 0;
                            $sumaA = 0;
                            echo '<table class="table table-bordered table-hover"><thead><tr class="bg-success"><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th><th>Acciones</th></tr></thead>';
                            foreach($_SESSION['carro'] as $codeProd){
                                $consulta=ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='".$codeProd['producto']."'");
                                while($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                                    $pref=number_format(($fila['Precio']-($fila['Precio']*($fila['Descuento']/100))), 2, '.', '');
                                        echo "<tbody>
                                            <tr>
                                                <td>".$fila['NombreProd']."</td>
                                                <td> ".$pref."</td>
                                                <td> ".$codeProd['cantidad']."</td>
                                                <td> ".$pref*$codeProd['cantidad']."</td>
                                               

                                            </tr>
                                        </tbody>";
                                        $suma += $pref*$codeProd['cantidad'];
                                        $sumaA += $codeProd['cantidad'];
                                }
                            };
                        }
                        echo '<tr class="bg-danger"><td colspan="2">Total</td><td><strong>'.$sumaA.'</strong></td><td><strong>$'.number_format($suma,2).'</strong></td></tr></table><div class="ResForm"></div>';
                    ?>
                </div>
         