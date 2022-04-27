<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Uts_Febryntara_2015323078</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-6">
            <h3>{{ !Request::is('customer/create') ? 'Edit Data' : 'Tambah Data' }}</h3>
            @if (session()->has('success'))
               <div class="alert alert-success">
                  {{ session()->get('success') }}
               </div>
            @elseif (session()->has('error'))
               <div class="alert alert-danger">
                  {{ session()->get('error') }}
               </div>
            @endif
            <form action="{{ Route::is('show*') ? route('update', ['customer' => $customer]) : route('store') }}"
               method="POST">
               @csrf
               @method('POST')
               <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control"
                     value="{{ !Request::is('customer/create') ? $customer->nama ?? old('nama') : old('nama') }}"
                     name="nama">
                  @if ($errors->has('nama'))
                     <div class="text-danger">
                        {{ $errors->first('nama') }}
                     </div>
                  @endif
               </div>
               <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" class="form-control"
                     value="{{ !Request::is('customer/create') ? $customer->alamat ?? old('alamat') : old('alamat') }}"
                     name="alamat">
                  @if ($errors->has('alamat'))
                     <div class="text-danger">
                        {{ $errors->first('alamat') }}
                     </div>
                  @endif
               </div>
               <div class="mb-3">
                  <label for="telpon" class="form-label">Telpon</label>
                  <input type="text" class="form-control"
                     value="{{ !Request::is('customer/create') ? $customer->telpon ?? old('telpon') : old('telpon') }}"
                     name="telpon">
                  @if ($errors->has('telpon'))
                     <div class="text-danger">
                        {{ $errors->first('telpon') }}
                     </div>
                  @endif
               </div>
               <div class="mb-3">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <select
                     value="{{ !Request::is('customer/create') ? $customer->jenis_kelamin ?? old('jenis_kelamin') : old('jenis_kelamin') }}"
                     name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                     <option value="0">Laki - laki</option>
                     <option value="1">Perempuan</option>
                  </select>
                  @if ($errors->has('jenis_kelamin'))
                     <div class="text-danger">
                        {{ $errors->first('jenis_kelamin') }}
                     </div>
                  @endif
               </div>
               <div class="mb-3">
                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control"
                     value="{{ !Request::is('customer/create') ? $customer->tanggal_lahir ?? old('tanggal_lahir') : old('tanggal_lahir') }}"
                     name="tanggal_lahir">
                  @if ($errors->has('tanggal_lahir'))
                     <div class="text-danger">
                        {{ $errors->first('tanggal_lahir') }}
                     </div>
                  @endif
               </div>
               <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control"
                     value="{{ !Request::is('customer/create') ? $customer->email ?? old('email') : old('email') }}"
                     name="email">
                  @if ($errors->has('email'))
                     <div class="text-danger">
                        {{ $errors->first('email') }}
                     </div>
                  @endif
               </div>
               <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username"
                     value="{{ !Request::is('customer/create') ? $customer->username ?? old('username') : old('username') }}">
                  @if ($errors->has('username'))
                     <div class="text-danger">
                        {{ $errors->first('username') }}
                     </div>
                  @endif
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
         <div class="col-6">
            <h3>Tampil Data</h3>
            <ul class="list-group mt-4">
               @foreach ($customers as $c)
                  <li class="list-group-item d-flex">
                     <a href="{{ route('show', ['customer' => $c]) }}"
                        class="text-decoration-none text-dark">{{ $c->nama }}</a>
                     <form action="{{ route('delete', ['customer' => $c]) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-decoration-none text-danger btn p-0 m-0 ms-2">Delete</button>
                     </form>
                  </li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
</body>

</html>
