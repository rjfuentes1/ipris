@extends('admin.master', ['activePage' => 'profile'])

@section('content')
<div class="content-header text-sm">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
                    <form class="confirm" action="{{ route('people.update', $person->id) }}" method="POST">

                    @csrf
                    @method('put')

                    <div class="mb-3 row">
                        <label for="lastname" class="col-sm-3 col-form-label">Lastname</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{$person->lastname}}" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="firstname" class="col-sm-3 col-form-label">Firstname</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{$person->firstname}}" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="middlename" class="col-sm-3 col-form-label">Middlename</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="middlename" name="middlename" value="{{$person->middlename}}" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="extension" class="col-sm-3 col-form-label">Name Extension</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="extension" name="extension" value="{{$person->extension}}" oninput="this.value = this.value.toUpperCase()" placeholder="SR/JR/III">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="sex" class="col-sm-3 col-form-label">Sex</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="sex" name="sex" value="">
                                <option selected>{{ $person->sex }}</option>
                                <option disabled>SELECT</option>
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="birthdate" class="col-sm-3 col-form-label">Birthdate</label>
                        <div class="col-sm-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control datemask" id="birthdate" value="{{\Carbon\Carbon::parse($person->birthdate)->format('m/d/Y')}}" name="birthdate" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                        </div>
                        <!-- /.input group -->
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="birthreg" class="col-sm-3 col-form-label">Birth Registered?</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="birthreg" name="birthreg" value="">
                                <option selected> {{ $person->birthreg }} </option>
                                <option disabled>SELECT</option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="relhh" class="col-sm-3 col-form-label">Relation to Household</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="relhh" name="relhh" value="">
                                <option selected value="{{ $person->relhh }}"> {{ \DB::table('relhh')->where('id', $person->relhh)->first()->desc }} </option>
                                <option disabled>SELECT RELATION</option>
                                @forelse($relhhs as $relhh)
                                    <option value="{{$relhh->id}}"> {{$relhh->desc}} </option>
                                @empty
                                    <option value=""> No records found! </option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="education" class="col-sm-3 col-form-label">Highest Educational Attainment</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="education" name="education" value="{{ old('education')}}">
                                <option selected value="{{ $person->education }}"> {{ \DB::table('education')->where('id', $person->education)->first()->desc }} </option>
                                <option disabled>SELECT EDUCATION</option>
                                @forelse($educations as $education)
                                    <option value="{{$education->id}}"> {{$education->desc}} </option>
                                @empty
                                    <option value=""> No records found! </option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="philhealth" class="col-sm-3 col-form-label">Philhealth ID</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="philhealth" name="philhealth" value="{{ $person->philhealth }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="dswd_household" class="col-sm-3 col-form-label">DSWD Household #</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="dswd_household" name="dswd_household" value="{{ $person->dswd_household }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3 row">
                        <label for="community" class="col-sm-3 col-form-label">Community</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="community" name="community" value="{{ old('community')}}">
                                <option selected value="{{ $person->community }}"> {{ \App\Community::where('id', $person->community)->first()->name }} </option>
                                <option disabled>SELECT COMMUNITY</option>
                                @forelse( $communities as $community)
                                    <option value="{{ $community->id }}"> {{ $community->name }} </option>
                                @empty
                                    <option> No records found! </option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="head" class="col-sm-3 col-form-label">Head of Family</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="head" name="head" value="{{ old('head')}}">
                                <option selected value="{{ !$person->head ? null : $person->head }}"> {{ !$person->head ? '' : \App\Person::find($person->head)->lastname . ',' . \App\Person::find($person->head)->firstname . ' ' .\App\Person::find($person->head)->middlename . ' ' .\App\Person::find($person->head)->extension}} </option>
                                <!-- JS Head -->
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="ethnicity" class="col-sm-3 col-form-label">Ethnicity</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="ethnicity" name="ethnicity" value="{{ old('ethnicity')}}">
                                <option selected value="{{ $person->ethnicity }}"> {{ \App\Ethnicity::where('id', $person->ethnicity)->first()->desc }} </option>
                                <option disabled>SELECT ETHNICITY</option>
                                @forelse( $ethnicities as $ethnicity)
                                    <option value="{{ $ethnicity->id }}"> {{ $ethnicity->desc }} </option>
                                @empty
                                    <option> No records found! </option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="isIP" class="col-sm-3 col-form-label">is IP?</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="isIP" name="isIP" value="">
                                <option selected> {{ $person->isIP }} </option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>

                    <input type="text" name="id" id="id" value="{{ $person->id}} " hidden>

                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success"> Update <i class="nav-icon fas fa-save"></i></button>
                    </div>
                    </form>                  
                </div>
            </div> <!-- card -->
                 
        </div>
    </div>
</div>
@endsection