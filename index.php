<?php
$conn = mysqli_connect("localhost", "hpeeragetest", "gksksla1225!", "hpeeragetest_godohosting_com");

$sql = "SELECT * FROM atest";
$result = mysqli_query($conn, $sql);
$list = '';
while ($row = mysqli_fetch_array($result)) { // 등록한 글의 title을 보여주기 위한 list
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list ."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
    'title' => 'Welcome',
    'description' => 'Hello, web'
);

$update_link = '';
$delete_link = '';
$author = '';
if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    // 사용자 입력 sql주입을 막아줌 보안문제를 해결해줌
    $sql = "SELECT * FROM atest LEFT JOIN author ON atest.author_id = author.id WHERE atest.id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    // my sqli_query:데이터베이스에서 쿼리를 수행합니다. 만약 실패할 시 FALSE를 반환합니다. 성공적으로 SELECT, SHOW, DESCRIBE, EXPLAIN 쿼리를 수행했다면 mysqli_result object를 반환합니다. 다른 쿼리를 성공적으로 수행했다면 TRUE를 반환합니다.
    $row = mysqli_fetch_array($result);
    // mysqli_fetch_array 함수는 mysqli_query 를 통해 얻은 리절트 셋(result set)에서 레코드를 1개씩 리턴해주는 함수 //일반배열과 연관배열 모두 지원
    $article['title'] = htmlspecialchars($row['title']);
    // htmlspecialchars: 문자열에서 특정한 특수 문자를 HTML 엔티티로 변환한다. 이함수를 사용하면 악성 사용자로 부터 XSS 공격을 방지 할 수 있다.
    $article['description'] = htmlspecialchars($row['description']);
    $article['name'] = htmlspecialchars($row['name']);
    // id를 입력받지 않으면, 기본값인 web, welcome출력, 입력받으면 덮어쓰기

    $update_link = '<a href"=update.php?id=' . $_GET['id'] . '">update</a>';
    $delete_link = '
    <form action="process_delete.php" method="post">
      <input type="hidden" name="id" value="' . $_GET['id'] . '">
      <input type="submit" value="delete">
    </form>
  ';
    $author = "<p>by {$article['name']}</p>";
}

?>
<!doctype html>
<html>
<title>WEB</title>
</head>
<body>
	<h1>
		<a href="index.php">WEB</a>
	</h1>
	<ol>
      <?=$list?>
    </ol>
	 <p><a href="create.php">create</a></p>
    <?=$update_link?>
    <?=$delete_link?>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
    <?=$author?>
  </body>
</html>