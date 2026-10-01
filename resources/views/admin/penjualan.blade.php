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

.order{
    border:1px solid #f3e8dd;
    border-radius:15px;
    padding:18px;
    margin-top:13px;
}

.order-top{
    display:flex;
    justify-content:space-between;
    gap:12px;
}

.badge{
    padding:6px 9px;
    border-radius:8px;
    background:#fff7ed;
    color:#ea580c;
    font-size:10px;
    font-weight:700;
}

.items{
    margin:12px 0;
    color:#78716c;
    font-size:12px;
    line-height:1.7;
}

.status-select{
    padding:9px;
    border:1px solid #e7ddd4;
    border-radius:9px;
}

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
}

.actions{
    display:flex;
    justify-content:flex-end;
    margin-top:18px;
}

@media(max-width:800px){
    .sales-stats{
        grid-template-columns:1fr;
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
            Rp{{ number_format($pesanans->where('status','!=','dibatalkan')->sum('total'),0,',','.') }}
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

    <h3>Pesanan Masuk Hari Ini</h3>

    @forelse($pesanans as $pesanan)

        <div class="order">

            <div class="order-top">

                <div>
                    <b>{{ $pesanan->nama_pelanggan }}</b>

                    <div style="color:#a8a29e;font-size:11px">
                        {{ $pesanan->kode }} · {{ $pesanan->created_at->format('H:i') }}
                    </div>
                </div>

                <span class="badge">
                    {{ strtoupper($pesanan->status) }}
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

            <div style="display:flex;justify-content:space-between;align-items:center;gap:10px">

                <b>
                    Rp{{ number_format($pesanan->total,0,',','.') }}
                </b>

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

                    <option value="dibatalkan"
                        @selected($pesanan->status==='dibatalkan')>
                        Batalkan
                    </option>

                </select>

            </div>

        </div>

    @empty

        <div style="padding:45px;text-align:center;color:#a8a29e">
            Belum ada pesanan hari ini.
        </div>

    @endforelse

</div>

<div class="modal" id="statusModal">

    <div class="box">

        <h2 id="statusTitle">
            Status diperbarui
        </h2>

        <p id="statusText"
           style="color:#a8a29e;font-size:13px">
        </p>

        <div class="actions">

            <button
                class="primary"
                onclick="statusModal.classList.remove('show')">
                Tutup
            </button>

        </div>

    </div>

</div>

<script>
const stToken='{{ csrf_token() }}';

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
