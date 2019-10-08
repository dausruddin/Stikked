<div class="footer">
    <?php 
        if (config_item('enable_footer')) { 
            if (config_item('footer_message') == 'default') {
                echo lang('powered_by') . ' <a href="https://github.com/claudehohl/Stikked">Stikked<!-- version ' . config_item('stikked_version') . '-->';
            } else {
                echo config_item('footer_message');
            }
        }  
    
    ?>
</div>
