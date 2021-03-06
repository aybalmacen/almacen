<?php
    if(isset($_SESSION["id_sesion"])){
        if((    $_SESSION["id_sesion"]=="administrador" || $_SESSION["id_sesion"]=="gerente"    ||
                $_SESSION["id_sesion"]=="cocina"        || $_SESSION["id_sesion"]=="barra"      ||
                $_SESSION["id_sesion"]=="bodega"
                )     &&  $_SESSION["ruta"]==SUCURSAL){
?>

<html>
	<head>
		<title> Pedidos </title>
		<meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'/>
			<link rel="stylesheet" href="../Public/bootstrap/css/bootstrap.min.css"/>
			<link rel="stylesheet" href="../Public/bootstrap/bootstrap_3.3.6/bootstrap.min.css">
			<link href="../Public/open-iconic-master/font/css/open-iconic.css" rel="stylesheet">
	</head>

	<body>
		<header>
			<div align="center"><h1>Pedidos por Estatus</h1></div>
    <?php
      if(!empty($select[0]->estado)){
        echo "<h2 align='center'> Lista de pedidos con el estatus:  " . $select[0]->estado . "</h2><br>";
      }
    ?>
		</header>
        <section>
						<div class="container small">
							<div class="table-responsive">
								<?php
								   if(!empty($select)){
								?>
								<table class="table">
									<thead class="thead-dark">
										<tr>
											<th>Pedido</th>
                                            <th>Fecha pedido</th>
											<!-- <th>Fecha autoriza</th> -->
											<th>Hora</th>
											<th>Detalles</th>

											<th>Autoriza</th>
											<th>Solicita</th>
											<!-- <th>Estado</th> -->
											<th>Costo Total</th>
											<!-- <th colspan=2 >Acciones</th> -->
											<!-- <th>Unidad Medida</th> -->
											<!-- <th>Observaciones</th> -->
										</tr>
									</thead>
									<tbody>
												<?php
												    foreach ($select as $order) {
												?>
														<tr>
															<td><?php echo $order->id_pedido; ?></td>
                                                            <td><?php echo $order->fecha_pedido; ?></td>
															<!-- <td><?php //echo $order->fecha_autoriza_cancela; ?></td> -->
															<td><?php echo $order->hora; ?></td>
															<td><a href="pedido_controller.php?action=order_almacen&id_pedido=<?php echo $order->id_pedido ?>">Detalles</a> </td>
															<td><?php echo $order->autoriza; ?></td>
															<td><?php echo $order->solicita; ?></td>
															<!-- <td><?php //echo $order->estado; ?></td> -->
															<td><?php echo $order->costo_total; ?></td>
															<!-- <td><a href="Controllers/pedido_controller.php?action=update&id_pedido=<?php// echo $pedido->id_pedido ?>">Actualizar</a> </td> -->
															<!-- <td><a href="Controllers/pedido_controller.php?action=delete&id_pedido=<?php// echo $pedido->id_pedido ?>">Eliminar</a> </td> -->
															<!-- <td><?php //echo $order->unidad_medida; ?></td> -->
															<!-- <td><?php //echo $order->observaciones; ?></td> -->
														</tr>
												<?php
                                                    }//end foreach
                                                ?>
									</tbody>
								</table>
                                <?php
									}else{
											echo "<h2 align='center'>No hay pedidos a mostrar</h2>";
									}
								?>
							</div>
						</div>
						<div align="center">
							<a href="javascript:window.history.back();" class="btn btn-primary">&laquo; Volver atrás</a><br><br>
							<!-- <a href="../?controller=pedido&action=ver_pedido_cancelado_todos" class="btn btn-primary">Regresar</a> -->
						</div>
		</section>
	</body>
<html>
<?php
		}else{
			//Inclur una pagina para redireccionar a index
			header('Location: ../Views/sesion/no_sesion.php');
		}
	}
?>
