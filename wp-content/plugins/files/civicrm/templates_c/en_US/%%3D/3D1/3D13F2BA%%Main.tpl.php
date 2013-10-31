<?php /* Smarty version 2.6.27, created on 2013-10-29 18:36:56
         compiled from CRM/Contribute/Form/Contribution/Main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Contribute/Form/Contribution/Main.tpl', 35, false),)), $this); ?>
<?php if ($this->_tpl_vars['snippet']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Core/BillingBlock.tpl", 'smarty_include_vars' => array('context' => "front-end")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php if ($this->_tpl_vars['is_monetary']): ?>
      <?php if ($this->_tpl_vars['paymentProcessor']['payment_processor_type'] == 'PayPal_Express'): ?>
    <div id="paypalExpress">
      <?php $this->assign('expressButtonName', '_qf_Main_upload_express'); ?>
      <fieldset class="crm-group paypal_checkout-group">
        <legend><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Checkout with PayPal<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></legend>
        <div class="section">
          <div class="crm-section paypalButtonInfo-section">
            <div class="content">
              <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Click the PayPal button to continue.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
            </div>
            <div class="clear"></div>
          </div>
          <div class="crm-section <?php echo $this->_tpl_vars['expressButtonName']; ?>
-section">
            <div class="content">
              <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['expressButtonName']]['html']; ?>
 <span class="description">Checkout securely. Pay without sharing your financial information. </span>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </fieldset>
    </div>
    <?php endif; ?>
  <?php endif; ?>

  
<?php else: ?>
  <?php echo '
  <script type="text/javascript">

  // Putting these functions directly in template so they are available for standalone forms
  function useAmountOther() {
    var priceset = '; ?>
<?php if ($this->_tpl_vars['contriPriceset']): ?>'<?php echo $this->_tpl_vars['contriPriceset']; ?>
'<?php else: ?>0<?php endif; ?><?php echo ';

    for( i=0; i < document.Main.elements.length; i++ ) {
      element = document.Main.elements[i];
      if ( element.type == \'radio\' && element.name == priceset ) {
        if (element.value == \'0\' ) {
          element.click();
        }
        else {
          element.checked = false;
        }
      }
    }
  }

  function clearAmountOther() {
    var priceset = '; ?>
<?php if ($this->_tpl_vars['priceset']): ?>'#<?php echo $this->_tpl_vars['priceset']; ?>
'<?php else: ?>0<?php endif; ?><?php echo '
    if( priceset ){
      cj(priceset).val(\'\');
      cj(priceset).blur();
    }
    if (document.Main.amount_other == null) return; // other_amt field not present; do nothing
    document.Main.amount_other.value = "";
  }

  </script>
  '; ?>


  <?php if ($this->_tpl_vars['action'] & 1024): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/PreviewHeader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/TrackingFields.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <?php ob_start(); ?><span class="marker" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This field is required.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">*</span><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('reqMark', ob_get_contents());ob_end_clean(); ?>
  <div class="crm-contribution-page-id-<?php echo $this->_tpl_vars['contributionPageID']; ?>
 crm-block crm-contribution-main-form-block">
  <div id="intro_text" class="crm-section intro_text-section">
    <?php echo $this->_tpl_vars['intro_text']; ?>

  </div>
  <?php if ($this->_tpl_vars['islifetime'] || $this->_tpl_vars['ispricelifetime']): ?>
  <div id="help"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You have a current Lifetime Membership which does not need to be renewed.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
  <?php endif; ?>

  <?php if (! empty ( $this->_tpl_vars['useForMember'] )): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/MembershipBlock.tpl", 'smarty_include_vars' => array('context' => 'makeContribution')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php else: ?>
  <div id="priceset-div">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Price/Form/PriceSet.tpl", 'smarty_include_vars' => array('extends' => 'Contribution')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['pledgeBlock']): ?>
    <?php if ($this->_tpl_vars['is_pledge_payment']): ?>
    <div class="crm-section <?php echo $this->_tpl_vars['form']['pledge_amount']['name']; ?>
-section">
      <div class="label"><?php echo $this->_tpl_vars['form']['pledge_amount']['label']; ?>
&nbsp;<span class="marker">*</span></div>
      <div class="content"><?php echo $this->_tpl_vars['form']['pledge_amount']['html']; ?>
</div>
      <div class="clear"></div>
    </div>
      <?php else: ?>
    <div class="crm-section <?php echo $this->_tpl_vars['form']['is_pledge']['name']; ?>
-section">
      <div class="label">&nbsp;</div>
      <div class="content">
        <?php echo $this->_tpl_vars['form']['is_pledge']['html']; ?>
&nbsp;
        <?php if ($this->_tpl_vars['is_pledge_interval']): ?>
          <?php echo $this->_tpl_vars['form']['pledge_frequency_interval']['html']; ?>
&nbsp;
        <?php endif; ?>
        <?php echo $this->_tpl_vars['form']['pledge_frequency_unit']['html']; ?>
<span id="pledge_installments_num">&nbsp;<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>for<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>&nbsp;<?php echo $this->_tpl_vars['form']['pledge_installments']['html']; ?>
&nbsp;<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>installments.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
      </div>
      <div class="clear"></div>
    </div>
    <?php endif; ?>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['form']['is_recur']): ?>
  <div class="crm-section <?php echo $this->_tpl_vars['form']['is_recur']['name']; ?>
-section">
    <div class="label">&nbsp;</div>
    <div class="content">
      <?php echo $this->_tpl_vars['form']['is_recur']['html']; ?>
 <?php echo $this->_tpl_vars['form']['is_recur']['label']; ?>
 <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>every<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      <?php if ($this->_tpl_vars['is_recur_interval']): ?>
        <?php echo $this->_tpl_vars['form']['frequency_interval']['html']; ?>

      <?php endif; ?>
      <?php if ($this->_tpl_vars['one_frequency_unit']): ?>
        <?php echo $this->_tpl_vars['frequency_unit']; ?>

        <?php else: ?>
        <?php echo $this->_tpl_vars['form']['frequency_unit']['html']; ?>

      <?php endif; ?>
      <?php if ($this->_tpl_vars['is_recur_installments']): ?>
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>for<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo $this->_tpl_vars['form']['installments']['html']; ?>
 <?php echo $this->_tpl_vars['form']['installments']['label']; ?>

      <?php endif; ?>
    </div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['pcpSupporterText']): ?>
  <div class="crm-section pcpSupporterText-section">
    <div class="label">&nbsp;</div>
    <div class="content"><?php echo $this->_tpl_vars['pcpSupporterText']; ?>
</div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
  <?php $this->assign('n', "email-".($this->_tpl_vars['bltID'])); ?>
  <div class="crm-section <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name']; ?>
-section">
    <div class="label"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['label']; ?>
</div>
    <div class="content">
      <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']; ?>

    </div>
    <div class="clear"></div>
  </div>

  <?php if ($this->_tpl_vars['form']['is_for_organization']): ?>
  <div class="crm-section <?php echo $this->_tpl_vars['form']['is_for_organization']['name']; ?>
-section">
    <div class="label">&nbsp;</div>
    <div class="content">
      <?php echo $this->_tpl_vars['form']['is_for_organization']['html']; ?>
&nbsp;<?php echo $this->_tpl_vars['form']['is_for_organization']['label']; ?>

    </div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['is_for_organization']): ?>
  <div id='onBehalfOfOrg' class="crm-section">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/OnBehalfOf.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
  <?php endif; ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/CMSUser.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/PremiumBlock.tpl", 'smarty_include_vars' => array('context' => 'makeContribution')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <?php if ($this->_tpl_vars['honor_block_is_active']): ?>
  <fieldset class="crm-group honor_block-group">
    <legend><?php echo $this->_tpl_vars['honor_block_title']; ?>
</legend>
    <div class="crm-section honor_block_text-section">
      <?php echo $this->_tpl_vars['honor_block_text']; ?>

    </div>
    <?php if ($this->_tpl_vars['form']['honor_type_id']['html']): ?>
      <div class="crm-section <?php echo $this->_tpl_vars['form']['honor_type_id']['name']; ?>
-section">
        <div class="content" >
          <?php echo $this->_tpl_vars['form']['honor_type_id']['html']; ?>

          <span class="crm-clear-link">(<a href="#" title="unselect" onclick="unselectRadio('honor_type_id', '<?php echo $this->_tpl_vars['form']['formName']; ?>
');enableHonorType(); return false;"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>clear<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>)</span>
          <div class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please include the name, and / or email address of the person you are honoring.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
        </div>
      </div>
    <?php endif; ?>
    <div id="honorType" class="honoree-name-email-section">
      <div class="crm-section <?php echo $this->_tpl_vars['form']['honor_prefix_id']['name']; ?>
-section">
        <div class="content"><?php echo $this->_tpl_vars['form']['honor_prefix_id']['html']; ?>
</div>
      </div>
      <div class="crm-section <?php echo $this->_tpl_vars['form']['honor_first_name']['name']; ?>
-section">
        <div class="label"><?php echo $this->_tpl_vars['form']['honor_first_name']['label']; ?>
</div>
        <div class="content">
          <?php echo $this->_tpl_vars['form']['honor_first_name']['html']; ?>

        </div>
        <div class="clear"></div>
      </div>
      <div class="crm-section <?php echo $this->_tpl_vars['form']['honor_last_name']['name']; ?>
-section">
        <div class="label"><?php echo $this->_tpl_vars['form']['honor_last_name']['label']; ?>
</div>
        <div class="content">
          <?php echo $this->_tpl_vars['form']['honor_last_name']['html']; ?>

        </div>
        <div class="clear"></div>
      </div>
      <div id="honorTypeEmail" class="crm-section <?php echo $this->_tpl_vars['form']['honor_email']['name']; ?>
-section">
        <div class="label"><?php echo $this->_tpl_vars['form']['honor_email']['label']; ?>
</div>
        <div class="content">
          <?php echo $this->_tpl_vars['form']['honor_email']['html']; ?>

        </div>
        <div class="clear"></div>
      </div>
    </div>
  </fieldset>
  <?php endif; ?>

  <div class="crm-group custom_pre_profile-group">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/UF/Form/Block.tpl", 'smarty_include_vars' => array('fields' => $this->_tpl_vars['customPre'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>

  <?php if ($this->_tpl_vars['pcp']): ?>
  <fieldset class="crm-group pcp-group">
    <div class="crm-section pcp-section">
      <div class="crm-section display_in_roll-section">
        <div class="content">
          <?php echo $this->_tpl_vars['form']['pcp_display_in_roll']['html']; ?>
 &nbsp;
          <?php echo $this->_tpl_vars['form']['pcp_display_in_roll']['label']; ?>

        </div>
        <div class="clear"></div>
      </div>
      <div id="nameID" class="crm-section is_anonymous-section">
        <div class="content">
          <?php echo $this->_tpl_vars['form']['pcp_is_anonymous']['html']; ?>

        </div>
        <div class="clear"></div>
      </div>
      <div id="nickID" class="crm-section pcp_roll_nickname-section">
        <div class="label"><?php echo $this->_tpl_vars['form']['pcp_roll_nickname']['label']; ?>
</div>
        <div class="content"><?php echo $this->_tpl_vars['form']['pcp_roll_nickname']['html']; ?>

          <div class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter the name you want listed with this contribution. You can use a nick name like 'The Jones Family' or 'Sarah and Sam'.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
        </div>
        <div class="clear"></div>
      </div>
      <div id="personalNoteID" class="crm-section pcp_personal_note-section">
        <div class="label"><?php echo $this->_tpl_vars['form']['pcp_personal_note']['label']; ?>
</div>
        <div class="content">
          <?php echo $this->_tpl_vars['form']['pcp_personal_note']['html']; ?>

          <div class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter a message to accompany this contribution.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </fieldset>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['form']['payment_processor']['label']): ?>
    <fieldset class="crm-group payment_options-group" style="display:none;">
    <legend><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Payment Options<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></legend>
    <div class="crm-section payment_processor-section">
      <div class="label"><?php echo $this->_tpl_vars['form']['payment_processor']['label']; ?>
</div>
      <div class="content"><?php echo $this->_tpl_vars['form']['payment_processor']['html']; ?>
</div>
      <div class="clear"></div>
    </div>
  </fieldset>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['is_pay_later']): ?>
  <fieldset class="crm-group pay_later-group">
    <legend><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Payment Options<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></legend>
    <div class="crm-section pay_later_receipt-section">
      <div class="label">&nbsp;</div>
      <div class="content">
        [x] <?php echo $this->_tpl_vars['pay_later_text']; ?>

      </div>
      <div class="clear"></div>
    </div>
  </fieldset>
  <?php endif; ?>

  <div id="billing-payment-block">
        <?php if ($this->_tpl_vars['ppType']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/Main.tpl", 'smarty_include_vars' => array('snippet' => 4)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
  </div>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/paymentBlock.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <div class="crm-group custom_post_profile-group">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/UF/Form/Block.tpl", 'smarty_include_vars' => array('fields' => $this->_tpl_vars['customPost'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>

  <?php if ($this->_tpl_vars['is_monetary'] && $this->_tpl_vars['form']['bank_account_number']): ?>
  <div id="payment_notice">
    <fieldset class="crm-group payment_notice-group">
      <legend><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Agreement<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></legend>
      <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your account data will be used to charge your bank account via direct debit. While submitting this form you agree to the charging of your bank account via direct debit.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    </fieldset>
  </div>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['isCaptcha']): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/common/ReCAPTCHA.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>
  <div id="crm-submit-buttons" class="crm-submit-buttons">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
  <?php if ($this->_tpl_vars['footer_text']): ?>
  <div id="footer_text" class="crm-section contribution_footer_text-section">
    <p><?php echo $this->_tpl_vars['footer_text']; ?>
</p>
  </div>
  <?php endif; ?>
</div>

<script type="text/javascript">
  <?php if ($this->_tpl_vars['pcp']): ?>
  pcpAnonymous();
  <?php endif; ?>

  <?php echo '
  if ('; ?>
"<?php echo $this->_tpl_vars['form']['is_recur']; ?>
"<?php echo ') {
    if (document.getElementsByName("is_recur")[0].checked == true) {
      window.onload = function() {
        enablePeriod();
      }
    }
  }

  function enablePeriod ( ) {
    var frqInt  = '; ?>
"<?php echo $this->_tpl_vars['form']['frequency_interval']; ?>
"<?php echo ';
    if ( document.getElementsByName("is_recur")[0].checked == true ) {
      //get back to auto renew settings.
      var allowAutoRenew = '; ?>
'<?php echo $this->_tpl_vars['allowAutoRenewMembership']; ?>
'<?php echo ';
      if ( allowAutoRenew && cj("#auto_renew") ) {
        showHideAutoRenew( null );
      }
    }
    else {
      //disabled auto renew settings.
    var allowAutoRenew = '; ?>
'<?php echo $this->_tpl_vars['allowAutoRenewMembership']; ?>
'<?php echo ';
      if ( allowAutoRenew && cj("#auto_renew") ) {
        cj("#auto_renew").attr( \'checked\', false );
        cj(\'#allow_auto_renew\').hide( );
      }
    }
  }

  '; ?>

  <?php if ($this->_tpl_vars['relatedOrganizationFound'] && $this->_tpl_vars['reset']): ?>
    cj( "#is_for_organization" ).attr( 'checked', true );
    showOnBehalf(false);
  <?php elseif ($this->_tpl_vars['onBehalfRequired']): ?>
    showOnBehalf(true);
  <?php endif; ?>

  <?php if ($this->_tpl_vars['honor_block_is_active'] && $this->_tpl_vars['form']['honor_type_id']['html']): ?>
    enableHonorType();
  <?php endif; ?>
  <?php echo '

  function enableHonorType( ) {
    var element = document.getElementsByName("honor_type_id");
    for (var i = 0; i < element.length; i++ ) {
      var isHonor = false;
      if ( element[i].checked == true ) {
        var isHonor = true;
        break;
      }
    }
    if ( isHonor ) {
      cj(\'#honorType\').show();
      cj(\'#honorTypeEmail\').show();
    }
    else {
      document.getElementById(\'honor_first_name\').value = \'\';
      document.getElementById(\'honor_last_name\').value  = \'\';
      document.getElementById(\'honor_email\').value      = \'\';
      document.getElementById(\'honor_prefix_id\').value  = \'\';
      cj(\'#honorType\').hide();
      cj(\'#honorTypeEmail\').hide();
    }
  }

  function pcpAnonymous( ) {
    // clear nickname field if anonymous is true
    if (document.getElementsByName("pcp_is_anonymous")[1].checked) {
      document.getElementById(\'pcp_roll_nickname\').value = \'\';
    }
    if (!document.getElementsByName("pcp_display_in_roll")[0].checked) {
      cj(\'#nickID\').hide();
      cj(\'#nameID\').hide();
      cj(\'#personalNoteID\').hide();
    }
    else {
      if (document.getElementsByName("pcp_is_anonymous")[0].checked) {
        cj(\'#nameID\').show();
        cj(\'#nickID\').show();
        cj(\'#personalNoteID\').show();
      }
      else {
        cj(\'#nameID\').show();
        cj(\'#nickID\').hide();
        cj(\'#personalNoteID\').hide();
      }
    }
  }

  '; ?>

  <?php if ($this->_tpl_vars['form']['is_pay_later'] && $this->_tpl_vars['paymentProcessor']['payment_processor_type'] == 'PayPal_Express'): ?>
  showHidePayPalExpressOption();
  <?php endif; ?>
  <?php echo '

  function toggleConfirmButton() {
    var payPalExpressId = "'; ?>
<?php echo $this->_tpl_vars['payPalExpressId']; ?>
<?php echo '";
    var elementObj = cj(\'input[name="payment_processor"]\');
    if ( elementObj.attr(\'type\') == \'hidden\' ) {
      var processorTypeId = elementObj.val( );
    }
    else {
      var processorTypeId = elementObj.filter(\':checked\').val();
    }

    if (payPalExpressId !=0 && payPalExpressId == processorTypeId) {
      cj("#crm-submit-buttons").hide();
    }
    else {
      cj("#crm-submit-buttons").show();
    }
  }

  cj(\'input[name="payment_processor"]\').change( function() {
    toggleConfirmButton();
  });

  cj(function() {
    toggleConfirmButton();
  });

  function showHidePayPalExpressOption() {
    if (cj(\'input[name="is_pay_later"]\').is(\':checked\')) {
      cj("#crm-submit-buttons").show();
      cj("#paypalExpress").hide();
    }
    else {
      cj("#paypalExpress").show();
      cj("#crm-submit-buttons").hide();
    }
  }

  cj(function(){
    // highlight price sets
    function updatePriceSetHighlight() {
      cj(\'#priceset .price-set-row\').removeClass(\'highlight\');
      cj(\'#priceset .price-set-row input:checked\').parent().parent().addClass(\'highlight\');
    }
    cj(\'#priceset input[type="radio"]\').change(updatePriceSetHighlight);
    updatePriceSetHighlight();
  });
  '; ?>

</script>
<?php endif; ?>
