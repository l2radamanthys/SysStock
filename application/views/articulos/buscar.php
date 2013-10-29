    <script type="text/javascript">
    //ejecutar al inicio
    $(function() {
        $('input[type=submit]').button();   
    });
    </script>

<section class="one-section">
    <h1>Buscar Articulos</h1>
    
    <div style="margin: 0 auto; width: 500px;" >
        <select name="field">
            <option value="codigo">Codigo</option>
            <option value="nombre" selected>Nombre</option>
        </select>
        <input type="text" name="query" size="35"/>
        <input type="submit" value="Buscar" />
        </form>        
    </div>
    
    <br />
    <table class="table" style="width: 800px; margin: 0 auto;">
    <tr>
        <th>Id</th>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>P. Costo</th>
        <th>P. Lista</th>
        <th>P. Venta</th>
        <th>Stock</th>
        <th>Opciones</th>
    </tr>    
    
    <? foreach ($articulos as $art): ?>
        <tr>
            <td style="width: 20px" ><?=$art['id_art'];?></td>
            <td style="width: 50px"><?=$art['codigo_art'];?></td>
            <td style="text-align: left;"><?=$art['nombre_art'];?></td>
            <td class="text-der"  style="width: 65px" ><?=number_format($art['precio_costo_art'],2);?></td>
            <td class="text-der"  style="width: 65px" ><?=number_format($art['precio_venta_lista_art'],2);?></td>
            <td class="text-der"  style="width: 65px" ><?=number_format($art['precio_venta_art'],2);?></td>
            <td  style="width: 70px"><?=$art['stock_art'];?></td>
 
            
            <td  style="width: 70px"><a href="<?=base_url();?>articulos/show/<?=$art['id_art'];?>">Mostrar</a></td>
        </tr>
    <? endforeach; ?>    
    </table>    
    
</section>
