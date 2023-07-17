@extends('backEnd.layout.app')

@section('page-header')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Forms</a>
        <span class="breadcrumb-item active">Hero Information</span>
    </nav>
@endsection


@section('main_content')

    {{-- HERO INFORMATION FORM --}}

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title mg-b-20 mg-sm-b-30">Update Hero Information</h6>
        <form action="{{ route('about_update_post',$abt_data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                  <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">About Field: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="about_field" value="{{ $abt_data->about_field }}" placeholder="Enter firstname">
                    </div>
                  </div><!-- col-4 -->

                  @if (strtoupper($abt_data->about_field) == "PHOTO")

                  <div class="col-lg-4">
                    <p>About Image:</p>
                        <img src="{{ asset('uploads/frontEnd/about/'.$abt_data->about_value) }}" alt="" style="width:70%">
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">New About Image: <span class="tx-danger">*</span></label>
                        <input type="hidden" value="{{ $abt_data->about_value }}" name="about_value">
                        <input class="form-control" type="file" name="photo" placeholder="Enter email address">
                    </div>
                  </div><!-- col-4 -->

                  @else

                  <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">About Value: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="about_value" value="{{ $abt_data->about_value }}" placeholder="Enter firstname">
                    </div>
                  </div><!-- col-4 -->

                  @endif

                  
                  
            </div><!-- row -->

            <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Update Form</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
            </div><!-- form-layout-footer -->
        </form>
        </div><!-- form-layout -->
    </div><!-- card -->


  
    
@endsection