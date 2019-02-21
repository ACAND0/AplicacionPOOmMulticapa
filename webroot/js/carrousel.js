    $(document).ready(function () {


        var divHijo = $(".imagenes").children("div");
        animacion0();



//--------------CUANDO SE HACE CLICK EN LAS BOLITAS--------------//
        
        $(".botones").children("label:nth-child(1)").click(function () {
            $(".botones").children("label").clearQueue().stop();//Limpio la animación de addClass, la que da color a los botones
            divHijo.clearQueue().stop();//Paro la animación que realiza el movimiento del div
            animacion0();//Llamo a la función correspondiente
        });

        $(".botones").children("label:nth-child(2)").click(function () {
            $(".botones").children("label").clearQueue().stop();
            divHijo.clearQueue().stop();
            animacion1();
        });

        $(".botones").children("label:nth-child(3)").click(function () {
            $(".botones").children("label").clearQueue().stop();
            divHijo.clearQueue().stop();
            animacion2();
        });

        $(".botones").children("label:nth-child(4)").click(function () {
            $(".botones").children("label").clearQueue().stop();
            divHijo.clearQueue().stop();
            animacion3();
        });

        $(".botones").children("label:nth-child(5)").click(function () {
            $(".botones").children("label").clearQueue().stop();
            divHijo.clearQueue().stop();
            animacion4();
        });

        $(".botones").children("label:nth-child(6)").click(function () {
            $(".botones").children("label").clearQueue().stop();
            divHijo.clearQueue().stop();
            animacion5();
        });



        
    //---------------ANIMACIONES DE MOVIMIENTO Y COLOR(ASIGNACIÓN DE CLASE)--------------//    
        function animacion0(){
            $(".botones").children("label").removeClass('botonActivo');//Elimino todas las clases de label
            $(".botones").children("label:nth-child(1)").addClass('botonActivo');//Añado una clase al selector actual
            divHijo.animate({marginLeft: '0%'}, 3000, animacion1);//Desplazo, en este caso nop porque es el primero, el div un total del 100%
            
        }
        
    
        function animacion1(){
            $(".botones").children("label").removeClass('botonActivo');
            $(".botones").children("label:nth-child(2)").addClass('botonActivo');
            divHijo.animate({marginLeft: '-100%'}, 3000, animacion2);
            
        }

        function animacion2(){
            $(".botones").children("label").removeClass('botonActivo');
            $(".botones").children("label:nth-child(3)").addClass('botonActivo');
            divHijo.animate({marginLeft: '-200%'}, 3000, animacion3);
        }

        function animacion3(){
            $(".botones").children("label").removeClass('botonActivo');
            $(".botones").children("label:nth-child(4)").addClass('botonActivo');
            divHijo.animate({marginLeft: '-300%'}, 3000, animacion4);
        }

        function animacion4(){
            $(".botones").children("label").removeClass('botonActivo');
            $(".botones").children("label:nth-child(5)").addClass('botonActivo');
            divHijo.animate({marginLeft: '-400%'}, 3000, animacion5);
        }

        function animacion5(){
            $(".botones").children("label").removeClass('botonActivo');
            $(".botones").children("label:nth-child(6)").addClass('botonActivo');
            divHijo.animate({marginLeft: '-500%'}, 3000, animacion0);
        }

            


    });
