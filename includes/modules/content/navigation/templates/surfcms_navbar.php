<?php
/*
  $Id$

  Designed for: osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce
  Most of this Nav Module shamelessly gancked from osCommerce Community Edition, simply modified for use in:

  Surfalot CMS
  Copyright (c) 2017 Todd Holforty - mtholforty (at) surfalot (at) com

  Released under the GNU General Public License
*/

?>
<style>
<?php 
  if (defined('MODULE_CONTENT_SURFCMS_NAVBAR_WIDTH') && tep_not_null(MODULE_CONTENT_SURFCMS_NAVBAR_WIDTH)) {
	echo '.container-fluid { max-width: ' . MODULE_CONTENT_SURFCMS_NAVBAR_WIDTH . 'px; padding-left:0; padding-right:0; }' . "\n";
  }
?>
/* pull some styles from Community Edition Edge */
.navbar-no-corners { border-radius: 0 !important; -moz-border-radius: 0 !important; border-left: none; border-right: none; }
.navbar-no-margin { margin-bottom: 0 !important; }
.navbar-text { padding-left: 15px!important; }
/* compensate osC 2.3.4 style */
.navbar-inverse .navbar-text { font-size: inherit; }
.navbar-default .navbar-text { font-size: inherit; }
</style>

<nav class="container-fluid">
<nav class="navbar<?php echo $navbar_style . $navbar_corners . $navbar_margin . $navbar_fixed; ?> navbar-custom" role="navigation">
  <div class="<?php echo BOOTSTRAP_CONTAINER; ?>">
    <?php
    if ($oscTemplate->hasBlocks('navbar_modules_home')) {
      echo '<div class="navbar-header">' . PHP_EOL;
      echo $oscTemplate->getBlocks('navbar_modules_home');
      echo '</div>' . PHP_EOL;
    }
    ?>      
    <div class="collapse navbar-collapse" id="bs-navbar-collapse-core-nav">
      <?php
      if ($oscTemplate->hasBlocks('navbar_modules_left')) {
        echo '<ul class="nav navbar-nav">' . PHP_EOL;
        echo $oscTemplate->getBlocks('navbar_modules_left');
        echo '</ul>' . PHP_EOL;
      }
      if ($oscTemplate->hasBlocks('navbar_modules_right')) {
        echo '<ul class="nav navbar-nav navbar-right">' . PHP_EOL;
        echo $oscTemplate->getBlocks('navbar_modules_right');
        echo '</ul>' . PHP_EOL;
      }
      ?>
    </div>
  </div>
</nav>
<?php echo $navbar_css; ?>
</nav>
