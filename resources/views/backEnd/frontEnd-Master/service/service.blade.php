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
        <h6 class="card-body-title mg-b-20 mg-sm-b-30">Add Service Information</h6>
        <form action="{{ route('add_service') }}" method="POST">
            @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                  <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Service Title: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="service_title" value="{{ old('service_title') }}" placeholder="Enter Service Title">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-control-label">Service Icon: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="service_icon" value="{{ old('service_icon') }}" placeholder="Enter Service Icon Class">
                    </div>
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Service Description: <span class="tx-danger">*</span></label>
                        <textarea  class="form-control" name="service_text" id="" cols="120" rows="5">{{ old('service_text') }}</textarea>
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
                <th class="wd-10p">Service Title</th>
                <th class="wd-10p">Service Title</th>
                <th class="wd-25p">Service Icon</th>
                <th class="wd-5p">Status</th>
                <th class="wd-10p">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($service_data as $service)
                 
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $service->service_title }}</td>
                  <td>{{ $service->service_icon }}</td>
                  <td>{{ $service->service_text == NULL ? 'NULL' : $service->service_text }}</td>
                  <td>
                    @if ($service->status == 0)
                      <a href="{{ route('service_status',$service->id) }}"><strong style="color: grey">Inactive</strong></a>
                    @elseif ($service->status == 1)
                      <a href="{{ route('service_status',$service->id) }}"><strong style="color: green">Active</strong></a>
                    @else
                      <strong style="color: grey">Undefined</strong>
                    @endif
                  </td>
                  <td>
                      <button class="btn btn-sm btn-primary">
                          <a href="{{ route('service_update',$service->id) }}" class="text-white">Update</a>
                      </button>

                      <button class="btn btn-sm btn-danger">
                          <a href="{{ route('service_delete',$service->id) }}" class="text-white">Delete</a>
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