@extends('admin.master', ['activePage' => 'new entry'])

@section('content')
<div class="content-header text-sm">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">New Entry</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">New Entry</li>
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
                    <form class="confirm" action="{{ route('people.store') }}" method="post">

                    @csrf

                    <div class="mb-3 row">
                        <label for="lastname" class="col-sm-3 col-form-label">Lastname</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="lastname" name="lastname" value="" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="firstname" class="col-sm-3 col-form-label">Firstname</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="firstname" name="firstname" value="" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="middlename" class="col-sm-3 col-form-label">Middlename</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="middlename" name="middlename" value="" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="extension" class="col-sm-3 col-form-label">Name Extension</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="extension" name="extension" value="" oninput="this.value = this.value.toUpperCase()" placeholder="SR/JR/III">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="sex" class="col-sm-3 col-form-label">Sex</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="sex" name="sex" value="{{ old('sex')}}">
                                <option selected disabled>SELECT</option>
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
                            <input type="text" class="form-control datemask" id="birthdate" name="birthdate" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                        </div>
                        <!-- /.input group -->
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="birthreg" class="col-sm-3 col-form-label">Birth Registered?</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="birthreg" name="birthreg" value="{{ old('birthreg')}}">
                                <option selected disabled>SELECT</option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="relhh" class="col-sm-3 col-form-label">Relation to Household</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="relhh" name="relhh" value="{{ old('relhh')}}">
                                <option selected disabled>SELECT RELATION</option>
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
                                <option selected disabled>SELECT EDUCATION</option>
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
                            <input type="text" class="form-control" id="philhealth" name="philhealth" value="NOT AVAILABLE" oninput="this.value = this.value.toUpperCase()">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="dswd_household" class="col-sm-3 col-form-label">DSWD Household #</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="dswd_household" name="dswd_household" value="NOT AVAILABLE" oninput="this.value = this.value.toUpperCase()">
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3 row">
                        <label for="community" class="col-sm-3 col-form-label">Community</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="community" name="community" value="{{ old('community')}}">
                                <option selected disabled>SELECT COMMUNITY</option>
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
                                <!-- JS Head -->
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="isIP" class="col-sm-3 col-form-label">is IP?</label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm select2" id="isIP" name="isIP" value="{{ old('isIP')}}">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success"> Insert <i class="nav-icon fas fa-save"></i></button>
                    </div>
                    </form>                  
                </div>
            </div> <!-- card -->
                 
        </div>
    </div>
</div>
@endsection