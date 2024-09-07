/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else {
		var a = factory();
		for(var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
	}
})(self, function() {
return /******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/app/widgets/general.js":
/*!************************************!*\
  !*** ./src/app/widgets/general.js ***!
  \************************************/
/***/ (function() {

eval("function _typeof(o) { \"@babel/helpers - typeof\"; return _typeof = \"function\" == typeof Symbol && \"symbol\" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && \"function\" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? \"symbol\" : typeof o; }, _typeof(o); }\nfunction _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError(\"Cannot call a class as a function\"); }\nfunction _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, \"value\" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }\nfunction _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, \"prototype\", { writable: !1 }), e; }\nfunction _toPropertyKey(t) { var i = _toPrimitive(t, \"string\"); return \"symbol\" == _typeof(i) ? i : i + \"\"; }\nfunction _toPrimitive(t, r) { if (\"object\" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || \"default\"); if (\"object\" != _typeof(i)) return i; throw new TypeError(\"@@toPrimitive must return a primitive value.\"); } return (\"string\" === r ? String : Number)(t); }\nvar KTGeneralWidgets = /*#__PURE__*/function () {\n  function KTGeneralWidgets() {\n    _classCallCheck(this, KTGeneralWidgets);\n  }\n  return _createClass(KTGeneralWidgets, null, [{\n    key: \"initCompanyProfileMap\",\n    value: function initCompanyProfileMap() {\n      var element = 'company_profile_map';\n      if (!KTDom.getElement(\"#\".concat(element))) return;\n\n      // Check if Leaflet is included\n      if (!L) {\n        return;\n      }\n\n      // Define Map Location\n      var leaflet = L.map(element, {\n        center: [40.725, -73.985],\n        zoom: 30\n      });\n\n      // Init Leaflet Map. For more info check the plugin's documentation: https://leafletjs.com/\n      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {\n        attribution: '&copy; <a href=\"https://osm.org/copyright\">OpenStreetMap</a> contributors'\n      }).addTo(leaflet);\n\n      // Set Geocoding\n      var geocodeService;\n      if (typeof L.esri.Geocoding === 'undefined') {\n        geocodeService = L.esri.geocodeService();\n      } else {\n        geocodeService = L.esri.Geocoding.geocodeService();\n      }\n\n      // Define Marker Layer\n      var markerLayer = L.layerGroup().addTo(leaflet);\n\n      // Set Custom SVG icon marker\n      var leafletIcon = L.divIcon({\n        html: \"<i class=\\\"ki-solid ki-geolocation text-3xl text-success\\\"></i>\",\n        bgPos: [10, 10],\n        iconAnchor: [20, 37],\n        popupAnchor: [0, -37],\n        className: 'leaflet-marker'\n      });\n\n      // Show current address\n      L.marker([40.724716, -73.984789], {\n        icon: leafletIcon\n      }).addTo(markerLayer).bindPopup('430 E 6th St, New York, 10009.', {\n        closeButton: false\n      }).openPopup();\n\n      // Map onClick Action\n      leaflet.on('click', function (e) {\n        geocodeService.reverse().latlng(e.latlng).run(function (error, result) {\n          if (error) {\n            return;\n          }\n          markerLayer.clearLayers();\n          var selectedlocation = result.address.Match_addr;\n          L.marker(result.latlng, {\n            icon: leafletIcon\n          }).addTo(markerLayer).bindPopup(result.address.Match_addr, {\n            closeButton: false\n          }).openPopup();\n        });\n      });\n    }\n  }, {\n    key: \"initContributionChart\",\n    value: function initContributionChart() {\n      var data = [44, 55, 41, 17, 15];\n      var labels = ['ERP', 'HRM', 'DMS', 'CRM', 'DAM'];\n      var colors = ['var(--tw-primary)', 'var(--tw-brand)', 'var(--tw-success)', 'var(--tw-info)', 'var(--tw-warning)'];\n      var options = {\n        series: data,\n        labels: labels,\n        colors: colors,\n        fill: {\n          colors: colors\n        },\n        chart: {\n          type: 'donut'\n        },\n        stroke: {\n          show: true,\n          width: 2,\n          // Set the width of the border\n          colors: 'var(--tw-light)' // Set the color of the border\n        },\n        dataLabels: {\n          enabled: false\n        },\n        plotOptions: {\n          pie: {\n            expandOnClick: false\n          }\n        },\n        legend: {\n          offsetY: -5,\n          offsetX: -10,\n          fontSize: '14px',\n          // Set the font size\n          fontWeight: '500',\n          // Set the font weight\n          labels: {\n            colors: 'var(--tw-gray-700)',\n            // Set the font color for the legend text\n            useSeriesColors: false // Optional: Set to true to use series colors for legend text\n          },\n          markers: {\n            width: 8,\n            height: 8\n          }\n        },\n        responsive: [{\n          breakpoint: 480,\n          options: {\n            chart: {\n              width: 200\n            },\n            legend: {\n              position: 'bottom'\n            }\n          }\n        }]\n      };\n      var element = document.querySelector('#contributions_chart');\n      if (!element) return;\n      var chart = new ApexCharts(element, options);\n      chart.render();\n    }\n  }, {\n    key: \"initMediaUploadsChart\",\n    value: function initMediaUploadsChart() {\n      var data = [85, 65, 50, 70, 40, 45, 100, 55, 85, 60, 70, 90];\n      var categories = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];\n      var options = {\n        series: [{\n          name: 'series1',\n          data: data\n        }],\n        chart: {\n          height: 250,\n          type: 'area',\n          toolbar: {\n            show: false\n          }\n        },\n        dataLabels: {\n          enabled: false\n        },\n        legend: {\n          show: false\n        },\n        stroke: {\n          curve: 'smooth',\n          show: true,\n          width: 3,\n          colors: ['var(--tw-primary)']\n        },\n        xaxis: {\n          categories: categories,\n          axisBorder: {\n            show: false\n          },\n          maxTicks: 12,\n          axisTicks: {\n            show: false\n          },\n          labels: {\n            style: {\n              colors: 'var(--tw-gray-500)',\n              fontSize: '12px'\n            }\n          },\n          crosshairs: {\n            position: 'front',\n            stroke: {\n              color: 'var(--tw-primary)',\n              width: 1,\n              dashArray: 3\n            }\n          },\n          tooltip: {\n            enabled: false,\n            formatter: undefined,\n            offsetY: 0,\n            style: {\n              fontSize: '12px'\n            }\n          }\n        },\n        yaxis: {\n          min: 0,\n          max: 100,\n          tickAmount: 5,\n          // This will create 5 ticks: 0, 20, 40, 60, 80, 100\n          axisTicks: {\n            show: false\n          },\n          labels: {\n            style: {\n              colors: 'var(--tw-gray-500)',\n              fontSize: '12px'\n            },\n            formatter: function formatter(value) {\n              return \"$\".concat(value, \"K\");\n            }\n          }\n        },\n        tooltip: {\n          enabled: true,\n          custom: function custom(_ref) {\n            var series = _ref.series,\n              seriesIndex = _ref.seriesIndex,\n              dataPointIndex = _ref.dataPointIndex,\n              w = _ref.w;\n            var number = parseInt(series[seriesIndex][dataPointIndex]) * 1000;\n            var month = w.globals.seriesX[seriesIndex][dataPointIndex];\n            var monthName = categories[month];\n            var formatter = new Intl.NumberFormat('en-US', {\n              style: 'currency',\n              currency: 'USD'\n            });\n            var formattedNumber = formatter.format(number);\n            return \"\\n\\t\\t\\t\\t\\t\\t<div class=\\\"flex flex-col gap-2 p-3.5\\\">\\n\\t\\t\\t\\t\\t\\t\\t<div class=\\\"font-medium text-2sm text-gray-600\\\">\".concat(monthName, \", 2024 Sale</div>\\n\\t\\t\\t\\t\\t\\t\\t<div class=\\\"flex items-center gap-1.5\\\">\\n\\t\\t\\t\\t\\t\\t\\t\\t<div class=\\\"font-semibold text-md text-gray-900\\\">\").concat(formattedNumber, \"</div>\\n\\t\\t\\t\\t\\t\\t\\t\\t<span class=\\\"badge badge-outline badge-success badge-xs\\\">+24%</span>\\n\\t\\t\\t\\t\\t\\t\\t</div>\\n\\t\\t\\t\\t\\t\\t</div>\\n\\t\\t\\t\\t\\t\\t\");\n          }\n        },\n        markers: {\n          size: 0,\n          colors: 'var(--tw-primary-light)',\n          strokeColors: 'var(--tw-primary)',\n          strokeWidth: 4,\n          strokeOpacity: 1,\n          strokeDashArray: 0,\n          fillOpacity: 1,\n          discrete: [],\n          shape: \"circle\",\n          radius: 2,\n          offsetX: 0,\n          offsetY: 0,\n          onClick: undefined,\n          onDblClick: undefined,\n          showNullDataPoints: true,\n          hover: {\n            size: 8,\n            sizeOffset: 0\n          }\n        },\n        fill: {\n          gradient: {\n            enabled: true,\n            opacityFrom: 0.25,\n            opacityTo: 0\n          }\n        },\n        grid: {\n          borderColor: 'var(--tw-gray-200)',\n          strokeDashArray: 5,\n          clipMarkers: false,\n          yaxis: {\n            lines: {\n              show: true\n            }\n          },\n          xaxis: {\n            lines: {\n              show: false\n            }\n          }\n        }\n      };\n      var element = document.querySelector('#media_uploads_chart');\n      if (!element) return;\n      var chart = new ApexCharts(element, options);\n      chart.render();\n    }\n  }, {\n    key: \"initEarningsChart\",\n    value: function initEarningsChart() {\n      var data = [75, 25, 45, 15, 85, 35, 70, 25, 35, 15, 45, 30];\n      var categories = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];\n      var options = {\n        series: [{\n          name: 'series1',\n          data: data\n        }],\n        chart: {\n          height: 250,\n          type: 'area',\n          toolbar: {\n            show: false\n          }\n        },\n        dataLabels: {\n          enabled: false\n        },\n        legend: {\n          show: false\n        },\n        stroke: {\n          curve: 'smooth',\n          show: true,\n          width: 3,\n          colors: ['var(--tw-primary)']\n        },\n        xaxis: {\n          categories: categories,\n          axisBorder: {\n            show: false\n          },\n          maxTicks: 12,\n          axisTicks: {\n            show: false\n          },\n          labels: {\n            style: {\n              colors: 'var(--tw-gray-500)',\n              fontSize: '12px'\n            }\n          },\n          crosshairs: {\n            position: 'front',\n            stroke: {\n              color: 'var(--tw-primary)',\n              width: 1,\n              dashArray: 3\n            }\n          },\n          tooltip: {\n            enabled: false,\n            formatter: undefined,\n            offsetY: 0,\n            style: {\n              fontSize: '12px'\n            }\n          }\n        },\n        yaxis: {\n          min: 0,\n          max: 100,\n          tickAmount: 5,\n          // This will create 5 ticks: 0, 20, 40, 60, 80, 100\n          axisTicks: {\n            show: false\n          },\n          labels: {\n            style: {\n              colors: 'var(--tw-gray-500)',\n              fontSize: '12px'\n            },\n            formatter: function formatter(value) {\n              return \"$\".concat(value, \"K\");\n            }\n          }\n        },\n        tooltip: {\n          enabled: true,\n          custom: function custom(_ref2) {\n            var series = _ref2.series,\n              seriesIndex = _ref2.seriesIndex,\n              dataPointIndex = _ref2.dataPointIndex,\n              w = _ref2.w;\n            var number = parseInt(series[seriesIndex][dataPointIndex]) * 1000;\n            var month = w.globals.seriesX[seriesIndex][dataPointIndex];\n            var monthName = categories[month];\n            var formatter = new Intl.NumberFormat('en-US', {\n              style: 'currency',\n              currency: 'USD'\n            });\n            var formattedNumber = formatter.format(number);\n            return \"\\n\\t\\t\\t\\t\\t\\t<div class=\\\"flex flex-col gap-2 p-3.5\\\">\\n\\t\\t\\t\\t\\t\\t\\t<div class=\\\"font-medium text-2sm text-gray-600\\\">\".concat(monthName, \", 2024 Sale</div>\\n\\t\\t\\t\\t\\t\\t\\t<div class=\\\"flex items-center gap-1.5\\\">\\n\\t\\t\\t\\t\\t\\t\\t\\t<div class=\\\"font-semibold text-md text-gray-900\\\">\").concat(formattedNumber, \"</div>\\n\\t\\t\\t\\t\\t\\t\\t\\t<span class=\\\"badge badge-outline badge-success badge-xs\\\">+24%</span>\\n\\t\\t\\t\\t\\t\\t\\t</div>\\n\\t\\t\\t\\t\\t\\t</div>\\n\\t\\t\\t\\t\\t\\t\");\n          }\n        },\n        markers: {\n          size: 0,\n          colors: 'var(--tw-primary-light)',\n          strokeColors: 'var(--tw-primary)',\n          strokeWidth: 4,\n          strokeOpacity: 1,\n          strokeDashArray: 0,\n          fillOpacity: 1,\n          discrete: [],\n          shape: \"circle\",\n          radius: 2,\n          offsetX: 0,\n          offsetY: 0,\n          onClick: undefined,\n          onDblClick: undefined,\n          showNullDataPoints: true,\n          hover: {\n            size: 8,\n            sizeOffset: 0\n          }\n        },\n        fill: {\n          gradient: {\n            enabled: true,\n            opacityFrom: 0.25,\n            opacityTo: 0\n          }\n        },\n        grid: {\n          borderColor: 'var(--tw-gray-200)',\n          strokeDashArray: 5,\n          clipMarkers: false,\n          yaxis: {\n            lines: {\n              show: true\n            }\n          },\n          xaxis: {\n            lines: {\n              show: false\n            }\n          }\n        }\n      };\n      var element = document.querySelector('#earnings_chart');\n      if (!element) return;\n      var chart = new ApexCharts(element, options);\n      chart.render();\n    }\n  }]);\n}();\nKTDom.ready(function () {\n  KTGeneralWidgets.initCompanyProfileMap();\n  KTGeneralWidgets.initContributionChart();\n  KTGeneralWidgets.initMediaUploadsChart();\n  KTGeneralWidgets.initEarningsChart();\n});\n\n//# sourceURL=webpack://metronic-tailwind-html/./src/app/widgets/general.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/app/widgets/general.js"]();
/******/
/******/ 	return __webpack_exports__;
/******/ })()
;
});
