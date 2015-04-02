﻿<?php
/**
* @version   2.0 
 * @author Kai Döhler - based on Gantry default template by RocketTheme http://www.rockettheme.com
 * @copyright Triumph Competition and British GT
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );

// load and inititialize gantry class
require_once(dirname(__FILE__) . '/lib/gantry/gantry.php');
$gantry->init();

// get the current preset
$gpreset = str_replace(' ','',strtolower($gantry->get('name')));

?>
<!doctype html>
<html xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language;?>" >
<head>
    <?php if ($gantry->get('layout-mode') == '960fixed') : ?>
    <meta name="viewport" content="width=960px">
    <?php elseif ($gantry->get('layout-mode') == '1200fixed') : ?>
    <meta name="viewport" content="width=1200px">
    <?php else : ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php endif; ?>
  <?php
        $gantry->displayHead();
        $gantry->addStyle('grid-responsive.css', 5);
        $gantry->addStyle('jquery.vegas.css');
        $gantry->addLess('global.less', 'master.css', 8, array('headerstyle'=>$gantry->get('headerstyle','dark')));
        if ($gantry->browser->name == 'ie'){
      if ($gantry->browser->shortversion == 9){
      $gantry->addInlineScript("if (typeof RokMediaQueries !== 'undefined') window.addEvent('domready', function(){ RokMediaQueries._fireEvent(RokMediaQueries.getQuery()); });");
    }
    if ($gantry->browser->shortversion == 8){
      $gantry->addScript('html5shim.js');
    }
  }
  if ($gantry->get('layout-mode', 'responsive') == 'responsive') { 
    //$gantry->addScript('mootools.js');
    $gantry->addScript('rokmediaqueries.js');
  }
  if ($gantry->get('loadtransition')) {
    $gantry->addScript('load-transition.js');
    $hidden = ' class="rt-hidden"';
  }
  $gantry->addScript('jquery-1.9.1.min.js');
  $gantry->addScript('jquery-ui-1.10.3.min.js');
  $gantry->addInlineScript("jQuery.noConflict();");
  $gantry->addScript('jquery.vegas.js');    
  $gantry->addInlineScript("jQuery('.hasTooltip').tooltip('option', 'position', { my:'left+15', at:'left' });");
  $overlay = str_replace("'", '"', ($gantry->get('vegas-customOverlay-overlayImage')));
  $overlay = json_decode($overlay);
  if ($handle = opendir('images/backgrounds/')) {
    while (false !== ($file = readdir($handle))) {
      $ext = strtolower(substr($file, -4));
      if ($ext == ".jpg" OR $ext == ".png" OR $ext == "jpeg")
        $backgroundImages[] = $file;
    }
  }
  shuffle($backgroundImages);
    ?>
    <script type="text/javascript">  
    jQuery( function() {
        jQuery.vegas('slideshow', {
          delay: <?php echo $gantry->get('vegas-delay'); ?>,
          backgrounds:[
            <?php                      
            foreach ($backgroundImages as &$image) {
              $files .= "{ src:'".$gantry->baseUrl."images/backgrounds/$image', fade:".$gantry->get('vegas-fade','1000')." },";
            }
            $files = substr($files, 0, -1);
            echo $files;
          ?>
          ]
      })('overlay', {
        opacity:<?php echo $gantry->get('vegas-customOverlay-opacity'); ?>,
          src:'<?php echo $gantry->baseUrl.$overlay->path; ?>'
      });
    });
  </script>
  <meta property="og:image" content="http://www.triumph-competition.de/images/website/og_preview.jpg"/>
  <meta property="og:title" content="Triumph Competition & British GTs"/>
  <meta property="og:type" content="website"/>
  <meta property="og:url" content="http://www.triumph-competition.de"/>
  <meta property="og:description" content="Die Triumph Competition & British GT ist die Rennserie des TR-Register Deutschland e.V.für britische Roadster und GTs bis Baujahr 1981"/>
</head>
<body <?php echo $gantry->displayBodyTag(); ?>>
  <div id=container>
    <?php /** Begin Drawer **/ if ($gantry->countModules('drawer')) : ?>
      <div id="rt-drawer">
          <div class="rt-container">
              <?php echo $gantry->displayModules('drawer','standard','standard'); ?>
              <div class="clear"></div>
          </div>
      </div>
      <?php /** End Drawer **/ endif; ?>
      <?php /** Begin Top Surround **/ if ($gantry->countModules('top') or $gantry->countModules('header')) : ?>
      <header id="rt-top-surround">
      <?php /** Begin Top **/ if ($gantry->countModules('top')) : ?>
      <div id="rt-top" <?php echo $gantry->displayClassesByTag('rt-top'); ?>>
        <div class="rt-container">
          <?php echo $gantry->displayModules('top','standard','standard'); ?>
          <div class="clear"></div>
        </div>
      </div>
      <?php /** End Top **/ endif; ?>
      <?php /** Begin Header **/ if ($gantry->countModules('header')) : ?>
      <div id="rt-header">
        <div class="rt-container">
          <?php echo $gantry->displayModules('header','standard','standard'); ?>
          <div class="clear"></div>
        </div>
      </div>
      <?php /** End Header **/ endif; ?>
    </header>
    <?php /** End Top Surround **/ endif; ?>
    <?php /** Begin Showcase **/ if ($gantry->countModules('showcase')) : ?>
    <div id="rt-showcase">
      <div class="rt-showcase-pattern">
        <div class="rt-container">
          <?php echo $gantry->displayModules('showcase','standard','standard'); ?>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <?php /** End Showcase **/ endif; ?>
    <div id="rt-transition"<?php if ($gantry->get('loadtransition')) echo $hidden; ?>>
      <div id="rt-mainbody-surround">
        <?php /** Begin Feature **/ if ($gantry->countModules('feature')) : ?>
        <div id="rt-feature">
          <div class="rt-container">
            <?php echo $gantry->displayModules('feature','standard','standard'); ?>
            <div class="clear"></div>
          </div>
        </div>
        <?php /** End Feature **/ endif; ?>
        <?php /** Begin Utility **/ if ($gantry->countModules('utility')) : ?>
        <div id="rt-utility">
          <div class="rt-container">
            <?php echo $gantry->displayModules('utility','standard','standard'); ?>
            <div class="clear"></div>
          </div>
        </div>
        <?php /** End Utility **/ endif; ?>
        <?php /** Begin Breadcrumbs **/ if ($gantry->countModules('breadcrumb')) : ?>
        <div id="rt-breadcrumbs">
          <div class="rt-container">
            <?php echo $gantry->displayModules('breadcrumb','standard','standard'); ?>
            <div class="clear"></div>
          </div>
        </div>
        <?php /** End Breadcrumbs **/ endif; ?>
        <?php /** Begin Main Top **/ if ($gantry->countModules('maintop')) : ?>
        <div id="rt-maintop">
          <div class="rt-container">
            <?php echo $gantry->displayModules('maintop','standard','standard'); ?>
            <div class="clear"></div>
          </div>
        </div>
        <?php /** End Main Top **/ endif; ?>
        <?php /** Begin Full Width**/ if ($gantry->countModules('fullwidth')) : ?>
        <div id="rt-fullwidth">
          <?php echo $gantry->displayModules('fullwidth','basic','basic'); ?>
            <div class="clear"></div>
          </div>
        <?php /** End Full Width **/ endif; ?>
        <?php /** Begin Main Body **/ ?>
        <div class="rt-container">
              <?php echo $gantry->displayMainbody('mainbody','sidebar','standard','standard','standard','standard','standard'); ?>
            </div>
        <?php /** End Main Body **/ ?>
        <?php /** Begin Main Bottom **/ if ($gantry->countModules('mainbottom')) : ?>
        <div id="rt-mainbottom">
          <div class="rt-container">
            <?php echo $gantry->displayModules('mainbottom','standard','standard'); ?>
            <div class="clear"></div>
          </div>
        </div>
        <?php /** End Main Bottom **/ endif; ?>
        <?php /** Begin Extension **/ if ($gantry->countModules('extension')) : ?>
        <div id="rt-extension">
          <div class="rt-container">
            <?php echo $gantry->displayModules('extension','standard','standard'); ?>
            <div class="clear"></div>
          </div>
        </div>
        <?php /** End Extension **/ endif; ?>
      </div>
    </div>
    <?php /** Begin Bottom **/ if ($gantry->countModules('bottom')) : ?>
    <div id="rt-bottom">
      <div class="rt-container">
        <?php echo $gantry->displayModules('bottom','standard','standard'); ?>
        <div class="clear"></div>
      </div>
    </div>
    <?php /** End Bottom **/ endif; ?>
    <?php /** Begin Footer Section **/ if ($gantry->countModules('footer') or $gantry->countModules('copyright')) : ?>
    <footer id="rt-footer-surround">
      <?php /** Begin Footer **/ if ($gantry->countModules('footer')) : ?>
      <div id="rt-footer">
        <div class="rt-container">
          <?php echo $gantry->displayModules('footer','standard','standard'); ?>
          <div class="clear"></div>
        </div>
      </div>
      <?php /** End Footer **/ endif; ?>
      <?php /** Begin Copyright **/ if ($gantry->countModules('copyright')) : ?>
      <div id="rt-copyright">
        <div class="rt-container">
          <?php echo $gantry->displayModules('copyright','standard','standard'); ?>
          <div class="clear"></div>
        </div>
      </div>
      <?php /** End Copyright **/ endif; ?>
    </footer>
    <?php /** End Footer Surround **/ endif; ?>
    <?php /** Begin Debug **/ if ($gantry->countModules('debug')) : ?>
    <div id="rt-debug">
      <div class="rt-container">
        <?php echo $gantry->displayModules('debug','standard','standard'); ?>
        <div class="clear"></div>
      </div>
    </div>
    <?php /** End Debug **/ endif; ?>
    <?php /** Begin Analytics **/ if ($gantry->countModules('analytics')) : ?>
    <?php echo $gantry->displayModules('analytics','basic','basic'); ?>
    <?php /** End Analytics **/ endif; ?>
    </div>
  </body>
</html>
<?php
$gantry->finalize();
?>