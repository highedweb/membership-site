<?php /* Smarty version 2.6.27, created on 2013-10-29 18:36:56
         compiled from CRM/Price/Form/PriceSet.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'CRM/Price/Form/PriceSet.tpl', 36, false),array('modifier', 'crmMoney', 'CRM/Price/Form/PriceSet.tpl', 69, false),)), $this); ?>
<div id="priceset" class="crm-section price_set-section">
    <?php if ($this->_tpl_vars['priceSet']['help_pre']): ?>
        <div class="messages help"><?php echo $this->_tpl_vars['priceSet']['help_pre']; ?>
</div>
    <?php endif; ?>

    <?php $_from = $this->_tpl_vars['priceSet']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field_id'] => $this->_tpl_vars['element']):
?>
                <?php if ($this->_tpl_vars['element']['visibility'] == 'public' || $this->_tpl_vars['context'] == 'standalone' || $this->_tpl_vars['context'] == 'search' || $this->_tpl_vars['context'] == 'participant' || $this->_tpl_vars['context'] == 'dashboard' || $this->_tpl_vars['action'] == 1024): ?>
            <div class="crm-section <?php echo $this->_tpl_vars['element']['name']; ?>
-section">
            <?php if (( $this->_tpl_vars['element']['html_type'] == 'CheckBox' || $this->_tpl_vars['element']['html_type'] == 'Radio' ) && $this->_tpl_vars['element']['options_per_line']): ?>
              <?php $this->assign('element_name', ((is_array($_tmp='price_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['field_id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['field_id']))); ?>
                                <div class="label"><?php if ($this->_tpl_vars['quickConfig'] && $this->_tpl_vars['extends'] != 'Membership'): ?><?php echo $this->_tpl_vars['event']['fee_label']; ?>
 <span class="crm-marker" title="This field is required.">*</span><?php else: ?><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['element_name']]['label']; ?>
<?php endif; ?></div>
                <div class="content <?php echo $this->_tpl_vars['element']['name']; ?>
-content">
                <?php $this->assign('rowCount', '1'); ?>
                <?php $this->assign('count', '1'); ?>
                <?php $_from = $this->_tpl_vars['form'][$this->_tpl_vars['element_name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['outer']['iteration']++;
?>
                    <?php if (is_numeric ( $this->_tpl_vars['key'] )): ?>
                        <?php if ($this->_tpl_vars['count'] == 1): ?><div class="price-set-row <?php echo $this->_tpl_vars['element']['name']; ?>
-row<?php echo $this->_tpl_vars['rowCount']; ?>
"><?php endif; ?>
                        <span class="price-set-option-content"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['element_name']][$this->_tpl_vars['key']]['html']; ?>
</span>
                        <?php if ($this->_tpl_vars['count'] == $this->_tpl_vars['element']['options_per_line']): ?>
                          </div>
                          <?php $this->assign('rowCount', ($this->_tpl_vars['rowCount']+1)); ?>
                          <?php $this->assign('count', '1'); ?>
                        <?php else: ?>
                          <?php $this->assign('count', ($this->_tpl_vars['count']+1)); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                <?php if ($this->_tpl_vars['element']['help_post']): ?>
                    <div class="description"><?php echo $this->_tpl_vars['element']['help_post']; ?>
</div>
                <?php endif; ?>
                </div>
                <div class="clear"></div>

            <?php else: ?>

                <?php $this->assign('element_name', ((is_array($_tmp='price_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['field_id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['field_id']))); ?>

                <div class="label"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['element_name']]['label']; ?>
</div>
                <div class="content <?php echo $this->_tpl_vars['element']['name']; ?>
-content"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['element_name']]['html']; ?>

                  <?php if ($this->_tpl_vars['element']['is_display_amounts'] && $this->_tpl_vars['element']['html_type'] == 'Text'): ?>
                    <span class="price-field-amount">
                      x <?php $_from = $this->_tpl_vars['element']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?><?php echo ((is_array($_tmp=$this->_tpl_vars['option']['amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>
<?php endforeach; endif; unset($_from); ?>
                    </span>
                  <?php endif; ?>
                      <?php if ($this->_tpl_vars['element']['help_post']): ?><br /><span class="description"><?php echo $this->_tpl_vars['element']['help_post']; ?>
</span><?php endif; ?>
                </div>
                <div class="clear"></div>

            <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>

    <?php if ($this->_tpl_vars['priceSet']['help_post']): ?>
      <div class="messages help"><?php echo $this->_tpl_vars['priceSet']['help_post']; ?>
</div>
    <?php endif; ?>

<?php if (! $this->_tpl_vars['quickConfig']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Price/Form/Calculate.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

</div>