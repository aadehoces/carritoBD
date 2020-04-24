<?php
//añadimos la cabecera 
 include("Templates/cabecera.php")
?>
<h3>Lista del carrito</h3>
<?php if(!empty($_COOKIE['CARRITO'])){?>
<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th witdth="40%">Descripción</th>
            <th witdth="15%" class="text-center">Cantidad </th>
            <th witdth="20%" class="text-center">Precio</th>
            <th witdth="20%" class="text-center">Total</th>
            <th witdth="5%">--</th>
        </tr>
        <?php $total=0;?>
        <?php foreach($_COOKIE['CARRITO'] as $indice=>$producto){?>
        <tr>
            <td witdth="40%"><?php echo $producto['NOMBRE']; ?></td>
            <td witdth="15%" class="text-center"><?php echo $producto['CANTIDAD']; ?> </td>
            <td witdth="20%" class="text-center"><?php echo $producto['PRECIO']; ?></td>
            <td witdth="20%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2) ; ?></td>
            <td witdth="5%">
                <form action="" method="post">
                
                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                    <button class="btn btn-danger" type="submit" name="btnaccion" value="Eliminar">Eliminar</button>
                
                </form>
            </td>
        </tr>
        <?php } ?>
        <?php } ?>
<?php
//añadimos el pie de página
 include("Templates/Pie.php")
?>