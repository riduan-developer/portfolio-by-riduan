@extends('backEnd.auth.layout.app')



@section('main_content')





          <form method="POST" action="{{ route('login') }}">
          @csrf
                <div class="form-group">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Enter your username">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div><!-- form-group -->
              
                <div class="form-group">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Enter your password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                  @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                  @endif
                </div><!-- form-group -->
                
                <button type="submit" class="btn btn-info btn-block">Sign In</button>
          </form>
          
      <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('admin_register') }}" class="tx-info">Sign Up</a></div>

@endsection