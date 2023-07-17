@extends('backEnd.layout.app')

@section('page-header')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Forms</a>
        <span class="breadcrumb-item active">About Information</span>
    </nav>
@endsection


@section('main_content')

    {{-- About INFORMATION FORM --}}

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title mg-b-20 mg-sm-b-30">Add About Information</h6>
        <form action="{{ route('add_about') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                  <div class="col-lg-4">
                  <div class="form-group">
                      <label class="form-control-label">Field Name: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="about_field" value="{{ old('about_field') }}" placeholder="Enter Field Name">
                  </div>
                  </div><!-- col-4 -->
                  <div class="form-group">
                      <label class="form-control-label">Field Value: <span class="tx-danger">*</span></label>
                      <textarea  class="form-control" name="about_value" id="" cols="80" rows="5">{{ old('about_value') }}</textarea>
                  </div>
                </div><!-- col-4 -->
                  <div class="col-lg-4">
                  <div class="form-group">
                      <label class="form-control-label">About Section Image: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="file" name="photo" placeholder="Enter email address">
                  </div>
                  </div><!-- col-4 -->
                  
            </div><!-- row -->

            <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Submit Form</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
            </div><!-- form-layout-footer -->
        </form>
        </div><!-- form-layout -->
    </div><!-- card -->


    {{-- About INFORMATION TABLE --}}
    <div class="sl-page-title" style="margin-top: 50px">
        <h5>Data Table</h5>
        <p>DataTables is a plug-in for the jQuery Javascript library.</p>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-5p">SL No.</th>
                <th class="wd-10p">About Field</th>
                <th class="wd-25p">About Value</th>
                <th class="wd-5p">Status</th>
                <th class="wd-10p">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($abt_datas as $about)
                 
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $about->about_field }}</td>

                  @if($about->about_field == "PHOTO")
                  <td>
                    <img src="{{ asset('uploads/frontEnd/about/'.$about->about_value) }}" alt="" style="width:200px">
                  </td>
                  @else 
                  <td style="line-height: 30px;letter-spacing: 1px">{{ $about->about_value }}</td>
                  @endif
                  
                  <td>
                    @if ($about->status == 0)
                      <a href="{{ route('about_status',$about->id) }}"><strong style="color: grey">Inactive</strong></a>
                    @elseif ($about->status == 1)
                      <a href="{{ route('about_status',$about->id) }}"><strong style="color: green">Active</strong></a>
                    @else
                      <strong style="color: grey">Undefined</strong>
                    @endif
                  </td>
                  <td>
                      <button class="btn btn-sm btn-primary">
                          <a href="{{ route('about_update',$about->id) }}" class="text-white">Update</a>
                      </button>

                      <button class="btn btn-sm btn-danger">
                          <a href="{{ route('about_delete',$about->id) }}" class="text-white">Delete</a>
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