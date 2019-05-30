$a = [33,3,102,2,9,1,7,8,0,55,10,56,99,45,23,4];
$map = [];
foreach($a as $v) {
	$map[$v] = true;
}

$max = 0;

while(count($map)) {
	$count = 0;
	foreach ($map as $key => $value) {
		$count = 1 + check($map, $key, 1, 0) + check($map, $key, -1, 0);
		unset($map[$key]);
		break;
	}
	$max = max($max, $count);
}

echo "The answer is $max";

function check(&$x, $key, $i, $count){
	if(isset($x[$key+$i])){
		unset($x[$key+$i]);
		return check($x, $key+$i, $i, $count+1);
	} else {
		return $count;
	}
}
