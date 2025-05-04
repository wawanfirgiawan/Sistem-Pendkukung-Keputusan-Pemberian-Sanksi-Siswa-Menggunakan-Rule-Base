<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
      body {
        font-family: 'Times New Roman', Times, serif;
      }
      .line-space {
        line-height: 2px; /* Spasi antar baris lebih besar */
      }
      .line-bawah {
        line-height: 0px; /* Spasi antar baris lebih besar */
      }
      .kop table {
        width: 100%;
        border-bottom: 5px solid #000000;padding: 0px
      }
      .isi {
        font-size: 13px;
      }
      

    </style>

    <title>Laporan Sanksi</title>
  </head>
  <body>
    <div class="kop">
    <table>
      <tr>
        <td align="right" width="20%" ><img src="{{ $base64Image }}" alt="Example Image"></td>
        <td align="center" width="80%">
          <p></p>
            <p class="line-space"><b>PEMERINTAH PROVINSI SULAWESI BARAT</b></p>
            <P class="line-space"><b>DINAS PENDIDIKAN DAN KEBUDAYAAN</b></P>
            <P class="line-space" style="font-size: 20px" ><b>UPTD SMK NEGERI 5 MAJENE</b></P>
            <p class="line-bawah" style="font-size: 14px">KELOMPOK TEKNOLOGI DAN REKAYASA</p>
            <p style="font-size: 9px" class="line-bawah"><i>Alamat : Jl. Balai Latihan Kerja (BLK) Km. 4 Poros Majene-Mamuju Kab. Majene Prov. Sulawesi Barat Telp.(0422) 21896,</i> </p>
            <p style="font-size: 9px" class="line-bawah"> <i>Kode Pos.91415 E-Mail : smkn_5majene@yahoo.co.id</i></p>   
        </td>
      </tr>
    </table>
    </div>
    <br>
    @php
    use Carbon\Carbon;
    Carbon::setLocale('id');
    $today = Carbon::today()->translatedFormat('d, F Y');
    @endphp
    <p align="right" style="font-size: 13px">{{ $today }}</p>
    <h3 style="font-size: 14px" align="center"><u>DATA LAPORAN SANKSI PELANGGARAN SISWA</u></h3>
    <br>
    <div class="isi">
        <table class="table table-bordered table-sm">
            <thead class="thead-dark">
              <tr class="text-center">
                <th scope="col">NO</th>
                <th scope="col">NIS</th>
                <th scope="col">NAMA SISWA</th>
                <th scope="col">KELAS</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">DAFTAR PELANGGARAN</th>
                <th scope="col">SANKSI</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($data as $key=> $item)
            <tr class="text-center">
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->pelanggaran }}</td>
                <td>{{ $item->sanksi }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>