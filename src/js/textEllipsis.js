//使用说明：将需要省略的文本设定为"content-ellipsis"class,其容器设定为"container-ellipsis"class
changeLine();
console.log("loaded");

window.addEventListener("resize", changeLine, false);

function changeLine() {
    let container = document.getElementsByClassName('container-ellipsis');
    let content = document.getElementsByClassName('content-ellipsis');
    for (let i = 0; i < content.length; i++) {
        let height = parseInt(window.getComputedStyle(container[i]).height);
        height-=parseInt(window.getComputedStyle(container[i]).paddingTop);
        height-=parseInt(window.getComputedStyle(container[i]).paddingBottom);
        //此时height为容器可用高度
        let children = container[i].children;
        for (let j = 0; j < children.length; j++) {
            if (children[j] !== content[i]) {
                height -=parseInt(window.getComputedStyle(children[j]).height);
                height-=parseInt(window.getComputedStyle(children[j]).marginTop);
                height-=parseInt(window.getComputedStyle(children[j]).marginBottom);
            }
        }
        //此时height为文本元素可用高度
        height -= (parseInt(window.getComputedStyle(content[i]).marginTop));
        height -= (parseInt(window.getComputedStyle(content[i]).marginBottom));
        height -= (parseInt(window.getComputedStyle(content[i]).paddingTop));
        height -= (parseInt(window.getComputedStyle(content[i]).paddingBottom));
        //此时高度为文本内容可用高度
        let line=Math.floor(height/parseFloat(window.getComputedStyle(content[i]).lineHeight));
        content[i].style.webkitLineClamp=line.toString();
    }
}