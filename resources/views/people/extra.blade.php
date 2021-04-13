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
                        <select class="form-control form-control-sm select2" id="sitio" name="sitio" value="{{ old('sitio')}}">
                            <option selected disabled>SELECT COMMUNITY</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
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