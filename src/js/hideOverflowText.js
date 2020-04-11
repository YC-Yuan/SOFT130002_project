//使用说明：将需要省略的文本设定为"textToHide"class,并嵌套在设定"textDiv"class的div中
//为body元素设置onresize、onload时调用changeLine
function changeLine() {
    //console.log('函数启动！');
    var div = document.getElementsByClassName('textDiv');
    //alert(1);
    var p = document.getElementsByClassName('textToHide');
    //alert('length:' + div.length);
    //console.log('获得数组');
    for (var i = 0; i < div.length; i++) {
        //alert(2);
        //console.log('进入循环');
        var height = parseInt(window.getComputedStyle(div[i]).height);
        //alert(3);
        //console.log('得到高'+height);
        var padding = parseInt(window.getComputedStyle(div[i]).paddingTop);
        //alert(4);
        //console.log('得到padding'+padding);
        var fontSize = parseInt(window.getComputedStyle(p[i]).fontSize);
        //alert(5);
        //console.log('得到字体大小'+fontSize);
        var margin = parseInt(window.getComputedStyle(p[i]).marginTop);
        //alert(6);
        //console.log('得到margin'+margin);
        var line = Math.floor((height - 2 * (padding + margin)) / fontSize);
        //console.log('计算行数'+line);
        p[i].style.webkitLineClamp = line.toString();
        //console.log('成功修改！');
    }
    //alert(line);
}