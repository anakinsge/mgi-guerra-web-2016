<?php defined( '_JEXEC' ) or die; 

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$fullwebbase = JUri::root();
$tpath = $fullwebbase.'templates/'.$this->template;
$templateparams	= $app->getTemplate(true)->params;
$logopath = $fullwebbase.'templates/'.$this->template.'/images/mgi-guerra-auditores-independientes-logo.png';
$sitename = $app->get('sitename');


// generator tag
$this->setGenerator(null);

// force latest IE & chrome frame
$doc->setMetadata('x-ua-compatible','IE=edge,chrome=1');

// js
JHtml::_('jquery.framework');
//$doc->addScript($tpath.'/js/bootstrap.min.js'); not neeed already addeeds by joomla
$doc->addScript($tpath.'/js/logic.js'); // <- use for custom script

//apple-touch-favicon
$iconsArray = array('57x57','60x60','72x72','76x76','114x114','120x120','144x144','152x152');
foreach($iconsArray as $size){
    $href = $tpath.'/favicon/apple-touch-icon-'.$size.'.png'; 
    $attribs = array('sizes' => $size); 
    $doc->addHeadLink( $href, 'apple-touch-icon-precomposed', 'rel', $attribs );
    //example print <link rel="apple-touch-icon-precomposed" sizes="57x57" href="http://www.mgiecuador.com/favicon/apple-touch-icon-57x57.png" />    
}
$iconsArray = array('16x16','32x32','96x96','128x128','196x196');
foreach($iconsArray as $size){
    $href = $tpath.'/favicon/favicon-'.$size.'.png'; 
    $attribs = array('sizes' => $size); 
    $doc->addHeadLink( $href, 'icon', 'rel', $attribs );
}
$doc->setMetaData( 'application-name', $sitename );
$doc->setMetaData( 'msapplication-config', $tpath.'/favicon/browserconfig.xml' );
$doc->addStyleSheet($tpath.'/css/bootstrap.min.css');
$doc->addStyleSheet($tpath.'/css/template.css');
