<?php

include('./session_start.inc.php');
session_unset();
session_destroy();

header("location: ../../index.php");
