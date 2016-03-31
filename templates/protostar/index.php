<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js');

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
        <meta property="og:title" content="<?php echo $doc->getTitle(); ?>" />
        <meta property="og:description" content="<?php echo $doc->getDescription(); ?>" />
        <meta property="og:image" content="http://www.mgiecuador.com/images/sq-logo-mgiguerra.png" />
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="http://www.mgiecuador.com/favicon/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://www.mgiecuador.com/favicon/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://www.mgiecuador.com/favicon/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://www.mgiecuador.com/favicon/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="http://www.mgiecuador.com/favicon/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="http://www.mgiecuador.com/favicon/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="http://www.mgiecuador.com/favicon/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="http://www.mgiecuador.com/favicon/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="http://www.mgiecuador.com/favicon/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="http://www.mgiecuador.com/favicon/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="http://www.mgiecuador.com/favicon/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="http://www.mgiecuador.com/favicon/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="http://www.mgiecuador.com/favicon/favicon-128.png" sizes="128x128" />
        <meta name="application-name" content="MGI Guerra"/>
        <meta name="msapplication-config" content="http://www.mgiecuador.com/favicon/browserconfig.xml" />
	<?php // Use of Google Font ?>
	<?php if ($this->params->get('googleFont')) : ?>
		<link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName'); ?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName')); ?>', sans-serif;
			}
		</style>
	<?php endif; ?>
	<?php // Template color ?>
	<?php if ($this->params->get('templateColor')) : ?>
	<style type="text/css">
		body.site
		{
			border-top: 10px solid <?php echo $this->params->get('templateColor'); ?>;
			background-color: <?php echo $this->params->get('templateBackgroundColor'); ?>
		}
                .top-line{
                    text-align: right;
                }
		a
		{
			color: <?php echo $this->params->get('templateColor'); ?>;
		}
		.navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover,
		.btn-primary
		{
			background: <?php echo $this->params->get('templateColor'); ?>;
		}
		.navbar-inner
		{
			-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
		}
                .item-image{
                    padding: 10px;
                }
                ul.mginews, ul.mostread{
                    list-style-type: none;
                    margin: 0px;
                }
                ul.mginews li, ul.mostread li{
                    padding-bottom: 10px;
                    
                }
                .footer{
                    color: #777;
                    font-size: 10px;
                    line-height: 10px;
                }
                .worldback{
                    background-image: url(<?php echo $this->baseurl; ?>/images/wmap.png);
                    background-position: 75% 0;
                    background-repeat: no-repeat;
                }
                .mgisearch{
                    white-space: nowrap;
                    margin-top: 10px;
                    
                }
                .mgisearch form.form-inline{
                    margin: 0 0 10px;
                    
                }
                .mgisearch input.inputbox{
                    border-radius: 6px 0 0 6px;
                    height: 21px;
                    width: 170px;
                }
                .mgisearch input.button{
                    left: -5px;
                    position: relative;
                }
                
                .mgi-slider div.bt-introtext{
                    color: #6e6e6e;
                    font-size: 14px;
                    font-style: italic;
                    padding-top:10px;
                    text-align: justify;
                }
                
                .mgi-slider .bt-cs .bt-inner a.bt-title, .page-header{
                    /*background: rgba(10, 10, 10, 0.5) none repeat scroll 0 0;*/
                    text-transform: uppercase;
                    color: #5a87c6;
                    border: 1px solid #ccc;
                    font-size: 18px;
                    text-align:center;
                    width: 100%;
                    margin: 0 auto;
                    margin: 0px 0px 10px 0px;
                    border-radius: 5px;                    
                }
                
                .mgi-slider .bt-inner img {
                    border: none;
                    margin: 0px;
                    max-width: 99%;
                    border-radius: 5px;
                    outline: none;
                }
                .pagehome h2 {
                    font-size: 18px;
                    line-height: 18px;
                    text-align: center;
                }
                .pagehome div.item-image, .item-page div.item-image, category-list div.item-image, .contact div.item-image, .img-intro-none{
                    margin: 0 auto;
                    text-align: center;
                }

                .pagehome div.item-image img, .category-list div.item-image img, .contact div.item-image img, .item-page div.item-image img, .img-intro-none img{
                    border-radius: 5px;
                }

                .pagehome p{
                    text-align: justify;
                }
                h2, h1{
                    font-size: 18px;
                    margin: 5px 0 0;
                }
                .item-page p, .items-leading p{
                    text-align: justify;
                }
                .list-title{
                    font-size: 18px;
                }
                .list-title p{
                    font-size: 15px;
                    text-align: justify;
                    color:#6e6e6e;
                }
                .jicons-icons{
                    display: none;
                }
                .contact-address{
                    font-size: 16px;
                    color:#6e6e6e;
                    margin-top: 0;
                    padding-top: 0;
                    background-image: url(<?php echo $this->baseurl; ?>/images/bolitas.png);
                    background-position: 60% 0;
                    background-repeat: no-repeat;
                }
                .dl-horizontal dd {
                    margin-left: 80px;
                }
                .nav > li > a:hover,
                .nav > li > a:focus {
                    box-shadow: inset 0 0 1px #bbb;
                }
                .author_infobox_image_profile img {
                    border-radius: 5px;
                }
                .mgi-bol div.acymailing_introtext {
                    padding-bottom: 10px !important;
                }
                .tituloTabla{
                    border: 1px #ccc solid;
                    font-size:16px;
                    color: #2151a4;
                    padding: 7px;
                    border-radius: 5px;
                    background-color: #ddd;
                    font-weight: bold;
                }
                .subTituloTabla{
                    border: 1px #ccc solid;
                    font-size:14px;
                    color: #2151a4;
                    padding: 6px;
                    border-radius: 5px;
                    background-color: #b7d1ed;
                    font-weight: bold;
                }
                .tableCell{
                    text-align: left; 
                    border: 1px #ddd solid;
                    padding: 5px;
                    border-radius: 5px;
                }
                table tr:nth-child(even) td.tableCell {
                    background-color: #F1F1F1;
                }

                table tr:nth-child(odd) td.tableCell {
                    background-color: #FcFcFc;
                }
                .article-info, .microdata{
                    visibility: hidden;
                    display: none;
                }
	</style>
	<?php endif; ?>
	<!--[if lt IE 9]>
		<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
	<![endif]-->
    <script id="data" type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Quito, Ecuador",
        "postalCode": "170507",
        "streetAddress": "Calle Italia N30-114 y Av. Eloy Alfaro"
      },
      "url": "http://www.mgiecuador.com",
      "logo": "<?php echo JUri::root() . $this->params->get('logoFile'); ?>",
      "telephone": "(593) 2 255 0299",
      "faxNumber": "(593) 2 245 5565",
      "name": "MGI Guerra Cia. Ltda."  
    }
    </script>
</head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
	echo ($this->direction == 'rtl' ? ' rtl' : '');
?>">
<!-- Google Tag Manager 
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PVSTSF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PVSTSF');</script>
<!-- End Google Tag Manager -->
	<!-- Body -->
	<div class="body">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?> worldback">
                    <div class="top-line">
                        <jdoc:include type="modules" name="position-4" style="none" />
                    </div>
			<!-- Header -->
			<header class="header" role="banner">
				<div class="header-inner clearfix">
					<a class="brand pull-left" href="<?php echo $this->baseurl; ?>/">
						<?php echo $logo; ?>
						<?php if ($this->params->get('sitedescription')) : ?>
							<?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription')) . '</div>'; ?>
						<?php endif; ?>
					</a>
					<div class="header-search pull-right">
						<jdoc:include type="modules" name="position-0" style="none" />
					</div>
				</div>
			</header>
			<?php if ($this->countModules('position-1')) : ?>
				<nav class="navigation" role="navigation">
					<div class="navbar pull-left">
						<a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
					</div>
					<div class="nav-collapse">
						<jdoc:include type="modules" name="position-1" style="none" />
					</div>
				</nav>
			<?php endif; ?>
			<jdoc:include type="modules" name="banner" style="xhtml" />
			<div class="row-fluid">
				<?php if ($this->countModules('position-8')) : ?>
					<!-- Begin Sidebar -->
					<div id="sidebar" class="span3">
						<div class="sidebar-nav">
							<jdoc:include type="modules" name="position-8" style="xhtml" />
						</div>
					</div>
					<!-- End Sidebar -->
				<?php endif; ?>
				<main id="content" role="main" class="<?php echo $span; ?>">
					<!-- Begin Content -->
					<jdoc:include type="modules" name="position-3" style="xhtml" />
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<jdoc:include type="modules" name="position-2" style="none" />
					<!-- End Content -->
				</main>
				<?php if ($this->countModules('position-7')) : ?>
					<div id="aside" class="span3">
						<!-- Begin Right Sidebar -->
						<jdoc:include type="modules" name="position-7" style="well" />
						<!-- End Right Sidebar -->
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
			<hr />
			<jdoc:include type="modules" name="footer" style="none" />
			<p class="pull-right">
				<a href="#top" id="back-top">
					<?php echo JText::_('TPL_PROTOSTAR_BACKTOTOP'); ?>
				</a>
			</p>
                        <p>Copyright &copy; <?php echo date('Y'); ?> <b><?php echo $sitename; ?> Cia. Ltda.</b></p>
                        <table>
                            <tr>
                                <td style=" width: 25%;"><a href="http://www.mgiworld.com/"><img alt="Member of MGI Worldwide" src="<?php echo $this->baseurl; ?>/images/mgi-memberof-small.png"></a></td>
                                <td class="footer" style="padding-left:15px; text-align: justify;">MGI Worldwide is a network of independent audit, tax, accounting and consulting firms.
MGI Worldwide does not provide any services and its member firms are not an international
partnership. Each member firm is a separate entity and neither MGI Worldwide nor any
member firm accepts responsibility for the activities, work, opinions or services of any other
member firm. For more information visit <a href="http://www.mgiworld.com/legal">www.mgiworld.com/legal</a>.</td>
                            </tr>
                        </table>
<div class="microdata" itemscope itemtype="http://schema.org/FinancialService">
<a itemprop="url" href="http://www.mgiecuador.com/"><div itemprop="name"><strong><?php echo $sitename; ?> Cia. Ltda.</strong></div>
</a>
<img itemprop="logo" src="<?php echo JUri::root() . $this->params->get('logoFile'); ?>" alt="<?php echo $sitename; ?>" />
<div itemprop="memberOf" itemscope itemtype="http://schema.org/Thing">
<span itemprop="name">MGI Worldwide</span>
<div itemprop="description">MGI Worldwide is a network of independent audit, tax, accounting and consulting firms. MGI Worldwide does not provide any services and its member firms are not an international partnership. Each member firm is a separate entity and neither MGI Worldwide nor any member firm accepts responsibility for the activities, work, opinions or services of any other member firm. For more information visit 
<a itemprop="url" href="http://www.mgiworld.com/legal">www.mgiworld.com/legal</a>.</div>
</div>
<div itemprop="description">MGI Guerra es una de las principales firmas de auditoría en el Ecuador, somos una firma ecuatoriana de auditores independientes, calificada con el número 060 del Registro Nacional de Auditores Externos de la Superintendencia de Compañías desde 1982 e inscrita en el Mercado de Valores; conformada por un equipo de profesionales expertos en diferentes áreas financieras, contables, impuestos y tecnología.</div>
<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
<span itemprop="streetAddress">Calle Italia N30-114 y Av. Eloy Alfaro</span><br>
<span itemprop="addressCountry">Ecuador</span>-<span itemprop="addressLocality">Quito</span><br>
<span itemprop="telephone">(02) 255-0299</span><br>
<span itemprop="telephone">(02) 245-5565</span><br>
</div>
</div>
		</div>
	</footer>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
