const $ = require ('jquery');
const {BrowserWindow}=require('electron').remote
const app=require('electron').app
const path = require('path')
const url = require('url')

let pantallaDetalle;

function inicia(){
        
	$.ajax({
         url:'http://itculiacan.edu.mx/dadm/apipaselista/data/validausuario.php?usuario=920&clave=12345678',
         dataType: 'json',
         success: function(data){
         
	});
}

inicia();