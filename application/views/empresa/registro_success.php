<content class="one-section">
    
    <div class="window" style="width: 350px; margin: 20px auto;">
        <h3>Registro de Empresas</h3> 
        
        <div class="win-cont">
        
            
            <p><? echo "<p>".$empresa."</p>".
                       "<p>".$sucursal."</p>"; ?></p>
        
        </div>
    </div>
    
    <div style="width: 500px; margin: 0 auto;">
        <?=validation_errors('<div class="notify-error">','</div>');?>
        <?echo (isset($custom_error))? '<div class="notify-error">'.$custom_error.'</div>': "<!-- no errors -->";?>
    </div>
    
</content>