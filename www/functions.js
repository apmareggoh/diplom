var mass = [], i, x = 500, y = 50, svg = document.createElement('svg');
var jj = 0, jjj = 0;
var comment = 'На каждом шаге происходит проверка : если вставляемое значение меньше, чем значение узла - идем налево, иначе - направо.';
init = function (value) {
    for (i = 1; i < 100; i++) {
        mass[i] = 0;
    }
    mass[1] = value;
    circle = document.createElement('circle');
    text = document.createElement('text');
    circle.setAttribute('cx', 500);
    text.setAttribute('x', 500);
    circle.setAttribute('cy', (50));
    text.setAttribute('y', 50);
    text.innerHTML = value;
    circle.setAttribute('r', 10);
    circle.setAttribute('stroke-width', 3);
    circle.setAttribute('fill', "red");
    svg.appendChild(circle);
    svg.appendChild(text);
    circle = document.createElement('circle');
    circle.setAttribute('cx', -500);
    circle.setAttribute('cy', -50);
    circle.setAttribute('r', 10);
    circle.setAttribute('stroke-width', 3);
    circle.setAttribute('id', "current");
    circle.setAttribute('fill', "yellow");
    svg.appendChild(circle);
    document.getElementById('svg').innerHTML = "<svg>" + svg.innerHTML + "</svg>";
    svg.setAttribute('width', 1000);
    svg.setAttribute('height', 1000);
}

add = function (value) {
    comment = 'На каждом шаге происходит проверка : если вставляемое значение меньше, чем значение узла - идем налево, иначе - направо.';
    comment += '<br>Вставляем узел ' + value + '.';
    svg = document.getElementsByTagName('svg')[0];
    line = document.getElementsByTagName('line');
    for (i = 0; i < line.length; i++) {
        line[i].setAttribute('stroke', 'red');
    }
    var stop = 0, i = 1;
    jj = "";
    jjj = 1;
    var tt;
    var circle;
    var text;
    while (!stop) {
        if (value == mass[i]) {
            stop = 1;
        } else if (value > mass[i]) {
            if (mass[2 * i + 1] == 0) {
                comment += '<br>На узле со значением '+mass[i]+' вставляем новый узел ' +'справа.';
                i = 2 * i + 1;
                mass[i] = value;
                stop = 1;
                jj = jj + "1";
                jjj++;
                circle = document.createElement('circle');
                text = document.createElement('text');
                e = 0;
                x = 500;
                while (c = jj.charAt(e)) {
                    tt = 1000 / Math.pow(2, e + 2);
                    if (c == 1) {
                        x += tt;
                    } else if (c == 0) {
                        x -= tt;
                    }
                    e++;
                }
                c = jj.charAt(e - 1);
                if (c == 1) {
                    var x2 = x - tt;
                } else if (c == 0) {
                    var x2 = x + tt;
                }
                var line = document.createElement('line');
                line.setAttribute('x1', x);
                line.setAttribute('x2', x2);
                line.setAttribute('y2', y * jjj - 50);
                line.setAttribute('y1', y * jjj);
                line.setAttribute('stroke', "green");
                line.setAttribute('stroke-width', 1);
                line.setAttribute('id', jj);
                circle.setAttribute('cx', x);
                text.setAttribute('x', x);
                circle.setAttribute('cy', (y * jjj));
                text.setAttribute('y', (y * jjj));
                circle.setAttribute('r', 10);
                circle.setAttribute('stroke-width', 3);
                circle.setAttribute('fill', "red");
                text.innerHTML = value;
                svg.appendChild(circle);
                svg.appendChild(text);
                svg.appendChild(line);
            } else {
                comment += '<br>На узле со значением '+mass[i]+' поворачиваем направо.';
                i = 2 * i + 1;
                jj = jj + "1";
                line = document.getElementById(jj);
                line.setAttribute('stroke', 'green');
                jjj++;
            }
        } else if (value < mass[i]) {
            if (mass[2 * i] == 0) {
                comment += '<br>На узле со значением '+mass[i]+' вставляем новый узел ' +'слева.';
                i = 2 * i;
                mass[i] = value;
                stop = 1;
                jj = jj + "0";
                jjj++;
                circle = document.createElement('circle');
                text = document.createElement('text');
                e = 0;
                x = 500;
                while (c = jj.charAt(e)) {
                    tt = 1000 / Math.pow(2, e + 2);
                    if (c == 1) {
                        x += tt;
                    } else if (c == 0) {
                        x -= tt;
                    }
                    e++;
                }
                c = jj.charAt(e - 1);
                if (c == 1) {
                    var x2 = x - tt;
                } else if (c == 0) {
                    var x2 = x + tt;
                }
                var line = document.createElement('line');
                line.setAttribute('x1', x);
                line.setAttribute('x2', x2);
                line.setAttribute('y2', y * jjj - 50);
                line.setAttribute('y1', y * jjj);
                line.setAttribute('stroke', "green");
                line.setAttribute('stroke-width', 1);
                line.setAttribute('id', jj);
                circle.setAttribute('cx', x);
                text.setAttribute('x', x);
                circle.setAttribute('cy', (y * jjj));
                text.setAttribute('y', (y * jjj));
                circle.setAttribute('r', 10);
                circle.setAttribute('stroke-width', 3);
                circle.setAttribute('fill', "red");
                text.innerHTML = value;
                svg.appendChild(circle);
                svg.appendChild(text);
                svg.appendChild(line);
            } else {
                comment += '<br>На узле со значением '+mass[i]+' поворачиваем налево.';
                i = 2 * i;
                jjj++;
                jj = jj + "0";
                line = document.getElementById(jj);
                line.setAttribute('stroke', 'green');

            }
        }
    }
    document.getElementById('text').innerHTML = comment;
    return i;
}
init(500);
addElement = function () {
    add(parseInt(Math.random() * 1000));
    document.getElementById('svg').innerHTML = "<svg viewBox=\"0 0 1100 10\" preserveAspectRatio=\"xMinYMin meet\">" + svg.innerHTML + "</svg>";
    svg.setAttribute('width', 1000);
    svg.setAttribute('height', 1000);
}
//document.getElementById('svg').innerHTML="<svg>"+svg.innerHTML+"</svg>";