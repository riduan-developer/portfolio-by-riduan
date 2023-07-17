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
        <h6 class="card-body-title mg-b-20 mg-sm-b-30">Add Portfolio Information</h6>
        <form action="{{ route('add_potfolio') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                  <div class="col-lg-2">
                  <div class="form-group">
                      <label class="form-control-label">Portfolio Category: <span class="tx-danger">*</span></label>
                      <select class="form-select form-control" aria-label="Default select example" name="category" value="{{ old('category') }}">
                        <option>--Choose Any--</option>
                        <option value="front-end">FRONT END</option>
                        <option value="back-end">BACK END</option>
                      </select>
                  </div>
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                  <div class="form-group">
                      <label class="form-control-label">Portfolio Photo: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="file" name="portfolio_photo">
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
                <th class="wd-20p">Hero Category</th>
                <th class="wd-15p">Hero Photo</th>
                <th class="wd-5p">Status</th>
                <th class="wd-10p">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($portfolios as $portfolio)
                 
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td style="text-transform: uppercase">{{ $portfolio->category }}</td>
                  <td>
                    <img src="{{ asset('uploads/frontEnd/portfolio/'.$portfolio->p_photo) }}" alt="" style="width:200px">
                  </td>
                  <td>
                    @if ($portfolio->status == 0)
                      <a href="{{ route('portfolio_status',$portfolio->id) }}"><strong style="color: grey">Inactive</strong></a>
                    @elseif ($portfolio->status == 1)
                      <a href="{{ route('portfolio_status',$portfolio->id) }}"><strong style="color: green">Active</strong></a>
                    @else
                      <strong style="color: grey">Undefined</strong>
                    @endif
                  </td>
                  <td>
                      <button class="btn btn-sm btn-primary">
                          <a href="{{ route('portfolio_update',$portfolio->id) }}" class="text-white">Update</a>
                      </button>

                      <button class="btn btn-sm btn-danger">
                          <a href="{{ route('del_portfolio',$portfolio->id) }}" class="text-white">Delete</a>
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