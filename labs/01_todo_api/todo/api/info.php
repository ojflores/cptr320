<?php

/*************************************************************************
 *
 * Added to support Hypermedia.
 * 
 */

$resources['resources'] = array_keys($routes);

echo json_encode($resources);