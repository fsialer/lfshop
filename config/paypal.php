<?php
return array(
    // set your paypal credential
    'client_id' => 'Ac9xGY0bge2opSdPrKeE_ClOnMITuZrJhHIAzUlrf-agTpvKQdGjx1H_bw8veTRf4QukV-HScCxRRKhs',
    'secret' => 'EJdhxZKqMJFkGT4CUBaNBaJ_TUVrMwxLY41FCX9-9q2hT4AaIB0RTx0f1x67h73XQJQRxxDX-j78FweJ',
 
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
 
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
 
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
 
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
 
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);