//使用说明：将需要省略的文本设定为"textToHide"class,并嵌套在设定"textDiv"class的div中
//为body元素设置onresize、onload时调用changeLine
function changeLine() {
    var div = document.getElementsByClassName('textDiv');
    //alert(1);
    var p = document.getElementsByClassName('textToHide');
    //alert('length:' + div.length);
    for (var i = 0; i < div.length; i++) {
        //alert(2);
        var height = parseInt(window.getComputedStyle(div[i]).height);
        //alert(3);
        var padding = parseInt(window.getComputedStyle(div[i]).padding);
        //alert(4);
        var fontSize = parseInt(window.getComputedStyle(p[i]).fontSize);
        //alert(5);
        var margin = parseInt(window.getComputedStyle(p[i]).margin);
        //alert(6);
        var line = Math.floor((height - 2 * (padding + margin)) / fontSize);
        p[i].style.webkitLineClamp = line.toString();
    }
    //alert(line);
}