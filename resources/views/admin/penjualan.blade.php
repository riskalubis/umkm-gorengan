<style>
    .sales-stats{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:18px;
        margin-top:32px;
        margin-bottom:28px;
    }

    .sales-card,
    .sales-panel{
        background:#fff;
        border:1px solid #f3e8dd;
        border-radius:18px;
        padding:24px;
    }

    .sales-card span{
        color:#a8a29e;
        font-size:11px;
    }

    .sales-card strong{
        display:block;
        font-size:28px;
        margin-top:8px;
    }

    .sales-panel{
        margin-bottom:18px;
    }

    /* FILTER */
    .sales-filter{
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:15px;
        margin-top:18px;
        margin-bottom:8px;
        padding:14px 16px;
        background:#fffaf5;
        border:1px solid #f3e8dd;
        border-radius:14px;
    }

    .filter-label{
        font-size:13px;
        font-weight:700;
        color:#57534e;
    }

    .filter-wrap{
        position:relative;
        min-width:220px;
    }

    .filter-select{
        width:100%;
        appearance:none;
        -webkit-appearance:none;
        border:1px solid #e7cfc0;
        background:#fff;
        color:#57534e;
        padding:10px 38px 10px 13px;
        border-radius:11px;
        outline:none;
        font-size:13px;
        font-weight:600;
        cursor:pointer;
    }

    .filter-select:focus{
        border-color:#f97316;
        box-shadow:0 0 0 3px rgba(249,115,22,.10);
    }

    .filter-wrap::after{
        content:"⌄";
        position:absolute;
        right:13px;
        top:50%;
        transform:translateY(-55%);
        color:#f97316;
        pointer-events:none;
        font-size:17px;
        font-weight:700;
    }

    /* ORDER */
    .order{
        border:1px solid #f3e8dd;
        border-radius:15px;
        padding:18px;
        margin-top:13px;
        transition:.2s ease;
    }

    .order:hover{
        border-color:#ead3c2;
        box-shadow:0 5px 18px rgba(92,58,34,.05);
    }

    .order-top{
        display:flex;
        justify-content:space-between;
        gap:12px;
    }

    /* BADGE */
    .badge{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        padding:7px 11px;
        border-radius:999px;
        font-size:10px;
        font-weight:800;
        white-space:nowrap;
    }

    .badge-menunggu{
        background:#fff7ed;
        color:#ea580c;
    }

    .badge-diterima{
        background:#eff6ff;
        color:#2563eb;
    }

    .badge-digoreng{
        background:#fff7ed;
        color:#c2410c;
    }

    .badge-diantar{
        background:#f5f3ff;
        color:#7c3aed;
    }

    .badge-selesai{
        background:#ecfdf5;
        color:#15803d;
    }

    .badge-ditolak{
        background:#fef2f2;
        color:#dc2626;
    }

    .items{
        margin:12px 0;
        color:#78716c;
        font-size:12px;
        line-height:1.7;
    }

    /* STATUS SELECT */
    .status-wrap{
        position:relative;
        min-width:220px;
    }

    .status-select{
        width:100%;
        appearance:none;
        -webkit-appearance:none;
        border:1px solid #ead8cc;
        background:#fffaf5;
        color:#57534e;
        padding:10px 38px 10px 13px;
        border-radius:11px;
        outline:none;
        font-size:12px;
        font-weight:700;
        cursor:pointer;
        transition:.2s ease;
    }

    .status-select:hover{
        border-color:#f97316;
        background:#fff7ed;
    }

    .status-select:focus{
        border-color:#f97316;
        box-shadow:0 0 0 3px rgba(249,115,22,.10);
    }

    .status-wrap::after{
        content:"⌄";
        position:absolute;
        right:13px;
        top:50%;
        transform:translateY(-55%);
        color:#f97316;
        pointer-events:none;
        font-size:17px;
        font-weight:700;
    }

    /* MODAL */
    .modal{
        position:fixed;
        inset:0;
        background:rgba(41,37,36,.45);
        display:none;
        align-items:center;
        justify-content:center;
        padding:18px;
        z-index:9999;
    }

    .modal.show{
        display:flex;
    }

    .box{
        width:min(420px,100%);
        background:#fff;
        border-radius:20px;
        padding:25px;
    }

    .primary{
        border:0;
        background:#f97316;
        color:#fff;
        padding:11px 15px;
        border-radius:10px;
        font-weight:700;
        cursor:pointer;
    }

    .actions{
        display:flex;
        justify-content:flex-end;
        margin-top:18px;
    }

    .empty-filter{
        display:none;
        padding:40px;
        text-align:center;
        color:#a8a29e;
    }

    @media(max-width:800px){
        .sales-stats{
            grid-template-columns:1fr;
        }

        .sales-filter{
            flex-direction:column;
            align-items:stretch;
        }

        .filter-wrap,
        .status-wrap{
            min-width:100%;
        }

        .order-top{
            flex-direction:column;
        }
    }
</style>

<div class="page-heading">
    <h1>Penjualan</h1>
</div>

<div class="sales-stats">

    <div class="sales-card">
        <span>PENJUALAN</span>
        <strong>
            Rp{{ number_format(
                $pesanans->where('status','!=','ditolak')->sum('total'),
                0,
                ',',
                '.'
            ) }}
        </strong>
    </div>

    <div class="sales-card">
        <span>TRANSAKSI HARI INI</span>
        <strong>{{ $pesanans->count() }}</strong>
    </div>

    <div class="sales-card">
        <span>MENUNGGU KONFIRMASI</span>
        <strong>{{ $pesanans->where('status','menunggu')->count() }}</strong>
    </div>

</div>

<div class="sales-panel">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:15px;
        flex-wrap:wrap;
    ">
        <h3>Pesanan Masuk Hari Ini</h3>
    </div>

    <!-- FILTER STATUS -->
    <div class="sales-filter">

        <div class="filter-label">
            Filter Status Pesanan
        </div>

        <div class="filter-wrap">
            <select
                id="filterStatus"
                class="filter-select"
                onchange="filterStatusPesanan()"
            >
                <option value="semua">Semua Status</option>
                <option value="menunggu">Menunggu Konfirmasi</option>
                <option value="diterima">Pesanan Diterima</option>
                <option value="digoreng">Sedang Digoreng</option>
                <option value="diantar">Sedang Diantar</option>
                <option value="selesai">Selesai</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </div>

    </div>

    <div id="ordersContainer">

        @forelse($pesanans as $pesanan)

            <div
                class="order"
                data-status="{{ $pesanan->status }}"
            >

                <div class="order-top">

                    <div>
                        <b>{{ $pesanan->nama_pelanggan }}</b>

                        <div style="color:#a8a29e;font-size:11px">
                            {{ $pesanan->kode }} ·
                            {{ $pesanan->created_at->format('H:i') }}
                        </div>
                    </div>

                    @php
                        $statusLabels = [
                            'menunggu' => 'Menunggu Konfirmasi',
                            'diterima' => 'Pesanan Diterima',
                            'digoreng' => 'Sedang Digoreng',
                            'diantar' => 'Sedang Diantar',
                            'selesai' => 'Selesai',
                            'ditolak' => 'Ditolak',
                        ];

                        $statusClass = [
                            'menunggu' => 'badge-menunggu',
                            'diterima' => 'badge-diterima',
                            'digoreng' => 'badge-digoreng',
                            'diantar' => 'badge-diantar',
                            'selesai' => 'badge-selesai',
                            'ditolak' => 'badge-ditolak',
                        ];
                    @endphp

                    <span class="badge {{ $statusClass[$pesanan->status] ?? 'badge-menunggu' }}">
                        {{ $statusLabels[$pesanan->status] ?? ucfirst($pesanan->status) }}
                    </span>

                </div>

                <div class="items">

                    @foreach($pesanan->items as $item)

                        {{ $item->nama_produk }}
                        × {{ $item->jumlah }}
                        — Rp{{ number_format($item->subtotal,0,',','.') }}

                        <br>

                    @endforeach

                </div>

                <div style="
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    gap:10px;
                    flex-wrap:wrap;
                ">

                    <b>
                        Rp{{ number_format($pesanan->total,0,',','.') }}
                    </b>

                    <div class="status-wrap">

                        <select
                            class="status-select"
                            onchange="ubahStatus({{ $pesanan->id }},this.value)"
                        >

                            <option value="menunggu"
                                @selected($pesanan->status==='menunggu')>
                                Menunggu Konfirmasi
                            </option>

                            <option value="diterima"
                                @selected($pesanan->status==='diterima')>
                                Pesanan Diterima
                            </option>

                            <option value="digoreng"
                                @selected($pesanan->status==='digoreng')>
                                Sedang Digoreng
                            </option>

                            <option value="diantar"
                                @selected($pesanan->status==='diantar')>
                                Sedang Diantar
                            </option>

                            <option value="selesai"
                                @selected($pesanan->status==='selesai')>
                                Selesai
                            </option>

                            <option value="ditolak"
                                @selected($pesanan->status==='ditolak')>
                                Ditolak
                            </option>

                        </select>

                    </div>

                </div>

            </div>

        @empty

            <div style="
                padding:45px;
                text-align:center;
                color:#a8a29e;
            ">
                Belum ada pesanan hari ini.
            </div>

        @endforelse

        <div
            id="emptyFilter"
            class="empty-filter"
        >
            Tidak ada pesanan dengan status tersebut.
        </div>

    </div>

</div>

<!-- MODAL -->
<div class="modal" id="statusModal">

    <div class="box">

        <h2 id="statusTitle">
            Status diperbarui
        </h2>

        <p
            id="statusText"
            style="color:#a8a29e;font-size:13px"
        ></p>

        <div class="actions">

            <button
                class="primary"
                onclick="statusModal.classList.remove('show')"
            >
                Tutup
            </button>

        </div>

    </div>

</div>

<script>

const stToken='{{ csrf_token() }}';


/* =========================
   FILTER STATUS
========================= */

function filterStatusPesanan(){

    const filter =
        document.getElementById('filterStatus').value;

    const orders =
        document.querySelectorAll(
            '#ordersContainer .order'
        );

    let visible = 0;

    orders.forEach(order => {

        const status =
            order.dataset.status;

        const show =
            filter === 'semua' ||
            status === filter;

        order.style.display =
            show ? '' : 'none';

        if(show){
            visible++;
        }

    });

    const emptyFilter =
        document.getElementById('emptyFilter');

    emptyFilter.style.display =
        visible === 0 ? 'block' : 'none';

}


/* =========================
   UBAH STATUS
========================= */

async function ubahStatus(id,status){

    try{

        let r=await fetch(
            '/admin/penjualan/'+id+'/status',
            {
                method:'PUT',
                headers:{
                    'Content-Type':'application/json',
                    'Accept':'application/json',
                    'X-CSRF-TOKEN':stToken
                },
                body:JSON.stringify({status})
            }
        );

        let d=await r.json();

        if(!r.ok)
            throw new Error(
                d.message || 'Status gagal diperbarui.'
            );

        const order =
            document.querySelector(
                `.order:has(.status-select option:checked[value="${status}"])`
            );

        statusTitle.textContent='Berhasil';
        statusText.textContent=d.message;
        statusModal.classList.add('show');

    }catch(e){

        statusTitle.textContent='Tidak berhasil';
        statusText.textContent=e.message;
        statusModal.classList.add('show');

    }

}

</script>