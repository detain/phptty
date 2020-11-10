(function () {
  'use strict';

  // debounce function for window resize
  function debounce(func, wait, immediate) {
    var timeout;
    return function () {
      var context = this, args = arguments;
      clearTimeout(timeout);
      timeout = setTimeout(function () {
        timeout = null;
        if (!immediate) {
          func.apply(context, args);
        }
      }, wait);
      if (immediate && !timeout) {
        func.apply(context, args);
      }
    };
  }

  if (window.WebSocket) {
    window.addEventListener('load', function () {

      var socket = new WebSocket("ws://" + document.domain + ":7778");

      socket.onopen = function () {
        var height = Math.max(Math.round(window.innerHeight / 19.50), 15);

        var term = new Terminal({
          cols: 130,
          rows: 80,
          useStyle: true,
          screenKeys: true,
          cursorBlink: true
        });

        Terminal.applyAddon(fit);

        term.open(document.getElementById('terminal'));
        socket.send("clear\n");
        term.resize(0, height);
        term.fit();
        term.focus();

        term.on('data', function (data) {
          socket.send(data);
        });

        socket.onmessage = function (data) {
          term.write(data.data);
        };

        socket.onclose = function () {
          term.write("Connection closed.");
        };

        //
        window.addEventListener('resize', debounce(function (e) {
          var height = Math.max(Math.round(window.innerHeight / 19.50), 15);
          term.resize(0, height);
          term.fit();
        }, 300));
      };
    }, false);
  } else {
    alert("Browser do not support WebSocket.");
  }
}());