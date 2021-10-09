//////////////////////////////////////////////////////////////////////////// Contra copias

//	var ie4 = (document.all) ? true : false;	var ns4 = (document.layers) ? true : false;
//	var ns6 = (document.getElementById && !document.all) ? true : false;
//	var message="";
//	function clickIE() {if (document.all) {(message);return false;}}
//	function clickNS(e) {if (document.layers||(document.getElementById&&!document.all)){
//	if (e.which==2||e.which==3) {(message);return false;}}}
//	if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;} else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;} document.oncontextmenu=new Function("return false")
//	function disableselect(e){ return false }
//	function reEnable(){return true	};
//	document.onselectstart=new Function ("return false"); if (window.sidebar){document.onmousedown=disableselect; document.onclick=reEnable }

////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////moeda
  function moeda(z){  
                v = z.value;
                v=v.replace(/\D/g,"")  //permite digitar apenas números
        v=v.replace(/[0-9]{12}/,"inválido")   //limita pra máximo 999.999.999,99
        v=v.replace(/(\d{1})(\d{8})$/,"$1.$2")  //coloca ponto antes dos últimos 8 digitos
        v=v.replace(/(\d{1})(\d{5})$/,"$1.$2")  //coloca ponto antes dos últimos 5 digitos
        v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2")        //coloca virgula antes dos últimos 2 digitos
                z.value = v;
        }

////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////// mascara moeda
function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true;
    key = String.fromCharCode(whichCode); // Valor para o código da Chave
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida
    len = objTextBox.value.length;
    for(i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) objTextBox.value = '';
    if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
    if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
    }
    return false;
}

///////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////
function atualizaIframe(){

//redimencionar na vertical
var tamanho = document.getElementById("container").offsetHeight;
parent.document.getElementById("iFrameNews").style.height = tamanho;

//redimencionar na horizontal
var tamanhow = document.getElementById("container").offsetWidth;
parent.document.getElementById("iFrameNews").style.width = tamanhow;
}
//////////////////////////////////////////////////////////////////////////////////


//////////////////// Validação do Formulário add fotosgaleria

	function Valida_add_fotosgal(){
		

		if(form1.form_idtbgalerias.value == ""){
			alert("Informe a Galeria!");
  		   form1.form_idtbgalerias.focus();return false;
			}


		if(form1.form_img1.value == ""){
			alert("Selecione uma foto!");
  		   form1.form_img1.focus();return false;
			}


if(form1.form_img1.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img1.value.substr
( form1.form_img1.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img1.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg!");
       return false;
     }
	 }}

}

/////////////////////////////////////////////////////////////////////////////

//////////////////// Validação do Formulário add procat

	function Valida_add_procat(){
		

		if(form1.form_idtbprodutos.value == ""){
			alert("Informe o produto!");
			form1.form_idtbprodutos.focus();return false;
			}

		if(form1.form_idtbcategorias.value == ""){
			alert("Informe a categoria!");
			form1.form_idtbcategorias.focus();return false;
			}


}

/////////////////////////////////////////////////////////////////////////////

//////////////////// Validação do Formulário add fornecedores

	function Valida_add_fornecedores(){
		

		if(form1.form_nome.value == ""){
			alert("Informe o nome do fornecedor!");
			form1.form_nome.focus();return false;
			}


}

/////////////////////////////////////////////////////////////////////////////


//////////////////// Validação do Formulário add categoria 

	function Valida_add_categoria(){
		

		if(form1.form_nome.value == ""){
			alert("Informe o nome da categoria!");
			form1.form_nome.focus();return false;
			}


}

/////////////////////////////////////////////////////////////////////////////


//////////////////// Validação do Formulário edit categoria galerias

	function Valida_edit_galeria(){
		

		if(form1.form_nome.value == ""){
			alert("Informe o nome da categoria!");
			form1.form_nome.focus();return false;
			}

if(form1.form_img1.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img1.value.substr
( form1.form_img1.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img1.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg !");
       return false;
     }
	 }}

}

/////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////COMBO DINAMICO
function list_dados( valor )
{
  http.open("GET", "result_combo.php?id=" + valor, true);
  http.onreadystatechange = handleHttpResponse;
  http.send(null);
}

function handleHttpResponse()
{
  campo_select = document.forms[0].subcategoria;
  if (http.readyState == 4) {
    campo_select.options.length = 0;
    results = http.responseText.split(",");
    for( i = 0; i < results.length; i++ )
    { 
      string = results[i].split( "|" );
      campo_select.options[i] = new Option( string[0], string[1] );
    }
  }
}


function getHTTPObject() {
var req;
 
try {
 if (window.XMLHttpRequest) {
  req = new XMLHttpRequest();
 
  if (req.readyState == null) {
   req.readyState = 1;
   req.addEventListener("load", function () {
   req.readyState = 4;
 
   if (typeof req.onReadyStateChange == "function")
    req.onReadyStateChange();
   }, false);
  }
 
  return req;
 }
 
 if (window.ActiveXObject) {
  var prefixes = ["MSXML2", "Microsoft", "MSXML", "MSXML3"];
 
  for (var i = 0; i < prefixes.length; i++) {
   try {
    req = new ActiveXObject(prefixes[i] + ".XmlHttp");
    return req;
   } catch (ex) {};
 
  }
 }
} catch (ex) {}
 
alert("XmlHttp Objects not supported by client browser");
}
var http = getHTTPObject();
// Logo após fazer a verificação, é chamada a função e passada 
// o valor à variável global http.

///////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////// pop up
function NewWindow(mypage, myname, w, h, scroll) {
var winl = (screen.width - w) / 2;
var wint = (screen.height - h) / 2;
winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable'
win = window.open(mypage, myname, winprops)
if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
}
////////////////////////////////////////////////////////////////////////////////////

//////////////////// limpar campo text se checkbox selecionado
//usar no checkbox  onClick="desabilita_preco();"
function desabilita_preco() {

    if (document.form1.form_sobconsulta.checked) {
      
		document.form1.form_preco.disabled = true;
		document.form1.form_preco.value = '';
		
		var form_preco = document.getElementById("form_preco");
		var form_preconovo = form_preco.cloneNode( true );
		form_preco.parentNode.replaceChild( form_preconovo, form_preco );
       
    } else {
        document.form1.form_preco.disabled = false;
    }

}

///////////////////////////////////////////////////////////////////////



//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_img();"
function desabilita_img() {

    if (document.form1.form_del_img.checked) {
      
		document.form1.form_img.disabled = true;

		var form_img = document.getElementById("form_img");
		var form_imgnovo = form_img.cloneNode( true );
		form_img.parentNode.replaceChild( form_imgnovo, form_img );
       
    } else {
        document.form1.form_img.disabled = false;
    }

}

///////////////////////////////////////////////////////////////////////


//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_img1();"
function desabilita_img1() {

    if (document.form1.form_del_img1.checked) {
      
		document.form1.form_img1.disabled = true;

		var form_img1 = document.getElementById("form_img1");
		var form_img1novo = form_img1.cloneNode( true );
		form_img1.parentNode.replaceChild( form_img1novo, form_img1 );
       
    } else {
        document.form1.form_img1.disabled = false;
    }

}



//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_img2();"
function desabilita_img2() {

    if (document.form1.form_del_img2.checked) {
      
		document.form1.form_img2.disabled = true;

		var form_img2 = document.getElementById("form_img2");
		var form_img2novo = form_img2.cloneNode( true );
		form_img2.parentNode.replaceChild( form_img2novo, form_img2 );
       
    } else {
        document.form1.form_img2.disabled = false;
    }

}




//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_img3();"
function desabilita_img3() {

    if (document.form1.form_del_img3.checked) {
      
		document.form1.form_img3.disabled = true;

		var form_img3 = document.getElementById("form_img3");
		var form_img3novo = form_img3.cloneNode( true );
		form_img3.parentNode.replaceChild( form_img3novo, form_img3 );
       
    } else {
        document.form1.form_img3.disabled = false;
    }

}




//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_img4();"
function desabilita_img4() {

    if (document.form1.form_del_img4.checked) {
      
		document.form1.form_img4.disabled = true;

		var form_img4 = document.getElementById("form_img4");
		var form_img4novo = form_img4.cloneNode( true );
		form_img4.parentNode.replaceChild( form_img4novo, form_img4 );
       
    } else {
        document.form1.form_img4.disabled = false;
    }

}




//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_img5();"
function desabilita_img5() {

    if (document.form1.form_del_img5.checked) {
      
		document.form1.form_img5.disabled = true;

		var form_img5 = document.getElementById("form_img5");
		var form_img5novo = form_img5.cloneNode( true );
		form_img5.parentNode.replaceChild( form_img5novo, form_img5 );
       
    } else {
        document.form1.form_img5.disabled = false;
    }

}




//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_img5();"
function desabilita_img6() {

    if (document.form1.form_del_img6.checked) {
      
		document.form1.form_img6.disabled = true;

		var form_img6 = document.getElementById("form_img6");
		var form_img6novo = form_img6.cloneNode( true );
		form_img6.parentNode.replaceChild( form_img6novo, form_img6 );
       
    } else {
        document.form1.form_img6.disabled = false;
    }

}




//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_img5();"
function desabilita_img7() {

    if (document.form1.form_del_img7.checked) {
      
		document.form1.form_img7.disabled = true;

		var form_img7 = document.getElementById("form_img7");
		var form_img7novo = form_img7.cloneNode( true );
		form_img7.parentNode.replaceChild( form_img7novo, form_img7 );
       
    } else {
        document.form1.form_img7.disabled = false;
    }

}





//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_img5();"
function desabilita_img8() {

    if (document.form1.form_del_img8.checked) {
      
		document.form1.form_img8.disabled = true;

		var form_img8 = document.getElementById("form_img8");
		var form_img8novo = form_img8.cloneNode( true );
		form_img8.parentNode.replaceChild( form_img8novo, form_img8 );
       
    } else {
        document.form1.form_img8.disabled = false;
    }

}





//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_img5();"
function desabilita_img9() {

    if (document.form1.form_del_img9.checked) {
      
		document.form1.form_img9.disabled = true;

		var form_img9 = document.getElementById("form_img9");
		var form_img9novo = form_img9.cloneNode( true );
		form_img9.parentNode.replaceChild( form_img9novo, form_img9 );
       
    } else {
        document.form1.form_img9.disabled = false;
    }

}





//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_img5();"
function desabilita_img10() {

    if (document.form1.form_del_img10.checked) {
      
		document.form1.form_img10.disabled = true;

		var form_img10 = document.getElementById("form_img10");
		var form_img10novo = form_img10.cloneNode( true );
		form_img10.parentNode.replaceChild( form_img10novo, form_img10 );
       
    } else {
        document.form1.form_img10.disabled = false;
    }

}


////////////////////////////////////////// Contagem Caracteres textarea

function counterUpdate(opt_countedTextBox, opt_countBody, opt_maxSize) { 
var countedTextBox = opt_countedTextBox ? opt_countedTextBox : "form_area"; 
var countBody = opt_countBody ? opt_countBody : "countBody"; 
var maxSize = opt_maxSize ? opt_maxSize : 1024; 

var field = document.getElementById(countedTextBox); 

if (field && field.value.length >= maxSize) { 
field.value = field.value.substring(0, maxSize); 
} 
var txtField = document.getElementById(countBody); 
if (txtField) { 
txtField.innerHTML = field.value.length; 
} 
} 

///////////////////////////////////////////////////////////////////////


////////////////////////////////////////// Contagem Caracteres textarea 2

function counterUpdate2(opt_countedTextBox2, opt_countBody2, opt_maxSize2) { 
var countedTextBox2 = opt_countedTextBox2 ? opt_countedTextBox2 : "form_txtdestaque"; 
var countBody2 = opt_countBody2 ? opt_countBody2 : "countBody2"; 
var maxSize2 = opt_maxSize2 ? opt_maxSize2 : 1024; 

var field2 = document.getElementById(countedTextBox2); 

if (field2 && field2.value.length >= maxSize2) { 
field2.value = field2.value.substring(0, maxSize2); 
} 
var txtField2 = document.getElementById(countBody2); 
if (txtField2) { 
txtField2.innerHTML = field2.value.length; 
} 
} 

///////////////////////////////////////////////////////////////////////



//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_fotoprod();"
function desabilita_fotoprod() {

    if (document.form1.form_del_fotoprod.checked) {
      
		document.form1.form_img.disabled = true;

		var form_img = document.getElementById("form_img");
		var form_imgnovo = form_img.cloneNode( true );
		form_img.parentNode.replaceChild( form_imgnovo, form_img );
       
    } else {
        document.form1.form_img.disabled = false;
    }

}

///////////////////////////////////////////////////////////////////////



//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_logo();"
function desabilita_logo() {

    if (document.form1.form_del_logo.checked) {
      
		document.form1.form_img.disabled = true;

		var form_img = document.getElementById("form_img");
		var form_imgnovo = form_img.cloneNode( true );
		form_img.parentNode.replaceChild( form_imgnovo, form_img );
       
    } else {
        document.form1.form_img.disabled = false;
    }

}

///////////////////////////////////////////////////////////////////////

//////////////////// limpar campo file se checkbox selecionado
//usar no checkbox  onClick="desabilita_mapa();"
function desabilita_mapa() {

    if (document.form1.form_del_mapa.checked) {
      
		document.form1.form_mapa.disabled = true;

		var form_mapa = document.getElementById("form_mapa");
		var form_mapanovo = form_mapa.cloneNode( true );
		form_mapa.parentNode.replaceChild( form_mapanovo, form_mapa );
       
    } else {
        document.form1.form_mapa.disabled = false;
    }

}

///////////////////////////////////////////////////////////////////////


//////////////////// abilitar arquivos flash

// When the page loads: 
window.onload = function(){ 
if (document.getElementsByTagName) { 
// Get all the tags of type object in the page. 
var objs = document.getElementsByTagName("object"); 
for (i=0; i<objs.length; i++) { 
// Get the HTML content of each object tag 
// and replace it with itself. 
objs[i].outerHTML = objs[i].outerHTML; 
} 
} 
} 
// When the page unloads: 
window.onunload = function() { 
if (document.getElementsByTagName) { 
//Get all the tags of type object in the page. 
var objs = document.getElementsByTagName("object"); 
for (i=0; i<objs.length; i++) { 
// Clear out the HTML content of each object tag 
// to prevent an IE memory leak issue. 
objs[i].outerHTML = ""; 
} 
} 
}

/////////////////////////////////////////////////////////////////


//////////////////////////// Controle Banner Camada
function abrir_banner(expand) {
if(expand == "abre"){
document.getElementById('banner_que_abre').style.height=200;
} else if(expand == "naoabre") {
document.getElementById('banner_que_abre').style.height=58;
}
}
///////////////////////////////////////////

//////////////////////////// Controle Banner Camada tres
function abrir_banner_tres(expand) {
if(expand == "abre_tres"){
document.getElementById('banner_que_abre_tres').style.height=200;
} else if(expand == "naoabre_tres") {
document.getElementById('banner_que_abre_tres').style.height=58;
}
}
///////////////////////////////////////////

//////////////////////////// Controle Banner Camada dois
function abrir_banner_dois(expand) {
if(expand == "abre_dois"){
document.getElementById('banner_que_abre_dois').style.height=200;
} else if(expand == "naoabre_dois") {
document.getElementById('banner_que_abre_dois').style.height=58;
}
}
///////////////////////////////////////////


///Valida Formulario de indicação de materia
function ValidaFormMateria(){

		if(form1.seunome.value == ""){
			alert("Todos os campos são de preencimento obrigatório!");
			form1.seunome.focus();return false;
			}

		if(form1.seuemail.value == ""){
			alert("Todos os campos são de preencimento obrigatório!");
			form1.seuemail.focus();return false;
			}

		if(form1.nomeamigo.value == ""){
			alert("Todos os campos são de preencimento obrigatório!!");
			form1.nomeamigo.focus();return false;
			}

		if(form1.emailamigo.value == ""){
			alert("Todos os campos são de preencimento obrigatório!");
			form1.emailamigo.focus();return false;
			}

}
////////////////////////////////////////


///////////////////////////////Valida Formulario do email
function ValidaFormEmail(){

		if(form1.nome.value == ""){
			alert("Informe seu nome por gentileza!");
			form1.nome.focus();return false;
			}

		if(form1.email.value == ""){
			alert("Informe seu e-mail por gentileza!");
			form1.email.focus();return false;
			}

		if(form1.telefone.value == ""){
			alert("Informe seu telefone por gentileza!");
			form1.telefone.focus();return false;
			}

		if(form1.mensagem.value == ""){
			alert("Digite sua mensagem por gentileza!");
			form1.mensagem.focus();return false;
			}

}
////////////////////////////////////////



//////////////////// adiciona Pop Image
//usar <a href="javascript:popImage('img/trab/aludex.jpg','Serviços Realizados')">
PositionX = 200;
PositionY = 200;

// Set these value approximately 20 pixels greater than the
// size of the largest image to be used (needed for Netscape)

defaultWidth  = 500;
defaultHeight = 500;

// Set autoclose true to have the window close automatically
// Set autoclose false to allow multiple popup windows

var AutoClose = true;

// Do not edit below this line...
// ================================
if (parseInt(navigator.appVersion.charAt(0))>=4){
var isNN=(navigator.appName=="Netscape")?1:0;
var isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}
var optNN='scrollbars=no,width='+defaultWidth+',height='+defaultHeight+',left='+PositionX+',top='+PositionY;
var optIE='scrollbars=no,width=170,height=100,left='+PositionX+',top='+PositionY;
function popImage(imageURL,imageTitle){
if (isNN){imgWin=window.open('about:blank','',optNN);}
if (isIE){imgWin=window.open('about:blank','',optIE);}
with (imgWin.document){
writeln('<html><head><title>Carregando...</title><style>body{margin:0px;}</style>');writeln('<sc'+'ript>');
writeln('var isNN,isIE;');writeln('if (parseInt(navigator.appVersion.charAt(0))>=4){');
writeln('isNN=(navigator.appName=="Netscape")?1:0;');writeln('isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}');
writeln('function reSizeToImage(){');writeln('if (isIE){');writeln('window.resizeTo(100,100);');
writeln('width=100-(document.body.clientWidth-document.images[0].width);');
writeln('height=100-(document.body.clientHeight-document.images[0].height);');
writeln('window.resizeTo(width,height);}');writeln('if (isNN){');       
writeln('window.innerWidth=document.images["George"].width;');writeln('window.innerHeight=document.images["George"].height;}}');
writeln('function doTitle(){document.title="'+imageTitle+'";}');writeln('</sc'+'ript>');
if (!AutoClose) writeln('</head><body bgcolor=000000 scroll="no" onload="reSizeToImage();doTitle();self.focus()">')
else writeln('</head><body background="img/loading.gif" scroll="no" onload="reSizeToImage();doTitle();self.focus()" onblur="self.close()">');
writeln('<img name="George" src='+imageURL+' style="display:block"></body></html>');
close();		
}}

/////////////////////////////////////////////////////////////////////////////


///Valida Formulario de indicação de materia
function Valida_add_carro(){



			if(form1.form_sinistro.value == ""){
			alert("Informe se o veículo é sinistrado!");
			form1.form_sinistro.focus();return false;
			}

			if(form1.form_marca.value == ""){
			alert("Selecione uma marca para o veículo por gentileza!");
			form1.form_marca.focus();return false;
			}

		if(form1.form_modelo.value == ""){
			alert("Informe o modelo do veículo!");
			form1.form_modelo.focus();return false;
			}

		if(form1.form_anomodelo.value == ""){
			alert("Informe o ano de fabricação / ano do modelo!");
			form1.form_anomodelo.focus();return false;
			}

		if(form1.form_cor.value == ""){
			alert("Informe a cor do veículo!");
			form1.form_cor.focus();return false;
			}

		if(form1.form_combustivel.value == ""){
			alert("Selecione o tipo de combustíbel do veículo!");
			form1.form_combustivel.focus();return false;
			}

		if(form1.form_preco.value == ""){
			alert("Informe o preço de veículo!");
			form1.form_preco.focus();return false;
			}
			
		if(form1.form_transmissao.value == ""){
			alert("Selecione um tipo de transmissão para o veículo!");
			form1.form_transmissao.focus();return false;
			}

if(form1.form_img1.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img1.value.substr
( form1.form_img1.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img1.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a foto 1!");
       return false;
     }
	 }
  
 }
 
 if(form1.form_img2.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img2.value.substr
( form1.form_img2.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img2.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a foto 2!");
       return false;
     }
	 }
  
 }
 
 if(form1.form_img3.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img3.value.substr
( form1.form_img3.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img3.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a foto 3!");
       return false;
     }
	 }
  
 }
 
 if(form1.form_img4.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img4.value.substr
( form1.form_img4.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img4.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a foto 4!");
       return false;
     }
	 }
  
 }

if(form1.form_img5.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img5.value.substr
( form1.form_img5.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img5.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a foto 5!");
       return false;
     }
	 }
   
 }


if(form1.form_img6.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img6.value.substr
( form1.form_img6.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img6.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a foto 6!");
       return false;
     }
	 }
   
 }


if(form1.form_img7.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img7.value.substr
( form1.form_img7.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img7.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a foto 7!");
       return false;
     }
	 }
   
 }


if(form1.form_img8.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img8.value.substr
( form1.form_img8.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img8.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a foto 8!");
       return false;
     }
	 }
   
 }


if(form1.form_img9.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img9.value.substr
( form1.form_img9.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img9.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a foto 9!");
       return false;
     }
	 }
   
 }


if(form1.form_img10.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img10.value.substr
( form1.form_img10.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img10.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a foto 10!");
       return false;
     }
	 }
   
 }



}
////////////////////////////////////////




//////////////////// adiciona mascara de cnpj
//<input type="text" name="cnpj" onKeyPress="MascaraCNPJ(form1.cnpj);" maxlength="18" onBlur="ValidarCNPJ(form1.cnpj);">
function MascaraCNPJ(cnpj){
    if(mascaraInteiro(cnpj)==false){
        event.returnValue = false;
    }    
    return formataCampo(cnpj, '00.000.000/0000-00', event);
}

//////////////////// adiciona mascara de cep
// <input type="text" name="cep" onKeyPress="MascaraCep(form1.cep);" maxlength="10" onBlur="ValidaCep(form1.cep)">


function MascaraCep(cep){
        if(mascaraInteiro(cep)==false){
        event.returnValue = false;
    }    
    return formataCampo(cep, '00.000-000', event);
}


//////////////////// adiciona placa
//<input type="text" name="form_placa" onKeyPress="MascaraPlaca(form1.form_placa);" maxlength="8">

function MascaraPlaca(form_placa){    
    return formataCampo(form_placa, '000-0000', event);
}



//////////////////// adiciona mascara de data
//<input type="text" name="data" onKeyPress="MascaraData(form1.data);" maxlength="10" onBlur= "ValidaDataform1.data);">

function MascaraData(data){
    if(mascaraInteiro(data)==false){
        event.returnValue = false;
    }    
    return formataCampo(data, '00/00/0000', event);
}


//////////////////// adiciona mascara de data formato banco
//<input type="text" name="data" onKeyPress="MascaraDataBanco(form1.data);" maxlength="10" onBlur= "ValidaDataform1.data);">

function MascaraDataBanco(data){
    if(mascaraInteiro(data)==false){
        event.returnValue = false;
    }    
    return formataCampo(data, '0000-00-00', event);
}


//////////////////// adiciona mascara ao telefone
//<input type="text" name="tel" onKeyPress="MascaraTelefone(form1.tel);" maxlength="14"  onBlur="ValidaTelefone(form1.tel);">

function MascaraTelefone(tel){    
    if(mascaraInteiro(tel)==false){
        event.returnValue = false;
    }    
    return formataCampo(tel, '(00) 0000-0000', event);
}


//////////////////// adiciona mascara ao CPF
//<input type="text" name="cpf" onBlur="ValidarCPF(form1.cpf);" onKeyPress="MascaraCPF(form1.cpf);" maxlength="14">

function MascaraCPF(cpf){
    if(mascaraInteiro(cpf)==false){
        event.returnValue = false;
    }    
    return formataCampo(cpf, '000.000.000-00', event);
}



//////////////////// valida telefone
function ValidaTelefone(tel){
    exp = /\(\d{2}\)\ \d{4}\-\d{4}/
    if(!exp.test(tel.value))
        alert('Numero de Telefone Invalido!');
		
}


//////////////////// valida CEP
function ValidaCep(cep){
    exp = /\d{2}\.\d{3}\-\d{3}/
    if(!exp.test(cep.value))
        alert('Numero de Cep Invalido!');        
}

//////////////////// valida data
function ValidaData(data){
    exp = /\d{2}\/\d{2}\/\d{4}/
    if(!exp.test(data.value))
        alert('Data Invalida!');            
}

//////////////////// valida o CPF digitado
function ValidarCPF(Objcpf){
    var cpf = Objcpf.value;
    exp = /\.|\-/g
    cpf = cpf.toString().replace( exp, "" ); 
    var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
    var soma1=0, soma2=0;
    var vlr =11;
    
    for(i=0;i<9;i++){
        soma1+=eval(cpf.charAt(i)*(vlr-1));
        soma2+=eval(cpf.charAt(i)*vlr);
        vlr--;
    }    
    soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
    soma2=(((soma2+(2*soma1))*10)%11);
    
    var digitoGerado=(soma1*10)+soma2;
    if(digitoGerado!=digitoDigitado)    
        alert('CPF Invalido!');        
}

//////////////////// valida numero inteiro com mascara
function mascaraInteiro(){
    if (event.keyCode < 48 || event.keyCode > 57){
        event.returnValue = false;
        return false;
    }
    return true;
}

//////////////////// valida o CNPJ digitado
function ValidarCNPJ(ObjCnpj){
    var cnpj = ObjCnpj.value;
    var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
    var dig1= new Number;
    var dig2= new Number;
    
    exp = /\.|\-|\//g
    cnpj = cnpj.toString().replace( exp, "" ); 
    var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));
        
    for(i = 0; i<valida.length; i++){
        dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);    
        dig2 += cnpj.charAt(i)*valida[i];    
    }
    dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
    dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));
    
    if(((dig1*10)+dig2) != digito)    
        alert('CNPJ Invalido!');
        
}

//////////////////// formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
    var boleanoMascara; 
    
    var Digitato = evento.keyCode;
    exp = /\-|\.|\/|\(|\)| /g
    campoSoNumeros = campo.value.toString().replace( exp, "" ); 
   
    var posicaoCampo = 0;     
    var NovoValorCampo="";
    var TamanhoMascara = campoSoNumeros.length;; 
    
    if (Digitato != 8) { // backspace 
        for(i=0; i<= TamanhoMascara; i++) { 
            boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                || (Mascara.charAt(i) == "/")) 
            boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
            if (boleanoMascara) { 
                NovoValorCampo += Mascara.charAt(i); 
                  TamanhoMascara++;
            }else { 
                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                posicaoCampo++; 
              }            
          }     
        campo.value = NovoValorCampo;
          return true; 
    }else { 
        return true; 
    }
}


//////////////////// Função para aceitar somente números no text box
// use via onKeyPress="SoNumeros()" no textbox

function SoNumeros()
{
var carCode = event.keyCode;
if ((carCode < 48) || (carCode > 57))
{
 alert('Por favor digite apenas números.');
 event.cancelBubble = true
 event.returnValue = false;
}
}

/////////////////////////////////////////////////////////////////////////////

function maisCampos() {
var numero = document.getElementById("numero").value;
var espaco = document.getElementById("espaco");
for (var i = 0; i < numero; i++) {
espaco.innerHTML = "<input type='text' value='Exemplo'><br>";
}
}


/////////////////// Função para alternar a subcategoria dependendo da categoria selecionada na adição de anunciante

var form_subcategoria_Alimentação=new Array("","Açougues","Bares e Cafés","Bebidas","Churrascarias","Distribuidores","Panificadoras","Pizzarias","Restaurantes","Sorveterias","Supermercados")
var form_subcategoria_Animais=new Array("","Agropecuárias","Clínicas Veterinárias")
var form_subcategoria_Beleza=new Array("","Clínicas Estéticas","Lojas Cosméticos","Salões Beleza","Perfumaria")
var form_subcategoria_Carros_e_Motos=new Array("","Ar Condicionado","Auto-Elétricas","Auto-Escolas","Concessionárias","Consórcio","Despachantes","Funilaria e Pintura","Garagens e Lojas","Lavagem/Polimento","Locadoras","Oficinas Mecânicas","Peças e Acessórios","Pneus e Suspensão","Posto Combustível","Som e Acessórios")
var form_subcategoria_Casa_e_Decoração=new Array("","Consórcio","Imobiliárias","Lojas","Móveis Planejados","Refrigeração")
var form_subcategoria_Construção=new Array("","Arquitetos","Construtoras","Engenheiros","Esquadrias","Ferragens","Funilaria","Gesso","Hidráulica","Material Elétrico","Madeireiras","Marmorarias","Material Construção","Metalurgicas","Tintas","Vidraçarias","Lojas Decoração")
var form_subcategoria_Economia=new Array("","Agências Bancárias","Agências de Crédito","Contabilidade")
var form_subcategoria_Educação=new Array("","Cursos","Ensino Superior","Escolas/Colégios","Escolas de Idiomas","Livraria/Papelaria")
var form_subcategoria_Festas=new Array("","Buffet","Salões de Festas","Sites de Festas","Video/Foto/Som")
var form_subcategoria_Indústrias=new Array("","Alimentos","Confecção","Máquinas","Móveis")
var form_subcategoria_Informática=new Array("","Assistência Técnica","Desenv. Sites","Desenv. Sotwares","Lojas Informática")
var form_subcategoria_Lazer=new Array("","Academias","Camping Pesca","Clubes","Material Esportivo","Vídeos Locadoras")
var form_subcategoria_Moda=new Array("","Boutiques","Calçados","Cama/Mesa/Banho","Roupas e Acessórios","Uniformes")
var form_subcategoria_Produtos_Diversos=new Array("","Brinquedos/Presentes","Embalagens e Utilid.","Floriculturas","Loterias","Óticas e Joalherias")
var form_subcategoria_Publicidade=new Array("","Agências de Publicidade","Comunicação Visual","Gráficas","Jornais","Rádios","Revistas")
var form_subcategoria_Saúde=new Array("","Dentistas","Farmácias","Laboratórios","Oftalmologistas","Ortopedia","Planos de Saúde","Postos de Saúde","Pscicólogos")
var form_subcategoria_Serviços_Diversos=new Array("","Eletrônicas","Escritórios Advocacia","Studios Fotográficos","Transportadoras","Tatuagem")
var form_subcategoria_Telefonia=new Array("","Celulares","Telefone Fixo")
var form_subcategoria_Turismo=new Array("","Agências Turismo","Hóteis","Transporte")
var form_subcategoria_Utilidade_Pública=new Array("","Cartórios","Emergências","Órgãos Públicos","Táxi")


function cambia_form_subcategoria(){
	var form_categoria
	form_categoria = document.form1.form_categoria[document.form1.form_categoria.selectedIndex].value
	if (form_categoria != 0) {
		mis_form_subcategoria=eval("form_subcategoria_" + form_categoria)
		num_form_subcategoria = mis_form_subcategoria.length
		document.form1.form_subcategoria.length = num_form_subcategoria
		for(i=0;i<num_form_subcategoria;i++){
		   document.form1.form_subcategoria.options[i].value=mis_form_subcategoria[i]
		   document.form1.form_subcategoria.options[i].text=mis_form_subcategoria[i]
		}	
	}else{
		document.form1.form_subcategoria.length = 1
		document.form1.form_subcategoria.options[0].value = ""
	    document.form1.form_subcategoria.options[0].text = ""
	}
	document.form1.form_subcategoria.options[0].selected = true
}

/////////////////////////////////////////////////////////////////////////////

//////////////////// Função para menu drop Down

function Ver(id1, id2) {
  if (id1 != '') abreMenu(id1);
  if (id2 != '') abreMenu(id2);
}
function abreMenu(id) {
  var itm = null;
  if (document.getElementById) {
		itm = document.getElementById(id);
  } else if (document.all){
		itm = document.all[id];
  } else if (document.layers){
		itm = document.layers[id];
  }
	
  if (!itm) {
  }
  else if (itm.style) {
		if (itm.style.display == "none") { itm.style.display = ""; }
	else { itm.style.display = "none"; }
    }
  else { itm.visibility = "show"; }
}	

/////////////////////////////////////////////////////////////////////////////


//////////////////// Validação do Formulário de adição e edição de Cli/Cat/Sub

	function Valida_clicatsub(){
		
		if(form1.form_cliente.value == ""){
			alert("Selecione um Anunciante!");
			form1.form_cliente.focus();return false;
			}

		if(form1.categoria.value == ""){
			alert("Selecione uma Categoria!");
			form1.categoria.focus();return false;
			}
		
		if(form1.subcategoria.value == ""){
			alert("Informe a subcategoria!");
			form1.subcategoria.focus();return false;
			}


}

/////////////////////////////////////////////////////////////////////////////



//////////////////// Validação do Formulário de adição e edição de Categorias

	function Valida_add_categoria(){
		
		if(form1.form_nome.value == ""){
			alert("Informe um nome para a nova categoria!");
			form1.form_nome.focus();return false;
			}

}

/////////////////////////////////////////////////////////////////////////////



//////////////////// Validação do Formulário de adição e edição de SubCategorias

	function Valida_add_subcategoria(){
		
		if(form1.categoria.value == ""){
			alert("Selecione a Categoria em que deseja adicionar a Subcategoria!");
			form1.categoria.focus();return false;
			}

		if(form1.form_nome.value == ""){
			alert("Informe um nome para a nova subcategoria!");
			form1.form_nome.focus();return false;
			}


}

/////////////////////////////////////////////////////////////////////////////



//////////////////// Validação do Formulário de adição e edição de SERVIÇOS

	function Valida_servicos(){
		
		if(form1.form_cliente.value == ""){
			alert("Informe o Anunciante a qual pertencerá os serviços!");
			form1.form_cliente.focus();return false;
			}

		if(form1.form_descr.value == ""){
			alert("Informe a descrição dos serviços realizados pelo anunciante!");
			form1.form_descr.focus();return false;
			}

}

/////////////////////////////////////////////////////////////////////////////


//////////////////// Validação do Formulário de adição de Foto servicos

	function Valida_add_fotoserv(){
		
		if(form1.form_cliente.value == ""){
			alert("Informe o Anunciante a qual pertencerá a foto do serviço!");
			form1.form_cliente.focus();return false;
			}
			
		if(form1.form_img.value == ""){
			alert("Selecione uma foto para adicionar aos serviços do anunciante!");
			form1.form_img.focus();return false;
			}			

if(form1.form_img.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img.value.substr
( form1.form_img.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg!");
       return false;
     }
	 }
   return true;
 }



}

/////////////////////////////////////////////////////////////////////////////


//////////////////// Validação do Formulário de adição de PRODUTOS

	function Valida_add_moveis(){
		

		if(form1.form_nome.value == ""){
			alert("Informe o nome do produto!");
			form1.form_nome.focus();return false;
			}

		if ((form1.form_preco.value == "") && (form1.form_sobconsulta.checked == false)){
			alert("Informe o preço do produto ou marque a opção Sob Consulta!");
			form1.form_preco.focus();return false;
			}

if(form1.form_img.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img.value.substr
( form1.form_img.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem!");
       return false;
     }
	 }
   return true;
 }



}

/////////////////////////////////////////////////////////////////////////////


//////////////////// Validação do Formulário de adição de PRODUTOS

	function Valida_add_cursos(){
		
		if(form1.form_nome.value == ""){
			alert("Informe o nome do curso!");
			form1.form_nome.focus();return false;
			}

		if(form1.form_data.value == ""){
			alert("Informe a data do curso!");
			form1.form_data.focus();return false;
			}

		if(form1.form_hora.value == ""){
			alert("Informe o horário do curso!");
			form1.form_hora.focus();return false;
			}

		if ((form1.form_preco.value == "") && (form1.form_sobconsulta.checked == false)){
			alert("Informe o preço do curso ou marque a opção Sob Consulta!");
			form1.form_preco.focus();return false;
			}

if(form1.form_img.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img.value.substr
( form1.form_img.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem!");
       return false;
     }
	 }
   return true;
 }



}

/////////////////////////////////////////////////////////////////////////////



//////////////////// Validação do Formulário de adição de PRODUTOS RS

	function Valida_add_produtos_rs(){
		
		if(form1.form_categorias.value == ""){
			alert("Informe a qual categoria pertencerá o produto!");
			form1.form_categorias.focus();return false;
			}

		if(form1.form_cliente.value == ""){
			alert("Informe o Anunciante a qual pertencerá o produto!");
			form1.form_cliente.focus();return false;
			}

		if(form1.form_nome.value == ""){
			alert("Informe o nome do produto!");
			form1.form_nome.focus();return false;
			}

		if ((form1.form_preco.value == "") && (form1.form_sobconsulta.checked == false)){
			alert("Informe o preço do produto ou marque a opção Sob Consulta!");
			form1.form_preco.focus();return false;
			}

if(form1.form_img.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img.value.substr
( form1.form_img.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg!");
       return false;
     }
	 }
   return true;
 }



}

/////////////////////////////////////////////////////////////////////////////




//////////////////// Validação do Formulário de adição de MATÉRIAS

	function Valida_add_materias(){
		
		if(form1.form_categoria.value == ""){
			alert("Informe a Categoria em que deseja adicionar o anunciante!");
			form1.form_categoria.focus();return false;
			}

		if(form1.form_data.value == ""){
			alert("Informe uma data para a matéria!");
			form1.form_data.focus();return false;
			}

		if(form1.form_titulo.value == ""){
			alert("Informe o título da matéria!");
			form1.form_titulo.focus();return false;
			}

		if(form1.form_texto.value == ""){
			alert("Informe o texto da matéria!");
			form1.form_texto.focus();return false;
			}

if(form1.form_img.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img.value.substr
( form1.form_img.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg!");
       return false;
     }
	 }
   return true;
 }



}

/////////////////////////////////////////////////////////////////////////////


//////////////////// Validação do Formulário de adição de Produtos

	function Valida_add_produtos(){
		

		if(form1.form_idtbfornecedores.value == ""){
			alert("Selecione uma marca!");
			form1.form_idtbfornecedores.focus();return false;
			}


		if(form1.form_sit.value == ""){
			alert("Informe a situação do produto!");
			form1.form_sit.focus();return false;
			}

		if(form1.form_titulo.value == ""){
			alert("Informe o nome do produto!");
			form1.form_titulo.focus();return false;
			}


		if(form1.form_texto.value == ""){
			alert("Informe a descrição do produto!");
			form1.form_texto.focus();return false;
			}


		if ((form1.form_preco.value == "") && (form1.form_sobconsulta.checked == false)){
			alert("Informe o preço do produto ou marque a opção Sob Consulta!");
			form1.form_preco.focus();return false;
			}



if(form1.form_img1.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img1.value.substr
( form1.form_img1.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img1.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 1!");
       return false;
     }
	 }


if(form1.form_img2.value != ""){
   var extensoesOk2 = ",.jpg,";
   var extensao2    = "," + form1.form_img2.value.substr
( form1.form_img2.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img2.value != "" ){
   if( extensoesOk2.indexOf( extensao2 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 2!");
       return false;
     }
	 }


if(form1.form_img3.value != ""){
   var extensoesOk3 = ",.jpg,";
   var extensao3    = "," + form1.form_img3.value.substr
( form1.form_img3.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img3.value != "" ){
   if( extensoesOk3.indexOf( extensao3 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 3!");
       return false;
     }
	 }


if(form1.form_img4.value != ""){
   var extensoesOk4 = ",.jpg,";
   var extensao4    = "," + form1.form_img4.value.substr
( form1.form_img4.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img4.value != "" ){
   if( extensoesOk4.indexOf( extensao4 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 4!");
       return false;
     }
	 }





if(form1.form_img5.value != ""){
   var extensoesOk5 = ",.jpg,";
   var extensao5    = "," + form1.form_img5.value.substr
( form1.form_img5.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img5.value != "" ){
   if( extensoesOk5.indexOf( extensao5 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 5!");
       return false;
     }
	 }





if(form1.form_img6.value != ""){
   var extensoesOk6 = ",.jpg,";
   var extensao6    = "," + form1.form_img6.value.substr
( form1.form_img6.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img6.value != "" ){
   if( extensoesOk6.indexOf( extensao6 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 6!");
       return false;
     }
	 }





if(form1.form_img7.value != ""){
   var extensoesOk7 = ",.jpg,";
   var extensao7    = "," + form1.form_img7.value.substr
( form1.form_img7.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img7.value != "" ){
   if( extensoesOk7.indexOf( extensao7 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 7!");
       return false;
     }
	 }





if(form1.form_img8.value != ""){
   var extensoesOk8 = ",.jpg,";
   var extensao8    = "," + form1.form_img8.value.substr
( form1.form_img8.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img8.value != "" ){
   if( extensoesOk8.indexOf( extensao8 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 8!");
       return false;
     }






if(form1.form_img9.value != ""){
   var extensoesOk9 = ",.jpg,";
   var extensao9    = "," + form1.form_img9.value.substr
( form1.form_img9.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img9.value != "" ){
   if( extensoesOk9.indexOf( extensao9 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 9!");
       return false;
     }
	 }
 

if(form1.form_img10.value != ""){
   var extensoesOk10 = ",.jpg,";
   var extensao10    = "," + form1.form_img10.value.substr
( form1.form_img10.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img10.value != "" ){
   if( extensoesOk10.indexOf( extensao10 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 10!");
       return false;
     }
	 }
   return true;
   
 }}}}}}}}}}}




}

/////////////////////////////////////////////////////////////////////////////



//////////////////// Validação do Formulário de adição de Notícias

	function Valida_add_noticias(){
		
var 
oEditor = FCKeditorAPI.GetInstance('form_texto');
noticia = oEditor.GetXHTML();



//		if(form1.form_data.value == ""){
//			alert("Informe uma data para a notícias!");
//			form1.form_data.focus();return false;
//			}


		if(form1.form_titulo.value == ""){
			alert("Informe o título!");
			form1.form_titulo.focus();return false;
			}

		if(noticia == ""){
			alert("Informe o texto!");
			form1.form_texto.focus();return false;
			}

if(form1.form_img1.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img1.value.substr
( form1.form_img1.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img1.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 1!");
       return false;
     }
	 }


if(form1.form_img2.value != ""){
   var extensoesOk2 = ",.jpg,";
   var extensao2    = "," + form1.form_img2.value.substr
( form1.form_img2.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img2.value != "" ){
   if( extensoesOk2.indexOf( extensao2 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 2!");
       return false;
     }
	 }


if(form1.form_img3.value != ""){
   var extensoesOk3 = ",.jpg,";
   var extensao3    = "," + form1.form_img3.value.substr
( form1.form_img3.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img3.value != "" ){
   if( extensoesOk3.indexOf( extensao3 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 3!");
       return false;
     }
	 }


if(form1.form_img4.value != ""){
   var extensoesOk4 = ",.jpg,";
   var extensao4    = "," + form1.form_img4.value.substr
( form1.form_img4.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img4.value != "" ){
   if( extensoesOk4.indexOf( extensao4 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 4!");
       return false;
     }
	 }





if(form1.form_img5.value != ""){
   var extensoesOk5 = ",.jpg,";
   var extensao5    = "," + form1.form_img5.value.substr
( form1.form_img5.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img5.value != "" ){
   if( extensoesOk5.indexOf( extensao5 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 5!");
       return false;
     }
	 }





if(form1.form_img6.value != ""){
   var extensoesOk6 = ",.jpg,";
   var extensao6    = "," + form1.form_img6.value.substr
( form1.form_img6.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img6.value != "" ){
   if( extensoesOk6.indexOf( extensao6 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 6!");
       return false;
     }
	 }





if(form1.form_img7.value != ""){
   var extensoesOk7 = ",.jpg,";
   var extensao7    = "," + form1.form_img7.value.substr
( form1.form_img7.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img7.value != "" ){
   if( extensoesOk7.indexOf( extensao7 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 7!");
       return false;
     }
	 }





if(form1.form_img8.value != ""){
   var extensoesOk8 = ",.jpg,";
   var extensao8    = "," + form1.form_img8.value.substr
( form1.form_img8.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img8.value != "" ){
   if( extensoesOk8.indexOf( extensao8 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 8!");
       return false;
     }






if(form1.form_img9.value != ""){
   var extensoesOk9 = ",.jpg,";
   var extensao9    = "," + form1.form_img9.value.substr
( form1.form_img9.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img9.value != "" ){
   if( extensoesOk9.indexOf( extensao9 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 9!");
       return false;
     }
	 }
 

if(form1.form_img10.value != ""){
   var extensoesOk10 = ",.jpg,";
   var extensao10    = "," + form1.form_img10.value.substr
( form1.form_img10.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img10.value != "" ){
   if( extensoesOk10.indexOf( extensao10 ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg para a imagem 10!");
       return false;
     }
	 }
   return true;
   
 }}}}}}}}}}}




}

/////////////////////////////////////////////////////////////////////////////


//////////////////// Validação do Formulário de adição de Eventos

	function Valida_add_eventos(){
		
		if(form1.form_data.value == ""){
			alert("Informe a data de realização do evento!");
			form1.form_data.focus();return false;
			}

		if(form1.form_local.value == ""){
			alert("Informe o local de realização do evento!");
			form1.form_local.focus();return false;
			}

		if(form1.form_titulo.value == ""){
			alert("Informe o nome do evento!");
			form1.form_titulo.focus();return false;
			}

if(form1.form_img.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img.value.substr
( form1.form_img.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg!");
       return false;
     }
	 }
   return true;
 }



}

/////////////////////////////////////////////////////////////////////////////



//////////////////// Validação do Formulário de adição de anunciantes

	function Valida_add_anunciante(){
		
		if(form1.form_nome.value == ""){
			alert("Informe o nome do anunciante!");
			form1.form_nome.focus();return false;
			}

		if(form1.form_rua.value == ""){
			alert("Informe o endereço do anunciante! \n(Rua, Avenida, Largo, Travessa, Alameda, etc..)");
			form1.form_rua.focus();return false;
			}

		if(form1.form_numero.value == ""){
			alert("Informe o número predial do anunciante!");
			form1.form_numero.focus();return false;
			}

		if(form1.form_bairro.value == ""){
			alert("Informe o bairro do anunciante!");
			form1.form_bairro.focus();return false;
			}

		if(form1.form_cidade.value == ""){
			alert("Informe a cidade do anunciante!");
			form1.form_cidade.focus();return false;
			}

		if(form1.form_fone1.value == ""){
			alert("Informe pelo menos um telefone do anunciante, no campo Fone 1!");
			form1.form_fone1.focus();return false;
			}

		if(form1.form_area.value == ""){
			alert("Informe a área de atução do anunciante!");
			form1.form_area.focus();return false;
			}

		if(form1.form_usuario.value == ""){
			alert("Informe um usuário para o anunciante!");
			form1.form_usuario.focus();return false;
			}

		if(form1.form_senha.value == ""){
			alert("Informe uma senha para o usuário do anunciante!");
			form1.form_senha.focus();return false;
			}



if(form1.form_mapa.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_mapa.value.substr
( form1.form_mapa.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_mapa.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg!");
       return false;
     }
	 }
   return true;
 }



if(form1.form_img.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img.value.substr
( form1.form_img.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg!");
       return false;
     }
	 }
   return true;
 }



}

/////////////////////////////////////////////////////////////////////////////


//////////////////// Validação do Formulário de humor

	function Valida_humor(){
		
		if(form1.form_categoria.value == ""){
			alert("Informe a Categoria em que deseja adicionar a piada!");
			form1.form_categoria.focus();return false;
			}

		if(form1.form_titulo.value == ""){
			alert("Informe o titulo da piada!");
			form1.form_titulo.focus();return false;
			}

		if(form1.form_texto.value == ""){
			alert("Informe o texto da piada!");
			form1.form_texto.focus();return false;
			}


}

/////////////////////////////////////////////////////////////////////////////


//////////////////// Validação do Formulário de recados

	function Valida_recados(){
		
		if(form1.form_data.value == ""){
			alert("Informe a data de hoje para o recado!");
			form1.form_data.focus();return false;
			}

		if(form1.form_de.value == ""){
			alert("Informe seu nome para o recado!");
			form1.form_de.focus();return false;
			}

		if(form1.form_para.value == ""){
			alert("Informe para quem deseja mandar esse recado!");
			form1.form_para.focus();return false;
			}

		if(form1.form_msg.value == ""){
			alert("Digite a mensagem do recado!");
			form1.form_msg.focus();return false;
			}

}

/////////////////////////////////////////////////////////////////////////////



//////////////////// Validação do Formulário de adição dos jogos

	function Valida_Jogos(){
		
		if(form1.form_categoria.value == ""){
			alert("Informe a Categoria em que deseja adicionar o jogo!");
			form1.form_categoria.focus();return false;
			}

		if(form1.form_titulo.value == ""){
			alert("Informe o nome do jogo!");
			form1.form_titulo.focus();return false;
			}

		if(form1.form_link.value == ""){
			alert("Informe o link do jogo!");
			form1.form_link.focus();return false;
			}

		if(form1.form_img.value == ""){
			alert("Selecione uma imagem para o jogo!");
			form1.form_img.focus();return false;
			}


if(form1.form_img.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img.value.substr
( form1.form_img.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg!");
       return false;
     }
	 }
   return true;
 }



}

/////////////////////////////////////////////////////////////////////////////

//////////////////// Validação do Formulário de ediçao dos jogos

	function Valida_Jogos_2(){
		
		if(form1.form_categoria.value == ""){
			alert("Informe a Categoria em que deseja adicionar o jogo!");
			form1.form_categoria.focus();return false;
			}

		if(form1.form_titulo.value == ""){
			alert("Informe o nome do jogo!");
			form1.form_titulo.focus();return false;
			}

		if(form1.form_link.value == ""){
			alert("Informe o link do jogo!");
			form1.form_link.focus();return false;
			}

if(form1.form_img.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img.value.substr
( form1.form_img.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg!");
       return false;
     }
	 }
   return true;
 }



}

/////////////////////////////////////////////////////////////////////////////


//////////////////// Validação do Formulário de adição do portifólio

	function Valida_Portifolio(){
		
		if(form1.form_titulo.value == ""){
			alert("Informe o nome do site!");
			form1.form_titulo.focus();return false;
			}

		if(form1.form_link.value == ""){
			alert("Informe o link do site!");
			form1.form_link.focus();return false;
			}

		if(form1.form_detalhes.value == ""){
			alert("Informe os detalhes do site que deseja adicionar!");
			form1.form_detalhes.focus();return false;
			}

		if(form1.form_img.value == ""){
			alert("Selecione uma imagem para o site!");
			form1.form_img.focus();return false;
			}


if(form1.form_img.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img.value.substr
( form1.form_img.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg!");
       return false;
     }
	 }
   return true;
 }



}

/////////////////////////////////////////////////////////////////////////////



//////////////////// Validação do Formulário de edição do portifólio

	function Valida_Portifolio_2(){
		
		if(form1.form_titulo.value == ""){
			alert("Informe o nome do site!");
			form1.form_titulo.focus();return false;
			}

		if(form1.form_link.value == ""){
			alert("Informe o link do site!");
			form1.form_link.focus();return false;
			}

		if(form1.form_detalhes.value == ""){
			alert("Informe os detalhes do site que deseja adicionar!");
			form1.form_detalhes.focus();return false;
			}

if(form1.form_img.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img.value.substr
( form1.form_img.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg!");
       return false;
     }
	 }
   return true;
 }



}

/////////////////////////////////////////////////////////////////////////////

//////////////////// Validação do Formulário Fale Conosco

	function Valida_faleconosco(){
		
		if(form1.e1.value == ""){
			alert("Informe para qual setor deverá ser encaminhado seu email!");
			form1.e1.focus();return false;
			}

		if(form1.nome.value == ""){
			alert("Informe seu nome por gentileza!");
			form1.nome.focus();return false;
			}

		if(form1.endereco.value == ""){
			alert("Informe seu endereço por gentileza!");
			form1.endereco.focus();return false;
			}

		if(form1.cidade.value == ""){
			alert("Informe o nome de sua cidade por gentileza!");
			form1.cidade.focus();return false;
			}

		if(form1.estado.value == ""){
			alert("Informe o seu estado por gentileza!");
			form1.estado.focus();return false;
			}

		if(form1.telefone.value == ""){
			alert("Informe seu telefone por gentileza!");
			form1.telefone.focus();return false;
			}

		if(form1.email.value == ""){
			alert("Informe seu email por gentileza!");
			form1.email.focus();return false;
			}

		if(form1.mensagem.value == ""){
			alert("Digite uma mensagem por gentileza!");
			form1.mensagem.focus();return false;
			}



}

/////////////////////////////////////////////////////////////////////////////

//////////////////// Validação do Formulário de adição de filme

	function Valida_cinema(){
		
		if(form1.form_nome.value == ""){
			alert("Informe o nome do filme!");
			form1.form_nome.focus();return false;
			}

		if(form1.form_sinopse.value == ""){
			alert("Informe a sinopse do filme!");
			form1.form_sinopse.focus();return false;
			}

		if(form1.form_img.value == ""){
			alert("Selecione uma imagem para o filme!");
			form1.form_img.focus();return false;
			}

		if(form1.form_linktrailer.value == ""){
			alert("Informe o link para trailer do filme!");
			form1.form_linktrailer.focus();return false;
			}

		if(form1.form_genero.value == ""){
			alert("Informe o gênero do filme!");
			form1.form_genero.focus();return false;
			}

		if(form1.form_censura.value == ""){
			alert("Informe a faixa etária de censura do filme!");
			form1.form_censura.focus();return false;
			}
		
		if(form1.form_duracao.value == ""){
			alert("Informe a duração do filme!");
			form1.form_duracao.focus();return false;
			}

		if(form1.form_sala.value == ""){
			alert("Informe a sala que será exibido o filme!");
			form1.form_sala.focus();return false;
			}

		if(form1.form_dataexibe_d.value == ""){
			alert("Informe a data de iníco da exebição do filme!");
			form1.form_dataexibe_d.focus();return false;
			}

		if(form1.form_dataexibe_p.value == ""){
			alert("Informe a data de término da exebição do filme!");
			form1.form_dataexibe_p.focus();return false;
			}

		if
		(
		 (document.form1.form_segunda_1.checked == false) &&
		 (document.form1.form_terca_1.checked == false) &&
		 (document.form1.form_quarta_1.checked == false) &&
		 (document.form1.form_quinta_1.checked == false) &&
		 (document.form1.form_sexta_1.checked == false) &&
		 (document.form1.form_sabado_1.checked == false) &&
		 (document.form1.form_domingo_1.checked == false)
		)
		
		{
			alert("Informe ao menos um dia da semana no Horário 1 para a exebição do filme!");
			return false;
			}

		if(form1.form_horario_1a.value == ""){
			alert("Informe ao menos um horário para a exebição do filme!");
			form1.form_horario_1a.focus();return false;
			}


if(form1.form_img.value != ""){
   var extensoesOk = ",.jpg,";
   var extensao    = "," + form1.form_img.value.substr
( form1.form_img.value.length - 4 ).toLowerCase() + ",";
   if( form1.form_img.value != "" ){
   if( extensoesOk.indexOf( extensao ) == -1 ){
       alert("Por favor, selecione uma imagem com extensão .jpg!");
       return false;
     }
	 }
   return true;
 }



}

/////////////////////////////////////////////////////////////////////////////

//////////////////// Validação do Formulário de edição de filme

	function Valida_cinema2(){
		
		if(form1.form_nome.value == ""){
			alert("Informe o nome do filme!");
			form1.form_nome.focus();return false;
			}

		if(form1.form_sinopse.value == ""){
			alert("Informe a sinopse do filme!");
			form1.form_sinopse.focus();return false;
			}

		if(form1.form_linktrailer.value == ""){
			alert("Informe o link para trailer do filme!");
			form1.form_linktrailer.focus();return false;
			}

		if(form1.form_genero.value == ""){
			alert("Informe o gênero do filme!");
			form1.form_genero.focus();return false;
			}
			
		if(form1.form_censura.value == ""){
			alert("Informe a faixa etária de censura do filme!");
			form1.form_censura.focus();return false;
			}
		
		if(form1.form_duracao.value == ""){
			alert("Informe a duração do filme!");
			form1.form_duracao.focus();return false;
			}

		if(form1.form_sala.value == ""){
			alert("Informe a sala que será exibido o filme!");
			form1.form_sala.focus();return false;
			}

		if(form1.form_dataexibe_d.value == ""){
			alert("Informe a data de iníco da exebição do filme!");
			form1.form_dataexibe_d.focus();return false;
			}

		if(form1.form_dataexibe_p.value == ""){
			alert("Informe a data de término da exebição do filme!");
			form1.form_dataexibe_p.focus();return false;
			}

		if
		(
		 (document.form1.form_segunda_1.checked == false) &&
		 (document.form1.form_terca_1.checked == false) &&
		 (document.form1.form_quarta_1.checked == false) &&
		 (document.form1.form_quinta_1.checked == false) &&
		 (document.form1.form_sexta_1.checked == false) &&
		 (document.form1.form_sabado_1.checked == false) &&
		 (document.form1.form_domingo_1.checked == false)
		)
		
		{
			alert("Informe ao menos um dia da semana no Horário 1 para a exebição do filme!");
			return false;
			}

		if(form1.form_horario_1a.value == ""){
			alert("Informe ao menos um horário para a exebição do filme!");
			form1.form_horario_1a.focus();return false;
			}



}

/////////////////////////////////////////////////////////////////////////////


 window.defaultStatus = ("BATIDOS TOLEDO");