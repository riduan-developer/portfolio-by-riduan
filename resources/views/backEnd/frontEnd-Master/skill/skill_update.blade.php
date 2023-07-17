@extends('backEnd.layout.app')

@section('page-header')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Forms</a>
        <span class="breadcrumb-item active">Skill Information</span>
    </nav>
@endsection


@section('main_content')

    {{-- HERO INFORMATION FORM --}}

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title mg-b-20 mg-sm-b-30">Update Skill Information</h6>
        <form action="{{ route('skill_update_post',$skill->id) }}" method="POST">
                @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                  <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Skill Title: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="skill_title" value="{{ $skill->title }}">
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Service Percentage: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="skill_percent" value="{{ $skill->percent }}">
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