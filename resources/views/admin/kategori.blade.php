<style>
    .kategori-page {
        width: 100%;
    }

    .kategori-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 28px;
    }

    .kategori-title {
        margin: 0;
        font-size: 32px;
        font-weight: 700;
        color: #292524;
    }

    .kategori-subtitle {
        margin: 8px 0 0;
        color: #a8a29e;
        font-size: 14px;
    }

    .btn-tambah {
        border: 0;
        background: #f97316;
        color: white;
        padding: 13px 20px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-tambah:hover {
        background: #ea580c;
    }

    /* SUMMARY */

    .kategori-summary {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
        margin-bottom: 22px;
    }

    .summary-card {
        background: white;
        border: 1px solid #f3e8dd;
        border-radius: 18px;
        padding: 24px;
    }

    .summary-label {
        color: #a8a29e;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .summary-number {
        margin-top: 8px;
        font-size: 32px;
        font-weight: 800;
        color: #292524;
    }

    .summary-info {
        margin-top: 5px;
        color: #22c55e;
        font-size: 12px;
    }

    /* CONTAINER */

    .kategori-container {
        background: white;
        border: 1px solid #f3e8dd;
        border-radius: 18px;
        padding: 26px;
    }

    .kategori-container-header {
        margin-bottom: 22px;
    }

    .kategori-container-title {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #292524;
    }

    .kategori-container-info {
        margin-top: 6px;
        color: #a8a29e;
        font-size: 13px;
    }

    /* GRID */

    .kategori-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .kategori-card {
        border: 1px solid #f3e8dd;
        border-radius: 16px;
        padding: 20px;
        transition: .2s;
    }

    .kategori-card:hover {
        border-color: #fdba74;
        box-shadow: 0 8px 20px rgba(249, 115, 22, .08);
    }

    .kategori-card-top {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .kategori-icon {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        background: #fff7ed;
        color: #f97316;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 800;
    }

    .kategori-card-name {
        font-size: 16px;
        font-weight: 700;
        color: #292524;
    }

    .kategori-card-description {
        margin-top: 4px;
        font-size: 12px;
        color: #a8a29e;
    }

    .kategori-line {
        height: 1px;
        background: #f5ede5;
        margin: 18px 0;
    }

    .kategori-card-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .jumlah-produk {
        font-size: 12px;
        color: #78716c;
    }

    .jumlah-produk strong {
        color: #f97316;
        font-size: 15px;
    }

    .kategori-actions {
        display: flex;
        gap: 8px;
    }

    .btn-edit,
    .btn-hapus {
        border: 0;
        padding: 8px 12px;
        border-radius: 9px;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-edit {
        background: #fff7ed;
        color: #ea580c;
    }

    .btn-edit:hover {
        background: #ffedd5;
    }

    .btn-hapus {
        background: #fef2f2;
        color: #dc2626;
    }

    .btn-hapus:hover {
        background: #fee2e2;
    }

    /* EMPTY */

    .kategori-kosong {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        border: 1px dashed #eadfd4;
        border-radius: 15px;
        color: #a8a29e;
    }

    .kategori-kosong strong {
        display: block;
        color: #292524;
        font-size: 17px;
        margin-bottom: 7px;
    }

    /* MODAL */

    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(41, 37, 36, .45);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        z-index: 9999;
    }

    .modal-overlay.show {
        display: flex;
    }

    .kategori-modal {
        width: 100%;
        max-width: 560px;
        max-height: 90vh;
        overflow-y: auto;
        background: white;
        border-radius: 20px;
        padding: 28px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, .18);
    }

    .modal-title {
        margin: 0;
        font-size: 22px;
        color: #292524;
    }

    .modal-subtitle {
        margin: 7px 0 24px;
        color: #a8a29e;
        font-size: 13px;
        line-height: 1.5;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 700;
        color: #44403c;
    }

    .form-input,
    .form-textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #e7ddd4;
        border-radius: 11px;
        padding: 12px 13px;
        font-size: 13px;
        outline: none;
        font-family: inherit;
    }

    .form-input:focus,
    .form-textarea:focus {
        border-color: #f97316;
    }

    .form-textarea {
        min-height: 80px;
        resize: vertical;
    }

    /* PRODUK CHECKBOX */

    .produk-pilihan {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        max-height: 260px;
        overflow-y: auto;
        padding-right: 3px;
    }

    .produk-check {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px;
        border: 1px solid #eee4dc;
        border-radius: 11px;
        cursor: pointer;
        transition: .2s;
    }

    .produk-check:hover {
        background: #fffaf5;
        border-color: #fdba74;
    }

    .produk-check input {
        width: 17px;
        height: 17px;
        accent-color: #f97316;
        cursor: pointer;
    }

    .produk-check span {
        font-size: 13px;
        color: #44403c;
    }

    .produk-count {
        margin-top: 8px;
        color: #f97316;
        font-size: 12px;
        font-weight: 700;
    }

    /* ERROR */

    .modal-error {
        display: none;
        margin-top: 12px;
        padding: 11px 13px;
        background: #fef2f2;
        color: #dc2626;
        border-radius: 10px;
        font-size: 12px;
    }

    /* ACTION */

    .modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 24px;
    }

    .btn-batal,
    .btn-simpan {
        border: 0;
        padding: 11px 17px;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-batal {
        background: #f5f5f4;
        color: #57534e;
    }

    .btn-simpan {
        background: #f97316;
        color: white;
    }

    .btn-simpan:hover {
        background: #ea580c;
    }

    @media (max-width: 800px) {

        .kategori-summary {
            grid-template-columns: 1fr;
        }

        .kategori-grid {
            grid-template-columns: 1fr;
        }

    }

    @media (max-width: 600px) {

        .kategori-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .produk-pilihan {
            grid-template-columns: 1fr;
        }

        .kategori-card-bottom {
            flex-direction: column;
            align-items: flex-start;
        }

    }
</style>


<div class="kategori-page">

    {{-- HEADER --}}

    <div class="kategori-header">

        <div>

            <h1 class="kategori-title">
                Kategori
            </h1>


        </div>


        <button
            type="button"
            class="btn-tambah"
            onclick="bukaModalKategori()"
        >
            Tambah Kategori
        </button>

    </div>


    {{-- SUMMARY --}}

    <div class="kategori-summary">

        <div class="summary-card">

            <div class="summary-label">
                Total Kategori
            </div>

            <div class="summary-number">
                {{ $kategoris->count() }}
            </div>


        </div>


        <div class="summary-card">

            <div class="summary-label">
                Total Produk
            </div>

            <div class="summary-number">
                {{ $produks->count() }}
            </div>


        </div>

    </div>


    {{-- DAFTAR KATEGORI --}}

    <div class="kategori-container">

        <div class="kategori-container-header">

            <h2 class="kategori-container-title">
                Daftar Kategori
            </h2>

            <div class="kategori-container-info">
                Pilih produk yang masuk ke dalam masing-masing kategori.
            </div>

        </div>


        <div class="kategori-grid">

            @forelse ($kategoris as $kategori)

                <div class="kategori-card">

                    <div class="kategori-card-top">

                        <div class="kategori-icon">
                            {{ strtoupper(substr($kategori->nama, 0, 1)) }}
                        </div>


                        <div>

                            <div class="kategori-card-name">
                                {{ $kategori->nama }}
                            </div>

                            <div class="kategori-card-description">
                                {{ $kategori->deskripsi ?? 'Kategori gorengan.' }}
                            </div>

                        </div>

                    </div>


                    <div class="kategori-line"></div>


                    <div class="kategori-card-bottom">

                        <div class="jumlah-produk">

                            <strong>
                                {{ $kategori->produks_count ?? 0 }}
                            </strong>

                            produk

                        </div>


                        <div class="kategori-actions">

                            <button
                                type="button"
                                class="btn-edit"
                                onclick="editKategori(
                                    {{ $kategori->id }},
                                    @js($kategori->nama),
                                    @js($kategori->deskripsi),
                                    @js($kategori->produks->pluck('id')->values())
                                )"
                            >
                                Edit
                            </button>


                            <button
                                type="button"
                                class="btn-hapus"
                                onclick="hapusKategori(
                                    {{ $kategori->id }},
                                    @js($kategori->nama)
                                )"
                            >
                                Hapus
                            </button>

                        </div>

                    </div>

                </div>

            @empty

                <div class="kategori-kosong">

                    <strong>
                        Belum ada kategori
                    </strong>

                    Klik <b>+ Tambah Kategori</b> untuk membuat kategori
                    seperti Asin atau Manis.

                </div>

            @endforelse

        </div>

    </div>

</div>


{{-- =====================================================
     MODAL TAMBAH / EDIT KATEGORI
===================================================== --}}

<div
    id="modalKategori"
    class="modal-overlay"
    onclick="tutupModalKategori(event)"
>

    <div
        class="kategori-modal"
        onclick="event.stopPropagation()"
    >

        <h2
            id="modalTitle"
            class="modal-title"
        >
            Tambah Kategori
        </h2>


        <p class="modal-subtitle">
            Masukkan nama kategori kemudian pilih produk yang termasuk
            ke dalam kategori tersebut.
        </p>


        <form
            id="formKategori"
            onsubmit="simpanKategori(event)"
        >

            <input
                type="hidden"
                id="kategoriId"
            >


            {{-- NAMA KATEGORI --}}

            <div class="form-group">

                <label class="form-label">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    id="namaKategori"
                    class="form-input"
                    placeholder="Contoh: Asin"
                    autocomplete="off"
                    required
                >

            </div>


            {{-- DESKRIPSI --}}

            <div class="form-group">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    id="deskripsiKategori"
                    class="form-textarea"
                    placeholder="Contoh: Gorengan dengan rasa asin dan gurih."
                ></textarea>

            </div>


            {{-- PRODUK --}}

            <div class="form-group">

                <label class="form-label">
                    Pilih Produk
                </label>


                <div class="produk-pilihan">

                    @forelse ($produks as $produk)

                        <label class="produk-check">

                            <input
                                type="checkbox"
                                name="produk_ids[]"
                                value="{{ $produk->id }}"
                                onchange="hitungProduk()"
                            >

                            <span>
                                {{ $produk->nama }}
                            </span>

                        </label>

                    @empty

                        <div style="
                            grid-column: 1 / -1;
                            padding: 18px;
                            border: 1px dashed #eadfd4;
                            border-radius: 10px;
                            color: #a8a29e;
                            font-size: 12px;
                            text-align: center;
                        ">
                            Belum ada produk.
                            Tambahkan produk terlebih dahulu di menu Produk.
                        </div>

                    @endforelse

                </div>


                <div
                    id="produkCount"
                    class="produk-count"
                >
                    0 produk dipilih
                </div>

            </div>


            <div
                id="modalError"
                class="modal-error"
            ></div>


            <div class="modal-actions">

                <button
                    type="button"
                    class="btn-batal"
                    onclick="tutupModalKategori()"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="btn-simpan"
                >
                    Simpan Kategori
                </button>

            </div>

        </form>

    </div>

</div>


<script>

    function bukaModalKategori() {

        document.getElementById('modalTitle').innerText =
            'Tambah Kategori';

        document.getElementById('kategoriId').value = '';

        document.getElementById('namaKategori').value = '';

        document.getElementById('deskripsiKategori').value = '';

        document.getElementById('modalError').style.display = 'none';

        document
            .querySelectorAll('#formKategori input[type="checkbox"]')
            .forEach(function (checkbox) {

                checkbox.checked = false;

            });

        hitungProduk();

        document
            .getElementById('modalKategori')
            .classList.add('show');

        setTimeout(function () {

            document
                .getElementById('namaKategori')
                .focus();

        }, 100);

    }


    function tutupModalKategori(event = null) {

        if (
            event &&
            event.target &&
            event.target.id !== 'modalKategori'
        ) {
            return;
        }

        document
            .getElementById('modalKategori')
            .classList.remove('show');

    }


    function hitungProduk() {

        const jumlah =
            document.querySelectorAll(
                '#formKategori input[name="produk_ids[]"]:checked'
            ).length;

        document.getElementById('produkCount').innerText =
            jumlah + ' produk dipilih';

    }


    function editKategori(id, nama, deskripsi, produkIds = []) {

        document.getElementById('modalTitle').innerText =
            'Edit Kategori';

        document.getElementById('kategoriId').value =
            id;

        document.getElementById('namaKategori').value =
            nama;

        document.getElementById('deskripsiKategori').value =
            deskripsi || '';

        document.getElementById('modalError').style.display =
            'none';

        document.querySelectorAll('#formKategori input[name="produk_ids[]"]').forEach(function (checkbox) {
            checkbox.checked = produkIds.map(String).includes(String(checkbox.value));
        });
        hitungProduk();

        document
            .getElementById('modalKategori')
            .classList.add('show');

        document
            .getElementById('namaKategori')
            .focus();

    }


    async function simpanKategori(event) {

        event.preventDefault();


        const id =
            document.getElementById('kategoriId').value;

        const nama =
            document
                .getElementById('namaKategori')
                .value
                .trim();

        const deskripsi =
            document
                .getElementById('deskripsiKategori')
                .value
                .trim();

        const errorBox =
            document.getElementById('modalError');


        const produkIds =
            Array.from(
                document.querySelectorAll(
                    '#formKategori input[name="produk_ids[]"]:checked'
                )
            ).map(function (checkbox) {

                return checkbox.value;

            });


        if (!nama) {

            errorBox.innerText =
                'Nama kategori wajib diisi.';

            errorBox.style.display =
                'block';

            return;

        }


        try {

            const url = id
                ? `/kategori/${id}`
                : `/kategori`;


            const response =
                await fetch(url, {

                    method: id ? 'PUT' : 'POST',

                    headers: {

                        'Content-Type':
                            'application/json',

                        'Accept':
                            'application/json',

                        'X-CSRF-TOKEN':
                            '{{ csrf_token() }}'

                    },

                    body: JSON.stringify({

                        nama: nama,

                        deskripsi: deskripsi,

                        produk_ids: produkIds

                    })

                });


            const data =
                await response.json();


            if (!response.ok) {

                throw new Error(
                    data.message ||
                    'Kategori gagal disimpan.'
                );

            }


            window.location.reload();

        }


        catch (error) {

            console.error(error);

            errorBox.innerText =
                error.message;

            errorBox.style.display =
                'block';

        }

    }


    async function hapusKategori(id, nama) {

        const yakin =
            confirm(
                'Hapus kategori "' +
                nama +
                '"?'
            );


        if (!yakin) {
            return;
        }


        try {

            const response =
                await fetch(
                    `/kategori/${id}`,
                    {

                        method: 'DELETE',

                        headers: {

                            'Accept':
                                'application/json',

                            'X-CSRF-TOKEN':
                                '{{ csrf_token() }}'

                        }

                    }
                );


            const data =
                await response.json();


            if (!response.ok) {

                throw new Error(
                    data.message ||
                    'Kategori gagal dihapus.'
                );

            }


            window.location.reload();

        }


        catch (error) {

            console.error(error);

            document.getElementById('confirmTitle').innerText = 'Tidak dapat menghapus';
            document.getElementById('confirmText').innerText = error.message;
            document.getElementById('confirmModal').classList.add('show');

        }

    }


    document.addEventListener(
        'keydown',
        function(event) {

            if (event.key === 'Escape') {

                tutupModalKategori();

            }

        }
    );

</script>