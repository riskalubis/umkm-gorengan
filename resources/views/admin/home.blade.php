<div class="page-heading">
    <div class="page-heading-label">DASHBOARD</div>

    <h1>
        Selamat datang, {{ auth()->user()->name ?? 'Admin' }} 👋
    </h1>

</div>


{{-- =========================
     STATISTIK
========================= --}}

<div class="dashboard-stats">

    <div class="stat-card">
        <div>
            <span class="stat-label">
                PENJUALAN HARI INI
            </span>

            <strong class="stat-value">
                Rp{{ number_format($pendapatan ?? 0, 0, ',', '.') }}
            </strong>

        </div>

        <div class="stat-icon">
            💰
        </div>
    </div>


    <div class="stat-card">
        <div>
            <span class="stat-label">
                TOTAL PRODUK
            </span>

            <strong class="stat-value">
                {{ $produkCount ?? 0 }}
            </strong>

        </div>

        <div class="stat-icon">
            🥟
        </div>
    </div>


    <div class="stat-card">
        <div>
            <span class="stat-label">
                PERSEDIAAN
            </span>

            <strong class="stat-value">
                {{ number_format($stok ?? 0, 0, ',', '.') }}
            </strong>

        </div>

        <div class="stat-icon">
            📦
        </div>
    </div>

</div>


{{-- =========================
     BAGIAN BAWAH
========================= --}}

<div class="dashboard-bottom">

    {{-- PESANAN --}}
    <div class="dashboard-panel">

        <div class="panel-title-row">

            <div>
                <h3>
                    Pesanan Masuk Hari Ini
                </h3>

            </div>

            <a href="#" data-page="penjualan">
                Lihat semua 
            </a>

        </div>


        @forelse($pesanan as $p)

            <div class="order-item">

                <div class="order-icon">
                    🧾
                </div>

                <div class="order-info">

                    <strong>
                        {{ $p->nama_pelanggan }}
                    </strong>

                    <p>
                        {{ $p->kode }}
                        ·
                        {{ $p->created_at->format('H:i') }}
                    </p>

                </div>

                <div class="order-right">

                    <strong>
                        Rp{{ number_format($p->total, 0, ',', '.') }}
                    </strong>

                    <span class="order-status">
                        {{ strtoupper($p->status) }}
                    </span>

                </div>

            </div>

        @empty

            <div class="empty-transaction">

                <div class="empty-icon">
                    🥟
                </div>

                <div>
                    <strong>
                        Belum ada pesanan
                    </strong>

                    <p>
                        Pesanan pelanggan akan muncul di sini.
                    </p>
                </div>

            </div>

        @endforelse

    </div>


    {{-- TENTANG --}}
    <div class="dashboard-panel about-panel">

        <span class="panel-label">
            TENTANG GORENGANKU
        </span>

        <h3>
            Sederhana, praktis, dan teratur.
        </h3>

        <p>
            Usaha yang teratur dimulai dari langkah sederhana.
            Catat produk, buka persediaan hari ini, lalu biarkan
            pesanan pelanggan tersambung ke penjualan.
        </p>


        </div>

    </div>

</div>


<style>

    /* =========================
       HEADING
    ========================= */

    .page-heading {
        margin-bottom: 28px;
    }

    .page-heading-label {
        color: #9a6743;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.4px;
        margin-bottom: 8px;
    }

    .page-heading h1 {
        margin: 0;
        font-size: 30px;
        line-height: 1.25;
        color: #29211d;
        font-weight: 800;
    }

    .page-heading p {
        margin: 8px 0 0;
        color: #a8a29e;
        font-size: 14px;
    }


    /* =========================
       STATISTIK
    ========================= */

    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 22px;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid #eee7e1;
        border-radius: 16px;
        padding: 22px;
        min-height: 125px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        box-shadow: 0 4px 14px rgba(60, 40, 25, .04);
    }

    .stat-label {
        display: block;
        color: #9a8f88;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .8px;
        margin-bottom: 9px;
    }

    .stat-value {
        display: block;
        color: #29211d;
        font-size: 25px;
        line-height: 1.1;
        font-weight: 800;
    }

    .stat-note {
        display: block;
        color: #aaa29c;
        font-size: 11px;
        margin-top: 7px;
    }

    .stat-icon {
        width: 50px;
        height: 50px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f7eee7;
        border-radius: 14px;

        font-size: 22px;
        flex-shrink: 0;
    }


    /* =========================
       BOTTOM
    ========================= */

    .dashboard-bottom {
        display: grid;
        grid-template-columns: minmax(0, 1.55fr) minmax(280px, .8fr);
        gap: 18px;
    }

    .dashboard-panel {
        background: #ffffff;
        border: 1px solid #eee7e1;
        border-radius: 16px;
        padding: 22px;

        box-shadow: 0 4px 14px rgba(60, 40, 25, .04);
    }


    /* =========================
       TITLE
    ========================= */

    .panel-title-row {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 15px;

        padding-bottom: 15px;
        border-bottom: 1px solid #f2ece7;
    }

    .panel-title-row h3 {
        margin: 0;
        color: #29211d;
        font-size: 17px;
        font-weight: 800;
    }

    .panel-description {
        margin: 5px 0 0;
        color: #aaa29c;
        font-size: 11px;
    }

    .panel-title-row a {
        color: #9a6743;
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        white-space: nowrap;
        padding-top: 2px;
    }

    .panel-title-row a:hover {
        text-decoration: underline;
    }


    /* =========================
       PESANAN
    ========================= */

    .order-item {
        display: grid;
        grid-template-columns: 42px minmax(0, 1fr) auto;

        align-items: center;
        gap: 12px;

        padding: 15px 0;

        border-bottom: 1px solid #f5efeb;
    }

    .order-item:last-child {
        border-bottom: none;
    }

    .order-icon {
        width: 40px;
        height: 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f8f0e9;
        border-radius: 12px;

        font-size: 18px;
    }

    .order-info {
        min-width: 0;
    }

    .order-info strong {
        display: block;
        color: #332821;
        font-size: 13px;
        font-weight: 800;
    }

    .order-info p {
        margin: 4px 0 0;
        color: #aaa29c;
        font-size: 11px;
    }

    .order-right {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 5px;
    }

    .order-right strong {
        color: #332821;
        font-size: 12px;
        font-weight: 800;
    }

    .order-status {
        display: inline-block;

        padding: 5px 8px;

        background: #fff7ed;
        color: #ea580c;

        border-radius: 7px;

        font-size: 9px;
        font-weight: 800;
        letter-spacing: .3px;
    }


    /* =========================
       EMPTY
    ========================= */

    .empty-transaction {
        min-height: 170px;

        display: flex;
        align-items: center;
        justify-content: center;

        gap: 12px;

        text-align: left;
    }

    .empty-icon {
        width: 48px;
        height: 48px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f8f0e9;
        border-radius: 14px;

        font-size: 22px;
    }

    .empty-transaction strong {
        display: block;
        color: #4a3b33;
        font-size: 14px;
    }

    .empty-transaction p {
        margin: 4px 0 0;
        color: #aaa29c;
        font-size: 11px;
    }


    /* =========================
       ABOUT
    ========================= */

    .about-panel {
        min-height: 100%;
    }

    .panel-label {
        display: block;
        color: #9a6743;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 1.2px;
        margin-bottom: 9px;
    }

    .about-panel h3 {
        margin: 0;
        color: #29211d;
        font-size: 20px;
        line-height: 1.35;
    }

    .about-panel > p {
        margin: 10px 0 0;
        color: #a8a29e;
        font-size: 12px;
        line-height: 1.7;
    }

    .about-list {
        margin-top: 22px;
        display: grid;
        gap: 10px;
    }

    .about-item {
        display: flex;
        align-items: center;
        gap: 10px;

        padding: 10px;

        background: #faf7f4;
        border-radius: 11px;
    }

    .about-item > span {
        width: 32px;
        height: 32px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f4e8dd;
        border-radius: 9px;

        font-size: 15px;
        flex-shrink: 0;
    }

    .about-item strong {
        display: block;
        color: #4a3b33;
        font-size: 11px;
    }

    .about-item small {
        display: block;
        margin-top: 2px;
        color: #aaa29c;
        font-size: 9px;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 950px) {

        .dashboard-stats {
            grid-template-columns: 1fr;
        }

        .dashboard-bottom {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {

        .page-heading h1 {
            font-size: 24px;
        }

        .stat-card {
            padding: 18px;
        }

        .dashboard-panel {
            padding: 17px;
        }

        .order-item {
            grid-template-columns: 40px minmax(0, 1fr);
        }

        .order-right {
            grid-column: 2;
            align-items: flex-start;
        }
    }

</style>
