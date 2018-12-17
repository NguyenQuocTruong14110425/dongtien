<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Socola Dong tien</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="{{URL::asset('public/css/style.css')}}">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.slim.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Styles -->
        <script type="text/javascript" src="{{URL::asset('public/js/html5.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('public/js/excanvas.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('public/js/common.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('public/js/Cango3D-8v00.js')}}"></script>
        <script>


            function buildCube(width, colors)
            {
                var sq = ['M',0,0,0, 'L',width,0,0, width,width,0, 0,width,0, 'z'],
                    foldTbl = [1, 7, 1, 7, 1, 7],
                    faces = new Group3D(),
                    frontSide = new Group3D(),
                    side = [],
                    lorg, rot,
                    bend = -90,
                    lab = new Text3D("Drag Me", {strokeColor:"white", fontSize:12, fontWeight:700, lorg:5}),
                    i;

                for (i=0; i<6; i++)
                {
                    lorg = foldTbl[i];
                    rot = (lorg === 1)? -90: 90;
                    side[i] = new Shape3D(sq, {fillColor:colors[i], backColor:'gray'});
                    side[i].backHidden = true;
                    if (i==0)
                    {
                        frontSide.addObj(side[i]);
                        frontSide.tagFirstChild(lab, width/2, width/2);
                        faces.addObj(frontSide);
                    }
                    else
                    {
                        faces.addObj(side[i]);
                    }
                    // sq definition is lorg = 7
                    if (lorg === 1)
                    {
                        faces.translate(0, -width, 0);
                    }
                    faces.rotate(0, 0, 1, rot);
                    faces.rotate(0, 1, 0, bend);
                    if (lorg === 1)                      // move back after rotate
                    {
                        faces.translate(0, width, 0);
                    }
                }
                // move the drawing origin to the middle for nice drag rotation
                faces.translate(-width/2, -width/2, width/2);

                return faces;
            }
            function GlassDemo(cvsID)
            {
                var glassProfiles = 'M 175 200 l 150 0';
                var g = new Cango3D(cvsID),
                    glassProfile = glassProfiles,
                    glassData, glass,
                    s1, s2, s3;

                this.newRot = function()
                {
                    glass.transform.rotate(1, 0, 0, s1.value);
                    glass.transform.rotate(0, 1, 0, s2.value);
                    glass.transform.rotate(0, 0, 1, s3.value);
                    g.render(glass);
                }

                g.clearCanvas();
                g.setPropertyDefault("backgroundColor", "aliceblue");
                g.setWorldCoords3D(-400, -200, 800);
                g.setLightSource(-100, 100, 300);
                glassData = svgToCgo3D(glassProfile);
                glass = g.objectOfRevolution3D(glassData, -368, 36, "rgba(150, 230, 160, 0.3)", "rgba(150, 230, 160, 0.3)");
                glass.translate(0, 350, 50);
                glass.rotate(1, 0, 0, 15);

                s1 = document.getElementById("slider-1");
                s2 = document.getElementById("slider-2");
                s3 = document.getElementById("slider-3");
                // draw the group in the start position
                this.newRot();
            }
            function turnCube(cvsID)
            {
                var cube,
                    movedCube,
                    angleX = 0,
                    angleY = 0,
                    grabAngX = 0,
                    grabAngY = 0,
                    g;

                function grabCube(mousePos)
                {
                    var csrX = mousePos.x - this.dwgOrg.x,
                        csrY = mousePos.y - this.dwgOrg.y;
                    grabAngX = Math.sin(csrY/50) - angleX;    // all angles in radians
                    grabAngY = Math.sin(csrX/50) - angleY;    // all angles in radians
                }

                function dragCube(mousePos)
                {
                    var csrX = mousePos.x - this.dwgOrg.x,
                        csrY = mousePos.y - this.dwgOrg.y,
                        newXang = Math.sin(csrY/50) - grabAngX,   // new rotation angle
                        newYang = Math.sin(csrX/50) - grabAngY;   // new rotation angle

                    angleX = newXang;        // save the new angle
                    angleY = newYang;        // save the new angle

                    function drawIt()
                    {
                        // apply this drag rotation to 'cube' Group3D
                        movedCube.transform.translate(130, 80, 0);
                        cube.transform.rotate(1, 0, 0, -180*angleX/Math.PI);
                        cube.transform.rotate(0, 1, 0, 180*angleY/Math.PI);
                        // redraw with rotation applied
                        g.render(movedCube);
                    }
                    window.requestAnimationFrame(drawIt);
                }

                g = new Cango3D(cvsID);
                g.setPropertyDefault('backgroundColor', "lightyellow");
                g.setWorldCoords3D(-20, -20, 300);
                g.setFOV(40);

                cube = buildCube(100, ["red", "green", "blue", "yellow", "silver", "sienna"]);

                // move the cube to a better location via separate Group move
                movedCube = new Group3D(cube);
                movedCube.transform.translate(130, 80, 0);
                // cube is now positioned on the origon 0,0,0 (this group will be used in dragging to rotate)
                movedCube.enableDrag(grabCube, dragCube, null);

                g.render(movedCube);
            }
        </script>
        <script type="text/javascript">
            var glass1;

            window.addEventListener("load", function(){
                turnCube('canvasChartCube');
                glass1 = new GlassDemo('canvasChampenge');
            });
        </script>
    </head>
    <body class="container">
        <h1>Demo canvas</h1>
        <button onclick="init()" class="btn btn-success">run</button>
        <button onclick="groupDragDemo('canvas')" class="btn btn-info">run 3d</button>
        <div class="dashboard">
            <div id="canvasHeader" class="canvasHeader">
                <canvas id="canvasChartCube" class="canvas" height="250" width="350">Canvas Not Supported</canvas>
                {{--<canvas id="canvasImage" class="canvas" height="300" width="440" style="background-image:url({{URL::asset('public/images/champene.png')}});">Canvas Not Supported</canvas>--}}
                <canvas id="canvasChampenge" class="canvas" height="300" width="440">Canvas Not Supported</canvas>
                <div class="sliderHolder">
                    <input id="slider-1" class="slider" type=range min=-180 max=180 value=0 step=1 onchange="glass1.newRot()" oninput="glass1.newRot()">
                    <input id="slider-2" class="slider" type=range min=-180 max=180 value=0 step=1 onchange="glass1.newRot()" oninput="glass1.newRot()">
                    <input id="slider-3" class="slider" type=range min=-180 max=180 value=0 step=1 onchange="glass1.newRot()" oninput="glass1.newRot()">
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="list-item">
                    <h3>Cubes</h3>
                    <div class="item">
                        <button onclick="createShape('square')" class="square"></button>
                    </div>
                    <div class="item">
                        <div onclick="createShape('rectangle')" class="rectangle"></div>
                    </div>
                    <div class="item">
                        <div class="circle"></div>
                    </div>
                    <div class="item">
                        <div class="triangular"></div>
                    </div>
                    <div class="item">
                        <div class="Hexagon"></div>
                    </div>
                    <h3>Images</h3>
                    <div class="item">

                    </div>
                </div>
            </div>
        </div>
        <script src="{{URL::asset('public/js/dongtien.js')}}"></script>

    </body>
</html>
