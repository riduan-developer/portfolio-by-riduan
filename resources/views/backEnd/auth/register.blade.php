  @extends('backEnd.auth.layout.app')

  @section('main_content')
    
    <form method="POST" action="{{ route('register') }}">
      @csrf

        <div class="form-group">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your username">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><!-- form-group -->

        <div class="form-group">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror 
        </div>

        <div class="form-group">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Enter your password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><!-- form-group -->

        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter your password again">
        </div><!-- form-group -->
        

        <button type="submit" class="btn btn-info btn-block">Sign Up</button>


      </form>
    
    
      <div class="mg-t-40 tx-center">Already have an account? <a href="{{ route('admin_login') }}" class="tx-info">Sign In</a></div>
  
   
  @endsection






  @section('register_script')

      <script src="{{ asset('backEnd/lib/select2/js/select2.min.js') }}"></script>
      <script>
        $(function(){
          'use strict';

          $('.select2').select2({
            minimumResultsForSearch: Infinity
          });
        });
      </script>

  @endsection