<!-- Filter -->
<div class="col-md-12">
      <div class="card">
          <div class="card-body">
              <div class="box-group" id="accordion">
              <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
              <div class="panel box box-primary">
                <div class="box-header with-border">
                <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      <i class="nav-icon fas fa-filter text-success"></i>
                    </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in">
                <div class="box-body">
                  <div class="col-lg-12">
                  <!-- form start -->
                    <form class="form-row" action="{{ route('filter') }}" method="post">

                    @csrf
                    
                      <!-- <label for="region" class="col-sm-2 control-label">Region </label> -->
                      <div class="col-lg-2"> 
                        <label for="region" class="form-label">Region</label>               
                        <select class="form-control form-control-sm select2" id="region" name="region" style="width: 100%;">
                        <option selected disabled>SELECT REGION</option>
                          @if( Auth::user()->region == '')
                              <option disabled selected>Select Region</option>
                              @forelse($regions as $region)
                                <option value="{{ $region->regcode }}"> {{ $region->ref_regdesc }}</option>
                              @empty
                                <option disabled>No records found!</option>
                              @endforelse
                          @else
                              <option selected value="{{ Auth::user()->region }}">{{ \DB::table('region')->where('regcode', Auth::user()->region)->first()->ref_regdesc }}</option>
                          @endif
                        </select>
                      </div>

                      <div class="col-lg-2"> 
                        <label for="province" class="form-label">Province</label>              
                        <select class="form-control form-control-sm select2" id="province" name="province" style="width: 100%;">
                        <option selected disabled>SELECT PROVINCE</option>
                          @if( Auth::user()->province == '')
                              <option disabled selected>Select Province</option>
                              @forelse($provinces as $province)
                                <option value="{{ $province->provcode }}"> {{ $province->provname }}</option>
                              @empty
                                <option disabled>No records found!</option>
                              @endforelse
                          @else
                              <option selected value="{{ Auth::user()->province }}">{{ \DB::table('province')->where('provcode', Auth::user()->province)->first()->provname }}</option>
                          @endif
                        </select>
                      </div>

                      <div class="col-lg-2">
                        <label for="municipality" class="form-label">Municipality</label>           
                        <select class="form-control form-control-sm select2" id="municipality" name="municipality" style="width: 100%;">
                            <option value="">ALL</option>
                          @forelse( \DB::table('municipality')->where('provcode', Auth::user()->province)->get() as $municipality)
                            <option value="{{ $municipality->muncode }}"> {{ $municipality->munname }}</option>
                          @empty
                            <option disabled>No records found!</option>
                          @endforelse
                        </select>
                      </div>

                      <div class="col-lg-2">
                        <label for="barangay" class="form-label">Barangay</label>     
                        <select class="form-control form-control-sm select2" id="barangay" name="barangay" style="width: 100%;">
                        </select>
                      </div>

                      <div class="col-lg-2">    
                        <label for="sitio" class="form-label">Sitio</label>            
                        <select class="form-control form-control-sm select2" id="sitio" name="sitio" style="width: 100%;">
                        </select>
                      </div>

                    </div>

                    <hr>

                    <div class="form-row">

                      <div class="col-lg-2"> 
                        <label for="sex" class="form-label">Sex</label>            
                        <select class="form-control form-control-sm select2" id="sex" name="sex" style="width: 100%;">
                          <option selected disabled>SELECT SEX</option>
                          <option value="'MALE'">MALE</option>
                          <option value="'FEMALE'">FEMALE</option>
                        </select>
                      </div>
                      
                      <div class="col-lg-2">
                        <label for="minage" class="form-label">Min</label>              
                        <input type="text" class="form-control" id="minage" name="minage" value="" placeholder="Minimum Age" oninput="this.value = this.value.toUpperCase()">
                      </div>

                      <div class="col-lg-2">
                        <label for="maxage" class="form-label">Max</label>              
                        <input type="text" class="form-control" id="maxage" name="maxage" value="" placeholder="Maximum Age" oninput="this.value = this.value.toUpperCase()">
                      </div>
                      
                      <div class="col-lg-1">
                        <label for="filterbtn" class="form-label">Action</label>              
                        <button type="submit" class="btn btn-success form-control"> Filter </button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
          </div>
        </div>
    </div>
    <!-- /.box-body -->
    
          <!-- Filter -->