@extends('layouts.app')

@section('head')
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" />
    <style>
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 64px;
            background: transparent;
            display: flex;
            align-items: center;
            z-index: 1100;
            padding-left: 24px;
        }
        .logo-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 10px;
        }
        .logo-img {
            height: 38px;
            width: 38px;
            display: block;
        }
        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: #23243a;
            letter-spacing: 1px;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }
        .logo-text .danger {
            color: #3b82f6;
        }
        @media (max-width: 600px) {
            .site-header {
                height: 48px;
                padding-left: 8px;
            }
            .logo-img {
                height: 28px;
                width: 28px;
            }
            .logo-text {
                font-size: 1.1rem;
            }
        }
        body {
            padding-top: 64px !important;
        }
        @media (max-width: 600px) {
            body {
                padding-top: 48px !important;
            }
        }
        .btn-back {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            position: absolute;
            top: -18px;
            left: 0;
            background: rgba(59,130,246,0.10);
            color: #3b82f6;
            border: none;
            border-radius: 2rem;
            padding: 0.5rem 1.2rem 0.5rem 0.7rem;
            font-size: 1.08rem;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(59,130,246,0.07);
            transition: background 0.18s, color 0.18s, box-shadow 0.18s;
            cursor: pointer;
            z-index: 1200;
            outline: none;
        }
        .btn-back .material-icons-sharp {
            font-size: 1.7rem;
            margin-right: 0.1rem;
        }
        .btn-back:focus, .btn-back:hover {
            background: #3b82f6;
            color: #fff;
            box-shadow: 0 4px 16px rgba(59,130,246,0.13);
        }
        .btn-back:active {
            background: #2563eb;
            color: #fff;
        }
        @media (max-width: 600px) {
            .btn-back {
                position: fixed;
                top: 56px;
                left: 8px;
                width: calc(100vw - 16px);
                max-width: none;
                border-radius: 1.2rem;
                font-size: 1rem;
                padding: 0.7rem 1.2rem 0.7rem 0.7rem;
                box-shadow: 0 2px 12px rgba(59,130,246,0.13);
            }
            .btn-back .back-text {
                font-size: 1rem;
            }
        }
    </style>
@endsection

@section('content')
    <header class="site-header">
        <a class="logo-link">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" alt="ATAY KOÇ Logo" class="logo-img">
            <h2 class="logo-text">A<span class="danger">T</span>AY KOÇ</h2>
        </a>
    </header>
    <div class="container py-5 position-relative">
        <!-- Geri Butonu Başlangıç -->
        <button type="button" class="btn-back" onclick="window.history.back()" aria-label="Önceki sayfaya dön">
            <span class="material-icons-sharp" aria-hidden="true">chevron_left</span>
            <span class="back-text">Geri</span>
        </button>
        <!-- Geri Butonu Bitiş -->
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <span class="material-icons-sharp text-primary bg-white shadow rounded-circle d-flex align-items-center justify-content-center"
                          style="font-size:2.7rem;width:60px;height:60px;">
                        bar_chart
                    </span>
                    <h2 class="mb-0 fw-bold display-5">{{ $studentName }} <span class="fw-normal text-secondary">- Ders Analizi</span></h2>
                </div>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-5 col-md-6">
                <div class="card border-0 shadow-lg rounded-5 mb-4"
                     style="background:rgba(255,255,255,0.85);backdrop-filter:blur(8px);box-shadow:0 8px 32px rgba(99,102,241,0.10);">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center p-4" style="min-height:440px;">
                        <div class="mb-3 text-center">
                            <h5 class="fw-bold text-primary mb-1" style="letter-spacing:0.5px;">Görev Başarı Dağılımı</h5>
                            <div class="text-secondary small">Doğru, yanlış ve boş oranlarını inceleyin.</div>
                        </div>
                        <div style="position:relative; width:100%; max-width:340px; margin:auto;">
                            <canvas id="taskChart" style="min-height:320px;"></canvas>
                            <div id="chart-center-text"
                                 style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);
                                        font-size:2.7rem;font-weight:900;color:#6366f1;text-align:center;pointer-events:none;line-height:1.1;">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
                            <span class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle bg-success bg-gradient" style="width:22px;height:22px;">&nbsp;</span>
                                <span class="fw-semibold text-success">Doğru</span>
                            </span>
                            <span class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle bg-danger bg-gradient" style="width:22px;height:22px;">&nbsp;</span>
                                <span class="fw-semibold text-danger">Yanlış</span>
                            </span>
                            <span class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle bg-secondary bg-gradient" style="width:22px;height:22px;">&nbsp;</span>
                                <span class="fw-semibold text-secondary">Boş</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-sm rounded-5 p-4 mb-3 border border-1 border-light-subtle">
                    <div class="d-flex align-items-center gap-2 mb-2" id="minute-info" style="font-size:1.1rem;">
                        <span class="material-icons-sharp text-info me-2">timer</span>
                        Toplam Süre: <strong id="total-minute-text">{{ $totalMinutes }} dakika</strong>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="badge bg-gradient bg-success bg-opacity-75 fs-6 px-3 py-2 shadow-sm" id="success-rate-badge">Başarı Oranı: %{{ $totalDogru + $totalYanlis + $totalBos > 0 ? round($totalDogru / ($totalDogru + $totalYanlis + $totalBos) * 100) : 0 }}</span>
                        <div class="flex-grow-1">
                            <div class="progress rounded-pill" style="height: 22px;">
                                <div class="progress-bar bg-success bg-gradient" id="success-rate-bar" role="progressbar"
                                     style="width: {{ $totalDogru + $totalYanlis + $totalBos > 0 ? round($totalDogru / ($totalDogru + $totalYanlis + $totalBos) * 100) : 0 }}%"
                                     aria-valuenow="{{ $totalDogru + $totalYanlis + $totalBos > 0 ? round($totalDogru / ($totalDogru + $totalYanlis + $totalBos) * 100) : 0 }}"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-10">
                <div class="d-flex flex-wrap justify-content-end align-items-center mb-3 gap-2 gap-md-3">
                    <label for="dersSelect" class="fw-bold mb-0">Ders Seç:</label>
                    <select id="dersSelect" class="form-select w-auto rounded-pill shadow-sm">
                        <option value="all">Tümü</option>
                        @php $dersler = collect($tasks)->pluck('ders_type')->unique()->filter(); @endphp
                        @foreach($dersler as $ders)
                            <option value="{{ $ders }}">{{ ucfirst($ders) }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-1 shadow-sm" id="export-excel"><span class="material-icons-sharp align-middle">table_view</span> Excel</button>
                    <button class="btn btn-outline-danger btn-sm rounded-pill px-3 d-flex align-items-center gap-1 shadow-sm" id="export-pdf"><span class="material-icons-sharp align-middle">picture_as_pdf</span> PDF</button>
                </div>
                <div class="card border-0 shadow-lg rounded-5">
                    <div class="card-body p-0">
                        <div class="table-responsive rounded-5">
                            <table class="table table-hover table-striped align-middle mb-0 rounded-5 overflow-hidden" id="analysis-table">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4">Ders</th>
                                        <th>Doğru</th>
                                        <th>Yanlış</th>
                                        <th>Boş</th>
                                        <th>Süre (dk)</th>
                                        <th>Tarih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                    <tr class="selectable-task"
                                        data-dogru="{{ $task->dogru_soru_sayisi }}"
                                        data-yanlis="{{ $task->yanlis_soru_sayisi }}"
                                        data-bos="{{ $task->bos_soru_sayisi }}"
                                        data-ders="{{ $task->ders_type ?? '-' }}"
                                        data-dakika="{{ $task->dakika }}"
                                        style="cursor:pointer;">
                                        <td class="fw-bold text-primary ps-4">{{ $task->ders_type ?? '-' }}</td>
                                        <td>{{ $task->dogru_soru_sayisi }}</td>
                                        <td>{{ $task->yanlis_soru_sayisi }}</td>
                                        <td>{{ $task->bos_soru_sayisi }}</td>
                                        <td>{{ $task->dakika }}</td>
                                        <td>{{ \Carbon\Carbon::parse($task->created_at)->format('d.m.Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    // Tüm analiz verilerini JS'e aktar
    const allTasks = @json($tasks);

    const ctx = document.getElementById('taskChart').getContext('2d');
    let chartData = {
        labels: ['Doğru', 'Yanlış', 'Boş'],
        datasets: [{
            data: [{{ $totalDogru }}, {{ $totalYanlis }}, {{ $totalBos }}],
            backgroundColor: ['#22c55e', '#ef4444', '#6c757d'],
            borderWidth: 6,
            hoverOffset: 18,
            borderColor: '#fff',
            hoverBorderColor: '#6366f1',
        }]
    };
    const config = {
        type: 'doughnut',
        data: chartData,
        options: {
            cutout: '72%',
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#23243a',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: '#6366f1',
                    borderWidth: 2,
                    padding: 14,
                    caretSize: 8,
                    cornerRadius: 10,
                    displayColors: true,
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.parsed;
                            let total = context.dataset.data.reduce((a,b)=>a+b,0);
                            let percent = total > 0 ? Math.round((value/total)*100) : 0;
                            return `${label}: ${value} (%${percent})`;
                        }
                    }
                },
                title: { display: false }
            },
            animation: {
                animateRotate: true,
                animateScale: true
            }
        }
    };
    const taskChart = new Chart(ctx, config);

    // Chart ortasına başarı oranı yaz:
    function updateCenterText(dogru, yanlis, bos) {
        const toplam = Number(dogru) + Number(yanlis) + Number(bos);
        const oran = toplam > 0 ? Math.round((dogru / toplam) * 100) : 0;
        document.getElementById('chart-center-text').innerHTML =
            `<span style='font-size:2.2rem;'>%${oran}</span><div style='font-size:1.1rem;font-weight:400;color:#888'>Başarı</div>`;
    }
    updateCenterText({{ $totalDogru }}, {{ $totalYanlis }}, {{ $totalBos }});

    // Tablo satırına tıklayınca chart ve dakika güncelle
    document.querySelectorAll('.selectable-task').forEach(row => {
        row.addEventListener('click', function() {
            const dogru = this.getAttribute('data-dogru');
            const yanlis = this.getAttribute('data-yanlis');
            const bos = this.getAttribute('data-bos');
            const ders = this.getAttribute('data-ders');
            const dakika = this.getAttribute('data-dakika');
            // Chart verisini güncelle
            taskChart.data.datasets[0].data = [dogru, yanlis, bos];
            taskChart.options.plugins.title = {
                display: true,
                text: `${ders} Analizi`
            };
            taskChart.update();
            // Dakika bilgisini güncelle
            document.getElementById('minute-info').innerHTML = `<span class='material-icons-sharp me-2'>timer</span>Süre: <strong>${dakika} dakika</strong>`;
            // Başarı oranı güncelle
            const toplamSatir = Number(dogru) + Number(yanlis) + Number(bos);
            const oranSatir = toplamSatir > 0 ? Math.round((dogru / toplamSatir) * 100) : 0;
            document.getElementById('success-rate-badge').textContent = `Başarı Oranı: %${oranSatir}`;
            document.getElementById('success-rate-bar').style.width = oranSatir + '%';
            document.getElementById('success-rate-bar').setAttribute('aria-valuenow', oranSatir);
            updateCenterText(dogru, yanlis, bos);
        });
    });

    // Ders filtreleme
    document.getElementById('dersSelect').addEventListener('change', function() {
        const selected = this.value;
        const tableBody = document.querySelector('#analysis-table tbody');
        let filtered = allTasks;
        if(selected !== 'all') {
            filtered = allTasks.filter(t => t.ders_type === selected);
        }
        // Tabloyu güncelle
        tableBody.innerHTML = filtered.map(task => `
            <tr class="selectable-task"
                data-dogru="${task.dogru_soru_sayisi}"
                data-yanlis="${task.yanlis_soru_sayisi}"
                data-bos="${task.bos_soru_sayisi}"
                data-ders="${task.ders_type ?? '-'}"
                data-dakika="${task.dakika}"
                style="cursor:pointer;">
                <td class="fw-bold text-primary ps-4">${task.ders_type ?? '-'}</td>
                <td>${task.dogru_soru_sayisi}</td>
                <td>${task.yanlis_soru_sayisi}</td>
                <td>${task.bos_soru_sayisi}</td>
                <td>${task.dakika}</td>
                <td>${task.created_at ? new Date(task.created_at).toLocaleDateString('tr-TR') : ''}</td>
            </tr>
        `).join('');
        // Toplamları güncelle
        const totalDogru = filtered.reduce((sum, t) => sum + Number(t.dogru_soru_sayisi), 0);
        const totalYanlis = filtered.reduce((sum, t) => sum + Number(t.yanlis_soru_sayisi), 0);
        const totalBos = filtered.reduce((sum, t) => sum + Number(t.bos_soru_sayisi), 0);
        const totalDakika = filtered.reduce((sum, t) => sum + Number(t.dakika), 0);
        // Chart ve dakika kutusunu güncelle
        taskChart.data.datasets[0].data = [totalDogru, totalYanlis, totalBos];
        taskChart.options.plugins.title = { display: false };
        taskChart.update();
        document.getElementById('minute-info').innerHTML = `<span class='material-icons-sharp me-2'>timer</span>Toplam Süre: <strong id='total-minute-text'>${totalDakika} dakika</strong>`;
        // Başarı oranı güncelle
        const toplam = totalDogru + totalYanlis + totalBos;
        const oran = toplam > 0 ? Math.round((totalDogru / toplam) * 100) : 0;
        document.getElementById('success-rate-badge').textContent = `Başarı Oranı: %${oran}`;
        document.getElementById('success-rate-bar').style.width = oran + '%';
        document.getElementById('success-rate-bar').setAttribute('aria-valuenow', oran);
        updateCenterText(totalDogru, totalYanlis, totalBos);
        // Yeni satırlara tıklama ekle
        document.querySelectorAll('.selectable-task').forEach(row => {
            row.addEventListener('click', function() {
                const dogru = this.getAttribute('data-dogru');
                const yanlis = this.getAttribute('data-yanlis');
                const bos = this.getAttribute('data-bos');
                const ders = this.getAttribute('data-ders');
                const dakika = this.getAttribute('data-dakika');
                taskChart.data.datasets[0].data = [dogru, yanlis, bos];
                taskChart.options.plugins.title = {
                    display: true,
                    text: `${ders} Analizi`
                };
                taskChart.update();
                document.getElementById('minute-info').innerHTML = `<span class='material-icons-sharp me-2'>timer</span>Süre: <strong>${dakika} dakika</strong>`;
                // Başarı oranı güncelle
                const toplamSatir = Number(dogru) + Number(yanlis) + Number(bos);
                const oranSatir = toplamSatir > 0 ? Math.round((dogru / toplamSatir) * 100) : 0;
                document.getElementById('success-rate-badge').textContent = `Başarı Oranı: %${oranSatir}`;
                document.getElementById('success-rate-bar').style.width = oranSatir + '%';
                document.getElementById('success-rate-bar').setAttribute('aria-valuenow', oranSatir);
                updateCenterText(dogru, yanlis, bos);
            });
        });
    });

    document.getElementById('export-excel').addEventListener('click', function() {
        var table = document.getElementById('analysis-table');
        var wb = XLSX.utils.table_to_book(table, {sheet:"Analiz"});
        XLSX.writeFile(wb, "analiz.xlsx");
    });
    document.getElementById('export-pdf').addEventListener('click', function() {
        var content = document.querySelector('.row.g-4.justify-content-center');
        html2canvas(content).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');
            var pdf = new jspdf.jsPDF({
                orientation: 'landscape',
                unit: 'pt',
                format: 'a4'
            });
            var pageWidth = pdf.internal.pageSize.getWidth();
            var pageHeight = pdf.internal.pageSize.getHeight();
            var imgWidth = pageWidth - 40;
            var imgHeight = canvas.height * imgWidth / canvas.width;
            pdf.addImage(imgData, 'PNG', 20, 20, imgWidth, imgHeight);
            pdf.save('analiz.pdf');
        });
    });
</script>
@endsection