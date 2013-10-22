<script type="text/javascript">
    $(function() {
        $('input[type=submit]').button()   
    });  
</script>


<content class="one-section">
    
    <div class="window" style="width: 220px; margin: 20px auto;">
        <h3>Iniciar Session</h3> 
        
        <div class="win-cont">
        <?=form_open('');?>     
            <p><label>Usuario:</label>
            <input type="text" name="username" />    
            </p>
            
            <p><label>Contraseña:</label>
            <input type="password" name="password" />
            </p>
            
            <p style="text-align: center">
                <input type="Submit" value="Ingresar" />
            </p>
        </form>
        </div>
    </div>
    
    <div style="width: 500px; margin: 0 auto;">
        <?=validation_errors('<div class="notify-error">','</div>');?>
        <?echo (isset($custom_error))? '<div class="notify-error">'.$custom_error.'</div>': "<!-- no errors -->";?>
    </div>
    
</content>
