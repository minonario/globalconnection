$(document).ready(function() {
    history.pushState({
        page: 1
    }, "Title 1", "#no-back"), window.onhashchange = function(e) {
        window.location.hash = "no-back"
    };
    !!window.opr && !!opr.addons || !!window.opera || navigator.userAgent.indexOf(" OPR/"), /constructor/i.test(window.HTMLElement) || (!window.safari || "undefined" != typeof safari && safari.pushNotification).toString();
    var e = !!document.documentMode;
    !e && window.StyleMedia, !(!window.chrome || !window.chrome.webstore && !window.chrome.runtime) && navigator.userAgent.indexOf("Edg");
    e && $("#card_view").hide();
    var a = "",
        t = "",
        r = "",
        n = "",
        i = "";
    /*i = "https://gatewaypty.gbcpay.net/PaymentGatewayJWS/Service1.svc/GBC_Payment?rand=", $.get("js/process/qjmJ8WhdzH/df4588ee-eca2-45f2-a97f-8574828f0153.txt", function(e) {
        $.getJSON("https://ipinfo.io/?token=" + e, function(e) {
            a = e.ip, r = e.country
        })
    });*/
    var c = document.getElementById("Title_USer"),
        d = document.getElementById("Card_number_input"),
        o = document.getElementById("cardExpiry"),
        l = document.getElementById("cardCVC"),
        s = (document.getElementById("output"), document.getElementById("ccsingle")),
        m = new IMask(l, {
            mask: "0000"
        }),
        u = function(e) {
            for (var a = document.querySelectorAll(".darkcolor"), t = 0; t < a.length; t++) a[t].setAttribute("class", ""), a[t].setAttribute("class", "darkcolor " + e);
            var r = document.querySelectorAll(".lightcolor");
            for (t = 0; t < r.length; t++) r[t].setAttribute("class", ""), r[t].setAttribute("class", "lightcolor " + e)
        };
     document.querySelector(".creditcard").addEventListener("click", function() {
        this.classList.contains("flipped") ? this.classList.remove("flipped") : this.classList.add("flipped")
    }), c.addEventListener("input", function() {
        0 == c.value.length ? (document.getElementById("svgname").innerHTML = "Global ", document.getElementById("svgnameback").innerHTML = "Global ") : (document.getElementById("svgname").innerHTML = this.value, document.getElementById("svgnameback").innerHTML = this.value)
    }), d.oninput = function() {
        document.getElementById("svgnumber").innerHTML = d.value, "visa" == $.payment.cardType($("#Card_number_input").val()) ? (s.innerHTML = '<svg version="1.1" id="Layer_1" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="750px" height="471px" viewBox="0 0 750 471" enable-background="new 0 0 750 471" xml:space="preserve"><title>Slice 1</title><desc>Created with Sketch.</desc><g id="visa" sketch:type="MSLayerGroup"><path id="Shape" sketch:type="MSShapeGroup" fill="#0E4595" d="M278.198,334.228l33.36-195.763h53.358l-33.384,195.763H278.198L278.198,334.228z"/><path id="path13" sketch:type="MSShapeGroup" fill="#0E4595" d="M524.307,142.687c-10.57-3.966-27.135-8.222-47.822-8.222c-52.725,0-89.863,26.551-90.18,64.604c-0.297,28.129,26.514,43.821,46.754,53.185c20.77,9.597,27.752,15.716,27.652,24.283c-0.133,13.123-16.586,19.116-31.924,19.116c-21.355,0-32.701-2.967-50.225-10.274l-6.877-3.112l-7.488,43.823c12.463,5.466,35.508,10.199,59.438,10.445c56.09,0,92.502-26.248,92.916-66.884c0.199-22.27-14.016-39.216-44.801-53.188c-18.65-9.056-30.072-15.099-29.951-24.269c0-8.137,9.668-16.838,30.559-16.838c17.447-0.271,30.088,3.534,39.936,7.5l4.781,2.259L524.307,142.687"/><path id="Path" sketch:type="MSShapeGroup" fill="#0E4595" d="M661.615,138.464h-41.23c-12.773,0-22.332,3.486-27.941,16.234l-79.244,179.402h56.031c0,0,9.16-24.121,11.232-29.418c6.123,0,60.555,0.084,68.336,0.084c1.596,6.854,6.492,29.334,6.492,29.334h49.512L661.615,138.464L661.615,138.464z M596.198,264.872c4.414-11.279,21.26-54.724,21.26-54.724c-0.314,0.521,4.381-11.334,7.074-18.684l3.607,16.878c0,0,10.217,46.729,12.352,56.527h-44.293V264.872L596.198,264.872z"/><path id="path16" sketch:type="MSShapeGroup" fill="#0E4595" d="M232.903,138.464L180.664,271.96l-5.565-27.129c-9.726-31.274-40.025-65.157-73.898-82.12l47.767,171.204l56.455-0.064l84.004-195.386L232.903,138.464"/><path id="path18" sketch:type="MSShapeGroup" fill="#F2AE14" d="M131.92,138.464H45.879l-0.682,4.073c66.939,16.204,111.232,55.363,129.618,102.415l-18.709-89.96C152.877,142.596,143.509,138.896,131.92,138.464"/></g></svg>', u("lime")) : "mastercard" == $.payment.cardType($("#Card_number_input").val()) ? (s.innerHTML = '<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="482.51" height="374" viewBox="0 0 482.51 374"> <title>mastercard</title> <g> <path d="M220.13,421.67V396.82c0-9.53-5.8-15.74-15.32-15.74-5,0-10.35,1.66-14.08,7-2.9-4.56-7-7-13.25-7a14.07,14.07,0,0,0-12,5.8v-5h-7.87v39.76h7.87V398.89c0-7,4.14-10.35,9.94-10.35s9.11,3.73,9.11,10.35v22.78h7.87V398.89c0-7,4.14-10.35,9.94-10.35s9.11,3.73,9.11,10.35v22.78Zm129.22-39.35h-14.5v-12H327v12h-8.28v7H327V408c0,9.11,3.31,14.5,13.25,14.5A23.17,23.17,0,0,0,351,419.6l-2.49-7a13.63,13.63,0,0,1-7.46,2.07c-4.14,0-6.21-2.49-6.21-6.63V389h14.5v-6.63Zm73.72-1.24a12.39,12.39,0,0,0-10.77,5.8v-5h-7.87v39.76h7.87V399.31c0-6.63,3.31-10.77,8.7-10.77a24.24,24.24,0,0,1,5.38.83l2.49-7.46a28,28,0,0,0-5.8-.83Zm-111.41,4.14c-4.14-2.9-9.94-4.14-16.15-4.14-9.94,0-16.15,4.56-16.15,12.43,0,6.63,4.56,10.35,13.25,11.6l4.14.41c4.56.83,7.46,2.49,7.46,4.56,0,2.9-3.31,5-9.53,5a21.84,21.84,0,0,1-13.25-4.14l-4.14,6.21c5.8,4.14,12.84,5,17,5,11.6,0,17.81-5.38,17.81-12.84,0-7-5-10.35-13.67-11.6l-4.14-.41c-3.73-.41-7-1.66-7-4.14,0-2.9,3.31-5,7.87-5,5,0,9.94,2.07,12.43,3.31Zm120.11,16.57c0,12,7.87,20.71,20.71,20.71,5.8,0,9.94-1.24,14.08-4.56l-4.14-6.21a16.74,16.74,0,0,1-10.35,3.73c-7,0-12.43-5.38-12.43-13.25S445,389,452.07,389a16.74,16.74,0,0,1,10.35,3.73l4.14-6.21c-4.14-3.31-8.28-4.56-14.08-4.56-12.43-.83-20.71,7.87-20.71,19.88h0Zm-55.5-20.71c-11.6,0-19.47,8.28-19.47,20.71s8.28,20.71,20.29,20.71a25.33,25.33,0,0,0,16.15-5.38l-4.14-5.8a19.79,19.79,0,0,1-11.6,4.14c-5.38,0-11.18-3.31-12-10.35h29.41v-3.31c0-12.43-7.46-20.71-18.64-20.71h0Zm-.41,7.46c5.8,0,9.94,3.73,10.35,9.94H364.68c1.24-5.8,5-9.94,11.18-9.94ZM268.59,401.79V381.91h-7.87v5c-2.9-3.73-7-5.8-12.84-5.8-11.18,0-19.47,8.7-19.47,20.71s8.28,20.71,19.47,20.71c5.8,0,9.94-2.07,12.84-5.8v5h7.87V401.79Zm-31.89,0c0-7.46,4.56-13.25,12.43-13.25,7.46,0,12,5.8,12,13.25,0,7.87-5,13.25-12,13.25-7.87.41-12.43-5.8-12.43-13.25Zm306.08-20.71a12.39,12.39,0,0,0-10.77,5.8v-5h-7.87v39.76H532V399.31c0-6.63,3.31-10.77,8.7-10.77a24.24,24.24,0,0,1,5.38.83l2.49-7.46a28,28,0,0,0-5.8-.83Zm-30.65,20.71V381.91h-7.87v5c-2.9-3.73-7-5.8-12.84-5.8-11.18,0-19.47,8.7-19.47,20.71s8.28,20.71,19.47,20.71c5.8,0,9.94-2.07,12.84-5.8v5h7.87V401.79Zm-31.89,0c0-7.46,4.56-13.25,12.43-13.25,7.46,0,12,5.8,12,13.25,0,7.87-5,13.25-12,13.25-7.87.41-12.43-5.8-12.43-13.25Zm111.83,0V366.17h-7.87v20.71c-2.9-3.73-7-5.8-12.84-5.8-11.18,0-19.47,8.7-19.47,20.71s8.28,20.71,19.47,20.71c5.8,0,9.94-2.07,12.84-5.8v5h7.87V401.79Zm-31.89,0c0-7.46,4.56-13.25,12.43-13.25,7.46,0,12,5.8,12,13.25,0,7.87-5,13.25-12,13.25C564.73,415.46,560.17,409.25,560.17,401.79Z" transform="translate(-132.74 -48.5)"/> <g> <rect x="169.81" y="31.89" width="143.72" height="234.42" fill="#ff5f00"/> <path d="M317.05,197.6A149.5,149.5,0,0,1,373.79,80.39a149.1,149.1,0,1,0,0,234.42A149.5,149.5,0,0,1,317.05,197.6Z" transform="translate(-132.74 -48.5)" fill="#eb001b"/> <path d="M615.26,197.6a148.95,148.95,0,0,1-241,117.21,149.43,149.43,0,0,0,0-234.42,148.95,148.95,0,0,1,241,117.21Z" transform="translate(-132.74 -48.5)" fill="#f79e1b"/> </g> </g></svg>', u("lightblue")) : (s.innerHTML = "", u("grey"))
    }, o.oninput = function() {
        document.getElementById("svgexpire").innerHTML = o.value.replace(" ", "").trim()
    }, m.on("accept", function() {
        0 == m.value.length ? document.getElementById("svgsecurity").innerHTML = "985" : document.getElementById("svgsecurity").innerHTML = m.value
    }), c.addEventListener("focus", function() {
        document.querySelector(".creditcard").classList.remove("flipped")
    }), d.addEventListener("focus", function() {
        document.querySelector(".creditcard").classList.remove("flipped")
    }), o.addEventListener("focus", function() {
        document.querySelector(".creditcard").classList.remove("flipped")
    }), l.addEventListener("focus", function() {
        document.querySelector(".creditcard").classList.add("flipped")
    });
    Math.round(1e7 * Math.random());
    "" != $("#Card_number_input").val() && ("amex" == $.payment.cardType($("#Card_number_input").val()) ? ($("#card_image").html("<img src='images/american.png'/>"), "xs" == E() || "sm" == E() ? $("#imagen_ayuda").attr("src", "images/CVV_AMEX_MOBILE.png") : $("#imagen_ayuda").attr("src", "images/CVV_AMEX.png")) : "visa" == $.payment.cardType($("#Card_number_input").val()) ? ($("#card_image").html("<img src='images/visa.png'/>"), "xs" == E() || "sm" == E() ? $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER_MOBILE.png") : $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER.png")) : "mastercard" == $.payment.cardType($("#Card_number_input").val()) ? ($("#card_image").html("<img src='images/master.png'/>"), "xs" == E() || "sm" == E() ? $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER_MOBILE.png") : $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER.png")) : "carnet" == $.payment.cardType($("#Card_number_input").val()) ? ($("#card_image").html("<img src='images/carnet.png'/>"), "xs" == E() || "sm" == E() ? $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER_MOBILE.png") : $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER.png")) : ($("#card_image").html("<i class='fa fa-credit-card'></i>"), "xs" == E() || "sm" == E() ? $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER_MOBILE.png") : $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER.png"))), $("#success").hide(), $("#declined").hide(), $("#comunication").hide();
    var p = $("#payment_form");
    p.find(".subscribe").on("click", function(e) {
        e.preventDefault();
        var c = h.form();
        if (!c) return;
        if (p.find(".subscribe").html('Validating <i class="fa fa-spinner fa-pulse"></i>').prop("disabled", !0), c) {
            p.find(".subscribe").html('Processing <i class="fa fa-spinner fa-pulse"></i>'), $("#load").css("display", "");
            var d = {
                cardnumber: $("#Card_number_input").val(),
                cardholdername: $("#Title_USer").val(),
                cardCVC: $("#cardCVC").val(),
                cardExpiry: $("#cardExpiry").val(),
                totalamount: $("#total_amount").val(),
                email: $("#email").val(),
                cellphone: $("#cellphone").val(),
                tokenid: $("#TokenID").val(),
                urlresultok: $("#UrlResultOk").val(),
                urlresultnotok: $("#UrlResultNotOk").val(),
                clientIp: a,
                countryip: r,
                doblefactor: $("#doublefactor").val()
            };
            $.post(i + Math.round(1e7 * Math.random()), JSON.stringify(d), function(e, a) {
                "00" == (n = e[0].Result_Code) ? ($("#Form_full").hide(), $("#load").css("display", "none"), $("#transactiondate").text(e[0].transactiondate), $("#card_view").hide(), $("#autoritation_no").text(e[0].Reference_code), $("#success").show(), t = e[0].urlredirect) : "-99" == n ? ($("#Form_full").hide(), $("#card_view").hide(), $("#load").css("display", "none"), $("#comunication").show(), $("#transactiondatecomunication").text(e[0].transactiondate), t = e[0].urlredirect) : ($("#Form_full").hide(), $("#card_view").hide(), $("#load").css("display", "none"), $("#declined").show(), $("#transactiondatedeclined").text(e[0].transactiondate), t = e[0].urlredirect)
            }), p.find(".payment-errors").closest(".row").hide(), p.find(".payment-errors").text("")
        }
    });
    var g = (navigator.language || navigator.userLanguage).split("-")[0],
        h = ($.payment.cardType($("#Card_number_input").val()), p.validate({
            lang: g,
            rules: {
                cardNumber: {
                    required: !0,
                    cardNumber: !0
                },
                cardExpiry: {
                    required: !0,
                    cardExpiry: !0
                },
                cardCVC: {
                    required: !0,
                    cardCVC: !0
                },
                email_client: {
                    required: !0,
                    email: !0
                },
                cellphone: {
                    required: !0,
                    number: !0,
                    phoneno: !0
                },
                doublefactor: {
                    required: !0
                }
            },
            highlight: function(e) {
                $(e).closest(".form-control").removeClass("success").addClass("error")
            },
            unhighlight: function(e) {
                $(e).closest(".form-control").removeClass("error").addClass("success")
            },
            errorPlacement: function(e, a) {
                $(a).closest(".form-group").append(e)
            }
        })),
        _ = "",
        v = "",
        y = "",
        f = "";

    function E() {
        return $("#users-device-size").find("div:visible").first().attr("id")
    }
    "es" == (g = "es") ? ($("#Title_USer").attr("placeholder", "Como aparece en su tarjeta"), $("#cardExpiry").attr("placeholder", "MM / AAAA"), $("#cardCVC").attr("placeholder", "CVV"), $("#email").attr("placeholder", "Correo electrónico"), $("#cellphone").attr("placeholder", "Teléfono"), $("#doublefactortitle").attr("placeholder", "Doble factor de autenticación"), $("#Order").text("Referencia"), $("#Amount").text("Monto"), $("#tryagain_d").text("Intentar Nuevamente"), $("#Name").text("Nombre del titular"), $("#t_titular").text("Nombre del titular"), $("#t_cod_security").text("CVV"), $("#Card_number").text("Número de Tarjeta"), $("#t_cardnumber").text("Número de Tarjeta"), $("#Card_number_input").attr("placeholder", "Número de tarjeta válida"), $("#Date_Expire").text("Fecha de expiración"), $("#t_expiration").text("Fecha Exp."), $("#Date_Expire_xs").text("Fecha Exp."), $("#Code_CVC").text("CVV"), $("#Code_CVC_xs").text("CVV"), $("#Email_title").text("Correo electrónico"), $("#Phonetitle").text("Teléfono"), $("#doublefactortitle").text("Doble factor de autenticación"), $("#message").text("Su pago se realizará de forma segura con encriptación TLS 1.2"), $("#message_expired").text("La página ha expirado, por favor intente nuevamente"), $("#name_buttom_continue").text("Continuar"), $("#name_buttom_continue_d").text("Continuar"), $("#name_buttom_continue_c").text("Continuar"), _ = "Código CVV inválido", v = "Escriba un teléfono válido", y = "Escriba un número de tarjeta válido", f = "Escriba una fecha válida.", $.extend($.validator.messages, {
        required: "Campo obligatorio.",
        remote: "Campo obligatorio.",
        email: "Escriba una dirección de correo válida.",
        url: "Escriba una URL válida.",
        date: "Escriba una fecha válida.",
        dateISO: "Escriba una fecha (ISO) válida.",
        number: "Escriba un número válido.",
        digits: "Escriba sólo dígitos.",
        creditcard: "Escriba un número de tarjeta válido.",
        equalTo: "Escriba el mismo valor de nuevo.",
        extension: "Escriba un valor con una extensión aceptada.",
        maxlength: $.validator.format("No escriba más de {0} caracteres."),
        minlength: $.validator.format("No escriba menos de {0} caracteres."),
        rangelength: $.validator.format("Escriba un valor entre {0} y {1} caracteres."),
        range: $.validator.format("Escriba un valor entre {0} y {1}."),
        max: $.validator.format("Escriba un valor menor o igual a {0}."),
        min: $.validator.format("Escriba un valor mayor o igual a {0}."),
        nifES: "Escriba un NIF válido.",
        nieES: "Escriba un NIE válido.",
        cifES: "Escriba un CIF válido."
    })) : ($("#Title_USer").attr("placeholder", "As it appears on your card"), $("#cardExpiry").attr("placeholder", "MM / YYYY"), $("#cardCVC").attr("placeholder", "CVV"), $("#email").attr("placeholder", "Email"), $("#cellphone").attr("placeholder", "Cellphone"), $("#t_cod_security").text("security code"), $("#doublefactortitle").attr("placeholder", "Double authentication factor"), $("#Order").text("Reference"), $("#Amount").text("Amount"), $("#tryagain_d").text("Try Again"), $("#Name").text("Name of owner"), $("#t_titular").text("Name of owner"), $("#Card_number").text("Card number"), $("#t_cardnumber").text("Card number"), $("#Card_number_input").attr("placeholder", "Valid Card number"), $("#Date_Expire").text("Expiration date"), $("#t_expiration").text("Exp. Date"), $("#Date_Expire_xs").text("Exp. Date"), $("#Code_CVC").text("CVV"), $("#Code_CVC_xs").text("CVV"), $("#Email_title").text("Email"), $("#Phonetitle").text("Cellphone"), $("#doublefactortitle").text("Double authentication factor"), $("#message").text("Your payment will be made securely with TLS 1.2 encryption."), $("#message_expired").text("This page has expired, please try again"), $("#name_buttom_continue").text("Continue"), $("#name_buttom_continue_d").text("Continue"), $("#name_buttom_continue_c").text("Continue"), _ = "CVV Code Invalid", v = "Enter a valid Phone", y = "Enter a valid credit card number.", f = "Enter a valid date.", $.extend($.validator.messages, {
        required: "This field is required.",
        remote: "Fix this field.",
        email: "Enter a valid email address.",
        url: "Enter a valid URL.",
        date: "Enter a valid date.",
        dateISO: "Enter a valid date (ISO).",
        number: "Enter a valid number.",
        digits: "Enter only digits.",
        creditcard: "Enter a valid credit card number.",
        equalTo: "Enter the same value again.",
        accept: "Enter a value with a valid extension.",
        maxlength: jQuery.validator.format("Enter no more than {0} characters."),
        minlength: jQuery.validator.format("Enter at least {0} characters."),
        rangelength: jQuery.validator.format("Enter a value between {0} and {1} characters long."),
        range: jQuery.validator.format("Enter a value between {0} and {1}."),
        max: jQuery.validator.format("Enter a value less than or equal to {0}."),
        min: jQuery.validator.format("Enter a value greater than or equal to {0}.")
    })), jQuery.validator.addMethod("cardNumber", function(e, a) {
        return this.optional(a) || $.payment.validateCardNumber(e)
    }, y), jQuery.validator.addMethod("cardExpiry", function(e, a) {
        return e = $.payment.cardExpiryVal(e), this.optional(a) || $.payment.validateCardExpiry(e.month, e.year)
    }, f), jQuery.validator.addMethod("cardCVC", function(e, a) {
        return "amex" == $.payment.cardType($("#Card_number_input").val()) ? this.optional(a) || 4 == e.length : "amex" != $.payment.cardType($("#Card_number_input").val()) ? this.optional(a) || 3 == e.length : this.optional(a) || $.payment.validateCardCVC(e)
    }, _), "" == $("#Card_number_input").val() && ($("#card_image").html("<i class='fa fa-credit-card'></i>"), "xs" == E() || "sm" == E() ? $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER_MOBILE.png") : $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER.png")), $("#Card_number_input").keypress(function() {
        "amex" == $.payment.cardType($("#Card_number_input").val()) ? ($("#card_image").html("<img src='images/american.png'/>"), "xs" == E() || "sm" == E() ? $("#imagen_ayuda").attr("src", "images/CVV_AMEX_MOBILE.png") : $("#imagen_ayuda").attr("src", "images/CVV_AMEX.png")) : "visa" == $.payment.cardType($("#Card_number_input").val()) ? ($("#card_image").html("<img src='images/visa.png'/>"), "xs" == E() || "sm" == E() ? $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER_MOBILE.png") : $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER.png")) : "mastercard" == $.payment.cardType($("#Card_number_input").val()) ? ($("#card_image").html("<img src='images/master.png'/>"), "xs" == E() || "sm" == E() ? $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER_MOBILE.png") : $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER.png")) : "carnet" == $.payment.cardType($("#Card_number_input").val()) ? ($("#card_image").html("<img src='images/carnet.png'/>"), "xs" == E() || "sm" == E() ? $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER_MOBILE.png") : $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER.png")) : ($("#card_image").html("<i class='fa fa-credit-card'></i>"), "xs" == E() || "sm" == E() ? $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER_MOBILE.png") : $("#imagen_ayuda").attr("src", "images/CVV_VISA_MASTER.png"))
    }), jQuery.validator.addMethod("phoneno", function(e, a) {
        return e = e.replace(/\s+/g, ""), this.optional(a) || e.length > 9 && e.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/)
    }, v), $("#continue_s").click(function() {
        "00" == n && (window.top.location.href = t)
    }), $("#continue_d").click(function() {
        "00" != n && (window.top.location.href = t)
    }), $("#continue_c").click(function() {
        "00" != n && (window.top.location.href = t)
    }), $("input[name=cardNumber]").payment("formatCardNumber"), $("input[name=cardCVC]").payment("formatCardCVC"), $("input[name=cardExpiry]").payment("formatCardExpiry"), paymentFormReady = function() {
        return !!(p.find("[name=cardNumber]").hasClass("success") && p.find("[name=cardExpiry]").hasClass("success") && p.find("[name=cardCVC]").val().length > 1)
    };
    var C = setInterval(function() {
        paymentFormReady() && (p.find(".subscribe").prop("disabled", !1), clearInterval(C))
    }, 250);
    $("#image_help_div").hide(), $("#help_cvv").mouseover(function() {
        $("#image_help_div").stop(!0, !0).show(400)
    }).mouseout(function() {
        $("#image_help_div").stop(!0, !0).hide(400)
    })
});