<div class="produk-page">

<style>
.produk-page {
    width: 100%;
}

.produk-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 25px;
}

.produk-label {
    color: #f97316;
    font-size: 12px;
    font-weight: 700;
}

.produk-title {
    margin: 6px 0 0;
    font-size: 28px;
}

.produk-description {
    margin: 7px 0 0;
    color: #a8a29e;
    font-size: 13px;
}

.btn-tambah-produk {
    border: 0;
    border-radius: 11px;
    padding: 11px 16px;
    font-weight: 700;
    cursor: pointer;
    background: #f97316;
    color: white;
}

.produk-summary {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    margin-bottom: 20px;
}

.produk-summary-card {
    background: white;
    border: 1px solid #f3e8dd;
    border-radius: 16px;
    padding: 19px;
}

.produk-summary-label {
    font-size: 10px;
    color: #a8a29e;
    text-transform: uppercase;
    font-weight: 700;
}

.produk-summary-value {
    margin-top: 7px;
    font-size: 23px;
    font-weight: 800;
}

.produk-summary-note {
    color: #22c55e;
    font-size: 11px;
    margin-top: 4px;
}

.produk-search {
    width: 100%;
    padding: 13px 16px;
    border: 1px solid #f3e8dd;
    border-radius: 13px;
    outline: none;
    background: white;
    margin-bottom: 20px;
}

.produk-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}

.produk-card {
    background: white;
    border: 1px solid #f3e8dd;
    border-radius: 17px;
    padding: 16px;
}

.produk-image {
    width: 100%;
    height: 145px;
    border-radius: 13px;
    background: linear-gradient(135deg, #fff7ed, #ffedd5);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.produk-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.produk-placeholder {
    font-size: 48px;
}

.produk-name {
    font-size: 14px;
    font-weight: 800;
    margin-top: 15px;
}

.produk-price {
    margin-top: 5px;
    color: #f97316;
    font-size: 13px;
    font-weight: 700;
}

.produk-desc {
    margin-top: 8px;
    color: #a8a29e;
    font-size: 11px;
    line-height: 1.5;
    min-height: 32px;
}

.card-actions {
    display: flex;
    gap: 8px;
    margin-top: 15px;
}

.btn-action {
    border: 0;
    border-radius: 10px;
    padding: 9px 13px;
    font-weight: 700;
    cursor: pointer;
}

.edit {
    background: #fff7ed;
    color: #ea580c;
}

.del {
    background: #fef2f2;
    color: #dc2626;
}

/* MODAL */

.modal {
    position: fixed;
    inset: 0;
    background: rgba(41, 37, 36, .45);
    display: none;
    align-items: center;
    justify-content: center;
    padding: 18px;
    z-index: 9999;
}

.modal.show {
    display: flex;
}

.modal-box {
    width: min(520px, 100%);
    max-height: 90vh;
    overflow-y: auto;
    background: white;
    border-radius: 20px;
    padding: 25px;
}

.modal-box h2 {
    margin: 0 0 7px;
}

.muted {
    color: #a8a29e;
    font-size: 13px;
}

.field {
    margin-top: 15px;
}

.field label {
    display: block;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 7px;
}

.field input,
.field textarea {
    width: 100%;
    padding: 11px;
    border: 1px solid #e7ddd4;
    border-radius: 10px;
    font-family: inherit;
    outline: none;
}

.field input:focus,
.field textarea:focus {
    border-color: #f97316;
}

.foto-preview {
    width: 100%;
    height: 180px;
    border-radius: 13px;
    background: #fff7ed;
    border: 1px dashed #fed7aa;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    margin-top: 10px;
}

.foto-preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.foto-placeholder {
    color: #a8a29e;
    font-size: 13px;
}

.actions {
    display: flex;
    justify-content: flex-end;
    gap: 9px;
    margin-top: 20px;
}

.cancel {
    border: 0;
    background: #f5f5f4;
    padding: 11px 15px;
    border-radius: 10px;
    cursor: pointer;
}

.save {
    border: 0;
    background: #f97316;
    color: white;
    padding: 11px 15px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 700;
}

.msg {
    display: none;
    margin-top: 12px;
    padding: 10px;
    border-radius: 9px;
    font-size: 12px;
    background: #fef2f2;
    color: #dc2626;
}

.empty-produk {
    grid-column: 1 / -1;
    background: white;
    padding: 45px;
    text-align: center;
    border: 1px dashed #eadfd4;
    border-radius: 17px;
    color: #a8a29e;
}

@media(max-width: 900px) {
    .produk-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width: 550px) {
    .produk-grid,
    .produk-summary {
        grid-template-columns: 1fr;
    }

    .produk-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
}
</style>


<!-- HEADER -->

<div class="produk-header">

    <div>

        <h1 class="produk-title">
            Produk Gorengan
        </h1>

    </div>

    <button
        type="button"
        class="btn-tambah-produk"
        onclick="openProdukModal()"
    >
        Tambah Produk
    </button>

</div>


<!-- SUMMARY -->

<div class="produk-summary">

    <div class="produk-summary-card">

        <div class="produk-summary-label">
            Total Produk
        </div>

        <div class="produk-summary-value">
            <?php echo e($produks->count()); ?>

        </div>


    </div>


    <div class="produk-summary-card">

        <div class="produk-summary-label">
            Harga Default
        </div>

        <div class="produk-summary-value">
            Rp2.000
        </div>



    </div>

</div>


<!-- SEARCH -->

<input
    type="text"
    class="produk-search"
    id="searchProduk"
    placeholder="Cari nama gorengan..."
    oninput="filterProduk()"
>


<!-- PRODUCT LIST -->

<div class="produk-grid" id="produkGrid">

<?php $__empty_1 = true; $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <div
        class="produk-card"
        data-name="<?php echo e(strtolower($produk->nama)); ?>"
    >

        <div class="produk-image">

            <?php if($produk->foto): ?>

                <img
                   src="<?php echo e(\Illuminate\Support\Facades\Storage::disk('public')->url($produk->foto)); ?>"
                    alt="<?php echo e($produk->nama); ?>"
                >

            <?php else: ?>

                <div class="produk-placeholder">
                    🥟
                </div>

            <?php endif; ?>

        </div>


        <div class="produk-name">
            <?php echo e($produk->nama); ?>

        </div>


        <div class="produk-price">
            Rp<?php echo e(number_format($produk->harga, 0, ',', '.')); ?> / pcs
        </div>


        <div class="produk-desc">
            <?php echo e($produk->deskripsi ?: 'Belum ada deskripsi produk.'); ?>

        </div>


        <div class="card-actions">

            <button
                type="button"
                class="btn-action edit"
                onclick='editProduk(
                    <?php echo json_encode($produk->id, 15, 512) ?>,
                    <?php echo json_encode($produk->nama, 15, 512) ?>,
                    <?php echo json_encode($produk->harga, 15, 512) ?>,
                    <?php echo json_encode($produk->deskripsi, 15, 512) ?>,
                    <?php echo json_encode($produk->foto, 15, 512) ?>
                )'
            >
                Edit
            </button>


            <button
                type="button"
                class="btn-action del"
                onclick='openDeleteProduk(
                    <?php echo json_encode($produk->id, 15, 512) ?>,
                    <?php echo json_encode($produk->nama, 15, 512) ?>
                )'
            >
                Hapus
            </button>

        </div>

    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <div class="empty-produk">

        <div style="font-size:45px;margin-bottom:12px;">
            🥟
        </div>

        <strong>
            Belum ada produk
        </strong>

        <p style="margin-top:7px;">
            Produk yang ditambahkan admin akan muncul di sini.
        </p>

    </div>

<?php endif; ?>

</div>


<!-- ========================= -->
<!-- MODAL TAMBAH / EDIT -->
<!-- ========================= -->

<div
    class="modal"
    id="produkModal"
    onclick="if(event.target === this) closeProdukModal()"
>

    <div class="modal-box">

        <h2 id="produkModalTitle">
            Tambah Produk
        </h2>

        <p class="muted">
            Isi data gorengan yang ingin ditambahkan.
        </p>


        <div
            id="produkMsg"
            class="msg"
        ></div>


        <!-- FOTO -->

        <div class="field">

            <label>
                Foto Gorengan
            </label>

            <input
                type="file"
                id="pFoto"
                accept="image/*"
                onchange="previewFoto(event)"
            >

            <div class="foto-preview" id="fotoPreview">

                <div class="foto-placeholder">
                    Pilih foto gorengan
                </div>

            </div>

        </div>


        <!-- NAMA -->

        <div class="field">

            <label>
                Nama Gorengan
            </label>

            <input
                type="text"
                id="pNama"
                placeholder="Contoh: Risol"
            >

        </div>


        <!-- HARGA -->

        <div class="field">

            <label>
                Harga per pcs
            </label>

            <input
                type="number"
                id="pHarga"
                min="0"
                value="2000"
            >

        </div>


        <!-- DESKRIPSI -->

        <div class="field">

            <label>
                Deskripsi
            </label>

            <textarea
                id="pDesc"
                rows="4"
                placeholder="Contoh: Risol isi sayur dan ayam."
            ></textarea>

        </div>


        <!-- BUTTON -->

        <div class="actions">

            <button
                type="button"
                class="cancel"
                onclick="closeProdukModal()"
            >
                Batal
            </button>

            <button
                type="button"
                class="save"
                onclick="saveProduk()"
            >
                Simpan Produk
            </button>

        </div>

    </div>

</div>


<!-- ========================= -->
<!-- MODAL HAPUS -->
<!-- ========================= -->

<div
    class="modal"
    id="deleteProdukModal"
>

    <div class="modal-box">

        <h2>
            Hapus Produk
        </h2>

        <p
            class="muted"
            id="deleteProdukText"
            style="margin-top:8px;"
        ></p>


        <div class="actions">

            <button
                type="button"
                class="cancel"
                onclick="closeDeleteProduk()"
            >
                Batal
            </button>

            <button
                type="button"
                class="btn-action del"
                onclick="deleteProduk()"
            >
                Hapus
            </button>

        </div>

    </div>

</div>


<script>

let editId = null;
let deleteId = null;

const csrfToken = '<?php echo e(csrf_token()); ?>';

const produkModal =
    document.getElementById('produkModal');

const deleteProdukModal =
    document.getElementById('deleteProdukModal');

const pFoto =
    document.getElementById('pFoto');

const pNama =
    document.getElementById('pNama');

const pHarga =
    document.getElementById('pHarga');

const pDesc =
    document.getElementById('pDesc');

const produkMsg =
    document.getElementById('produkMsg');

const fotoPreview =
    document.getElementById('fotoPreview');


/* =========================
   TAMBAH PRODUK
========================= */

function openProdukModal() {

    editId = null;

    document.getElementById('produkModalTitle').textContent =
        'Tambah Produk';

    pFoto.value = '';
    pNama.value = '';
    pHarga.value = 2000;
    pDesc.value = '';

    produkMsg.style.display = 'none';

    fotoPreview.innerHTML = `
        <div class="foto-placeholder">
            Pilih foto gorengan
        </div>
    `;

    produkModal.classList.add('show');
}


/* =========================
   EDIT PRODUK
========================= */

function editProduk(id, nama, harga, desc, foto) {

    editId = id;

    document.getElementById('produkModalTitle').textContent =
        'Edit Produk';

    pFoto.value = '';
    pNama.value = nama;
    pHarga.value = harga;
    pDesc.value = desc || '';

    produkMsg.style.display = 'none';


    if (foto) {

        fotoPreview.innerHTML = `
            <img
                src="/storage/${foto}"
                alt="${nama}"
            >
        `;

    } else {

        fotoPreview.innerHTML = `
            <div class="foto-placeholder">
                Belum ada foto
            </div>
        `;

    }

    produkModal.classList.add('show');
}


/* =========================
   PREVIEW FOTO
========================= */

function previewFoto(event) {

    const file = event.target.files[0];

    if (!file) return;

    const reader = new FileReader();

    reader.onload = function(e) {

        fotoPreview.innerHTML = `
            <img
                src="${e.target.result}"
                alt="Preview"
            >
        `;

    };

    reader.readAsDataURL(file);
}


/* =========================
   TUTUP MODAL
========================= */

function closeProdukModal() {

    produkModal.classList.remove('show');

}


/* =========================
   SIMPAN PRODUK
========================= */

async function saveProduk() {

    produkMsg.style.display = 'none';


    const nama = pNama.value.trim();
    const harga = pHarga.value;
    const desc = pDesc.value.trim();


    if (!nama) {

        produkMsg.textContent =
            'Nama produk wajib diisi.';

        produkMsg.style.display = 'block';

        return;
    }


    if (!harga || Number(harga) < 0) {

        produkMsg.textContent =
            'Harga produk tidak valid.';

        produkMsg.style.display = 'block';

        return;
    }


    const formData = new FormData();

    formData.append('nama', nama);
    formData.append('harga', harga);
    formData.append('deskripsi', desc);


    if (pFoto.files[0]) {

        formData.append(
            'foto',
            pFoto.files[0]
        );

    }


    let url = '/admin/produk';
    let method = 'POST';


    if (editId) {

        url = `/admin/produk/${editId}`;

        /*
         * Laravel menerima PUT dari FormData
         * melalui method spoofing.
         */

        formData.append('_method', 'PUT');

    }


    try {

        const response = await fetch(url, {

            method: 'POST',

            headers: {

                'Accept': 'application/json',

                'X-CSRF-TOKEN': csrfToken

            },

            body: formData

        });


        const data = await response.json();


        if (!response.ok) {

            if (data.errors) {

                const firstError =
                    Object.values(data.errors)[0][0];

                throw new Error(firstError);

            }

            throw new Error(
                data.message ||
                'Produk gagal disimpan.'
            );

        }


        /*
         * Setelah berhasil,
         * reload halaman agar produk
         * langsung muncul.
         */

        location.reload();


    } catch (error) {

        produkMsg.textContent =
            error.message;

        produkMsg.style.display =
            'block';

    }

}


/* =========================
   HAPUS
========================= */

function openDeleteProduk(id, nama) {

    deleteId = id;

    document.getElementById(
        'deleteProdukText'
    ).textContent =
        `Yakin ingin menghapus produk "${nama}"?`;

    deleteProdukModal.classList.add('show');

}


function closeDeleteProduk() {

    deleteProdukModal.classList.remove('show');

}


async function deleteProduk() {

    try {

        const response = await fetch(
            `/admin/produk/${deleteId}`,
            {

                method: 'DELETE',

                headers: {

                    'Accept': 'application/json',

                    'X-CSRF-TOKEN': csrfToken

                }

            }
        );


        const data =
            await response.json();


        if (!response.ok) {

            throw new Error(
                data.message ||
                'Produk tidak dapat dihapus.'
            );

        }


        location.reload();


    } catch (error) {

        document.getElementById(
            'deleteProdukText'
        ).textContent =
            error.message;

    }

}


/* =========================
   SEARCH
========================= */

function filterProduk() {

    const query =
        document
            .getElementById('searchProduk')
            .value
            .toLowerCase()
            .trim();


    document
        .querySelectorAll('#produkGrid .produk-card')
        .forEach(card => {

            const name =
                card.dataset.name || '';

            card.style.display =
                name.includes(query)
                    ? ''
                    : 'none';

        });

}

</script>

</div><?php /**PATH C:\Users\apiip\OneDrive\Documents\umkm-gorengan\resources\views/admin/produk.blade.php ENDPATH**/ ?>