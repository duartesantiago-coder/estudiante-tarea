@php
    $estudiante ??= null;
@endphp
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(strtoupper($method) !== 'POST') 
        @method($method)
    @endif

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('nombre') border-red-300 @enderror" value="{{ old('nombre', $estudiante->nombre ?? '') }}" required>
            @error('nombre')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
            <input id="apellido" name="apellido" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('apellido') border-red-300 @enderror" value="{{ old('apellido', $estudiante->apellido ?? '') }}" required> 
            @error('apellido') 
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="dni" class="block text-sm font-medium text-gray-700">DNI</label>
            <input id="dni" name="dni" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('dni') border-red-300 @enderror" value="{{ old('dni', $estudiante->dni ?? '') }}" required>
            @error('dni')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
            <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('fecha_nacimiento') border-red-300 @enderror" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento ?? '') }}" required>
            @error('fecha_nacimiento')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-2">
            <label for="foto_perfil" class="block text-sm font-medium text-gray-700">Foto de perfil</label>
            <input id="foto_perfil" name="foto_perfil" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 @error('foto_perfil') border-red-300 @enderror">
            <p class="mt-1 text-sm text-gray-500">Solo imágenes jpg, png, gif o webp. Máximo 2 MB.</p>
            @error('foto_perfil')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        @if(optional($estudiante)->foto_perfil)
            <div class="sm:col-span-2">
                <div class="mt-4">
                    <p class="text-sm font-medium text-gray-700 mb-2">Foto actual:</p>
                    <img src="{{ asset('storage/' . $estudiante->foto_perfil) }}" alt="Foto actual" class="h-32 w-32 object-cover rounded-lg border border-gray-200">
                </div>
            </div>
        @endif

        <div class="sm:col-span-2">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ $buttonText }}
            </button>
        </div>
    </div>
</form>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
