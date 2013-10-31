<?php /* Smarty version 2.6.27, created on 2013-10-29 21:58:54
         compiled from CRM/Contribute/Form/Contribution/Honor.tpl */ ?>
<?php if ($this->_tpl_vars['honor_block_is_active']): ?>
<div class="crm-group honor_block-group">
    <div class="header-dark">
        <?php echo $this->_tpl_vars['honor_block_title']; ?>

    </div>
    <div class="display-block">
         <strong><?php echo $this->_tpl_vars['honor_type']; ?>
  : </strong>
         <?php echo $this->_tpl_vars['honor_prefix']; ?>
&nbsp;<?php echo $this->_tpl_vars['honor_first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['honor_last_name']; ?>
<br />
         <strong>Email      : </strong><?php echo $this->_tpl_vars['honor_email']; ?>
<br />
    </div>
</div>
<?php endif; ?>