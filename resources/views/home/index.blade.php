<!DOCTYPE html>
<html>
<head>
    <title>Data Kerjasama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">📄 Data Kerjasama</h1>

    {{-- === DROPDOWN FILTER FAKULTAS === --}}
    <div class="mb-4">
        <label class="fw-bold me-2">Pilih Fakultas:</label>
        <select id="filter-fakultas" class="form-select d-inline-block w-auto">
            <option value="">-- Semua Fakultas --</option>
            @foreach($fakultas as $f)
                <option value="{{ $f->nama_fakultas }}">{{ $f->nama_fakultas }}</option>
            @endforeach
        </select>
    </div>

    {{-- === TABEL MOU === --}}
<h3>📑 Data MoU</h3>
<table id="table-mou" class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nomor UJB</th>
            <th>Judul MoU</th>
            <th>Nama Partner</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Status</th>
            <th>Download</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mous as $mou)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mou->number }}</td>
                <td>{{ $mou->judul_mou }}</td>
                <td>{{ $mou->partner->nama_partner ?? '-' }}</td>
                <td>{{ $mou->tanggal_mulai }}</td>
                <td>{{ $mou->tanggal_selesai }}</td>
                <td>
                    @if (now()->between($mou->tanggal_mulai, $mou->tanggal_selesai))
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Tidak Aktif</span>
                    @endif
                </td>
                <td>
    @if ($mou->dokumen)
        <a href="{{ $mou->dokumen }}" class="btn btn-primary btn-sm" target="_blank">
            Download
        </a>
    @else
        <span class="text-muted">Tidak ada</span>
    @endif
</td>

            </tr>
        @endforeach
    </tbody>
</table>


 {{-- === TABEL MOA === --}}
    <h3 class="mt-5">📑 Data MoA</h3>
    <table id="table-moa" class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nomor UJB</th>
                <th>Judul MoA</th>
                <th>Nama Partner</th>
                <th>Fakultas</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            @foreach($moas as $moa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $moa->number }}</td>
                    <td>{{ $moa->judul_moa }}</td>
                    <td>{{ $moa->partner->nama_partner ?? '-' }}</td>
                    <td>{{ $moa->fakultas->nama_fakultas ?? '-' }}</td>
                    <td>{{ $moa->tanggal_mulai }}</td>
                    <td>{{ $moa->tanggal_selesai }}</td>
                    <td>
                        @if (now()->between($moa->tanggal_mulai, $moa->tanggal_selesai))
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Tidak Aktif</span>
                        @endif
                    </td>
                   <td>
    @if ($mou->dokumen)
        <a href="{{ $mou->dokumen }}" class="btn btn-primary btn-sm" target="_blank">
            Download
        </a>
    @else
        <span class="text-muted">Tidak ada</span>
    @endif
</td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- === TABEL IA === --}}
    <h3 class="mt-5">📑 Data IA</h3>
    <table id="table-ia" class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nomor UJB</th>
                <th>Judul IA</th>
                <th>Nama Partner</th>
                <th>Fakultas</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ias as $ia)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ia->number }}</td>
                    <td>{{ $ia->judul_ia }}</td>
                    <td>{{ $ia->partner->nama_partner ?? '-' }}</td>
                    <td>{{ $ia->fakultas->nama_fakultas ?? '-' }}</td>
                    <td>{{ $ia->tanggal_mulai }}</td>
                    <td>{{ $ia->tanggal_selesai }}</td>
                    <td>
                        @if (now()->between($ia->tanggal_mulai, $ia->tanggal_selesai))
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
    @if ($mou->dokumen)
        <a href="{{ $mou->dokumen }}" class="btn btn-primary btn-sm" target="_blank">
            Download
        </a>
    @else
        <span class="text-muted">Tidak ada</span>
    @endif
</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- JS --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        let mouTable = $('#table-mou').DataTable();
        let moaTable = $('#table-moa').DataTable();
        let iaTable  = $('#table-ia').DataTable();

        // Filter berdasarkan fakultas
        $('#filter-fakultas').on('change', function () {
            let selected = $(this).val();

            mouTable.column(3).search(selected).draw();
            moaTable.column(2).search(selected).draw();
            iaTable.column(2).search(selected).draw();
        });
    });
</script>

</body>
</html>
