<?php
$conn=mysqli_connect(
    "localhost",
    "hpeeragetest",
    "gksksla1225!",
    "hpeeragetest_godohosting_com");


//1row
echo  "<h1>single row</h1>";
$sql = "SELECT * FROM atest LIMIT 1000 WHERE TITLE=MySql";
//1000개이상 가져오지 않음

$result=mysqli_query($conn, $sql);

$row=mysqli_fetch_array($result);

//회원의 첫번째 정보들을 배열형태로 보여줌


echo '<h2>'.$row['title'].'</h2>';//연관배열
echo $row['description'];
//echo $row[0]//배열->둘다 첫번째 회원의 title을 가져옴

//all row
echo  "<h1>multi row</h1>";
$sql = "SELECT * FROM atest";
$result=mysqli_query($conn, $sql);

//echo $row[0]//배열->둘다 첫번째 회원의 title을 가져옴

while ($row=mysqli_fetch_array($result)) {//$row가 null이 아닐때까지 반복
    echo '<h2>'.$row['title'].'</h2>';//연관배열
    echo $row['description'];
}
//mysqli_fetch_array:는 한행씩 나오고 다음 데이터가 계속 나옴 데이터가 없으면 null이 나옴
?>