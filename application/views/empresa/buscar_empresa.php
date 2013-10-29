<section class="one-section">    
    
    <script type="text/javascript">
    //ejecutar al inicio
    $(function() {
        $('input[type=submit]').button();   
    });
    </script>
    
    <h1>Buscar Empresas</h1>
    
    <div style="margin: 0 auto; width: 500px;" >
        <?=form_open('');?>
        <select name="field" <?=set_select('field')?>>
            <option value="razon_social_emp">Razon Social</option>
            <option value="tipo_emp">Tipo</option>
            <option value="cuit_emp">CUIT</option>            
        </select>
        <input type="text" name="query" size="35" value="<?=set_value('query')?>"/>
        <input type="submit" value="Buscar" />
        </form>        
    </div>
    
    <br />
    <table class="table" style="width: 800px; margin: 0 auto;">
        <tr>
            <th>Razon Social</th>
            <th>Tipo</th>
            <th>CUIT</th>
            
        </tr>
    <? foreach ($empresas $emp): ?>            
        <tr>
            <td><?=$emp['razon_social_emp']?></td>
            <td><?=$emp['tipo_emp']?></td>            
            <td><?=$emp['cuit_emp']?> </td>
            <td><a href="<?=base_url()?>personas/show/<?=$pers['id_pers']?>">Mostrar</a></td>                        
        </tr>
    <? endforeach; ?>    
    </table>

</section>