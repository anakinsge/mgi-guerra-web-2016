/* JCE Editor - 2.5.15 | 10 March 2016 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2016 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
(function($){$.WFBrowserWidget={options:{element:null,plugin:{plugin:'browser',root:'',site:'',help:function(e){var w=Math.max($('#browser').width(),768),h=Math.max($('#browser').height(),520);$.Dialog.iframe('Help','index.php?option=com_jce&view=help&tmpl=component&section=editor&category=browser',{width:w,height:h,onFrameLoad:function(){if($(this).width()<768){$(this).width(768);}}});}},manager:{upload:{insert:false},expandable:false}},init:function(options){var self=this,win=window.parent,doc=win.document;$.extend(true,this.options,options);$('<input type="hidden" id="src" value="" />').appendTo(document.body);$.Plugin.init(this.options.plugin);$('button#insert, button#cancel').hide();if(this.options.element){$('button#insert').show().click(function(e){self.insert();self.close();e.preventDefault();});$('button#cancel').show().click(function(e){self.close();e.preventDefault();});if(win.jQuery){var wrapper=win.jQuery('#'+this.options.element).parents('.field-media-wrapper').get(0);if(wrapper){$('button#cancel').hide();}}
var src='',el=doc.getElementById(this.options.element);if(el){src=el.value;}
$('#src').val(src);}
$.extend(this.options.manager,{onFileClick:function(e,file){var src=$(file).data('url');$('#src').val(src);}});WFBrowserWidget.init($.extend(this.options.manager,{}));},clean:function(s){s=$.trim(s);s=s.replace(/(\.){2,}/g,'');s=s.replace(/^\.|\.$/g,'');s=$.trim(s);return s;},insert:function(){if(this.options.element){var src=WFFileBrowser.getSelectedItems(0);var win=window.parent;var v=$('#src').val()||'';v=$.trim(v);if(win.jQuery){var wrapper=win.jQuery('#'+this.options.element).parents('.field-media-wrapper').get(0);if(wrapper){var inst=win.jQuery(wrapper).data('fieldMedia');if(inst){return inst.setValue(v);}}
win.jQuery('#'+this.options.element).val(v).change();}else{var el=win.document.getElementById(this.options.element);if(el){el.value=v;}}}},close:function(){var win=window.parent;if(typeof win.$jce!=='undefined'){return win.$jce.closeDialog('#'+this.options.element+'_browser');}
if(this.options.element&&typeof win.jQuery.fieldMedia!=='undefined'){var wrapper=win.jQuery('#'+this.options.element).parents('.field-media-wrapper').get(0);var inst=win.jQuery(wrapper).data('fieldMedia');if(inst){return inst.modalClose();}}
if(typeof win.jModalClose!=='undefined'){return win.jModalClose();}
if(typeof win.SqueezeBox!=='undefined'){return win.SqueezeBox.close();}}};})(jQuery);var tinyMCE={addI18n:function(p,o){return jQuery.Plugin.addI18n(p,o);}};var tinyMCEPopup={getLang:function(p,o){return tinyMCE.addI18n(p,o);},getParam:function(){},getWindowArg:function(element){}};