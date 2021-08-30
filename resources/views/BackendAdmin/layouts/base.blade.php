<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lexadev | @yield('title')</title>
  @include('BackendAdmin.layouts._asset_header')
  @livewireStyles
</head>
    <body class="hold-transition sidebar-mini">

        <div class="wrapper">
            <!-- Navbar -->
            @include('BackendAdmin.layouts.top_navigation')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('BackendAdmin.layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            {{ $slot }}
            {{-- @yield('content') --}}

            <!-- /.content-wrapper -->

            {{-- footer --}}
            @include('BackendAdmin.layouts.footer')

            <!-- ./wrapper -->
        </div>
        @include('BackendAdmin.layouts._asset_footer')
        @livewireScripts
        @stack('scripts')
        <script>
            window.addEventListener('tampil-hapus-konfirmasi',event => {
                Swal.fire({
                    title: 'Yakin Mengahapus Data?',
                    text: "Data Akan Dihapus Selamanya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emit('konfirmasiHapus');
                    }
                })
            });
            window.addEventListener('pesanHapus',event=>{
                iziToast.error({
                    title: 'Hapus',
                    timeout: 5000,
                    position: 'topRight',
                    message: event.detail.message,
                });
            });
            window.addEventListener('pesanSimpan',event=>{
                iziToast.success({
                    title: 'Berhasil',
                    timeout: 5000,
                    position: 'topRight',
                    message: event.detail.message,
                });
            });
            window.addEventListener('pesanUpdate',event=>{
                iziToast.warning({
                    title: 'Berhasil',
                    timeout: 5000,
                    position: 'topRight',
                    message: event.detail.message,
                });
            });
        </script>
    </body>
</html>
