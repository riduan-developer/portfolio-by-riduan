@extends('backEnd.layout.app')

@section('page-header')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Forms</a>
        <span class="breadcrumb-item active">Services Information</span>
    </nav>
@endsection


@section('main_content')

    {{-- service INFORMATION FORM --}}

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title mg-b-20 mg-sm-b-30">Add Skill Information</h6>
        <form action="{{ route('add_skill') }}" method="POST">
            @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                  <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Skill Title: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="skill_title" value="{{ old('skill_title') }}" placeholder="Enter Skill Title">
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-3">                  
                    <div class="form-group">
                        <label class="form-control-label">Skill Percentage: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="number" name="skill_percentage" value="{{ old('skill_percentage') }}" placeholder="Enter Skill Percentage">
                    </div>
                  </div>
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
                <th class="wd-10p">Title</th>
                <th class="wd-10p">Percentage</th>
                <th class="wd-5p">Status</th>
                <th class="wd-10p">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($skills as $skill)
                 
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $skill->title }}</td>
                  <td>{{ $skill->percent }}</td>
                  <td>
                    @if ($skill->status == 0)
                      <a href="{{ route('skill_status',$skill->id) }}"><strong style="color: grey">Inactive</strong></a>
                    @elseif ($skill->status == 1)
                      <a href="{{ route('skill_status',$skill->id) }}"><strong style="color: green">Active</strong></a>
                    @else
                      <strong style="color: grey">Undefined</strong>
                    @endif
                  </td>
                  <td>
                      <button class="btn btn-sm btn-primary">
                          <a href="{{ route('skill_update',$skill->id) }}" class="text-white">Update</a>
                      </button>

                      <button class="btn btn-sm btn-danger">
                          <a href="{{ route('delete_update',$skill->id) }}" class="text-white">Delete</a>
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