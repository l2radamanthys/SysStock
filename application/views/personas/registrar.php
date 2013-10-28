<script type="text/javascript">    
    //metodo ajax que actualiza el campo ciudades cuando se actualuaza prov
    function updCitiesForProv() {
        var value = $("#fk_id_prov option:selected").val();
        var params = { 'id_prov': value };        
        
        $.ajax({
            data: params,
            url: "<?=base_url();?>http_response/cities_for_state",
            type: 'post',
            beforeSend: function () {
                //$("#result").html("Procesando, espere por favor...");
                $("#dialog").dialog();
            },
            success: function(response) {                
                $("#fk_id_ciud").html(response);
                updZonesForCity();
                $("#dialog").dialog('close');
            }    
        });        
    }

    
    function updZonesForCity() {
        var value = $("#fk_id_ciud option:selected").val();
        var params = { 'id_ciud': value };
        
        $.ajax({
            data: params,
            url: "<?=base_url();?>http_response/zones_for_city",
            type: 'post',
            beforeSend: function () {
                $("#dialog").dialog();
            },
            success: function(response) {
                $("#fk_id_zona").html(response);
                $("#dialog").dialog('close');
            }    
        });    
    }
    
    //ejecutar al inicio
    $(function() {
        $('input[type=submit]').button();
        $('input[type=reset]').button();
        updCitiesForProv();
        updZonesForCity();    
    });  
</script>


<section class="one-section">
    <h1><?=$title;?></h1>
    
    <div id="dialog" style="display: None;">
        <p>Cargando espere un momento...</p>
    </div>
    
    <div class="window" style="width: 900px; margin: 0 auto;">
        <div class="win-cont">
        <?=form_open('/personas/create/'.$type_pers);?>  
            <div style="float: left; width: 450px;">  
            <p>
            <label>Nombre:</label>
            <input type="text" name="nombre_pers" id="nombre_pers" size="45" value="<?=set_value('nombre_pers')?>" maxlength="45"/>            
            </p>
            
            <p>
            <label>Apellido:</label>
            <input type="text" name="apellido_pers" id="apellido_pers" value="<?=set_value('apellido_pers')?>" size="45" maxlength="45"/>            
            </p>
    
            <p style="float: left;">
            <label>Tipo Documento:</label>
            <select name="tipo_dni_pers" id="tipo_dni_pers" size="1" class="select">
                <option value=""></option>            
                <option value="DNI">DNI</option>
                <option value="Visa">Visa</option>
                <option value="Libreta Civica">Libreta Civica</option>
                <option value="Libreta Enrrolamiento">Libreta Enrrolamiento</option>
                <option value="Pasaporte">Pasaporte</option>
                <option value="Otros">Otros</option>
            </select>            
            </p>

            <p style="margin-left: 200px;">
            <label>Numero Documento:</label>
            <input type="text" name="nro_dni_pers" id="nro_dni_pers" value="<?=set_value('nro_dni_pers')?>" size="11" maxlength="11" />            
            </p>                

            <div style="clear: both;"></div>
            <p>
            <label>Empresa:</label>
            <select name="fk_id_emp" id="fk_id_emp" size="1">   
                <? foreach ($empresas as $row): ?>
                <option value="<?=$row['id_emp'];?>"><?=$row['razon_social_emp'];?></option>                    
                <? endforeach; ?>
            </select>             
            </p>
 
            <p style="float: left;">
            <label>Telefono:</label>
            <input type="text" name="telefono_pers" id="telefono_usr" value="<?=set_value('telefono_pers')?>" size="15" maxlength="45"/>            
            </p>
            
            <p style="margin-left: 200px;">
            <label>Celular:</label>
            <input type="text" name="celular_pers" id="celular_usr" value="<?=set_value('celular_pers')?>" size="15" maxlength="45"/>            
            </p>
            <div style="clear: both;"></div>
            <p>
            <label>Email:</label>
            <input type="text" name="email_pers" id="email_usr" value="<?=set_value('email_pers')?>" size="45" maxlength="45"/>            
            </p>
            
            </div > 
            
            <div>           
            <p>
            <label>Direccion:</label>
            <input type="text" name="direccion_pers" id="direccion_pers" value="<?=set_value('direccion_pers')?>" size="50" maxlength="60"/>            
            </p>
                
            
            <p>
            <label>Provincia:</label>
            <select name="fk_id_prov" id="fk_id_prov" size="1" onchange="updCitiesForProv(); return false;" style="min-width: 250px;">   
            <? foreach ($provincias as $row): ?>
                <option value="<?=$row['id_prov'];?>"><?=$row['nombre_prov']?></option>
            <? endforeach; ?>
            </select>             
            </p>
            
            <p>
            <label>Ciudad:</label>
            <select name="fk_id_ciud" id="fk_id_ciud" size="1" onchange="updZonesForCity(); return false;" style="min-width: 250px;">   
                <option>Sin Definir</option>
            </select>            
            </p>            

            <p>
            <label>Zona:</label>
            <select name="fk_id_zona" id="fk_id_zona" size="1" style="min-width: 250px;">   
                <option>Sin Definir</option>
            </select>       
            </p>
            
            <p>
            <label>Observaciones:</label>
            <textarea name="observaciones_pers" cols="35">                
            </textarea>
            </p>
            
            </div>
            
            <div style="clear:both"></div>    
                        
            <p>
                <?=form_hidden('is_cliente', $is_cliente)?>
                <?=form_hidden('is_proveedor', $is_proveedor)?>
            </p>
 
            <br />
            <p style="text-align: center">
                <input type="Submit" value="Registrar" />
                <input type="Reset" value="Limpiar" />
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