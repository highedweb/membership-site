<?php /* Smarty version 2.6.27, created on 2013-10-29 18:47:23
         compiled from CRM/Contact/Form/Inline/ContactName.tpl */ ?>
<?php echo $this->_tpl_vars['form']['oplock_ts']['html']; ?>

<div class="crm-inline-edit-form">
  <div class="crm-inline-button">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
  <?php if ($this->_tpl_vars['contactType'] == 'Individual'): ?>
    <?php if ($this->_tpl_vars['form']['prefix_id']): ?>
      <div class="crm-inline-edit-field">
        <?php echo $this->_tpl_vars['form']['prefix_id']['label']; ?>
<br/>
        <?php echo $this->_tpl_vars['form']['prefix_id']['html']; ?>

      </div>
    <?php endif; ?>
    <div class="crm-inline-edit-field">
      <?php echo $this->_tpl_vars['form']['first_name']['label']; ?>
<br /> 
      <?php echo $this->_tpl_vars['form']['first_name']['html']; ?>

    </div>
    <div class="crm-inline-edit-field">
      <?php echo $this->_tpl_vars['form']['middle_name']['label']; ?>
<br />
      <?php echo $this->_tpl_vars['form']['middle_name']['html']; ?>

    </div>
    <div class="crm-inline-edit-field">
      <?php echo $this->_tpl_vars['form']['last_name']['label']; ?>
<br />
      <?php echo $this->_tpl_vars['form']['last_name']['html']; ?>

    </div>
    <?php if ($this->_tpl_vars['form']['suffix_id']): ?>
      <div class="crm-inline-edit-field">
        <?php echo $this->_tpl_vars['form']['suffix_id']['label']; ?>
<br/>
        <?php echo $this->_tpl_vars['form']['suffix_id']['html']; ?>

      </div>
    <?php endif; ?>
  <?php elseif ($this->_tpl_vars['contactType'] == 'Organization'): ?>
    <div class="crm-inline-edit-field"><?php echo $this->_tpl_vars['form']['organization_name']['label']; ?>
&nbsp;
    <?php echo $this->_tpl_vars['form']['organization_name']['html']; ?>
</div>
  <?php elseif ($this->_tpl_vars['contactType'] == 'Household'): ?>
    <div class="crm-inline-edit-field"><?php echo $this->_tpl_vars['form']['household_name']['label']; ?>
&nbsp;
    <?php echo $this->_tpl_vars['form']['household_name']['html']; ?>
</div>
  <?php endif; ?>
</div>
<div class="clear"></div>