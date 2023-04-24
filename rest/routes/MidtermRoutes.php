<?php

Flight::route('GET /connection-check', function(){
    /** TODO
    * This endpoint prints the message from constructor within MidtermDao class
    * Goal is to check whether connection is successfully established or not
    * This endpoint does not have to return output in JSON format
    */
});

Flight::route('GET /cap-table', function(){
    /** TODO
    * This endpoint returns list of all share classes within table named cap_table
    * Each class contains description field named 'class' and array of all categories within given class
    * Each category contains description field named 'category' and array of all investors that have shares within given category
    * Each investor has fields: 'diluted_shares' and 'investor' which is obtained by concatanation of first and last name of the investor
    * Outpus is given in figure 2
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::midtermService()->cap_table());


});

Flight::route('GET /summary', function(){
    /** TODO
    * This endpoint returns summary of the cap-table, that is total number of investors and total number of diluted shares
    * Output is given in figure 3
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::midtermService()->summary());

});

Flight::route('GET /investors', function(){
    /** TODO
    * This endpoint returns list of all investors with the total amount of diluted_shares for each investor
    * Output is given in figure 4
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::midtermService()->investors());
});

?>
