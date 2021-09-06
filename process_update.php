<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '111111',
    'opentutorials');

settype($_POST, 'integer');//타입을 바꿀수 있는 api
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);
$sql = "
  UPDATE INTO topic
    SET
        title='{$filtered['title']}',
        description='{$filtered['description']}'
where

    id='{$filtered['description']}'
";
$result = mysqli_query($conn, $sql);
if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    error_log(mysqli_error($conn));
} else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
}

//dao역할
//sql문에서 사용자 입력값을 그대로 넣으면 안됨!
?>