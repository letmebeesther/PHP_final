<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
	  
      document.board_form.submit();
   }
</script>
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
	    <h3 id="board_title">
	    		공지사항 > 글 수정
		</h3>
<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	$con = mysqli_connect("localhost", "root", "1234", "smartita");
	$sql = "select * from noticeboard where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$name       = $row["name"];
	$pass       = $row["pass"];
	$subject    = $row["subject"];
	$content    = $row["content"];		
	$regist_day = $row["regist_day"];
	$hit        = $row["hit"];

?>
	    <form  name="board_form" method="post" action="noticeboard_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$name?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1">비밀번호</span>
			        <span class="col2"><input name="pass" type="password" value="<?=$pass?>"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">수정하기</button></li>
				<li><button type="button" onclick="location.href='noticeboard_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
