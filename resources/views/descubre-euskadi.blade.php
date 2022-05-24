<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Descubre Euskadi</title>

    <link rel="stylesheet" href="{{ asset('css/descubre_euskadi.css') }}">

</head>

<body>

    <div id="app">
        {{-- Cabecera --}}
        @if (Route::has('login') && Route::has('register'))
        @auth
        <cabecera descubre-euskadi="{{ url('descubre-euskadi')}}" index-route="{{ url('/home')}}"
            user-route="{{url('user/datosUsuario')}}" user-name="<?php echo Auth::user()->name; ?>"
            log-out="{{route('logout')}}" user-Admin="<?php echo Auth::user()->admin ?>"
            admin-route="{{url('admin/gestion-usuarios')}}"></cabecera>
        @else
        <cabecera descubre-euskadi="{{ url('descubre-euskadi')}}" index-route="{{ url('/home')}}"
            user-login="{{ route('login') }}" user-register="{{ route('register') }}"></cabecera>
        @endauth
        @endif

        <div class="container">
            <h1 class="text-center text-white mt-3">Euskadi: un pequeño pais con una gran identidad</h1>
            <div class="card flex-column mt-5">
                <div class="card-header w-100 text-white fs-3">
                    Álava
                </div>
                <div class="card flex-row ">
                    <div class="card-image border-0 img-fluid">
                        <img src="/images/Imagenes/alavaDescubre.jpg" alt="Descubre Àlava" class="descubre-img">
                    </div>

                    <div class="card-body-right ms-3">
                        <p class="card-text text-white">
                            Álava (en euskera, Araba y oficialmente, Araba/Álava) es un territorio histórico y una de
                            las tres provincias españolas que componen la comunidad autónoma del País Vasco. Su capital
                            y ciudad más poblada es Vitoria, que es también sede de las instituciones de la comunidad
                            autónoma. Tiene una superficie de 3037 km² (según el INE), siendo la más extensa de las tres
                            provincias vascas. En 2020 contaba con una población de 333 340 habitantes (INE), ocupando
                            el puesto 36 entre las provincias españolas y el último lugar entre las de la comunidad
                            autónoma. El pequeño enclave burgalés de Treviño se encuentra al sur del territorio alavés.
                            Su diputación es una de las diputaciones provinciales con régimen foral; que tiene mayores
                            competencias e instituciones políticas diferenciadas del resto de diputaciones. Es un
                            territorio afor<span id="puntitosAlava">...</span><span id="masAlava">ado.
                                La provincia de Álava excluyendo su capital, Vitoria, suma menos de 80 000 habitantes,
                                cerca de 334 000 incluyendo la capital. Se da una marcada macrocefalia ya que más del
                                75% de la población total de la provincia reside en la ciudad de Vitoria. La
                                macrocefalia alavesa es el resultado de la escasez de poblaciones de una cierta entidad
                                a excepción del valle de Ayala con ciudades como Llodio o Amurrio ambas con más de 10
                                000 habitantes.
                                En la zona central de Álava es donde se concentra la mayor parte de la población por la
                                ubicación de Vitoria en esa parte de la provincia rodeada de poblaciones con cierta
                                importancia con las que se alcanzan los 274 000 habitantes. Municipios como Zuya,
                                Cigoitia, Villarreal de Álava y Arrazua-Ubarrundia limitando al norte con la capital y
                                las localidades de Salvatierra, Alegría de Álava e Iruña de Oca en el eje del
                                ferrocarril Madrid-Irún que las conecta con el centro de Vitoria son las más importantes
                                de la zona central. Álava es la provincia en que existe un mayor porcentaje de
                                habitantes concentrados en su capital (75,77 %, frente a una media estatal de 31,96 %).
                            </span>
                        </p>
                        <button type="button" class="btn btn-link float-end me-5" onclick="verMas(this.id)"
                            id="verMasAlava">Ver más</button>
                    </div>
                </div>
                <div class="w-100"></div>

            </div>

            <div class="card flex-column mt-5">
                <div class="card-header w-100 text-white fs-3">
                    Guipuzcoa
                </div>
                <div class="card flex-row">
                    <div class="card-image border-0 img-fluid">
                        <img src="/images/Imagenes/gipuzcoaDescubre.jpg" alt="Descubre Gipuzcoa" class="descubre-img">
                    </div>

                    <div class="card-body-right ms-3">
                        <p class="card-text text-white">
                            Guipúzcoa (en euskera y oficialmente, Gipuzkoa) es un territorio histórico y una de las tres
                            provincias españolas que componen la comunidad autónoma del País Vasco. Su capital y ciudad
                            más poblada es San Sebastián. Se halla situada en el extremo este del mar Cantábrico y
                            limita con el departamento francés de Pirineos Atlánticos al noreste, con Navarra al sur y
                            al sureste, con Vizcaya al oeste, con Álava al suroeste y con el golfo de Vizcaya al norte.

                            Guipúzcoa se organiza en 88 municipios incorporados en siete comarcas. Con una superficie de
                            1997 km², es la provincia más pequeña de España. Es la vigésima primera provincia más
                            poblada (720 592 habitantes) y la cuarta en densidad de población (354,18 hab/km²). Más de
                            la mitad de la población vive en el área metropolitana de San Sebastián.

                            La provincia se caracteriza por una baja ampl<span id="puntitosGipuzkoa">...</span><span
                                id="masGipuzkoa">érmica y presenta rasgos propios de un
                                clima oceánico con abundantes precipitaciones.Es el territorio vasco donde más se habla
                                el
                                euskera entre la población.La principal zona turística del territorio es la costa (Costa
                                Vasca), donde destacan los municipios de San Sebastián, Zarauz y Fuenterrabía. Además de
                                sus
                                playas, poseen un gran número de edificios de gran interés cultural e histórico. En el
                                interior destacan poblaciones como Éibar, Beasáin, Villafranca de Ordizia, Oñate,
                                Mondragón,
                                Azpeitia y Tolosa.Los veinte municipios más poblados de Guipúzcoa son los indicados en
                                la
                                siguiente tabla. Datos obtenidos del Instituto Nacional de Estadística en 2018, con
                                denominación oficial del municipio indicada por el INE.:

                                Guipúzcoa cuenta con 720 592 habitantes (2018), es la cuarta provincia española (tras
                                Madrid, Barcelona y Vizcaya) con mayor densidad de población con 360,84 hab/km².

                                Guipúzcoa también ha sido una de las regiones gracias a las cuales se repuebla la
                                Castilla
                                medieval, pues gente de estas tierras emigró en la Edad Media a tierras castellanas
                                donde se
                                asentaron; así pues, muchas de las gentes de Valladolid, Burgos, Toledo, Palencia etc.,
                                tienen antepasados guipuzcoanos, aunque no tengan apellidos vascos.</span></p>
                        <button type="button" class="btn btn-link float-end me-5" onclick="verMas(this.id)"
                            id="verMasGipuzkoa">Ver más</button>
                    </div>
                </div>
                <div class="w-100"></div>

            </div>

            <div class="card flex-column mt-5 mb-5">
                <div class="card-header w-100 text-white fs-3">
                    Vizcaya
                </div>
                <div class="card flex-row">
                    <div class="card-image border-0 img-fluid">
                        <img src="/images/Imagenes/vizcayaDescubre.jpg" alt="Descubre Vizcaya" class="descubre-img">
                    </div>

                    <div class="card-body-right ms-3">
                        <p class="card-text text-white">
                            Vizcaya (en euskera y oficialmente, Bizkaia) es un territorio histórico y una de las tres
                            provincias españolas que componen la comunidad autónoma del País Vasco. Su capital y ciudad
                            más poblada es Bilbao. Está situada en el norte de la península ibérica y limita al norte
                            con el mar Cantábrico, al este con Guipúzcoa, al sur con Álava y con Burgos y al oeste con
                            Cantabria. Vizcaya es una provincia montañosa, con una alta densidad de población y cuenta
                            con un clima oceánico, con precipitaciones abundantes y temperaturas suaves.

                            Se compone de 112 municipios organizados en siete comarcas. Con una superficie de 2217 km²,
                            es la segunda provincia más pequeña de España, pero es la décima más poblada (1 159 443
                            habitantes) y la tercera en densidad de población (518,55 hab/km²). La mayoría de la
                            población vive en el área metropolitana de Bilbao, que es la sexta área met<span
                                id="puntitosBizkaia">...</span><span id="masBizkaia">ropolitana más grande de España.
                                Los idiomas oficiales son el español y el euskera; es autóctono del
                                territorio vizcaíno el dialecto occidental del euskera.

                                El territorio de Vizcaya tiene su origen en el medieval señorío de Vizcaya, del que
                                derivan
                                derechos históricos y un régimen foral que son reconocidos por la Constitución española.
                                Así, la Diputación Foral de Vizcaya, como el resto de las diputaciones forales vascas,
                                cuenta con una autonomía mucho mayor que la del resto de diputaciones provinciales. Como
                                otras provincias españolas, cuenta con un derecho foral propio. Vizcaya fue uno de los
                                primeros focos industriales de España y contó desde finales del siglo xix con una
                                industria
                                siderometalúrgica muy desarrollada; Altos Hornos de Vizcaya fue la empresa más grande
                                del
                                país durante casi todo el siglo xx. No obstante, la crisis del petróleo de 1973 tuvo
                                consecuencias económicas muy profundas en Vizcaya, y la provincia sufrió un proceso de
                                profunda reconversión industrial.
                            </span>
                        </p>
                        <button type="button" class="btn btn-link float-end me-5" onclick="verMas(this.id)"
                            id="verMasBizkaia">Ver más</button>
                    </div>
                </div>
                <div class="w-100"></div>

            </div>
        </div>
        <piepagina></piepagina>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function verMas(boton) {
            var puntitos, mas, btnVerMas;

            if (boton == "verMasAlava") {
                puntitos = document.getElementById('puntitosAlava');
                mas = document.getElementById('masAlava');
                btnVerMas = document.getElementById('verMasAlava');
            } else if (boton == "verMasGipuzkoa") {
                puntitos = document.getElementById('puntitosGipuzkoa');
                mas = document.getElementById('masGipuzkoa');
                btnVerMas = document.getElementById('verMasGipuzkoa');
            } else if (boton == "verMasBizkaia") {
                puntitos = document.getElementById('puntitosBizkaia');
                mas = document.getElementById('masBizkaia');
                btnVerMas = document.getElementById('verMasBizkaia');
            }
            masOMenos(puntitos, mas, btnVerMas);

        }

        function masOMenos(puntitos, mas, btnVerMas) {
            if (puntitos.style.display === "none") {
                puntitos.style.display = "inline";
                btnVerMas.innerHTML = "Ver más";
                mas.style.display = "none";
            } else {
                puntitos.style.display = "none";
                btnVerMas.innerHTML = "Ver menos";
                mas.style.display = "inline";
            }
        }

    </script>
</body>

</html>
