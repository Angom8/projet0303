<!DOCTYPE html>
<html lang ="fr">
<head>
<title>Lecteur de News </title>
<meta charset ="utf-8">
<meta name ="viewport" content ="width=device-width ,initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<form id="myForm">
			<div class="alert alert-success" style="display:none"></div>
			<div class="form-group">
				<label for="nom">Nom de l’auteur :</label>
				<input type="text" class="form-control" id="nom"></div>
			<div class="form-group">
				<label for="message">Nouvelle:</label>
				<input type="text" class="form-control" id="message">
			</div>
			<div class ="form-group">
				<label for="date">Date:</label>
				<input type="text" class="form-control" id="date">
			</div>
			<button class="btn btn-primary" id="ajaxSubmit">Envoyer</button>
		</form>
	</div>

</body>
</html>









