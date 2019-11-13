<!DOCTYPE html>
<html lang ="fr">
<head>
<title>form </title>
<meta charset ="utf-8">
<meta name ="viewport" content ="width=device-width ,initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>
div.bord {
	border-style: solid;
	border-width: 5px;
}
</style>

</head>
<body>
	<div class="container">
		<form id="myForm">
			<div class="bord">
				<div class="form-group">
					<label for="id_util">Identifiant : </label>
					<input type="text" class="form-control" id="id_util">
				</div>
				<div class="form-group">
					<label for="password_id">Password : </label>
					<input type="password" class="form-control" id="password_util">
				</div>
				<button type="submit" >Envoyer</button>
			</div>
		</form>
	</div>

</body>
</html>





