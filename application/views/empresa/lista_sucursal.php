<section class="one-section">    
     
    <h1> Sucursales</h1>
            
    <br />
    <table class="table" style="width: 800px; margin: 0 auto;">
        <tr>
            <th>Nombre </th>
            <th>Direccion </th>
            <th>Telefono</th>
            <th> Detalles</th>
        </tr>
    <?  if((isset($data)))
        {            
        foreach ($data['sucursales'] as $emp): ?>            
        <tr>
            <td><?=$emp['nombre_suc']?></td>
            <td><?=$emp['direccion_suc']?></td>            
            <td><?=$emp['telefono_a_suc']?> </td>
            <td><a href="">Mostrar</a></td>                        
        </tr>
    <? endforeach; }?>    
    </table>
 
</section>