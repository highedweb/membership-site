<?php /* Smarty version 2.6.27, created on 2013-11-01 20:58:08
         compiled from CRM/Friend/Form/Friend.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Friend/Form/Friend.tpl', 31, false),)), $this); ?>
<div id="form" class="crm-form-block crm-friend-manage-block">
<div id="help">
  <?php if ($this->_tpl_vars['context'] == 'Contribute'): ?>
    <?php $this->assign('enduser', 'contributor'); ?>
    <?php $this->assign('pageType', 'Online Contribution page'); ?>
    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tell a Friend gives your contributors an easy way to spread the word about this fundraising campaign. The contribution thank-you page will include a link to a form where they can enter their friends' email addresses, along with a personalized message. CiviCRM will record these solicitation activities, and will add the friends to your database.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
  <?php elseif ($this->_tpl_vars['context'] == 'Event'): ?>
    <?php $this->assign('enduser', 'participant'); ?>
    <?php $this->assign('pageType', 'Event Information page'); ?>
    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tell a Friend gives registering participants an easy way to spread the word about this event. The registration thank-you page will include a link to a form where they can enter their friends' email addresses, along with a personalized message. CiviCRM will record these solicitation activities, and will add the friends to your database.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
  <?php elseif ($this->_tpl_vars['context'] == 'Pledge'): ?>
    <?php $this->assign('enduser', 'pledge'); ?>
    <?php $this->assign('pageType', 'Pledge Information page'); ?>
    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tell a Friend gives registering pledge signers an easy way to spread the word about this pledge. The registration thank-you page will include a link to a form where they can enter their friends' email addresses, along with a personalized message. CiviCRM will record these solicitation activities, and will add the friends to your database.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
  <?php endif; ?>
  <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If sharing through social media is enabled, links allowing people to share with their social network will also be included on the Tell a Friend form (e.g. Facebook "Like", Google+, and Twitter). You can turn social media sharing on and off from the Settings tab.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>
   <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'top')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
    <table class="form-layout">
        <tr>
           <td></td>
        </tr>
        <tr class="crm-friend-manage-form-block-tf_is_active">
           <td class="label""><?php echo $this->_tpl_vars['form']['tf_is_active']['html']; ?>
</td>
           <td><?php echo $this->_tpl_vars['form']['tf_is_active']['label']; ?>
</td>
        </tr>
    </table>
    <div id="friendFields">
    <table class="form-layout">
        <tr class="crm-friend-manage-form-block-tf_title">
     <td class="label"><?php echo $this->_tpl_vars['form']['tf_title']['label']; ?>

         <?php if ($this->_tpl_vars['action'] == 2): ?>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_tell_friend','field' => 'title','id' => $this->_tpl_vars['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         <?php endif; ?>
           </td>
     <td><?php echo $this->_tpl_vars['form']['tf_title']['html']; ?>

     </td>
        </tr>
        <tr class="crm-friend-manage-form-block-intro">
     <td class="label"><?php echo $this->_tpl_vars['form']['intro']['label']; ?>

         <?php if ($this->_tpl_vars['action'] == 2): ?>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_tell_friend','field' => 'intro','id' => $this->_tpl_vars['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         <?php endif; ?>
     </td>
     <td><?php echo $this->_tpl_vars['form']['intro']['html']; ?>
<br />
               <span class="description"><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['enduser'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This message is displayed to the %1 at the top of the Tell a Friend form. You may include HTML tags to add formatting or links.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
         </span>
     </td>
        </tr>
        <tr class="crm-friend-manage-form-block-suggested_message">
     <td class="label"><?php echo $this->_tpl_vars['form']['suggested_message']['label']; ?>

         <?php if ($this->_tpl_vars['action'] == 2): ?>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_tell_friend','field' => 'suggested_message','id' => $this->_tpl_vars['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         <?php endif; ?>
     </td>
     <td><?php echo $this->_tpl_vars['form']['suggested_message']['html']; ?>
<br />
               <span class="description"><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['enduser'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Provides the %1 with suggested text for their personalized message to their friends.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
         </span>
     </td>
        </tr>
        <tr class="crm-friend-manage-form-block-general_link">
     <td class="label"><?php echo $this->_tpl_vars['form']['general_link']['label']; ?>
</td>
     <td><?php echo $this->_tpl_vars['form']['general_link']['html']; ?>
<br />
               <span class="description"><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['pageType'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>A link to this %1 is automatically included in the email sent to friends. If you ALSO want to include a link providing general information about your organization, enter that link here (e.g <em>http://www.example.org/</em>)<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
         </span>
     </td>
        </tr>
        <tr class="crm-friend-manage-form-block-thankyou_title">
           <td class="label"><?php echo $this->_tpl_vars['form']['tf_thankyou_title']['label']; ?>

         <?php if ($this->_tpl_vars['action'] == 2): ?>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_tell_friend','field' => 'tf_thankyou_title','id' => $this->_tpl_vars['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
     <td><?php echo $this->_tpl_vars['form']['tf_thankyou_title']['html']; ?>
</td>
        </tr>
        <tr class="crm-friend-manage-form-block-thankyou_text">
     <td class="label"><?php echo $this->_tpl_vars['form']['tf_thankyou_text']['label']; ?>

         <?php if ($this->_tpl_vars['action'] == 2): ?>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/I18n/Dialog.tpl', 'smarty_include_vars' => array('table' => 'civicrm_tell_friend','field' => 'tf_thankyou_text','id' => $this->_tpl_vars['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         <?php endif; ?>
     </td>
     <td><?php echo $this->_tpl_vars['form']['tf_thankyou_text']['html']; ?>
<br />
               <span class="description"><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['enduser'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your message thanking the %1 for helping to spread the word. You may include HTML tags to add formatting or links.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
         </span>
     </td>
        </tr>
    </table>
    </div>
  <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
</div>

<?php echo '
<script type="text/javascript">
  var is_act = document.getElementsByName(\'tf_is_active\');
    if ( ! is_act[0].checked) {
           cj(\'#friendFields\').hide();
  }
       function friendBlock(chkbox) {
           if (chkbox.checked) {
        cj(\'#friendFields\').show();
        return;
           } else {
        cj(\'#friendFields\').hide();
            return;
     }
       }
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formNavigate.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
