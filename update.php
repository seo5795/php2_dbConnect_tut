<?php
$conn=mysqli_connect(
    "localhost",
    "hpeeragetest",
    "gksksla1225!",
    "hpeeragetest_godohosting_com");
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)) {
    $escaped_title=htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
    'title'=>'Welcome',
    'description'=>'Hello, web'
);
$update_link= '';
if(isset($_GET['id'])) {
    $filtered_id=mysqli_real_escape_string($conn,$_GET['id']);
    //사용자 입력 sql주입을 막아줌 보안문제를 해결해줌
    $sql = "SELECT * FROM topic WHERE id={ $filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    //id를 입력받지 않으면, 기본값인 web, welcome출력, 입력받으면 덮어쓰기
    
    $update_link='<a href"=update.php?id='.$_GET['id'].'">update</a>';
}

?>
<!doctype html>
<html>
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
  
      <?=$list?>
    </ol>
    <form action="process_update.php" method="POST">
    <input type="hidden" name="id" value="<?php $_GET['id']?>">
      <p><input type="text" name="title" placeholder="title" value="<?= $article['title']?>"></p>
      <p><textarea name="description" placeholder="description" ><?= $article['description']?></textarea></p>
      <p><input type="submit"></p>
    </form>
  </body>
</html>