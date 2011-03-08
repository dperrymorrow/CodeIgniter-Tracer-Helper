# Tracer Helper Spark
This is a very simple yet useful helper for tracing out data while you are working. Will trace out strings and arrays recursively.

## Features Overview

-- You choose to exit PHP after the trace or not
-- You choose if you want to view the last sql query with your trace
-- Can trace entire set of vars passed to the view via Loader class
-- File name and line number included as a backtrace from where the trace was called
-- Easily setup environment switching to keep traces off your stage and prod boxes
-- Easily style the traces with the externalized styles and view template in the views folder

## Example Usage: ( x.x indicates the version you have installed on your build )
    
    // from a controller 
	
	function index(){
		$this->load->spark( 'tracer/x.x' );
		trace( $_SERVER );
	}
	
	
## To Trace Out All View Vars
You can also trace out everything that was passed to your view. This must be called after you load view and pass data via 
$this->load->view( 'viewname', $data ); See  http://codeigniter.com/user_guide/libraries/loader.html for more information on views and data.

    trace( '*vars*' );
    // or in all cases the second param will exit php if true
    trace( '*vars*', TRUE );

Thats it, and please log issues or comments at 
https://github.com/dperrymorrow/CodeIgniter-Tracer-Helper/issues


	


    