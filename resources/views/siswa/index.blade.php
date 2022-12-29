<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Siswa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>

<style>
    .chartjs {
        height: 40vh;
        width: 100%;
    }
</style>

<body>
    <div class="container">

        <div style="margin-top: 15px;">

            <form role="form" method="post" action="{{ url('siswa/import') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="file" name="file" id="exampleInputFile">

                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-success btn-md" id="import">Import</button>
                </div>
            </form>

            <p class="text-danger mt-1 mb-1" id="teks"></p>
            <form action="{{ url('/siswa/delete') }}" method="post" style="display: contents">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" style="background-color: #D63502; color:#fff;" class="btn">
                    Hapus Data
                </button>
            </form>

        </div>

        <div class="card mt-2">
            <div class="card-body">
                <h4 class="header-title" align="center">Statistik User</h4>
                <canvas id="mataChart" class="chartjs"></canvas>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>MeetPath</th>
                    <th>Federation Hp</th>
                    <th>Date</th>
                    <th>MeetCountry</th>
                    <th>MeetState</th>
                    <th>MeetTown</th>
                    <th>MeetName</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                    <tr>
                        <td>{{ $dt->nomor }}</td>
                        <td>{{ $dt->meetpath }}</td>
                        <td>{{ $dt->federation }}</td>
                        <td>{{ $dt->date }}</td>
                        <td>{{ $dt->meetcountry }}</td>
                        <td>{{ $dt->meetstate }}</td>
                        <td>{{ $dt->meettown }}</td>
                        <td>{{ $dt->meetname }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <script src="/Chart.js"></script>
    <script>
        const ctx = document.getElementById('mataChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($data as $dt)
                        '{{ $dt->meetname }}',
                    @endforeach
                ],
                datasets: [{
                    label: [
                        @foreach ($data as $dt)
                            '{{ $dt->meetname }}',
                        @endforeach
                    ],
                    data: [
                        @foreach ($data as $dt)
                            {{ $dt->nomor }},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        const tombol = document.getElementById('import');
        const file = document.getElementById('file');
        const teks = document.getElementById('teks');

        tombol.addEventListener("click", (e) => {
            // e.preventDefault()
            console.log(file);
            if (!file.files.length) {
                e.preventDefault();
                teks.innerText = "tidak ada data";
            }
        })
    </script>
</body>

</html>
