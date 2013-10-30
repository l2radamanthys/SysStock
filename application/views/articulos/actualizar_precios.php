
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
        $('input[type=submit]').button();
        $('input[type=reset]').button();
        $('#back').button();
        
        updSubCatForCat();   
    });  
</script>


<section class="one-section">
    <h1>Actualizar Precio</h1>
    
    <div class="window" style="width: 450px; margin: 0 auto;">
        <div class="win-cont">
            <form action="<?=base_url();?>articulos/update_price/<?=$art['id_art']?>" method="post">
            <p>
            <label>Codigo Articulo:</label>    
            <?=$art['codigo_art'];?>    
            </p>
            
            <p>
            <label>Nombre Articulo:</label>    
            <?=$art['nombre_art'];?> 
            </p>
            
            <p style="float: left; width: 160px;">
            <label>Precio Costo:</label>
            <input type="text" name="precio_costo_art" id="precio_costo_art" size="8" maxlength="21" value="<?=set_value('precio_costo_art', number_format($art['precio_costo_art'],2))?>" class="text-der"/>    
            </p>                        
            
            <p style="float: left; width: 160px;">
            <label>Precio de Venta:</label>
            <input type="text" name="precio_venta_art" id="precio_venta_siva_art" size="8" maxlength="21" value="<?=set_value('precio_venta_art', number_format($art['precio_venta_art'],2))?>" class="text-der"/>    
            </p>            
            
            <p>
            <label>Precio de Lista:</label>
            <input type="text" name="precio_venta_lista_art" id="precio_venta_civa_art" size="8" value="<?=set_value('precio_venta_lista_art', number_format($art['precio_venta_lista_art'],2))?>" class="text-der"/>    
            </p>   
            <div style="clear: both;"></div>
            
            <br />
            <p style="text-align: center">
                <input type="submit" value="Actualizar" />
                <a href="<?=base_url()?>articulos/show/<?=$art['id_art']?>" id="back">Cancelar</a>
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
