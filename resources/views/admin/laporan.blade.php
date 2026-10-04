<style>
.report-cards{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
    margin-top:32px;
    margin-bottom:30px;
}

.rc{
    background:#fff;
    border:1px solid #f3e8dd;
    border-radius:18px;
    padding:22px;
}

.rc span{
    color:#a8a29e;
    font-size:11px;
}

.rc strong{
    display:block;
    font-size:26px;
    margin-top:8px;
}

.rp{
    background:#fff;
    border:1px solid #f3e8dd;
    border-radius:18px;
    padding:24px;
}

.export{
    border:0;
    background:#f97316;
    color:#fff;
    padding:11px 14px;
    border-radius:10px;
    font-weight:700;
    cursor:pointer;
    margin-left:7px;
}

.table{
    width:100%;
    border-collapse:collapse;
    margin-top:18px;
}

.table th,
.table td{
    padding:12px;
    border-bottom:1px solid #f3e8dd;
    text-align:left;
    font-size:12px;
    vertical-align:top;
}

.table th{
    color:#a8a29e;
}

.product-list{
    display:flex;
    flex-direction:column;
    gap:4px;
}

.product-item{
    color:#57534e;
}

.product-qty{
    color:#f97316;
    font-weight:700;
}

@media(max-width:800px){

    .report-cards{
        grid-template-columns:1fr;
    }

    .rp{
        overflow:auto;
    }
}
</style>

<div class="page-heading">
    <h1>Laporan Penjualan</h1>
</div>

<div class="report-cards">

    <div class="rc">
        <span>PENJUALAN HARI INI</span>

        <strong>
            Rp{{ number_format($pesanans->sum('total'),0,',','.') }}
        </strong>
    </div>

    <div class="rc">
        <span>TRANSAKSI</span>

        <strong>
            {{ $pesanans->count() }}
        </strong>
    </div>

    <div class="rc">
        <span>ITEM TERJUAL</span>

        <strong>
            {{ $pesanans->sum(fn($p)=>$p->items->sum('jumlah')) }}
        </strong>
    </div>

</div>

<div class="rp">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
    ">

        <div>

            <h3>
                Aktivitas Penjualan Hari Ini
            </h3>

            <p style="
                color:#a8a29e;
                font-size:12px;
                margin-top:5px;
            ">
                Data tersambung langsung dengan Penjualan.
            </p>

        </div>

        <div>

            <button
                class="export"
                onclick="window.print()">
                PDF
            </button>

            <button
                class="export"
                onclick="exportExcel()">
                Excel
            </button>

        </div>

    </div>

    <table class="table" id="reportTable">

        <thead>
            <tr>
                <th>Kode</th>
                <th>Pelanggan</th>
                <th>Waktu</th>
                <th>Total</th>
                <th>Produk Dibeli</th>
            </tr>
        </thead>

        <tbody>

            @forelse($pesanans as $p)

                <tr>

                    <td>
                        {{ $p->kode }}
                    </td>

                    <td>
                        {{ $p->nama_pelanggan }}
                    </td>

                    <td>
                        {{ $p->created_at->format('H:i') }}
                    </td>

                    <td>
                        Rp{{ number_format($p->total,0,',','.') }}
                    </td>

                    <td>

                        <div class="product-list">

                            @foreach($p->items as $item)

                                <div class="product-item">
                                    {{ $item->nama_produk }}
                                    <span class="product-qty">
                                        × {{ $item->jumlah }}
                                    </span>
                                </div>

                            @endforeach

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="5"
                        style="
                            text-align:center;
                            color:#a8a29e;
                            padding:30px;
                        "
                    >
                        Belum ada aktivitas penjualan hari ini.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<script>
function exportExcel(){

    const rows = [
        ...document.querySelectorAll('#reportTable tr')
    ].map(r =>
        [...r.children]
        .map(c =>
            `"${c.innerText.replaceAll('"','""')}"`
        )
        .join(',')
    );

    const blob = new Blob(
        [rows.join('\n')],
        {
            type:'text/csv;charset=utf-8;'
        }
    );

    const a = document.createElement('a');

    a.href = URL.createObjectURL(blob);

    a.download =
        'laporan-penjualan-hari-ini.csv';

    a.click();

    URL.revokeObjectURL(a.href);
}
</script>