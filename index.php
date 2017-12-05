<html>
    <head>
        <meta charset="UTF-8">
        <title>URL count  shares social network</title>     
		<script type="text/javascript" src="./js/jquery.min.js"></script>
		<script type="text/javascript" src="./js/bootstrap.min.js"></script>		
		<link rel="stylesheet" href="./css/bootstrap.min.css">
    </head>
    <body>
		<div class="container">
			<header class="text-center">
				<h2>URL count  shares social network</h2>
			</header>
	<div class="container">	
		<form method="get" id="getShares">		
			<div class="row">
				<input type="text" name="url" id="url" class="form-control"  placeholder="URL" value="http://www.elpais.com"   />  
			</div>			
			<div class="row alert alert-danger ">			 
			</div>			
			<div class="row">	
				<div class="form-group">	
					<div class="col-md-3"><label class="btn btn-primary"><img src="./img/facebook.png" alt="Facebook" class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="chk1" value="facebook" class="hidden" autocomplete="off" ></label></div>
					<div class="col-md-3"><label class="btn btn-primary"><img src="./img/linkedin.png" alt="Linkedin" class="img-thumbnail img-check"><input type="checkbox" name="chk2" id="chk2" value="linkedin" class="hidden" autocomplete="off" ></label></div>
					<div class="col-md-3"><label class="btn btn-primary"><img src="./img/pinterest.png" alt="Pinterest" class="img-thumbnail img-check"><input type="checkbox" name="chk3" id="chk3" value="pinterest" class="hidden" autocomplete="off" ></label></div>
					<div class="col-md-3"><label class="btn btn-primary"><img src="./img/twitter.png" alt="Twitter" class="img-thumbnail img-check"><input type="checkbox" name="chk4" id="chk4" value="twitter" class="hidden" autocomplete="off" ></label></div>
				    <div class="col-md-3"><input type="submit" value="Find" class="btn btn-success"></div>
				</div>		
			</div>						
		</form>
	</div>
	<br>	
	<div  class="results" id ='facebook'></div>
	<div  class="results" id ='linkedin'></div>
	<div  class="results" id ='pinterest'></div>
	<div  class="results" id ='twitter'></div>	
	<footer class="col-lg-12 text-center"><br><br>PorTab - <?php echo date("Y"); ?></footer>	
</body>
</html>

<script type="text/javascript" src="./js/index.js"></script>





