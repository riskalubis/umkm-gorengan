<div
    class="order-card"
    data-status="{{ $status }}"
>

    <div class="order-name">
        {{ $pesanan->nama_pelanggan }}
    </div>

    <div class="order-code">
        {{ $pesanan->kode }}
    </div>

    <div class="order-time">
        {{ $pesanan->created_at->format('H:i') }}
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

        $statusPills = [
            'menunggu' => 'pill-menunggu',
            'diterima' => 'pill-diterima',
            'digoreng' => 'pill-digoreng',
            'diantar' => 'pill-diantar',
            'selesai' => 'pill-selesai',
            'ditolak' => 'pill-ditolak',
        ];
    @endphp

    <div class="status-pill {{ $statusPills[$status] }}">
        {{ $statusLabels[$status] }}
    </div>

    <div class="order-items">

        @foreach($pesanan->items as $item)

            {{ $item->nama_produk }}
            × {{ $item->jumlah }}
            — Rp{{ number_format($item->subtotal,0,',','.') }}

            <br>

        @endforeach

    </div>

    <div class="order-total">

        <span>Total</span>

        <strong>
            Rp{{ number_format($pesanan->total,0,',','.') }}
        </strong>

    </div>

    <div class="order-actions">

        @if($status === 'menunggu')

            <button
                type="button"
                class="status-btn primary"
                onclick="ubahStatus(
                    {{ $pesanan->id }},
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
                    {{ $pesanan->id }},
                    'ditolak',
                    this.closest('.order-card')
                )"
            >
                Tolak Pesanan
            </button>

        @elseif($status === 'diterima')

            <button
                type="button"
                class="status-btn primary"
                onclick="ubahStatus(
                    {{ $pesanan->id }},
                    'digoreng',
                    this.closest('.order-card')
                )"
            >
                Mulai Digoreng
            </button>

        @elseif($status === 'digoreng')

            <button
                type="button"
                class="status-btn info"
                onclick="ubahStatus(
                    {{ $pesanan->id }},
                    'diantar',
                    this.closest('.order-card')
                )"
            >
                Pesanan Diantar
            </button>

        @elseif($status === 'diantar')

            <button
                type="button"
                class="status-btn success"
                onclick="ubahStatus(
                    {{ $pesanan->id }},
                    'selesai',
                    this.closest('.order-card')
                )"
            >
                Tandai Selesai
            </button>

        @endif

    </div>

</div>