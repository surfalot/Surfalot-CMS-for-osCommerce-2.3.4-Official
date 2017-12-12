<?php
/*
  $Id$

  Designed for: osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Surfalot CMS
  Copyright (c) 2017 Todd Holforty - mtholforty (at) surfalot (at) com

  Released under the GNU General Public License
*/

  class ht_surfcms_css {
    var $code = 'ht_surfcms_css';
    var $group = 'header_tags';
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function ht_surfcms_css() {
      $this->title = MODULE_HEADER_TAGS_SURFCMS_CSS_TITLE;
      $this->description = MODULE_HEADER_TAGS_SURFCMS_CSS_DESCRIPTION;

      if ( defined('MODULE_HEADER_TAGS_SURFCMS_CSS_STATUS') ) {
        $this->sort_order = MODULE_HEADER_TAGS_SURFCMS_CSS_SORT_ORDER;
        $this->enabled = (MODULE_HEADER_TAGS_SURFCMS_CSS_STATUS == 'True');
      }
    }

    function execute() {
      global $oscTemplate;

        // This CSS essencially automatically applies 960 Grid System alpha and omega classes 
		// to nested grid_ elements, provided they are within the contentText class. 
		$data = '';
		$data .= '<style>' . "\n";
		$data .= '.contentText div.grid_24 {' . "\n";
		$data .= '    margin-left:0;' . "\n";
		$data .= '    margin-right:0;' . "\n";
		$data .= '}' . "\n";
		$data .= '/* full content width, two column boxes */' . "\n";
		$data .= '.contentText div.grid_' . $oscTemplate->getGridContentWidth() . ' {' . "\n";
		$data .= '    margin-left:0;' . "\n";
		$data .= '    margin-right:0;' . "\n";
		$data .= '}' . "\n";
		$data .= '/* half content width, two column boxes */' . "\n";
		$data .= '.contentText div.grid_' . floor($oscTemplate->getGridContentWidth()/2) . ':nth-child(2n+1) {' . "\n";
		$data .= '    margin-left:0;' . "\n";
		$data .= '}' . "\n";
		$data .= '.contentText div.grid_' . floor($oscTemplate->getGridContentWidth()/2) . ':nth-child(2n+2) {' . "\n";
		$data .= '    margin-right:0;' . "\n";
		$data .= '}' . "\n";
		$data .= '/* third content width, two column boxes */' . "\n";
		$data .= '.contentText div.grid_' . floor($oscTemplate->getGridContentWidth()/3) . ':nth-child(3n+1) {' . "\n";
		$data .= '    margin-left:0;' . "\n";
		$data .= '}' . "\n";
		$data .= '.contentText div.grid_' . floor($oscTemplate->getGridContentWidth()/3) . ':nth-child(3n+3) {' . "\n";
		$data .= '    margin-right:0;' . "\n";
		$data .= '}' . "\n";
		$data .= '/* quarter content width, two column boxes */' . "\n";
		$data .= '.contentText div.grid_' . floor($oscTemplate->getGridContentWidth()/4) . ':nth-child(4n+1) {' . "\n";
		$data .= '    margin-left:0;' . "\n";
		$data .= '}' . "\n";
		$data .= '.contentText div.grid_' . floor($oscTemplate->getGridContentWidth()/4) . ':nth-child(4n+4) {' . "\n";
		$data .= '    margin-right:0;' . "\n";
		$data .= '}' . "\n";
		$data .= '.contentText:before, .contentText:after{content:"";display:table;border-collapse:collapse} .contentText:after{clear:both} .contentText{min-height:0}' . "\n";
		$data .= '</style>' . "\n";

      $oscTemplate->addBlock($data, 'header_tags');
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_HEADER_TAGS_SURFCMS_CSS_STATUS');
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Surfalot CMS 960gs CSS Fixes', 'MODULE_HEADER_TAGS_SURFCMS_CSS_STATUS', 'True', 'Do you want to enable the Surfalot CMS 960gs CSS Fixes module?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_HEADER_TAGS_SURFCMS_CSS_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_HEADER_TAGS_SURFCMS_CSS_STATUS', 'MODULE_HEADER_TAGS_SURFCMS_CSS_SORT_ORDER');
    }
  }
?>
