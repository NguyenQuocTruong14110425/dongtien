function Shape(x, y, w, h, fill) {
    this.x = x || 0;
    this.y = y || 0;
    this.w = w || 1;
    this.h = h || 1;
    this.fill = fill || '#AAAAAA';
}

function Image(img, x, y, id)
{
    this.img = img;
    this.x = x || 0;
    this.y = y || 0;
    this.w = img.width || 1;
    this.h = img.height || 1;
    this.id = id || -1;
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
        e.preventDefault()
        var mouse = myState.getMouse(e);
        var shapes = myState.shapes;
        var images = myState.images;
        moveElement(mouse,shapes);
        moveElement(mouse,images);
    }, true);

    canvas.addEventListener('mousemove', function(e) {
        e.preventDefault()
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
        e.preventDefault()
        if (typeof e === 'object') {
            switch (e.button) {
                case 0:
                    //Left button clicked
                    PositionElement(e);
                    break;
                case 1:
                    break;
                case 2:
                   //Right button clicked.
                    DeleteElement();
                    break;
                default:
            }
        }
        myState.dragging = false;
    }, true);
    canvas.oncontextmenu = function (e) {
        e.preventDefault();
    };
    function PositionElement(e) {
        var mouse = myState.getMouse(e);
        var images = myState.selection;
        var postion = changePosionSocola(mouse,images);
        if(postion !== false)
        {
            myState.selection.id = postion.id;
            myState.selection.x = postion.x;
            myState.selection.y = postion.y;
        }
        else
        {
            var tranfer = tranferPosionSocola(mouse,images);
            if(tranfer !== false)
            {
                myState.selection.x = tranfer.x;
                myState.selection.y = tranfer.y;
                myState.selection.id = tranfer.id;
                var images_new = myState.selection;
                var compare_images = findImageInState(images_new.id);
                var images_old_state = new Image(images.img,tranfer.x,tranfer.y,tranfer.id)
                replaceImageState(compare_images,images_old_state.img,images_old_state);
            }
            else
            {
                var callback = callbackpostion(images)
                myState.selection.x = callback.x;
                myState.selection.y = callback.y;
            }
        }
    }

    function removeSoola(ctx,images) {
        ctx.clearRect(images.x, images.y, images.w, images.h);
        this.canvas.removeImage(images);
    }
    function callbackpostion(images) {
        for(let i = 0 ; i < this.lstItem.length; i++)
        {
            if( this.lstItem[i].id === images.id)
            {
                var item = {
                    "id"  : this.lstItem[i].id,
                    "x": this.lstItem[i].x,
                    "y": this.lstItem[i].y,
                };
                return item;
            }

        }
    }

    function findSocolaInList(id) {
        for(let i = 0 ; i < this.lstItem.length; i++)
        {
            if(this.lstItem[i].id === id)
            {
                return this.lstItem[i];
            }
        }
        return false;
    }
    function findImageInState(id) {
        for(let i = 0 ; i < myState.images.length; i++)
        {
            if(myState.images[i].id === id)
            {
                return myState.images[i];
            }
        }
        return false;
    }
    function replaceImageState(images_old,img,new_pos_images) {
        var images_old_state = new Image(img,new_pos_images.x,new_pos_images.y,new_pos_images.id)
        this.canvas.changeImage(images_old,images_old_state);
    }
    function tranferPosionSocola(mouse , images) {
        for(let i = 0 ; i < this.lstItem.length; i++)
        {
            if(this.lstItem[i].isTrue === true &&
                this.lstItem[i].x < mouse.x && mouse.x < this.lstItem[i].x + images.w &&
                this.lstItem[i].y < mouse.y && mouse.y < this.lstItem[i].y + images.h)
            {
                var images_old_state = findImageInState(this.lstItem[i].id)
                var images_old = findSocolaInList(images.id)
                if(images_old !== false && images_old_state !== false)
                {
                    replaceImageState(images, images_old_state.img, images_old);
                    var item = {
                        "id"  : this.lstItem[i].id,
                        "x": this.lstItem[i].x,
                        "y": this.lstItem[i].y,
                        "isTrue" : true
                    };
                    this.lstItem.splice(i, 1,item);
                    return item;
                }
            }
        }
        return false;
    }

    function changePosionSocola(mouse , images) {
        for(let i = 0 ; i < this.lstItem.length; i++)
        {
            if(this.lstItem[i].isTrue === false &&
               this.lstItem[i].x < mouse.x && mouse.x < this.lstItem[i].x + images.w &&
               this.lstItem[i].y < mouse.y && mouse.y < this.lstItem[i].y + images.h)
            {
                var images_old = findSocolaInList(images.id)
                if(images_old !== false)
                {

                    var item = {
                        "id"  : this.lstItem[i].id,
                        "x": this.lstItem[i].x,
                        "y": this.lstItem[i].y,
                        "isTrue" : true
                    };
                    this.lstItem.splice(i, 1,item);
                    var item_old = {
                        "id"  : images_old.id,
                        "x": images_old.x,
                        "y": images_old.y,
                        "isTrue" : false
                    };
                    var pos = images_old.id - 1;
                    this.lstItem.splice(pos, 1,item_old);
                    return item;
                }
            }
        }
        return false;
    }

    function removeSocolaFromList(images)
    {
        for(let i = 0 ; i < this.lstItem.length; i++)
        {
            if( this.lstItem[i].id === images.id)
            {
                var item = {
                    "id"  : this.lstItem[i].id,
                    "x": this.lstItem[i].x,
                    "y": this.lstItem[i].y,
                    "isTrue" : false
                };
                this.lstItem.splice(i, 1,item);
                break;
            }
        }
    }

    function DeleteElement()
    {
        if (myState.dragging) {
            var ctx = myState.ctx;
            var images = myState.selection;
            removeSoola(ctx, images);
            removeSocolaFromList(images);
        }
    }
    canvas.addEventListener('dblclick', function(e) {
        e.preventDefault()
        //
    }, true);

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
CanvasState.prototype.removeImage = function(image) {

    var index = this.images.indexOf(image);
    if (index > -1) {
        this.images.splice(index, 1);
    }
}
CanvasState.prototype.changeImage = function(image,image_news) {
    var index = this.images.indexOf(image);
    if (index > -1) {
        this.images.splice(index, 1,image_news);
    }
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
function addSocola(idElement) {
    var img = document.getElementById(idElement);
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
            this.canvas.addImage(new Image(img,this.lstItem[i].x,this.lstItem[i].y,this.lstItem[i].id));
            break;
        }
    }
}

function createShape(option) {
    switch (option) {
        case 'square':
            this.canvas.addShape(new Shape(200, 20, 80, 80, 'rgba(255, 153, 255, .6)'));
            break;
        case 'rectangle':
            this.canvas.addShape(new Shape(100, 200, 100, 50, 'rgba(255, 153, 255, .6)'));
            break;
        case 'socola':
            var img = document.getElementById("scream");
            this.canvas.addImage(new Image(img, 500, 250));
            break;
    }
}
