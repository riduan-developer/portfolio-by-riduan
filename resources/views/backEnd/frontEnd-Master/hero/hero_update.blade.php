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
        <form action="{{ route('hero_update_post',$hero_data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                  <div class="col-lg-4">
                  <div class="form-group">
                      <label class="form-control-label">Hero Title: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="title" value="{{ $hero_data->title }}" placeholder="Enter firstname">
                  </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <p>Hero Image:</p>
                    <img src="{{ asset('uploads/frontEnd/hero/'.$hero_data->photo) }}" alt="" style="width:500px">
                  </div>
                  <div class="col-lg-2">
                  <div class="form-group">
                      <label class="form-control-label">Hero Image: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="file" name="photo" placeholder="Enter email address">
                  </div>
                  </div><!-- col-4 -->
                  
            </div><!-- row -->

            <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Update Form</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
            </div><!-- form-layout-footer -->
        </form>
        </div><!-- form-layout -->
    </div><!-- card -->


  
    
@endsection