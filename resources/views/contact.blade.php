@extends('layout.app')
@section('seo')
    @include('partials.seo', ['data' => $seo])
@endsection
@section('inhead')
@endsection

@section('content')
<section>
    <div class="container p-0 position-relative">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.387479372109!2d106.68106557595848!3d-6.212519660853738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f984c0bb6d39%3A0x4cf80e7d63d1336c!2sPT.%20Liftco%20indo%20perkasa!5e0!3m2!1sen!2sid!4v1701876453795!5m2!1sen!2sid" class="w-100" style="aspect-ratio:16/9;border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="d-none d-lg-block position-absolute bottom-0 start-0 ms-4 bg-white p-4">
            <h3>Kantor Jakarta</h3>
            <div class="d-flex align-items-end" style="max-width: 35em">
                <div style="max-width: 50%">
                    <p>PT Liftco Indo Perkasa
                        Jalan KH. Hasyim Ashari
                        Kav. DPR C 260-261,
                        RT.003/RW.004,
                        Nerogtog, Kec. Pinang,
                        Kota Tangerang,
                        Banten 15145</p>
                    <p><strong>Telp:</strong><br />
                        021 – 29672215<br />
                        021 – 29672219</p>
                </div>
                <div class="text-liftco">
                    <p><strong>Whatsapp:</strong><br />
                        081234567890</p>
                    <p>
                        <strong>Jam Kerja:</strong><br />
                        Senin – Jumat : 9:00-17:00
                    </p>
                    <p>
                        <strong>Email:</strong><br />
                        marketing@liftco.co.id</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container p-0">
        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="bg-liftco text-white p-5 h-100">
                    <div class="text-center my-5">
                        <span class="iconify" data-width="150" data-icon="fa-solid:mail-bulk"></span>
                    </div>
                    <h1 class="mb-5">Bagaimana Pesan
                        Kami
                        Dapat
                        Membantu
                        Meringankan
                        Pekerjaan
                        Anda</h1>
                    <h2>Hubungi
                        Kami
                        Sekarang
                        </h2>
                </div>
            </div>
            <div class="col-12 col-lg-7 p-5">
                <form action="" class="mb-5">
                    <div class="mb-3">
                        <label for="name" class="mb-1">Nama</label>
                        <input type="text" name="name" placeholder="Nama Lengkap Anda" class="form-control bg-light">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="mb-1">Email</label>
                        <input type="email" name="email" placeholder="Nama Lengkap Anda" class="form-control bg-light">
                    </div>
                    <div class="mb-3">
                        <label for="no" class="mb-1">No Hp / Whatsapp</label>
                        <input type="tel" name="no" placeholder="Nomor HP atau Whatsapp" class="form-control bg-light">
                    </div>
                    <div class="mb-3">
                        <label for="messages" class="mb-1">Pesan</label>
                        <textarea name="messages" rows="10" cols="10" class="form-control bg-light"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger rounded-0 bg-liftco text-white p-2 px-3">Kirim</button>
                    </div>
                </form>
                <a href="" class="block">
                    <img src="/src/image/banner2.jpg" alt="Banner Contact" class="block w-100 rounded-2">
                </a>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container p-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <h3>Kantor Jakarta</h3>
                <p>Jalan KH. Hasyim Ashari
                    Kav. DPR C 260-261,
                    RT.003/RW.004,
                    Nerogtog, Kec. Pinang,
                    Kota Tangerang,
                    Banten 15145
                </p>
                <p>
                    <strong>Telp:</strong><br/>
                    021 – 29672215, 021 – 29672219
                </p>
                <p>
                    <strong>Whatsapp:</strong><br/>
                    081234567890
                </p>
                <p>
                    <strong>Jam Kerja</strong><br/>
                    Senin – Jumat : 9:00-17:00
                </p>
                <p>
                    <strong>Email</strong><br/>
                    marketing@liftco.co.id    
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <h3>Kantor Semarang</h3>
                <p>Jalan KH. Hasyim Ashari
                    Kav. DPR C 260-261,
                    RT.003/RW.004,
                    Nerogtog, Kec. Pinang,
                    Kota Tangerang,
                    Banten 15145
                </p>
                <p>
                    <strong>Telp:</strong><br/>
                    021 – 29672215, 021 – 29672219
                </p>
                <p>
                    <strong>Whatsapp:</strong><br/>
                    081234567890
                </p>
                <p>
                    <strong>Jam Kerja</strong><br/>
                    Senin – Jumat : 9:00-17:00
                </p>
                <p>
                    <strong>Email</strong><br/>
                    marketing@liftco.co.id    
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <h3>Kantor Surabaya</h3>
                <p>Jalan KH. Hasyim Ashari
                    Kav. DPR C 260-261,
                    RT.003/RW.004,
                    Nerogtog, Kec. Pinang,
                    Kota Tangerang,
                    Banten 15145
                </p>
                <p>
                    <strong>Telp:</strong><br/>
                    021 – 29672215, 021 – 29672219
                </p>
                <p>
                    <strong>Whatsapp:</strong><br/>
                    081234567890
                </p>
                <p>
                    <strong>Jam Kerja</strong><br/>
                    Senin – Jumat : 9:00-17:00
                </p>
                <p>
                    <strong>Email</strong><br/>
                    marketing@liftco.co.id    
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('beforebody')
@endsection