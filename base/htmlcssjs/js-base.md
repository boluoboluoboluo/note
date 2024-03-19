```js

//数组添加元素：
arr.push("a")

//数组删除元素：
arr.pop()	//删除最后一个，或者arr.slice(0,-1)
arr.shift()	//删除第一个，或者arr.slice(0,1)
arr.splice(arr.indexOf("aaa"),1)		//删除指定元素，删除aaa

//判断数组是否存在某个值：
arr.indexOf("a") == -1	//不存在
arr.includes("a)	//ES6新增方法，存在返回true，不存在返回false


//json转数组(对象)：
JSON.parse(jsonstr)

//数组(对象)转json：
JSON.stringify(arr)
```

