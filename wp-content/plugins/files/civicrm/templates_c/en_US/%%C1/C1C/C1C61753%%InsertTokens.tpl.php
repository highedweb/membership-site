<?php /* Smarty version 2.6.27, created on 2013-11-04 01:12:56
         compiled from CRM/Mailing/Form/InsertTokens.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Mailing/Form/InsertTokens.tpl', 1, false),array('block', 'ts', 'CRM/Mailing/Form/InsertTokens.tpl', 374, false),array('function', 'crmURL', 'CRM/Mailing/Form/InsertTokens.tpl', 147, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['config']->resourceBase; ?>
packages/jquery/plugins/jquery-fieldselection.js"></script>

<script type="text/javascript">
var text_message = null;
var html_message = null;
var isPDF        = false;
var isMailing    = false;


<?php if ($this->_tpl_vars['form']['formName'] == 'MessageTemplates'): ?>
  <?php echo '
  text_message = "msg_text";
  html_message = "msg_html";
  '; ?>

  <?php elseif ($this->_tpl_vars['form']['formName'] == 'Address'): ?>
  <?php echo '
  text_message = "mailing_format";
  isMailing = false;
  '; ?>

  <?php else: ?>
  <?php echo '
  text_message = "text_message";
  html_message = (cj("#edit-html-message-value").length > 0) ? "edit-html-message-value" : "html_message";
  isMailing    = true;
  '; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['form']['formName'] == 'PDF'): ?>
  <?php echo '
  isPDF = true;
  '; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['templateSelected']): ?>
  <?php echo '
  if ( document.getElementsByName("saveTemplate")[0].checked ) {
    document.getElementById(\'template\').selectedIndex = '; ?>
<?php echo $this->_tpl_vars['templateSelected']; ?>
<?php echo ';
  }
'; ?>

<?php endif; ?>
<?php echo '

var editor = '; ?>
"<?php echo $this->_tpl_vars['editor']; ?>
"<?php echo ';
function showSaveUpdateChkBox() {
  if (document.getElementById(\'template\') == null) {
    if (document.getElementsByName("saveTemplate")[0].checked){
      document.getElementById("saveDetails").style.display = "block";
      document.getElementById("editMessageDetails").style.display = "block";
    }
    else {
      document.getElementById("saveDetails").style.display = "none";
      document.getElementById("editMessageDetails").style.display = "none";
    }
    return;
  }

  if (document.getElementsByName("saveTemplate")[0].checked &&
    document.getElementsByName("updateTemplate")[0].checked == false) {
    document.getElementById("updateDetails").style.display = "none";
  }
  else if ( document.getElementsByName("saveTemplate")[0].checked &&
    document.getElementsByName("updateTemplate")[0].checked ){
    document.getElementById("editMessageDetails").style.display = "block";
    document.getElementById("saveDetails").style.display = "block";
  }
  else if ( document.getElementsByName("saveTemplate")[0].checked == false &&
      document.getElementsByName("updateTemplate")[0].checked ) {
    document.getElementById("saveDetails").style.display = "none";
    document.getElementById("editMessageDetails").style.display = "block";
  }
  else {
    document.getElementById("saveDetails").style.display = "none";
    document.getElementById("editMessageDetails").style.display = "none";
  }
}

function selectValue( val ) {
  document.getElementsByName("saveTemplate")[0].checked = false;
  document.getElementsByName("updateTemplate")[0].checked = false;
  showSaveUpdateChkBox();
  if ( !val ) {
    document.getElementById("subject").value ="";
    if ( !isPDF ) {
      document.getElementById(text_message).value ="";
    }
    if ( editor == "ckeditor" ) {
      oEditor = CKEDITOR.instances[html_message];
      oEditor.setData(\'\');
    }
    else if ( editor == "tinymce" ) {
      tinyMCE.getInstanceById(html_message).setContent( html_body );
    }
    else if ( editor == "joomlaeditor" ) {
      document.getElementById(html_message).value = \'\' ;
      tinyMCE.execCommand(\'mceSetContent\',false, \'\');
    }
    else if ( editor =="drupalwysiwyg" ) {
      if (Drupal.wysiwyg.instances[html_message].setContent) {
        Drupal.wysiwyg.instances[html_message].setContent(html_body);
      }
      // @TODO: Remove this when http://drupal.org/node/614146 drops
      else if (Drupal.wysiwyg.instances[html_message].insert) {
        alert("Please note your editor doesn\'t completely support this function. You may need to clear the contents of the editor prior to choosing a new template.");
        Drupal.wysiwyg.instances[html_message].insert(html_body);
      }
      else {
        alert("Sorry, your editor doesn\'t support this function yet.");
      }
    }
    else {
      document.getElementById(html_message).value = \'\' ;
    }
    if ( isPDF ) {
      showBindFormatChkBox();
    }
    return;
  }

  var dataUrl = '; ?>
"<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/ajax/template','h' => 0), $this);?>
"<?php echo ';

  cj.post( dataUrl, {tid: val}, function( data ) {
    cj("#subject").val( data.subject );
    if ( !isPDF ) {
      if ( data.msg_text ) {
        cj("#"+text_message).val( data.msg_text );
        cj("div.text").show();
        cj(".head").find(\'span\').removeClass().addClass(\'ui-icon ui-icon-triangle-1-s\');
        cj("#helptext").show();
      }
      else {
        cj("#"+text_message).val("");
      }
    }
    var html_body  = "";
    if (  data.msg_html ) {
      html_body = data.msg_html;
    }

    if (editor == "ckeditor") {
      oEditor = CKEDITOR.instances[html_message];
      oEditor.setData( html_body );
    }
    else if (editor == "tinymce") {
      tinyMCE.execInstanceCommand(\'html_message\',"mceInsertContent",false, html_body );
    }
    else if (editor == "joomlaeditor") {
      cj("#"+ html_message).val( html_body );
      tinyMCE.execCommand(\'mceSetContent\',false, html_body);
    }
    else if ( editor =="drupalwysiwyg") {
      if (Drupal.wysiwyg.instances[html_message].setContent) {
        Drupal.wysiwyg.instances[html_message].setContent(html_body);
      }
      // @TODO: Remove this when http://drupal.org/node/614146 drops
      else if (Drupal.wysiwyg.instances[html_message].insert) {
        alert("Please note your editor doesn\'t completely support this function. You may need to clear the contents of the editor prior to choosing a new template.");
        Drupal.wysiwyg.instances[html_message].insert(html_body);
      }
      else {
        alert("Sorry, your editor doesn\'t support this function yet.");
      }
    }
    else {
      cj("#"+ html_message).val( html_body );
    }
    if (isPDF) {
      var bind = data.pdf_format_id ? true : false ;
      selectFormat( data.pdf_format_id, bind );
      if (!bind) {
        document.getElementById("bindFormat").style.display = "none";
      }
    }
  }, \'json\');
}

if ( isMailing ) {
  document.getElementById("editMessageDetails").style.display = "block";

  function verify(select) {
    if (document.getElementsByName("saveTemplate")[0].checked  == false) {
      document.getElementById("saveDetails").style.display = "none";
    }
    document.getElementById("editMessageDetails").style.display = "block";

    var templateExists = true;
    if (document.getElementById(\'template\') == null) {
      templateExists = false;
    }

    if (templateExists && document.getElementById(\'template\').value) {
      document.getElementById("updateDetails").style.display = \'\';
    }
    else {
      document.getElementById("updateDetails").style.display = \'none\';
    }

    document.getElementById("saveTemplateName").disabled = false;
  }

  function showSaveDetails(chkbox) {
    if (chkbox.checked) {
      document.getElementById("saveDetails").style.display = "block";
      document.getElementById("saveTemplateName").disabled = false;
    }
    else {
      document.getElementById("saveDetails").style.display = "none";
      document.getElementById("saveTemplateName").disabled = true;
    }
  }

  showSaveUpdateChkBox();

  '; ?>

  <?php if ($this->_tpl_vars['editor'] == 'ckeditor'): ?>
  <?php echo '
    cj( function() {
      oEditor = CKEDITOR.instances[\'html_message\'];
      oEditor.BaseHref = \'\' ;
      oEditor.UserFilesPath = \'\' ;
      oEditor.on( \'focus\', verify );
    });
  '; ?>

  <?php elseif ($this->_tpl_vars['editor'] == 'tinymce'): ?>
  <?php echo '
    cj( function( ) {
      if ( isMailing ) {
        cj(\'div.html\').hover(
          function( ) {
            if ( tinyMCE.get(html_message) ) {
              tinyMCE.get(html_message).onKeyUp.add(function() {
                verify( );
              });
            }
          },
          function( ) {
            if ( tinyMCE.get(html_message) ) {
              if ( tinyMCE.get(html_message).getContent() ) {
                verify( );
              }
            }
          }
        );
      }
    });
  '; ?>

  <?php elseif ($this->_tpl_vars['editor'] == 'drupalwysiwyg'): ?>
  <?php echo '
    cj( function( ) {
      if ( isMailing ) {
        cj(\'div.html\').hover(
          verify,
          verify
        );
      }
    });
  '; ?>

  <?php endif; ?>
  <?php echo '
}

function tokenReplText(element) {
  var token     = cj("#"+element.id).val( )[0];
  if ( element.id == \'token3\' ) {
    ( isMailing ) ? text_message = "subject" : text_message = "msg_subject";
  }
  else if ( element.id == \'token1\' ) {
    ( isMailing ) ? text_message = "text_message" : text_message = "msg_text";
  }

  cj( "#"+ text_message ).replaceSelection( token );

  if ( isMailing ) {
    verify();
  }
}

function tokenReplHtml() {
  var token2     = cj("#token2").val( )[0];
  var editor     = '; ?>
"<?php echo $this->_tpl_vars['editor']; ?>
"<?php echo ';
  if ( editor == "tinymce" ) {
    tinyMCE.execInstanceCommand(\'html_message\',"mceInsertContent",false, token2 );
  }
  else if ( editor == "joomlaeditor" ) {
    tinyMCE.execCommand(\'mceInsertContent\',false, token2);
    var msg       = document.getElementById(html_message).value;
    var cursorlen = document.getElementById(html_message).selectionStart;
    var textlen   = msg.length;
    document.getElementById(html_message).value = msg.substring(0, cursorlen) + token2 + msg.substring(cursorlen, textlen);
    var cursorPos = (cursorlen + token2.length);
    document.getElementById(html_message).selectionStart = cursorPos;
    document.getElementById(html_message).selectionEnd   = cursorPos;
    document.getElementById(html_message).focus();
  }
  else if ( editor == "ckeditor" ) {
    oEditor = CKEDITOR.instances[html_message];
    oEditor.insertHtml(token2.toString() );
  }
  else if ( editor == "drupalwysiwyg" ) {
    if (Drupal.wysiwyg.instances[html_message].insert) {
      Drupal.wysiwyg.instances[html_message].insert(token2.toString() );
    }
    else {
      alert("Sorry, your editor doesn\'t support this function yet.");
    }
  }
  else {
    cj( "#"+ html_message ).replaceSelection( token2 );
  }

  if ( isMailing ) {
    verify();
  }
}

cj(function() {
  cj(\'.accordion .head\').addClass( "ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ");
  cj(\'.resizable-textarea textarea\').css( \'width\', \'99%\' );
  cj(\'.grippie\').css( \'margin-right\', \'3px\');
  cj(\'.accordion .head\').hover( function() { cj(this).addClass( "ui-state-hover");
  }, function() { cj(this).removeClass( "ui-state-hover");
  }).bind(\'click\', function() {
    var checkClass = cj(this).find(\'span\').attr( \'class\' );
    var len        = checkClass.length;
    if ( checkClass.substring( len - 1, len ) == \'s\' ) {
      cj(this).find(\'span\').removeClass().addClass(\'ui-icon ui-icon-triangle-1-e\');
      cj("span#help"+cj(this).find(\'span\').attr(\'id\')).hide();
    }
    else {
      cj(this).find(\'span\').removeClass().addClass(\'ui-icon ui-icon-triangle-1-s\');
      cj("span#help"+cj(this).find(\'span\').attr(\'id\')).show();
    }
    cj(this).next().toggle(); return false;
  }).next().hide();
  cj(\'span#html\').removeClass().addClass(\'ui-icon ui-icon-triangle-1-s\');
  cj("div.html").show();

  if ( !isMailing ) {
    cj("div.text").show();
  }
});

'; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/Filter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '
function showToken(element, id ) {
  initFilter(id);
  cj("#token"+id).css({"width":"290px", "size":"8"});
  var tokenTitle = '; ?>
'<?php $this->_tag_stack[] = array('ts', array('escape' => 'js')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Select Token<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>'<?php echo ';
  cj("#token"+element ).show( ).dialog({
    title       : tokenTitle,
    modal       : true,
    width       : \'310px\',
    resizable   : false,
    bgiframe    : false,
    overlay     : { opacity: 0.5, background: "black" },
    beforeclose : function(event, ui) { cj(this).dialog("destroy"); },
    buttons     : {
      "Done": function() {
        cj(this).dialog("close");
        //focus on editor/textarea after token selection
        if (element == \'Text\') {
          cj(\'#\' + text_message).focus();
        }
        else if (element == \'Html\' ) {
          switch ('; ?>
"<?php echo $this->_tpl_vars['editor']; ?>
"<?php echo ') {
            case \'ckeditor\': { oEditor = CKEDITOR.instances[html_message]; oEditor.focus(); break;}
            case \'tinymce\'  : { tinyMCE.get(html_message).focus(); break; }
            case \'joomlaeditor\' : { tinyMCE.get(html_message).focus(); break; }
            default         : { cj("#"+ html_message).focus(); break; }
          }
        }
        else if (element == \'Subject\') {
          var subject = null;
          ( isMailing ) ? subject = "subject" : subject = "msg_subject";
          cj(\'#\'+subject).focus();
        }
      }
    }
  });
  return false;
}

cj(function() {
  if (!cj().find(\'div.crm-error\').text()) {
    cj(window).load(function () {
      setSignature();
    });
  }

  cj("#fromEmailAddress").change( function( ) {
    setSignature( );
  });
});

function setSignature( ) {
  var emailID = cj("#fromEmailAddress").val( );
  if ( !isNaN( emailID ) ) {
    var dataUrl = '; ?>
"<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/ajax/signature','h' => 0), $this);?>
"<?php echo ';
    cj.post( dataUrl, {emailID: emailID}, function( data ) {
      var editor     = '; ?>
"<?php echo $this->_tpl_vars['editor']; ?>
"<?php echo ';

      if (data.signature_text) {
        // get existing text & html and append signatue
        var textMessage =  cj("#"+ text_message).val( ) + \'\\n\\n--\\n\' + data.signature_text;

        // append signature
        cj("#"+ text_message).val( textMessage );
      }

      if ( data.signature_html ) {
        var htmlMessage =  cj("#"+ html_message).val( ) + \'<br/><br/>--<br/>\' + data.signature_html;

        // set wysiwg editor
        if ( editor == "ckeditor" ) {
          oEditor = CKEDITOR.instances[html_message];
          var htmlMessage = oEditor.getData( ) + \'<br/><br/>--\' + data.signature_html;
          oEditor.setData( htmlMessage  );
        }
        else if ( editor == "tinymce" ) {
          tinyMCE.execInstanceCommand(\'html_message\',"mceInsertContent",false, htmlMessage);
        }
        else if ( editor == "drupalwysiwyg" ) {
          if (Drupal.wysiwyg.instances[html_message].setContent) {
            Drupal.wysiwyg.instances[html_message].setContent(htmlMessage);
          }
          // @TODO: Remove this when http://drupal.org/node/614146 drops
          else if (Drupal.wysiwyg.instances[html_message].insert) {
            alert("Please note your editor doesn\'t completely support this function. You may need to clear the contents of the editor prior to choosing a new template.");
            Drupal.wysiwyg.instances[html_message].insert(htmlMessage);
          }
          else {
            alert("Sorry, your editor doesn\'t support this function yet.");
          }
        }
        else {
          cj("#"+ html_message).val(htmlMessage);
        }
      }
    }, \'json\');
  }
}
</script>
'; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>