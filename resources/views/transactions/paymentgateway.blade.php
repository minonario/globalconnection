<html><head>
    <link rel="shortcut icon" href="/PaymentGateway/images/favicon.png" type="image/png">
    <link rel="icon" href="/PaymentGateway/images/favicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="-1">
    <!-- Favicon icon -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{ asset('material') }}/pay/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('material') }}/pay/css/Styles.css" rel="stylesheet">
    <link href="{{ asset('material') }}/pay/css/Style_v2.css?v=20200126" rel="stylesheet">
    
    <script src="{{ asset('material') }}/pay/js/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('material') }}/pay/js/jquery.validate.min.js"></script>
    <script src="{{ asset('material') }}/pay/js/jquery.payment.js"></script>
    <script src="{{ asset('material') }}/pay/js/Process.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/imask/3.4.0/imask.min.js"></script>

    <script type="text/javascript">

      // F5 button and cntrl+r (reload) disabled 
      /*document.onkeydown = function (event) {
       switch (event.keyCode) {
       case 116: //F5 button 
       event.returnValue = false;
       event.keyCode = 0;
       return false;
       case 82: //R button 
       if (event.ctrlKey) {
       event.returnValue = false;
       event.keyCode = 0;
       return false;
       }
       }
       }
       
       window.onload = function() {
       document.addEventListener("contextmenu", function(e){
       e.preventDefault();
       }, false);
       document.addEventListener("keydown", function(e) {
       //document.onkeydown = function(e) {
       // "I" key
       if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
       disabledEvent(e);
       }
       // "J" key
       if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
       disabledEvent(e);
       }
       // "S" key + macOS
       if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
       disabledEvent(e);
       }
       // "U" key
       if (e.ctrlKey && e.keyCode == 85) {
       disabledEvent(e);
       }
       // "F12" key
       if (event.keyCode == 123) {
       disabledEvent(e);
       }
       }, false);
       function disabledEvent(e){
       if (e.stopPropagation){
       e.stopPropagation();
       } else if (window.event){
       window.event.cancelBubble = true;
       }
       e.preventDefault();
       return false;
       }
       };*/

    </script>



    <title>
      Payment Form
    </title></head>
  <body oncontextmenu="return false;">



    <div id="users-device-size">
      <div id="xs" class="visible-xs"></div>
      <div id="sm" class="visible-sm"></div>
      <div id="md" class="visible-md"></div>
      <div id="lg" class="visible-lg"></div>
    </div>
    <form method="post" action="#" id="payment_form" novalidate="novalidate">
      <div class="aspNetHidden">

        <div id="load" style="display:none"></div>
        <center><div id="div_full" class="row">
            <div id="jquery_div"> <script>  $(document).ready(function () {
                var valuewithid = '87721';
                $('#total_amount').val('1.00');
                $('#TokenID').val('E931BF8FDBA74E1FB6A98F1254C57A9F6I3WDK02J720220511131840');
                $('#UrlResultOk').val('Response/response?tk=E931B');
                $('#UrlResultNotOk').val('Response/response?tk=E931B');
                var userLang = navigator.language || navigator.userLanguage;
                var lang_final = userLang.split('-')[0];
                if (lang_final == 'es') {
                  $('#name_buttom_pay').text('Pagar $1.00');
                } else {
                  $('#name_buttom_pay').text('Pay $1.00')
                }
                ;
              });</script> </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="panel panel-default credit-card-box" style="max-width: 380px;position:relative;">
                <div id="panel_logo" class="panel-heading display-table " style="padding: 0px !important;">
                  <div class="row display-tr">

                    <div class="display-td">                            
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAMAAABThUXgAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAADlQTFRF5N3A19C1n5uHraiSraeRn5qGtrGau7WdxL6lqKOO4Nm829S40cuwpJ+KyMKpv7mhzcassqyW////McVzLwAAAAF0Uk5TAEDm2GYAAAABYktHRBJ7vGwAAAAACXBIWXMAAABIAAAASABGyWs+AAAD1klEQVR42u3d22KjIBRGYW3FeKz6/i87ERGBbEypjU7b9d+MMZRsvnhAcjFZRgghhBBCCCGEEEIIIeQxeSx/Z6SfH+tbLL8O6+3t8FjBSsN6F/PrsN4jScP641dtsMACCyywwAILLLDAAgsssMACCyywwAILLLDAAgsssMACCyywwAILLLDAAgsssMACCyyw5KaFUqrUW7f7VrHsrOa9ddUsr9r7C9XarXlDmVSd39u8z9vl97R0V9X3fX2V77Tx+rKfr2w+hBr8d1+CVc2F6zr79WO63nxo3z3DUmrYwwp7mjPYP71F2yRhrTWcgNXMtY73jXFVy7dPDYqVsFQVx3ro6Z4p+EupTSrW0tMJWPrsK82/83fd1E4VWm8fq49iPfbkHldLl1KbdKz+LKzOVNmb2ubzUk1t1pbrdxbB6rJmCo8H7/VjT+Y4Ku+Xq26YIm32sbrg/a2Gx2PzBXfDWp+H43p5n1/W9tpf72FlTfg9egU/9qQPX49EaJOGtdVwClalz8ObGUW+jX/2U/kelh5rFcESetIDm5z2QptULFvDKViNPg/ns3C+ZHwos2GGVn0ZS+hJg4xOe6HN/42VzZeL9fKuj7PamYMNT0/DMYIl9FSFNwShzZdOw/E0rNG9c9+cE2VaBKNY7bQdGI9YQk/OvDfaxuvLv3XaF7VUg//uyx53euczSqdkM5T9qUMZmzoIPZlpSmsHJbRJwnJrOAmrcmaXUyJW38awJhnr5mJN34K11HAS1lJ8Y4+H8vNYRZvtHVnlEyyhTTqWqeEkLP0Fl9GryB5WHX+QjlyzJhfr2TXr2QXereGcC/z2qJN2N2z6+PNc/G5Y2+eG+hvuhk4NF2AJM5/GYuX+3TA8cT43z2ocrOPzrK2GC7CkObWdTY3uQ2unR6yiF/jYs0DlYB2fwW81XIDlPKPZrWJ9286TTGHhmeMXHOmpbjYsqU3ipNTWcAWWXQeY7GEwmK3KWzvq3JXD3VWHrSd92hX5hiW0ScSyNVyB5a0w6aNgvXtt93D7qNEL1xnbTOgp83bJn5aynuXWcMZ6VoglrV0O4cLo+t4tOHd8U6GnPMA6uFLq1nAJlrQqXgZL7muheTDG4AAUeurqYH50aA3ereEaLPN7S+GeX6NethvycCCFP3sIsKSell1q2n4YEtqkYK01nIXF74ZggQUWWGCBBRZYYIEFFlhggQUWWGCBBRZYYIEFFlhggQUWWGCBBRZYYIEFFlhggQUWWGCBBRZYYIEFFlhggQUWWGD9cKxj/x/8T0I5OlawwHoNFiGEEEIIIYQQQgghhBASyT8TwkwgL/0LCwAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxNi0wMi0yNlQxODozNzowMiswMDowMNA8pNcAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTYtMDItMjZUMTg6Mzc6MDIrMDA6MDChYRxrAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAABJRU5ErkJggg==" id="image_logo_client" style="left: 0;right: 0;width: 100%;max-width: 390px;">
                    </div>
                  </div>                    
                </div>

                <div class="panel-heading display-table" style="padding: 0px 15px !important;">
                  <div class="row display-tr">

                    <div class="display-td">                            
                      <img src="data:image/png;base64,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" id="image_cards_full" class="img-responsive pull-right">


                    </div>
                  </div>                    
                </div>
                <div class="panel-body" id="Form_full">

                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                        <label for="cardNumber"><span id="Order">Referencia</span></label>
                        <span style="font-size:large;"><label id="Order_post" style="font-weight: 100">FACT001</label></span>
                      </div>                            
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                        <label for="cardNumber"><span id="Amount">Monto</span></label>
                        <span style="font-size:large"><b><label id="totalamount">$1.00</label></b></span>
                      </div>                            
                    </div>
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="Title_USer"><span id="Name">Nombre del titular</span></label>
                        <div class="form-group" style="width:100%">
                          <input class="form-control" name="Title_USer" id="Title_USer" maxlength="40" required="" autofocus="" autocomplete="off" aria-required="true" placeholder="Como aparece en su tarjeta">

                        </div>
                      </div>                            
                    </div>
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="cardNumber"><span id="Card_number">Número de Tarjeta</span></label>
                        <div class="input-group">
                          <input type="tel" class="form-control mastercard" name="cardNumber" id="Card_number_input" required="" autofocus="" aria-required="true" placeholder="Número de tarjeta válida" aria-invalid="true">
                          <span class="input-group-addon"><div id="card_image">
                              <i class="fa fa-credit-card"></i>
                            </div></span>
                        </div>
                        <!--<label id="Card_number_input-error" class="error" for="Card_number_input">Escriba un número de tarjeta válido</label>-->
                      </div>                            
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-7 col-md-7">
                      <div class="form-group">
                        <label for="cardExpiry"><span class="hidden-xs hidden-sm hidden-md"><span id="Date_Expire">Fecha de expiración</span></span><span class="visible-xs-inline visible-sm-inline visible-md-inline"><span id="Date_Expire_xs">Fecha Exp.</span></span></label>
                        <input type="tel" class="form-control" name="cardExpiry" id="cardExpiry" autocomplete="cc-exp" required="" aria-required="true" placeholder="MM / AAAA">
                      </div>
                    </div>
                    <div class="col-xs-5 col-md-5 pull-right">
                      <div class="form-group">
                        <label for="cardCVC"><span class="hidden-xs hidden-sm hidden-md"><span id="Code_CVC">CVV</span></span><span class="visible-xs-inline visible-sm-inline visible-md-inline"><span id="Code_CVC_xs">CVV</span></span></label>
                        <div class="input-group">
                          <input type="tel" class="form-control" name="cardCVC" autocomplete="cc-csc" id="cardCVC" required="" aria-required="true" placeholder="CVV">

                          <span class="input-group-addon" id="help_cvv"><i class="fa fa-question-circle"></i></span>
                        </div>
                      </div>

                      <div class="image_help" id="image_help_div" style="display: none;"><img id="imagen_ayuda" src="{{ asset('material') }}/pay/images/CVV_VISA_MASTER.png"></div>


                    </div>

                  </div>

                  <div id="email_text" class="row">
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="couponCode"><span id="Email_title">Correo electrónico</span></label>
                        <label for="emailtext"><span id="span_email_text">minonario23@gmail.com</span></label>
                      </div>
                    </div>                        
                  </div>
                  <div class="row" style="display:none">
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="couponCode"><span id="Phonetitle">Teléfono</span></label>
                        <input type="tel" class="form-control" autocomplete="off" maxlength="10" id="cellphone" name="cellphone" placeholder="Teléfono">
                      </div>
                    </div>                        
                  </div>



                  <div class="row">
                    <div class="hidden-xs"></div>

                    <div class="col-xs-12"><img style="max-width: 150px; position: relative; top: -10px; margin-bottom: -17px;" src="{{ asset('material') }}/pay/images/visa_master_logo.png"></div>
                    <div class="col-xs-12"><span style="font-size: 12px;" id="message">Su pago se realizará de forma segura con encriptación TLS 1.2</span></div>


                    <div class="col-xs-12" style="MARGIN-TOP: 7px;">
                      <button id="buttom_pay" class="subscribe btn btn-default btn-lg btn-block" style="background-color: #c1c7c7; font-weight: 600;" type="button"><span id="name_buttom_pay">Pay $1.00</span></button>
                    </div>
                  </div>
                  <div class="row" style="display:none;">
                    <div class="col-xs-12">
                      <p class="payment-errors"></p>
                    </div>
                  </div>

                  <div class="container" id="card_view">

                    <div class="creditcard">
                      <div class="front">
                        <div id="ccsingle"></div>
                        <svg version="1.1" id="cardfront" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;" xml:space="preserve">
                        <g id="Front">
                        <g id="CardBackground">
                        <g id="Page-1_1_">
                        <g id="amex_1_">
                        <path id="Rectangle-1_1_" class="lightcolor grey" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                              C0,17.9,17.9,0,40,0z"></path>
                        </g>
                        </g>
                        <path class="darkcolor greydark" d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z"></path>
                        </g>
                        <text transform="matrix(1 0 0 1 60.106 295.0121)" id="svgnumber" class="st2 st3 st4">0123 4567 8910 1112</text>
                        <text transform="matrix(1 0 0 1 54.1064 428.1723)" id="svgname" class="st2 st5 st6">Global Bridge</text>
                        <text transform="matrix(1 0 0 1 54.1074 389.8793)" class="st7 st5 st8">cardholder name</text>
                        <text transform="matrix(1 0 0 1 479.7754 388.8793)" class="st7 st5 st8">expiration</text>
                        <text transform="matrix(1 0 0 1 65.1054 241.5)" class="st7 st5 st8">card number</text>
                        <g>
                        <text transform="matrix(1 0 0 1 574.4219 433.8095)" id="svgexpire" class="st2 st5 st9">01/23</text>
                        <text transform="matrix(1 0 0 1 479.3848 417.0097)" class="st2 st10 st11">VALID</text>
                        <text transform="matrix(1 0 0 1 479.3848 435.6762)" class="st2 st10 st11">THRU</text>
                        <polygon class="st2" points="554.5,421 540.4,414.2 540.4,427.9 		"></polygon>
                        </g>
                        <g id="cchip">
                        <g>
                        <path class="st2" d="M168.1,143.6H82.9c-10.2,0-18.5-8.3-18.5-18.5V74.9c0-10.2,8.3-18.5,18.5-18.5h85.3
                              c10.2,0,18.5,8.3,18.5,18.5v50.2C186.6,135.3,178.3,143.6,168.1,143.6z"></path>
                        </g>
                        <g>
                        <g>
                        <rect x="82" y="70" class="st12" width="1.5" height="60"></rect>
                        </g>
                        <g>
                        <rect x="167.4" y="70" class="st12" width="1.5" height="60"></rect>
                        </g>
                        <g>
                        <path class="st12" d="M125.5,130.8c-10.2,0-18.5-8.3-18.5-18.5c0-4.6,1.7-8.9,4.7-12.3c-3-3.4-4.7-7.7-4.7-12.3
                              c0-10.2,8.3-18.5,18.5-18.5s18.5,8.3,18.5,18.5c0,4.6-1.7,8.9-4.7,12.3c3,3.4,4.7,7.7,4.7,12.3
                              C143.9,122.5,135.7,130.8,125.5,130.8z M125.5,70.8c-9.3,0-16.9,7.6-16.9,16.9c0,4.4,1.7,8.6,4.8,11.8l0.5,0.5l-0.5,0.5
                              c-3.1,3.2-4.8,7.4-4.8,11.8c0,9.3,7.6,16.9,16.9,16.9s16.9-7.6,16.9-16.9c0-4.4-1.7-8.6-4.8-11.8l-0.5-0.5l0.5-0.5
                              c3.1-3.2,4.8-7.4,4.8-11.8C142.4,78.4,134.8,70.8,125.5,70.8z"></path>
                        </g>
                        <g>
                        <rect x="82.8" y="82.1" class="st12" width="25.8" height="1.5"></rect>
                        </g>
                        <g>
                        <rect x="82.8" y="117.9" class="st12" width="26.1" height="1.5"></rect>
                        </g>
                        <g>
                        <rect x="142.4" y="82.1" class="st12" width="25.8" height="1.5"></rect>
                        </g>
                        <g>
                        <rect x="142" y="117.9" class="st12" width="26.2" height="1.5"></rect>
                        </g>
                        </g>
                        </g>
                        </g>
                        <g id="Back">
                        </g>
                        </svg>
                      </div>
                      <div class="back">
                        <svg version="1.1" id="cardback" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;" xml:space="preserve">
                        <g id="Front">
                        <line class="st0" x1="35.3" y1="10.4" x2="36.7" y2="11"></line>
                        </g>
                        <g id="Back">
                        <g id="Page-1_2_">
                        <g id="amex_2_">
                        <path id="Rectangle-1_2_" class="darkcolor greydark" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                              C0,17.9,17.9,0,40,0z"></path>
                        </g>
                        </g>
                        <rect y="61.6" class="st2" width="750" height="78"></rect>
                        <g>
                        <path class="st3" d="M701.1,249.1H48.9c-3.3,0-6-2.7-6-6v-52.5c0-3.3,2.7-6,6-6h652.1c3.3,0,6,2.7,6,6v52.5
                              C707.1,246.4,704.4,249.1,701.1,249.1z"></path>
                        <rect x="42.9" y="198.6" class="st4" width="664.1" height="10.5"></rect>
                        <rect x="42.9" y="224.5" class="st4" width="664.1" height="10.5"></rect>
                        <path class="st5" d="M701.1,184.6H618h-8h-10v64.5h10h8h83.1c3.3,0,6-2.7,6-6v-52.5C707.1,187.3,704.4,184.6,701.1,184.6z"></path>
                        </g>
                        <text transform="matrix(1 0 0 1 621.999 227.2734)" id="svgsecurity" class="st6 st7">985</text>
                        <g class="st8">
                        <text transform="matrix(1 0 0 1 518.083 280.0879)" class="st9 st6 st10">security code</text>
                        </g>
                        <rect x="58.1" y="378.6" class="st11" width="375.5" height="13.5"></rect>
                        <rect x="58.1" y="405.6" class="st11" width="421.7" height="13.5"></rect>
                        <text transform="matrix(1 0 0 1 59.5073 228.6099)" id="svgnameback" class="st12 st13">Global Bridge</text>
                        </g>
                        </svg>
                      </div>
                    </div>
                  </div>

                </div>


                <input type="hidden" id="total_amount" value="1.00">
                <input type="hidden" id="UrlResultOk" value="https://gatewaypty.gbcpay.net/Response/response?tk=E931BF8FDBA74E1FB6A98F1254C57A9F6I3WDK02J720220511131840">
                <input type="hidden" id="UrlResultNotOk" value="https://gatewaypty.gbcpay.net/Response/response?tk=E931BF8FDBA74E1FB6A98F1254C57A9F6I3WDK02J720220511131840">

                <input type="hidden" id="TokenID" value="E931BF8FDBA74E1FB6A98F1254C57A9F6I3WDK02J720220511131840">

                <div class="panel-body" id="success" style="display:none">

                  <div class="row">
                    <center> <div class="col-xs-12 col-sm-12 col-md-12">
                        <span style="font-size:large"> <b>Monto:</b><b><label id="success_amount">$1.00</label></b></span>
                      </div></center>

                    <div style="margin-top:50px;"></div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="checkmark" id="check_procesado" style="max-width:150px">
                        <div class="animation-ctn">
                          <div class="icon icon--order-success svg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="154px" height="154px">  
                            <g fill="none" stroke="#22AE73" stroke-width="2"> 
                            <circle cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                            <circle id="colored" fill="#22AE73" cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                            <polyline class="st0" stroke="#fff" stroke-width="10" points="43.5,77.8 63.7,97.9 112.2,49.4 " style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"></polyline>   
                            </g> 
                            </svg>
                          </div>
                        </div>


                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:30px;">
                      <span style="font-size:large"><b>¡Transacción realizada con éxito!</b> </span>                              

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:30px;">
                      <span> <b>Número de Autorización:</b></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <span"><label id="autoritation_no">222222222</label>
                      </span></div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:30px;">
                      <span> <b>Fecha:</b></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <span><label id="transactiondate">09/08/2018 13:05:00</label></span>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
                      <button class="btn btn-default btn-lg" id="continue_s" style="background-color: #c1c7c7; width: 100%;" type="button"><span id="name_buttom_continue">Continuar</span></button>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
                      <img src="{{ asset('material') }}/pay/images/logopp.png" style="max-width: 171px;">
                    </div>



                  </div>
                </div>

                <div class="panel-body" id="declined" style="display:none">

                  <div class="row">
                    <center> <div class="col-xs-12 col-sm-12 col-md-12">
                        <span style="font-size:large"> <b>Monto:</b><b><label id="declined_amount">$1.00</label></b></span>
                      </div></center>

                    <div style="margin-top:50px;"></div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="animation-ctn">
                        <div class="icon icon--order-success svg">
                          <svg xmlns="http://www.w3.org/2000/svg" width="154px" height="154px">  
                          <g fill="none" stroke="#F44812" stroke-width="2"> 
                          <circle cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                          <circle id="colored" fill="#F44812" cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                          <polyline class="st0" stroke="#fff" stroke-width="10" points="43.5,77.8  112.2,77.8 " style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"></polyline>   
                          </g> 
                          </svg>
                        </div>
                      </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:30px;">
                      <span style="font-size:large"><b>Su transacción ha sido rechazada</b> </span>                              

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <span style="font-size:large">Verifique su método de  pago y/o contacte al banco emisor </span>                              

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:30px;">
                      <span> <b>Fecha:</b></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <span><label id="transactiondatedeclined">09/08/2018 13:05:00</label></span>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
                      <button id="tryagain_d" class="btn btn-default btn-lg" style="background-color: #c1c7c7; width: 100%;" type="submit">Intentar Nuevamente</button>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:50px;">
                      <img src="{{ asset('material') }}/pay/images/logopp.png" style="max-width: 171px;">
                    </div>



                  </div>
                </div>

                <div class="panel-body" id="comunication" style="display:none">

                  <div class="row">
                    <center> <div class="col-xs-12 col-sm-12 col-md-12">
                        <span style="font-size:large"> <b>Monto:</b><b><label id="comunication_amount">$1.00</label></b></span>
                      </div></center>

                    <div style="margin-top:50px;"></div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="animation-ctn">
                        <div class="icon icon--order-success svg">
                          <svg xmlns="http://www.w3.org/2000/svg" width="154px" height="154px">  
                          <g fill="none" stroke="#F44812" stroke-width="2"> 
                          <circle cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                          <circle id="colored" fill="#F44812" cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                          <polyline class="st0" stroke="#fff" stroke-width="10" points="43.5,77.8  112.2,77.8 " style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"></polyline>   
                          </g> 
                          </svg>
                        </div>
                      </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:30px;">
                      <span style="font-size:large"><b>Error de comunicación con la entidad financiera</b> </span>                              

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <span style="font-size:large">Por favor intente nuevamente</span>                              

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:30px;">
                      <span> <b>Fecha:</b></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <span><label id="transactiondatecomunication">09/08/2018 13:05:00</label></span>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
                      <button class="btn btn-default btn-lg" id="continue_c" style="background-color: #c1c7c7; width: 100%;" type="button"><span id="name_buttom_continue_c">Continuar</span></button>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:50px;">
                      <img src="{{ asset('material') }}/pay/images/logopp.png" style="max-width: 171px;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div></center>  
    </form>
  </body>
</html>