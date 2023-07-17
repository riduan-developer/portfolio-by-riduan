<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Riduan - Portfolio Admin</title>
    @include('backEnd.layout.link')
  </head>

  <body>



    @include('backEnd.layout.menuLeft')

    @include('backEnd.layout.header')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            @yield('page-header')

          <div style="margin:0 auto">
             {{-- alert for success message --}}
              @if(session()->get('success'))
                <strong style="color:green;"> {{ session()->get('success') }}</strong>
              @endif

             {{-- alert for error message --}}
              @if(session()->get('error'))
                <strong style="color:red;"> {{ session()->get('error') }}</strong>
              @endif
          </div>

        </nav>

        <div class="sl-pagebody">
            @yield('main_content')
        </div><!-- sl-pagebody -->

        @include('backEnd.layout.footer')

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @include('backEnd.layout.script')

  </body>
</html>
