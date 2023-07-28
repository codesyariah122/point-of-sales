<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu Member</title>
</head>
<body>
    <section style="border: 1px solid #fff">
        @foreach($datamember as $key => $data)
            @foreach($data as $item)
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;background-image: url({{ public_path($setting->path_kartu_member) }});">
                <div class="card-header" style="text-align: center; font-weight: 800; color: #fff; font-size: 27px;background-color: #424242;">{{ $setting->nama_perusahaan }}</div>
                  <div class="card-body">
                    <ul class="list-group" style="list-style-type: none;">
                      <li class="list-group-item"><b>{{ $item->nama }}</b></li>
                      <li class="list-group-item" style="margin-top: .5rem;"><b>{{ $item->telepon }}</b></li>
                      <li class="list-group-item" style="margin-top: 1.3rem;">
                          <img src="data:image/png;base64, {{ DNS2D::getBarcodePNG("$item->kode_member", 'QRCODE') }}" alt="qrcode"
                          height="50"
                          widht="50">
                      </li>
                    </ul>

                  @if (count($datamember) == 1)
                  <div></div>
                  @endif
                </div>
            </div>
            @endforeach
        @endforeach
    </section>
</body>
</html>