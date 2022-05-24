<template>
  <section class="container" id="contenedorPlan">
    <div class="row">
      <div
        v-for="(item, index) in this.resultado"
        :key="index"
        class="row mb-2"
      >
        <div class="col-6" id="infoPlan">
          <div class="card" id="headerPlan">
            <img src="/images/temporales/plan1.jpg" class="img-overlay" />
            <div class="row h-100 w-100 ms-0" id="tituloPlan">
              <h3
                class="
                  position-absolute
                  w-100
                  mb-0
                  bottom-0
                  start-0
                  text-center text-white
                "
              >
                {{ item.documentName }}
              </h3>
              <div class="container d-flex justify-content-end" v-if="userId != undefined">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="50"
                  height="50"
                  fill="white"
                  class="bi bi-heart pe-3 pt-1 svgCorazon"
                  viewBox="0 0 16 16"
                  id="iconoFavPlan"
                >
                  <path
                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"
                  />
                </svg>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="40"
                  height="40"
                  fill="currentColor"
                  class="bi bi-bookmark pe-1 pt-1 svgBookmark"
                  viewBox="0 0 16 16"
                  id="iconoGuardarPlan"
                >
                  <path
                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"
                  />
                </svg>
              </div>
            </div>
          </div>
          <div class="mt-3 m-1" id="textoPlan">
            <p v-html="item.turismDescription"></p>
          </div>
        </div>
        <div class="col-6">
          <div class="row ms-3" id="plandatos">
            <div id="datosPlan">
              <h3>DATOS DE INTERÉS</h3>
              <h4>Para ir con:</h4>
              <div class="row">
                <div class="col" v-if="amigos">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="30"
                    height="30"
                    fill="white"
                    class="bi bi-people-fill"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"
                    />
                    <path
                      fill-rule="evenodd"
                      d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"
                    />
                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                  </svg>
                  <p>Amigos</p>
                </div>
                <div class="col" v-if="ninios">
                  <svg
                    aria-hidden="true"
                    width="30"
                    height="30"
                    fill="white"
                    focusable="false"
                    data-prefix="fas"
                    data-icon="child"
                    class="svg-inline--fa fa-child fa-w-12"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 384 512"
                  >
                    <path
                      fill="currentColor"
                      d="M120 72c0-39.765 32.235-72 72-72s72 32.235 72 72c0 39.764-32.235 72-72 72s-72-32.236-72-72zm254.627 1.373c-12.496-12.497-32.758-12.497-45.254 0L242.745 160H141.254L54.627 73.373c-12.496-12.497-32.758-12.497-45.254 0-12.497 12.497-12.497 32.758 0 45.255L104 213.254V480c0 17.673 14.327 32 32 32h16c17.673 0 32-14.327 32-32V368h16v112c0 17.673 14.327 32 32 32h16c17.673 0 32-14.327 32-32V213.254l94.627-94.627c12.497-12.497 12.497-32.757 0-45.254z"
                    ></path>
                  </svg>
                  <p>Niños</p>
                </div>
                <div class="col" v-if="pareja">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="30"
                    height="30"
                    fill="currentColor"
                    class="bi bi-heart-fill"
                    viewBox="0 0 16 16"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                    />
                  </svg>
                  <p>Pareja</p>
                </div>
              </div>
              <h4>Temática:</h4>
              <div class="row">
                <div class="col" v-if="cultura">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="30"
                    height="30"
                    fill="white"
                    class="bi bi-bank2"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z"
                    />
                  </svg>
                  <p>Cultura</p>
                </div>
                <div class="col" v-if="naturaleza">
                  <svg
                    aria-hidden="true"
                    width="30"
                    height="30"
                    fill="white"
                    focusable="false"
                    data-prefix="fas"
                    data-icon="mountain"
                    class="svg-inline--fa fa-mountain fa-w-20"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 640 512"
                  >
                    <path
                      fill="currentColor"
                      d="M634.92 462.7l-288-448C341.03 5.54 330.89 0 320 0s-21.03 5.54-26.92 14.7l-288 448a32.001 32.001 0 0 0-1.17 32.64A32.004 32.004 0 0 0 32 512h576c11.71 0 22.48-6.39 28.09-16.67a31.983 31.983 0 0 0-1.17-32.63zM320 91.18L405.39 224H320l-64 64-38.06-38.06L320 91.18z"
                    ></path>
                  </svg>
                  <p>Naturaleza</p>
                </div>
                <div class="col" v-if="gastronomia">
                  <svg
                    aria-hidden="true"
                    width="30"
                    height="30"
                    fill="white"
                    focusable="false"
                    data-prefix="fas"
                    data-icon="utensils"
                    class="svg-inline--fa fa-utensils fa-w-13"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 416 512"
                  >
                    <path
                      fill="currentColor"
                      d="M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z"
                    ></path>
                  </svg>
                  <p>Gastronomía</p>
                </div>
                <div class="col" v-if="agua">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="30"
                    height="30"
                    fill="white"
                    class="bi bi-droplet"
                    viewBox="0 0 16 16"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10a5 5 0 0 0 10 0c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z"
                    />
                    <path
                      fill-rule="evenodd"
                      d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z"
                    />
                  </svg>
                  <p>Agua</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row ms-3" id="ubicacion">
            <div id="ubicacionPlan" class="p-0 mt-2">
              <h3 class="text-white text-center" id="dondeEsta">DÓNDE ESTÁ</h3>
              <iframe
                id="mapaPlan"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11622.807170302627!2d-2.9024069!3d43.2576713!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x364f27e82def0130!2sCIFP%20Txurdinaga%20LHII!5e0!3m2!1ses!2ses!4v1641889218826!5m2!1ses!2ses"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" id="comentarios">
      <div class="container p-0">
        <h3 class="text-white text-center" id="dondeEsta">COMENTARIOS</h3>
        <h4 class="ps-2">Añadir comentario</h4>
        <form class="p-2" id="ComentarioForm" method="post" @submit.prevent="insertarComentario">
            <div class="form-group">
                <input type="text" id="textoComentario" v-model="comentario" name="comment_body" class="form-control" required />
                <input type="submit" class="btn btn-warning" id="añadir" value="Añadir comentario" />
            </div>
        </form>
        <hr class="m-4">
        <div id="comentariosMostrados" class="p2">
            <!-- Aquí se añadirán los comentarios mediante ajax -->
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import $ from "jquery";

export default {
  data() {
    return {
      planes: null,
      resultado: [],
      gastronomia: false,
      agua: false,
      cultura: false,
      naturaleza: false,
      amigos: false,
      pareja: false,
      ninios: false,
      userId: null,
      comentario: null,
      nombre: null,
    };
  },
  mounted() {
    //Para tener siempre accesibles las variables de Vue
    var este = this;
    //Obtenemos la id del user via la url
    this.userId = this.$route.query.plan;
    //Obtenemos el JSON
    this.planes = JSON.parse(localStorage.getItem("planes"));
    //Obtenemos el nombre del plan desde la url
    const url = window.location.href;
    var nombre = url.substring(url.lastIndexOf("/") + 1);
    var nombreSplit = nombre.split("?")[0];
    nombre = decodeURI(nombreSplit);
    this.nombre = decodeURI(nombreSplit);
    //Filtramos segun el texto de busqueda
    this.resultado = this.planes.filter((plan) =>
      plan.documentName.includes(nombre)
    );

    //Control de no haber iniciado sesion
    if (this.userId != undefined && this.userId != NaN && this.userId != null) {
      //Marcar los favoritos del usuario
      $.ajax({
        type: "get",
        url: "/busqueda/selectFavoritos/" + este.userId,
        data: {},
        error: function (ts) {
          console.log(ts.responseText);
        },
      }).done(function (respuesta) {
        var resultadoDocumentName = [];
        for (var i = 0; i < respuesta.length; i++) {
          resultadoDocumentName.push(respuesta[i].DocumentName);
        }
        if (
          resultadoDocumentName.indexOf(este.resultado[0].documentName) >= 0
        ) {
          $(".svgCorazon").removeClass("bi-heart");
          $(".svgCorazon").addClass("bi-heart-fill");
          $(".svgCorazon")
            .children("path")
            .attr(
              "d",
              "M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
            );
          $(".svgCorazon").children("path").attr("fill-rule", "evenodd");
          $(".svgCorazon").css("fill", "red");
        } else {
          $(".svgCorazon").removeClass("bi-heart-fill");
          $(".svgCorazon").addClass("bi-heart");
          $(".svgCorazon")
            .children("path")
            .attr(
              "d",
              "m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"
            );
          $(".svgCorazon").children("path").removeAttr("fill-rule");
          $(".svgCorazon").css("fill", "white");
        }
      });

      $.ajax({
                                type: 'get',
                                url: '/busqueda/selectPlanesPlanificacion/'+este.userId,
                                data: {},
                                error: function(ts) { console.log(ts.responseText) }
                            }).done(function(respuesta) {
                                var resultadoDocumentName= [];
                                for(var i=0; i<respuesta.length;i++){
                                    resultadoDocumentName.push(respuesta[i].DocumentName);
                                };
                              
                                 
                                     if (
                                        resultadoDocumentName.indexOf(este.resultado[0].documentName) >= 0
                                      ) {
                                        $('.svgBookmark').removeClass("bi-bookmark");
                                        $('.svgBookmark').addClass("bi-bookmark-check-fill");
                                        $('.svgBookmark').children('path').attr('d', 'M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z');
                                        $('.svgBookmark').children('path').attr('fill-rule','evenodd');
                                        $('.svgBookmark').css('fill', '#d850fc');
                                    }else{
                                        $('.svgBookmark').removeClass("bi-bookmark-check-fill");
                                        $('.svgBookmark').addClass("bi-bookmark");
                                        $('.svgBookmark').children('path').attr('d', 'M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z');
                                        $('.svgBookmark').children('path').removeAttr('fill-rule');
                                        $('.svgBookmark').css('fill', 'white');
                                    }
                                });
                          
    }
    //Obtener los campos que cumple el plan
    if (
      this.resultado[0].gastronomical == "1" ||
      this.resultado[0].cuisine == "1"
    ) {
      this.gastronomia = true;
    }
    if (this.resultado[0].water == "1") {
      this.agua = true;
    }
    if (this.resultado[0].landscape == "1") {
      this.naturaleza = true;
    }
    if (this.resultado[0].culture == "1") {
      this.cultura = true;
    }
    if (this.resultado[0].friends == "1") {
      this.amigos = true;
    }
    if (this.resultado[0].couple == "1") {
      this.pareja = true;
    }
    if (this.resultado[0].children == "1") {
      this.ninios = true;
    }
    // Carga los comentarios
    this.mostrarComentarios();
  },

  methods: {
    // Crea un nuevo comentario
    insertarComentario() {
      var comentario = this.comentario;
      
      $.ajax({
          type: "get",
          url: '/' + this.userId + '/' + this.nombre + '/' + comentario + '/' + this.resultado.territory + '/insertar',
          data: {},
          error: function (ts) {
            console.log(ts.responseText);
          },
        });
        // Recarga los comentarios para mostrar el nuevo
        this.mostrarComentarios();
    },

    // Muestra los comentariso
    mostrarComentarios() {
      $.ajax({
        type: 'get',
        url: '/' + this.nombre + '/comentarios',
        data: {toma: []},
        contentType: 'application/json; charset=utf-8',
        success: function(respuesta) {
          var html = '';
          respuesta.forEach(element => {
              html += `
                  <div class="comentarioPlan p-2" id="` + element.idComentario + `" style="border-bottom: 1px solid whitesmoke;">
                      <h4>` + element.name + `</h4>
                      <p>` + element.Texto + `</p>
                      <p class="fw-light text-end">` + element.Fecha + `</p>
                  </div>
              `;
          });
          $('#comentariosMostrados').html(html);
        }
      });
    }
  },
  
};
</script>

<style scoped>
#contenedorPlan {
  padding-left: 10%;
  padding-right: 10%;
}

#infoPlan {
  width: 50%;
  background-color: whitesmoke;
}

#headerPlan {
  border: 0;
}

#tituloPlan {
  position: absolute;
  top: 0;
  margin-left: 0;
  margin-right: 0;
  right: 0;
}

#iconoFavPlan {
  color: red;
}

#iconoGuardarPlan {
  color: white;
}

#textoPlan {
  color: black;
}

#datosPlan {
  color: white;
  background-color: rgb(61, 61, 61);
}

h3 {
  background-color: rgba(0, 0, 0, 0.5);
}

#ubicacion,
#plandatos {
  max-width: 300px;
}

#comentarios, #comentariosMostrados {
  color: white;
  background-color: rgb(61, 61, 61);
}

.comentarioPlan {
  background-color: rgb(73, 73, 73);
  border-bottom: 1px solid whitesmoke;
}
</style>