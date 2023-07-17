@extends('backEnd.layout.app')

@section('page-header')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Forms</a>
        <span class="breadcrumb-item active">Services Information</span>
    </nav>
@endsection


@section('main_content')

    {{-- service INFORMATION FORM --}}

    @if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title mg-b-20 mg-sm-b-30">Add Resume Information</h6>
        <form action="{{ route('add_resume') }}" method="POST">
            @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                  <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Resume Header Text: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="header" value="{{ old('header') }}" placeholder="Enter Header">
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Resume Title: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Enter Title">
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Resume Institution: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="institution" value="{{ old('institution') }}" placeholder="Enter Institution name">
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                            <label class="form-control-label">Started from: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="date" name="date_from" value="{{ old('date_from') }}">
                        </div>
                      </div>

                      <div class="col-6">
                          <div class="form-group">
                              <label class="form-control-label">Finished at: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="date" name="date_to" value="{{ old('date_to') }}">
                          </div>
                      </div>

                      <div class="col-6 ml-auto text-right">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" name="date_to_current" id="flexCheckChecked">
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
                        <textarea  class="form-control" name="description" id="" cols="120" rows="8">{{ old('description') }}</textarea>
                    </div>
                  </div><!-- col-4 -->
                  
              </div><!-- row -->

              <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5">Submit Form</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
              </div>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </form>
    </div><!-- card -->


    {{-- service INFORMATION TABLE --}}
    <div class="sl-page-title" style="margin-top: 50px">
        

      <div class="card pd-20 pd-sm-40">

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-5p">SL No.</th>
                <th class="wd-10p">Header</th>
                <th class="wd-10p">Title</th>
                <th class="wd-35p">Description</th>
                <th class="wd-15p">Institution</th>
                <th class="wd-5p">Status</th>
                <th class="wd-10p">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($resumes as $resume)
                 
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $resume->header }}</td>
                  <td>{{ $resume->title }}</td>
                  <td>{{ $resume->description }}</td>
                  <td>{{ $resume->institution }}</td>
                  <td>
                    @if ($resume->status == 0)
                      <a href="{{ route('resume_status',$resume->id) }}"><strong style="color: grey">Inactive</strong></a>
                    @elseif ($resume->status == 1)
                      <a href="{{ route('resume_status',$resume->id) }}"><strong style="color: green">Active</strong></a>
                    @else
                      <strong style="color: grey">Undefined</strong>
                    @endif
                  </td>
                  <td>
                      <button class="btn btn-sm btn-primary">
                          <a href="{{ route('resume_update',$resume->id) }}" class="text-white">Update</a>
                      </button>

                      <button class="btn btn-sm btn-danger">
                          <a href="{{ route('resume_delete',$resume->id) }}" class="text-white">Delete</a>
                      </button>
                  </td>
                </tr>

              @empty 
                <td style="text-align: center" colspan="5"> <strong style="color: red">No Data Available!</strong></td>

              @endforelse

            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->






    
@endsection