<script type="text/javascript">
    $(function() {
        $('input[type=submit]').button()   
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
                    <option value="1">Responsable Inscripto</option>
                    <option value="2">Responsable no Inscripto</option>
                    <option value="3">Excento</option>
                    <option value="4">Consumidor Final</option>
                    <option value="5">Monotributo</option>
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
                 <label>Horario: </label>
                 <input type="text" name="horario" value="<? echo set_value('horario'); ?>" id="horario" size="40"/>
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
