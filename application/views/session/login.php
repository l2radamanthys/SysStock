<script type="text/javascript">
    $(function() {
        $('input[type=submit]').button()   
    });  
</script>


<content>
    <? if ($show_errors): ?>
        <?=validation_errors();?>
        <?=$custom_errors?>        
    <? endif; ?>
    
    <div class="window" style="width: 220px; margin: 20px auto;">
        <h3>Iniciar Session</h3> 
        
        <div class="win-cont">
        <?=form_open('');?>     
            <p><label>Usuario:</label><br />
            <input type="text" name="username" />    
            </p>
            
            <p><label>Contraseña:</label><br />
            <input type="password" name="password" />
            </p>
            
            <p style="text-align: center">
                <input type="Submit" value="Ingresar" />
            </p>
        </form>
        </div>
    </div>
    
    
    <br />
    <p><?=$result;?></p>
    
</content>

    