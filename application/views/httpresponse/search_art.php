        <table style="width: 500px; margin: 0 auto;" class="table">
            <tr>
                <th  style="width: 20px" >Id</th>
                <th  style="width: 50px" >Codigo</th>
                <th>Nombre</th>
                <th style="width: 50px" >Opcion</th>
            </tr>
                        
            
            <? foreach($articulos as $art): ?>
            <tr> 
               <td><?=$art['id_art']?></td>
               <td><?=$art['codigo_art']?></td>
               <td><?=$art['nombre_art']?></td>
               <td><a href="<?=base_url().$url.$art['id_art']?>"><?=$label?></a></td>
            </tr>                             
            <? endforeach; ?>    
            
        </table>

