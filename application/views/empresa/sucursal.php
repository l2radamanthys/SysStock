<content class="one-section">
    <h1>Registro Sucursal  </h1> 
    <div class="window" style="width: 400px; margin: 20px auto;">
        
        
        <div class="win-cont">
        <? echo validation_errors(); ?>
        <?=form_open('');?>     
            <p>Empresa:<? echo set_value('razon_social'); ?>   
            <input type="hidden" name="id_empresa" value="<? echo set_value('razon_social'); ?>"/> 
            </p>
            <p>CUIT: <? echo set_value('cuit'); ?>
                <input type="hidden" name="cuit" value="<? echo set_value('cuit'); ?>"/> 
            </p>
            <p>Nombre Suc:
            <input type="text" name="sucursal" value="<? echo set_value('sucursal'); ?>"/>
            </p>
            
            <p>Direccion:
            <input type="text" name="direccion" value="<? echo set_value('direccion'); ?>"/>
            </p>
            
            <p>Horario  :
                <input type="text" name="horario" value="<? echo set_value('horario'); ?>"/>
            </p>
            
            <p>Telefono1 :
                <input type="text" name="telefono1" value="<? echo set_value('telefono1'); ?>"/>
            </p>
            
            <p>Telefono2 :
                <input type="text" name="telefono2" value="<? echo set_value('telefono2'); ?>"/>
            </p>
            
            <p>Direccion:
                <input type="text" name="direccion" value="<? echo set_value('direccion'); ?>"/>
            </p>
            <p>Sitio Web:
                <input type="text" name="sitio" value="<? echo set_value('sitio'); ?>"/>
            </p>
            <p style="text-align: center">
                <input type="Submit" value="registrar" />
            </p>
            
        </form>
        </div>
    </div>
    
    <div style="width: 500px; margin: 0 auto;">
        <?=validation_errors('<div class="notify-error">','</div>');?>
        <?echo (isset($custom_error))? '<div class="notify-error">'.$custom_error.'</div>': "<!-- no errors -->";?>
    </div>
    
</content>