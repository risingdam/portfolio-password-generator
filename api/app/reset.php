<?php

define('DATA_DIR', dirname(__dir__).'/data');

unlink(DATA_DIR.'/default.json');
copy(DATA_DIR.'/reset.json', DATA_DIR.'/default.json');