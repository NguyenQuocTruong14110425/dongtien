function Shape(x, y, w, h, fill) {
    this.x = x || 0;
    this.y = y || 0;
    this.w = w || 1;
    this.h = h || 1;
    this.fill = fill || '#AAAAAA';
}

function Image(img, x,y)
{
    this.img = img;
    this.x = x || 0;
    this.y = y || 0;
    this.w = img.width || 1;
    this.h = img.height || 1;
}

Shape.prototype.draw = function(ctx) {
    ctx.fillStyle = this.fill;
    ctx.fillRect(this.x, this.y, this.w, this.h);
}
Shape.prototype.contains = function(mx, my) {
    return  (this.x <= mx) && (this.x + this.w >= mx) &&
        (this.y <= my) && (this.y + this.h >= my);
}

Image.prototype.draw = function(ctx) {
    ctx.drawImage(this.img ,this.x, this.y);
}
Image.prototype.contains = function(mx, my) {
    return  (this.x <= mx) && (this.x + this.w >= mx) &&
        (this.y <= my) && (this.y + this.h >= my);
}

function CanvasState(canvas) {
    this.canvas = canvas;
    this.width = canvas.width;
    this.height = canvas.height;
    this.ctx = canvas.getContext('2d');

    var stylePaddingLeft, stylePaddingTop, styleBorderLeft, styleBorderTop;

    if (document.defaultView && document.defaultView.getComputedStyle) {
        this.stylePaddingLeft = parseInt(document.defaultView.getComputedStyle(canvas, null)['paddingLeft'], 10)      || 0;
        this.stylePaddingTop  = parseInt(document.defaultView.getComputedStyle(canvas, null)['paddingTop'], 10)       || 0;
        this.styleBorderLeft  = parseInt(document.defaultView.getComputedStyle(canvas, null)['borderLeftWidth'], 10)  || 0;
        this.styleBorderTop   = parseInt(document.defaultView.getComputedStyle(canvas, null)['borderTopWidth'], 10)   || 0;
    }
    var html = document.body.parentNode;
    this.htmlTop = html.offsetTop;
    this.htmlLeft = html.offsetLeft;

    this.valid = false; // when set to false, the canvas will redraw everything
    this.shapes = [];  // the collection of things to be drawn
    this.images = [];  // the collection of images
    this.dragging = false; // Keep track of when we are dragging

    this.selection = null;
    this.dragoffx = 0;
    this.dragoffy = 0;

    var myState = this;

    canvas.addEventListener('selectstart', function(e) { e.preventDefault(); return false; }, false);

    function moveElement(mouse, shapes)
    {
        var mx = mouse.x;
        var my = mouse.y;
        var l = shapes.length;
        for (var i = l-1; i >= 0; i--) {
            if (shapes[i].contains(mx, my)) {
                var mySel = shapes[i];

                myState.dragoffx = mx - mySel.x;
                myState.dragoffy = my - mySel.y;
                myState.dragging = true;
                myState.selection = mySel;
                myState.valid = false;

                return;
            }
        }
        if (myState.selection) {
            myState.selection = null;
            myState.valid = false; // Need to clear the old selection border
        }
    }
    canvas.addEventListener('mousedown', function(e) {
        var mouse = myState.getMouse(e);
        var shapes = myState.shapes;
        var images = myState.images;
        moveElement(mouse,shapes);
        moveElement(mouse,images);
    }, true);

    canvas.addEventListener('mousemove', function(e) {
        if (myState.dragging){
            var mouse = myState.getMouse(e);
            // We don't want to drag the object by its top-left corner, we want to drag it
            // from where we clicked. Thats why we saved the offset and use it here
            myState.selection.x = mouse.x - myState.dragoffx;
            myState.selection.y = mouse.y - myState.dragoffy;
            myState.valid = false; // Something's dragging so we must redraw
        }
    }, true);

    canvas.addEventListener('mouseup', function(e) {
        console.log(myState);
        myState.dragging = false;
    }, true);

    // canvas.addEventListener('dblclick', function(e) {
    //     var mouse = myState.getMouse(e);
    //     myState.addShape(new Shape(mouse.x - 10, mouse.y - 10, 20, 20, 'rgba(0,255,0,.6)'));
    // }, true);

    this.selectionColor = '#CC0000';
    this.selectionWidth = 2;
    this.interval = 30;
    setInterval(function() { myState.draw(); }, myState.interval);
}

CanvasState.prototype.addShape = function(shape) {
    this.shapes.push(shape);
    this.valid = false;
}
CanvasState.prototype.addImage = function(image) {
    this.images.push(image);
    this.valid = false;
}
CanvasState.prototype.clear = function() {
    this.ctx.clearRect(0, 0, this.width, this.height);
}

function drawElement(ctx,shapes)
{
    var l = shapes.length;
    for (var i = 0; i < l; i++) {
        var shape = shapes[i];
        if (shape.x > this.width || shape.y > this.height ||
            shape.x + shape.w < 0 || shape.y + shape.h < 0) continue;
        shapes[i].draw(ctx);
    }

    if (this.selection != null) {
        ctx.strokeStyle = this.selectionColor;
        ctx.lineWidth = this.selectionWidth;
        var mySel = this.selection;
        ctx.strokeRect(mySel.x,mySel.y,mySel.w,mySel.h);
    }

    this.valid = true;
}

CanvasState.prototype.draw = function() {

    if (!this.valid) {
        var ctx = this.ctx;
        var shapes = this.shapes;
        var images = this.images;
        this.clear();

        drawElement(ctx, shapes);
        drawElement(ctx, images);
    }
}

CanvasState.prototype.getMouse = function(e) {
    var element = this.canvas, offsetX = 0, offsetY = 0, mx, my;

    if (element.offsetParent !== undefined) {
        do {
            offsetX += element.offsetLeft;
            offsetY += element.offsetTop;
        } while ((element = element.offsetParent));
    }

    offsetX += this.stylePaddingLeft + this.styleBorderLeft + this.htmlLeft;
    offsetY += this.stylePaddingTop + this.styleBorderTop + this.htmlTop;

    mx = e.pageX - offsetX;
    my = e.pageY - offsetY;

    return {x: mx, y: my};
}

function initItem() {
    var item1 = {
        "id"  : 1,
        "x": 149,
        "y": 29,
        "isTrue" : false,
    };
    var item2 = {
        "id"  : 2,
        "x": 235,
        "y": 42,
        "isTrue" : false
    };
    var item3 = {
        "id"  : 3,
        "x": 323,
        "y": 55,
        "isTrue" : false
    };
    var item4 = {
        "id"  : 4,
        "x": 415,
        "y": 70,
        "isTrue" : false
    };
    var item5 = {
        "id"  : 5,
        "x": 395,
        "y": 162,
        "isTrue" : false
    };
    var item6 = {
        "id"  : 8,
        "x": 378,
        "y": 255,
        "isTrue" : false
    };
    var item7 = {
        "id"  : 9,
        "x": 359,
        "y": 349,
        "isTrue" : false
    };
    var item8 = {
        "id"  : 10,
        "x": 266,
        "y": 331,
        "isTrue" : false
    };
    var item9 = {
        "id"  : 11,
        "x": 179,
        "y": 314,
        "isTrue" : false
    };
    var item10 = {
        "id"  : 12,
        "x": 92,
        "y": 295,
        "isTrue" : false
    };
    var item11 = {
        "id"  : 13,
        "x": 112,
        "y": 206,
        "isTrue" : false
    };
    var item12 = {
        "id"  : 14,
        "x": 130,
        "y": 116,
        "isTrue" : false
    };
    this.lstItem = [item1,item2,item3,item4,item5,item6,item7,item8,item9,item10,item11,item12]
}

var canvas;
var lstItem = [];
function init() {
    var s = new CanvasState(document.getElementById('canvas'));
    this.canvas = s;
    initItem();
    // s.addShape(new Shape(40,40,50,50)); // The default is gray
    // s.addShape(new Shape(60,140,40,60, 'lightskyblue'));
    // // Lets make some partially transparent
    // s.addShape(new Shape(80,150,60,30, 'rgba(127, 255, 212, .5)'));
    // s.addShape(new Shape(125,80,30,80, 'rgba(245, 222, 179, .7)'));
    // s.addShape(new Shape(14,20,50,80, 'rgba(255, 153, 255, .6)'));
    var img = document.getElementById("scream");
    // s.addImage(new Image(img,50,80));
    // s.addImage(new Image(img,150,200));
    // s.addImage(new Image(img,100,300));
    // s.addImage(new Image(img,10,250));
}
function addSocola() {
    var img = document.getElementById("scream");
    for(let i = 0 ; i < this.lstItem.length; i++)
    {
        if(this.lstItem[i].isTrue === false)
        {
            var item = {
                "id"  : this.lstItem[i].id,
                "x": this.lstItem[i].x,
                "y": this.lstItem[i].y,
                "isTrue" : true
            };
            this.lstItem.splice(i, 1,item);
            console.log(this.lstItem)
            this.canvas.addImage(new Image(img,this.lstItem[i].x,this.lstItem[i].y));
            break;
        }
    }
}
function createShape(option) {
    switch (option) {
        case 'square':
            this.canvas.addShape(new Shape(200,20,80,80, 'rgba(255, 153, 255, .6)'));
            break;
        case 'rectangle':
            this.canvas.addShape(new Shape(100,200,100,50, 'rgba(255, 153, 255, .6)'));
            break;
        case 'socola':
            var img = document.getElementById("scream");
            this.canvas.addImage(new Image(img,500,250));
            break;
    }
function createImage() {
    
}

}
