(self["webpackChunk"] = self["webpackChunk"] || []).push([["validarFormularios"],{

/***/ "./assets/validator.js":
/*!*****************************!*\
  !*** ./assets/validator.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
__webpack_require__(/*! core-js/modules/es.array.index-of.js */ "./node_modules/core-js/modules/es.array.index-of.js");

__webpack_require__(/*! core-js/modules/es.function.bind.js */ "./node_modules/core-js/modules/es.function.bind.js");

__webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.replace.js */ "./node_modules/core-js/modules/es.string.replace.js");

__webpack_require__(/*! core-js/modules/es.parse-int.js */ "./node_modules/core-js/modules/es.parse-int.js");

/*const input_CUIT = document.getElementById('nueva_solicitud_cuit');
const input_CUIL = document.getElementById('nueva_solicitud_cuil');
const input_email = document.getElementById('nueva_solicitud_mail_first');
const input_email_repeat = document.getElementById('nueva_solicitud_mail_second');

input_CUIT.addEventListener('input', () => {
    input_CUIT.setCustomValidity("");
    if(!isValidCUITCUIL(input_CUIT.value))
        input_CUIT.setCustomValidity("Invalid CUIT!")
});

input_CUIL.addEventListener('input', () => {
    input_CUIL.setCustomValidity("");
    if (!isValidCUITCUIL(input_CUIL.value))
        input_CUIL.setCustomValidity("Invalid CUIL!")
});

input_email.addEventListener('input', () => {
    input_email.setCustomValidity("");
    if (!validator.isEmail(input_email.value))
        input_email.setCustomValidity("Invalid E-MAIL!")
});

input_email_repeat.addEventListener('input', () => {
    input_email_repeat.setCustomValidity("");
    if (input_email.value !== input_email_repeat.value)
        input_email_repeat.setCustomValidity("E-MAIL doesn't match!")
});*/
$(document).ready(function () {
  $('input[type=text]').each(function (index) {
    var input = $(this); //alert('Type: ' + input.attr('type') + ' | Name: ' + input.attr('name') + ' | Value: ' + input.val());

    var myClass = $(this).attr("class"); //es del tipo CUIT

    if (myClass.indexOf("val-cuit") >= 0) {
      input.bind("change blur", function (event) {
        input[0].setCustomValidity("");

        if (!isValidCUITCUIL(input.val())) {
          input[0].setCustomValidity("Invalid CUIL!");
          console.log(input.attr('id'));
          input.val('');
          input.focus();
          document.getElementById(input.attr('id')).focus();
          event.preventDefault();
          return false;
        }
      });
      input.bind('input', function () {
        input[0].setCustomValidity("");

        if (!isValidCUITCUIL(input.val())) {
          input[0].setCustomValidity("Invalid CUIL!");
          return false;
        }
      });
    }
  });
});

function isValidCUITCUIL(cuit) {
  if (cuit.length !== 13) return false;
  var rv = false;
  var resultado = 0;
  var cuit_nro = cuit.replace("-", "");
  var codes = "6789456789";
  var verificador = parseInt(cuit_nro[cuit_nro.length - 1]);
  var x = 0;

  while (x < 10) {
    var digitoValidador = parseInt(codes.substring(x, x + 1));
    if (isNaN(digitoValidador)) digitoValidador = 0;
    var digito = parseInt(cuit_nro.substring(x, x + 1));
    if (isNaN(digito)) digito = 0;
    var digitoValidacion = digitoValidador * digito;
    resultado += digitoValidacion;
    x++;
  }

  resultado = resultado % 11;
  rv = resultado === verificador;
  return rv;
}

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_internals_export_js-node_modules_core-js_internals_function-bind-8a1db0","vendors-node_modules_core-js_modules_es_array_index-of_js-node_modules_core-js_modules_es_fun-b41eb9"], () => (__webpack_exec__("./assets/validator.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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LGVBQUQsQ0FBVCxFQUNJQSxlQUFlLEdBQUcsQ0FBbEI7QUFDSixRQUFJRyxNQUFNLEdBQUdMLFFBQVEsQ0FBQ0osUUFBUSxDQUFDTyxTQUFULENBQW1CRixDQUFuQixFQUFzQkEsQ0FBQyxHQUFHLENBQTFCLENBQUQsQ0FBckI7QUFDQSxRQUFJRyxLQUFLLENBQUNDLE1BQUQsQ0FBVCxFQUNJQSxNQUFNLEdBQUcsQ0FBVDtBQUNKLFFBQUlDLGdCQUFnQixHQUFHSixlQUFlLEdBQUdHLE1BQXpDO0FBQ0FWLElBQUFBLFNBQVMsSUFBSVcsZ0JBQWI7QUFDQUwsSUFBQUEsQ0FBQztBQUNKOztBQUNETixFQUFBQSxTQUFTLEdBQUdBLFNBQVMsR0FBRyxFQUF4QjtBQUNBRCxFQUFBQSxFQUFFLEdBQUlDLFNBQVMsS0FBS0ksV0FBcEI7QUFDQSxTQUFPTCxFQUFQO0FBQ0giLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvdmFsaWRhdG9yLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIi8qY29uc3QgaW5wdXRfQ1VJVCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdudWV2YV9zb2xpY2l0dWRfY3VpdCcpO1xuY29uc3QgaW5wdXRfQ1VJTCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdudWV2YV9zb2xpY2l0dWRfY3VpbCcpO1xuY29uc3QgaW5wdXRfZW1haWwgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbnVldmFfc29saWNpdHVkX21haWxfZmlyc3QnKTtcbmNvbnN0IGlucHV0X2VtYWlsX3JlcGVhdCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdudWV2YV9zb2xpY2l0dWRfbWFpbF9zZWNvbmQnKTtcblxuaW5wdXRfQ1VJVC5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsICgpID0+IHtcbiAgICBpbnB1dF9DVUlULnNldEN1c3RvbVZhbGlkaXR5KFwiXCIpO1xuICAgIGlmKCFpc1ZhbGlkQ1VJVENVSUwoaW5wdXRfQ1VJVC52YWx1ZSkpXG4gICAgICAgIGlucHV0X0NVSVQuc2V0Q3VzdG9tVmFsaWRpdHkoXCJJbnZhbGlkIENVSVQhXCIpXG59KTtcblxuaW5wdXRfQ1VJTC5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsICgpID0+IHtcbiAgICBpbnB1dF9DVUlMLnNldEN1c3RvbVZhbGlkaXR5KFwiXCIpO1xuICAgIGlmICghaXNWYWxpZENVSVRDVUlMKGlucHV0X0NVSUwudmFsdWUpKVxuICAgICAgICBpbnB1dF9DVUlMLnNldEN1c3RvbVZhbGlkaXR5KFwiSW52YWxpZCBDVUlMIVwiKVxufSk7XG5cbmlucHV0X2VtYWlsLmFkZEV2ZW50TGlzdGVuZXIoJ2lucHV0JywgKCkgPT4ge1xuICAgIGlucHV0X2VtYWlsLnNldEN1c3RvbVZhbGlkaXR5KFwiXCIpO1xuICAgIGlmICghdmFsaWRhdG9yLmlzRW1haWwoaW5wdXRfZW1haWwudmFsdWUpKVxuICAgICAgICBpbnB1dF9lbWFpbC5zZXRDdXN0b21WYWxpZGl0eShcIkludmFsaWQgRS1NQUlMIVwiKVxufSk7XG5cbmlucHV0X2VtYWlsX3JlcGVhdC5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsICgpID0+IHtcbiAgICBpbnB1dF9lbWFpbF9yZXBlYXQuc2V0Q3VzdG9tVmFsaWRpdHkoXCJcIik7XG4gICAgaWYgKGlucHV0X2VtYWlsLnZhbHVlICE9PSBpbnB1dF9lbWFpbF9yZXBlYXQudmFsdWUpXG4gICAgICAgIGlucHV0X2VtYWlsX3JlcGVhdC5zZXRDdXN0b21WYWxpZGl0eShcIkUtTUFJTCBkb2Vzbid0IG1hdGNoIVwiKVxufSk7Ki9cblxuXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcbiQoJ2lucHV0W3R5cGU9dGV4dF0nKS5lYWNoKFxuICAgIGZ1bmN0aW9uKGluZGV4KXsgIFxuICAgICAgICB2YXIgaW5wdXQgPSAkKHRoaXMpO1xuICAgICAgICAvL2FsZXJ0KCdUeXBlOiAnICsgaW5wdXQuYXR0cigndHlwZScpICsgJyB8IE5hbWU6ICcgKyBpbnB1dC5hdHRyKCduYW1lJykgKyAnIHwgVmFsdWU6ICcgKyBpbnB1dC52YWwoKSk7XG5cdCAgICAgICAgdmFyIG15Q2xhc3MgPSAkKHRoaXMpLmF0dHIoXCJjbGFzc1wiKTtcbiAgICAgICAgXG5cdCAgICAgICAgLy9lcyBkZWwgdGlwbyBDVUlUXG5cdCAgICAgICAgaWYoIG15Q2xhc3MuaW5kZXhPZihcInZhbC1jdWl0XCIpID49IDAgKVxuXHQgICAgICAgIHtcblxuXHQgICAgICAgICAgICAgICBpbnB1dC5iaW5kKFwiY2hhbmdlIGJsdXJcIiwoZXZlbnQpPT57ICBcblxuXHRcdFx0ICAgIGlucHV0WzBdLnNldEN1c3RvbVZhbGlkaXR5KFwiXCIpO1xuXHRcdFx0ICAgIGlmICghaXNWYWxpZENVSVRDVUlMKGlucHV0LnZhbCgpKSlcblx0XHRcdCAgICB7XG5cdFx0XHQgICAgICAgIGlucHV0WzBdLnNldEN1c3RvbVZhbGlkaXR5KFwiSW52YWxpZCBDVUlMIVwiKTtcblx0XHRcdFx0Y29uc29sZS5sb2coaW5wdXQuYXR0cignaWQnKSk7XG4gICAgICBcdFx0XHQgICAgICAgIGlucHV0LnZhbCgnJyk7XG4gICAgICBcdFx0XHQgICAgICAgIGlucHV0LmZvY3VzKCk7XG4gICAgICBcdFx0XHQgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKGlucHV0LmF0dHIoJ2lkJykpLmZvY3VzKCk7XG4gICAgICBcdFx0XHQgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gICAgICBcdFx0XHQgICAgICAgIHJldHVybiBmYWxzZTtcblx0XHRcdCAgICB9XG5cdFx0ICAgICAgfSk7XG5cdCAgICAgICAgXG5cdCAgICAgICAgXG5cdFx0XHRpbnB1dC5iaW5kKCdpbnB1dCcsICgpID0+IHtcblx0XHRcdCAgICBpbnB1dFswXS5zZXRDdXN0b21WYWxpZGl0eShcIlwiKTtcblx0XHRcdCAgICBpZiAoIWlzVmFsaWRDVUlUQ1VJTChpbnB1dC52YWwoKSkpXG5cdFx0XHQgICAge1xuXHRcdFx0ICAgICAgICBpbnB1dFswXS5zZXRDdXN0b21WYWxpZGl0eShcIkludmFsaWQgQ1VJTCFcIilcblx0XHRcdCAgICAgICAgcmV0dXJuIGZhbHNlO1xuXHRcdFx0ICAgIH1cblx0XHRcdH0pO1xuXHQgICAgICAgIH1cbiAgICB9XG4pO1xufSlcblxuZnVuY3Rpb24gaXNWYWxpZENVSVRDVUlMKGN1aXQpIHtcblxuICAgIGlmIChjdWl0Lmxlbmd0aCAhPT0gMTMpXG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICBsZXQgcnYgPSBmYWxzZTtcbiAgICBsZXQgcmVzdWx0YWRvID0gMDtcbiAgICBsZXQgY3VpdF9ucm8gPSBjdWl0LnJlcGxhY2UoXCItXCIsIFwiXCIpO1xuICAgIGxldCBjb2RlcyA9IFwiNjc4OTQ1Njc4OVwiO1xuICAgIGxldCB2ZXJpZmljYWRvciA9IHBhcnNlSW50KGN1aXRfbnJvW2N1aXRfbnJvLmxlbmd0aCAtIDFdKTtcbiAgICBsZXQgeCA9IDA7XG4gICAgd2hpbGUgKHggPCAxMCkge1xuICAgICAgICBsZXQgZGlnaXRvVmFsaWRhZG9yID0gcGFyc2VJbnQoY29kZXMuc3Vic3RyaW5nKHgsIHggKyAxKSk7XG4gICAgICAgIGlmIChpc05hTihkaWdpdG9WYWxpZGFkb3IpKVxuICAgICAgICAgICAgZGlnaXRvVmFsaWRhZG9yID0gMDtcbiAgICAgICAgbGV0IGRpZ2l0byA9IHBhcnNlSW50KGN1aXRfbnJvLnN1YnN0cmluZyh4LCB4ICsgMSkpO1xuICAgICAgICBpZiAoaXNOYU4oZGlnaXRvKSlcbiAgICAgICAgICAgIGRpZ2l0byA9IDA7XG4gICAgICAgIGxldCBkaWdpdG9WYWxpZGFjaW9uID0gZGlnaXRvVmFsaWRhZG9yICogZGlnaXRvO1xuICAgICAgICByZXN1bHRhZG8gKz0gZGlnaXRvVmFsaWRhY2lvbjtcbiAgICAgICAgeCsrO1xuICAgIH1cbiAgICByZXN1bHRhZG8gPSByZXN1bHRhZG8gJSAxMTtcbiAgICBydiA9IChyZXN1bHRhZG8gPT09IHZlcmlmaWNhZG9yKTtcbiAgICByZXR1cm4gcnY7XG59XG4iXSwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCJlYWNoIiwiaW5kZXgiLCJpbnB1dCIsIm15Q2xhc3MiLCJhdHRyIiwiaW5kZXhPZiIsImJpbmQiLCJldmVudCIsInNldEN1c3RvbVZhbGlkaXR5IiwiaXNWYWxpZENVSVRDVUlMIiwidmFsIiwiY29uc29sZSIsImxvZyIsImZvY3VzIiwiZ2V0RWxlbWVudEJ5SWQiLCJwcmV2ZW50RGVmYXVsdCIsImN1aXQiLCJsZW5ndGgiLCJydiIsInJlc3VsdGFkbyIsImN1aXRfbnJvIiwicmVwbGFjZSIsImNvZGVzIiwidmVyaWZpY2Fkb3IiLCJwYXJzZUludCIsIngiLCJkaWdpdG9WYWxpZGFkb3IiLCJzdWJzdHJpbmciLCJpc05hTiIsImRpZ2l0byIsImRpZ2l0b1ZhbGlkYWNpb24iXSwic291cmNlUm9vdCI6IiJ9