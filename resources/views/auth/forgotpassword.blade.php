<!doctype html>
<html lang="en">
  <head>
      <title>Yönetim Paneli | Giriş Yapınız</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('loginpage/css/style.css')}}">
      @notifyCss
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Sifremi Unuttum  </h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Hosgeldiniz </h2>
								<p>Ant Mekanik</p>
								<a href="#" class="btn btn-white btn-outline-white">Giris Yap</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sifremi Unuttum</h3>
			      	       </div>
								 
			             	</div>
							<form action="{{route('admin.Sifremiunuttum')}}" class="signin-form" method="POST">
                            @csrf
			      		    <div class="form-group mb-3">
			      			<label class="label" for="name">Kullanıcı Mail</label>
			      			<input type="email" name="email" class="form-control" placeholder="Mail"  required>
			      		    </div>
		                 
		            <div class="form-group">
		            <button type="submit" class="form-control btn btn-primary submit px-3" value="">Giris</button>
		            </div>
		             
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
    <script src="{{asset('loginpage/js/jquery.min.js')}}"></script>
    <script src="{{asset('loginpage/js/popper.js')}}"></script>
    <script src="{{asset('loginpage/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('loginpage/js/main.js')}}"></script>
    <x:notify-messages />
    @notifyJs
	</body>
</html>
