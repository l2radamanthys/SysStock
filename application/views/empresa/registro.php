<content class="one-section">
    <div class="window" style="width: 300px; margin: 20px auto;">
    <h3> Registro de Empresas </h3>
    <div class="win-cont">
    <? echo validation_errors(); ?>
    <?=form_open('');?> 
    <p><label>Razon social:</label>
    <input type="text" name="razon_social" value=""/>  
     </p>
    <p><label>tipo:</label>
    <select name="tipo" />
    </select>
     </p>
    <p><label>CUIT:</label>
    <input type="text" name="cuit" value=""/>  
     </p>
    <p style="text-align: center">
                <input type="Submit" value="registrar" />
            </p>
     
     </form>
     <p>Algunos de estos campos son obligatorios</p>
        </div>
    </div>
    
</div>