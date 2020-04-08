# SOFT130002_project
19302010020 袁逸聪
[Git地址](https://github.com/YC-Yuan/SOFT130002_project)
[GitPages地址](https://yc-yuan.github.io/SOFT130002_project/)

## 项目完成情况
自行对照grade文档，应没有遗漏

### HTML部分
完成全部9个html页面

所有css文件在head中用link方式外联

所有js文件在body的末尾用为script设置src的方式调用

### CSS部分
登录与注册界面共用upload.css、收藏与照片共用repository.css，页面直接相关共7个

导航栏、页脚、刷新与回到顶部按钮、翻页栏，分别单独设置，由需要的页面共用，共4个

另有默认设置重置reset.css，1个

完成全部12个css文件

### js部分
共4个js文件，其中imgSquare.js、uploadImg.js用于bonus，在后面介绍

1. hideOverflowText.js

这是为过长文本省略而准备的，先说一下一般的解决方案

```css
p{
	overflow: hidden;
	text-overflow: ellipsis;
	display: -webkit-box;
	-webkit-line-clamp: 11;
	-webkit-box-orient: vertical;
}
```

通过以上css，可以使超出-webkit-line-clamp所设定行数的部分被省略，而如果发生省略，才末尾会显示省略号

在home等页面中，容器高度固定的情况下，只要手动设定省略的触发行数即可

但是在detail页面中，为了使页面虽浏览器大小变化而变化，同时保证图片本身占据主体，图片描述部分的高度是不固定的

因此通过js来实现省略上限行数的动态变化，即获取容器当前高度、计算可以放下的文本行数、重新设定行数

在js文件中内置了说明如下：

```javascript
//使用说明：将需要省略的文本设定为"textToHide"class,并嵌套在设定"textDiv"class的div中
//为body元素设置onresize、onload时调用changeLine
```

由此，即可实现不断容器不断变化时，省略的行数也随之变化

**但是，文本元素容器所嵌套的div仍需要有高度设置，可以用百分比或calc()，不设置则实现不了想要的效果**

2. linkedFilter.js

用于实现filter的二级联动

先按照顺序，在二维数组中储存待替换的城市

```javascript
var city = [
    ["上海", "昆明", "北京", "烟台"],
    ["东京", "大阪", "镰仓"],
    ["罗马", "米兰", "威尼斯", "佛罗伦萨"],
    ["纽约", "旧金山", "华盛顿"],
];
```

根据国家选择框对应的被选中序号，将城市选择框内容修改为二维数组中对应的数组，一一替换

## Bonus完成情况与解决方法

### 图片裁剪

先明确问题和想要的效果：

各个页面的排版默认正方形图片设计，如果图片不是正方形则会破坏布局

1. browser以外的页面

我限定了图片所在容器的高度，如果图片不是正方形，则会在撑满高度的情况下按比例改变宽度

由于容器中剩下的部分是非替换内容，图片宽度改变之后直接占用或让出空间给文本用即可

所以这些情况不需要专门设定，图片根据比例变化既不会破坏布局、又能完整展现图片全貌

2. browser页面

browser页面是图片与图片紧密排列，如果大小形状不一一定会破坏布局

我想要的效果是舍弃图片边缘的信息，将图片裁剪成正方形居中显示。然而裁剪后不变形、且居中裁剪需要自己设定

居中裁剪的实践方式是object-fit:cover;，这个属性直接对img元素中src所对应的替换内容生效，独立于img元素本身的外壳

cover值要求图片替换内容撑满img框框，不进行伸缩变形

还可以通过object-position:参数1 参数2;来设定裁剪的方位，不过默认的50% 50%正是我想的居中裁剪效果，所以不必额外设置

**随之而来的问题是，我的img设定在table的td中，且以百分比规定宽度，高度没有办法直接用css设置成想要的正方形外框**

于是创建了imgSquare.js，将设置了.imgSquare元素的高度设定为与高度一致

这样就可以快乐地同时满足百分比响应大小、object-fit控制裁剪了

### 图片上传
input元素设置了type="file"，点击选择图片上传后成为file对象，然而不能直接展示

先创建fileReader，用readAsDataURL(file)将file对象所指文件转化成img标签可以用的格式

加载好后，修改图片的src为加载结果

同时将隐藏的img元素显示出来、再把"图片未上传的"提示隐藏


## 意见与建议

lab内容和pj进度再契合点就好了

lab0的内容现在还没用上，而pj1需要使用js、pj2才用css框架，不妨先出js的lab，再出框架教学lab

其他都很好！奥利给！