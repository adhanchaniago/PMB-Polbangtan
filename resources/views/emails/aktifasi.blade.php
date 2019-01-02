<html>
	<head>
    	<title>Aktifasi Akun</title>
	</head> 
	<body>
		<h2>Aktifasi Akun</h2>
		<p>
			Kepada Sdr/i {{$user['name']}}, Terima Kasih Sudah Mendaftar Di Website Kami.
		</p>
		<p>
			Silahkan klik link <a href="{{ url('/aktifasi?verification_code=' . $user['verification_code'] . '&email=' . $user['email']) }}"> berikut</a> untuk mengaktifkan akun anda.
		</p>
	</body> 
</html>