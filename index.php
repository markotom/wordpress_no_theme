<?php

$location = ot_get_option('no_theme_app_url');

header("Location: $location");
exit();
