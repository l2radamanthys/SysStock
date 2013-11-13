<section class="section">
    <h1><?=$title;?></h1>
    <h3>Proveedor: <?=$prov['nombre_pers']." ".$prov['apellido_pers']?></h3>
    
    
    <table class="table">
        <tr>
            <th style="width: 20px">Id</th>
            <th style="width: 50px">Codigo</th>
            <th style="width: 200px">Nombre</th>
            <th style="width: 50px">Precio Compra</th>
            <th style="width: 50px">Precio Proveedor</th>
            <th style="width: 50px">Ultima Actualizacion</th>
            <th style="width: 50px">Modificar Precio</th>
        </tr>
        
        <? foreach ($articulos as $art): ?>
        <tr>
            <td><?=$art['id_art']?></td>
            <td><?=$art['codigo_art']?></td>
            <td><?=$art['nombre_art']?></td>
            
            <td><?=number_format($art['precio_costo_art'], 2)?></td>
            <td><?=number_format($art['precio_artprov'], 2)?></td>
            <td><?=date('d/m/Y', strtotime($art['ult_fecha_act_artprov']))?></td>
            <td><a href="">Modificar</a></td>
        </tr>        
        <? endforeach; ?>
        
    </table>
    
    
    
    
</section>


<aside class="aside">
    
</aside>