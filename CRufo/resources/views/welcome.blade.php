@extends('layouts.master')
@section('title','Inicio')
@section('content')

<div class="justify-content-center m-2 border border-dark">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="https://clientebancario.bde.es/f/webcb/RCL/ActualidadEducacionFinanciera/Blog/novedades/Concurso_escolar_850x443.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-light">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="https://clientebancario.bde.es/f/webcb/RCL/ActualidadEducacionFinanciera/Blog/novedades/Concurso_escolar_850x443.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-light">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://clientebancario.bde.es/f/webcb/RCL/ActualidadEducacionFinanciera/Blog/novedades/Concurso_escolar_850x443.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-light">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://clientebancario.bde.es/f/webcb/RCL/ActualidadEducacionFinanciera/Blog/novedades/Concurso_escolar_850x443.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-light">
                    <h5>4 slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://clientebancario.bde.es/f/webcb/RCL/ActualidadEducacionFinanciera/Blog/novedades/Concurso_escolar_850x443.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-light">
                    <h5>5 slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="row m-2">
    <div class="col-6">
        <h4>NOVEDADES</h4>
        <div>
            <a href="">Convocatoria de becas de carácter general para el Curso Escolar 2022/2023</a>
        </div>
        <div>
            <a href="">Certificado de profesionalidad: “Atención y gestión de llamadas entrantes del servicio de teleasistencia”</a>
        </div>
        <div>
            <a href="">CAMPAÑA DONACIÓN DE SANGRE</a>
        </div>
    </div>
    <div class="col-3">
        <h4>SERVICIOS</h4>
        <a href="https://iespoligonosur.org/biblioteca/" class="p-2 border bg-warning w-auto">Biblioteca</a>
    </div>
    <div class="col-3">
        <h4>ACCESOS DIRECTOS</h4>
        <div class="justify-content-center" style="text-align: center;">
            <a href=""><img style="width: 75%" src="https://www.juntadeandalucia.es/educacion/secretariavirtual/images/logo_secretaria_virtual.svg" alt=""></a>
            <br>
            <a href=""><img style="width: 20%;" src="https://blogsaverroes.juntadeandalucia.es/ceipdoctorperaliaspanduro/files/2021/05/IPASEN-232x232.png" alt=""></a>
            <br>
            <a href=""><img style="width: 50%" src="https://www.juntadeandalucia.es/educacion/portals/ishare-servlet/content/fdf1a684-45fa-428c-b541-8be0890675f0" alt=""></a>
        </div>
    </div>
</div>

@endsection