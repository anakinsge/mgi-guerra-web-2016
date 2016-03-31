<?php defined( '_JEXEC' ) or die; 

include_once JPATH_THEMES.'/'.$this->template.'/logic.php';

?><!doctype html>
<html lang="<?php echo $this->language; ?>">
<head>
	<jdoc:include type="head" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta property="og:title" content="<?php echo $doc->getTitle(); ?>" />
        <meta property="og:description" content="<?php echo $doc->getDescription(); ?>" />
        <meta property="og:image" content="<?php echo $logopath; ?>" />
	<!-- Le HTML5 shim and media query for IE8 support -->
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script type="text/javascript" src="<?php echo $tpath; ?>/js/respond.min.js"></script>
	<![endif]-->
</head>
  
<body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site')).' '.$active->alias.' '.$pageclass; ?>">
    <div id="page">
        <header>
            <div class="language"><jdoc:include type="modules" name="language" style="xhtml"/></div>
            <a class="logo" title="<?php echo $sitename; ?>" href="<?php echo $fullwebbase; ?>"><h1><?php echo $sitename; ?></h1></a>
            <nav><jdoc:include type="modules" name="navbar" style="xhtml"/></nav>            
            <div class="hero">
                <jdoc:include type="modules" name="values" style="xhtml"/>
            </div>
        </header>
        
        <section class="highlight">
            <article>
                <jdoc:include type="modules" name="highlight" style="xhtml"/>
            </article>
        </section>
        
        <section class="main" role="main">
            <div class="content">
                <jdoc:include type="message" />
                <jdoc:include type="component" />
            </div>
            <jdoc:include type="modules" name="breadcrumbs" style="xhtml"/>
        </section>
        
        <section class="breaker">
            <aside class="mostread">
                <jdoc:include type="modules" name="mostread" style="xhtml"/>
            </aside>
            <aside class="newsletter">
                <jdoc:include type="modules" name="newsletter" style="xhtml"/>
            </aside>            
        </section>
        
        <section class="services">
            <jdoc:include type="modules" name="services" style="xhtml"/>
        </section>
        
        <footer>
            <aside class="search"><jdoc:include type="modules" name="search" style="xhtml"/></aside>
            <jdoc:include type="modules" name="footer" style="xhtml"/>
        </footer>

        <jdoc:include type="modules" name="debug" style="xhtml"/>
    </div>
</body>

</html>
