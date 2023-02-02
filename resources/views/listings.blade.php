<h1>{{$heading}}</h1>

<?php

if(DB::connection()->getDatabaseName())
{
   echo "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
}

if(DB::connection()) {
    // connection is made
    echo "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
}

?>
