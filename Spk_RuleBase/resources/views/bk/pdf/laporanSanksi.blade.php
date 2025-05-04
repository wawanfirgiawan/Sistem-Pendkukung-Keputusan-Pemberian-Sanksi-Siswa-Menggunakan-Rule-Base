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
        border-bottom: 5px solid #000000;padding: 2px
      }
      .data_siswa table {
        width: 70%;
      }
      .isi {
        font-size: 13px;
      }

      .pading tr{
        padding-bottom: 5px;
      }
    </style>

    <title>Hello, world!</title>
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
    <h3 style="font-size: 14px" align="center"><u>SURAT LAPORAN SANKSI PELANGGARAN SISWA</u></h3>
    <br>
    <div class="isi">
    <p style="text-indent: 30px;">Surat laporan ini diterbitkan oleh tim bimbingan konseling UPTD SMK Negeri 5 Majene, dan ditujukan pada siswa/i : </p>
    <div class="data_siswa">
    <table align="center">
      <tr>
        <td align="left" width="20%">Nama Siswa</td>
        <td align="center" width="5%">:</td>
        <td width="75%">{{ $laporan->nama }}</td>
      </tr>
      <tr>
        <td align="left" width="20%">Nis</td>
        <td align="center" width="5%">:</td>
        <td width="75%">{{ $laporan->nis }}</td>
      </tr>
      <tr>
        <td align="left">Kelas</td>
        <td align="center">:</td>
        <td>{{ $laporan->kelas }}</td>
      </tr>
      <tr>
        <td align="left">Alamat</td>
        <td align="center">:</td>
        <td>{{ $laporan->alamat }}</td>
      </tr>
    </table>
    </div>
    <br>
    <p style="text-indent: 30px;">Siswa yang bersangkutan telah melakukan pelanggaran tata tertib berdasarkan laporan pelanggaran yang masuk pada sistem pembinaan konseling UPTD SMK Negeri 5 Majene. Adapun daftar riwayat pelanggaran yang dilakukan sebagai berikut :
    </p>
    <table class="table table-bordered table-sm" style="width: 80%" align="center">
      <thead class="thead-dark">
        <tr class="text-center">
          <th scope="col">NO</th>
          <th scope="col">KODE PELANGGARAN</th>
          <th scope="col">ITEM PELANGGARAN</th>
          <th scope="col">TANGGAL PELANGGARAN</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $key=> $pelanggaran)
        <tr class="text-center">
          <td>{{ $key+1 }}</td>
          <td>{{ $pelanggaran->pelanggaran }}</td>
          <td>{{ $pelanggaran->kode }}</td>
          <td>{{ \Carbon\Carbon::parse($pelanggaran->tanggal)->format('d/m/Y') }}</td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    <p style="text-indent: 30px;">Berdasarkan Riwayat Pelanggaran di atas maka Hasil Keputusan Pemberian Sanksi Yaitu, Siswa tersebut Mendapatkan Sanksi <b>@foreach ($data as $sanksi) @endforeach{{ $sanksi->sanksi }}.</b> Demikian surat laporan ini agar digunakan sebagaimana mestinya.</p>
    <p></p>
    <table border="0" width="80%" align="center">
      <tr align="center">
        <td colspan="3"><b>Mengetahui,</b></td>
      </tr>
      <tr align="center">
        <td width="30%">Guru Bk</td>
        <td></td>
        <td width="30%">Siswa/i Terkait</td>
      </tr>
      {{-- <tr style="height: 10cm;">
        <td colspan="3"></td>
      </tr> --}}
      <tr align="center">
        <td><b>Unknow, S.Pd.,M.Pd</b></td>
        <td></td>
        <td><b>{{ $laporan->nama }}</b></td>
      </tr>
    </table>
    {{-- <p>Nama Siswa : sssdsdsdsd</p>
    <p>Kelas : sssdsdsdsd</p>
    <p>Alamat : sssdsdsdsd</p> --}}
  </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>