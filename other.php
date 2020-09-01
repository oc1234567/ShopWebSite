<head> 
<title>测试滴</title>
</head>
<body>
<li>哈哈哈哈</li>
<li>呵呵呵呵</li>
<?php phpinfo()?>
<?php
  echo "Hello world<br>";
  echo "这是一个", "字符串", "<br>";
  $cars=array("Volvo", "BMW", "Toyota");
  $x=4;
  $y=7;
  echo $x+$y, "<br>";
  echo "x=$x", "<br>";
  echo "My Car is $cars[1]", "<br>";
  
  var_dump(intdiv(10, 3));
  var_dump(intdiv(10, 2));
  echo "<br>";

  $name="runoob";
  $a= <<<EOF
       "abc"$name
       "234"
       "i love y"
EOF;
  echo $a;
  echo "<br>";
?>

<?php
$name="runoob1";
$a= <<<EOF
        "abc"$name
        "123"
EOF;
// 结束需要独立一行且前后不能空格
echo $a;
echo "<br>";
?>

<?php
 $x = array("a" => "red", "b" => "green");
 $y = array("c" => "blue", "d" => "yellow");
 $z = $x + $y;
 var_dump($z);
 var_dump($x == $y);
 var_dump($x === $y);
 var_dump($x != $y);
 var_dump($x <> $y);
 var_dump($x !== $y);
 echo "<br>";
?>

<?php
$test = "w3 school";
$username = isset($test) ? $test : "nobody";
echo $username;
echo("<br>");
$a = 3;
$b = false;
$c = $a or $b;
var_dump($c);
echo("<br>");
$d = $a || $b;
var_dump($d);
?>

<?php
  class Car
  {
    var $color;
    function __construct($color = "green")
    {
      $this->color = $color;
    }
    function what_color() {
      return $this->color;
    }
  }
?>
</body>
</html>