<?php


function trace( $val, $exit=FALSE, $show_query=FALSE ){
	
	$CI = &get_instance();
	
	
	
	if( $CI->config->item('tracer_enabled') ){
		
		$trace = debug_backtrace();
		$trace = $trace[ 0 ];
		$file = $trace[ 'file' ];
		$line = $trace[ 'line' ];
		
		
		
		if( $val == '*vars*' ){
			$val = $CI->load->_ci_cached_vars;
		}
		
		$data = str_replace( "\n\n", "\n", print_r( $val, TRUE ));
		
		$method =  $CI->config->item( 'tracer_function');
		if( !empty($method) ){
			$data = $method( $data );
		}

		$msg = "<span class=\"sparkTracerDebugBacktrace\"><strong>File:</strong> $file<br/><strong>Line:</strong> $line</span>\n";
		$msg .= $data;
		
		$msg = str_replace( '[', '[<span class="key">', $msg );
		$msg = str_replace( ']', '</span>]', $msg );
		
		if( $CI->config->item( 'tracer_show_last_query' ) or $show_query ){
			$msg .= '<span class="sparkTracerLastQuery">' . $CI->db->last_query() . '</span>';
		}

		$template = file_get_contents( 'sparks/tracer/' . $CI->config->item( 'tracer_version' ) . '/views/tracer_template.html' );
		$final_trace = str_replace( '{msg}', $msg, $template );
		
		if( !defined( 'TRACER_FIRED' )){
			define( 'TRACER_FIRED', TRUE );
			echo file_get_contents( 'sparks/tracer/' . $CI->config->item( 'tracer_version' ) . '/views/tracer_styles.html' );
		}
		
		echo $final_trace;

		if( $exit ){
			exit();
		}
	}
}

