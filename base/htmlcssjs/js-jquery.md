

#### prop和attr

```js
//2者都表示属性
$(".cls").attr("id","");
$(".cls").porp("id","");

//当表示是否选中时，用prop
$(".cls").porp("checked",true);
```

#### each

```js
//示例
$(".cls").each(function(index){
    console.log(this);
})
```

