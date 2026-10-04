<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - UMKM Gorengan</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f7f5f2;
            color: #292524;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: #29211d;
            color: white;
            padding: 25px 16px;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 35px;
            padding: 0 12px;
        }

        .brand small {
            display: block;
            font-size: 11px;
            color: #d6c5b9;
            margin-top: 5px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu-item {
            border: 0;
            background: transparent;
            color: #ddd5d0;
            padding: 13px 14px;
            border-radius: 10px;
            text-align: left;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
        }

        .menu-item:hover,
        .menu-item.active {
            background: #8b5e3c;
            color: white;
        }

        .main {
            margin-left: 240px;
            width: calc(100% - 240px);
            min-height: 100vh;
        }

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e7e1dc;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .topbar h2 {
            font-size: 20px;
        }

        .admin-label {
            font-size: 13px;
            color: #78716c;
        }

        #pageContent {
            padding: 30px;
        }

        .loading {
            background: white;
            border-radius: 16px;
            padding: 35px;
            text-align: center;
            color: #78716c;
        }

        @media(max-width: 800px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
                width: calc(100% - 190px);
            }

            #pageContent {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="admin-layout">

    <aside class="sidebar">

        <div class="brand">
            GorenganKu
            <small>Panel Admin</small>
        </div>

        <nav class="menu">

            <button type="button" class="menu-item active" data-page="home">
                Dashboard
            </button>

            <button type="button" class="menu-item" data-page="kategori">
                Kategori
            </button>

            <button type="button" class="menu-item" data-page="produk">
                Produk
            </button>

            <button type="button" class="menu-item" data-page="persediaan">
                Persediaan
            </button>

            <button type="button" class="menu-item" data-page="penjualan">
                Penjualan 
            </button>

            <button type="button" class="menu-item" data-page="laporan">
                Laporan
            </button>

            <form method="POST" action="{{ route('logout') }}" style="width:100%; margin-top:8px;">
    @csrf

    <button type="submit" class="menu-item">
        Keluar
    </button>
</form>

        </nav>

    </aside>

    <main class="main">

        <header class="topbar">
            <h2>Dashboard Admin</h2>

        </header>

        <section id="pageContent">

            <div class="loading">
                Memuat dashboard...
            </div>

        </section>

    </main>

</div>

<script>

const pageContent = document.getElementById('pageContent');
const menuItems = document.querySelectorAll('.menu-item[data-page]');


/*
|--------------------------------------------------------------------------
| Menjalankan script dari halaman yang dimuat
|--------------------------------------------------------------------------
*/
function executePageScripts(container) {

    const scripts = container.querySelectorAll('script');

    scripts.forEach(oldScript => {

        const newScript = document.createElement('script');

        // Kalau script punya src
        if (oldScript.src) {
            newScript.src = oldScript.src;
        }

        // Kalau script inline
        else {
            newScript.textContent = oldScript.textContent;
        }

        document.body.appendChild(newScript);

        // Hapus script lama dari pageContent
        oldScript.remove();
    });

}


/*
|--------------------------------------------------------------------------
| Load halaman
|--------------------------------------------------------------------------
*/
async function loadPage(page) {

    pageContent.innerHTML = `
        <div class="loading">
            Memuat halaman...
        </div>
    `;

    try {

        const res = await fetch('/admin/page/' + page, {

            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            }

        });


        if (!res.ok) {
            throw new Error('HTTP ' + res.status);
        }


        const html = await res.text();


        /*
        |--------------------------------------------------------------------------
        | Masukkan HTML halaman
        |--------------------------------------------------------------------------
        */
        pageContent.innerHTML = html;


        /*
        |--------------------------------------------------------------------------
        | PENTING
        | Jalankan JavaScript yang ada di halaman tersebut.
        | Ini yang membuat tombol "+ Tambah Produk"
        | bisa menjalankan openProduk().
        |--------------------------------------------------------------------------
        */
        executePageScripts(pageContent);


        /*
        |--------------------------------------------------------------------------
        | Tandai menu aktif
        |--------------------------------------------------------------------------
        */
        menuItems.forEach(item => {

            item.classList.toggle(
                'active',
                item.dataset.page === page
            );

        });


        /*
        |--------------------------------------------------------------------------
        | Kembali ke atas
        |--------------------------------------------------------------------------
        */
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });


    } catch (error) {

        console.error('Gagal memuat halaman:', error);


        pageContent.innerHTML = `
            <div class="loading">

                <h3>
                    Halaman gagal dimuat
                </h3>

                <p style="margin-top:8px;">
                    Terjadi kesalahan saat memuat halaman.
                </p>

                <p style="
                    margin-top:8px;
                    font-size:12px;
                    color:#dc2626;
                ">
                    ${error.message}
                </p>

            </div>
        `;

    }

}


/*
|--------------------------------------------------------------------------
| Klik menu sidebar
|--------------------------------------------------------------------------
*/
document.addEventListener('click', function(e) {

    const target = e.target.closest('.menu-item[data-page]');

    if (!target) {
        return;
    }

    e.preventDefault();

    loadPage(target.dataset.page);

});


/*
|--------------------------------------------------------------------------
| Load Dashboard pertama kali
|--------------------------------------------------------------------------
*/
loadPage('home');

</script>

</body>
</html>
