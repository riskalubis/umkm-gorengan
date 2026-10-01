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
            Rp<?php echo e(number_format($pesanans->where('status','!=','dibatalkan')->sum('total'),0,',','.')); ?>

        </strong>
    </div>

    <div class="sales-card">
        <span>TRANSAKSI HARI INI</span>
        <strong><?php echo e($pesanans->count()); ?></strong>
    </div>

    <div class="sales-card">
        <span>MENUNGGU KONFIRMASI</span>
        <strong><?php echo e($pesanans->where('status','menunggu')->count()); ?></strong>
    </div>

</div>

<div class="sales-panel">

    <h3>Pesanan Masuk Hari Ini</h3>

    <?php $__empty_1 = true; $__currentLoopData = $pesanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <div class="order">

            <div class="order-top">

                <div>
                    <b><?php echo e($pesanan->nama_pelanggan); ?></b>

                    <div style="color:#a8a29e;font-size:11px">
                        <?php echo e($pesanan->kode); ?> · <?php echo e($pesanan->created_at->format('H:i')); ?>

                    </div>
                </div>

                <span class="badge">
                    <?php echo e(strtoupper($pesanan->status)); ?>

                </span>

            </div>

            <div class="items">

                <?php $__currentLoopData = $pesanan->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php echo e($item->nama_produk); ?>

                    × <?php echo e($item->jumlah); ?>

                    — Rp<?php echo e(number_format($item->subtotal,0,',','.')); ?>


                    <br>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <div style="display:flex;justify-content:space-between;align-items:center;gap:10px">

                <b>
                    Rp<?php echo e(number_format($pesanan->total,0,',','.')); ?>

                </b>

                <select
                    class="status-select"
                    onchange="ubahStatus(<?php echo e($pesanan->id); ?>,this.value)"
                >

                    <option value="menunggu"
                        <?php if($pesanan->status==='menunggu'): echo 'selected'; endif; ?>>
                        Menunggu Konfirmasi
                    </option>

                    <option value="diterima"
                        <?php if($pesanan->status==='diterima'): echo 'selected'; endif; ?>>
                        Pesanan Diterima
                    </option>

                    <option value="digoreng"
                        <?php if($pesanan->status==='digoreng'): echo 'selected'; endif; ?>>
                        Sedang Digoreng
                    </option>

                    <option value="diantar"
                        <?php if($pesanan->status==='diantar'): echo 'selected'; endif; ?>>
                        Sedang Diantar
                    </option>

                    <option value="selesai"
                        <?php if($pesanan->status==='selesai'): echo 'selected'; endif; ?>>
                        Selesai
                    </option>

                    <option value="dibatalkan"
                        <?php if($pesanan->status==='dibatalkan'): echo 'selected'; endif; ?>>
                        Batalkan
                    </option>

                </select>

            </div>

        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <div style="padding:45px;text-align:center;color:#a8a29e">
            Belum ada pesanan hari ini.
        </div>

    <?php endif; ?>

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
const stToken='<?php echo e(csrf_token()); ?>';

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
<?php /**PATH C:\Users\apiip\OneDrive\Documents\umkm-gorengan\resources\views/admin/penjualan.blade.php ENDPATH**/ ?>