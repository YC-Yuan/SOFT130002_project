let upload = document.getElementById("upload");
upload.addEventListener("change", uploadImg, false);

function uploadImg(e) {
    //input是一个file对象， file对象不能直接展示的
    const input = e.target;
    //console.log(input);
    let file = input.files[0];
    let img = document.getElementById('uploadedImg');
    let status = document.getElementById('uploadStatus');
    //console.log(file);
    //用fileReader从file对象读取文件，转成img标签可用格式
    let reader = new FileReader();
    reader.readAsDataURL(file);
    //因为文件读取是一个耗时操作， 所以它在回调函数中，才能够拿到读取的结果
    reader.onload = function () {
        console.log(reader.result);
        img.src = reader.result;
        //修改图片与样式#uploadImg，隐藏未上传提醒#uploadStatus
        img.style.display = "block";
        status.style.display = "none";
    };
}