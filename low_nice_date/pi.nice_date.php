<?php

/*
=====================================================
 This plugin was created by Lodewijk Schutte
 - lodewijk@gmail.com
 - http://loweblog.com/
 This work is licensed under a
 Creative Commons Attribution-ShareAlike 2.5 License.
 - http://creativecommons.org/licenses/by-sa/2.5/
=====================================================
 File: pi.nice_date.php
-----------------------------------------------------
 Purpose: Nice date
=====================================================
*/

$plugin_info = array(
                 'pi_name'          => 'Nice date',
                 'pi_version'       => '1.0',
                 'pi_author'        => 'Lodewijk Schutte',
                 'pi_author_url'    => 'http://loweblog.com/',
                 'pi_description'   => 'Displays a nice date',
                 'pi_usage'         => nice_date::usage()
               );

class Nice_date {

    var $return_data;
    
    // ----------------------------------------
    //  Constructor
    // ----------------------------------------

    function Nice_date()
    {
      global $LOC, $TMPL;
      
      // get some params
      $date   = $TMPL->fetch_param('date');
      $format = $TMPL->fetch_param('format');
      $loc    = ($TMPL->fetch_param('localize') == "yes") ? TRUE : FALSE;
      
      // convert date to timestamp
      $time = strtotime($date);
      
      if ($time)
      {
        // format timestamp
        $this->return_data = $LOC->decode_date($format,$time,$loc);
      }
    }
    // END
    
    
// ----------------------------------------
//  Plugin Usage
// ----------------------------------------

// This function describes how the plugin is used.

function usage()
{
ob_start(); 
?>
{exp:nice_date date="2007-05-20" format="%F %j%S, %Y" localize="yes"}

{exp:nice_date date="{segment_3}-{segment_4}-01" format="%F %Y"}
<?php
$buffer = ob_get_contents();
  
ob_end_clean(); 

return $buffer;
}
// END

}
// END CLASS
?>