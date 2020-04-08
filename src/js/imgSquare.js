//说明：img用百分比设定宽度，则难以在明确规定高度的情况下保持宽高一致
//如何使用：给需要设定的img添加.squareImg
function shapeSquare() {
    var img = document.getElementsByClassName('squareImg');
    //alert('img got');
    for (var i = 0; i < img.length; i++) {
        //alert('loop entered');
        var width = parseInt(window.getComputedStyle(img[i]).width);
        //alert('width declared'+ width);
        img[i].style.height = width.toString()+'px';
        //alert('height assigned');
        //alert(parseInt(window.getComputedStyle(img[i]).height)+"  "+parseInt(window.getComputedStyle(img[i]).width));
    }
}