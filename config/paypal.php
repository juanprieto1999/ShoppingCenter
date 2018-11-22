<?php
return array(
    // set your paypal credential
    'client_id' => 'ATftiZrl6hBj9cmVTvdvfYfkWI0JKcM5VphqyOKpuXfdGB_IuhlPPUzul7NaJummO-haTtuHa3S9pbbk',
    'secret' => 'EDoKGdWxlDBBvIxB6xUgh4A6q55rR3WR-C4bpSoQid65yezs75vQlpI64dPnliX8G9DjfOWCQFRPbvBD',
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