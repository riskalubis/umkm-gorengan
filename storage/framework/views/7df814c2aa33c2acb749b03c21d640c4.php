<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GorenganKu</title>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<style>
*{box-sizing:border-box}

body{
    margin:0;
    font-family:Arial,Helvetica,sans-serif;
    background:#fffaf5;
    color:#292524;
}

.wrap{
    max-width:1150px;
    margin:auto;
    padding:25px 25px 80px;
}

/* NAVBAR */
.nav{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:8px 0 25px;
}

.brand{
    display:flex;
    align-items:center;
    gap:12px;
}

.brand-icon{
    width:48px;
    height:48px;
    border-radius:15px;
    background:#fff0df;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
}

.brand b{
    font-size:22px;
}

.brand small{
    display:block;
    color:#a8a29e;
    margin-top:4px;
}

.cart-btn{
    border:0;
    background:#f97316;
    color:white;
    padding:13px 18px;
    border-radius:12px;
    font-weight:700;
    cursor:pointer;
}

.cart-btn:hover{
    background:#ea580c;
}

/* HERO */
.hero{
    background:linear-gradient(135deg,#fff 0%,#fff7ed 100%);
    border:1px solid #f0e5dc;
    border-radius:25px;
    padding:45px;
    margin-bottom:35px;
}

.hero h1{
    margin:0;
    font-size:40px;
    max-width:650px;
    line-height:1.15;
}

.hero p{
    color:#78716c;
    max-width:650px;
    line-height:1.7;
    margin-top:15px;
}

/* SECTION */
.section-title{
    margin:35px 0 18px;
}

.section-title h2{
    margin:0;
    font-size:25px;
}

.section-title p{
    color:#a8a29e;
    font-size:13px;
    margin-top:5px;
}

/* PRODUCT GRID */
.grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
}

.card{
    background:white;
    border:1px solid #f0e5dc;
    border-radius:20px;
    padding:15px;
    transition:.2s;
}

.card:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(80,50,30,.08);
}

.product-img{
    width:100%;
    height:180px;
    border-radius:15px;
    overflow:hidden;
    background:#fff7ed;
    display:flex;
    align-items:center;
    justify-content:center;
}

.product-img img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.product-img .emoji{
    font-size:55px;
}

.product-name{
    font-size:17px;
    font-weight:800;
    margin-top:15px;
}

.product-desc{
    color:#a8a29e;
    font-size:12px;
    line-height:1.5;
    margin-top:6px;
    min-height:38px;
}

.price{
    color:#f97316;
    font-size:18px;
    font-weight:800;
    margin-top:12px;
}

.stock{
    font-size:12px;
    color:#78716c;
    margin-top:6px;
}

/* QUANTITY */
.qty-box{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-top:14px;
    background:#faf7f4;
    border:1px solid #eee5de;
    border-radius:11px;
    padding:5px;
}

.qty-btn{
    width:34px;
    height:34px;
    border:0;
    border-radius:8px;
    background:white;
    color:#f97316;
    font-size:20px;
    font-weight:700;
    cursor:pointer;
}

.qty-number{
    font-weight:700;
    min-width:30px;
    text-align:center;
}

.add-btn{
    width:100%;
    border:0;
    background:#f97316;
    color:white;
    padding:12px;
    border-radius:11px;
    margin-top:12px;
    font-weight:700;
    cursor:pointer;
}

.add-btn:hover{
    background:#ea580c;
}

/* CHECK ORDER */
.check-section{
    margin-top:50px;
}

.check-box{
    background:white;
    border:1px solid #f0e5dc;
    border-radius:20px;
    padding:20px;
    max-width:480px;
}

.field{
    margin-top:14px;
}

.field label{
    display:block;
    font-size:12px;
    font-weight:700;
    margin-bottom:7px;
}

.field input,
.field textarea{
    width:100%;
    padding:12px;
    border:1px solid #e7ddd4;
    border-radius:10px;
    font-family:inherit;
    outline:none;
}

.field input:focus,
.field textarea:focus{
    border-color:#f97316;
}

.primary{
    border:0;
    background:#f97316;
    color:white;
    padding:12px 18px;
    border-radius:11px;
    font-weight:700;
    cursor:pointer;
    margin-top:12px;
}

.order-status{
    margin-top:15px;
    padding:15px;
    border-radius:12px;
    background:#fff7ed;
    border:1px solid #fed7aa;
}

/* MODAL */
.modal{
    position:fixed;
    inset:0;
    background:rgba(41,37,36,.5);
    display:none;
    align-items:center;
    justify-content:center;
    padding:20px;
    z-index:999;
}

.modal.show{
    display:flex;
}

.modal-box{
    width:min(550px,100%);
    max-height:90vh;
    overflow:auto;
    background:white;
    border-radius:22px;
    padding:25px;
}

.modal-box h2{
    margin:0 0 5px;
}

.muted{
    color:#a8a29e;
    font-size:13px;
}

.cart-item{
    display:flex;
    justify-content:space-between;
    gap:15px;
    padding:13px 0;
    border-bottom:1px solid #f3e8dd;
}

.cart-item-name{
    font-weight:700;
}

.cart-item-small{
    color:#a8a29e;
    font-size:12px;
    margin-top:4px;
}

.total{
    display:flex;
    justify-content:space-between;
    padding:15px 0;
    font-size:18px;
    font-weight:800;
}

.actions{
    display:flex;
    justify-content:flex-end;
    gap:10px;
    margin-top:20px;
}

.secondary{
    border:0;
    background:#f5f5f4;
    padding:12px 16px;
    border-radius:10px;
    cursor:pointer;
}

.error{
    display:none;
    background:#fef2f2;
    color:#dc2626;
    padding:11px;
    border-radius:10px;
    margin-top:12px;
    font-size:12px;
}

/* RESPONSIVE */
@media(max-width:900px){
    .grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:550px){
    .wrap{
        padding:18px 15px 60px;
    }

    .hero{
        padding:28px 22px;
    }

    .hero h1{
        font-size:30px;
    }

    .grid{
        grid-template-columns:1fr;
    }

    .nav{
        gap:10px;
    }

    .brand b{
        font-size:18px;
    }
}

.footer{
    margin-top:60px;
    padding:35px 30px 15px;
    background:#f97316;
    color:#fff;
    border-radius:24px 24px 0 0;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:25px;
    flex-wrap:wrap;
}

.footer-brand{
    font-weight:800;
    font-size:20px;
}

.footer-brand span{
    color:#fff7ed;
}

.footer-info{
    color:#fff7ed;
    font-size:12px;
    line-height:1.8;
}

.footer-info b{
    color:#fff;
}

.footer-social{
    display:flex;
    gap:9px;
}

.footer-social a{
    width:38px;
    height:38px;
    border-radius:11px;
    background:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    color:#f97316;
    font-weight:800;
    transition:.2s;
}

.footer-social a:hover{
    transform:translateY(-2px);
    background:#fff7ed;
}

.footer-bottom{
    width:100%;
    text-align:center;
    color:#ffedd5;
    font-size:11px;
    padding-top:18px;
    border-top:1px solid rgba(255,255,255,.25);
}

.toast {
    position: fixed;
    top: 25px;
    right: 25px;
    background: #fff;
    border: 1px solid #fed7aa;
    border-left: 5px solid #f97316;
    border-radius: 14px;
    padding: 15px 18px;
    box-shadow: 0 8px 25px rgba(0,0,0,.12);
    z-index: 99999;
    display: none;
    min-width: 280px;
    animation: toastIn .3s ease;
}

.toast.show {
    display: block;
}

.toast-title {
    font-weight: 800;
    color: #292524;
    margin-bottom: 4px;
}

.toast-text {
    font-size: 13px;
    color: #78716c;
}

@keyframes toastIn {
    from {
        opacity: 0;
        transform: translateY(-15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>
</head>

<body>

<div id="toast" class="toast">
    <div class="toast-title">✓ Berhasil ditambahkan</div>
    <div id="toastText" class="toast-text"></div>
</div>

<div class="wrap">

<!-- NAVBAR -->
<nav class="nav">

    <div class="brand">
        <div class="brand-icon">🥟</div>

        <div>
            <b>GorenganKu</b>
            <small>Pesan gorengan hari ini</small>
        </div>
    </div>

    <button class="cart-btn" onclick="openCart()">
        Keranjang
        <span id="cartCount">0</span>
    </button>

</nav>


<!-- HERO -->
<section class="hero">
    <h1>
        Gorengan hangat, siap menemani harimu.
    </h1>
    <p>
        Lihat & Pesan GorenganKu hari ini!
    </p>
</section>

<style>
.hero h1{
    white-space:nowrap;
    font-size:48px;
}

@media(max-width:800px){
    .hero h1{
        white-space:normal;
        font-size:36px;
    }
}
</style>

<!-- PRODUK -->
<div class="section-title">

    <h2>Gorengan Hari Ini</h2>

    <p>
        Pilih produk yang ingin kamu pesan.
    </p>

</div>


<div class="grid">

<?php $__empty_1 = true; $__currentLoopData = $persediaans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

<div class="card"
     data-id="<?php echo e($inv->produk->id); ?>"
     data-name="<?php echo e($inv->produk->nama); ?>"
     data-price="<?php echo e($inv->produk->harga); ?>"
     data-stock="<?php echo e($inv->jumlah); ?>">

    <!-- FOTO -->
    <div class="product-img">

        <?php if($inv->produk->foto): ?>

            <img
                src="<?php echo e(asset('storage/'.$inv->produk->foto)); ?>"
                alt="<?php echo e($inv->produk->nama); ?>"
            >

        <?php else: ?>

            <div class="emoji">🥟</div>

        <?php endif; ?>

    </div>


    <!-- NAMA -->
    <div class="product-name">
        <?php echo e($inv->produk->nama); ?>

    </div>


    <!-- DESKRIPSI -->
    <div class="product-desc">
        <?php echo e($inv->produk->deskripsi ?? 'Gorengan hangat dan siap dinikmati.'); ?>

    </div>


    <!-- HARGA -->
    <div class="price">
        Rp<?php echo e(number_format($inv->produk->harga,0,',','.')); ?>

    </div>


    <!-- STOK -->
    <div class="stock">
        Tersedia <?php echo e($inv->jumlah); ?> pcs
    </div>


    <!-- JUMLAH -->
    <div class="qty-box">

        <button
            class="qty-btn"
            onclick="changeQty(<?php echo e($inv->produk->id); ?>,-1)"
        >
            −
        </button>

        <span
            class="qty-number"
            id="qty-<?php echo e($inv->produk->id); ?>"
        >
            0
        </span>

        <button
            class="qty-btn"
            onclick="changeQty(<?php echo e($inv->produk->id); ?>,1)"
        >
            +
        </button>

    </div>


    <!-- TAMBAH -->
    <button
    class="add-btn"
    onclick="addToCart(<?php echo e($inv->produk->id); ?>)"
>
    Tambah ke Keranjang
</button>

<div
    id="cart-message-<?php echo e($inv->produk->id); ?>"
    style="
        display:none;
        margin-top:10px;
        padding:9px 11px;
        border-radius:10px;
        background:#fff7ed;
        border:1px solid #fed7aa;
        color:#c2410c;
        font-size:11px;
        line-height:1.4;
    "
></div>

</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<div style="
    grid-column:1/-1;
    background:white;
    padding:45px;
    border:1px dashed #eadfd4;
    border-radius:18px;
    text-align:center;
    color:#a8a29e;
">

    <div style="font-size:45px;margin-bottom:10px">
        🥟
    </div>

    <b>Belum ada produk tersedia</b>

    <p style="font-size:13px">
        Admin belum membuka persediaan untuk hari ini.
    </p>

</div>

<?php endif; ?>

</div>


<!-- CEK PESANAN -->
<section class="check-section">

    <div class="section-title">
        <h2>Cek Pesanan</h2>
        <p>
            Masukkan nomor pesanan untuk melihat status pesananmu.
        </p>
    </div>

    <div class="check-box">

        <div class="field" style="margin-top:0">

            <label>Nomor Pesanan</label>

            <input
                id="kodeCek"
                placeholder="Contoh: ORD-AB12CD34"
            >

        </div>

        <button
            class="primary"
            onclick="cekPesanan()"
        >
            Cek Status Pesanan
        </button>

        <div id="statusBox"></div>

    </div>

    <footer class="footer">

    <div>
        <div class="footer-brand">
            Gorengan<span>Ku</span>
        </div>

        <div class="footer-info">
            Gorengan hangat, dibuat dengan rasa dan cinta. 
        </div>
    </div>

    <div class="footer-info">
        <b>Hubungi Kami</b><br>
        WhatsApp: 0831-2348-0908<br>
        Instagram: @gorenganku
    </div>

    

</footer>

</section>

</div>


<!-- MODAL KERANJANG -->
<div
    class="modal"
    id="modalCart"
    onclick="if(event.target===this)closeModal('modalCart')"
>

<div class="modal-box">

    <h2>Keranjang Pesanan</h2>

    <p class="muted">
        Periksa pesananmu sebelum checkout.
        Minimal pembelian Rp10.000.
    </p>

    <div id="cartList"></div>



    <div id="cartError" class="error"></div>


    <!-- DATA PELANGGAN -->
    <div class="field">

        <label>Nama</label>

        <input
            id="nama"
            placeholder="Nama kamu"
        >

    </div>


    <div class="field">

        <label>No. WhatsApp</label>

        <input
            id="wa"
            placeholder="08xxxxxxxxxx"
        >

    </div>


    <div class="field">

        <label>Alamat</label>

        <textarea
            id="alamat"
            rows="3"
            placeholder="Alamat pengantaran"
        ></textarea>

    </div>


    <div class="field">

        <label>Catatan</label>

        <textarea
            id="catatan"
            rows="2"
            placeholder="Contoh: jangan terlalu matang"
        ></textarea>

    </div>


    <div class="actions">

        <button
            class="secondary"
            onclick="closeModal('modalCart')"
        >
            Kembali
        </button>

        <button
            class="primary"
            onclick="checkout()"
        >
            Checkout
        </button>

    </div>

</div>

</div>


<!-- MODAL INFO -->
<div class="modal" id="modalInfo">

<div class="modal-box">

    <h2 id="infoTitle"></h2>

    <p
        class="muted"
        id="infoText"
    ></p>

    <div class="actions">

        <button
            class="primary"
            onclick="closeModal('modalInfo')"
        >
            Tutup
        </button>

    </div>

</div>

</div>


<script>

const cart = {};

const csrf =
document.querySelector(
    'meta[name="csrf-token"]'
).content;


const products = [
    ...document.querySelectorAll('.card[data-id]')
].map(c => ({
    id: +c.dataset.id,
    name: c.dataset.name,
    price: +c.dataset.price,
    stock: +c.dataset.stock
}));


/* =========================
   UBAH JUMLAH
========================= */

function changeQty(id, change){

    const product =
        products.find(p => p.id === id);

    if(!product) return;

    let current =
        cart[id] || 0;

    current += change;

    current =
        Math.max(
            0,
            Math.min(
                current,
                product.stock
            )
        );

    if(current === 0){

        delete cart[id];

    }else{

        cart[id] = current;

    }

    document.getElementById(
        'qty-'+id
    ).textContent = current;

    updateCartCount();
}


function addToCart(id){

    const product =
        products.find(p => p.id === id);

    if(!product) return;

    const qtyElement =
        document.getElementById('qty-' + id);

    const jumlah =
        Number(qtyElement?.textContent || 0);

    // HANYA jumlah 0 yang ditolak
    if(jumlah <= 0){

        const message =
            document.getElementById('cart-message-' + id);

        if(message){

            message.textContent =
                'Silakan tentukan jumlah terlebih dahulu.';

            message.style.display = 'block';

            setTimeout(() => {
                message.style.display = 'none';
            }, 2500);

        }

        return;
    }

    // Jumlah 1, 2, 3 dst tetap pakai notif lama
    cart[id] = jumlah;

    updateCartCount();

    const toast =
        document.getElementById('toast');

    const toastText =
        document.getElementById('toastText');

    toastText.textContent =
        product.name +
        ' berhasil ditambahkan ke keranjang.';

    toast.classList.add('show');

    setTimeout(() => {
        toast.classList.remove('show');
    }, 2500);
}

/* =========================
   JUMLAH KERANJANG
========================= */

function updateCartCount(){

    const count =
        Object.values(cart)
        .reduce((a,b) => a+b,0);

    document.getElementById(
        'cartCount'
    ).textContent = count;
}


/* =========================
   BUKA KERANJANG
========================= */

function openCart() {
    const items = products.filter(p => cart[p.id]);

    if (!items.length) {
        modal(
            'Keranjang masih kosong',
            'Silakan pilih gorengan terlebih dahulu.'
        );
        return;
    }

    let total = items.reduce(
        (s, p) => s + p.price * cart[p.id],
        0
    );

    document.getElementById('cartList').innerHTML =
        items.map(p => `
            <div style="
                display:flex;
                align-items:center;
                justify-content:space-between;
                gap:15px;
                padding:13px 0;
                border-bottom:1px solid #f5ede5;
            ">

                <div style="flex:1">
                    <b>${p.name}</b>
                    <div style="
                        color:#f97316;
                        font-size:13px;
                        margin-top:4px;
                    ">
                        Rp${p.price.toLocaleString('id-ID')} / pcs
                    </div>
                </div>

                <div style="
                    display:flex;
                    align-items:center;
                    gap:8px;
                ">

                    <button
                        type="button"
                        onclick="ubahJumlahKeranjang(${p.id}, -1)"
                        style="
                            width:32px;
                            height:32px;
                            border:0;
                            border-radius:8px;
                            background:#fff0df;
                            color:#f97316;
                            font-size:18px;
                            font-weight:bold;
                            cursor:pointer;
                        "
                    >−</button>

                    <span style="
                        min-width:25px;
                        text-align:center;
                        font-weight:800;
                    ">
                        ${cart[p.id]}
                    </span>

                    <button
                        type="button"
                        onclick="ubahJumlahKeranjang(${p.id}, 1)"
                        style="
                            width:32px;
                            height:32px;
                            border:0;
                            border-radius:8px;
                            background:#f97316;
                            color:white;
                            font-size:18px;
                            font-weight:bold;
                            cursor:pointer;
                        "
                    >+</button>

                </div>

                <b style="min-width:90px;text-align:right">
                    Rp${(p.price * cart[p.id]).toLocaleString('id-ID')}
                </b>

            </div>
        `).join('') +

        `
        <div style="
            display:flex;
            justify-content:space-between;
            padding-top:16px;
            font-size:16px;
            font-weight:800;
        ">
            <span>Total</span>
            <span style="color:#f97316">
                Rp${total.toLocaleString('id-ID')}
            </span>
        </div>
        `;

    document.getElementById('cartError').style.display =
        total < 10000 ? 'block' : 'none';

    document.getElementById('cartError').textContent =
        'Total belanja belum mencapai Rp10.000.';

    document.getElementById('modalCart').classList.add('show');
}
function ubahJumlahKeranjang(id, perubahan) {

    const product = products.find(p => p.id === id);

    if (!product) return;

    let jumlah = (cart[id] || 0) + perubahan;

    // Tidak boleh kurang dari 0
    if (jumlah <= 0) {
        delete cart[id];
    }
    // Tidak boleh melebihi stok
    else if (jumlah > product.stock) {

        const toast = document.getElementById('toast');
        const toastText = document.getElementById('toastText');

        toastText.textContent =
            'Stok ' + product.name + ' hanya tersedia ' +
            product.stock + ' pcs.';

        toast.classList.add('show');

        setTimeout(() => {
            toast.classList.remove('show');
        }, 2500);

        return;
    }
    else {
        cart[id] = jumlah;
    }

    // Update jumlah di tombol keranjang
    document.getElementById('cartCount').textContent =
        Object.values(cart).reduce((a, b) => a + b, 0);

    // Tampilkan ulang isi keranjang
    openCart();
}

/* =========================
   CHECKOUT
========================= */

async function checkout(){

    const items =
        products
        .filter(p => cart[p.id])
        .map(p => ({
            produk_id:p.id,
            jumlah:cart[p.id]
        }));


    let total = 0;


    items.forEach(item => {

        const p =
            products.find(
                x => x.id === item.produk_id
            );

        total +=
            p.price * item.jumlah;

    });


    if(total < 10000){

        document.getElementById(
            'cartError'
        ).style.display = 'block';

        document.getElementById(
            'cartError'
        ).textContent =
            'Minimal pembelian adalah Rp10.000.';

        return;
    }


    try{

        const res =
            await fetch(
                '<?php echo e(route('pelanggan.checkout')); ?>',
                {
                    method:'POST',

                    headers:{
                        'Content-Type':'application/json',
                        'Accept':'application/json',
                        'X-CSRF-TOKEN':csrf
                    },

                    body:JSON.stringify({

                        nama_pelanggan:
                            document.getElementById('nama').value,

                        whatsapp:
                            document.getElementById('wa').value,

                        alamat:
                            document.getElementById('alamat').value,

                        catatan:
                            document.getElementById('catatan').value,

                        items

                    })
                }
            );


        const data =
            await res.json();


        if(!res.ok){

            throw new Error(
                data.message ||
                'Pesanan gagal dibuat.'
            );

        }


        closeModal('modalCart');


        modal(
            'Pesanan Berhasil !',
            'Nomor pesanan kamu adalah ' +
            data.kode +
            '. Simpan nomor ini untuk mengecek status pesanan.'
        );


        Object.keys(cart)
        .forEach(k => delete cart[k]);


        products.forEach(p => {

            const el =
                document.getElementById(
                    'qty-'+p.id
                );

            if(el)
                el.textContent = 0;

        });


        updateCartCount();


    }catch(e){

        document.getElementById(
            'cartError'
        ).style.display = 'block';

        document.getElementById(
            'cartError'
        ).textContent =
            e.message;

    }

}


/* =========================
   MODAL INFO
========================= */

function modal(title,text){

    document.getElementById(
        'infoTitle'
    ).textContent = title;

    document.getElementById(
        'infoText'
    ).textContent = text;

    document.getElementById(
        'modalInfo'
    ).classList.add('show');

}


function closeModal(id){

    document.getElementById(
        id
    ).classList.remove('show');

}


/* =========================
   CEK PESANAN
========================= */

async function cekPesanan(){

    const kode =
        document.getElementById(
            'kodeCek'
        ).value.trim();


    if(!kode){

        modal(
            'Nomor pesanan belum diisi',
            'Masukkan nomor pesanan terlebih dahulu.'
        );

        return;
    }


    try{

        const r =
            await fetch(
                '/pesanan/' +
                encodeURIComponent(kode)
            );


        const d =
            await r.json();


        if(!r.ok){

            throw new Error(
                'Pesanan tidak ditemukan.'
            );

        }


        const labels = {

            menunggu:
                'Menunggu Konfirmasi',

            diterima:
                'Pesanan Diterima',

            digoreng:
                'Sedang Digoreng',

            diantar:
                'Sedang Diantar',

            selesai:
                'Pesanan Selesai',

            dibatalkan:
                'Pesanan Ditolak'

        };


        document.getElementById(
            'statusBox'
        ).innerHTML = `

            <div class="order-status">

                <b>${d.kode}</b>

                <br>

                ${labels[d.status]}

            </div>

        `;


    }catch(e){

        modal(
            'Pesanan tidak ditemukan',
            e.message
        );

    }

}


</script>

</body>
</html>
<?php /**PATH C:\Users\apiip\OneDrive\Documents\umkm-gorengan\resources\views/pelanggan/home.blade.php ENDPATH**/ ?>