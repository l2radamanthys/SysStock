﻿<content class="one-section">
    
    <div class="window" style="width: 220px; margin: 20px auto;">
        <h3>Iniciar Session</h3> 
        
        <div class="win-cont">
        
            <h3>Formulario Registro de Empresas</h3>
            <p>Se cargo correctamente</p>
        
        </div>
    </div>
    
    <div style="width: 500px; margin: 0 auto;">
        <?=validation_errors('<div class="notify-error">','</div>');?>
        <?echo (isset($custom_error))? '<div class="notify-error">'.$custom_error.'</div>': "<!-- no errors -->";?>
    </div>
    
</content>