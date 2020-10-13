$.ajax({
    url: '/getTemplate',
    success: function(respuesta) {
        for (var i = 0; i < respuesta.length; ++i) {
            if (respuesta[i].name == 'Plantilla 1' && respuesta[i].estado == 1) {
                template1();
            } else if (respuesta[i].name == 'Plantilla 2' && respuesta[i].estado == 1) {
                template2();
            }
        }
    },
    error: function() {
        console.log("No se ha podido obtener la información");
    }
});



function template1() {
    // window.onload = function() {
    const btnpng = document.querySelector("#download-image-png");
    const canvas = document.querySelector("#canvas");
    const ctx = canvas.getContext("2d");

    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {
                var data = JSON.parse(objXMLHttpRequest.responseText);
                var nombre = data.nombre;
                var cargo = data.cargo;
                var area = data.area;
                var indi1 = data.indicativo1;
                var indi2 = data.indicativo2;
                var telefono = data.telefono;
                var extension = data.extension;
                var extension;
                (data.extension === null) ? extension = '': extension = data.extension;
                var celular = data.celular;
                var direccion = data.direccion;
                var correo = data.email;
                var depto = data.departamento;
                var city = data.ciudad;
                var imagen = data.imagen;

                var imagenPerfil = new Image();

                var imagenBG = new Image();

                imagenPerfil.onload = function() {
                    imagenBG.src = './img/fondo.png';
                };

                imagenPerfil.src = './storage/users/' + imagen;


                // var imagenBG = new Image();
                // imagenBG.src = './img/fondo.png';

                var imagenTel = new Image();
                imagenTel.src = './img/telefono.png';

                var imagenCel = new Image();
                imagenCel.src = './img/celular.png';

                var imagenDir = new Image();
                imagenDir.src = './img/direccion.png';

                var imagenCorreo = new Image();
                imagenCorreo.src = './img/correo.png';

                var imagenUbicacion = new Image();
                imagenUbicacion.src = './img/ubicacion.png';

                var imagenGane = new Image();
                imagenGane.src = './img/logos_firmas.png';

                imagenBG.onload = function() {
                    ctx.drawImage(imagenBG, 0, 0);

                    ctx.beginPath();
                    ctx.font = "Bold 25px Roboto";
                    ctx.fillText(nombre.charAt(0).toUpperCase() + nombre.slice(1), 260, 55);
                    ctx.fillStyle = "#000";

                    ctx.beginPath();
                    ctx.font = "16px Roboto";
                    ctx.fillText(cargo.charAt(0).toUpperCase() + cargo.slice(1), 260, 80);
                    ctx.fillStyle = "#000";

                    ctx.beginPath();
                    ctx.font = "14px Roboto";
                    ctx.fillText('(' + area.charAt(0).toUpperCase() + area.slice(1) + ')', 260, 100);
                    ctx.fillStyle = "#000";

                    ctx.beginPath();
                    ctx.font = "14px Roboto";

                    if (extension) {
                        ctx.fillText('+' + indi1 + ' (' + indi2 + ') ' + ' ' + telefono + ' Ext.' + extension, 290, 148);
                    } else {
                        ctx.fillText('+' + indi1 + ' (' + indi2 + ') ' + ' ' + telefono, 290, 148);
                    }
                    ctx.fillStyle = "#000";



                    if (celular) {
                        ctx.beginPath();
                        ctx.font = "14px Roboto";
                        ctx.fillText(celular, 290, 168);
                        ctx.fillStyle = "#000";
                    } else {
                        ctx.fillText('', 290, 168);
                    }

                    ctx.beginPath();
                    ctx.font = "14px Roboto";
                    ctx.fillText(direccion, 290, 188);
                    ctx.fillStyle = "#000";

                    ctx.beginPath();
                    ctx.font = "14px Roboto";
                    ctx.fillText(correo, 290, 210);
                    ctx.fillStyle = "#000";

                    ctx.beginPath();
                    ctx.font = "14px Roboto";
                    ctx.fillText(city + ', ' + depto, 290, 233);
                    ctx.fillStyle = "#000";

                    // var centreX = 140;
                    // var centreY = 135;
                    // var radius = 100;
                    // var startAngle = 0 * Math.PI / 180;
                    // var endAngle = 360 * Math.PI / 180;

                    // ctx.beginPath();
                    // ctx.arc(centreX, centreY, radius, 0, 2 * Math.PI, false);
                    // ctx.closePath();
                    // ctx.clip();

                    // ctx.drawImage(imagenPerfil, 35, 35); 

                    var centreX = 135;
                    var centreY = 135;
                    var radius = 100;
                    var startAngle = 0 * Math.PI / 180;
                    var endAngle = 360 * Math.PI / 180;

                    ctx.beginPath();
                    ctx.arc(centreX, centreY, radius, 0, 2 * Math.PI, false);
                    ctx.closePath();
                    ctx.clip();

                    ctx.drawImage(imagenPerfil, 35, 35, 200, 200);
                };
            } else {
                alert('Error Code: ' + objXMLHttpRequest.status);
                alert('Error Message: ' + objXMLHttpRequest.statusText);
            }
        }
    }

    objXMLHttpRequest.open('GET', 'data');
    objXMLHttpRequest.send();


    btnpng.addEventListener("click", function() {
        if (window.navigator.msSaveBlob) {
            window.navigator.msSaveBlob(canvas.msToBlob(), "screenshot.png")
        } else {
            const a = document.createElement("a");
            document.body.appendChild(a);
            a.href = canvas.toDataURL();
            a.download = "screenshot.png";
            a.click();
            document.body.removeChild(a);
        }
    });
    // }
}

function template2() {
    // window.onload = function() {
    const btnpng = document.querySelector("#download-image-png");
    const canvas = document.querySelector("#canvas");
    const ctx = canvas.getContext("2d");

    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {
                var data = JSON.parse(objXMLHttpRequest.responseText);
                var nombre = data.nombre;
                var cargo = data.cargo;
                var area = data.area;
                var indi1 = data.indicativo1;
                var indi2 = data.indicativo2;
                var telefono = data.telefono;
                var extension = data.extension;
                var extension;
                (data.extension === null) ? extension = '': extension = data.extension;
                var celular = data.celular;
                var direccion = data.direccion;
                var correo = data.email;
                var depto = data.departamento;
                var city = data.ciudad;
                var lugar = data.lugar;
                var imagen = data.imagen;

                var imagenPerfil = new Image();

                var imagenBG = new Image();

                imagenPerfil.onload = function() {
                    imagenBG.src = './img/bg-template2.jpg';
                };

                imagenPerfil.src = './img/logos_firmas.png';

                var imagenTel = new Image();
                imagenTel.src = './img/telefono.png';

                var imagenCel = new Image();
                imagenCel.src = './img/celular.png';

                var imagenDir = new Image();
                imagenDir.src = './img/direccion.png';

                var imagenCorreo = new Image();
                imagenCorreo.src = './img/correo.png';

                var imagenUbicacion = new Image();
                imagenUbicacion.src = './img/ubicacion.png';

                // var imagenGane = new Image();
                // imagenGane.src = './img/logos_firmas.png';

                imagenBG.onload = function() {
                    ctx.drawImage(imagenBG, 0, 0);

                    ctx.font = "Bold 22px Roboto";
                    ctx.fillStyle = "#fff";
                    ctx.fillText(nombre.charAt(0).toUpperCase() + nombre.slice(1), 360, 58);

                    ctx.font = "bold 16px Roboto";
                    ctx.fillStyle = "#2C3A84";
                    ctx.fillText(cargo.charAt(0).toUpperCase() + cargo.slice(1), 360, 92);

                    // ctx.beginPath();
                    // ctx.font = "14px Roboto";
                    // ctx.fillText('(' + area.charAt(0).toUpperCase() + area.slice(1) + ')', 360, 100);
                    // ctx.fillStyle = "#fff";

                    ctx.beginPath();
                    ctx.font = "bold 16px Roboto";

                    if (extension) {
                        ctx.fillText('Tel. +' + indi1 + ' (' + indi2 + ') ' + ' ' + telefono + ' Ext.' + extension, 360, 130);
                    } else {
                        ctx.fillText('Tel. +' + indi1 + ' (' + indi2 + ') ' + ' ' + telefono, 360, 130);
                    }
                    ctx.fillStyle = "#2C3A84";



                    if (celular) {
                        ctx.beginPath();
                        ctx.font = "bold 16px Roboto";
                        ctx.fillText('Cel. ' + celular, 360, 155);
                        ctx.fillStyle = "#2C3A84";
                    } else {
                        ctx.fillText('', 290, 168);
                    }

                    ctx.beginPath();
                    ctx.font = "bold 16px Roboto";
                    ctx.fillText(direccion + ' - ' + lugar, 360, 180);
                    ctx.fillStyle = "#2C3A84";

                    ctx.beginPath();
                    ctx.font = "bold 16px Roboto";
                    ctx.fillText(correo, 360, 205);
                    ctx.fillStyle = "#2C3A84";

                    ctx.beginPath();
                    ctx.font = "bold 16px Roboto";
                    ctx.fillText(city + ', ' + depto, 360, 230);
                    ctx.fillStyle = "#2C3A84";

                    var centreX = 135;
                    var centreY = 135;
                    var radius = 100;
                    var startAngle = 0 * Math.PI / 180;
                    var endAngle = 360 * Math.PI / 180;

                    // ctx.beginPath();
                    // ctx.arc(centreX, centreY, radius, 0, 2 * Math.PI, false);
                    // ctx.closePath();
                    // ctx.clip();

                    ctx.drawImage(imagenPerfil, 35, 35, 250, 200);
                };
            } else {
                alert('Error Code: ' + objXMLHttpRequest.status);
                alert('Error Message: ' + objXMLHttpRequest.statusText);
            }
        }
    }

    objXMLHttpRequest.open('GET', 'data');
    objXMLHttpRequest.send();


    btnpng.addEventListener("click", function() {
        if (window.navigator.msSaveBlob) {
            window.navigator.msSaveBlob(canvas.msToBlob(), "screenshot.png")
        } else {
            const a = document.createElement("a");
            document.body.appendChild(a);
            a.href = canvas.toDataURL();
            a.download = "screenshot.png";
            a.click();
            document.body.removeChild(a);
        }
    });
    // }
}