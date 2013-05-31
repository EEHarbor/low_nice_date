<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
	'pi_name'        => 'Low Nice Date',
	'pi_version'     => '2.2.0',
	'pi_author'      => 'Lodewijk Schutte ~ Low',
	'pi_author_url'  => 'http://gotolow.com/addons/low-nice-date',
	'pi_description' => 'Displays a nice date.',
	'pi_usage'       => 'See http://gotolow.com/addons/low-nice-date for more info.'
);

/**
 * < EE 2.6.0 backward compat
 */
if ( ! function_exists('ee'))
{
	function ee()
	{
		static $EE;
		if ( ! $EE) $EE = get_instance();
		return $EE;
	}
}

/**
 * Low Nice Date Plugin class
 *
 * @package        low_nice_date
 * @author         Lodewijk Schutte <hi@gotolow.com>
 * @link           http://gotolow.com/addons/low-nice-date
 * @license        http://creativecommons.org/licenses/by-sa/3.0/
 */
class Low_nice_date {

	// --------------------------------------------------------------------
	// PROPERTIES
	// --------------------------------------------------------------------

	/**
	 * Plugin return data
	 *
	 * @var        string
	 */
	public $return_data;

	// --------------------------------------------------------------------
	// METHODS
	// --------------------------------------------------------------------

	/**
	 * Constructor
	 *
 	 * @access     public
	 * @return     string
	 */
	public function __construct()
	{
		// -------------------------------------------
		// Get parameters
		// -------------------------------------------

		$date   = ee()->TMPL->fetch_param('date', time());
		$format = ee()->TMPL->fetch_param('format');
		$loc    = (ee()->TMPL->fetch_param('localize') == 'yes');

		// -------------------------------------------
		// Convert date to timestamp, force GMT/UTC date
		// -------------------------------------------

		$time = $this->_stamp($date);

		// -------------------------------------------
		// Format timestamp
		// -------------------------------------------

		$this->return_data = ($time && $format) ? ee()->localize->decode_date($format, $time, $loc) : $date;
	}

	// --------------------------------------------------------------------

	/**
	 * Calculate difference in years, months and days in given date range
	 *
	 * @access     public
	 * @return     string
	 */
	public function range()
	{
		// -------------------------------------------
		// Get From and To values
		// -------------------------------------------

		$data = array(
			'from' => $this->_stamp(ee()->TMPL->fetch_param('from', time())),
			'to'   => $this->_stamp(ee()->TMPL->fetch_param('to', time()))
		);

		// -------------------------------------------
		// Get absolute difference between the two
		// -------------------------------------------

		$diff = abs($data['to'] - $data['from']);

		// -------------------------------------------
		// Get number of years, months and days for this difference
		// -------------------------------------------

		$data['years']  = floor($diff / (365*60*60*24));
		$data['months'] = floor(($diff - $data['years'] * 365*60*60*24) / (30*60*60*24));
		$data['days']   = floor(($diff - $data['years'] * 365*60*60*24 - $data['months']*30*60*60*24) / (60*60*24));

		// -------------------------------------------
		// Parse the template
		// -------------------------------------------

		return ee()->TMPL->parse_variables_row(ee()->TMPL->tagdata, $data);
	}

	// --------------------------------------------------------------------

	/**
	 * Get timestamp for date
	 *
	 * @access     private
	 * @param      string
	 * @param      bool
	 * @return     int
	 */
	private function _stamp($str, $utc = TRUE)
	{
		if ( ! is_numeric($str))
		{
			if ($utc) $str .= ' UTC';
			$str = strtotime($str);
		}

		return (int) $str;
	}

}
// END CLASS

/* End of file pi.low_nice_date.php */