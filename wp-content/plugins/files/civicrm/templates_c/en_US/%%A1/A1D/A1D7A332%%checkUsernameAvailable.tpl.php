<?php /* Smarty version 2.6.27, created on 2013-10-31 04:23:38
         compiled from CRM/common/checkUsernameAvailable.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/common/checkUsernameAvailable.tpl', 45, false),array('function', 'crmURL', 'CRM/common/checkUsernameAvailable.tpl', 64, false),)), $this); ?>
<?php echo '
var lastName = null;
cj("#checkavailability").click(function() {
   var cmsUserName = cj.trim(cj("#cms_name").val());
   if ( lastName == cmsUserName) {
   /*if user checking the same user name more than one times. avoid the ajax call*/
   return;
   }
   /*don\'t allow special character and for joomla minimum username length is two*/

   var spchar = "\\<|\\>|\\"|\\\'|\\%|\\;|\\(|\\)|\\&|\\\\\\\\|\\/";

   '; ?>
<?php if ($this->_tpl_vars['config']->userSystem->is_drupal == '1'): ?><?php echo '
   spchar = spchar + "|\\~|\\`|\\:|\\@|\\!|\\=|\\#|\\$|\\^|\\*|\\{|\\}|\\\\[|\\\\]|\\+|\\?|\\,";
   '; ?>
<?php endif; ?><?php echo '
   var r = new RegExp( "["+spchar+"]", "i");
   /*regular expression \\\\ matches a single backslash. this becomes r = /\\\\/ or r = new RegExp("\\\\\\\\").*/
   if ( r.exec(cmsUserName) ) {
   alert(\''; ?>
<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your username contains invalid characters<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '\');
      return;
   }
   '; ?>
<?php if ($this->_tpl_vars['config']->userFramework == 'Joomla'): ?><?php echo '
   else if ( cmsUserName && cmsUserName.length < 2 ) {
      alert(\''; ?>
<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your username is too short<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '\');
      return;
   }
   '; ?>
<?php endif; ?><?php echo '
   if (cmsUserName) {
   /*take all messages in javascript variable*/
   var check        = "'; ?>
<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Checking...<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '";
   var available    = "'; ?>
<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This username is currently available.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '";
   var notavailable = "'; ?>
<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This username is taken.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '";

      //remove all the class add the messagebox classes and start fading
      cj("#msgbox").removeClass().addClass(\'cmsmessagebox\').css({"color":"#000","backgroundColor":"#FFC","border":"1px solid #c93"}).text(check).fadeIn("slow");

      //check the username exists or not from ajax
   var contactUrl = '; ?>
"<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/ajax/cmsuser','h' => 0), $this);?>
"<?php echo ';

   cj.post(contactUrl,{ cms_name:cj("#cms_name").val() } ,function(data) {
      if ( data.name == "no") {/*if username not avaiable*/
         cj("#msgbox").fadeTo(200,0.1,function() {
      cj(this).html(notavailable).addClass(\'cmsmessagebox\').css({"color":"#CC0000","backgroundColor":"#F7CBCA","border":"1px solid #CC0000"}).fadeTo(900,1);
         });
      } else {
         cj("#msgbox").fadeTo(200,0.1,function() {
      cj(this).html(available).addClass(\'cmsmessagebox\').css({"color":"#008000","backgroundColor":"#C9FFCA", "border": "1px solid #349534"}).fadeTo(900,1);
         });
      }
   }, "json");
   lastName = cmsUserName;
   } else {
   cj("#msgbox").removeClass().text(\'\').css({"backgroundColor":"#FFFFFF", "border": "0px #FFFFFF"}).fadeIn("fast");
   }
});
'; ?>
