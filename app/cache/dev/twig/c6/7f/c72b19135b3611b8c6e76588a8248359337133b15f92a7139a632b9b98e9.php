<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_c67fc72b19135b3611b8c6e76588a8248359337133b15f92a7139a632b9b98e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  83 => 30,  70 => 26,  29 => 4,  38 => 13,  26 => 3,  87 => 20,  55 => 13,  25 => 3,  21 => 2,  75 => 28,  68 => 14,  56 => 9,  50 => 15,  41 => 9,  24 => 2,  201 => 92,  199 => 91,  196 => 90,  183 => 82,  173 => 74,  171 => 73,  168 => 72,  166 => 71,  163 => 70,  156 => 66,  151 => 63,  142 => 59,  138 => 57,  136 => 56,  133 => 55,  123 => 47,  121 => 46,  117 => 44,  112 => 42,  101 => 24,  91 => 35,  86 => 28,  69 => 25,  62 => 24,  51 => 15,  39 => 6,  19 => 1,  93 => 9,  88 => 6,  80 => 19,  46 => 14,  44 => 10,  32 => 6,  27 => 4,  22 => 2,  43 => 8,  40 => 8,  169 => 53,  162 => 54,  160 => 53,  154 => 49,  150 => 47,  144 => 45,  141 => 44,  137 => 42,  131 => 40,  124 => 37,  118 => 35,  115 => 43,  111 => 32,  105 => 40,  102 => 29,  98 => 40,  92 => 21,  89 => 20,  85 => 19,  79 => 29,  76 => 19,  66 => 25,  64 => 12,  57 => 16,  54 => 21,  49 => 19,  36 => 7,  33 => 6,  30 => 5,  604 => 163,  599 => 160,  586 => 158,  573 => 157,  570 => 156,  557 => 154,  554 => 153,  551 => 152,  532 => 149,  525 => 148,  520 => 147,  505 => 144,  502 => 143,  489 => 141,  478 => 140,  476 => 139,  472 => 137,  470 => 136,  465 => 133,  456 => 129,  442 => 127,  438 => 126,  432 => 125,  429 => 124,  415 => 122,  411 => 121,  407 => 120,  403 => 118,  400 => 117,  391 => 115,  386 => 114,  383 => 113,  380 => 112,  371 => 110,  366 => 109,  363 => 108,  351 => 107,  347 => 106,  343 => 104,  340 => 103,  331 => 101,  326 => 100,  323 => 99,  320 => 98,  311 => 96,  306 => 95,  303 => 94,  300 => 93,  291 => 91,  286 => 90,  283 => 89,  279 => 88,  275 => 86,  271 => 84,  268 => 83,  264 => 81,  261 => 80,  258 => 79,  249 => 78,  246 => 77,  243 => 76,  240 => 75,  231 => 74,  228 => 73,  226 => 72,  223 => 71,  219 => 70,  217 => 69,  212 => 67,  208 => 66,  204 => 65,  200 => 64,  191 => 63,  187 => 84,  164 => 46,  158 => 67,  149 => 43,  143 => 42,  134 => 40,  128 => 39,  119 => 37,  113 => 36,  99 => 25,  94 => 22,  84 => 18,  78 => 40,  72 => 16,  67 => 13,  52 => 11,  48 => 10,  42 => 12,  35 => 7,  31 => 5,  28 => 2,);
    }
}
