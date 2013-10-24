<script type="text/javascript">
    $(function() {
        $('input[type=submit]').button()   
    });  
</script>
<content class="one-section">
    <div class="window" style="width: 300px; margin: 20px auto;">
    <h3> Registro de Empresas </h3>
    <div class="win-cont">
    <? echo validation_errors(); ?>
    <?=form_open('');?> 
    <p><label>Razon social:</label>
    <input type="text" name="razon_social" value="<? echo set_value('razon_social'); ?>"/>  
     </p>
    <p><label>tipo:</label>
    <select name="tipo" />
        <option value="1">Responsable Inscripto</option>
        <option value="2">Responsable no Inscripto</option>
        <option value="3">Excento</option>
        <option value="4">Consumidor Final</option>
        <option value="5">Monotributo</option>
    </select>
     </p>
    <p><label>CUIT:</label>
    <input type="text" name="cuit" value="<? echo set_value('cuit'); ?>"/>  
     </p>
    <p style="text-align: center">
                <input type="Submit" value="registrar" />
            </p>
     
     </form>
     <p class="mini">Algunos de estos campos son obligatorios</p>
        </div>
    </div>
    
</div>