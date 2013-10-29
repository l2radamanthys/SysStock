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


<content class="one-section">
    <h1> Registro de Empresas </h1>
    <div class="window" style="width: 800px; margin: 20px auto;">
        <div class="win-cont">
        <?=form_open('');?> 
        <div class="izq">
            <p><label>(*) Razon social:</label>
            <input type="text" name="razon_social" value="<? echo set_value('razon_social');?>"  size="40"/>  
             </p>
            <div style="float:left;"> 
            <p><label>Tipo Empresa:</label>
                <select name="tipo" />
                    <option >Responsable Inscripto</option>
                    <option >Responsable no Inscripto</option>
                    <option >Excento</option>
                    <option >Consumidor Final</option>
                    <option >Monotributo</option>
                </select>
                 </p>
             </div>
             
             <div style="float:left;">
                <p><label>(*) CUIT:</label>
                <input type="text" name="cuit" value="<? echo set_value('cuit'); ?>"/>  
                 </p>
             </div>
              <div style="clear: both"></div>
         
             <p>
                 <label>(*) Direccion: </label>
                 <input type="text" name="direccion" value="<? echo set_value('direccion'); ?>" id="direccion" size="40"/>
             </p>
             
             <p>
                 <label>Email: </label>
                 <input type="text" name="email" value="<? echo set_value('email'); ?>" id="email" size="40"/>
             </p>
             <p>
                 <label>Horario: </label>
                 <input type="text" name="horario" value="<? echo set_value('horario'); ?>" id="horario" size="40"/>
             </p>
             
            
        </div>
         
         <div class="der">
             <p>
                 <label>(*) Telefono 1: </label>
                 <input type="text" name="telefono1" value="<? echo set_value('telefono1'); ?>" id="telefono1" size="20"/>
             </p>
             
             <p>
                 <label>Telefono 2: </label>
                 <input type="text" name="telefono2" value="<? echo set_value('telefono2'); ?>" id="telefono2" size="20"/>
             </p>
             
             <p>
                 <label>Sitio Web: </label>
                 <input type="text" name="sitio" value="<? echo set_value('sitio'); ?>" id="sitio" size="40"/>
             </p>
             
             <p>
            <label>Provincia:</label>
            <select name="fk_id_prov" id="fk_id_prov" size="1"  style="min-width: 250px;">   
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
         </div>
         
         <div style="clear: both"></div>
            <p style="text-align: center">
                <input type="Submit" value="registrar" />
                <br /><br />
                <span class="mini">Los campos marcados con (*) son obligatorios</span>
            </p>
         
         </form>
        
        </div>
    </div>
    <? if (validation_errors()) 
       {
         echo "<div class='notify-error'>
                  Existen campos sin completar
               </div>";             
       } 
        ?>
</div>
