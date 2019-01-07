function Shape(x, y, w, h, fill) {
    this.x = x || 0;
    this.y = y || 0;
    this.w = w || 1;
    this.h = h || 1;
    this.fill = fill || '#AAAAAA';
}

function Image(img, x, y, id, price)
{
    this.img = img;
    this.x = x || 0;
    this.y = y || 0;
    this.w = img.width || 1;
    this.h = img.height || 1;
    this.id = id || -1;
    this.index = 0;
    this.price = price;
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
    ctx.drawImage(this.img ,this.x, this.y, this.w, this.h);
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
    this.totalPrice = 200;
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
                if(mySel.id !== -1)
                {
                    myState.dragoffx = mx - mySel.x;
                    myState.dragoffy = my - mySel.y;
                    myState.dragging = true;
                    myState.selection = mySel;
                    myState.valid = false;
                    return;
                }
                else
                {
                    break;
                }
            }
        }
        if (myState.selection) {
            myState.selection = null;
            myState.valid = false; // Need to clear the old selection border
        }
    }
    canvas.addEventListener('mousedown',EventDown, true);
    canvas.addEventListener('touchstart',EventDown, true);

    function EventDown(e)
    {
        e.preventDefault()
        var mouse = myState.getMouse(e);
        if(e.type === 'touchstart')
        {
            mouse =  myState.getTouch(e);
        }
        var shapes = myState.shapes;
        var images = myState.images;
        moveElement(mouse,shapes);
        moveElement(mouse,images);
    }
    canvas.addEventListener('mousemove',EventMove, true);
    canvas.addEventListener('touchmove',EventMove, true);

    function EventMove(e)
    {
        e.preventDefault()
        if (myState.dragging){
            var mouse = myState.getMouse(e);
            if(e.type === 'touchmove')
            {
                mouse =  myState.getTouch(e);
            }
            // We don't want to drag the object by its top-left corner, we want to drag it
            // from where we clicked. Thats why we saved the offset and use it here
            myState.selection.x = mouse.x - myState.dragoffx;
            myState.selection.y = mouse.y - myState.dragoffy;
            myState.selection.index = 1;
            myState.images.sort(compare);
            myState.valid = false; // Something's dragging so we must redraw
        }
    }
    canvas.addEventListener('mouseup', EventUp, true);
    canvas.addEventListener('touchend', EventUp, true);

    function EventUp(e)
    {
        if(e.type === 'touchend')
        {
            PositionElement(e);
        }
        e.preventDefault()
        if (typeof e === 'object' && myState.dragging === true) {
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
    }
    canvas.oncontextmenu = function (e) {
        e.preventDefault();
    };
    function compare(a,b) {
        if (a.index < b.index)
            return -1;
        if (a.index > b.index)
            return 1;
        return 0;
    }
    function PositionElement(e) {
        var mouse = myState.getMouse(e);
        if(e.type === 'touchend')
        {
            mouse = myState.getTouch(e);
        }
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
                    "isTrue" : false,
                    "price": this.lstItem[i].price,
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
    this.totalPrice += image.price;
    this.valid = false;
    document.getElementById("toltal-price").innerHTML =  this.totalPrice;
}


CanvasState.prototype.removeImage = function(image) {

    var index = this.images.indexOf(image);
    if (index > -1) {
        this.images.splice(index, 1);
        this.totalPrice -= image.price;
        document.getElementById("toltal-price").innerHTML =  this.totalPrice;
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

CanvasState.prototype.getTouch = function(e) {
    var element = this.canvas, offsetX = 0, offsetY = 0, mx, my;
    if (element.offsetParent !== undefined) {
        do {
            offsetX += element.offsetLeft;
            offsetY += element.offsetTop;
        } while ((element = element.offsetParent));
    }
    offsetX += this.stylePaddingLeft + this.styleBorderLeft + this.htmlLeft;
    offsetY += this.stylePaddingTop + this.styleBorderTop + this.htmlTop;
    var touches = e.changedTouches;
    if(touches !== false &&  touches.length > 0)
    {
        mx = touches[0].pageX - offsetX;
        my = touches[0].pageY - offsetY;
    }
    return {x: mx, y: my};
}

var canvas;
var lstItem = [];
function initSocola(listItem,idbackground) {
    destroyCanvas();
    var s = new CanvasState(document.getElementById('canvas'));
    this.canvas = s;
    this.lstItem = listItem;
    console.log(this.canvas);
    var backgound = document.getElementById(idbackground);

    // this.canvas.addBackground(new Background(backgound));
    this.canvas.addImage(new Image(backgound,0,0,-1,0));


}

function destroyCanvas() {
    var c = document.getElementById("canvas");
    var ctx = c.getContext("2d");
    ctx.save();
    ctx.setTransform(1, 0, 0, 1, 0, 0);
    ctx.clearRect(0, 0, c.width, c.height);
    ctx.beginPath();
    ctx.restore();
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
                "isTrue" : true,
                "price" : this.lstItem[i].price
            };
            this.lstItem.splice(i, 1,item);
            this.canvas.addImage(new Image(img,this.lstItem[i].x,this.lstItem[i].y,this.lstItem[i].id,this.lstItem[i].price));
            break;
        }
    }
}
function ScreenShoot() {
    console.log(this.canvas)
    var dataURL = this.canvas.canvas.toDataURL('png');
    console.log(dataURL)
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
