

<script type="text/javascript">
    //ejecutar al inicio
    $(function() {
        //$('li a').button();   
        
        $("#accordion-menu").accordion();
    });
</script>    

<section class="section">
    <h1>Detalle Articulo</h1>
    
    <div class="window" style="width: 620px; margin: 0 auto;">
    <div class="win-cont">    
    <table style="width: 600px; margin: 0 auto;" class="info">
        <tr>
            <td class="label" style="width: 125px">Id:</td>
            <td><?=$art['id_art']?></td>

            <td class="label" style="width: 125px">Codigo:</td>
            <td><?=$art['codigo_art']?></td>
        </tr>
        
        <tr>
            <td class="label">Nombre :</td>
            <td colspan="4"><?=$art['nombre_art']?></td>
        </tr>
        
        <tr>
            <td class="label">Detalle :</td>
            <td colspan="4"><?=$art['detalle_art']?></td>
        </tr>
        
        <tr>
            <td class="label">Precio Costo :</td>
            <td class="text-der"><?=number_format($art['precio_costo_art'], 2)?> $</td>
            <td></td>
            <td></td>
        </tr>
          
        <tr>
            <td class="label">Precio Venta :</td>
            <td class="text-der"><?=number_format($art['precio_venta_art'], 2)?> $</td>
            <td class="label">Precio Lista :</td>
            <td class="text-der"><?=number_format($art['precio_venta_lista_art'], 2)?> $</td>
        </tr>   
        
       <tr>
            <td class="label">Stock :</td>
            <td><?=$art['stock_art']?></td>
        
            <td class="label">Controlar Stock :</td>
            <td><?= bool_to_str($art['not_stock_art'])?> </td>
                    
        </tr>    
         
        <tr>
            <td class="label">Stock Minimo :</td>
            <td><?=$art['stock_min_art']?></td>
            <td class="label">Stock Maximo :</td>
            <td><?=$art['stock_max_art']?></td>
        </tr>                                                    
    </table>
    </div>
    </div>
    
    <br />
    <h3>Categorias Articulo</h3>
    
    <table class="table" style="width: 400px; margin: 0 auto;">
        <tr>
            <th>Categoria</th>
            <th>SubCategoria</th>
            <th>Opciones</th>
        </tr>
        <? foreach($categorias as $cat): ?>
        <tr>
            <td><?=$cat['nombre_cat'];?></td>
            <td><?=$cat['nombre_scat'];?></td>
            <td><a href="<?=base_url();?>articulos/delete/<?=$cat['fk_id_art'];?>/<?=$cat['id_cat'];?>/<?=$cat['id_scat'];?>">Quitar</a></td>
        </tr>
        <? endforeach; ?>
    </table>
    
    <a href="<?=base_url();?>articulos/search">Atras..</a>
</section>


<aside class="aside">
    <div id="accordion-menu" class="sub-menu">
        <h3>Articulo</h3>
        <div>
        <ul class="child-menu">
            <li><a href="">Modificar</a></li>
            <li><a href="<?=base_url();?>articulos/update_price/<?=$art['id_art']?>">Actualizar Precios</a></li>
            <li><a href="">Informar Perdida Stock</a></li>
        </ul>
        </div>
        
        <h3>Lote Articulo</h3>
        <div>
        <ul class="child-menu">
            <li><a href="">Registrar Ingreso</a></li>
        </ul>
        </div>
    </div>    
</aside>