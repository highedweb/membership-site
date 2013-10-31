<?php /* Smarty version 2.6.27, created on 2013-10-29 18:36:56
         compiled from CRM/common/paymentBlock.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'crmURL', 'CRM/common/paymentBlock.tpl', 37, false),)), $this); ?>
<?php echo '
<script type="text/javascript">

function buildPaymentBlock( type ) {
    if ( type == 0 ) {
     if (cj("#billing-payment-block").length) {
           cj("#billing-payment-block").html(\'\');
   }
        return;
    }

  var dataUrl = '; ?>
"<?php echo CRM_Utils_System::crmURL(array('p' => $this->_tpl_vars['urlPath'],'h' => 0,'q' => 'snippet=4&type='), $this);?>
"<?php echo ' + type;

  '; ?>

    <?php if ($this->_tpl_vars['urlPathVar']): ?>
      dataUrl = dataUrl + '&' + '<?php echo $this->_tpl_vars['urlPathVar']; ?>
'
    <?php endif; ?>

    <?php if ($this->_tpl_vars['contributionPageID']): ?>
            dataUrl = dataUrl + '&id=' + '<?php echo $this->_tpl_vars['contributionPageID']; ?>
'
        <?php endif; ?>

    <?php if ($this->_tpl_vars['qfKey']): ?>
      dataUrl = dataUrl + '&qfKey=' + '<?php echo $this->_tpl_vars['qfKey']; ?>
'
    <?php endif; ?>
  <?php echo '

  var fname = \'#billing-payment-block\';
  var response = cj.ajax({
                        url: dataUrl,
                        async: false
                        }).responseText;

    cj( fname ).html( response );
}

cj( function() {
    cj(\'.crm-group.payment_options-group\').show();

    cj(\'input[name="payment_processor"]\').change( function() {
        buildPaymentBlock( cj(this).val() );
    });
});

</script>
'; ?>
