<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
	<?php
	echo htmlspecialchars('<script>alert</script>');

	 ?>
	//script태그 <>를 출력해줘서 사용자가 <>를 사용하지 못하게 함.
</body>
</html>