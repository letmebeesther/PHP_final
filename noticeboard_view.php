<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
	<div id="main_img_bar">
        <img src="./img/sudo.png" width="150" height="170">
    </div>
   	<div id="board_box">
	    <h3 class="title">
			공지사항 > 내용보기
		</h3>
<?php
	$num  = $_GET["num"];
	$page  = $_GET["page"];

	$con = mysqli_connect("localhost", "root", "1234", "smartita");
	$sql = "select * from noticeboard where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	
	$name 		= $row["name"];
	$subject    = $row["subject"];
	$content    = $row["content"];
	$regist_day = $row["regist_day"];
	$hit 		= $row["hit"];

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);

	$new_hit = $hit + 1;
	$sql = "update noticeboard set hit=$new_hit where num=$num";   
	mysqli_query($con, $sql);
?>		
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$name?> | <?=$regist_day?></span>
			</li>
			<li>
				<?=$content?>
			</li>		
	    </ul>
	    <ul class="buttons">
				<li><button onclick="location.href='noticeboard_list.php?page=<?=$page?>'">목록</button></li>
				<li><button onclick="location.href='noticeboard_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
				<li><button onclick="location.href='noticeboard_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
				<li><button onclick="location.href='noticeboard_form.php'">글쓰기</button></li>
		</ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
