<?php
usleep(500000);

$id = @$_GET['id'];

$node = array();
for($i=0;$i<3;$i++) {
	$id++;
	$isFolder = rand(1,3) == 1 ? 0 : 1;
	$node[] = "{ id: $id, title: 'Node $id', isFolder: $isFolder}";
}

echo '['.implode(',',$node).']';
