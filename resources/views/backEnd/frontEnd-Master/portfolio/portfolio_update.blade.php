@extends('backEnd.layout.app')

@section('page-header')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Forms</a>
        <span class="breadcrumb-item active">Portfolio Information</span>
    </nav>
@endsection


@section('main_content')

    {{-- HERO INFORMATION FORM --}}

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title mg-b-20 mg-sm-b-30">Update Portfolio Information</h6>
        <form action="{{ route('portfolio_update_post',$portfolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                  <div class="col-lg-2">
                  <div class="form-group">
                    <label class="form-control-label">Portfolio Category: <span class="tx-danger">*</span></label>
                    <select class="form-select form-control" aria-label="Default select example" name="category" value="{{ old('category') }}">
                        @if ($portfolio->category == 'front end')
                            <option value="front end" selected>FRONT END</option>
                            <option value="back end">BACK END</option>
                        @elseif($portfolio->category == 'back end')
                            <option value="front end">FRONT END</option>
                            <option value="back end" selected>BACK END</option>
                        @endif
                    </select>
                  </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <p>Current Photo:</p>
                    <img src="{{ asset('uploads/frontEnd/portfolio/'.$portfolio->p_photo) }}" alt="" style="width:400px">
                  </div>
                  <div class="col-lg-4">
                  <div class="form-group">
                      <label class="form-control-label">Portfolio Photo: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="file" name="portfolio_photo" placeholder="Enter photo">
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