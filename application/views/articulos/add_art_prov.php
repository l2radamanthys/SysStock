
<script type="text/javascript">
    $(function() {
        $('#not_precio_art').buttonset();
        $('#submit').button();
        $('#reset').button();
    });  
</script>

<section class="one-section">
    
    <h1>Registrar Articulo Proveedor</h1>
    
    <div class="window" style="width: 450px; margin: 0 auto;">
    <div class="win-cont">    
    <form action="<?=base_url();?>articulos/add_proveedor_article/<?=$pers['id_pers']?>/<?=$art['id_art']?>" method="post">       
        <p style="float: left; width: 160px;">
        <label>Codigo Articulo:</label>
        <?=$art['codigo_art']?>    
        </p>
        
        <p>
        <label>Nombre Articulo:</label>
        <?=$art['nombre_art']?>    
        </p>
        <div style="clear: both;"></div> 
        
        <p>
        <label>Nombre Proveedor:</label>
        <?=$pers['nombre_pers']?>, <?=$pers['apellido_pers']?>     
        </p>
        
        <p>
        <label>Empresa:</label>
        <?=$pers['razon_social_emp']?>
        </p>
        
        
        <p style="float: left; width: 200px;">
        <label>Precio de Venta Proveedor:</label>
        <input type="text" name="precio_art" id="precio_art" size="8" value="<?=set_value('precio_art',number_format($art['precio_costo_art'], 2))?>" class="text-der"/>    
        </p>   
        
        <p>
        <label>Recordar Actualizar Precios:</label>
         <div id="not_precio_art">
            <input type="radio" name="not_precio_art" value="1" id="not_precio_art0" checked="checked"/><label for="not_precio_art0" style="font-size: 10pt;">Si</label>
            <input type="radio" name="not_precio_art" value="0" id="not_precio_art1"/><label for="not_precio_art1" style="font-size: 10pt;">No</label>
         </div>   
        </p>
        <div style="clear: both;"></div> 
        
        <br />
        <p style="text-align: center">
            <input type="submit" value="Registrar" id="submit" />
            <input type="reset" value="Limpiar" id="reset" />            
        </p>        
    </form>  
    </div>
    </div> 
</section>