<div
    class="order-card"
    data-status="<?php echo e($status); ?>"
>

    <div class="order-name">
        <?php echo e($pesanan->nama_pelanggan); ?>

    </div>

    <div class="order-code">
        <?php echo e($pesanan->kode); ?>

    </div>

    <div class="order-time">
        <?php echo e($pesanan->created_at->format('H:i')); ?>

    </div>

    <?php
        $statusLabels = [
            'menunggu' => 'Menunggu Konfirmasi',
            'diterima' => 'Pesanan Diterima',
            'digoreng' => 'Sedang Digoreng',
            'diantar' => 'Sedang Diantar',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
        ];

        $statusPills = [
            'menunggu' => 'pill-menunggu',
            'diterima' => 'pill-diterima',
            'digoreng' => 'pill-digoreng',
            'diantar' => 'pill-diantar',
            'selesai' => 'pill-selesai',
            'ditolak' => 'pill-ditolak',
        ];
    ?>

    <div class="status-pill <?php echo e($statusPills[$status]); ?>">
        <?php echo e($statusLabels[$status]); ?>

    </div>

    <div class="order-items">

        <?php $__currentLoopData = $pesanan->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php echo e($item->nama_produk); ?>

            × <?php echo e($item->jumlah); ?>

            — Rp<?php echo e(number_format($item->subtotal,0,',','.')); ?>


            <br>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    <div class="order-total">

        <span>Total</span>

        <strong>
            Rp<?php echo e(number_format($pesanan->total,0,',','.')); ?>

        </strong>

    </div>

    <div class="order-actions">

        <?php if($status === 'menunggu'): ?>

            <button
                type="button"
                class="status-btn primary"
                onclick="ubahStatus(
                    <?php echo e($pesanan->id); ?>,
                    'diterima',
                    this.closest('.order-card')
                )"
            >
                ✓ Setujui Pesanan
            </button>

            <button
                type="button"
                class="status-btn danger"
                onclick="ubahStatus(
                    <?php echo e($pesanan->id); ?>,
                    'ditolak',
                    this.closest('.order-card')
                )"
            >
                Tolak Pesanan
            </button>

        <?php elseif($status === 'diterima'): ?>

            <button
                type="button"
                class="status-btn primary"
                onclick="ubahStatus(
                    <?php echo e($pesanan->id); ?>,
                    'digoreng',
                    this.closest('.order-card')
                )"
            >
                Mulai Digoreng
            </button>

        <?php elseif($status === 'digoreng'): ?>

            <button
                type="button"
                class="status-btn info"
                onclick="ubahStatus(
                    <?php echo e($pesanan->id); ?>,
                    'diantar',
                    this.closest('.order-card')
                )"
            >
                Pesanan Diantar
            </button>

        <?php elseif($status === 'diantar'): ?>

            <button
                type="button"
                class="status-btn success"
                onclick="ubahStatus(
                    <?php echo e($pesanan->id); ?>,
                    'selesai',
                    this.closest('.order-card')
                )"
            >
                Tandai Selesai
            </button>

        <?php endif; ?>

    </div>

</div><?php /**PATH C:\Users\apiip\OneDrive\Documents\umkm-gorengan\resources\views/admin/partials/order-card.blade.php ENDPATH**/ ?>