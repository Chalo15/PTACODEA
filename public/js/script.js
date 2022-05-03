        

//Desplegable para las provincias y cantones 
var opt_SanJose = new Array ("Seleccione","San Jose","Escazu","Desamparados","Puriscal","Tarrazu","Aserri","Mora","Goicoechea","Santa Ana",
                            "Vasquez de Coronado","Acosta","Tibas","Moravia","Montes de Oca","Turrubares","Dota","Curridabat",
                            "Perez Zeledon","Leon Cortes");
        
var opt_Alajuela = new Array ("Seleccione","Alajuela","San Ramon","Grecia","San Mateo","Atenas","Naranjo","Palmares","Poas","Orotina",
                            "San Carlos","Alfaro Ruiz","Valverde Vega","Upala","Los Chiles","Guatuso");

var opt_Cartago = new Array ("Seleccione","Cartago","Paraiso","La Union","Jiménez","Turrialba","Alvarado","Oreamuno","El Guarco");

var opt_Heredia = new Array ("Seleccione","Heredia","Barva","Santo Domingo","Santa Barbara","San Rafael","San Isidro","Belen","Flores","Orotina",
                            "San Pablo","Sarapi");

var opt_Guanacaste = new Array ("Seleccione","Liberia","Nicoya","Santa Cruz","Bagaces","Carrillo","Canas","Abangares","Tilaran","Nandayure","La Cruz","Hojancha");

var opt_Puntarenas = new Array ("Seleccione","Puntarenas","Esparza","Buenos Aires","Montes de Oro","Osa","Aguirre","Golfito","Coto Brus","Parrita","Corredores","Garabito");

var opt_Limon = new Array ("Seleccione","Limon","Pococi","Siquirres","Talamanca","Matina","Guacimo");



function cambia(){
    var provincia;
    //Se toma el vamor de la "provincia seleccionada"
    provincia = document.formulario1.provincia[document.formulario1.provincia.selectedIndex].value;

    //se chequea si la "provincia" esta definida
    if(provincia!=0)
    {
        //selecionamos las provincias Correctas
        mis_opts = eval("opt_" + provincia);
        //se calcula el numero de provincias
        num_opts=mis_opts.length;

        //marco el numero de opt en el select
        document.formulario1.canton.length = num_opts;

        //para cada opt del array, la pongo en el select
        for(i=0; i<num_opts; i++){
            document.formulario1.canton.options[i].value=mis_opts[i];
            document.formulario1.canton.options[i].text=mis_opts[i];
        }
    }else{
        //si no habia ninguna opt seleccionada, elimino las provincias del select
        alert("Seleccione una provicia y un canton");
        //ponemos un guion en la unica opt que he dejado
    }
    //hacer un reset de las opts
    document.formulario1.canton.options[0].selected = true;
        
    }

//Fin desplegable para provincias y cantones 



(function(document) {
    'use strict';

    var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
        _input = e.target;
        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
        Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
            Arr.forEach.call(tbody.rows, _filter);
        });
        });
    }

    function _filter(row) {
        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
        init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
            input.oninput = _onInputEvent;
        });
        }
    };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
        LightTableFilter.init();
    }
    });

})(document);
