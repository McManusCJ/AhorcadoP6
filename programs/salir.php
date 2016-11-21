<?php
//nueva version
session_name('actual');
session_start();
session_unset();
session_destroy();
?>