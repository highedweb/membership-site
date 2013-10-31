<?php /* Smarty version 2.6.27, created on 2013-10-30 02:35:36
         compiled from CRM/Contact/Form/Task.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Contact/Form/Task.tpl', 26, false),array('function', 'cycle', 'CRM/Contact/Form/Task.tpl', 39, false),)), $this); ?>
<?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['totalSelectedContacts'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Number of selected contacts: %1<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php if ($this->_tpl_vars['searchtype'] == 'ts_sel'): ?>
<div id="popupContainer">
  <table id="selectedRecords" class="display crm-copy-fields">
    <thead>
    <tr class="columnheader">
      <th class="contact_details"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Name<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
    </tr>
    </thead>

    <tbody>
      <?php $_from = $this->_tpl_vars['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
      <tr class="<?php echo smarty_function_cycle(array('values' => "odd-row,even-row"), $this);?>
">
        <td class="name"><?php echo $this->_tpl_vars['row']; ?>
</td>
      </tr>
      <?php endforeach; endif; unset($_from); ?>
    </tbody>
  </table>

</div><br />
<a href="#" id="popup-button" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>View Selected Contacts<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>View Selected Contacts<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
<?php endif; ?>

<?php if ($this->_tpl_vars['searchtype'] == 'ts_sel'): ?>
<?php echo '
<script type="text/javascript">
  cj(function($) {
    $("#popupContainer").css({
      "background-color":"#E0E0E0",
      \'display\':\'none\',
    });

    $("#popup-button").click(function() {
      $("#popupContainer").dialog({
        title: "Selected Contacts",
        width:700,
        height:500,
        modal: true,
        overlay: {
          opacity: 0.5,
          background: "black"
        }
      });
      return false;
    });

    var count = 0; var columns = \'\'; var sortColumn = \'\';
    $(\'#selectedRecords th\').each(function() {
      if ($(this).attr(\'class\') == \'contact_details\') {
        sortColumn += \'[\' + count + \', "asc" ],\';
        columns += \'{"sClass": "contact_details"},\';
      }
      else {
        columns += \'{ "bSortable": false },\';
      }
      count++;
    });

    columns    = columns.substring(0, columns.length - 1 );
    sortColumn = sortColumn.substring(0, sortColumn.length - 1 );
    eval(\'sortColumn =[\' + sortColumn + \']\');
    eval(\'columns =[\' + columns + \']\');

    //load jQuery data table.
    $(\'#selectedRecords\').dataTable( {
      "sPaginationType": "full_numbers",
      "bJQueryUI"  : true,
      "aaSorting"  : sortColumn,
      "aoColumns"  : columns,
      "bFilter"    : false
    });
  });

</script>
'; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['rows']): ?>
<div class="form-item">
  <table width="30%">
    <tr class="columnheader">
      <th><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Name<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
    </tr>
    <?php $_from = $this->_tpl_vars['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
      <tr class="<?php echo smarty_function_cycle(array('values' => "odd-row,even-row"), $this);?>
">
        <td><?php echo $this->_tpl_vars['row']['displayName']; ?>
</td>
      </tr>
    <?php endforeach; endif; unset($_from); ?>
  </table>
</div>
<?php endif; ?>