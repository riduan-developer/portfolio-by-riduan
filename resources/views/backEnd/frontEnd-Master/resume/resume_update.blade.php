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
        <form action="{{ route('resume_update_post',$resume->id) }}" method="POST">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                          <div class="form-group">
                              <label class="form-control-label">Resume Header Text: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="header" value="{{ $resume->header }}" placeholder="Enter Header">
                          </div>
      
                          <div class="form-group">
                              <label class="form-control-label">Resume Title: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="title" value="{{ $resume->title }}" placeholder="Enter Title">
                          </div>
                        </div><!-- col-4 -->
      
                        <div class="col-lg-4">
                          <div class="form-group">
                              <label class="form-control-label">Resume Institution: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="institution" value="{{ $resume->institution }}" placeholder="Enter Institution name">
                          </div>
      
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                  <label class="form-control-label">Started from: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="date" name="date_from" value="{{ $resume->date_from }}">
                              </div>
                            </div>
      
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Finished at: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" name="date_to" value="{{ $resume->date_to }}">
                                </div>
                            </div>
      
                            <div class="col-6 ml-auto text-right">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="date_to_current" id="flexCheckChecked" {{ $resume->date_to_current != NULL ? "checked" : "" }}>
                                <label class="form-check-label" for="flexCheckChecked">
                                  Currently Doing it.
                                </label>
                              </div>
                            </div>
                            </div>
      
      
                        </div><!-- col-4 -->
      
                        
                        <div class="col-lg-8">
                          <div class="form-group">
                              <label class="form-control-label">Service Description: <span class="tx-danger">*</span></label>
                              <textarea  class="form-control" name="description" id="" cols="120" rows="8">{{ $resume->description }}</textarea>
                          </div>
                        </div><!-- col-4 -->
                        
                    </div><!-- row -->
      
                    <div class="form-layout-footer">
                          <button class="btn btn-info mg-r-5">Submit Form</button>
                          <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                  </div><!-- form-layout-footer -->

        </form>
        </div><!-- form-layout -->
    </div><!-- card -->


  
    
@endsection