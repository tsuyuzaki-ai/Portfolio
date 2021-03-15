<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DENTAKU</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <h3></h3>

  <form action="dentaku.php" method="post">

<?php

$one=$_POST["one"];
$two=$_POST["two"];
$num=$_POST["num"];
$button=$_POST["button"];
$result=$_POST['result'];
$ac=$_POST["ac"];

$set=0;

// =が押されたら
if (isset($result)) {
  if ($button==="÷") {$set=$one/$two;}
  if ($button==="×") {$set=$one*$two;}
  if ($button==="-") {$set=$one-$two;}
  if ($button==="+") {$set=$one+$two;}
  $button="";
}

if(isset($button)){ //÷×-+が押されたら
  if (isset($one)) {
    $set=$one.$button;
  }
}

if(isset($num)){ //数字が押されたら
  if (isset($one)&&isset($button)) {//演算子の後なら
      $two=$num;
      $set=$one.$button.$two;
  } elseif (isset($one)) {          //二桁
      $set=$one. $num;              
  } else {                          //一桁
      $set=$num;
      $one=$num;
  }
}
 
if(isset($ac)){
  $one="";
  $two="";
  $button="";
  $set="";
  $num="";
}

echo '<input type="text" value="'.$set.'" name="one">';
var_dump($one);
var_dump($two);

?>

    <table>

      <colgroup>
        <col style="width: 20%;">
        <col style="width: 20%;">
        <col style="width: 20%;">
        <col style="width: 20%;">
        <col style="width: 20%;">
      </colgroup>

      <tbody>
        <tr>
          <td><input type="submit" name="" value="AC"></td>
          <td><input type="submit" name="" value="+/-"></td>
          <td><input type="submit" name="" value="%"></td>
          <td><input type="submit" name="button" value="÷"></td>
        </tr>

        <tr>
          <td><input type="submit" name="num" value="7"></td>
          <td><input type="submit" name="num" value="8"></td>
          <td><input type="submit" name="num" value="9"></td>
          <td><input type="submit" name="button" value="×"></td>
        </tr>

        <tr>
          <td><input type="submit" name="num" value="4"></td>
          <td><input type="submit" name="num" value="5"></td>
          <td><input type="submit" name="num" value="6"></td>
          <td><input type="submit" name="button" value="-"></td>
        </tr>

        <tr>
          <td><input type="submit" name="num" value="1"></td>
          <td><input type="submit" name="num" value="2"></td>
          <td><input type="submit" name="num" value="3"></td>
          <td><input type="submit" name="button" value="+"></td>
        </tr>

        <tr>
          <td colspan="2" class="zero"><input type="submit" name="num" value="0" class="zero"></td>
          <td><input type="submit" name="button" value="."></td>
          <td><input type="submit" name="result" value="="></td>
        </tr>
      </tbody>

    </table>
  </form>

</body>

</html>