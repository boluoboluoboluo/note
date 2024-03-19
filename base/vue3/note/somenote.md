##### 禁用恶意调试

```ts

//原理：只有控制台打开时会执行debugger方法，设置F12代开控制台时，页面无限执行debugger，可阻止恶意调试
(() => {
    function block() {
        setInterval(() => {
            debugger;
        }, 50);
    }
    try {
        block();
    } catch (err) {}
})();
```

##### 备注

vscode里插件vuter禁用，更换为=volar

变量中中划线和驼峰大写含义相同



##### vscode报错：找不到模块

描述：找不到模块“vue-router”。你的意思是要将 "moduleResolution" 选项设置为 "node"，还是要将别名添加到 "paths" 选项中?

解决方法：将"moduleResolution"选项设置为"node"，这个选项可以在TypeScript的配置文件（tsconfig.json）中进行设置，例如：

```ts
{
  "compilerOptions": {
    "moduleResolution": "node"
  }
}
```

##### 安装模块，但是报无法找到模块 "xxx" 的声明文件

```ts
//在env.d.ts文件中添加如下代码，如果没有文件，则在根目录新建xx.d.ts文件
declare module "xxx"
```





