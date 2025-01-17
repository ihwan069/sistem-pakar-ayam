<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SISTEM PAKAR PENYAKIT AYAM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('elearning/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('elearning/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('elearning/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('elearning/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('elearning/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-tractor me-3"></i>EXChick.id</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="#top" class="nav-item nav-link">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="#penyakit" class="nav-item nav-link">Penyakit Ayam</a>
                <a href="#testimoni" class="nav-item nav-link">Pengguna</a>
                <a href="#contact" class="nav-item nav-link">Contact</a>
                <a href="{{ route ('login') }}" class="nav-item nav-link">Login</a>
            </div>
            <!-- Tombol untuk memicu modal -->
            <a href="#" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" data-bs-toggle="modal" data-bs-target="#myModal">
                Ayo Konsultasi<i class="fa fa-arrow-right ms-3"></i>
            </a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Modal -->
    <style>
        .btn-space {
            margin-right: 40px;
        }
    </style>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menu Konsultasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Isi modal berupa tombol tautan -->
                    <a href="{{ route ('consultation-dempster') }}" class="btn btn-primary btn-space">Dempster-Shafer</a>
                    <a href="{{ route ('expert-system-consultation') }}" class="btn btn-primary">Certainty Factor</a>
                    <!-- <a href="{{ route ('expert-system-consultation') }}" class="btn btn-primary">Certainty Factor + Dempster shafer</a> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel Start -->
    <section id="top">
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{asset('elearning/img/chickens-bisa.jpg')}}" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-sm-10 col-lg-8">
                                    <h5 class="text-primary mb-3 animated slideInDown">Sistem Pakar EXChick.id</h5>
                                    <h4 class="display-3 text-white animated slideInDown">Ternak Lebih Mudah Dengan EXChick.id</h4>
                                    <p class="fs-5 text-white mb-4 pb-2"><span class="fs-5 text-primary mb-4 pb-2">EXChick.id</span> adalah platform yang bergerak di bidang teknologi peternakan Ayam. Kami menyediakan aplikasi diagnosa penyakit yang terjangkit pada ayam ternak anda dan terintegrasi guna membantu peternak meningkatkan produktivitas dan efisiensi usahanya.</p>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Selengkapnya</a>
                                    <a href="{{ route ('login') }}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Login Pengguna</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{asset('elearning/img/veterinarian1.jpg')}}" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-sm-10 col-lg-8">
                                    <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Perawatan Ayam Ternak</h5>
                                    <h1 class="display-3 text-white animated slideInDown">Pentingnya Perawatan Ayam ternak yang Baik</h1>
                                    <p class="fs-5 text-white mb-4 pb-2">Ayam merupakan hewan ternak yang paling banyak dipelihara di Indonesia. Untuk menjaga kesehatan ayam ternak Anda,
                                        penting untuk memahami perawatan hewan ternak yang baik. Di <b>EXChick</b>, kami memberikan tips dan saran tentang perawatan ayam ternak yang tepat.
                                        Mulai dari menjaga kualitas hewan ternak yang sehat.
                                        Pelajari lebih lanjut tentang pentingnya perawatan ayam ternak dan bagaimana Anda dapat menjaga kesehatan ayam ternak anda dengan baik.</p>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Selengkapnya</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Konsultasi Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Carousel End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-poo text-primary mb-4"></i>
                            <h5 class="mb-3">Berak Kapur (Pullorum Disease)</h5>
                            <p>Penyakit yang disebabkan oleh bakteri Samonella pullorum dan berbagai bakteri dari tanah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-thermometer-three-quarters text-primary mb-4"></i>
                            <h5 class="mb-3">Flu Burung (Avian Influenza)</h5>
                            <p>Flu burung adalah salah satu jenis infeksi virus yang umumnya ditemukan pada unggas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-egg text-primary mb-4"></i>
                            <h5 class="mb-3">Produksi Telur (Egg Drop Syndrome 76)</h5>
                            <p>Penyebab virus Egg Drop Syndrome adalah sebuah virus yang bernama adenovirus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-feather text-primary mb-4"></i>
                            <h5 class="mb-3">Ayam Sempoyongan (Helicopter Disease)</h5>
                            <p>Penyakit penyebab gangguan pertumbuhan terutama pada ayam pedaging umur 1–6 minggu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- About Start -->
    <section id="about">
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="img-fluid position-absolute w-100 h-100" src="{{asset('elearning/img/reminiabout.png')}}" alt="" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <h6 class="section-title bg-white text-start text-primary pe-3">About Website </h6>
                        <h1 class="mb-4">Selamat datang di Website Sistem Pakar Penyakit Ayam Ternak (EXChick)</h1>
                        <p class="mb-4">Sumber informasi mengenai penyakit ayam ternak. Kami berkomitmen untuk memberikan pengetahuan dan pemahaman yang komprehensif tentang berbagai jenis penyakit ayam ternak.</p>
                        <p class="mb-4">Penyakit Ayam merupakan masalah bagi para peternak yang dapat memengaruhi nilai ekonomi dari kerugian yang akan terjadi. Dalam website ini, Anda akan menemukan informasi yang berguna mengenai penyakit ayam umum,
                            termasuk gejala, penyebab, faktor risiko, diagnosis, pengobatan, serta langkah-langkah pencegahan yang dapat diambil.</p>
                        <div class="row gy-2 gx-4 mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Penyakit Ayam ternak</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Diagnosis Penyakit</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Gejala Penyakit Ayam</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Pencegahan</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Pengobatan</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Tips Perawatan Ayam</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Referensi dan Sumber Informasi</p>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" data-bs-toggle="modal" data-bs-target="#myModal" href="#">Konsultasi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->

    <!-- Categories Start -->
    <section id="penyakit">
        <div class="container-xxl py-5 category">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Penyakit Ayam</h6>
                    <h1 class="mb-5">Penyakit Ayam</h1>
                </div>
                <div class="row g-3">
                    <div class="col-lg-7 col-md-6">
                        <div class="row g-3">
                            <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                                <a class="position-relative d-block overflow-hidden" href="{{asset('elearning/img/nd-tetelo.png')}}">
                                    <img class="img-fluid" src="{{asset('elearning/img/nd-tetelo.png')}}" alt="">
                                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                        <h5 class="m-0">Tetelo (Newcastle Disease)</h5>
                                        <small class="text-primary"></small>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                                <a class="position-relative d-block overflow-hidden" href="{{asset('elearning/img/p3.jpeg')}}">
                                    <img class="img-fluid" src="{{asset('elearning/img/p3.jpeg')}}" alt="">
                                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                        <h5 class="m-0">Flu Burung (Avian Influenza)</h5>
                                        <small class="text-primary"></small>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                                <a class="position-relative d-block overflow-hidden" href="{{asset('elearning/img/p4.jpeg')}}">
                                    <img class="img-fluid" src="{{asset('elearning/img/p4.jpeg')}}" alt="">
                                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                        <h5 class="m-0">Snot (Coryza)</h5>
                                        <small class="text-primary"></small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                        <a class="position-relative d-block h-100 overflow-hidden" href="{{asset('elearning/img/ayam.png')}}">
                            <img class="img-fluid position-absolute w-100 h-100" src="{{asset('elearning/img/ayam.png')}}" alt="" style="object-fit: cover;">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                                <h5 class="m-0">Cacar Unggas (Fowl Fox)</h5>
                                <small class="text-primary"></small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Start -->
    <section id="testimoni">
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h6 class="section-title bg-white text-center text-primary px-3">Ulasan Pengguna</h6>
                    <h1 class="mb-5">Pendapat Pengguna Kami!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel position-relative">
                    <div class="testimonial-item text-center">
                        <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('elearning/img/testimonial-1.jpg')}}" style="width: 80px; height: 80px;">
                        <h5 class="mb-0">Hilmiwati</h5>
                        <p>Perternak Ayam Arab</p>
                        <div class="testimonial-text bg-light text-center p-4">
                            <p class="mb-0">Saya menemukan EXChick sangat membantu dalam memahami berbagai penyakit ayam ternak. Informasinya lengkap dan mudah dipahami. Sangat direkomendasikan!</p>
                        </div>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('elearning/img/testimonial-2.jpg')}}" style="width: 80px; height: 80px;">
                        <h5 class="mb-0">Humaidi Hamid</h5>
                        <p>Peternak Ayam Kampung</p>
                        <div class="testimonial-text bg-light text-center p-4">
                            <p class="mb-0">Saya ingin menyampaikan rasa terima kasih kepada tim di balik EXChick. Informasi yang disediakan di sini telah membantu saya dalam memahami kondisi mata saya dengan lebih baik dan membuat keputusan yang berdasar tentang pilihan pengobatan.</p>
                        </div>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('elearning/img/testimonial-3.jpg')}}" style="width: 80px; height: 80px;">
                        <h5 class="mb-0">Dr. Jamaludin, PKH</h5>
                        <p>Dokter Hewan Balai Karantina Pertanian I Mataram</p>
                        <div class="testimonial-text bg-light text-center p-4">
                            <p class="mb-0">Sebagai tenaga kesehatan, saya mengandalkan EXChick untuk informasi yang akurat dan terbaru tentang penyakit mata. Ini menjadi sumber utama saya dalam memahami dan menjelaskan kondisi mata kepada pasien.</p>
                        </div>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('elearning/img/testimonial-4.jpg')}}" style="width: 80px; height: 80px;">
                        <h5 class="mb-0">Mahyuni</h5>
                        <p>Peternak Ayam Pejantan</p>
                        <div class="testimonial-text bg-light text-center p-4">
                            <p class="mb-0">Saya sangat merekomendasikan EXChick kepada siapa pun yang mencari informasi yang dapat dipercaya tentang penyakit ayam. Kontennya disajikan dengan baik, dan tampilan website-nya juga user-friendly. Sumber daya yang luar biasa bagi siapa saja yang ingin memanfaatkan ayam mereka.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial End -->

    <!-- Contact Start -->
    <section id="contact">
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Kontak Kami</h6>
                    <h1 class="mb-5">Contact For Any Query</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h5>EXChick</h5>
                        <p class="mb-4">Website sistem pakar diagnosis penyakit ayam membantu pengguna mengidentifikasi dan mendiagnosis masalah kesehatan ayam ternak.
                            Pengguna memasukkan gejala, sistem memberikan diagnosis sementara. Tetap konsultasikan dengan dokter untuk diagnosis dan perawatan
                            yang akurat.</p>
                        <div class="d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                                <i class="fa fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="text-primary">Office</h5>
                                <p class="mb-0">Mataram, NTB</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="text-primary">Mobile</h5>
                                <p class="mb-0">+6287708284384</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                                <i class="fa fa-envelope-open text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="text-primary">Email</h5>
                                <p class="mb-0">exchick@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.0465843928832!2d116.11385801048789!3d-8.591519787187412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdbf5c2462a5ed%3A0xbc0f44d683d529b1!2sUniversitas%20Bumigora!5e0!3m2!1sid!2sid!4v1686725122585!5m2!1sid!2sid" width="370" height="370" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="#about">Tentang</a>
                    <a class="btn btn-link" href="#penyakit">Penyakit Ayam</a>
                    <a class="btn btn-link" href="#testimoni">Testimoni</a>
                    <a class="btn btn-link" href="#contact">Contact</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Mataram, NTB</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+6287708284384</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>exchick@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('elearning/img/course-1.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('elearning/img/course-2.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('elearning/img/course-3.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('elearning/img/course-2.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('elearning/img/course-3.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('elearning/img/course-1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">EXChick</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#top" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('elearning/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('elearning/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('elearning/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('elearning/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('elearning/js/main.js')}}"></script>
</body>

</html>