<content class="one-section">
    
    <div class="window" style="width: 220px; margin: 20px auto;">
        <h3>Registro Sucursal  </h3> 
        
        <div class="win-cont">
        <? echo validation_errors(); ?>
        <?=form_open('');?>     
            <p><label>Empresa</label>
            <input type="text" name="empresa"  value="Una Empresa"/>    
            </p>
            
            <p><label>Direccion:</label>
            <input type="text" name="direccion" />
            </p>
            
            <p><label>Telefono1 :</label>
                <input type="text" name="telefono1" />
            </p>
            
            <p><label>Telefono2 :</label>
                <input type="text" name="telefono2" />
            </p>
            
            <p><label>Direccion:</label>
                <input type="text" name="direccion" />
            </p>
            <p><label>Sitio Web:</label>
                <input type="text" name="sitio" />
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