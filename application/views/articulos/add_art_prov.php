
<script type="text/javascript">
    $(function() {
        $('#not_precio_art').buttonset()
    });  
</script>

<section class="one-section">
    
    <h1>Registrar Articulo Proveedor</h1>
    
    <div class="window" style="width: 300px; margin: 0 auto;">
    <div class="win-cont">    
    <?=form_open('articulos/add_proveedor_article')?>    
        <p>
        <label>Nombre Articulo:</label>
        <?=$art['nombre_art']?>    
        </p>
        
        <p>
        <label>Proveedor:</label>
        <?=$pers['nombre_pers']?>, <?=$pers['apellido_pers']?>     
        </p>
        
        <p>
        <label>Empresa:</label>
        <?=$pers['razon_social_emp']?>
        </p>
        
        
        <p>
        <label>Precio de Venta Proveedor:</label>
        <input type="text" name="precio_venta_lista_art" id="precio_venta_civa_art" size="8" value="0.00" class="text-der"/>    
        </p>   
        
        <p>
        <label>Recordar Actualizar Precios:</label>
         <div id="not_precio_art">
            <input type="radio" name="not_precio_art" value="1" id="not_precio_art0" checked="checked"/><label for="not_precio_art0" style="font-size: 10pt;">Si</label>
            <input type="radio" name="not_precio_art" value="0" id="not_precio_art1"/><label for="not_precio_art1" style="font-size: 10pt;">No</label>
         </div>   
        </p>
        
    </form>  
    </div>
    </div> 
</section>