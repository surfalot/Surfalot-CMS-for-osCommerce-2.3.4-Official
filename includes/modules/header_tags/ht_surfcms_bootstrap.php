<?php
/*
  $Id$

  Designed for: osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Surfalot CMS
  Copyright (c) 2017 Todd Holforty - mtholforty (at) surfalot (at) com

  Released under the GNU General Public License
*/

  class ht_surfcms_bootstrap {
    var $code = 'ht_surfcms_bootstrap';
    var $group = 'header_tags';
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function ht_surfcms_bootstrap() {
      $this->title = MODULE_HEADER_TAGS_BOOTSTRAP_TITLE;
      $this->description = MODULE_HEADER_TAGS_BOOTSTRAP_DESCRIPTION;

      if ( defined('MODULE_HEADER_TAGS_BOOTSTRAP_STATUS') ) {
        $this->sort_order = MODULE_HEADER_TAGS_BOOTSTRAP_SORT_ORDER;
        $this->enabled = (MODULE_HEADER_TAGS_BOOTSTRAP_STATUS == 'True');
      }
    }

    function execute() {
      global $oscTemplate;

	  if ( file_exists('ext/bootstrap/css/bootstrap.min.css') ) {
	    $link = '<link rel="stylesheet" type="text/css" href="ext/bootstrap/css/bootstrap.min.css">' . PHP_EOL;	
	  } else {
	    $link = '<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">' . PHP_EOL;	
	  }

      $oscTemplate->addBlock($link, $this->group);

	  if ( file_exists('ext/bootstrap/js/bootstrap.min.js') ) {
	    $link = '<script type="text/javascript" src="ext/bootstrap/js/bootstrap.min.js"></script>' . PHP_EOL;	
	  } else {
	    $link = '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>' . PHP_EOL;	
	  }

      $oscTemplate->addBlock($link, 'footer_scripts');

    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_HEADER_TAGS_BOOTSTRAP_STATUS');
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Font Awesome Module', 'MODULE_HEADER_TAGS_BOOTSTRAP_STATUS', 'True', 'Do you want to enable the Font Awesome module?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_HEADER_TAGS_BOOTSTRAP_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_HEADER_TAGS_BOOTSTRAP_STATUS', 'MODULE_HEADER_TAGS_BOOTSTRAP_SORT_ORDER');
    }
  }
?>
