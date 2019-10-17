<?php

//Pretty Url

//https://web.archive.org/web/20140220071025/http://www.phpriot.com/articles/search-engine-urls/2

#RewriteEngine on
#RewriteRule ^index.html$ testes/index2.html

#RewriteEngine on
#RewriteRule ^/news/([0-9]+)\.html /news.php?news_id=$1&%{QUERY_STRING}

#RewriteRule ^(.*)$ /index.php