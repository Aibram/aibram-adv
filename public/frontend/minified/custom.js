/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************!*\
  !*** ./public/js/lazyloading.js ***!
  \**********************************/
function lazyLoadImgs() {
  if ('loading' in HTMLImageElement.prototype) {
    var images = document.querySelectorAll('img[loading="lazy"]');
    images.forEach(function (img) {
      img.src = img.dataset.src;
    });
  } else {
    // Dynamically import the LazySizes library
    var script = document.createElement('script');
    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js';
    document.body.appendChild(script);
  }
}

$(function () {
  $('.lazy').Lazy();
  lazyLoadImgs();
});
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!******************************!*\
  !*** ./public/js/ajaxReq.js ***!
  \******************************/
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function sendAjaxReq(req) {
  var method = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "POST";
  var route = arguments.length > 2 ? arguments[2] : undefined;
  var callback = arguments.length > 3 ? arguments[3] : undefined;
  var showToaster = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : true;
  var blockUI = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : false;
  var ajaxJson = {
    url: route
  };

  if (method != "GET") {
    var fd = new FormData();

    for (key in req) {
      fd.append(key, req[key]);
    }

    fd.append('ajax', true);
    fd.append('_token', "{{csrf_token()}}");

    if (method == "PUT") {
      fd.append('_method', "put");
      method = "POST";
    }

    if (method == "DELETE") {
      fd.append('_method', "delete");
      method = "POST";
    }

    ajaxJson['data'] = fd;
    ajaxJson['processData'] = false;
    ajaxJson['contentType'] = false;
  } else {
    ajaxJson['dataType'] = 'json';
    ajaxJson['data'] = req;
  }

  ajaxJson['type'] = method;
  console.log(ajaxJson);

  if (blockUI) {
    $.blockUI({
      message: null
    });
  }

  $.ajax(_objectSpread(_objectSpread({}, ajaxJson), {}, {
    success: function success(data) {
      if (blockUI) {
        $.unblockUI();
      }

      if (data.status != 200) {
        //Toaster Error
        if (showToaster) toastr.error(data.message);
      } else {
        //Toaster Success
        if (showToaster) toastr.success(data.message);
        callback(data.data);
      }
    }
  }));
}

function setUrlFields(params) {
  var urlParams = new URLSearchParams(window.location.search);

  for (property in params) {
    urlParams.set(property, params[property]);
  }

  var newUrl = window.location.origin + window.location.pathname + "?" + urlParams.toString();
  history.pushState({}, null, newUrl);
}

function fillParamsObjectFromUrl(params) {
  var urlParams = new URLSearchParams(window.location.search);

  var _iterator = _createForOfIteratorHelper(urlParams.entries()),
      _step;

  try {
    for (_iterator.s(); !(_step = _iterator.n()).done;) {
      var pair = _step.value;
      if (pair[0] in params) params[pair[0]] = pair[1];
    }
  } catch (err) {
    _iterator.e(err);
  } finally {
    _iterator.f();
  }
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************!*\
  !*** ./public/js/favorite.js ***!
  \*******************************/
function handleFavorite(elem) {
  var obj = {
    advertisement_id: $(elem).data('id'),
    user_id: $('meta[name=user_id]').attr('content')
  };

  if ($(elem).hasClass('fav-add')) {
    sendAjaxReq(obj, "POST", addFavoriteURL, function (data) {
      if ($(elem).hasClass('btn')) {
        $(elem).html("\n                    <i class=\"fa fa-heart ml-2\"></i>".concat(data.message, "\n                "));
      }

      $('#fav_number').html("<p class=\"text-white text-bold\" id=\"fav_number\">\n                    <i class=\"fa fa-heart ml-2\"></i> ".concat(data.count, "\n                    ").concat(favWord, "\n                </p>"));
      $(elem).removeClass('fav-add').addClass('fav-remove');
    }, true, true);
  } else if ($(elem).hasClass('fav-remove')) {
    sendAjaxReq(obj, "POST", removeFavoriteURL, function (data) {
      if ($(elem).hasClass('btn')) {
        $(elem).html("\n                    <i class=\"fa fa-heart ml-2\"></i>".concat(data.message, "\n                "));
      }

      $('#fav_number').html("<p class=\"text-white text-bold\" id=\"fav_number\">\n                    <i class=\"fa fa-heart ml-2\"></i> ".concat(data.count, "\n                    ").concat(favWord, "\n                </p>"));
      $(elem).removeClass('fav-remove').addClass('fav-add');
    }, true, true);
  }
}
})();

/******/ })()
;