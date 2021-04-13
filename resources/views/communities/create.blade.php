@extends('admin.master', ['activePage' => 'new community'])

@section('content')
<div class="content-header text-sm">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">New Community</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">New Community</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!--content-body -->
<div class="container">
    <div class="row justify-content-center">
    
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="confirm" action="{{ route('communities.store') }}" method="post">

                    @csrf

                    <div class="mb-3 row">
                        <label for="name" class="col-sm-3 col-form-label">Community Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name" name="name" value="" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="ethnicity" class="col-sm-3 col-form-label">Ethnicity</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="ethnicity" name="ethnicity" value="{{ old('ethnicity')}}">
                                <option selected disabled>SELECT ETHNICITY</option>
                                @forelse($ethnicities as $ethnicity)
                                    <option value="{{ $ethnicity->id }}"> {{ $ethnicity->desc }} </option>
                                @empty
                                    <option> No records found! </option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="region" class="col-sm-3 col-form-label">Region</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="region" name="region" value="{{ old('region')}}">
                                <option selected disabled>SELECT REGION</option>
                                @forelse( $regions as $region)
                                    <option value="{{ $region->regcode }}"> {{ $region->ref_regdesc }} </option>
                                @empty
                                    <option> No records found! </option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="province" class="col-sm-3 col-form-label">Province</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="province" name="province" value="{{ old('province')}}">
                                <!-- JS Provinces -->
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="municipality" class="col-sm-3 col-form-label">Municipality</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="municipality" name="municipality" value="{{ old('municipality')}}">
                            <!-- JS Municipalities -->
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="barangay" class="col-sm-3 col-form-label">Barangay</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="barangay" name="barangay" value="{{ old('barangay')}}">
                                <!-- JS Barangays -->
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="sitio" class="col-sm-3 col-form-label">Sitio</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="sitio" name="sitio" value="" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="leader" class="col-sm-3 col-form-label">Leader</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="leader" name="leader" value="{{ old('leader')}}">
                                <!-- JS Ledears -->
                            </select>
                        </div>
                    </div>

                    <input type="text" name="created_at" id="created_at" value="{{\Carbon\Carbon::now()}}" hidden readonly>

                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-save"></i> Insert </button>
                    </div>
                    </form>                       
                </div>
            </div>

        </div>
    </div>
</div>
@endsection