
<script type="text/javascript">
    $(function() {
        
        $('#stock_art').spinner({min: 0});
        $('#stock_min_art').spinner({min: 0});
        $('#stock_max_art').spinner({min: 0});
        
        $('#not_stock_art').buttonset()        
        
        $('input[type=submit]').button();
        $('input[type=reset]').button();
        updCitiesForProv();
        updZonesForCity();    
    });  
</script>

<section class="one-section">
    <h1><?=$title;?></h1>
    
    <div class="window" style="width: 480px; margin: 0 auto;">
        <div class="win-cont">
        <?=form_open('/articulos/create/');?>  
        
            <p>
            <label>Codigo Articulo:</label>
            <input type="text" name="codigo_art" id="codigo_art" size="20" maxlength="20"/>    
            </p>

            <p>
            <label>Nombre Articulo:</label>
            <input type="text" name="nombre_art" id="nombre_art" size="45" maxlength="45"/>    
            </p>
            

            
            <p style="float: left; width: 160px;">
            <label>Precio Costo:</label>
            <input type="text" name="precio_costo_art" id="precio_costo_art" size="10" maxlength="21" value="0.00"/>    
            </p>                        
            
            <p style="float: left; width: 160px;">
            <label>Precio de Venta:</label>
            <input type="text" name="precio_venta_art" id="precio_venta_siva_art" size="10" maxlength="21" value="0.00"/>    
            </p>            
            
            <p>
            <label>Precio de Lista:</label>
            <input type="text" name="precio_venta_lista_art" id="precio_venta_civa_art" size="10" class="text" value="0.00"/>    
            </p>   
            <div style="clear: both;"></div>
                     
            <p style="float: left; width: 160px;">
            <label>Stock Actual:</label>
            <input type="text" name="stock_art" id="stock_art" size="5" maxlength="10" value="0" />    
            </p>   
            
            <p style="float: left; width: 160px;">
            <label>Stock Minimo:</label>
            <input type="text" name="stock_min_art" id="stock_min_art" size="5" maxlength="10" value="0" />    
            </p>   
            
            <p>
            <label>Stock Maximo:</label>
            <input type="text" name="stock_max_art" id="stock_max_art" size="5" maxlength="10" value="0" />    
            </p>   
            <div style="clear: both;"></div>
            
            <p>
            <label>Notificar Stock Bajo y Sobre Stock:</label>
            <div id="not_stock_art">
                <input type="radio" name="not_stock_art" value="1" id="not_stock_art0" checked="checked"/><label for="not_stock_art0" style="font-size: 10pt;">Si</label>
                <input type="radio" name="not_stock_art" value="0" id="not_stock_art1"/><label for="not_stock_art1" style="font-size: 10pt;">No</label>
            </div>
            </p>                                                   
            <p>
            <label>Detalle Articulo:</label>
            <textarea name="detalle_art" id="detalle_art" rows="4" cols="50"></textarea    
            </p>
            
            <br />
            <p style="text-align: center">
                <input type="Submit" value="Registrar" />
                <input type="Reset" value="Limpiar" />
            </p>
        </form>
        </div>
    </div>
</section>