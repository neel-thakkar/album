<!DOCTYPE html>
<!-- StAuth10065: I Neel Thakkar, 000743545 certify that this material is my original work. No other person's work has been used without due acknowledgement. I have not made my work available to anyone else.  -->
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<title>Lab 02 - Part A</title>
	</head>
	<body>
	<!-- <pre><?php print_r($photoData); ?></pre> -->
		<div class="container">
		<h1 style="text-align:center;"><a href="app.ctrl.php"><strong>My Photo Galleries</strong></a></h1>
		
		<div class="row container" style="background-color: lightblue; padding: 100px;">
		
		<? if($photoData[$index]["dThumbs"]) { ?>
			<? for($i = 0; $i < sizeof($photoData); $i++) { ?>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding: 5px;"><figure><a href="app.ctrl.php?act=home&index=<? echo $i; ?>"><img class="img-thumbnail" src="photos/<? echo $photoData[$i]["directory"]; ?>/thumbs/<? echo end($photoData[$i]["photos"]); ?>"/></a><figcaption><? echo $photoData[$i]["description"] ?></figcaption></figure></div>
			<? } ?>
		<? } ?>
		
		<? if($photoData[$index]["thumbs"]) { ?>
			<h3><strong><? echo $photoData[$index]['description']; ?></strong></h3>
			<p>Click on a photo to start a slide show!</p>
			<? for($i = 0; $i < sizeof($photoData[$index]['photos']); $i++) { ?>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding: 5px;"><a href="app.ctrl.php?act=single&index=<? echo $index; ?>&id=<? echo $i; ?>"><img class="img-thumbnail" src="photos/<? echo $photoData[$index]["directory"]; ?>/thumbs/<? echo $photoData[$index]["photos"][$i]; ?>"/></a></div>
			<? } ?>
		<? } ?>
		
		<? if($photoData[$index]["dSingles"]) { ?>
			<h3><strong><? echo $photoData[$index]['description']; ?></strong></h3>
			<a href="app.ctrl.php?act=single&index=<? echo $index; ?>&id=<? echo ($id - 1); ?>"><button <? if($id==0) { ?>disabled<? } ?>>PREV</button></a>
			<a href="app.ctrl.php?act=single&index=<? echo $index; ?>&id=<? echo ($id + 1); ?>"><button <? if($id==(sizeof($photoData[$index]['photos']) - 1)) { ?> disabled <? } ?>>NEXT</button></a>
			<span><strong>(<? echo ($id + 1); ?>/<? echo sizeof($photoData[$index]['photos']); ?>)</strong></span>
			<a href="app.ctrl.php?act=home&index=<? echo $index; ?>"><button>Show All Photos</button></a>
			<br>
			<br>
			<img style="padding: 10px;" class="img-thumbnail" src="photos/<? echo $photoData[$index]["directory"]; ?>/<? echo $photoData[$index]["photos"][$id]; ?>" />
		<? } ?>
		
		</div>
		
		</div>
		
	</body>
</html>