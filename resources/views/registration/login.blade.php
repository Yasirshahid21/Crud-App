@include ('partials.header')
<div class="container">
@if(Session::get('success'))
		<div class="alert alert-success">
			{{Session::get('success')}}
		</div>
	@endif
    @if(Session::get('fail'))
		<div class="alert alert-danger">
			{{Session::get('fail')}}
		</div>
	@endif
    <div class="row mt-5">
        <div class="col-md-12">
            <form class="form-outline w-50 m-auto shadow p-4 mb-5 bg-white rounded" action="{{route('login-user')}}" method="POST">
                @csrf
             <div class="text-center">
                <h4>Login User</h4>
             </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" value="" class="form-control" id="email">
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="adress" class="form-label">Password</label>
                    <input type="password" name="password" value="" class="form-control" id="password">
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
                <div class="mt-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
         </div>
    </div>
</div>
@include ('partials.footer')