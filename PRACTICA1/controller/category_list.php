<?php

require_once __DIR__."/../model/ConnectaDb.php";

require_once __DIR__."/../model/Categories.php";

$categories = getCategories();

require __DIR__."//../view/resources/resource_category_list.php";