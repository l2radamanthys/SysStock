
<script type="text/javascript">
    function updSubCatForCat() {
        var value = $("#id_cat option:selected").val();
        var params = { 'id_cat': value };        
        $.ajax({
            data: params,
            url: "<?=base_url();?>http_response/subcat_for_cat",
            type: 'post',
            beforeSend: function () {
                $("#dialog").dialog();
                
            },
            success: function(response) {                
                $("#id_scat").html(response);
                $("#dialog").dialog('close');
            }    
        });        
    }
    
    $(function() {
        $('#stock_art').spinner({min: 0});
        $('#stock_min_art').spinner({min: 0});
        $('#stock_max_art').spinner({min: 0});
        $('#not_stock_art').buttonset()
        $('#not_venc_lote').buttonset()        
        $('input[type=submit]').button();
        $('input[type=reset]').button();
        $("#fecha_venc_lote").datepicker({"dateFormat":"dd/mm/yy"});
        
        updSubCatForCat();   
    });  
</script>

<section class="one-section">
    <h1><?=$title;?></h1>
    
    <div id="dialog" style="display: None;">
        <p>Cargando espere un momento...</p>
    </div>
    
    <div class="window" style="width: 480px; margin: 0 auto;">
        <div class="win-cont">
        <?=form_open('/articulos/create/');?>  
        
            <p>
            <label>Codigo Articulo:</label>
            <input type="text" name="codigo_art" id="codigo_art" size="10" maxlength="20"/>    
            </p>

            <p>
            <label>Nombre Articulo:</label>
            <input type="text" name="nombre_art" id="nombre_art" size="45" maxlength="45"/>    
            </p>

            <p style="float: left; width: 160px;">
            <label>Precio Costo:</label>
            <input type="text" name="precio_costo_art" id="precio_costo_art" size="10" maxlength="21" value="0.00" class="text-der"/>    
            </p>                        
            
            <p style="float: left; width: 160px;">
            <label>Precio de Venta:</label>
            <input type="text" name="precio_venta_art" id="precio_venta_siva_art" size="10" maxlength="21" value="0.00" class="text-der"/>    
            </p>            
            
            <p>
            <label>Precio de Lista:</label>
            <input type="text" name="precio_venta_lista_art" id="precio_venta_civa_art" size="10" class="text" value="0.00" class="text-der"/>    
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
            
           
            <p style="float: left; width: 200px;">
            <label>Categoria:</label>    
            <select name="id_cat" id="id_cat"  onchange="updSubCatForCat(); return false;" size="1" >
            <? foreach ($categorias as $cat): ?>
                <option value="<?=$cat['id_cat']?>"><?=$cat['nombre_cat']?></option>
            <? endforeach; ?>
            </select>    
            </p>
 
            <p>
            <label>Sub Categoria:</label>    
            <select name="id_scat" id="id_scat">
                
            </select>    
            </p>
            <div style="clear: both;"></div>
            
            <p style="float: left; width: 200px;">
            <label>Vencimiento Lote Actual:</label>
            <input type="text" name="fecha_venc_lote" id="fecha_venc_lote" size="10" />    
            </p>
            
            <p>
            <label>Notificar Vencimiento de Lote:</label>
            <div id="not_venc_lote">
                <input type="radio" name="not_venc_lote" value="1" id="not_venc_lote0" checked="checked"/><label for="not_venc_lote0" style="font-size: 10pt;">Si</label>
                <input type="radio" name="not_venc_lote" value="0" id="not_venc_lote1"/><label for="not_venc_lote1" style="font-size: 10pt;">No</label>
            </div>
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
            <textarea name="detalle_art" id="detalle_art" rows="4" style="width: 440px;"></textarea    
            </p>
            
            <br />
            <p style="text-align: center">
                <input type="submit" value="Registrar" />
                <input type="reset" value="Limpiar" />
            </p>
        </form>
        </div>
    </div>
    
    
    
    <? if ($show_errors): ?>
    <br />    
    <div style="width: 500px; margin: 0 auto;">
        <?=validation_errors('<div class="notify-error">','</div>');?>
        <?echo ($custom_error != '')? '<div class="notify-error">'.$custom_error.'</div>': "<!-- no errors -->";?>
    </div>
    <? endif; ?>    
</section>