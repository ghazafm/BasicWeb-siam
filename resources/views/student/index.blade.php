<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dashboard mahasiswa</title>
    <style type="text/css">
        .pagination li {
            float: left;
            list-style-type: none;
            margin: 5px;
        }
    </style>
</head>

<body>

    <h2>Dashboard</h2>
    <h3>Data mahasiswa</h3>

    <a href="/student/add"> + Tambah data mahasiswa</a>

    <br />
    <br />

    <p>Cari Data Mahasiswa : </p>
    <form action="/student/search" method="GET">
        <input type="text" name="search" placeholder="Nama mahasiswa..." value="{{ old('search') }}">
        <input type="submit" value="search">
    </form>

    <table class="table table-bordered">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Program Studi</th>
            <th>IPK</th>
            <th>Opsi</th>
        </tr>
        @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->alamat }}</td>
                <td>{{ $mhs->prodi }}</td>
                <td>{{ $mhs->ipk }}</td>
                <td>
                    <a class="btn btn-warning btn-sm" href="/student/edit/{{ $mhs->nim }}">Edit</a>
                    |
                    <a class="btn btn-danger btn-sm" href="/student/delete/{{ $mhs->nim }}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>

    <br>
    Halaman : {{ $mahasiswa->currentPage() }} <br>
    Jumlah Data : {{ $mahasiswa->total() }} <br>
    Data Per Halaman : {{ $mahasiswa->perPage() }} <br>

    {{ $mahasiswa->links('pagination::bootstrap-4') }}
</body>

<a class="btn btn-warning btn-sm" href="/">Back</a>

</html>
