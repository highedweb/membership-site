<?php /* Smarty version 2.6.27, created on 2013-11-01 20:56:44
         compiled from CRM/Contribute/Form/ContributionPage/ThankYou.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Contribute/Form/ContributionPage/ThankYou.tpl', 26, false),)), $this); ?>
<?php ob_start(); ?><span class="marker"  title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This field is required.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">*</span><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('reqMark', ob_get_contents());ob_end_clean(); ?>
<div class="crm-block crm-form-block crm-contribution-contributionpage-thankyou-form-block">
<div id="help">
    <p><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Use this form to configure the thank-you message and receipting options. Contributors will see a confirmation and thank-you page after whenever an online contribution is successfully processed. You provide the content and layout of the thank-you section below. You also control whether an electronic receipt is automatically emailed to each contributor - and can add a custom message to that receipt.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
</div>
    <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'top')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
    <table class="form-layout-compressed">
    <tr class="crm-contribution-contributionpage-thankyou-form-block-thankyou_title">
       <td class="label"><?php echo $this->_tpl_vars['form']['thankyou_title']['label']; ?>
<?php if ($this->_tpl_vars['action'] == 2): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_contribution_page','field' => 'thankyou_title','id' => $this->_tpl_vars['contributionPageID'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
       <td class="html-adjust"><?php echo $this->_tpl_vars['form']['thankyou_title']['html']; ?>
<br />
           <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This title will be displayed at the top of the thank-you / transaction confirmation page.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
       </td>
    </tr>
    <tr class="crm-contribution-contributionpage-thankyou-form-block-thankyou_text">
       <td class="label"><?php echo $this->_tpl_vars['form']['thankyou_text']['label']; ?>
<?php if ($this->_tpl_vars['action'] == 2): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_contribution_page','field' => 'thankyou_text','id' => $this->_tpl_vars['contributionPageID'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
       <td class="html-adjust"><?php echo $this->_tpl_vars['form']['thankyou_text']['html']; ?>
<br />
            <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter text (and optional HTML layout tags) for the thank-you message that will appear at the top of the confirmation page.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
       </td>
    </tr>
    <tr class="crm-contribution-contributionpage-thankyou-form-block-thankyou_footer">
       <td class="label"><?php echo $this->_tpl_vars['form']['thankyou_footer']['label']; ?>
<?php if ($this->_tpl_vars['action'] == 2): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_contribution_page','field' => 'thankyou_footer','id' => $this->_tpl_vars['contributionPageID'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
       <td class="html-adjust"><?php echo $this->_tpl_vars['form']['thankyou_footer']['html']; ?>
<br />
            <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter link(s) and/or text that you want to appear at the bottom of the thank-you page. You can use this content area to encourage contributors to visit a tell-a-friend page or take some other action.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
       </td>
    </tr>
    <tr class="crm-contribution-contributionpage-thankyou-form-block-is_email_receipt">
       <td class="label"></td>
       <td class="html-adjust"><?php echo $this->_tpl_vars['form']['is_email_receipt']['html']; ?>
<?php echo $this->_tpl_vars['form']['is_email_receipt']['label']; ?>
<br />
            <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Check this box if you want an electronic receipt to be sent automatically.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
       </td>
    </tr>
    </table>
    <table id="receiptDetails" class="form-layout-compressed">
    <tr class="crm-contribution-contributionpage-thankyou-form-block-receipt_from_name">
  <td class="label"><?php echo $this->_tpl_vars['form']['receipt_from_name']['label']; ?>
<?php if ($this->_tpl_vars['action'] == 2): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_contribution_page','field' => 'receipt_from_name','id' => $this->_tpl_vars['contributionPageID'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>
      </td>
      <td class="html-adjust"><?php echo $this->_tpl_vars['form']['receipt_from_name']['html']; ?>
<br />
          <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter the FROM name to be used when receipts are emailed to contributors.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
  </td>
    </tr>
    <tr class="crm-contribution-contributionpage-thankyou-form-block-receipt_from_email">
  <td class="label"><?php echo $this->_tpl_vars['form']['receipt_from_email']['label']; ?>
<?php echo $this->_tpl_vars['reqMark']; ?>

  </td>
  <td class="html-adjust"><?php echo $this->_tpl_vars['form']['receipt_from_email']['html']; ?>
<br />
      <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter the FROM email address to be used when receipts are emailed to contributors.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
  </td>
    </tr>
    <tr class="crm-contribution-contributionpage-thankyou-form-block-receipt_text">
  <td class="label"><?php echo $this->_tpl_vars['form']['receipt_text']['label']; ?>
<?php if ($this->_tpl_vars['action'] == 2): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_contribution_page','field' => 'receipt_text','id' => $this->_tpl_vars['contributionPageID'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>
  </td>
  <td class="html-adjust"><?php echo $this->_tpl_vars['form']['receipt_text']['html']; ?>
<br />
      <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter a message you want included at the beginning of emailed receipts. NOTE: This text will be included in both TEXT and HTML versions of receipt emails so we do not recommend including HTML tags / formatting here.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br /></span>
  </td>
    </tr>
    <tr class="crm-contribution-contributionpage-thankyou-form-block-cc_receipt">
  <td class="label"><?php echo $this->_tpl_vars['form']['cc_receipt']['label']; ?>

      </td>
  <td class="html-adjust"><?php echo $this->_tpl_vars['form']['cc_receipt']['html']; ?>
<br />
      <span  class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If you want member(s) of your organization to receive a carbon copy of each emailed receipt, enter one or more email addresses here. Multiple email addresses should be separated by a comma (e.g. jane@example.org, paula@example.org).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </span>
  </td>
    </tr>
    <tr class="crm-contribution-contributionpage-thankyou-form-block-bcc_receipt">
  <td class="label"><?php echo $this->_tpl_vars['form']['bcc_receipt']['label']; ?>

  </td>
  <td class="html-adjust"><?php echo $this->_tpl_vars['form']['bcc_receipt']['html']; ?>
<br />
      <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If you want member(s) of your organization to receive a BLIND carbon copy of each emailed receipt, enter one or more email addresses here. Multiple email addresses should be separated by a comma (e.g. jane@example.org, paula@example.org).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
  </td>
    </tr>
    </table>
    <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
</div>

<script type="text/javascript">
 showReceipt();
 <?php echo '
     function showReceipt() {
        var checkbox = document.getElementsByName("is_email_receipt");
        if (checkbox[0].checked) {
            document.getElementById("receiptDetails").style.display = "block";
        } else {
            document.getElementById("receiptDetails").style.display = "none";
        }
     }
 '; ?>

</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formNavigate.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
