@extends('backEnd.layout.app')

@section('page-header')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Forms</a>
        <span class="breadcrumb-item active">Service Information</span>
    </nav>
@endsection


@section('main_content')

    {{-- HERO INFORMATION FORM --}}

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title mg-b-20 mg-sm-b-30">Update Service Information</h6>
        <form action="{{ route('service_update_post',$service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                  <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Service Title: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="service_title" value="{{ $service->service_title }}">
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Service Icon: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="service_icon" value="{{ $service->service_icon }}">
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Service Description: <span class="tx-danger">*</span></label>
                        <textarea  class="form-control" name="service_text" id="" cols="120" rows="5">{{ $service->service_text }}</textarea>
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