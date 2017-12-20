
var indexs = 0;
var nav_ul = document.getElementById('nav_ul');
var bg = document.getElementsByClassName("box_bg");
var boxs = document.getElementsByClassName("box");
var box02_flag = false;
var iB = true;

function _alert(strings)
{
	alert(strings);
}


function imgChange(iB){
    var h = window.innerHeight;
    var w = window.innerWidth;
    //处理图片太大
    if(iB){
        for(var i = 0;i < bg.length; i++){
           bg[i].style.width = w + 'px';
           bg[i].style.height = w * (1080/1920) + 'px';
            bg[i].style.top = -(w * (1080/1920) - h)/2 + 'px';
            boxs[i].style.width = w + 'px';
            boxs[i].style.height = h + 'px';
            bg[i].style.left = '0';
        }
    }
    //处理图片太小
    else{
        for(var i = 0; i < bg.length; i++){
           bg[i].style.height = h + 'px';
            bg[i].style.width = h*(1920/1080) + 'px';
            bg[i].style.left = -(h*(1920/1080) - w)/2 + 'px';
            boxs[i].style.width = w + 'px';
            boxs[i].style.height = h + 'px';
            bg[i].style.top = '0';
        }

    }
}
/*监听窗口改变*/
window.onresize = function(){  
    document.getElementsByTagName("html")[0].style.fontSize = document.documentElement.clientWidth/20 + 'px'; 
    var h = window.innerHeight;
    var w = window.innerWidth;
    if(w/h >= 1920/1080){
        iB = true;
        imgChange(iB);
    }
    else{
        iB = false;
        imgChange(iB); 
    }
}

