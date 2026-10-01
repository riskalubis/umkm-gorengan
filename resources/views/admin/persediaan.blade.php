<style>
.page-heading {
    margin-bottom: 35px;
}

.inv-summary{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:18px;
    margin-bottom:24px
}

.inv-card,.inv-panel{
    background:#fff;
    border:1px solid #f3e8dd;
    border-radius:18px;
    padding:24px
}

.inv-card span{
    color:#a8a29e;
    font-size:12px
}

.inv-card strong{
    display:block;
    font-size:30px;
    margin-top:8px
}

.inv-panel{
    margin-bottom:20px
}

.inv-head{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px
}

.orange{
    border:0;
    background:#f97316;
    color:#fff;
    padding:12px 16px;
    border-radius:11px;
    font-weight:700;
    cursor:pointer
}

.inv-table{
    display:grid;
    grid-template-columns:2fr 1fr 1fr 1fr 1fr
}

.cell{
    padding:14px;
    border-bottom:1px solid #f3e8dd;
    font-size:13px
}

.head{
    color:#a8a29e;
    font-size:11px;
    font-weight:700
}

.edit-stock{
    border:0;
    background:#fff7ed;
    color:#ea580c;
    padding:8px 11px;
    border-radius:8px;
    font-weight:700;
    cursor:pointer
}

.modal{
    position:fixed;
    inset:0;
    background:rgba(41,37,36,.45);
    display:none;
    align-items:center;
    justify-content:center;
    padding:18px;
    z-index:9999
}

.modal.show{
    display:flex
}

.box{
    width:min(450px,100%);
    background:#fff;
    border-radius:20px;
    padding:25px
}

.field{
    margin-top:15px
}

.field label{
    display:block;
    font-size:12px;
    font-weight:700;
    margin-bottom:7px
}

.field select,
.field input{
    width:100%;
    padding:11px;
    border:1px solid #e7ddd4;
    border-radius:10px
}

.actions{
    display:flex;
    justify-content:flex-end;
    gap:9px;
    margin-top:20px
}

.cancel{
    border:0;
    background:#f5f5f4;
    padding:11px 15px;
    border-radius:10px
}

.save{
    border:0;
    background:#f97316;
    color:#fff;
    padding:11px 15px;
    border-radius:10px
}

.msg{
    display:none;
    margin-top:12px;
    padding:10px;
    border-radius:9px;
    background:#fef2f2;
    color:#dc2626;
    font-size:12px
}

@media(max-width:800px){
    .inv-summary{
        grid-template-columns:1fr
    }

    .inv-table{
        grid-template-columns:1.5fr 1fr 1fr 1fr;
        overflow:auto
    }

    .hide-mobile{
        display:none
    }
}

.page-heading p {
    margin-top: 8px;
    margin-bottom: 28px;
    color: #9a8f87;
    font-size: 16px;
}
</style>


<div class="page-heading">
    <h1>Persediaan</h1>
</div>


<div class="inv-summary">

    <div class="inv-card">
        <span>Produk Terdaftar</span>
        <strong>{{ $produks->count() }}</strong>
    </div>

    <div class="inv-card">
        <span>Total Persediaan</span>
        <strong>
            {{ number_format($persediaans->sum('jumlah'),0,',','.') }}
        </strong>
    </div>

</div>


<div class="inv-panel">

    <div class="inv-head">

        <div>
            <h3>Persediaan</h3>
        </div>

        <button class="orange" onclick="openInv()">
            Tambah Persediaan
        </button>

    </div>


    <div class="inv-table">

        <div class="cell head">Produk</div>
        <div class="cell head">Harga</div>
        <div class="cell head">Stok</div>
        <div class="cell head">Status</div>
        <div class="cell head">Aksi</div>


        @forelse($persediaans as $inv)

            <div class="cell">
                <b>{{ $inv->produk->nama }}</b>
            </div>

            <div class="cell">
                Rp{{ number_format($inv->produk->harga,0,',','.') }}
            </div>

            <div class="cell">
                <b>{{ $inv->jumlah }} pcs</b>
            </div>

            <div class="cell">
                <span style="color:{{ $inv->jumlah > 0 ? '#16a34a' : '#dc2626' }}">
                    {{ $inv->jumlah > 0 ? 'Tersedia' : 'Habis' }}
                </span>
            </div>

            <div class="cell">
                <button
                    class="edit-stock"
                    onclick="editInv({{ $inv->id }},{{ $inv->jumlah }})">
                    Edit
                </button>
            </div>

        @empty

            <div
                class="cell"
                style="grid-column:1/-1;text-align:center;color:#a8a29e;padding:45px">
                Belum ada persediaan.
            </div>

        @endforelse

    </div>

</div>


<div
    class="modal"
    id="invModal"
    onclick="if(event.target===this)closeInv()">

    <div class="box">

        <h2 id="invTitle">
            Tambah Persediaan
        </h2>

        <div id="invMsg" class="msg"></div>


        <div class="field" id="produkField">

            <label>Produk</label>

            <select id="invProduk">

                <option value="">
                    Pilih produk
                </option>

                @foreach($produks as $p)

                    <option value="{{ $p->id }}">
                        {{ $p->nama }}
                        — Rp{{ number_format($p->harga,0,',','.') }}
                    </option>

                @endforeach

            </select>

        </div>


        <div class="field">

            <label>Persediaan</label>

            <input
                id="invStok"
                type="number"
                min="0">

        </div>


        <div class="actions">

            <button
                class="cancel"
                onclick="closeInv()">
                Batal
            </button>

            <button
                class="save"
                onclick="saveInv()">
                Simpan
            </button>

        </div>

    </div>

</div>


<script>

let invEdit = null;

const invToken = '{{ csrf_token() }}';


function openInv(){

    invEdit = null;

    invTitle.textContent = 'Tambah Persediaan';

    produkField.style.display = 'block';

    invProduk.value = '';

    invStok.value = '';

    invMsg.style.display = 'none';

    invModal.classList.add('show');
}


function editInv(id,jumlah){

    invEdit = id;

    invTitle.textContent = 'Edit Persediaan';

    produkField.style.display = 'none';

    invStok.value = jumlah;

    invMsg.style.display = 'none';

    invModal.classList.add('show');
}


function closeInv(){

    invModal.classList.remove('show');

}


async function saveInv(){

    try{

        let url = invEdit
            ? '/admin/persediaan/' + invEdit
            : '/admin/persediaan';

        let body = invEdit
            ? {
                jumlah: invStok.value
            }
            : {
                produk_id: invProduk.value,
                jumlah: invStok.value
            };


        let r = await fetch(url,{

            method: invEdit ? 'PUT' : 'POST',

            headers:{
                'Content-Type':'application/json',
                'Accept':'application/json',
                'X-CSRF-TOKEN':invToken
            },

            body:JSON.stringify(body)

        });


        let d = await r.json();


        if(!r.ok){

            throw new Error(
                d.message || 'Persediaan gagal disimpan.'
            );

        }


        location.reload();


    }catch(e){

        invMsg.textContent = e.message;

        invMsg.style.display = 'block';

    }

}

</script>