@extends('layouts.template')
@push('css')
<link href="{{ asset('assets/vendor/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
@endpush
@section('content')
            <h1 class="mt-4">Cek Kualitas</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Cek Kualitas
                </li>
            </ol>
            
            <form class="mb-4" action="{{ route('cek-kualitas.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nomor_identitas">Nomor Identitas</label>
                    <input type="text" class="form-control" name="nomor_identitas" id="nomor_identitas" placeholder="Nomor Identitas" required>
                </div>

                <div class="form-group">
                    <label for="jenis_kopi">Jenis Kopi</label>
                    <input type="text" class="form-control" name="jenis_kopi" id="jenis_kopi" placeholder="Jenis Kopi" required>
                </div>

                <h5 class="mt-4">Deskripsi Cita Rasa</h5>
                <p>Deskripsi Cita Rasa</p>

                <p>0 - (Tidak Ada)</p>
                <p>1-2 (Sangat Rendah)</p>
                <p>3-4 (Rendah)</p>
                <p>5-6 (Sedang)</p>
                <p>7-8 (Tinggi)</p>
                <p>9-10 (Sangat Tinggi)</p>
                
                <!--- Aroma ---!>
                <h6 class="mt-5">Fragrance / Aroma</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="aroma0">0</label>
                    </div>
                    <div class="col">
                        <label for="aroma1">1</label>
                    </div>
                    <div class="col">
                        <label for="aroma2">2</label>
                    </div>
                    <div class="col">
                        <label for="aroma3">3</label>
                    </div>
                    <div class="col">
                        <label for="aroma4">4</label>
                    </div>
                    <div class="col">
                        <label for="aroma5">5</label>
                    </div>
                    <div class="col">
                        <label for="aroma6">6</label>
                    </div>
                    <div class="col">
                        <label for="aroma7">7</label>
                    </div>
                    <div class="col">
                        <label for="aroma8">8</label>
                    </div>
                    <div class="col">
                        <label for="aroma9">9</label>
                    </div>
                    <div class="col">
                        <label for="aroma10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="aroma0" name="aroma" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="aroma1" name="aroma" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="aroma2" name="aroma" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="aroma3" name="aroma" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="aroma4" name="aroma" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="aroma5" name="aroma" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="aroma6" name="aroma" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="aroma7" name="aroma" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="aroma8" name="aroma" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="aroma9" name="aroma" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="aroma10" name="aroma" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End Aroma ---!>

                <!--- Flavor / Rasa ---!>
                <h6 class="mt-5">Flavor / Rasa</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="rasa0">0</label>
                    </div>
                    <div class="col">
                        <label for="rasa1">1</label>
                    </div>
                    <div class="col">
                        <label for="rasa2">2</label>
                    </div>
                    <div class="col">
                        <label for="rasa3">3</label>
                    </div>
                    <div class="col">
                        <label for="rasa4">4</label>
                    </div>
                    <div class="col">
                        <label for="rasa5">5</label>
                    </div>
                    <div class="col">
                        <label for="rasa6">6</label>
                    </div>
                    <div class="col">
                        <label for="rasa7">7</label>
                    </div>
                    <div class="col">
                        <label for="rasa8">8</label>
                    </div>
                    <div class="col">
                        <label for="rasa9">9</label>
                    </div>
                    <div class="col">
                        <label for="rasa10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="rasa0" name="rasa" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="rasa1" name="rasa" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="rasa2" name="rasa" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="rasa3" name="rasa" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="rasa4" name="rasa" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="rasa5" name="rasa" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="rasa6" name="rasa" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="rasa7" name="rasa" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="rasa8" name="rasa" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="rasa9" name="rasa" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="rasa10" name="rasa" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End Flavor / Rasa ---!>

                <!--- After Taste ---!>
                <h6 class="mt-5">After Taste</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="after_taste0">0</label>
                    </div>
                    <div class="col">
                        <label for="after_taste1">1</label>
                    </div>
                    <div class="col">
                        <label for="after_taste2">2</label>
                    </div>
                    <div class="col">
                        <label for="after_taste3">3</label>
                    </div>
                    <div class="col">
                        <label for="after_taste4">4</label>
                    </div>
                    <div class="col">
                        <label for="after_taste5">5</label>
                    </div>
                    <div class="col">
                        <label for="after_taste6">6</label>
                    </div>
                    <div class="col">
                        <label for="after_taste7">7</label>
                    </div>
                    <div class="col">
                        <label for="after_taste8">8</label>
                    </div>
                    <div class="col">
                        <label for="after_taste9">9</label>
                    </div>
                    <div class="col">
                        <label for="after_taste10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="after_taste0" name="after_taste" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="after_taste1" name="after_taste" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="after_taste2" name="after_taste" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="after_taste3" name="after_taste" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="after_taste4" name="after_taste" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="after_taste5" name="after_taste" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="after_taste6" name="after_taste" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="after_taste7" name="after_taste" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="after_taste8" name="after_taste" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="after_taste9" name="after_taste" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="after_taste10" name="after_taste" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End After Taste ---!>


                <!--- Acidity ---!>
                <h6 class="mt-5">Acidity</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="acidity0">0</label>
                    </div>
                    <div class="col">
                        <label for="acidity1">1</label>
                    </div>
                    <div class="col">
                        <label for="acidity2">2</label>
                    </div>
                    <div class="col">
                        <label for="acidity3">3</label>
                    </div>
                    <div class="col">
                        <label for="acidity4">4</label>
                    </div>
                    <div class="col">
                        <label for="acidity5">5</label>
                    </div>
                    <div class="col">
                        <label for="acidity6">6</label>
                    </div>
                    <div class="col">
                        <label for="acidity7">7</label>
                    </div>
                    <div class="col">
                        <label for="acidity8">8</label>
                    </div>
                    <div class="col">
                        <label for="acidity9">9</label>
                    </div>
                    <div class="col">
                        <label for="acidity10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="acidity0" name="acidity" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="acidity1" name="acidity" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="acidity2" name="acidity" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="acidity3" name="acidity" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="acidity4" name="acidity" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="acidity5" name="acidity" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="acidity6" name="acidity" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="acidity7" name="acidity" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="acidity8" name="acidity" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="acidity9" name="acidity" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="acidity10" name="acidity" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End Acidity ---!>

                    
                <!--- Body / Kekentalan ---!>
                <h6 class="mt-5">Body / Kekentalan</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="kekentalan0">0</label>
                    </div>
                    <div class="col">
                        <label for="kekentalan1">1</label>
                    </div>
                    <div class="col">
                        <label for="kekentalan2">2</label>
                    </div>
                    <div class="col">
                        <label for="kekentalan3">3</label>
                    </div>
                    <div class="col">
                        <label for="kekentalan4">4</label>
                    </div>
                    <div class="col">
                        <label for="kekentalan5">5</label>
                    </div>
                    <div class="col">
                        <label for="kekentalan6">6</label>
                    </div>
                    <div class="col">
                        <label for="kekentalan7">7</label>
                    </div>
                    <div class="col">
                        <label for="kekentalan8">8</label>
                    </div>
                    <div class="col">
                        <label for="kekentalan9">9</label>
                    </div>
                    <div class="col">
                        <label for="kekentalan10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="kekentalan0" name="kekentalan" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kekentalan1" name="kekentalan" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kekentalan2" name="kekentalan" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kekentalan3" name="kekentalan" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kekentalan4" name="kekentalan" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kekentalan5" name="kekentalan" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kekentalan6" name="kekentalan" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kekentalan7" name="kekentalan" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kekentalan8" name="kekentalan" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kekentalan9" name="kekentalan" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kekentalan10" name="kekentalan" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End Body / Kekentalan ---!>

                    
                <!--- Bitterness / Kepahitan ---!>
                <h6 class="mt-5">Bitterness / Kepahitan</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="kepahitan0">0</label>
                    </div>
                    <div class="col">
                        <label for="kepahitan1">1</label>
                    </div>
                    <div class="col">
                        <label for="kepahitan2">2</label>
                    </div>
                    <div class="col">
                        <label for="kepahitan3">3</label>
                    </div>
                    <div class="col">
                        <label for="kepahitan4">4</label>
                    </div>
                    <div class="col">
                        <label for="kepahitan5">5</label>
                    </div>
                    <div class="col">
                        <label for="kepahitan6">6</label>
                    </div>
                    <div class="col">
                        <label for="kepahitan7">7</label>
                    </div>
                    <div class="col">
                        <label for="kepahitan8">8</label>
                    </div>
                    <div class="col">
                        <label for="kepahitan9">9</label>
                    </div>
                    <div class="col">
                        <label for="kepahitan10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="kepahitan0" name="kepahitan" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kepahitan1" name="kepahitan" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kepahitan2" name="kepahitan" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kepahitan3" name="kepahitan" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kepahitan4" name="kepahitan" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kepahitan5" name="kepahitan" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kepahitan6" name="kepahitan" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kepahitan7" name="kepahitan" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kepahitan8" name="kepahitan" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kepahitan9" name="kepahitan" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="kepahitan10" name="kepahitan" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End Bitterness / Kepahitan ---!>

                <div class="row">
                    <div class="col">
                        <h4 class="mt-5">Cacat Cita Rasa</h4>
                    </div>
                </div>

                <!--- Fruty / Winey ---!>
                <h6 class="mt-5">Fruty / Winey</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="winey0">0</label>
                    </div>
                    <div class="col">
                        <label for="winey1">1</label>
                    </div>
                    <div class="col">
                        <label for="winey2">2</label>
                    </div>
                    <div class="col">
                        <label for="winey3">3</label>
                    </div>
                    <div class="col">
                        <label for="winey4">4</label>
                    </div>
                    <div class="col">
                        <label for="winey5">5</label>
                    </div>
                    <div class="col">
                        <label for="winey6">6</label>
                    </div>
                    <div class="col">
                        <label for="winey7">7</label>
                    </div>
                    <div class="col">
                        <label for="winey8">8</label>
                    </div>
                    <div class="col">
                        <label for="winey9">9</label>
                    </div>
                    <div class="col">
                        <label for="winey10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="winey0" name="winey" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="winey1" name="winey" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="winey2" name="winey" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="winey3" name="winey" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="winey4" name="winey" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="winey5" name="winey" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="winey6" name="winey" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="winey7" name="winey" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="winey8" name="winey" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="winey9" name="winey" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="winey10" name="winey" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End Fruty / Winey ---!>

                    
                <!--- Green / Grassy ---!>
                <h6 class="mt-5">Green / Grassy</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="grassy0">0</label>
                    </div>
                    <div class="col">
                        <label for="grassy1">1</label>
                    </div>
                    <div class="col">
                        <label for="grassy2">2</label>
                    </div>
                    <div class="col">
                        <label for="grassy3">3</label>
                    </div>
                    <div class="col">
                        <label for="grassy4">4</label>
                    </div>
                    <div class="col">
                        <label for="grassy5">5</label>
                    </div>
                    <div class="col">
                        <label for="grassy6">6</label>
                    </div>
                    <div class="col">
                        <label for="grassy7">7</label>
                    </div>
                    <div class="col">
                        <label for="grassy8">8</label>
                    </div>
                    <div class="col">
                        <label for="grassy9">9</label>
                    </div>
                    <div class="col">
                        <label for="grassy10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="grassy0" name="grassy" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="grassy1" name="grassy" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="grassy2" name="grassy" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="grassy3" name="grassy" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="grassy4" name="grassy" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="grassy5" name="grassy" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="grassy6" name="grassy" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="grassy7" name="grassy" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="grassy8" name="grassy" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="grassy9" name="grassy" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="grassy10" name="grassy" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End Green / Grassy ---!>

                    
                <!--- Smokey ---!>
                <h6 class="mt-5">Smokey</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="smokey0">0</label>
                    </div>
                    <div class="col">
                        <label for="smokey1">1</label>
                    </div>
                    <div class="col">
                        <label for="smokey2">2</label>
                    </div>
                    <div class="col">
                        <label for="smokey3">3</label>
                    </div>
                    <div class="col">
                        <label for="smokey4">4</label>
                    </div>
                    <div class="col">
                        <label for="smokey5">5</label>
                    </div>
                    <div class="col">
                        <label for="smokey6">6</label>
                    </div>
                    <div class="col">
                        <label for="smokey7">7</label>
                    </div>
                    <div class="col">
                        <label for="smokey8">8</label>
                    </div>
                    <div class="col">
                        <label for="smokey9">9</label>
                    </div>
                    <div class="col">
                        <label for="smokey10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="smokey0" name="smokey" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="smokey1" name="smokey" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="smokey2" name="smokey" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="smokey3" name="smokey" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="smokey4" name="smokey" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="smokey5" name="smokey" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="smokey6" name="smokey" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="smokey7" name="smokey" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="smokey8" name="smokey" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="smokey9" name="smokey" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="smokey10" name="smokey" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End Smokey ---!>

                    
                <!--- Cereal ---!>
                <h6 class="mt-5">Cereal</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="cereal0">0</label>
                    </div>
                    <div class="col">
                        <label for="cereal1">1</label>
                    </div>
                    <div class="col">
                        <label for="cereal2">2</label>
                    </div>
                    <div class="col">
                        <label for="cereal3">3</label>
                    </div>
                    <div class="col">
                        <label for="cereal4">4</label>
                    </div>
                    <div class="col">
                        <label for="cereal5">5</label>
                    </div>
                    <div class="col">
                        <label for="cereal6">6</label>
                    </div>
                    <div class="col">
                        <label for="cereal7">7</label>
                    </div>
                    <div class="col">
                        <label for="cereal8">8</label>
                    </div>
                    <div class="col">
                        <label for="cereal9">9</label>
                    </div>
                    <div class="col">
                        <label for="cereal10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="cereal0" name="cereal" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="cereal1" name="cereal" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="cereal2" name="cereal" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="cereal3" name="cereal" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="cereal4" name="cereal" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="cereal5" name="cereal" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="cereal6" name="cereal" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="cereal7" name="cereal" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="cereal8" name="cereal" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="cereal9" name="cereal" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="cereal10" name="cereal" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End Cereal ---!>

                    
                <!--- Chemical / Medicine ---!>
                <h6 class="mt-5">Chemical / Medicine</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="medicine0">0</label>
                    </div>
                    <div class="col">
                        <label for="medicine1">1</label>
                    </div>
                    <div class="col">
                        <label for="medicine2">2</label>
                    </div>
                    <div class="col">
                        <label for="medicine3">3</label>
                    </div>
                    <div class="col">
                        <label for="medicine4">4</label>
                    </div>
                    <div class="col">
                        <label for="medicine5">5</label>
                    </div>
                    <div class="col">
                        <label for="medicine6">6</label>
                    </div>
                    <div class="col">
                        <label for="medicine7">7</label>
                    </div>
                    <div class="col">
                        <label for="medicine8">8</label>
                    </div>
                    <div class="col">
                        <label for="medicine9">9</label>
                    </div>
                    <div class="col">
                        <label for="medicine10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="medicine0" name="medicine" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="medicine1" name="medicine" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="medicine2" name="medicine" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="medicine3" name="medicine" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="medicine4" name="medicine" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="medicine5" name="medicine" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="medicine6" name="medicine" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="medicine7" name="medicine" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="medicine8" name="medicine" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="medicine9" name="medicine" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="medicine10" name="medicine" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End Chemical / Medicine ---!>

                    
                <!--- Stinkey ---!>
                <h6 class="mt-5">Stinkey</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="stinkey0">0</label>
                    </div>
                    <div class="col">
                        <label for="stinkey1">1</label>
                    </div>
                    <div class="col">
                        <label for="stinkey2">2</label>
                    </div>
                    <div class="col">
                        <label for="stinkey3">3</label>
                    </div>
                    <div class="col">
                        <label for="stinkey4">4</label>
                    </div>
                    <div class="col">
                        <label for="stinkey5">5</label>
                    </div>
                    <div class="col">
                        <label for="stinkey6">6</label>
                    </div>
                    <div class="col">
                        <label for="stinkey7">7</label>
                    </div>
                    <div class="col">
                        <label for="stinkey8">8</label>
                    </div>
                    <div class="col">
                        <label for="stinkey9">9</label>
                    </div>
                    <div class="col">
                        <label for="stinkey10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="stinkey0" name="stinkey" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="stinkey1" name="stinkey" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="stinkey2" name="stinkey" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="stinkey3" name="stinkey" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="stinkey4" name="stinkey" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="stinkey5" name="stinkey" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="stinkey6" name="stinkey" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="stinkey7" name="stinkey" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="stinkey8" name="stinkey" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="stinkey9" name="stinkey" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="stinkey10" name="stinkey" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End Stinkey ---!>

                    
                <!--- Earthy / Mouldy / Musty ---!>
                <h6 class="mt-5">Earthy / Mouldy / Musty</h6>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <label for="musty0">0</label>
                    </div>
                    <div class="col">
                        <label for="musty1">1</label>
                    </div>
                    <div class="col">
                        <label for="musty2">2</label>
                    </div>
                    <div class="col">
                        <label for="musty3">3</label>
                    </div>
                    <div class="col">
                        <label for="musty4">4</label>
                    </div>
                    <div class="col">
                        <label for="musty5">5</label>
                    </div>
                    <div class="col">
                        <label for="musty6">6</label>
                    </div>
                    <div class="col">
                        <label for="musty7">7</label>
                    </div>
                    <div class="col">
                        <label for="musty8">8</label>
                    </div>
                    <div class="col">
                        <label for="musty9">9</label>
                    </div>
                    <div class="col">
                        <label for="musty10">10</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">Tidak Ada</div>
                    <div class="col">
                        <input type="radio" id="musty0" name="musty" value="0" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="musty1" name="musty" value="1" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="musty2" name="musty" value="2" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="musty3" name="musty" value="3" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="musty4" name="musty" value="4" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="musty5" name="musty" value="5" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="musty6" name="musty" value="6" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="musty7" name="musty" value="7" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="musty8" name="musty" value="8" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="musty9" name="musty" value="9" required>
                    </div>
                    <div class="col">
                        <input type="radio" id="musty10" name="musty" value="10" required>
                    </div>
                    <div class="col">Sangat Tinggi</div>
                </div>
                <!--- End Earthy / Mouldy / Musty ---!>

                <button type="submit" class="btn btn-success mt-2">Kirim</button>

            </form>

@endsection

@push('js')
<!-- Page level plugins --!>
<script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
  
</script>
@endpush