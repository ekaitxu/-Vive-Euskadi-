<template>
  <div class="container-fluid">
    <table class="table table-borderless">
      <thead>
        <tr>
          <th scope="col">Zona</th>
          <th scope="col">Ideal para</th>
          <th scope="col">Tipo</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="col">
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="Araba"
                id="checkAlava"
              />
              <label class="form-check-label" for="checkAlava"> Álava </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="Gipuzkoa"
                id="checkGipuzcoa"
              />
              <label class="form-check-label" for="checkGipuzcoa">
                Guipúzcoa
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="Bizkaia"
                id="checkVizcaya"
              />
              <label class="form-check-label" for="checkVizcaya">
                Vizcaya
              </label>
            </div>
          </td>
          <td scope="col">
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="couple"
                id="checkPareja"
              />
              <label class="form-check-label" for="checkPareja">
                Planes en pareja
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="friends"
                id="checkGrupo"
              />
              <label class="form-check-label" for="checkGrupo">
                Planes en grupo
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="children"
                id="checkNiños"
              />
              <label class="form-check-label" for="checkNiños">
                Planes con niños
              </label>
            </div>
          </td>
          <td scope="col">
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="culture"
                id="checkCultura"
              />
              <label class="form-check-label" for="checkCultura">
                Cultura
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="water"
                id="checkDeporte"
              />
              <label class="form-check-label" for="checkDeporte"> Agua </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="cuisine"
                id="checkGastronomia"
              />
              <label class="form-check-label" for="checkGastronomia">
                Gastronomía
              </label>
            </div>
          </td>
          <td scope="col">
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="landscape"
                id="checkAventura"
              />
              <label class="form-check-label" for="checkAventura">
                Naturaleza y paisajes
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="children-landscape"
                id="checkPequeAventura"
              />
              <label class="form-check-label" for="checkPequeAventura">
                Peque-Aventura
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="culture-cuisine"
                id="checkUrbanos"
              />
              <label class="form-check-label" for="checkUrbanos">
                Planes urbanos
              </label>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lista de planificaciones</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form id="add-plan-form" class="p-2" novalidate>
            <div class="row mb-3 gx-3">
              <div class="col">
                <p>Guardar en Planificacion:</p>
                <select name="planificacion" id="planificacion">
                  
                </select>
              </div>
            </div>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Nueva Planificacion
            </button>
            <div class="collapse" id="collapseExample">
               <form id="add-planificacion-form" class="p-2" novalidate>
                  <div class="row mb-3 gx-3">
                    <div class="col">
                      <input type="text" name="nombre" class="form-control form-control-lg" id="nombrePlanificacion" placeholder="Nombre Planificacion" required>
                      <div class="invalid-feedback">El nombre es obligatorio</div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <textarea class="form-control" placeholder="Descripcion" id="descripcionPlanificacion" rows="3"></textarea>
                  </div>

                  <div class="mb-3">
                    <button class="btn btn-primary" id="crearPlanificacion" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      Crear
                    </button>
                  </div>
               </form>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardarDatos">Guardar en lista</button>
      </div>
    </div>
  </div>
</div>
    <div
      class="
        row row-cols-1 row-cols-md-2 row-cols-lg-3
        g-4
        mt-5
        justify-content-center
        divUserId
      "
      :id="this.userId"
    >
     
      <div
        v-for="(item, index) in paginated('resultado')"
        :key="index"
        class="d-flex justify-content-center mb-2"
      >
        <!-- Para navegar entre componentes Vue-->
       <router-link exact-active-class="active" :to="{path: '/busqueda/'+$route.params.textoBusqueda+'/plan/'+item.documentName, query: { plan: userId}}" aria-current="page" @click.native="$event.stopImmediatePropagation()">
            <div class="card text-white busqueda-card">
                <img src="/images/Imagenes/alavaDescubre.jpg" class="card-img" alt="">
                <div class="card-img-overlay">
                    <h5 class="card-title float-end h5-DocumentName"  v-bind:id="item.documentName" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-heart iconoFavPlan"   viewBox="0 0 16 16">
                            <path  d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg>
                         <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bookmark pe-1 pt-1 iconoGuardarPlan" viewBox="0 0 16 16" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                          </svg>
                    </h5>
                    <p  class="card-text position-absolute start-0 bottom-0 end-0 h-25 text-center fs-5" >{{item.documentName}}</p>
                </div>
            </div>
        </router-link>
      </div>
    </div>
    <div class="col-12 text-center align-items-center">
      <!-- Paginacion mediante Vue Paginate-->
      <paginate
        ref="paginator"
        name="resultado"
        :list="this.resultado"
        :per="15"
      ></paginate>
      <paginate-links
        class="justify-content-center"
        for="resultado"
        :hide-single-page="true"
        :show-step-links="true"
        :limit="5"
        :classes="{ ul: 'pagination', li: 'page-item', a: 'page-link' }"
      ></paginate-links>
    </div>
  </div>
</template>

<script>
import $ from "jquery";



export default {
  data() {
    return {
      planes: null,
      resultado: [],
      filtro: null,
      id: null,
      user_id: null,
      paginate: ["resultado"],
      cantidadTotal: 0,
    };
  },
  props: ['userId'],
  mounted() {
    var esto = this;
    this.planes = JSON.parse(localStorage.getItem("planes"));
    const url = window.location.href;
    this.id = url.substring(url.lastIndexOf("/") + 1);
    this.resultado = this.planes.filter((plan) =>
      plan.documentName.toLowerCase().includes(decodeURI(this.id.toLowerCase()))
    );
    this.checkbox();
    this.user_id=parseInt($('.divUserId').attr('id'));
    
$(document).ready(function () {
  var documentName = $(this).parent().attr("id");
  var svgPlan = null;
  rellenarFavoritos();
  rellenarGuardarPlan();
  //Animacion de las cards
  $(".busqueda-card").hover(
    function () {
      $(this).stop().animate({ width: "25rem", height: "20rem" });
      $(this)
        .children(".card-img")
        .stop()
        .animate({ width: "25rem", height: "20rem" });
    },
    function () {
      $(this).stop().animate({ width: "20rem", height: "15rem" });
      $(this)
        .children(".card-img")
        .stop()
        .animate({ width: "20rem", height: "15rem" });
    }
  );
  // Agregar o Borrar de Favoritos
  $(".h5-DocumentName")
    .children(".iconoFavPlan")
    .click(function () {
      if ($(".divUserId").attr("id") != undefined) {
        var user_id = parseInt($(".divUserId").attr("id"));
        var documentName = $(this).parent().attr("id");
        if ($(this).hasClass("bi-heart")) {
          $(this).removeClass("bi-heart");
          $(this).addClass("bi-heart-fill");
          $(this)
            .children("path")
            .attr(
              "d",
              "M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
            );
          $(this).children("path").attr("fill-rule", "evenodd");
          $(this).css("fill", "red");
          var territory = $(this).parent().parent().attr("id");
          $.ajax({
            type: "get",
            url:
              "/busqueda/insertarFavoritos/" +
              user_id +
              "/" +
              documentName +
              "/" +
              territory,
            data: {},
            error: function (ts) {
              console.log(ts.responseText);
            },
          });
        } else if ($(this).hasClass("bi-heart-fill")) {
          $(this).removeClass("bi-heart-fill");
          $(this).addClass("bi-heart");
          $(this)
            .children("path")
            .attr(
              "d",
              "m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"
            );
          $(this).children("path").removeAttr("fill-rule");
          $(this).css("fill", "white");
          $.ajax({
            type: "get",
            url: "/busqueda/borrarFavoritos/" + user_id + "/" + documentName,
            data: {},
            error: function (ts) {
              console.log(ts.responseText);
            },
          });
        }
      }
      return false;
    });
    $(".h5-DocumentName")
    .children(".iconoGuardarPlan")
    .click(function () {
      if ($(".divUserId").attr("id") != undefined) {
        documentName = $(this).parent().attr("id");
        rellenarSelectPlan(esto.user_id);
        svgPlan = this;
      }
      return false;
    });
     $('#guardarDatos').click(function (e) { 
       console.log($('#planificacion').val());
          e.preventDefault();
          $.ajax({
                type: "get",
                url:
                  "/busqueda/insertarPlanPlanificacion/" +$('#planificacion').val()+"/"+documentName,
                data: {},
                error: function (ts) {
                  console.log(ts.responseText);
                },
                success: function() {
                  if ($(svgPlan).hasClass("bi-bookmark")) {
                    $(svgPlan).removeClass("bi-bookmark");
                    $(svgPlan).addClass("bi-bookmark-check-fill");
                    $(svgPlan)
                      .children("path")
                      .attr(
                        "d",
                        "M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"
                      );
                    $(svgPlan).children("path").attr("fill-rule", "evenodd");
                    $(svgPlan).css("fill", "#d850fc");
                    
                  }
                  $('#add-plan-form').append("<p class='bg-success text-white' id='textoBien'>Se ha guardado el plan existosamente</p>");
                  setTimeout(function() { $("#textoBien").remove(); }, 5000);
                },
              }); 

        });
        $('#crearPlanificacion').click(function (e) { 
          e.preventDefault();
          $.ajax({
                type: "get",
                url:
                  "/busqueda/insertarPlanificacion/" +esto.user_id+"/"+$('#nombrePlanificacion').val()+"/"+$('#descripcionPlanificacion').val(),
                data: {},
                error: function (ts) {
                  console.log(ts.responseText);
                },
                success: function() {
                  rellenarSelectPlan(esto.user_id)
                  $('#nombrePlanificacion').val('');
                  $('#descripcionPlanificacion').val('');

                },
              }); 
        });
  //Rellenar los favoritos del user al cambiar de pagina
  $(".page-link").click(function () {
    rellenarFavoritos();
    rellenarGuardarPlan();
  });
});
//Rellenar los corazones segun los favoritos del user
function rellenarGuardarPlan() {
                if($('.divUserId').attr('id')!=undefined){
                    var user_id=parseInt($('.divUserId').attr('id'));
                    $.ajax({
                                type: 'get',
                                url: '/busqueda/selectPlanesPlanificacion/'+user_id,
                                data: {},
                                error: function(ts) { console.log(ts.responseText) }
                            }).done(function(respuesta) {
                                var resultadoDocumentName= [];
                                for(var i=0; i<respuesta.length;i++){
                                    resultadoDocumentName.push(respuesta[i].DocumentName);
                                };
                                $('.h5-DocumentName').each(function () { 
                                    if(resultadoDocumentName.indexOf($(this).attr('id'))>=0){
                                        $(this).children('.iconoGuardarPlan').removeClass("bi-bookmark");
                                        $(this).children('.iconoGuardarPlan').addClass("bi-bookmark-check-fill");
                                        $(this).children('.iconoGuardarPlan').children('path').attr('d', 'M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z');
                                        $(this).children('.iconoGuardarPlan').children('path').attr('fill-rule','evenodd');
                                        $(this).children('.iconoGuardarPlan').css('fill', '#d850fc');
                                    }else{
                                        $(this).children('.iconoGuardarPlan').removeClass("bi-bookmark-check-fill");
                                        $(this).children('.iconoGuardarPlan').addClass("bi-bookmark");
                                        $(this).children('.iconoGuardarPlan').children('path').attr('d', 'M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z');
                                        $(this).children('.iconoGuardarPlan').children('path').removeAttr('fill-rule');
                                        $(this).children('.iconoGuardarPlan').css('fill', 'white');
                                    }
                                });
                            });
                }else{
                   $(".h5-DocumentName").remove();
                };
};
function rellenarFavoritos() {
                if($('.divUserId').attr('id')!=undefined){
                    var user_id=parseInt($('.divUserId').attr('id'));
                    $.ajax({
                                type: 'get',
                                url: '/busqueda/selectFavoritos/'+user_id,
                                data: {},
                                error: function(ts) { console.log(ts.responseText) }
                            }).done(function(respuesta) {
                                var resultadoDocumentName= [];
                                for(var i=0; i<respuesta.length;i++){
                                    resultadoDocumentName.push(respuesta[i].DocumentName);
                                };
                                $('.h5-DocumentName').each(function () { 
                                    if(resultadoDocumentName.indexOf($(this).attr('id'))>=0){
                                        $(this).children('.iconoFavPlan').removeClass('bi-heart');
                                        $(this).children('.iconoFavPlan').addClass("bi-heart-fill");
                                        $(this).children('.iconoFavPlan').children('path').attr('d', 'M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z');
                                        $(this).children('.iconoFavPlan').children('path').attr('fill-rule','evenodd');
                                        $(this).children('.iconoFavPlan').css('fill', 'red');
                                    }else{
                                        $(this).children('.iconoFavPlan').removeClass('bi-heart-fill');
                                        $(this).children('.iconoFavPlan').addClass("bi-heart");
                                        $(this).children('.iconoFavPlan').children('path').attr('d', 'm8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z');
                                        $(this).children('.iconoFavPlan').children('path').removeAttr('fill-rule');
                                        $(this).children('.iconoFavPlan').css('fill', 'white');
                                    }
                                });
                            });
                }else{
                   $(".h5-DocumentName").remove();
                };
};
   

    function rellenarSelectPlan(user_id) {
      $.ajax({
            type: "get",
            url:
              "/busqueda/selectPlanificaciones/" +user_id,
            data: {},
            error: function (ts) {
              console.log(ts.responseText);
            },
            success: function(data) {
             var opciones='';
              if(data.length >0){
                for(var i=0;i<data.length;i++){
                  opciones += "<option value='"+data[i].IdPlanificacion+"'>"+data[i].NombrePlanificacion+"</option>";
                }
              }else{
                opciones += "<option value='none'>No hay planificaciones</option>";
              }
              $('#planificacion').html(opciones);
              $('#planificacion').val($('#planificacion option:last').val());
              

            },
          }); 
    };
    


  },

  methods: {
    //Todos los filtrados
    filtrar: function (filtroTerritorio, filtroResto) {
      var filtrarTerritorio = [];
      var territorioFiltrado = [];

      // En caso de estar vacío muestra todos
      if (filtroTerritorio.length === 0 && filtroResto.length === 0) {
        this.resultado = this.planes;
      } else {
        // Filtra los planes por territorio y el resto de filtros se aplican a esos planes ya filtrados
        if (filtroTerritorio.length !== 0) {
          filtrarTerritorio = new Set(filtroTerritorio);
          territorioFiltrado = this.planes.filter((plan) =>
            filtrarTerritorio.has(plan.territory)
          );
          this.resultado = territorioFiltrado;
          if (filtroResto.length !== 0) {
            for (let a = 0; a < filtroResto.length; a++) {
              this.resultado = territorioFiltrado.filter((plan) =>
                plan[filtroResto[a]].includes(1)
              );
            }
          }
          // En caso de no haber filtro por territorio, el resto se aplican a todos los planes
        } else {
          for (let a = 0; a < filtroResto.length; a++) {
            this.resultado = this.resultado.filter((plan) =>
              plan[filtroResto[a]].includes(1)
            );
          }
        }
      }
    },
    checkbox: function () {
      var s = this;
      $(document).ready(function () {
        var filtroTerritorio = [];
        var filtroResto = [];
        // Añadir filtro
        $("input:checkbox").on("change", function () {
          if (this.checked) {
            // Territorios
            if (
              $(this).val() == "Araba" ||
              $(this).val() == "Gipuzkoa" ||
              $(this).val() == "Bizkaia"
            ) {
              filtroTerritorio.push($(this).val());
            } else if ($(this).val().includes("-")) {
              // Resto
              let separado = $(this).val().split("-");
              filtroResto.push(separado[0]);
              filtroResto.push(separado[1]);
            } else {
              filtroResto.push($(this).val());
            }
            s.filtrar(filtroTerritorio, filtroResto);
          } else {
            // Quitar filtro
            // Territorios
            for (var i = 0; i < filtroTerritorio.length; i++) {
              if (filtroTerritorio[i] === $(this).val()) {
                filtroTerritorio.splice([i], 1);
                console.log("funciona");
              }
            }
            // Resto
            for (var j = 0; j < filtroResto.length; j++) {
              if ($(this).val().includes("-")) {
                let separado = $(this).val().split("-");
                if (
                  filtroResto[j] === separado[0] ||
                  filtroResto[j] === separado[1]
                ) {
                  filtroResto.splice([j + 1], 1);
                  filtroResto.splice([j], 1);
                }
              }
              if (filtroResto[j] === $(this).val()) {
                filtroResto.splice([j], 1);
              }
            }
            s.filtrar(filtroTerritorio, filtroResto);
          }
        });
      });
    },
  },
};
</script>


<style scoped>
@font-face {
  font-family: Astral Sisters;
  src: url("/fonts/Astral-Sisters.ttf");
}
@font-face {
  font-family: PlayfairDisplay;
  src: url("/fonts/PlayfairDisplay.ttf");
}
table {
  background-color: rgba(209, 220, 225, 0.9);
}
th {
  font-family: "Astral Sisters";
  font-size: 30px;
}
td {
  font-family: PlayFairDisplay;
}
.card-text {
  background-color: rgba(0, 0, 0, 0.5);
  font-family: PlayFairDisplay;
}

.card {
  width: 20rem;
  height: 15rem;
}
.card-img {
  height: 15rem;
}
.modal-wrapper{
  display: table-cell;
  vertical-align: middle;
}
</style>