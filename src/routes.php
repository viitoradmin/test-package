<?php

Route::get('calculator', function(){
    echo 'Hello from the calculator package!';
});

Route::get('time-difference/{startTime}/{finishTime}', 'Viitor\TimeDiff\TimeDiffController@getTimeDifference');