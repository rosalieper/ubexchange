<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Activate Account</h2><br>

		<div>
			Hi {{$name}},<br>
			Welcome to <a href="#">ubexchange</a>, please follow the link below to activate your account.<br><br>
			To activate your account, follow link: {{ URL::to('activate/'.$link)}}.<br/>
			Or Click here <a href="{{ URL::to('activate/'.$link)}}">activate your account</a><br />
			If you did not register at <a href="http://ubex.nuketeck.com/">ubexchange</a>, please ignore this email.<br><br>
		</div>
		<h3>ubexchange</h3>
	</body>
</html>
