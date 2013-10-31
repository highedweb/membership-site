<?php /* Smarty version 2.6.27, created on 2013-10-29 18:36:56
         compiled from CRM/Core/BillingBlock.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmRegion', 'CRM/Core/BillingBlock.tpl', 26, false),array('block', 'ts', 'CRM/Core/BillingBlock.tpl', 39, false),array('modifier', 'crmAddClass', 'CRM/Core/BillingBlock.tpl', 89, false),array('modifier', 'json_encode', 'CRM/Core/BillingBlock.tpl', 173, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmRegion', array('name' => "billing-block")); $_block_repeat=true;smarty_block_crmRegion($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php if ($this->_tpl_vars['context'] == 'front-end'): ?>
  <?php $this->assign('reqMark', ' <span class="crm-marker" title="This field is required.">*</span>'); ?>
<?php else: ?>
  <?php $this->assign('reqMark', ''); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['form']['credit_card_number'] || $this->_tpl_vars['form']['bank_account_number']): ?>
    <div id="payment_information">
        <fieldset class="billing_mode-group <?php if ($this->_tpl_vars['paymentProcessor']['payment_type'] & 2): ?>direct_debit_info-group<?php else: ?>credit_card_info-group<?php endif; ?>">
            <legend>
               <?php if ($this->_tpl_vars['paymentProcessor']['payment_type'] & 2): ?>
                    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Direct Debit Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
               <?php else: ?>
                   <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credit Card Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
               <?php endif; ?>
            </legend>
            <?php if ($this->_tpl_vars['paymentProcessor']['billing_mode'] & 2 && ! $this->_tpl_vars['hidePayPalExpress']): ?>
            <div class="crm-section no-label paypal_button_info-section">
              <div class="content description">
              <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If you have a PayPal account, you can click the PayPal button to continue. Otherwise, fill in the credit card and billing information on this form and click <strong>Continue</strong> at the bottom of the page.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
              </div>
            </div>
            <div class="crm-section no-label <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['expressButtonName']]['name']; ?>
-section">
              <div class="content description">
                <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['expressButtonName']]['html']; ?>

                <div class="description">Save time. Checkout securely. Pay without sharing your financial information. </div>
              </div>
            </div>
            <?php endif; ?>

            <?php if ($this->_tpl_vars['paymentProcessor']['billing_mode'] & 1): ?>
                <div class="crm-section billing_mode-section <?php if ($this->_tpl_vars['paymentProcessor']['payment_type'] & 2): ?>direct_debit_info-section<?php else: ?>credit_card_info-section<?php endif; ?>">
                    <?php if ($this->_tpl_vars['paymentProcessor']['payment_type'] & 2): ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['account_holder']['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form']['account_holder']['label']; ?>
</div>
                            <div class="content"><?php echo $this->_tpl_vars['form']['account_holder']['html']; ?>
</div>
                            <div class="clear"></div>
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['bank_account_number']['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form']['bank_account_number']['label']; ?>
</div>
                            <div class="content"><?php echo $this->_tpl_vars['form']['bank_account_number']['html']; ?>
</div>
                            <div class="clear"></div>
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['bank_identification_number']['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form']['bank_identification_number']['label']; ?>
</div>
                            <div class="content"><?php echo $this->_tpl_vars['form']['bank_identification_number']['html']; ?>
</div>
                            <div class="clear"></div>
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['bank_name']['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form']['bank_name']['label']; ?>
</div>
                            <div class="content"><?php echo $this->_tpl_vars['form']['bank_name']['html']; ?>
</div>
                            <div class="clear"></div>
                        </div>
                    <?php else: ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['credit_card_type']['name']; ?>
-section">
                             <div class="label"><?php echo $this->_tpl_vars['form']['credit_card_type']['label']; ?>
 <?php echo $this->_tpl_vars['reqMark']; ?>
</div>
                             <div class="content"><?php echo $this->_tpl_vars['form']['credit_card_type']['html']; ?>
</div>
                             <div class="clear"></div>
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['credit_card_number']['name']; ?>
-section">
                             <div class="label"><?php echo $this->_tpl_vars['form']['credit_card_number']['label']; ?>
 <?php echo $this->_tpl_vars['reqMark']; ?>
</div>
                             <div class="content"><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['credit_card_number']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'creditcard') : smarty_modifier_crmAddClass($_tmp, 'creditcard')); ?>
</div>
                             <div class="clear"></div>
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['cvv2']['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form']['cvv2']['label']; ?>
 <?php echo $this->_tpl_vars['reqMark']; ?>
</div>
                            <div class="content">
                                <?php echo $this->_tpl_vars['form']['cvv2']['html']; ?>

                                <img src="<?php echo $this->_tpl_vars['config']->resourceBase; ?>
i/mini_cvv2.gif" alt="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Usually the last 3-4 digits in the signature area on the back of the card.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Usually the last 3-4 digits in the signature area on the back of the card.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" style="vertical-align: text-bottom;" />
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['credit_card_exp_date']['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form']['credit_card_exp_date']['label']; ?>
 <?php echo $this->_tpl_vars['reqMark']; ?>
</div>
                            <div class="content"><?php echo $this->_tpl_vars['form']['credit_card_exp_date']['html']; ?>
</div>
                            <div class="clear"></div>
                        </div>
                    <?php endif; ?>
                </div>
                </fieldset>

                <?php if ($this->_tpl_vars['profileAddressFields']): ?>
                  <input type="checkbox" id="billingcheckbox" value="0"> <label for="billingcheckbox"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>My billing address is the same as above<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
                <?php endif; ?>
                <fieldset class="billing_name_address-group">
                  <legend><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Billing Name and Address<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></legend>
                    <div class="crm-section billing_name_address-section">
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['billing_first_name']['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form']['billing_first_name']['label']; ?>
 <?php echo $this->_tpl_vars['reqMark']; ?>
</div>
                            <div class="content"><?php echo $this->_tpl_vars['form']['billing_first_name']['html']; ?>
</div>
                            <div class="clear"></div>
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['billing_middle_name']['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form']['billing_middle_name']['label']; ?>
</div>
                            <div class="content"><?php echo $this->_tpl_vars['form']['billing_middle_name']['html']; ?>
</div>
                            <div class="clear"></div>
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['billing_last_name']['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form']['billing_last_name']['label']; ?>
 <?php echo $this->_tpl_vars['reqMark']; ?>
</div>
                            <div class="content"><?php echo $this->_tpl_vars['form']['billing_last_name']['html']; ?>
</div>
                            <div class="clear"></div>
                        </div>
                        <?php $this->assign('n', "billing_street_address-".($this->_tpl_vars['bltID'])); ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['label']; ?>
 <?php echo $this->_tpl_vars['reqMark']; ?>
</div>
                            <div class="content"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']; ?>
</div>
                            <div class="clear"></div>
                        </div>
                        <?php $this->assign('n', "billing_city-".($this->_tpl_vars['bltID'])); ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['label']; ?>
 <?php echo $this->_tpl_vars['reqMark']; ?>
</div>
                            <div class="content"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']; ?>
</div>
                            <div class="clear"></div>
                        </div>
                        <?php $this->assign('n', "billing_country_id-".($this->_tpl_vars['bltID'])); ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['label']; ?>
 <?php echo $this->_tpl_vars['reqMark']; ?>
</div>
                            <div class="content"><?php echo ((is_array($_tmp=$this->_tpl_vars['form'][$this->_tpl_vars['n']]['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'big') : smarty_modifier_crmAddClass($_tmp, 'big')); ?>
</div>
                            <div class="clear"></div>
                        </div>
                        <?php $this->assign('n', "billing_state_province_id-".($this->_tpl_vars['bltID'])); ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['label']; ?>
 <?php echo $this->_tpl_vars['reqMark']; ?>
</div>
                            <div class="content"><?php echo ((is_array($_tmp=$this->_tpl_vars['form'][$this->_tpl_vars['n']]['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'big') : smarty_modifier_crmAddClass($_tmp, 'big')); ?>
</div>
                            <div class="clear"></div>
                        </div>
                        <?php $this->assign('n', "billing_postal_code-".($this->_tpl_vars['bltID'])); ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name']; ?>
-section">
                            <div class="label"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['label']; ?>
 <?php echo $this->_tpl_vars['reqMark']; ?>
</div>
                            <div class="content"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']; ?>
</div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </fieldset>
            <?php else: ?>
                </fieldset>
            <?php endif; ?>
    </div>

     <?php if ($this->_tpl_vars['profileAddressFields']): ?>
     <script type="text/javascript">
     <?php echo '

cj( function( ) {
  // build list of ids to track changes on
  var address_fields = '; ?>
<?php echo json_encode($this->_tpl_vars['profileAddressFields']); ?>
<?php echo ';
  var input_ids = {};
  var select_ids = {};
  var orig_id = field = field_name = null;

  // build input ids
  cj(\'.billing_name_address-section input\').each(function(i){
    orig_id = cj(this).attr(\'id\');
    field = orig_id.split(\'-\');
    field_name = field[0].replace(\'billing_\', \'\');
    if(field[1]) {
      if(address_fields[field_name]) {
        input_ids[\'#\'+field_name+\'-\'+address_fields[field_name]] = \'#\'+orig_id;
      }
    }
  });
  if(cj(\'#first_name\').length)
    input_ids[\'#first_name\'] = \'#billing_first_name\';
  if(cj(\'#middle_name\').length)
    input_ids[\'#middle_name\'] = \'#billing_middle_name\';
  if(cj(\'#last_name\').length)
    input_ids[\'#last_name\'] = \'#billing_last_name\';

  // build select ids
  cj(\'.billing_name_address-section select\').each(function(i){
    orig_id = cj(this).attr(\'id\');
    field = orig_id.split(\'-\');
    field_name = field[0].replace(\'billing_\', \'\').replace(\'_id\', \'\');
    if(field[1]) {
      if(address_fields[field_name]) {
        select_ids[\'#\'+field_name+\'-\'+address_fields[field_name]] = \'#\'+orig_id;
      }
    }
  });

  // detect if billing checkbox should default to checked
  var checked = true;
  for(var id in input_ids) {
    var orig_id = input_ids[id];
    if(cj(id).val() != cj(orig_id).val()) {
      checked = false;
      break;
    }
  }
  for(var id in select_ids) {
    var orig_id = select_ids[id];
    if(cj(id).val() != cj(orig_id).val()) {
      checked = false;
      break;
    }
  }
  if(checked) {
    cj(\'#billingcheckbox\').attr(\'checked\', \'checked\');
    cj(\'.billing_name_address-group\').hide();
  }

  // onchange handlers for non-billing fields
  for(var id in input_ids) {
    var orig_id = input_ids[id];
    cj(id).change(function(){
      var id = \'#\'+cj(this).attr(\'id\');
      var orig_id = input_ids[id];

      // if billing checkbox is active, copy other field into billing field
      if(cj(\'#billingcheckbox\').attr(\'checked\')) {
        cj(orig_id).val( cj(id).val() );
      };
    });
  };
  for(var id in select_ids) {
    var orig_id = select_ids[id];
    cj(id).change(function(){
      var id = \'#\'+cj(this).attr(\'id\');
      var orig_id = select_ids[id];

      // if billing checkbox is active, copy other field into billing field
      if(cj(\'#billingcheckbox\').attr(\'checked\')) {
        cj(orig_id+\' option\').removeAttr(\'selected\');
        cj(orig_id+\' option[value="\'+cj(id).val()+\'"]\').attr(\'selected\', \'selected\');
      };

      if(orig_id == \'#billing_country_id-5\') {
        cj(orig_id).change();
      }
    });
  };


  // toggle show/hide
  cj(\'#billingcheckbox\').click(function(){
    if(this.checked) {
      cj(\'.billing_name_address-group\').hide(200);

      // copy all values
      for(var id in input_ids) {
        var orig_id = input_ids[id];
        cj(orig_id).val( cj(id).val() );
      };
      for(var id in select_ids) {
        var orig_id = select_ids[id];
        cj(orig_id+\' option\').removeAttr(\'selected\');
        cj(orig_id+\' option[value="\'+cj(id).val()+\'"]\').attr(\'selected\', \'selected\');
      };
    } else {
      cj(\'.billing_name_address-group\').show(200);
    }
  });

  // remove spaces, dashes from credit card number
  cj(\'#credit_card_number\').change(function(){
    var cc = cj(\'#credit_card_number\').val()
      .replace(/ /g, \'\')
      .replace(/-/g, \'\');
    cj(\'#credit_card_number\').val(cc);
  });
});
'; ?>

</script>
<?php endif; ?>
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmRegion($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>