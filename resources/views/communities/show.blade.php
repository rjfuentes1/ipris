@extends('admin.master', ['activePage' => 'view community'])

@section('content')
<div class="content-header text-sm">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Community Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Community Profile</li>
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
                    <form class="confirm" action="{{ route('communities.update', $community->id) }}" method="POST">

                    @csrf
                    @method('put')

                    <div class="mb-3 row">
                        <label for="name" class="col-sm-3 col-form-label">Community Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $community->name }}" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="ethnicity" class="col-sm-3 col-form-label">Ethnicity</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="ethnicity" name="ethnicity" value="">
                                <option selected value="{{ $community->ethnicity }}"> {{ \App\Ethnicity::find($community->ethnicity)->desc }} </option>
                                <option disabled>SELECT ETHNICITY</option>
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
                            <select class="form-control form-control-sm select2" id="region" name="region" value="">
                                <option selected value="{{ $community->region }}"> {{ \DB::table('region')->where('regcode', $community->region)->first()->ref_regdesc }}</option>
                                <option disabled>SELECT REGION</option>
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
                            <select class="form-control form-control-sm select2" id="province" name="province" value="">
                                <option selected value="{{ $community->province }}"> {{ \DB::table('province')->where('provcode', $community->province)->first()->provname }} </option>
                                <!-- JS Provinces -->
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="municipality" class="col-sm-3 col-form-label">Municipality</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="municipality" name="municipality" value="{{ old('municipality')}}">
                            <option selected value="{{ $community->municipality }}"> {{ \DB::table('municipality')->where('muncode', $community->municipality)->first()->munname }} </option>
                            <!-- JS Municipalities -->
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="barangay" class="col-sm-3 col-form-label">Barangay</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="barangay" name="barangay" value="{{ old('barangay')}}">
                                <option selected value="{{ $community->barangay }}"> {{ \DB::table('barangay')->where('brgycode', $community->barangay)->first()->brgyname }} </option>
                                <!-- JS Barangays -->
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="sitio" class="col-sm-3 col-form-label">Sitio</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="sitio" name="sitio" value="{{ $community->sitio }}" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="leader" class="col-sm-3 col-form-label">Leader</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="leader" name="leader" value="{{ old('leader')}}">
                                <option selected value="{{ !$community->leader ? '' : $community->leader }}"> {{ !$community->leader ? '' : \App\Person::find($community->leader)->lastname . ',' . \App\Person::find($community->leader)->firstname . ' ' .\App\Person::find($community->leader)->middlename . ' ' .\App\Person::find($community->leader)->extension}} </option>
                                <!-- JS Ledears -->
                            </select>
                        </div>
                    </div>

                    <input type="text" name="id" id="id" value="{{ $community->id }}" hidden readonly>
                    <input type="text" name="updated_at" id="updated_at" value="{{\Carbon\Carbon::now()}}" hidden readonly>

                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-save"></i> Update </button>
                    </div>
                    </form>                       
                </div>
            </div>

        </div>
    </div>
</div>
@endsection