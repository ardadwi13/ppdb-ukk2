<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .card {
            border-radius: 5px;
        }

        .header {
            border-radius: 5px;
            background-image: linear-gradient(to right, #ef4444 , #f59e0b);
        }

        .logo {
            position: absolute;
            padding-top: 50px;
        }

        .title {
            color: #fff;
            padding: 50px 150px;
        }
    </style>
    <title>Form Pendaftaran</title>
  </head>
  <body>
    <div class="container">
        <div class="card mx-5 my-5">
            <section class="header">
                <div class="logo px-4">
                    <img src="{{ asset('assets/img/wk.png') }}" alt="logo wikrama" width="100px">
                </div>
                <div class="title">
                    <h4>Form Pendaftaran</h4>
                    <h4>PPDB SMK Wikrama Bogor 2021</h4>
                    <h5>Silahkan Isi data diri anda pada form berikut ini</h5>
                </div>
            </section>
            <section class="form-text">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                        <h4 class="card-title">Profil Siswa</h4>
                        <form action="{{ route('daftarPost') }}" method="POST" id="myForm">
                            @csrf
                            <div class="row">
                              <div class="form-group col-md-4">
                                <label class="form-label" for="nis">NIS</label>
                                <input type="number" name="nis" required id="nis" class="form-control" placeholder="Masukkan NIS Anda"  value="{{ old('nis') }}"/>
                              </div>
                              <div class="form-group col-md-4">
                                <label class="form-label" for="nis">Email</label>
                                <input type="email" name="email" required id="email" class="form-control" placeholder="Masukkan Email Anda"  value="{{ old('email') }}"/>
                              </div>
                              <div class="form-group col-md-4">
                                <label class="form-label" for="nama">Nama Lengkap</label>
                                <input
                                  type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Anda" required value="{{ old('nama') }}"/>
                              </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="jenkel">Jenis Kelamin</label>
                                    <select class="form-control" name="jenkel" id="jenkel" required value="{{ old('jenkel') }}">
                                      <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                      <option value="Laki-Laki">Laki-Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                  <label class="form-label" for="temp_lahir">Tempat Lahir</label>
                                  <input type="text" name="temp_lahir" id="temp_lahir" class="form-control" placeholder="Masukkan Tempat Lahir Anda" required value="{{ old('temp_lahir') }}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required value="{{ old('tgl_lahir') }}"/>
                                  </div>
                              </div>
                              <div class="row mt-3">
                                <div class="form-group col-md-12">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat" required placeholder="Masukkan Alamat Anda" id="alamat" cols="30" rows="5">{{ old('alamat') }}</textarea>
                                  </div>
                              </div>
                              <div class="row mt-3">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="asal_sekolah">Asal Sekolah</label>
                                    <input placeholder="Masukkan Asal Sekolah Anda" type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" required value="{{ old('asal_sekolah') }}" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="kelas">Kelas</label>
                                    <input placeholder="Masukkan Kelas Anda" type="text" name="kelas" id="kelas" class="form-control" required value="{{ old('kelas') }}"/>
                                </div>
                              </div>
                              <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="jurusan">Jurusan</label>
                                    <select class="form-control" name="jurusan" id="jurusan" required value="{{ old('jurusan') }}">
                                        <option value="" disabled selected>Pilih Jurusan</option>
                                        <option value="Otomatisasi Tata Kelola Perkantoran">Otomatisasi Tata Kelola Perkantoran</option>
                                        <option value="Multimedia">Multimedia</option>
                                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                        <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
                                        <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                        <option value="Perhotelan">Perhotelan</option>
                                        <option value="Tataboga">Tataboga</option>
                                      </select>
                                  </div>
                              </div>
                              <br>
                              <button class="btn btn-primary" type="submit">Daftar</button>
                              <button class="btn btn-warning" type="reset">Clear</button>
                        </form>



                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    {{-- <script>
        function resetForm() {
            document.getElementById("myForm").reset();
        }
    </script> --}}
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
