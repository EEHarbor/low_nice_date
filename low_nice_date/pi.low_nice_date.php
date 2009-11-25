<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
	'pi_name'			=> 'Low Nice Date',
	'pi_version'		=> '2.0',
	'pi_author'			=> 'Lodewijk Schutte ~ Low',
	'pi_author_url'		=> 'http://loweblog.com/freelance/article/ee-nice-date-plugin/',
	'pi_description'	=> 'Displays a nice date.',
	'pi_usage'			=> Low_nice_date::usage()
);

/**
* Low Nice Date Plugin class
*
* @package			low-nice_date-ee2_addon
* @version			2.0
* @author			Lodewijk Schutte ~ Low <low@loweblog.com>
* @link				http://loweblog.com/freelance/article/ee-nice-date-plugin/
* @license			http://creativecommons.org/licenses/by-sa/3.0/
*/
class Low_nice_date {

	/**
	* Plugin return data
	*
	* @var	string
	*/
	var $return_data;

	// --------------------------------------------------------------------

	/**
	* PHP4 Constructor
	*
	* @see	__construct()
	*/
	function Low_nice_date($date = '', $format = '', $loc = FALSE)
	{
		$this->__construct($date, $format, $loc);
	}

	// --------------------------------------------------------------------

	/**
	* PHP5 Constructor
	*
	* @param	string	$date
	* @param	string	$format
	* @param	bool	$loc
	* @return	string
	*/
	function __construct($date = '', $format = '', $loc = FALSE)
	{
		/** -------------------------------------
		/**  Get global instance
		/** -------------------------------------*/

		$this->EE =& get_instance();

		/** -------------------------------------
		/**  Get parameters
		/** -------------------------------------*/

		if ($date == '')
		{
			$date = $this->EE->TMPL->fetch_param('date', '');
		}
		
		if ($format == '')
		{
			$format = $this->EE->TMPL->fetch_param('format', '');
		}

		if ($loc !== FALSE)
		{
			$loc = ($this->EE->TMPL->fetch_param('localize') === 'yes') ? TRUE : FALSE;
		}

		/** -------------------------------------
		/**  Convert date to timestamp, force GMT/UTC date
		/** -------------------------------------*/

		$time = strtotime($date.' UTC');
		
		/** -------------------------------------
		/**  Format timestamp
		/** -------------------------------------*/

		$this->return_data = ($time && $format != '') ? $this->EE->localize->decode_date($format, $time, $loc) : $date;
		
		return $this->return_data;
	}

	// --------------------------------------------------------------------
	
	/**
	* Plugin Usage
	*
	* @return	string
	*/    
	function usage()
	{
		ob_start(); 
		?>
			{exp:low_nice_date date="2007-05-20" format="%F %j%S, %Y" localize="yes"}

			{exp:low_nice_date date="{segment_3}-{segment_4}-01" format="%F %Y"}
		<?php
		$buffer = ob_get_contents();
  
		ob_end_clean(); 

		return $buffer;
	}

	// --------------------------------------------------------------------

}
// END CLASS

/* End of file pi.low_nice_date.php */