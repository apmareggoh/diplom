var mass = [], i, x = 500, y = 50;
var svgParam = "http://www.w3.org/2000/svg";
var jj = 0, jjj = 0;
var newMass = [];
var number=0;
var c;
var comment = 'На каждом шаге происходит проверка : если вставляемое значение меньше, чем значение узла - идем налево, иначе - направо.';
init = function (value) {
    for (i = 1; i < 100; i++) {
        mass[i] = 0;
    }
    mass[1] = value;
    var svg = document.createElement('svg');
    var circle = document.createElementNS(svgParam,'circle');
    var text = document.createElementNS(svgParam,'text');
    circle.setAttribute('cx',  ""+500);
    text.setAttribute('x',  ""+500);
    circle.setAttribute('cy', ""+50);
    text.setAttribute('y',  ""+50);
    var textNode = document.createTextNode(value);
    text.appendChild(textNode);
    circle.setAttribute('r',  ""+10);
    circle.setAttribute('stroke-width',  ""+3);
    circle.setAttribute('fill', "red");
    svg.appendChild(circle);
    svg.appendChild(text);
    circle = document.createElementNS(svgParam,'circle');
    circle.setAttribute('cx', -500+"");
    circle.setAttribute('cy', -50+"");
    circle.setAttribute('r',  ""+13);
    circle.setAttribute('stroke-width',  ""+3);
    circle.setAttribute('id', "current");
    circle.setAttribute('fill', "yellow");
    svg.appendChild(circle);
    document.getElementById('svg').innerHTML = "<svg viewBox=\"0 0 1100 10\" preserveAspectRatio=\"xMinYMin meet\">"+svg.innerHTML+"</svg>";
    svg.setAttribute('width', ""+1000);
    svg.setAttribute('height', ""+1000);
};

add = function (value) {
    comment = 'На каждом шаге происходит проверка : если вставляемое значение меньше, чем значение узла - идем налево, иначе - направо.';
    comment += '<br>Вставляем узел ' + value + '.';
    var svg = document.getElementsByTagName('svg')[0];
    line = svg.getElementsByTagNameNS(svgParam,'line');
    for (i = 0; i < line.length; i++) {
        line[i].setAttribute('stroke', 'red');
    }
    var stop = 0, i = 1;
    jj = "";
    jjj = 1;
    var tt;
    var circle;
    var text;
    var x2;
    while (!stop) {
        if (value == mass[i]) {
            stop = 1;
        } else if (value > mass[i]) {
            if (mass[2 * i + 1] == 0) {
                comment += '<br>На узле со значением ' + mass[i] + ' вставляем новый узел ' + 'справа.';
                i = 2 * i + 1;
                mass[i] = value;
                stop = 1;
                jj = jj + "1";
                jjj++;
                circle = document.createElementNS(svgParam,'circle');
                text = document.createElementNS(svgParam,'text');
                var e = 0;
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
                    x2 = x - tt;
                } else if (c == 0) {
                    x2 = x + tt;
                }
                var line = document.createElementNS(svgParam,'line');
                line.setAttribute('x1', ""+x);
                line.setAttribute('x2', x2);
                line.setAttribute('y2', ""+(y * jjj - 50));
                line.setAttribute('y1', ""+(y * jjj));
                line.setAttribute('stroke', "green");
                line.setAttribute('stroke-width', ""+1);
                line.setAttribute('id', ""+jj);
                circle.setAttribute('cx', ""+x);
                text.setAttribute('x', ""+x);
                circle.setAttribute('cy', ""+(y * jjj));
                text.setAttribute('y', ""+(y * jjj));
                circle.setAttribute('r', ""+13);
                circle.setAttribute('stroke-width', ""+3);
                circle.setAttribute('fill', "red");
                var textNode = document.createTextNode(value);
                text.appendChild(textNode);
                svg.appendChild(circle);
                svg.appendChild(text);
                svg.appendChild(line);
            } else {
                comment += '<br>На узле со значением ' + mass[i] + ' поворачиваем направо.';
                i = 2 * i + 1;
                jj = jj + "1";
                line = document.getElementById(""+jj);
                line.setAttribute('stroke', 'green');
                jjj++;
            }
        } else if (value < mass[i]) {
            if (mass[2 * i] == 0) {
                comment += '<br>На узле со значением ' + mass[i] + ' вставляем новый узел ' + 'слева.';
                i = 2 * i;
                mass[i] = value;
                stop = 1;
                jj = jj + "0";
                jjj++;
                circle = document.createElementNS(svgParam,'circle');
                text = document.createElementNS(svgParam,'text');
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
                    x2 = x - tt;
                } else if (c == 0) {
                    x2 = x + tt;
                }
                line = document.createElementNS(svgParam,'line');
                line.setAttribute('x1', ""+x);
                line.setAttribute('x2', x2);
                line.setAttribute('y2', ""+(y * jjj - 50));
                line.setAttribute('y1', ""+(y * jjj));
                line.setAttribute('stroke', "green");
                line.setAttribute('stroke-width', ""+1);
                line.setAttribute('id', ""+jj);
                circle.setAttribute('cx', ""+x);
                text.setAttribute('x', ""+(x-5));
                circle.setAttribute('cy', ""+(y * jjj));
                text.setAttribute('y', ""+(y * jjj+5));
                circle.setAttribute('r', ""+13);
                circle.setAttribute('stroke-width', ""+3);
                circle.setAttribute('fill', "red");
                textNode = document.createTextNode(value);
                text.appendChild(textNode);
                svg.appendChild(circle);
                svg.appendChild(text);
                svg.appendChild(line);
            } else {
                comment += '<br>На узле со значением ' + mass[i] + ' поворачиваем налево.';
                i = 2 * i;
                jjj++;
                jj = jj + "0";
                line = document.getElementById(""+jj);
                line.setAttribute('stroke', 'green');

            }
        }
    }
    document.getElementById('text').innerHTML = comment;
    return i;
};

addElement = function (number) {
    if (number == 0) {
        number = Math.floor(Math.random() * 1000);
    }
    add(number);
    var svg = document.getElementsByTagName('svg')[0];
   // document.getElementById('svg').innerHTML = "<svg viewBox=\"0 0 1100 10\" preserveAspectRatio=\"xMinYMin meet\">" + svg.innerHTML + "</svg>";
    svg.setAttribute('width', 1000+"px");
    svg.setAttribute('height', 1000+"px");
};
var massAutoElement = [3, 2, 1, 4, 5, 6, 7, 9, 10, 8];

sortMass = function () {
    var temp = 0;
    for (i = 0; i < massAutoElement.length; i++) {
        for (var j = i; j < massAutoElement.length; j++) {
            if (massAutoElement[j] < massAutoElement[i]) {
                temp = massAutoElement[j];
                massAutoElement[j] = massAutoElement[i];
                massAutoElement[i] = temp;
            }
        }
    }
};

optimusTree = function (massWork) {
    var b;
    var centr,str='';
    massWork = massWork.replace("/|^/","");
    var stop=1;
    var a = massWork.split("|");
    for(i=0;i< a.length;i++){
        if(a.length>0){
        b = a[i].split(",");
        if(b.length>1){
            stop=0;
        centr = Math.floor(b.length/2);
        newMass[number] = b[centr-1];
            number++;
        for(var j=0;j< centr-2;j++)str+=b[j]+",";
        str+=b[j];
        str+='|';
        for(j=centr;j< b.length-1;j++)str+=b[j]+",";
        str+=b[j];
        if(i!=a.length-1)str+='|';
        }else if(b.length==1){
            if(newMass.indexOf(b[0])==-1){
                stop=0;
                newMass[number] = b[0];
                number++;
            }
        }
    }
    }
    if(!stop)optimusTree(str);
};

addAutoElement = function (i) {
    addElement(massAutoElement[i]);
    if (i < massAutoElement.length-2) {
        setTimeout('addAutoElement(' + (i + 1) + ')', 1000);
    }
};

usersClick = function () {
    document.getElementById('svg').innerHTML = "<svg viewBox=\"0 0 1100 10\" preserveAspectRatio=\"xMinYMin meet\"></svg>";
    init(500);
    document.getElementById("addElement").style.display = "block";
};

avtomaticTree = function () {
    document.getElementById('svg').innerHTML = "<svg viewBox=\"0 0 1100 10\" preserveAspectRatio=\"xMinYMin meet\"></svg>";
    init(Math.floor(massAutoElement.length/2));
    var i = 0;
    addAutoElement(i);
};


optima = function(){
    sortMass();
    number = 0;
    var temp = massAutoElement.toString();
    optimusTree(temp);
    massAutoElement = newMass;
    avtomaticTree();
};