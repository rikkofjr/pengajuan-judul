@foreach ($hitungjudul as $htj) 
  {{$htj->jenis_judulnya->jenis_judul}} 
  - {{$htj->total}} 
  <br> 
@endforeach

@foreach ($hitungst as $htstj) 
  {{$htstj->st_judulnya->name_st_judul}} 
  - {{$htstj->totalst}} 
  <br> 
@endforeach