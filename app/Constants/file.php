<?php

define('MB', 10);

define('FILE_SIZE_LIMIT', MB * 1024 * 1024);

define('IMAGE_EXTENSION', ["png", "jpg", "jpeg"]);

define('AUDIO_EXTENSION', ["mp3"]);

define('FILE_EXTENSION', [...IMAGE_EXTENSION, ...AUDIO_EXTENSION]);
