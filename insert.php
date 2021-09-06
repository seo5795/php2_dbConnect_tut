<?php


$conn=mysqli_connect("localhost", "hpeeragetest", "gksksla1225!", "hpeeragetest_godohosting_com");

if($conn){
    echo "서버접속성공";
}else{
    echo "서버접속실패!";
}

$sql= "INSERT INTO atest(title,description,created) VALUES('MySQL','MySQL is...',NOW())";

$result = mysqli_query($conn,$sql);
//sql문 실행시킴
if($result ===false){
    echo mysqli_error($conn);
    //db에서의 에러 메시지를 볼 수 있음
    //실제로 사용자를 받을 때는 echo 사용x
}




    ?>