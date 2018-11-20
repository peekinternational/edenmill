<?php

return array(
	# Account credentials from developer portal
	'Account' => array(
		'ClientId' => 'AdZUQndq3waQ-PhvNBAxMLpmji6zCUhHXqqQGE16U4z9mBXxZw9H-71qyrEEDe6ZQe0On26CbnOWxg7J',
		'ClientSecret' => 'EHVAEcXgWp3ihDEiJcOKrgHueQcxujoOnnH2o8W0v7sjKe7HSoMKWz_M56LNt4_BOu0TJEa5FkvT0EcZ',
	),

	# Connection Information
	'Http' => array(
		// 'ConnectionTimeOut' => 30,
		'Retry' => 1,
		//'Proxy' => 'http://[username:password]@hostname[:port][/path]',
	),

	# Service Configuration
	'Service' => array(
		# For integrating with the live endpoint,
		# change the URL to https://api.paypal.com!
		//'EndPoint' => 'https://api.sandbox.paypal.com',
	),


	# Logging Information
	'Log' => array(
		//'LogEnabled' => true,

		# When using a relative path, the log file is created
		# relative to the .php file that is the entry point
		# for this request. You can also provide an absolute
		# path here
		//'FileName' => '../PayPal.log',

		# Logging level can be one of FINE, INFO, WARN or ERROR
		# Logging is most verbose in the 'FINE' level and
		# decreases as you proceed towards ERROR
		//'LogLevel' => 'FINE',
	),
);
