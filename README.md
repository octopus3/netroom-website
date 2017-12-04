# netroom-website 
章鱼想做一个属于网工的官网所以现在从零开始学习HTML、CSS。想必这是一个艰辛的工作
- [x] 导航栏
- [x] 背景图
- [ ]  菜单
- [ ] 注册界面
- [ ] 活动介绍
- [ ] 官方主页
- [ ] UI界面
- [ ] 关于
# 大致页面
![页面](/页面.png)

# **Javascript**
> ##窗口监听函数
> 利用IB判断放大或者缩小窗口是否会大于这个背景大小,然后调用图片改变函数调整大小
> ```javascript
>window.onresize = function(){  
>    document.getElementsByTagName("html")[0].style.fontSize = document.documentElement.clientWidth/20 + 'px'; 
>    var h = window.innerHeight;
>    var w = window.innerWidth;
>    if(w/h >= 1920/1080){
>        iB = true;
>        imgChange(iB);
>    }
>    else{
>        iB = false;
>        imgChange(iB); 
>    }
>}
> ```
> ## imgChange()函数
> bg 是获取box_bg的类名变量,防止背景图会随着窗口放大事件而放大等情况
> ```javascript
>function imgChange(iB){
>    var h = window.innerHeight;
>    var w = window.innerWidth;
>    if(iB){
>        for(var i = 0;i < bg.length; i++){
>           bg[i].style.width = w + 'px';
>           bg[i].style.height = w * (1080/1920) + 'px';
>            bg[i].style.top = -(w * (1080/1920) - h)/2 + 'px';
>            boxs[i].style.width = w + 'px';
>            boxs[i].style.height = h + 'px';
>            bg[i].style.left = '0';
>        }
>    }
>    else{
>        for(var i = 0; i < bg.length; i++){
>           bg[i].style.height = h + 'px';
>            bg[i].style.width = h*(1920/1080) + 'px';
>            bg[i].style.left = -(h*(1920/1080) - w)/2 + 'px';
>            boxs[i].style.width = w + 'px';
>            boxs[i].style.height = h + 'px';
>            bg[i].style.top = '0';
>        }
>    }
>}
> ```
