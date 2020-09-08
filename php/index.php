<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="https://files.catbox.moe/qg5786.png" />

<!--Bootstrap-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	  <![endif]-->
	  
<title>
LtoNavi
</title>

<style>
	.webicon {
		max-width: 16px;
		height: auto;
	}

	.nav-single {
		height: 40px;
	}
	.nav-pages {
		padding-top: 1em;
	}
	.padding-top-2 {
		padding-top: 2em;
	}
	.padding-top-1 {
		padding-top: 1em;
	}
	.padding-top-025 {
		padding-top: 0.25em;
	}
	.padding-left-025 {
		padding-left: 0.25em;
	}
	.container {
		padding-top: 2em;
		padding-bottom: 2em;
	}
</style>

</head>

<body>

<div class="container">

<div class="nav-header">
	<div class="row">
	<div class="atitle col-12 col-sm-8">
		<h1>LtoNavi</h1>
		<h3><small>A simple navigation page.</small></h3>
	</div>
		
	<div class="search-bar col-12 col-sm-4 align-self-center">
	<ul class="nav nav-pills border-bottom-0 ">
		<li class="nav-item">
			<a href="#bing" data-toggle="pill" class="nav-link active btn-light">Bing</a>
		</li>

		<li class="nav-item">
			<a href="#duckduckgo" data-toggle="pill" class="nav-link btn-light">DuckDuckGo</a>
		</li>
		
	</ul>
	
	<div class="tab-content padding-top-025">
		<div class="tab-pane active" id="bing">
			<div class="search">
				<form action="https://www.bing.com/search" class="custom-control-inline search-bar border-bottom">
					<input id="bar" class="form-control border-0" name="q" value="" type="search">
					<div class="padding-left-025">
					<button id="button" class="btn btn-light align-self-center" type="submit">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
							<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
						 </svg>
					</button>
				</div>
				</form>
			</div>
		</div>
		<div class="tab-pane" id="duckduckgo">
			<div class="search">
				<form action="https://duckduckgo.com/" class="custom-control-inline search-bar border-bottom">
					<input id="bar" class="form-control border-0" name="q" value="" type="search">
					<div class="padding-left-025">
					<button id="button" class="btn btn-light align-self-center" type="submit">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
							<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
						</svg>
					</button>
				</div>
				</form>
			</div>
		</div>


	</div>
	</div>
	</div>
</div>
<?php
//读取分类数据和网站数据

$category_db = fopen('category.csv','r');

while ($category_data = fgetcsv($category_db)) { 
  $category_list[] = $category_data;
}

fclose($category_db);
$categroy_num0 = count($category_list);

//读取结束

//开始遍历

//foreach ($category_list as $category_name){ //遍历分类数据
for ($categroy_num = 0;$categroy_num <$categroy_num0;$categroy_num++){ //不用foreach就是为了能跳过第一行（逃
	$category_name = $category_list[$categroy_num];
	if ($categroy_num == 0){
		continue; //跳过第一行，防止出现各种神奇的错误
	}
  ?>
  <div class="nav-pages">
  <div class="card">
	
	<div class="card-body">
		<h4 class="card-title"><?php echo $category_name[0]; ?></h4>
		<div class="row padding-top-1">
  
  <?php

	$fn_b = "./".$category_name[0].".csv";
	$fn = (string)$fn_b;	//转成字符免得出现神奇的问题
	//echo $fn;

	
	if (!file_exists($fn)){
		echo "<p class=\"card-body\">找不到分类".$category_name[0]."的相关数据，请检查名称是否正确！</p>";
	}else{
		$link_db = fopen((string)$fn,'r');
		$link_list = array();	//清空之前的链接数据
		while ($link_data = fgetcsv($link_db)) { 
		$link_list[] = $link_data;
		}
		fclose($link_db);
	  }
	
	
	foreach ($link_list as $link_profile){  //遍历网站数据
    
      ?>

      <div class="col-6 col-sm-3 nav-single align-self-center">
			<img class="webicon" src="<?php echo $link_profile[2]; ?>">
			<a class="text-dark" href="<?php echo $link_profile[1]; ?>"><?php echo $link_profile[0]; ?></a>
      </div>
            
      <?php
    
    
  }

	
	?>

  

  </div>
	</div>
</div>
</div>

<?php
}
?>

			
      

</div>	
	
		
			
		




      <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
      <script src="https://cdn.staticfile.org/jquery/3.5.1/jquery.js"></script>
      <!-- 包括所有已编译的插件 -->
      <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>