<?php
//añadimos la cabecera 
 include("Templates/cabecera.php")
?>
<h3>Lista del carrito</h3>
<?php
    if (isset($_SESSION)) {
        if(!empty($_SESSION['CARRITO'])){?>
            

<?php        }else{
            echo "No hay prductos en el carrito";
        }
    }
?>
<?php
//añadimos el pie de página
 include("Templates/Pie.php")
?>