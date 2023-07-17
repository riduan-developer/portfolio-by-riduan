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
        <h6 class="card-body-title mg-b-20 mg-sm-b-30">Add Hero Information</h6>
        <form action="{{ route('add_hero') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                  <div class="col-lg-4">
                  <div class="form-group">
                      <label class="form-control-label">Hero Title: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Enter firstname">
                  </div>
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                  <div class="form-group">
                      <label class="form-control-label">Hero Image: <span class="tx-danger">*</span></label>
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


    {{-- HERO INFORMATION TABLE --}}
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
                <th class="wd-20p">Hero Title</th>
                <th class="wd-15p">Hero Photo</th>
                <th class="wd-5p">Status</th>
                <th class="wd-10p">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($hero_datas as $hero)
                 
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $hero->title }}</td>
                <td>
                  <img src="{{ asset('uploads/frontEnd/hero/'.$hero->photo) }}" alt="" style="width:200px">
                </td>
                <td>
                  @if ($hero->status == 0)
                    <a href="{{ route('hero_status',$hero->id) }}"><strong style="color: grey">Inactive</strong></a>
                  @elseif ($hero->status == 1)
                    <a href="{{ route('hero_status',$hero->id) }}"><strong style="color: green">Active</strong></a>
                  @else
                    <strong style="color: grey">Undefined</strong>
                  @endif
                </td>
                <td>
                    <button class="btn btn-sm btn-primary">
                        <a href="{{ route('hero_update',$hero->id) }}" class="text-white">Update</a>
                    </button>

                    <button class="btn btn-sm btn-danger">
                        <a href="{{ route('hero_delete',$hero->id) }}" class="text-white">Delete</a>
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