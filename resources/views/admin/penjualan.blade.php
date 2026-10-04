<style>
    .sales-stats{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:18px;
        margin-top:32px;
        margin-bottom:28px;
    }

    .sales-card{
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

    /* BOARD */
    .sales-board-wrap{
        overflow-x:auto;
        padding-bottom:8px;
    }

    .sales-board{
        display:grid;
        grid-template-columns:repeat(6, minmax(270px, 1fr));
        gap:16px;
        min-width:1660px;
    }

    .status-column{
        background:#faf7f4;
        border:1px solid #eee5de;
        border-radius:18px;
        padding:14px;
        min-height:350px;
    }

    .column-head{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:8px;
        padding:4px 4px 13px;
        border-bottom:1px solid #eee5de;
        margin-bottom:12px;
    }

    .column-title{
        font-size:12px;
        font-weight:800;
        color:#57534e;
        text-transform:uppercase;
        line-height:1.35;
    }

    .column-count{
        min-width:27px;
        height:27px;
        display:flex;
        align-items:center;
        justify-content:center;
        border-radius:999px;
        background:#fff;
        color:#78716c;
        border:1px solid #eadfd6;
        font-size:11px;
        font-weight:800;
    }

    .status-column.menunggu{
        border-top:4px solid #f97316;
    }

    .status-column.diterima{
        border-top:4px solid #60a5fa;
    }

    .status-column.digoreng{
        border-top:4px solid #fb923c;
    }

    .status-column.diantar{
        border-top:4px solid #8b5cf6;
    }

    .status-column.selesai{
        border-top:4px solid #22c55e;
    }

    .status-column.ditolak{
        border-top:4px solid #ef4444;
    }

    /* ORDER CARD */
    .order-card{
        background:#fff;
        border:1px solid #eee5de;
        border-radius:14px;
        padding:15px;
        margin-bottom:11px;
        box-shadow:0 4px 14px rgba(80,50,30,.04);
        transition:.2s ease;
    }

    .order-card:hover{
        transform:translateY(-1px);
        box-shadow:0 8px 20px rgba(80,50,30,.07);
    }

    .order-name{
        font-size:14px;
        font-weight:800;
        color:#292524;
    }

    .order-code{
        margin-top:4px;
        color:#a8a29e;
        font-size:10px;
    }

    .order-time{
        color:#a8a29e;
        font-size:10px;
        margin-top:2px;
    }

    .order-items{
        margin:13px 0;
        padding-top:10px;
        border-top:1px solid #f1e9e3;
        color:#78716c;
        font-size:11px;
        line-height:1.7;
    }

    .order-total{
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:8px;
        margin-top:12px;
    }

    .order-total strong{
        font-size:13px;
        color:#292524;
    }

    .status-pill{
        display:inline-flex;
        align-items:center;
        gap:5px;
        padding:6px 9px;
        border-radius:999px;
        font-size:9px;
        font-weight:800;
        margin-top:11px;
    }

    .pill-menunggu{
        background:#fff7ed;
        color:#ea580c;
    }

    .pill-diterima{
        background:#eff6ff;
        color:#2563eb;
    }

    .pill-digoreng{
        background:#fff7ed;
        color:#c2410c;
    }

    .pill-diantar{
        background:#f5f3ff;
        color:#7c3aed;
    }

    .pill-selesai{
        background:#ecfdf5;
        color:#15803d;
    }

    .pill-ditolak{
        background:#fef2f2;
        color:#dc2626;
    }

    /* ACTION BUTTON */
    .order-actions{
        display:flex;
        flex-direction:column;
        gap:7px;
        margin-top:12px;
    }

    .status-btn{
        width:100%;
        border:0;
        border-radius:9px;
        padding:10px 11px;
        font-size:11px;
        font-weight:800;
        cursor:pointer;
        transition:.2s ease;
    }

    .status-btn.primary{
        background:#f97316;
        color:white;
    }

    .status-btn.primary:hover{
        background:#ea580c;
    }

    .status-btn.danger{
        background:#fff1f2;
        color:#dc2626;
    }

    .status-btn.danger:hover{
        background:#ffe4e6;
    }

    .status-btn.success{
        background:#ecfdf5;
        color:#15803d;
    }

    .status-btn.success:hover{
        background:#dcfce7;
    }

    .status-btn.info{
        background:#eff6ff;
        color:#2563eb;
    }

    .status-btn.info:hover{
        background:#dbeafe;
    }

    .empty-column{
        color:#aaa19a;
        font-size:11px;
        text-align:center;
        padding:35px 10px;
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

    .modal-box{
        width:min(400px,100%);
        background:#fff;
        border-radius:20px;
        padding:25px;
        box-shadow:0 20px 50px rgba(0,0,0,.12);
    }

    .modal-box h2{
        font-size:20px;
        margin:0;
    }

    .modal-box p{
        margin-top:8px;
        color:#a8a29e;
        font-size:13px;
        line-height:1.5;
    }

    .modal-actions{
        display:flex;
        justify-content:flex-end;
        margin-top:18px;
    }

    .close-btn{
        border:0;
        background:#f97316;
        color:#fff;
        padding:10px 15px;
        border-radius:10px;
        font-weight:700;
        cursor:pointer;
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


<!-- SUMMARY -->
<div class="sales-stats">

    <div class="sales-card">
        <span>PENJUALAN</span>

        <strong>
            Rp{{ number_format(
                $pesanans
                    ->where('status','!=','ditolak')
                    ->sum('total'),
                0,
                ',',
                '.'
            ) }}
        </strong>
    </div>


    <div class="sales-card">
        <span>TRANSAKSI HARI INI</span>

        <strong>
            {{ $pesanans->count() }}
        </strong>
    </div>


    <div class="sales-card">
        <span>MENUNGGU KONFIRMASI</span>

        <strong id="waitingCount">
            {{ $pesanans->where('status','menunggu')->count() }}
        </strong>
    </div>

</div>


<!-- BOARD -->
<div class="sales-board-wrap">

    <div class="sales-board">


        <!-- MENUNGGU -->
        <div class="status-column menunggu"
             id="column-menunggu">

            <div class="column-head">

                <div class="column-title">
                    Menunggu<br>
                    Konfirmasi
                </div>

                <div class="column-count">
                    {{ $pesanans->where('status','menunggu')->count() }}
                </div>

            </div>


            @forelse(
                $pesanans->where('status','menunggu')
                as $pesanan
            )

                @include('admin.partials.order-card', [
                    'pesanan' => $pesanan,
                    'status' => 'menunggu'
                ])

            @empty

                <div class="empty-column">
                    Belum ada pesanan.
                </div>

            @endforelse

        </div>


        <!-- DITERIMA -->
        <div class="status-column diterima"
             id="column-diterima">

            <div class="column-head">

                <div class="column-title">
                    Pesanan<br>
                    Diterima
                </div>

                <div class="column-count">
                    {{ $pesanans->where('status','diterima')->count() }}
                </div>

            </div>


            @forelse(
                $pesanans->where('status','diterima')
                as $pesanan
            )

                @include('admin.partials.order-card', [
                    'pesanan' => $pesanan,
                    'status' => 'diterima'
                ])

            @empty

                <div class="empty-column">
                    Belum ada pesanan.
                </div>

            @endforelse

        </div>


        <!-- DIGORENG -->
        <div class="status-column digoreng"
             id="column-digoreng">

            <div class="column-head">

                <div class="column-title">
                    Sedang<br>
                    Digoreng
                </div>

                <div class="column-count">
                    {{ $pesanans->where('status','digoreng')->count() }}
                </div>

            </div>


            @forelse(
                $pesanans->where('status','digoreng')
                as $pesanan
            )

                @include('admin.partials.order-card', [
                    'pesanan' => $pesanan,
                    'status' => 'digoreng'
                ])

            @empty

                <div class="empty-column">
                    Belum ada pesanan.
                </div>

            @endforelse

        </div>


        <!-- DIANTAR -->
        <div class="status-column diantar"
             id="column-diantar">

            <div class="column-head">

                <div class="column-title">
                    Sedang<br>
                    Diantar
                </div>

                <div class="column-count">
                    {{ $pesanans->where('status','diantar')->count() }}
                </div>

            </div>


            @forelse(
                $pesanans->where('status','diantar')
                as $pesanan
            )

                @include('admin.partials.order-card', [
                    'pesanan' => $pesanan,
                    'status' => 'diantar'
                ])

            @empty

                <div class="empty-column">
                    Belum ada pesanan.
                </div>

            @endforelse

        </div>


        <!-- SELESAI -->
        <div class="status-column selesai"
             id="column-selesai">

            <div class="column-head">

                <div class="column-title">
                    Selesai
                </div>

                <div class="column-count">
                    {{ $pesanans->where('status','selesai')->count() }}
                </div>

            </div>


            @forelse(
                $pesanans->where('status','selesai')
                as $pesanan
            )

                @include('admin.partials.order-card', [
                    'pesanan' => $pesanan,
                    'status' => 'selesai'
                ])

            @empty

                <div class="empty-column">
                    Belum ada pesanan.
                </div>

            @endforelse

        </div>


        <!-- DITOLAK -->
        <div class="status-column ditolak"
             id="column-ditolak">

            <div class="column-head">

                <div class="column-title">
                    Ditolak
                </div>

                <div class="column-count">
                    {{ $pesanans->where('status','ditolak')->count() }}
                </div>

            </div>


            @forelse(
                $pesanans->where('status','ditolak')
                as $pesanan
            )

                @include('admin.partials.order-card', [
                    'pesanan' => $pesanan,
                    'status' => 'ditolak'
                ])

            @empty

                <div class="empty-column">
                    Belum ada pesanan.
                </div>

            @endforelse

        </div>


    </div>

</div>


<!-- MODAL -->
<div class="modal" id="statusModal">

    <div class="modal-box">

        <h2 id="statusTitle">
            Berhasil
        </h2>

        <p id="statusText"></p>

        <div class="modal-actions">

            <button
                class="close-btn"
                onclick="statusModal.classList.remove('show')"
            >
                Tutup
            </button>

        </div>

    </div>

</div>

<!-- MODAL ALASAN PENOLAKAN -->
<div class="modal" id="tolakModal">

    <div class="modal-box">

        <h2>Alasan Pesanan Ditolak</h2>

        <p>
            Pilih alasan agar pelanggan mengetahui
            kenapa pesanannya tidak dapat diproses.
        </p>

        <select
            id="alasanTolak"
            style="
                width:100%;
                margin-top:18px;
                padding:12px;
                border:1px solid #ead8cc;
                border-radius:11px;
                background:#fffaf5;
                color:#57534e;
                font-size:13px;
                outline:none;
            "
        >
            <option value="">
                Pilih alasan penolakan
            </option>

            <option value="Stok produk habis.">
                Stok produk habis
            </option>

            <option value="Produk tidak tersedia.">
                Produk tidak tersedia
            </option>

            <option value="Pesanan tidak dapat diproses.">
                Pesanan tidak dapat diproses
            </option>
        </select>

        <textarea
            id="catatanTolak"
            rows="3"
            placeholder="Tambahkan keterangan untuk pelanggan (opsional)"
            style="
                width:100%;
                margin-top:12px;
                padding:12px;
                border:1px solid #ead8cc;
                border-radius:11px;
                resize:none;
                font-family:inherit;
                font-size:13px;
                outline:none;
            "
        ></textarea>

        <div
            id="tolakError"
            style="
                display:none;
                margin-top:10px;
                padding:10px;
                border-radius:10px;
                background:#fef2f2;
                color:#dc2626;
                font-size:12px;
            "
        ></div>

        <div style="
            display:flex;
            justify-content:flex-end;
            gap:10px;
            margin-top:18px;
        ">

            <button
                type="button"
                class="status-btn"
                style="
                    width:auto;
                    background:#f5f5f4;
                    color:#57534e;
                    padding:10px 15px;
                "
                onclick="tutupModalTolak()"
            >
                Kembali
            </button>

            <button
                type="button"
                class="status-btn danger"
                style="
                    width:auto;
                    padding:10px 15px;
                "
                onclick="konfirmasiTolak()"
            >
                Tolak Pesanan
            </button>

        </div>

    </div>

</div>

<script>

const stToken = '{{ csrf_token() }}';


const statusInfo = {

    menunggu: {
        label: 'Menunggu Konfirmasi',
        pill: 'pill-menunggu'
    },

    diterima: {
        label: 'Pesanan Diterima',
        pill: 'pill-diterima'
    },

    digoreng: {
        label: 'Sedang Digoreng',
        pill: 'pill-digoreng'
    },

    diantar: {
        label: 'Sedang Diantar',
        pill: 'pill-diantar'
    },

    selesai: {
        label: 'Selesai',
        pill: 'pill-selesai'
    },

    ditolak: {
        label: 'Ditolak',
        pill: 'pill-ditolak'
    }

};


/* =========================
   ACTION BUTTONS
========================= */

function actionButtons(id, status){

    if(status === 'menunggu'){

        return `
            <button
                type="button"
                class="status-btn primary"
                onclick="ubahStatus(${id}, 'diterima', this.closest('.order-card'))"
            >
                ✓ Setujui Pesanan
            </button>

            <button
    type="button"
    class="status-btn danger"
    onclick="bukaModalTolak(${id}, this.closest('.order-card'))"
>
    Tolak Pesanan
</button>
        `;

    }


    if(status === 'diterima'){

        return `
            <button
                type="button"
                class="status-btn primary"
                onclick="ubahStatus(${id}, 'digoreng', this.closest('.order-card'))"
            >
                Mulai Digoreng
            </button>
        `;

    }


    if(status === 'digoreng'){

        return `
            <button
                type="button"
                class="status-btn info"
                onclick="ubahStatus(${id}, 'diantar', this.closest('.order-card'))"
            >
                Pesanan Diantar
            </button>
        `;

    }


    if(status === 'diantar'){

        return `
            <button
                type="button"
                class="status-btn success"
                onclick="ubahStatus(${id}, 'selesai', this.closest('.order-card'))"
            >
                Tandai Selesai
            </button>
        `;

    }


    return '';
}


/* =========================
   MOVE CARD
========================= */

function moveCard(card, id, newStatus){

    const target =
        document.getElementById(
            'column-' + newStatus
        );

    if(!target) return;


    /* badge */
    const info = statusInfo[newStatus];

    const badge =
        card.querySelector('.status-pill');

    badge.textContent =
        info.label;

    badge.className =
        'status-pill ' + info.pill;


    /* status data */
    card.dataset.status =
        newStatus;


    /* buttons */
    const actions =
        card.querySelector('.order-actions');

    actions.innerHTML =
        actionButtons(id, newStatus);


    /* pindahkan card */
    target.appendChild(card);


    updateColumnCounts();

}


/* =========================
   UPDATE JUMLAH COLUMN
========================= */

function updateColumnCounts(){

    document.querySelectorAll(
        '.status-column'
    ).forEach(column => {

        const count =
            column.querySelectorAll(
                '.order-card'
            ).length;

        const counter =
            column.querySelector(
                '.column-count'
            );

        if(counter){
            counter.textContent =
                count;
        }

        const empty =
            column.querySelector(
                '.empty-column'
            );

        if(empty){

            empty.style.display =
                count === 0
                    ? 'block'
                    : 'none';

        }

    });


    const waiting =
        document.querySelectorAll(
            '#column-menunggu .order-card'
        ).length;

    const waitingCount =
        document.getElementById(
            'waitingCount'
        );

    if(waitingCount){
        waitingCount.textContent =
            waiting;
    }

}


/* =========================
   UPDATE STATUS
========================= */

async function ubahStatus(id, status, card){

    try{

        const response =
            await fetch(
                '/admin/penjualan/' +
                id +
                '/status',
                {
                    method:'PUT',

                    headers:{
                        'Content-Type':
                            'application/json',

                        'Accept':
                            'application/json',

                        'X-CSRF-TOKEN':
                            stToken
                    },

                    body:
                        JSON.stringify({
                            status:status
                        })
                }
            );


        const data =
            await response.json();


        if(!response.ok){

            throw new Error(
                data.message ||
                'Status gagal diperbarui.'
            );

        }


        moveCard(
            card,
            id,
            status
        );


        statusTitle.textContent =
            'Berhasil';

        statusText.textContent =
            data.message ||
            'Status pesanan berhasil diperbarui.';

        statusModal.classList.add(
            'show'
        );


    }catch(error){

        statusTitle.textContent =
            'Tidak berhasil';

        statusText.textContent =
            error.message;

        statusModal.classList.add(
            'show'
        );

    }

}

let pesananTolakId = null;
let cardTolak = null;

function bukaModalTolak(id, card) {

    pesananTolakId = id;
    cardTolak = card;

    document.getElementById('alasanTolak').value = '';
    document.getElementById('catatanTolak').value = '';
    document.getElementById('tolakError').style.display = 'none';

    document.getElementById('tolakModal').classList.add('show');
}


function tutupModalTolak() {

    document
        .getElementById('tolakModal')
        .classList.remove('show');
}


async function konfirmasiTolak() {

    const alasan =
        document.getElementById('alasanTolak').value;

    const catatan =
        document.getElementById('catatanTolak')
            .value
            .trim();

    const errorBox =
        document.getElementById('tolakError');


    if (!alasan) {

        errorBox.textContent =
            'Silakan pilih alasan penolakan terlebih dahulu.';

        errorBox.style.display = 'block';

        return;
    }


    let alasanFinal = alasan;

    if (catatan) {
        alasanFinal += ' ' + catatan;
    }


    try {

        const response = await fetch(
            '/admin/penjualan/' + pesananTolakId + '/status',
            {
                method: 'PUT',

                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': stToken
                },

                body: JSON.stringify({
                    status: 'ditolak',
                    alasan_penolakan: alasanFinal
                })
            }
        );


        const data = await response.json();


        if (!response.ok) {
            throw new Error(
                data.message || 'Pesanan gagal ditolak.'
            );
        }


        tutupModalTolak();


        // pindahkan kartu ke wadah Ditolak
        moveCard(
            cardTolak,
            pesananTolakId,
            'ditolak'
        );


        // tampilkan notifikasi
        statusTitle.textContent =
            'Pesanan Ditolak';

        statusText.textContent =
            'Alasan penolakan berhasil disimpan.';

        statusModal.classList.add('show');


    } catch (error) {

        errorBox.textContent =
            error.message;

        errorBox.style.display =
            'block';
    }
}

</script>