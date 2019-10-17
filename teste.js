
	

/*
 $(function(){
	desativaAcoes();
	setTimeout(function(){
		verificaElementos();
	}, 10);
})
 */
window.onload = function () {
    desativaAcoes();
	setTimeout(function(){
		verificaElementos();
	}, 10);
}
//////////////////////////////////////////



function desativaAcoes(){
	//$('body').find('a').attr('href', 'javascript:void(0)');
        var elementos = document.getElementsByTagName("a");
        for (var i = 0; i < elementos.length; i++) {
            var elemento = elementos[i];
            elemento.setAttribute("href", "javascript:void(0)");
        }
        ///////////////////////////////////////////////
        
        
        
	//$('body').find('*').removeAttr("onmouseover").off("mouseover").removeAttr("onmousedown").off("mousedown").removeAttr("onmouseout").off("mouseout").removeAttr("onmouseup").off("mouseup");
	var elementos = document.getElementsByTagName("*");
        for (var i = 0; i < elementos.length; i++) {
            var elemento = elementos[i];
            elemento.removeAttribute("onmouseover");
            elemento.onmouseover = function() {};
            elemento.removeAttribute("onmousedown");
            elemento.onmousedown = function() {};
            elemento.removeAttribute("onmouseout");
            elemento.onmouseout = function() {};
            elemento.removeAttribute("onmouseup");
            elemento.onmouseup = function() {};
        }
        //////////////////////////////////////////////////////////
        
        
        //$('body').find('*').off("click", "**").unbind('click');
        var elementos = document.getElementsByTagName("*");
        for (var i = 0; i < elementos.length; i++) {
            var elemento = elementos[i];
            elemento.removeAttribute("onclick");
            elemento.onclick = function() {};
        }
	/////////////////////////////////////////////////////////
	
        /*
        var event = $(document).click(function(e) {
		e.stopPropagation();
		e.preventDefault();
		e.stopImmediatePropagation();
		return false;
	});
        */
        var event = document.onclick = function(e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        }
        ////////////////////////////////////////////////////////
        
        document.onclick = new Function ("return false");
	document.onmousedown = new Function ("return false");
	
        // disable right click
	/*
        $(document).on('contextmenu', function(e) {
		e.stopPropagation();
		e.preventDefault();
		e.stopImmediatePropagation();
		return false;
	});
        */
        document.oncontextmenu = function() {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        }
        /////////////////////////////////////////////////
        
	document.oncontextmenu = new Function ("return false");
	
        
        /*
	$('body').keydown(function(e){
		e.stopPropagation();
		e.preventDefault();
		e.stopImmediatePropagation();
		return false;
	})
        */
       var elementos = document.getElementsByTagName("body");
       var elemento = elementos[0];
       elemento.onkeydown = function(e) {
           e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
       }
       /////////////////////////////////////////////q
}
	var funcoes = [];
	var elemento_auxiliar = [];
	var valor_auxiliar = [];
	var tempo = [];

	function addFuncao(funcao, parametro1, parametro2, tempo_execucao) {
            var i = funcoes.length;
            funcoes[i] = funcao;
            elemento_auxiliar[i] = parametro1;
            valor_auxiliar[i] = parametro2;
            if (typeof tempo_execucao == 'undefined') {
                tempo[i] = 500;
            }
            else {
                tempo[i] = tempo_execucao;
            }
	}
	
	function executaFuncoes() {
            if (funcoes.length > 0) {
                var funcao = funcoes[0];
                if (typeof elemento_auxiliar[0] == 'string') {
                    elemento_auxiliar[0] = $('#'+elemento_auxiliar[0]);
                }
                funcao();
                /* Remover da fila o que já foi executado */
                funcoes.splice(0, 1);
                elemento_auxiliar.splice(0, 1);
                valor_auxiliar.splice(0, 1);
                setTimeout(executaFuncoes, tempo[0]);
                tempo.splice(0, 1);
            }
	}
	
	function digitaCampo(elemento, texto, autocomplete) {
		addFuncao(function () {
			irPara(elemento_auxiliar[0],500);
		}, elemento);
		var letras = texto.split('');
		for (var i = 0; i < letras.length; i++) {
			//var valor = $(elemento).val() + letras[i];
                        var valor = elemento.value + letras[i];
			addFuncao(function () {
				elemento_auxiliar[0].val(elemento_auxiliar[0].val() + valor_auxiliar[0]);
			}, elemento, letras[i], 100);
		}
		
		if (typeof autocomplete != 'undefined') {
			addFuncao(function (i) {
				elemento_auxiliar[0].keypress();
				elemento_auxiliar[0].keydown();
				elemento_auxiliar[0].keyup();
			}, elemento, '', 3000);
			addFuncao(function(){
                            /*
                            $('li a').each(function(i, elemento){
                                if ($(elemento).html() == valor_auxiliar[0]) {
                                    $(elemento).click();
                                }
                            });
                             */
                            var elementos = document.getElementsByTagName("li");
                            for (var i = 0; i < elementos.length; i++) {
                                var elemento = elementos[i];
                                var elementos2 = elemento.getElementsByTagName("a");
                                for (var j = 0; j < elementos2.length; j++) {
                                    var elemento2 = elementos2[j];
                                    if (elemento2.innerHTML == valor_auxiliar[0]) {
                                        atual.dispatchEvent(new Event('click'));
                                    }
                                }
                            }
                            /////////////////////////////////////////////////////
			}, elemento, autocomplete, 5);
			addFuncao(function(){
				elemento_auxiliar[0].val(autocomplete);
			}, elemento);
		}else{
			addFuncao(function (i) {
				elemento_auxiliar[0].keypress();
				elemento_auxiliar[0].keydown();
				elemento_auxiliar[0].keyup();
			}, elemento, '', 50);
		}
	}
	
	function objetoElementos(campo) {
                /*
		this.sleep = $(campo).attr("data-ajuda-sleep");
		this.clear = $(campo).attr("data-ajuda-clear");
		this.css = $(campo).attr("data-ajuda-css");
		this.aviso = $(campo).attr("data-ajuda-aviso");
		this.aviso_centro = $(campo).attr("data-ajuda-aviso-centro");
		this.ordem = parseInt($(campo).attr("data-ajuda-ordem"), 10);
		this.tempo = $(campo).attr("data-ajuda-tempo");
		this.preenche = $(campo).attr("data-ajuda-preenche");
		this.destaca = $(campo).attr("data-ajuda-destaca");
		this.remove_destaca = $(campo).attr("data-ajuda-remove-destaca");
		this.redireciona = $(campo).attr("data-ajuda-redireciona");
		this.clica = $(campo).attr("data-ajuda-clica");
		this.seleciona = $(campo).attr("data-ajuda-seleciona");
		this.seleciona_autocomplete = $(campo).attr("data-ajuda-seleciona-autocomplete");
		this.encerra = $(campo).attr("data-ajuda-encerra");
		if(typeof $(campo).attr("data-ajuda-id")=='undefined'){
			this.elemento = $(campo);
		}else{
			this.elemento = $(campo).attr("data-ajuda-id");
		}
                */
               this.sleep = campo.getAttribute("data-ajuda-sleep");
		this.clear = campo.getAttribute("data-ajuda-clear");
		this.css = campo.getAttribute("data-ajuda-css");
		this.aviso = campo.getAttribute("data-ajuda-aviso");
		this.aviso_centro = campo.getAttribute("data-ajuda-aviso-centro");
		this.ordem = parseInt(campo.getAttribute("data-ajuda-ordem"), 10);
		this.tempo = campo.getAttribute("data-ajuda-tempo");
		this.preenche = campo.getAttribute("data-ajuda-preenche");
		this.destaca = campo.getAttribute("data-ajuda-destaca");
		this.remove_destaca = campo.getAttribute("data-ajuda-remove-destaca");
		this.redireciona = campo.getAttribute("data-ajuda-redireciona");
		this.clica = campo.getAttribute("data-ajuda-clica");
		this.seleciona = campo.getAttribute("data-ajuda-seleciona");
		this.seleciona_autocomplete = campo.getAttribute("data-ajuda-seleciona-autocomplete");
		this.encerra = campo.getAttribute("data-ajuda-encerra");
		if(typeof campo.getAttribute("data-ajuda-id")=='undefined'){
			this.elemento = $(campo);
		}else{
			this.elemento = campo.getAttribute("data-ajuda-id");
		}
	}
	
	function verificaElementos() {
		var elementos_tmp = [];
                /*
                $("body").find("[data-ajuda-ordem]").each(function(){
                    elementos_tmp[elementos_tmp.length] = new objetoElementos(this);
		});
                */
		var elementos = document.querySelectorAll('[data-ajuda-ordem]');
		for (var i = 0; i < elementos.length; i++) {
                    var elemento = elementos[i];
                    elementos_tmp[elementos_tmp.length] = new objetoElementos(elemento);
                }
                /////////////////////////////////////////////////
                
                
		var elementos_ordenados = elementos_tmp;
		var tmp, proximo;
		for (var i = 0; i < elementos_ordenados.length; i++) {
			for (var j = 0; j < (elementos_ordenados.length - i - 1); j++) {
				proximo = j + 1;
				if (elementos_ordenados[j].ordem > elementos_ordenados[proximo].ordem) {
					tmp = elementos_ordenados[j];
					elementos_ordenados[j] = elementos_ordenados[proximo];
					elementos_ordenados[j + 1] = tmp;
				}
			}
		}
		for (var i = 0; i < elementos_ordenados.length; i++) {
			var elemento = elementos_ordenados[i];
			if (typeof elemento.tempo == 'undefined') {
				elemento.tempo = "500";
			}
			if (typeof elemento.destaca != 'undefined' && elemento.destaca != '') {
				addFuncao(function(){
					mascara_tutor();
					$('#conteiner').css('position', 'absolute');
					elemento_auxiliar[0].css('position', 'relative').css('z-index', '1001');
					$("[data-ajuda-destaca='"+valor_auxiliar[0]+"']").css("position", "relative").css("z-index", "1001");
				}, elemento.elemento, elemento.destaca,0);
			}
			if (typeof elemento.aviso != 'undefined' && elemento.aviso != '') {
				addFuncao(function(){
					irPara(elemento_auxiliar[0],700);
					aviso(elemento_auxiliar[0], valor_auxiliar[0], tempo[0], 't','amarelo');
				}, elemento.elemento, elemento.aviso, elemento.tempo);
			}
			if (typeof elemento.aviso_centro != 'undefined' && elemento.aviso_centro != '') {
				addFuncao(function(){
					irPara(elemento_auxiliar[0],700);
					aviso(elemento_auxiliar[0], valor_auxiliar[0], tempo[0], 'centro_pagina','amarelo');
				}, elemento.elemento, elemento.aviso_centro, elemento.tempo);
			}
			if (typeof elemento.preenche != 'undefined' && elemento.preenche != '') {
				digitaCampo(elemento.elemento, elemento.preenche, elemento.seleciona_autocomplete);
			}
			if (typeof elemento.redireciona != 'undefined' && elemento.redireciona != '') {
				addFuncao(function(){
					window.location.href=valor_auxiliar[0];
				}, elemento.elemento, elemento.redireciona, elemento.tempo);
			}
			if (typeof elemento.clica != 'undefined' && elemento.clica != '') {
				addFuncao(function(){
					elemento_auxiliar[0].click();
				}, elemento.elemento, '', 50);
			}
			if (typeof elemento.sleep != 'undefined' && elemento.sleep != '') {
				addFuncao(function(){

				},elemento.elemento,'', elemento.sleep)
			}
			if (typeof elemento.clear != 'undefined' && elemento.clear != '') {
				addFuncao(function(){
					elemento_auxiliar[0].val('');
				},elemento.elemento,'', elemento.tempo);
			}
			if (typeof elemento.css != 'undefined' && elemento.css != '') {
				if (typeof (elemento.elemento) == 'object') {
					var id_tmp = elemento.elemento.attr('id');
				}
				else {
					var id_tmp = elemento.elemento;
				}
				addFuncao(function(){
					var style = elemento_auxiliar[0].attr('style')+valor_auxiliar[0];
					elemento_auxiliar[0].attr('style',style);
				},elemento.elemento,elemento.css, elemento.tempo);
				addFuncao(function(){
					
					elemento_auxiliar[0].attr('style',valor_auxiliar[0]);
				},elemento.elemento,$('#'+id_tmp).attr('style'), 100);
			}
			if (typeof elemento.encerra != 'undefined' && elemento.encerra != '') {
				addFuncao(function(){
					parent.removerJanelaPopup();
				},elemento.elemento,'', elemento.tempo);
			}
			if (typeof elemento.remove_destaca != 'undefined' && elemento.remove_destaca != '') {
				addFuncao(function(){
					removeMascaraTutor();
				},elemento.elemento ,'', elemento.tempo);
			}
			if (typeof elemento.seleciona != 'undefined' && elemento.seleciona != '') {
				addFuncao(function(){
					elemento_auxiliar[0].find("option[value='"+valor_auxiliar[0]+"']").attr('selected','selected');
				},elemento.elemento ,elemento.seleciona, elemento.tempo);
			}
		}
		executaFuncoes();
	}
function mascara_tutor(){
	removeMascaraTutor();
        
        //$('body').append("<div id='mascara'></div>");
        document.getElementsByTagName("body")[0].innerHTML += "<div id='mascara'></div>";
        
        /*
        $('#mascara')
            .css("position", "fixed")
            .css("width", ($(window).width() - 1)+"px")
            .css("height", ($(window).height() - 1)+"px")
            .css("background-color", "#000000")
            .css("opacity", "0.5")
            .css("-moz-opacity", "0.5")
            .css("filter", "alpha(opacity=50)")
            .css("top", 1)
            .css("left", 1)
            .css("border","1px #ccc solid")
            .css("z-index", "50")
            .css("text-align", "center")
            .css("line-height", ($(window).height() - 1)+"px")
            .css("vertical-align", "middle");
         */
        var estiloMascara = "position: fixed;";
        estiloMascara += "width: "+window.innerWidth+"px;";
        estiloMascara += "height: "+window.innerHeight+"px;";
        estiloMascara += "background-color: #000000;";
        estiloMascara += "opacity: 0.5;";
        estiloMascara += "filter: alpha(opacity=50);";
        estiloMascara += "top: 1;";
        estiloMascara += "left: 1;";
        estiloMascara += "border: 1px #ccc solid;";
        estiloMascara += "z-index: 50px;";
        estiloMascara += "text-align: center;";
        estiloMascara += "line-height: "+window.innerHeight+"px;";
        estiloMascara += "vertical-align: middle;";
	document.getElementById("mascara").setAttribute("style", estiloMascara)
	
}
function removeMascaraTutor(){
	//$('#mascara').remove();
        document.getElementById("mascara").outerHTML = "";
        
        //$("[data-ajuda-destaca]").css('z-index', '1');
        var elementos = document.querySelectorAll("[data-ajuda-destaca]");
        for (var i = 0; i < elementos.length; i++) {
            var elemento = elementos[i];
            i.style.zIndex = 1;
        }
	
}
function irPara(id_elemento, tempo) {
    var id;
    if (typeof id_elemento == 'object') {
        if (!gE($(id_elemento).attr('id'))) {
            id = gerarIdAleatorio(id_elemento);
            $(id_elemento).attr('id', id);
        }
        else {
            id = $(id_elemento).attr('id');
        }
        id_elemento = id;
    }
    if (typeof tempo == 'undefined') {
        tempo = 500;
    }
	$('html, body').animate({
        scrollTop: (parseInt($("#" + id_elemento).offset().top) - 60)
    }, tempo);
}
