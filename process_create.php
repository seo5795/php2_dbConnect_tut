<?php
$conn = mysqli_connect("localhost", "hpeeragetest", "gksksla1225!", "hpeeragetest_godohosting_com");

$filtered = array(
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description']),
    'author_id'=>mysqli_real_escape_string($conn, $_POST['author_id'])
);
$sql = "
  INSERT INTO atest
    (title, description, created, author_id)
    VALUES(
        '{$filtered['title']}',
        '{$filtered['description']}',
         NOW(),
        {$filtered['author_id']}
    )
";
$result = mysqli_query($conn, $sql);
if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    //echo mysqli_error($conn);
    error_log(mysqli_error($conn));
    //사용자에게 error의 원인을 보여주면 안됨
} else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
}

//dao역할
//sql문에서 사용자 입력값을 그대로 넣으면 안됨!
?>