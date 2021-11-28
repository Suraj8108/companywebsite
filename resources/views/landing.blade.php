<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign up & Login Form</title>
  <link  href="{{ url('/assets/css/landing.css') }}" rel="stylesheet" type="text/css">
  <!--<link  href="{{ url('/assets/css/companylist.css') }}" rel="stylesheet" type="text/css">-->

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main"> 
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
					<label for="chk" aria-hidden="true">Sign up</label>
                    
                    @if($errors->has('err_msg'))
                    <div class="error_msg">{{ $errors->first('err_msg') }}</div>
                    @endif

                    @if($errors->has('succ_msg'))
                    <div class="succ_msg">{{ $errors->first('succ_msg') }}</div>
                    @endif
                    
                    <form action="register" method="POST">
                    @csrf
					<input type="text" name="name" placeholder="User name" required="">
                    @if($errors->has('name'))
                    <div class="field_error">{{ $errors->first('name') }}</div>
                    @endif
					<input type="email" name="email" placeholder="Email" required="">
					@if($errors->has('email'))
                    <div class="field_error">{{ $errors->first('email') }}</div>
                    @endif
                    <input type="password" name="password" placeholder="Password" required="">
					@if($errors->has('password'))
                    <div class="field_error">{{ $errors->first('password') }}</div>
                    @endif
                    <button>Sign up</button>
				</form>
			</div>

			<div class="login">
				<form action="login" method="POST">
                    @csrf
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pass" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
