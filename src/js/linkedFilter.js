//用二维数组定义联动下拉单内容，顺序根据选项顺序以便对应
var city = [
    ["上海", "昆明", "北京", "烟台"],
    ["东京", "大阪", "镰仓"],
    ["罗马", "米兰", "威尼斯", "佛罗伦萨"],
    ["纽约", "旧金山", "华盛顿"],
];

function getCity() {
    //声明国家选择框对象
    var filterCountry = document.filter.filterCountry;
    //声明城市选择框对象
    var filterCity = document.filter.filterCity;
    //得到国家对应的数组
    var cityToSelect = city[filterCountry.selectedIndex - 1];

    //重置下拉框
    filterCity.length = 1;

    //将城市数组中的值填充到城市下拉框中
    for (var i = 0; i < cityToSelect.length; i++) {
        filterCity[i + 1] = new Option(cityToSelect[i], cityToSelect[i]);
    }
}