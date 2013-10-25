
    <script type="text/javascript">
    //ejecutar al inicio
    $(function() {
        //$('li a').button();   
    });
    </script>

<section class="section">
    <h1>Datos Personales</h1>
    
    
    <div class="window" style="width: 500px; margin: 0 auto;">
    <div class="win-cont">    
    <table style="width: 400px; margin: 0 auto;" class="info">
        <tr>        
            <td><span class="label">Apellido, Nombre:</span></td> 
            <td><?=$pers['apellido_pers']?>, <?=$pers['nombre_pers']?></td>
        </tr>     
    
        <tr>        
            <td><span class="label">Documento:</span></td> 
            <td><?=$pers['tipo_dni_pers']?> - <?=$pers['nro_dni_pers']?></td>
        </tr>
        
        <tr>        
            <td><span class="label">Empresa:</span></td> 
            <td><a href="<?=base_url();?>"><?=$pers['razon_social_emp']?></a></td>
        </tr> 
        
        <tr>        
            <td><span class="label">Telefono:</span></td> 
            <td><?=$pers['telefono_pers']?></td>
        </tr>   
        
        <tr>        
            <td><span class="label">Celular:</span></td> 
            <td><?=$pers['celular_pers']?></td>
        </tr>      
        
        <tr>        
            <td><span class="label">Email:</span></td> 
            <td><?=$pers['email_pers']?></td>
        </tr> 
        
        <tr>        
            <td><span class="label">Direccion:</span></td> 
            <td><?=$pers['direccion_pers']?></td>
        </tr> 
        
        <tr>
            <td><span class="label">Provincia:</span></td> 
            <td><?=$pers['prov']?></td>
        </tr>    
        <tr>
            <td><span class="label">Ciudad:</span></td> 
            <td><?=$pers['ciud']?></td>
        </tr>
        <tr>
            <td><span class="label">Zona:</span></td> 
            <td><?=$pers['zona']?></td>
        </tr>
        <tr>
            <td><span class="label">Observaciones:</span></td>
            <td><?=$pers['observaciones_pers']?></td>
        </tr>
          
    </table>
    </div>
    </div>
    
    <br />
    <br />
    <a href="<?=base_url()?>personas/search/cliente/" style="font-size: 10pt;">Volver Atras</a>
    
</section>

<aside class="aside">
    
    <ul class="submenu">
        <li><h3>Cliente</h3></li>
        <li><a href="">Modficar Datos</a></li>        
        <li><h3>Presupuestos</h3></li>
        <li><a href="">Nuevo Presupuesto</a></li>
        <li><a href="">Presupuestos Solicitados</a></li>
        <li><h3>Pedidos</h3></li>
        <li><a href="">Nuevo Pedido</a></li>
        <li><a href="">Pedidos Pendientes</a></li>
        <li><h3>Remitos</h3></li>
        <li><a href="">Nuevo Remito</a></li>
    </ul>
</aside>