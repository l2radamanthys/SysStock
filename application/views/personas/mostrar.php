
    <script type="text/javascript">
    //ejecutar al inicio
    $(function() {
        //$('li a').button();   
        
        $("#accordion-menu").accordion();
    });
    
    </script>

<section class="section">
    <h1>Datos Personales</h1>
    
    
    <div class="window" style="width: 500px; margin: 0 auto;">
    <div class="win-cont">    
    <table style="width: 400px; margin: 0 auto;" class="info">
        <tr>        
            <td class="label" style="width: 130px;">Apellido, Nombre:</td> 
            <td><?=$pers['apellido_pers']?>, <?=$pers['nombre_pers']?></td>
        </tr>     
    
        <tr>        
            <td class="label">Documento:</td> 
            <td><?=$pers['tipo_dni_pers']?> - <?=$pers['nro_dni_pers']?></td>
        </tr>
        
        <tr>        
            <td class="label">Empresa:</td> 
            <td><a href="<?=base_url();?>"><?=$pers['razon_social_emp']?></a></td>
        </tr> 
        
        <tr>        
            <td class="label">Telefono:</td> 
            <td><?=complete_char($pers['telefono_pers'])?></td>
        </tr>   
        
        <tr>        
            <td class="label">Celular:</td> 
            <td><?=complete_char($pers['celular_pers'])?></td>
        </tr>      
        
        <tr>        
            <td class="label">Email:</td> 
            <td><?=complete_char($pers['email_pers'])?></td>
        </tr> 
        
        <tr>        
            <td class="label">Direccion:</td> 
            <td><?=complete_char($pers['direccion_pers'])?></td>
        </tr> 
        
        <tr>
            <td class="label">Provincia:</td> 
            <td><?=$pers['prov']?></td>
        </tr>    
        <tr>
            <td class="label">Ciudad:</td> 
            <td><?=$pers['ciud']?></td>
        </tr>
        <tr>
            <td class="label">Zona:</td> 
            <td><?=$pers['zona']?></td>
        </tr>
        <tr>
            <td class="label">Observaciones:</td>
            <td><?=$pers['observaciones_pers']?></td>
        </tr>
        
        <tr>
            <td class="label">Es Cliente:</td>
            <td><?=$pers['es_cliente_pers']?></td>
        </tr>
        
        <tr>
            <td class="label">Es Proveedor:</td>
            <td><?=$pers['es_proveedor_pers']?></td>
        </tr>
         
    </table>
    </div>
    </div>
    
    <br />
    <br />
    <a href="<?=base_url()?>personas/search/cliente/">Volver Atras</a>
    
</section>

<aside class="aside">
    <div id="accordion-menu" class="sub-menu">
        <h3>Persona</h3>
        <div>
        <ul class="child-menu">
            <li><a href="">Modficar Datos</a></li>
            <li><a href="<?=base_url();?>personas/habilitar/cliente/<?=$pers['id_pers']?>">Habilitar como Cliente</a></li> 
            <li><a href="<?=base_url();?>personas/habilitar/proveedor/<?=$pers['id_pers']?>">Habilitar como Proveedor</a></li>
        </ul>
        </div>
        
        <h3>Articulos por Proveedor</h3>
        <div>
        <ul class="child-menu">
            <li><a href="">Listado Articulo Proveedor</a></li>
            <li><a href="">Nuevo Articulo Proveedor</a></li>
        </ul>
        </div>   
                     
        <h3>Presupuestos</h3>
        <div>
        <ul class="child-menu">
            <li><a href="">Nuevo Presupuesto</a></li>
            <li><a href="">Presupuestos Solicitados</a></li>
        </ul>
        </div>
        
        <h3>Pedidos</h3>
        <div>
        <ul class="child-menu">
            <li><a href="">Nuevo Pedido Compra</a></li>
            <li><a href="">Nuevo Pedido Venta</a></li>
            <li><a href="">Pedidos Pendientes</a></li>
        </ul>
        </div>    

        <h3>Remitos</h3>
        <div>
        <ul class="child-menu">
            <li><a href="">Nuevo Remito Entrada</a></li>
            <li><a href="">Nuevo Remito Salida</a></li>
            <li><a href="">Remitos Pendiente</a></li>
        </ul>
        </div>
    </div>
</aside>